<?php

namespace App\Http\Controllers;

use App\Models\Danhmuc;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DanhmucController extends Controller
{
    public function index()
    {
        $danhmucs = Danhmuc::paginate(20);
        $viewData = [
            'danhmucs'=>$danhmucs
        ];
        return view('admin.danhmuc.index',$viewData);
    }

    public function create()
    {
        return view('admin.danhmuc.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'd_name'=>'required|unique:danhmucs,d_name|max:255'
        ],
        [
            'd_name.required'   =>'Dữ liệu không được để trống !',
            'd_name.unique'     =>'Dữ liệu đã tồn tại !'
        ]
    );
        $danhmucs = new Danhmuc();
        $danhmucs->d_name = $data['d_name'];
        $danhmucs->d_slug = Str::slug($request->d_name);
        $danhmucs->created_at = Carbon::now();
        $danhmucs->save();
        return redirect()->back()->with('status','Thêm dữ liệu thành công !');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {   $danhmuc = Danhmuc::find($id);
        return view('admin.danhmuc.edit',compact('danhmuc'));
    }


    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'd_name'=>'required|unique:danhmucs,d_name|max:255'
        ],
        [
            'd_name.required'   =>'Dữ liệu không được để trống !',
            'd_name.unique'     =>'Dữ liệu đã tồn tại !'
        ]
    );
        $categores = Danhmuc::find($id);
        $categores->d_name = $data['d_name'];
        $categores->d_slug = Str::slug($request->d_name);
        $categores->updated_at = Carbon::now();
        $categores->save();
        return redirect()->back()->with('status','Cập nhật dữ liệu thành công !');
    }

    public function destroy($id)
    {   Danhmuc::find($id)->delete();
        return redirect()->back()->with('status','Xóa dữ liệu thành công !');
    }
}
