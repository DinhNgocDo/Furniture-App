<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
// use App\Http\Requests\OrderRequest;

class OrderController extends Controller
{
    protected $paginate = 15;
    
    public function index()
    {
        $tab = "Quản lý đơn hàng";
        $orders = Order::orderBydesc('created_at')->paginate($this->paginate);
        
        return view('admin.order.index', compact([
            "tab",
            "orders",
        ]));
    }

    public function show($id)
    {
        $tab = "Quản lý đơn hàng / Chi tiết đơn hàng";
        $order = Order::findOrFail($id);
        $orderDetail = OrderDetail::whereOrderId($id)->get();

        if ($order->notification == 1) {
            $order->update([
                'notification' => 0
            ]);
        }

        return view('admin.order.detail', compact([
            "tab",
            "order",
            "orderDetail",
        ]));
    }
    
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        switch ($order->status) {
            case 0: {
                $status = 2;

                break;
            }
            case 1: {
                $status = 0;

                break;
            }
            case 2: {
                $status = 1;

                break;
            }
        }

        $order->update([
            'status' => $status
        ]);

        return redirect()->route('orders.show', $id)->with('messageSuccess', 'Cập nhật đơn hàng thành công');
    }
    
    public function destroy($id)
    {
        $order = Order::findOrFail($id);

        if ($order) {
            $order->delete();
        
            return redirect()->route('orders.index')->with('messageSuccess', 'Xóa đơn hàng thành công');
        }
        
        return redirect()->route('orders.index')->with('messageSuccess', 'Không tồn tại');
    }
}
