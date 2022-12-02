<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $cates = DB::table('category')->paginate(3);
        return view('category.index', compact('cates'));
    }

    public function create(){
        return view('category.create');
    }

    public function delete($id){
        DB::table('category')->where('id', $id)->delete();
        return redirect()->route('category.index');
    }

    public function edit($id){
        $cate = DB::table('category')->find($id);

        return view('category.edit', compact('cate'));
    }

    public function update($id, Request $request){
        $rules = [
            'name' => 'required'
        ];
        $messages = [
            'name.required' => 'Name is required',
        ];
        $request->validate($rules,$messages);

        DB::table('category')->where('id', $id)->update($request->only('name', 'status'));
        return redirect()->route('category.index');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|unique:category'
        ];
        $messages = [
            'name.required' => 'Name is required',
            'name.unique' => 'This name is already taken',
        ];
        $request->validate($rules,$messages);

        DB::table('category')->insert($request->only('name', 'status'));
        return redirect()->route('category.index');
    }
}