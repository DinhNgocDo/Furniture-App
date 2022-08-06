<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Mail;
use App\Http\Requests\AddCartRequest;
use App\Http\Requests\CheckOutRequest;
use App\Models\User;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Mail\OrderMail;

class CartController extends Controller
{
    public function index()
    {
        $pageNameRoot = 'Giỏ hàng';
		$cart = session()->get('cart');
        $total = 0;

        if (!empty($cart)) {
            foreach ($cart as $item) {
                $total += $item['total'];
            }
        }

        return view('client.cart.index', compact([
            'pageNameRoot',
            'cart',
            'total',
        ]));
    }

    public function addCart(AddCartRequest $request)
    {
        $data = $request->all();
        $productSize = ProductSize::findOrFail($data['product_size_id'])->load([
            'product',
            'size',
        ]);
        
        if ($productSize->quantity == 0) {
            return response()->json([
                'message' => $productSize->product->name . '(' . $productSize->size->name . ') đã hết hàng'
            ]);
        }

        if ($data['quantity'] > $productSize->quantity) {
            return response()->json([
                'message' => $productSize->product->name . '(' . $productSize->size->name . ') chỉ còn ' . $productSize->quantity . ' số lượng'
            ]);
        }

        $size = $productSize->size;
        $product = $productSize->product;
        $price = ($product->sale_percent == 0) ? $product->price : $product->price_sale;

		$cart = session()->get('cart');
		$rowId = md5($data['product_size_id'] . time());
        
		if (empty($cart)) {
            $cart[$rowId] = [
                'rowId' => $rowId,
                'product_size_id' => (int) $data['product_size_id'],
                'image' => $product->image,
                'name' => $product->name,
                'size' => $size->name,
                'price' => $price,
                'quantity' => (int) $data['quantity'],
                'total' => $price * (int) $data['quantity'],
            ];
        } else {
            $rowIdKey = "";
            
			foreach ($cart as $key => $item) {
				if ($item['product_size_id'] == $data['product_size_id']) {
                    $rowIdKey = $key;
				}
			}

            if (isset($cart[$rowIdKey])) {
                if ($cart[$rowIdKey]['product_size_id'] == $data['product_size_id']) {
                    $cart[$rowIdKey]['quantity'] += $data['quantity'];
                    $cart[$rowIdKey]['total'] = $cart[$rowIdKey]['quantity'] * $price;
                }
            } else {
                $cart[$rowId] = [
                    'rowId' => $rowId,
                    'product_size_id' => (int) $data['product_size_id'],
                    'image' => $product->image,
                    'name' => $product->name,
                    'size' => $size->name,
                    'price' => $price,
                    'quantity' => (int) $data['quantity'],
                    'total' => $price * (int) $data['quantity'],
                ];
            }
        }

        session()->put('cart', $cart);
        session()->save();
        
        return response()->json([
            'message' => 'Đã thêm vào giỏ hàng'
        ]);
    }

	public function removeCart($rowId)
	{
        $cart = session()->get('cart');
        unset($cart[$rowId]);
        session()->put('cart', $cart);
        session()->save();

        return redirect()->route('cart')->with('message', 'Đã xóa sản phẩm');
	}

    public function updateCart(Request $request)
    {
        $data = $request->all();
        $quantity = $data['quantity'];
        $cart = session()->get('cart');
		
		foreach ($cart as $key => $item) {
			foreach ($quantity as $keyQTY => $qty) {
				if ($key == $keyQTY) {
                    $productSize = ProductSize::findOrFail($item['product_size_id'])->load([
                        'product',
                        'size',
                    ]);
                    
                    if ($productSize->quantity == 0) {
                        return redirect()->route('cart')->with('message', 'Sản phẩm bạn chọn đã hết hàng');
                    }

                    if ($qty > $productSize->quantity) {
                        return redirect()->route('cart')->with('message', $productSize->product->name . '(' . $productSize->size->name . ') chỉ còn ' . $productSize->quantity . ' số lượng');
                    }

                    $product = $productSize->product;
                    $price = ($product->sale_percent == 0) ? $product->price : $product->price_sale;
                    $cart[$keyQTY]['quantity'] = $qty;
                    $cart[$keyQTY]['total'] = $cart[$keyQTY]['quantity'] * $price;
				}
			}
		}

        session()->put('cart', $cart);
        session()->save();

        return redirect()->route('cart')->with('message', 'Đã cập nhật giỏ hàng');
    }

