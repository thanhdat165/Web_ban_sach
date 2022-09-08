<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Redirect;


class Product extends Controller
{
    public function detail_product($productid)
    {
        $detail_product = DB::table('book')
        ->join('author','author.AuthorID','=','book.AuthorID')
        ->where('BookID',$productid)->get();

        $relate_product = DB::table('book')->join('author','author.AuthorID','=','book.AuthorID')->get();
        
        return view('pages.product')->with('product',$detail_product)->with('relate_product',$relate_product);
    }
}