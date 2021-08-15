<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Chapter;
use App\Models\Story;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home(){
        $category = Category::orderByDesc('id')->get();
        $storyNew = Story::orderByDesc('id')
            ->select('id','sto_name','sto_slug','sto_avatar')
            ->get();
        $viewData = [
            'category'=> $category,
            'storyNew'=> $storyNew
        ];
        return view('pages.home',$viewData);
    }

    public function danhmuc($slug)
    {
        $category = Category::orderByDesc('id')->get();
        $category_id = Category::where('c_slug',$slug)->first();
        $story = Story::orderByDesc('id')->where('sto_category_id',$category_id->id)->get();

        // dd($story);
        $viewData = [
            'category'=>$category,
            'story'   =>$story
        ];
        return view('pages.danhmuc',$viewData);
    }

    public function xemtruyen($slug)
    {
        $category = Category::orderByDesc('id')->get();
        $story = Story::with('category')->where('sto_slug',$slug)->first();
        $chapter = Chapter::with('story')->orderBy('id','ASC')->where('chap_story_id',$story->id)->get();
        $chapter_first = Chapter::with('story')->orderBy('id','ASC')->where('chap_story_id',$story->id)->first();
        // dd($chapter_first);
        $storyCate = Story::with('category')->where('sto_category_id',$story->category->id)->whereNotIn('id',[$story->id])->get();
        // dd($storyCate);
        $viewData = [
            'category'=> $category,
            'story'=> $story,
            'chapter' => $chapter,
            'storyCate'=>$storyCate,
            'chapter_first'=>$chapter_first
        ];
        return view('pages.truyen',$viewData);
    }

    public function xemchapter($slug)
    {
        $category = Category::orderByDesc('id')->get();
        $story    = Chapter::where('chap_slug',$slug)->first();
        $chapter  = Chapter::with('story')->where('chap_slug',$slug)->where('chap_story_id',$story->chap_story_id)->first();
        $viewData = [
            'category' => $category,
            'chapter'  => $chapter
        ];
        return view('pages.chapter',$viewData);
    }
}
