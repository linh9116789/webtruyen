<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use Carbon\Carbon;
class CategoryController extends Controller
{
    public function index()
    {
        $categores = Category::paginate(20);
        $viewData = [
            'categories'=>$categores
        ];
        return view('admin.category.index',$viewData);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'c_name'=>'required|unique:categories,c_name|max:255'
        ],
        [
            'c_name.required'   =>'Dữ liệu không được để trống !',
            'c_name.unique'     =>'Dữ liệu đã tồn tại !'
        ]
    );
        $categores = new Category();
        $categores->c_name = $data['c_name'];
        $categores->c_slug = Str::slug($request->c_name);
        $categores->created_at = Carbon::now();
        $categores->save();
        return redirect()->back()->with('status','Thêm dữ liệu thành công !');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {   $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
    }


    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'c_name'=>'required|unique:categories,c_name|max:255'
        ],
        [
            'c_name.required'   =>'Dữ liệu không được để trống !',
            'c_name.unique'     =>'Dữ liệu đã tồn tại !'
        ]
    );
        $categores = Category::find($id);
        $categores->c_name = $data['c_name'];
        $categores->c_slug = Str::slug($request->c_name);
        $categores->updated_at = Carbon::now();
        $categores->save();
        return redirect()->back()->with('status','Cập nhật dữ liệu thành công !');
    }

    public function destroy($id)
    {   Category::find($id)->delete();
        return redirect()->back()->with('status','Xóa dữ liệu thành công !');
    }
}
