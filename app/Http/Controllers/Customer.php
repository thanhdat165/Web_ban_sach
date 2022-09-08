<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Redirect;

class Customer extends Controller
{    
    public function all_customer(){
        $all_customer = DB::table('Customer')->get();
        return view('admin.all_customer')->with('all_customer',$all_customer);
    }

    public function delete_customer($customerid){ 
        DB::table('Customer')->where('CustomerID',$customerid)->delete();
        return Redirect::to('all-customer');  
    }

    public function active_customer($customerid)
    {
        DB::table('Customer')->where('CustomerID',$customerid)->update(['CustomerStatus'=>1]);
        return Redirect::to('all-customer'); 
    }

    public function unactive_customer($customerid)
    {
        DB::table('Customer')->where('CustomerID',$customerid)->update(['CustomerStatus'=>0]);
        return Redirect::to('all-customer'); 
    }
    public function search_customer(Request $request){
        $search_customer = DB::table('Customer')
        ->where('CustomerName', 'like', '%'.$request->customer.'%')
        ->orwhere('username', 'like', '%'.$request->customer.'%')
        ->orwhere('CustomerID', 'like', '%'.$request->customer.'%')->get();
        return view('admin.search_customer')->with('search_customer', $search_customer);
    }
}