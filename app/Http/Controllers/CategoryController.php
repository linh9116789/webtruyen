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
        return view('admin.category.index');
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');
        // dd($data);
        $data['c_slug'] = Str::slug($request->c_name);
        $data['created_at'] = Carbon::now();
        $id = Category::insertGetId($data);
        return redirect()->back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
