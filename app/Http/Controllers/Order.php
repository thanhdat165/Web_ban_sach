<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Redirect;
use PDF;

class Order extends Controller
{
   public function all_order(){
        $all_order = DB::table('db_order')->get();
        $customer = DB::table('Customer')->get();
        return view('admin.all_order')->with('all_order', $all_order)->with('all_customer', $customer);
    }

    public function detail_order($orderid)
    {
        $customer = DB::table('Customer')->get();
        $orderdetail = DB::table('Orderdetail')->where('OrderID',$orderid)->get();
        $book = DB::table('Book')->get();
        $province = DB::table('Province')->get();
        $district = DB::table('District')->get();
        $detail_order = DB::table('db_order')->where('OrderID',$orderid)->get();
        return view('admin.detail_order')->with('detail_order',$detail_order)
        ->with('all_orderdetail', $orderdetail)
        ->with('all_customer', $customer)
        ->with('all_province', $province)
        ->with('all_book', $book)
        ->with('all_district', $district);
    }

    public function print_order($orderid)
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_order_convert($orderid));
        return $pdf->stream();
    }

    public function print_order_convert($orderid)
    {
        $customer1 = DB::table('Customer')->get();
        $orderdetail1 = DB::table('Orderdetail')->where('OrderID',$orderid)->get();
        $book1 = DB::table('Book')->get();
        $detail_order1 = DB::table('db_order')->where('OrderID',$orderid)->get();
        return view('admin.print_detail_order')->with('detail_order1',$detail_order1)
        ->with('all_orderdetail1', $orderdetail1)
        ->with('all_customer1', $customer1)
        ->with('all_book1', $book1);
    }

    public function search_order(Request $request){
        $search_order = DB::table('db_order')
        ->join('Customer','Customer.CustomerID','=','db_order.CustomerID')
        ->where('OrderID', 'like', '%'.$request->order.'%')       
        ->orwhere('username', 'like', '%'.$request->order.'%')->get();        
        $customer = DB::table('Customer')->get();
        return view('admin.search_order')->with('search_order', $search_order)->with('search_customer',$customer);
    }

    public function edit_order($orderid){
        $edit_order = DB::table('db_order')->where('OrderID',$orderid)->get();
        return view ('admin.edit_order')->with('edit_order',$edit_order);
    }

    public function update_orderstatus(Request $request,$orderid){
        $data = array();
        $data['OrderStatus'] = $request->order_status;
        DB::table('db_order')->where('OrderID',$orderid)->update($data);
        return Redirect::to('all-order');
    }
}