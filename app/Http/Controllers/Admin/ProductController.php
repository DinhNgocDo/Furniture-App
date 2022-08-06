<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Size;
use App\Models\Product;
use App\Models\ProductSize;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductSizeRequest;
use App\Helper;

class ProductController extends Controller
{
    protected $paginate = 15;
    
    public function index()
    {
        $tab = "Quản lý sản phẩm";
        $products = Product::orderBydesc('created_at')->paginate($this->paginate);
        
        return view('admin.product.index', compact([
            "tab",
            "products",
        ]));
    }
    
    public function create()
    {
        $tab = "Quản lý sản phẩm / Thêm sản phẩm";
        $categories = Category::where('status', 1)
            ->orderBydesc('created_at')
            ->get();

        return view('admin.product.create', compact([
            "tab",
            "categories",
        ]));
    }
    
    public function store(ProductRequest $request)
    {
        $data = $request->all();
        $data['image'] = Helper::uploadFile(null, $request->file('image'), 'product');
        $data['price_sale'] = $data['price'] - ($data['price'] * ($data['sale_percent'] / 100));
        $product = Product::create($data);

        return redirect()->route('products.show', $product->id)->with('messageSuccess', 'Thêm sản phẩm thành công');
    }

    public function show($id)
    {
        $tab = "Quản lý sản phẩm / Chi tiết sản phẩm";
        $product = Product::findOrFail($id)->load([
            'productSizes' => function ($query) {
                $query->with('size');
            }
        ]);

        if ($product) {
            return view('admin.product.detail', compact([
                "tab",
                "product",
            ]));
        }
        
        return redirect()->route('products.index')->with('messageSuccess', 'Không tồn tại');
    }
    
    public function edit($id)
    {
        $tab = "Quản lý sản phẩm / Cập nhật sản phẩm";
        $categories = Category::where('status', 1)
            ->orderBydesc('created_at')
            ->get();
        $product = Product::findOrFail($id);

        if ($product) {
            return view('admin.product.edit', compact([
                "tab",
                "categories",
                "product",
            ]));
        }
        
        return redirect()->route('products.index')->with('messageSuccess', 'Không tồn tại');
    }
    
    public function update(ProductRequest $request, $id)
    {
        $data = $request->all();
        $product = Product::findOrFail($id);
        $data['image'] = Helper::uploadFile($product->image, $request->file('image'), 'product');
        $data['price_sale'] = $data['price'] - ($data['price'] * ($data['sale_percent'] / 100));

        if ($product) {
            $product->update($data);

            return redirect()->route('products.show', $product->id)->with('messageSuccess', 'Cập nhật sản phẩm thành công');
        }
        
        return redirect()->route('products.index')->with('messageSuccess', 'Không tồn tại');
    }
    
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product) {
            $product->delete();
        
            return redirect()->route('products.index')->with('messageSuccess', 'Xóa sản phẩm thành công');
        }
        
        return redirect()->route('products.index')->with('messageSuccess', 'Không tồn tại');
    }

    public function productFormSize($id)
    {
        $product = Product::findOrFail($id);
        $tab = "Quản lý sản phẩm / Chi tiết sản phẩm / Thêm kích thước cho sản phẩm " . $product->name;
        $sizes = Size::where('status', 1)
            ->orderByDesc('created_at')
            ->get();
        
        return view('admin.product.form_size', compact([
            "tab",
            "product",
            "sizes",
        ]));
    }

    public function productAddSize(ProductSizeRequest $request, $id)
    {
        $data = $request->all();
        $data['product_id'] = $id;
        $productSize = ProductSize::where('product_id', $id)
            ->where('size_id', $data['size_id'])
            ->first();

        if (!$productSize) {
            ProductSize::create($data);

            return redirect()->route('products.show', $id)->with('messageSuccess', 'Đã thêm kích thước');
        }

        return redirect()->route('products.show', $id)->with('messageSuccess', 'Đã có kích thước này');
    }

    public function productEditFormSize($id, $productSizeId)
    {
        $product = Product::findOrFail($id);
        $productSize = ProductSize::findOrFail($productSizeId);
        $tab = "Quản lý sản phẩm / Chi tiết sản phẩm / Cập nhật kích thước kích thước cho sản phẩm " . $product->name;
        $sizes = Size::where('status', 1)
            ->orderByDesc('created_at')
            ->get();
        
        return view('admin.product.edit_form_size', compact([
            "tab",
            "product",
            "sizes",
            "productSize",
        ]));
    }

    public function productUpdateSize(ProductSizeRequest $request, $id, $productSizeId)
    {
        ProductSize::findOrFail($productSizeId)->update($request->only('quantity'));

        return redirect()->route('products.show', $id)->with('messageSuccess', 'Đã cập nhật kích thước');
    }

    public function productDeleteSize(Request $request, $id, $productSizeId)
    {
        ProductSize::findOrFail($productSizeId)->delete();

        return redirect()->route('products.show', $id)->with('messageSuccess', 'Đã cập nhật kích thước');
    }
}
