<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CS_Product extends Controller
{
    public function index(){
        $detail_product = DB::table('book')->get();   
        $author = DB::table('author')->get();
        $category = DB::table('category')->get();
        return view('pages.cs_all_product')->with('product',$detail_product)->with('author',$author)->with('category',$category);
    }
}
