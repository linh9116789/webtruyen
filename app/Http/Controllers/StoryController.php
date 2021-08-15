<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $storys = Story::with('category:id,c_name');
        $storys = $storys->orderByDesc('id')->paginate(10);
// dd($storys);
        $viewData = [
            'storys' =>$storys
        ];
        return view('admin.story.index',$viewData);
    }


    public function create()
    {
        $category = Category::all();
        return view('admin.story.create')->with(compact('category'));
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'sto_name'=>'required|unique:storys,sto_name|max:255',
            'sto_description'=>'required',
            'sto_content'=>'required',
            'sto_category_id'=>'required',
            'sto_avatar'=>'required',
            'sto_author'=>'required'
        ],
        [
            'sto_name.required'         =>'Dữ liệu không được để trống !',
            'sto_name.unique'           =>'Dữ liệu đã tồn tại !',
            'sto_description.required'  =>'Dữ liệu không được để trống !',
            'sto_content.required'      =>'Dữ liệu không được để trống !',
            'sto_category_id.required'  =>'Dữ liệu không được để trống !',
            'sto_avatar.required'       =>'Dữ liệu không được để trống !',
            'sto_author.required'       =>'Dữ liệu không được để trống !'
        ]
        );
        $storys = new Story();
        $storys->sto_name = $data['sto_name'];
        $storys->sto_slug = Str::slug($request->sto_name);
        $storys->sto_description = $data['sto_description'];
        $storys->sto_content = $data['sto_content'];
        $storys->sto_category_id = $data['sto_category_id'];
        $storys->sto_author = $data['sto_author'];
        // $storys->sto_avatar = $data['sto_avatar'];
        $storys->created_at = Carbon::now();
        // $storys->sto_avatar = $data['sto_avatar'];
        // $get_image = $request->sto_avatar;
        // $path = 'public/uploads/';
        // $get_name_image = $get_image->getClientOriginalName();
        // $name_image = current(explode('.',$get_name_image));
        // $new_image =$name_image.rand(0,99).'.'.$get_image->getClientOriginalName();
        // $get_image->move($path,$new_image);
        // $storys->sto_avatar = $new_image;
        if ($request->sto_avatar) {
            $image = upload_image('sto_avatar');
            if($image['code'] == 1)
                $storys->sto_avatar = $image['name'];
        }

        $storys->save();
        return redirect()->back()->with('status','Thêm dữ liệu thành công !');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $category = Category::all();
        $story = Story::findOrFail($id);
        // $storys = $storys->orderByDesc('id')->paginate(10);
        $viewData = [
            'story' =>$story,
            'category'=>$category
        ];
        return view('admin.story.edit',$viewData);
    }


    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'sto_name'=>'required|max:255',
            'sto_description'=>'required',
            'sto_content'=>'required',
            'sto_category_id'=>'required',
            'sto_author'    =>'required'
        ],
        [
            'sto_name.required'         =>'Dữ liệu không được để trống !',
            'sto_description.required'  =>'Dữ liệu không được để trống !',
            'sto_content.required'      =>'Dữ liệu không được để trống !',
            'sto_category_id.required'  =>'Dữ liệu không được để trống !',
            'sto_author.required'  =>'Dữ liệu không được để trống !',
        ]
        );
        $storys =Story::find($id);
        $storys->sto_name = $data['sto_name'];
        $storys->sto_slug = Str::slug($request->sto_name);
        $storys->sto_description = $data['sto_description'];
        $storys->sto_content = $data['sto_content'];
        $storys->sto_category_id = $data['sto_category_id'];
        $storys->sto_author = $data['sto_author'];
        // $storys->sto_avatar = $data['sto_avatar'];
        $storys->created_at = Carbon::now();
        // $storys->sto_avatar = $data['sto_avatar'];
        // $get_image = $request->sto_avatar;
        // $path = 'public/uploads/';
        // $get_name_image = $get_image->getClientOriginalName();
        // $name_image = current(explode('.',$get_name_image));
        // $new_image =$name_image.rand(0,99).'.'.$get_image->getClientOriginalName();
        // $get_image->move($path,$new_image);
        // $storys->sto_avatar = $new_image;
        if ($request->sto_avatar) {
            $image = upload_image('sto_avatar');
            if($image['code'] == 1)
                $storys->sto_avatar = $image['name'];
        }

        $storys->save();
        return redirect()->back()->with('status','Cập nhật dữ liệu thành công !');
    }


    public function destroy($id)
    {
        $storys = Story::find($id);
        // dd($storys);
        if($storys->sto_avatar != NULL){
            unlink(pare_url_file($storys->sto_avatar));
        }
        Story::find($id)->delete();
        return redirect()->back()->with('status','Xóa dữ liệu thành công !');
    }
}
