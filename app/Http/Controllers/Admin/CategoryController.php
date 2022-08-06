<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    protected $paginate = 15;
    
    public function index()
    {
        $tab = "Quản lý danh mục";
        $categories = Category::where('parent_id', 0)->orderBydesc('created_at')->paginate($this->paginate);
        
        return view('admin.category.index', compact([
            "tab",
            "categories",
        ]));
    }
    
    public function create()
    {
        $tab = "Quản lý danh mục / Thêm danh mục";
        $parents = Category::where('parent_id', 0)
            ->orderBydesc('created_at')
            ->get();

        return view('admin.category.create', compact([
            "tab",
            "parents"
        ]));
    }
    
    public function store(CategoryRequest $request)
    {
        $data = $request->all();
        $category = Category::create($data);

        if ($category->parent_id != 0) {
            return redirect()->route('categories.show', $category->parent_id)->with('messageSuccess', 'Thêm danh mục thành công');
        }

        return redirect()->route('categories.index')->with('messageSuccess', 'Thêm danh mục thành công');
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);

        if ($category) {
            $tab = "Quản lý danh mục/ Danh mục con của " . $category->name;
            $categories = Category::where('parent_id', $id)->orderBydesc('created_at')->paginate($this->paginate);
            
            return view('admin.category.child', compact([
                "tab",
                "categories",
            ]));
        }
        
        return redirect()->route('categories.index')->with('messageSuccess', 'Không tồn tại');
    }
    
    public function edit($id)
    {
        $tab = "Quản lý danh mục / Cập nhật danh mục";
        $parents = Category::where('parent_id', 0)
            ->where('id', '!=', $id)
            ->orderBydesc('created_at')
            ->get();
        $category = Category::findOrFail($id);

        if ($category) {
            return view('admin.category.edit', compact([
                "tab",
                "parents",
                "category",
            ]));
        }
        
        return redirect()->route('categories.index')->with('messageSuccess', 'Không tồn tại');
    }
    
    public function update(CategoryRequest $request, $id)
    {
        $data = $request->all();
        $category = Category::findOrFail($id);

        if ($category) {
            $category->update($data);

            if ($category->parent_id != 0) {
                return redirect()->route('categories.show', $category->parent_id)->with('messageSuccess', 'Cập nhật danh mục thành công');
            }

            return redirect()->route('categories.index')->with('messageSuccess', 'Cập nhật danh mục thành công');
        }
        
        return redirect()->route('categories.index')->with('messageSuccess', 'Không tồn tại');
    }
    
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        if ($category->parent_id == 0) {
            $categoryChild = Category::where('parent_id', $category->id)->first();

            if ($categoryChild) {
                return redirect()->route('categories.index')->with('messageSuccess', 'Danh mục này có danh mục con');
            } else {
                $category->delete();
            
                return redirect()->route('categories.index')->with('messageSuccess', 'Xóa danh mục thành công');
            }
        } else {
            $product = Product::where('category_id', $id)->first();

            if ($product) {
                return redirect()->route('categories.show', $category->parent_id)->with('messageSuccess', 'Danh mục này đang có sản phẩm');
            } else {
                $category->delete();
            
                return redirect()->route('categories.show', $category->parent_id)->with('messageSuccess', 'Xóa danh mục thành công');
            }
        }
    }
}
