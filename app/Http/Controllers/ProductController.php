<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $prods = DB::table('product')
        ->join('category', 'product.category_id', '=', 'category.id')
        ->select('product.*', 'category.name AS CateName')
        ->paginate(4);
        return view('product.index', compact('prods'));
    }

    public function create()
    {
        $cates = DB::table('category')->get();
        return view('product.create', compact('cates'));
    }

    public function edit($id){
        $prod = DB::table('product')->find($id);
        $cates = DB::table('category')->get();

        return view('product.edit', compact('prod', 'cates'));
    }

    public function update($id, Request $request)
    {
        $rules = [
            'name' => 'required|max:150|min:5',
            'price' => "required|numeric",
            'image' => 'mimes:jpg,png,gif',
            'category_id' =>'required',
        ];

        $messages = [
            'name.required' => 'Name is required',
            'name.max' => 'Name must be less than 150 characters',
            'name.min' => 'Name must be greater than 5 characters',
            'price.required' => 'Price is required',
            'price.numeric' => 'Price must be numeric',
            'image.mimes' => 'Image must be one of the allowed mime types',
            'category_id.required' => 'Category id must be one of the allowed categories in the category list'
        ];
        
        $request -> validate($rules, $messages);
        
        $prod = DB::table('product')->find($id);

        $name = $request->name;
        $price = $request->price;
        $file_name = $prod->image;
        $category_id = $request->category_id;
        $status = $request->status;
        
        if ($request->has('image')) {
            $file_name = $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads'), $file_name);
            unlink("uploads/".$prod->image);
        }
        
        DB::table('product')->where('id', $id)->update([
            'name' => $name,
            'price' => $price,
            'image' => $file_name,
            'category_id' => $category_id,
            'status' => $status,
        ]);
        return redirect()->route('product.index');
    }
    
    public function delete($id)
    {
        $prod = DB::table('product')->find($id);
        unlink("uploads/".$prod->image);
        DB::table('product')->where('id', $id)->delete();
        return redirect()->route('product.index');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:150|min:5',
            'price' => "required|numeric",
            'image' => 'required|mimes:jpg,png,gif',
            'category_id' =>'required',
        ];

        $messages = [
            'name.required' => 'Name is required',
            'name.max' => 'Name must be less than 150 characters',
            'name.min' => 'Name must be greater than 5 characters',
            'price.required' => 'Price is required',
            'price.numeric' => 'Price must be numeric',
            'image.required' => 'Image is required',
            'image.mimes' => 'Image must be one of the allowed mime types',
            'category_id.required' => 'Category id must be one of the allowed categories in the category list'
        ];

        $request -> validate($rules, $messages);
        
        $name = $request->name;
        $price = $request->price;
        $file_name =  $request->image->getClientOriginalName();
        $category_id = $request->category_id;
        $status = $request->status;
        
        $request->image->move(public_path('uploads'), $file_name);
        
        DB::table('product')->insert([
            'name' => $name,
            'price' => $price,
            'image' => $file_name,
            'category_id' => $category_id,
            'status' => $status,
        ]);
        return redirect()->route('product.index');
    }
}