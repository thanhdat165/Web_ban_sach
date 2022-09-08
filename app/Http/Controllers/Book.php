<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Redirect;

class Book extends Controller
{
    public function search_book(Request $request){
        $search_book = DB::table('Book')
        ->join('Author','Author.AuthorID','=','Book.AuthorID')
        ->join('Producer','Producer.ProducerID','=','Book.ProducerID')
        ->join('Category','Category.CategoryID','=','Book.CategoryID')
        ->where('BookName', 'like', '%'.$request->book.'%')
        ->orwhere('AuthorName', 'like', '%'.$request->book.'%')
        ->orwhere('ProducerName', 'like', '%'.$request->book.'%')
        ->orwhere('CategoryName', 'like', '%'.$request->book.'%')
        ->orwhere('BookID', 'like', '%'.$request->book.'%')->get();     
        $search_author = DB::table('Author')->get();
        $producer =  DB::table('Producer')->get();
        $category =  DB::table('Category')->get();
        return view('admin.search_book')->with('search_book', $search_book)->with('all_book1', $search_author)->with('all_book2',$producer)->with('all_book3',$category);
    }

    public function add_book(){
        $author = DB::table('Author')->get();
        $producer =  DB::table('Producer')->get();
        $category =  DB::table('Category')->get();
        return view('admin.add_book')->with('add_book1', $author)->with('add_book2',$producer)->with('add_book3',$category);
    }
    

   public function all_book(){
        $all_book = DB::table('Book')->get();
        $author = DB::table('Author')->get();
        $producer =  DB::table('Producer')->get();
        $category =  DB::table('Category')->get();
        return view('admin.all_book')->with('all_book', $all_book)->with('all_book1', $author)->with('all_book2',$producer)->with('all_book3',$category);
    }

    public function save_book(Request $request){ 
        $data = array();
        $data['BookName'] = $request->book_name;
        $data['AuthorID'] = $request->book_authorid;
        $data['ProducerID'] = $request->book_producerid;
        $data['CategoryID'] = $request->book_categoryid;
        $data['Introduction'] = $request->book_introduction;
        $data['Description'] = $request->book_description;
        $data['PriceUnit'] = $request->book_priceunit;
        $data['Sale'] = $request->book_sale;
        $data['PriceSale'] = $request->book_pricesale;
        $data['Quantity'] = $request->book_quantity;
        $data['Quantity_buy'] = $request->book_quantitybuy;
        $data['Img'] = $request->book_img;
        $data['BookStatus'] = $request->book_status;
        DB::table('Book')->insert($data);
        return view('pages.save_book');
    }

    public function edit_book($bookid){
        $edit_book = DB::table('Book')->where('BookID',$bookid)->get();
        $author = DB::table('Author')->get();
        $producer =  DB::table('Producer')->get();
        $category =  DB::table('Category')->get();
        return view('admin.edit_book')->with('edit_book',$edit_book)->with('edit_book1', $author)->with('edit_book2',$producer)->with('edit_book3',$category);
    }

    public function update_book(Request $request,$bookid){
        $data = array();
        $data['BookName'] = $request->book_name;
        $data['AuthorID'] = $request->book_authorname;
        $data['ProducerID'] = $request->book_producername;
        $data['CategoryID'] = $request->book_categoryname;
        $data['Introduction'] = $request->book_intro;
        $data['Description'] = $request->book_des;
        $data['PriceUnit'] = $request->book_priceunit;
        $data['Sale'] = $request->book_sale;
        $data['PriceSale'] = $request->book_pricesale;
        $data['Quantity'] = $request->book_quantity;
        $data['Quantity_buy'] = $request->book_quantitybuy;
        $data['BookStatus'] = $request->book_status;
        DB::table('Book')->where('BookID',$bookid)->update($data);
        return Redirect::to('all-book');
    }

    public function delete_book($bookid){ 
        DB::table('Book')->where('BookID',$bookid)->delete();
        return Redirect::to('all-book');  
    }

    public function input_quantity($bookid) 
    {
        $add_quantity_book = DB::table('Book')->where('BookID',$bookid)->get();
        return view('admin.add_quantity_book')->with('add_quantity_book',$add_quantity_book);
    }

    public function save_quantity(Request $request, $bookid){ 
        $data = array();
        $data['Quantity'] =  $request->add_quantity + $request->quantity;
        DB::table('Book')->where('BookID',$bookid)->update($data);
        return Redirect::to('all-book');
    }
}