    public function getCheckOut()
    {
        $pageNameRoot = 'Tiến hành đặt hàng';
		$cart = session()->get('cart');
        $total = 0;

        if (empty($cart)) {
            return redirect()->route('home')->with('message', 'Hãy thêm sản phẩm vào giỏ');
        }

        foreach ($cart as $item) {
            $total += $item['total'];
        }

        return view('client.cart.check_out', compact([
            'pageNameRoot',
            'cart',
            'total',
        ]));
    }

    public function checkOut(CheckOutRequest $request)
    {
        DB::beginTransaction();

        try {
            $data = $request->all();
            $mail = [];
            $cart = session()->get('cart');
            
            if (!Auth::check()) {
                $user = User::where('email', $data['email'])
                    ->orWhere('phone', $data['phone'])
                    ->first();

                if (!$user) {
                    $data['role_id'] = 1;
                    $pass = rand(1111111111, 9999999999);
                    $mail['password'] = $pass;
                    $data['password'] = bcrypt($pass);
                    
                    $user = User::create($data);
                }
            } else {
                $user = Auth::user();
            }

            $data['user_id'] = $user->id;
            $order = Order::create($data);

            foreach ($cart as $item) {
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_size_id' => $item['product_size_id'],
                    'quantity' => $item['quantity'],
                    'total' => $item['total'],
                ]);

                $productSize = ProductSize::findOrFail($item['product_size_id']);

                if ($productSize->quantity == 0) {
                    DB::rollBack();
                    $messageOutStock = $item['name'] . ' size ' . $item['size'] . ' đã hết hàng';

                    return redirect()->route('check-out-form')->with('message', $messageOutStock);
                } else {
                    $stockQuantity = $productSize->quantity - $item['quantity'];

                    if ($stockQuantity < 0) {
                        DB::rollBack();
                        $messageOutStock = $item['name'] . ' size ' . $item['size'] . ' chỉ còn ' . $productSize->quantity . ' mẫu';

                        return redirect()->route('check-out-form')->with('message', $messageOutStock);
                    } else {
                        $productSize->update([
                            'quantity' => $stockQuantity,
                        ]);
                    }
                }
            }

            $mail['name'] = $user->name;
            $mail['email'] = $user->email;
            $mail['phone'] = $user->phone;
            $mail['address'] = $user->address;
            $mail['cart'] = $cart;
            Mail::to($mail['email'])->send(new OrderMail($mail));

            session()->pull('cart');
            session()->save();

            DB::commit();

            return redirect()->route('home')->with('message', 'Đặt hàng thành công');
        } catch (\Exception $ex) {
            DB::rollBack();

            return redirect()->route('check-out-form')->with('message', 'Đặt hàng thất bại');
        }
    }

    public function getOrder()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $pageNameRoot = "Thông tin đơn hàng";
            $orders = Order::whereUserId($user->id)->orderByDesc('created_at')->get();

            return view('client.order.index', compact([
                'pageNameRoot',
                'orders',
            ]));
        }
    }

    public function getOrderDetail($orderid)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $pageNameRoot = "Thông tin đơn hàng > Chi tiết đơn hàng";
            $detail = OrderDetail::whereOrderId($orderid)
                ->orderByDesc('created_at')
                ->get();

            return view('client.order.detail', compact([
                'pageNameRoot',
                'detail',
            ]));
        }
    }
}
