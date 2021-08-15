<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
// use App\Models\Chapters;
use Illuminate\Http\Request;
use App\Models\Story;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ChapterController extends Controller
{
    public function index(){
        $chapters = Chapter::with('story:id,sto_name')->orderByDesc('id')->paginate(10);
        // dd($chapters);
        $viewData = [
            'chapters' =>$chapters
        ];
        return view('admin.chapter.index',$viewData);
    }

    public function create()
    {
        $story = Story::all();
        return view('admin.chapter.create')->with(compact('story'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'chap_title' => 'required',
            'chap_content'=>'required',
            'chap_story_id'=>'required'
        ],[
            'chap_name.required'    =>'Dữ liệu trống !',
            'chap_content'          =>'Dữ liệu trống !'
        ]
        );
        $chapter = new Chapter();
        $chapter->chap_title = $data['chap_title'];
        $chapter->chap_slug = Str::slug($request->chap_title);
        $chapter->chap_content = $data['chap_content'];
        $chapter->chap_story_id = $data['chap_story_id'];
        $chapter->created_at   = Carbon::now();

        $chapter->save();
        return redirect()->back()->with('status','Thêm dữ liệu thành công !');
    }

    public function edit($id)
    {
        $story = Story::all();
        $chapter = Chapter::findOrFail($id);
        $viewData = [
            'story'     =>$story,
            'chapter'   =>$chapter
        ];
        return view('admin.chapter.edit',$viewData);
    }

    public function update(Request $request, $id){
        $data = $request->validate([
            'chap_title' => 'required',
            'chap_content'=>'required',
            'chap_story_id'=>'required'
        ],[
            'chap_name.required'    =>'Dữ liệu trống !',
            'chap_content'          =>'Dữ liệu trống !'
        ]
        );
        $chapter = Chapter::find($id);
        $chapter->chap_title = $data['chap_title'];
        $chapter->chap_slug = Str::slug($request->chap_title);
        $chapter->chap_content = $data['chap_content'];
        $chapter->chap_story_id = $data['chap_story_id'];
        $chapter->updated_at   = Carbon::now();

        $chapter->save();
        return redirect()->back()->with('status','Cập nhật dữ liệu thành công !');
    }

    public function destroy($id)
    {
        Chapter::find($id)->delete();
        return redirect()->back()->with('status','Xóa dữ liệu thành công !');
    }
}
