<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Http\Requests\NewsRequest;
use App\Helper;

class NewController extends Controller
{
    protected $paginate = 15;
    
    public function index()
    {
        $tab = "Quản lý tin tức";
        $news = News::orderBydesc('created_at')->paginate($this->paginate);
        
        return view('admin.news.index', compact([
            "tab",
            "news",
        ]));
    }
    
    public function create()
    {
        $tab = "Quản lý tin tức / Thêm tin tức";

        return view('admin.news.create', compact([
            "tab",
        ]));
    }
    
    public function store(NewsRequest $request)
    {
        $data = $request->all();
        $data['image'] = Helper::uploadFile(null, $request->file('image'), 'news');
        $news = News::create($data);

        return redirect()->route('news.index', $news->id)->with('messageSuccess', 'Thêm tin tức thành công');
    }
    
    public function edit($id)
    {
        $tab = "Quản lý tin tức / Cập nhật tin tức";
        $news = News::findOrFail($id);

        if ($news) {
            return view('admin.news.edit', compact([
                "tab",
                "news",
            ]));
        }
        
        return redirect()->route('news.index')->with('messageSuccess', 'Không tồn tại');
    }
    
    public function update(NewsRequest $request, $id)
    {
        $data = $request->all();
        $news = News::findOrFail($id);
        $data['image'] = Helper::uploadFile($news->image, $request->file('image'), 'news');

        if ($news) {
            $news->update($data);

            return redirect()->route('news.index', $news->id)->with('messageSuccess', 'Cập nhật tin tức thành công');
        }
        
        return redirect()->route('news.index')->with('messageSuccess', 'Không tồn tại');
    }
    
    public function destroy($id)
    {
        $news = News::findOrFail($id);

        if ($news) {
            $news->delete();
        
            return redirect()->route('news.index')->with('messageSuccess', 'Xóa tin tức thành công');
        }
        
        return redirect()->route('news.index')->with('messageSuccess', 'Không tồn tại');
    }
}
