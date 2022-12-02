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
}
