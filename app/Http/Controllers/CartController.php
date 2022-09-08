<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Cart;

session_start();
class CartController extends Controller
{
    public function save_cart(Request $request)
    {
        $bookid = $request->book_id;
        $quantity = $request->quantity;
        $product_info  = DB::table('book')->where('BookID', $bookid)->first();
        $data['id'] = $product_info->BookID;
        $data['name'] = $product_info->BookName;
        $data['price'] = $product_info->PriceSale;
        $data['weight'] = '1';
        $data['qty'] = $quantity;
        $img = $product_info->Img;
        $data['options']['image'] = $img;
        $value = $request->session()->get('login');
        $username = $request->session()->get('username');
        if (Auth::check() == true) {
            $data1 = array();
            $data1['id'] = $product_info->BookID;
            $data1['name'] = $product_info->BookName;
            $data1['price'] = $product_info->PriceSale;
            $data1['weight'] = '1';
            $data1['qty'] = $quantity;
            $img = $product_info->Img;
            $data1['image'] = $img;
            $data1['username'] = Auth::user()->username;
            if(DB::table('cart')->where('username',Auth::user()->username)->where('id',$product_info->BookID)->exists())
            {
                DB::table('cart')->where('username',Auth::user()->username)->where('id',$product_info->BookID)->delete();
            }
            $data1['sum'] = $data1['price']*$data1['qty'];
            DB::table('cart')->insert($data1);
        }
        else
        {
            Cart::add($data);
        }
        return Redirect::to('/cart');
    }

    public function delete_cart($rowId)
    {
        if(Auth::check()==true)
        {
            DB::table('cart')->where('username',Auth::user()->username)->where('id',$rowId)->delete();
        }
        else
        {
            Cart::update($rowId, 0);
        }
        
        return Redirect::to('/cart');
    }

    public function update_cart(Request $request)
    {
        if(Auth::check()==true)
        {
            $id = $request->BookID;
            $qty = $request->quantity;
            $sum = $request->quantity*$request->price;
            $data = array();
            $data['qty'] = $qty;
            $data['sum'] = $sum;
            DB::table('cart')->where('username',Auth::user()->username)->where('id',$id)->update($data);
        }
        else
        {
            $rowId = $request->RowID;
            $qty = $request->quantity;
            Cart::update($rowId, $qty);
        }
        return Redirect::to('/cart');
    }

    public function checkout()
    {
        if(Auth::check()==true)
        {
            $cart = DB::table('cart')->get()->where('username',Auth::user()->username);
            $total = DB::table('cart')->where('username',Auth::user()->username)->sum('sum');
            return view('cart.checkout')->with('cart',$cart)->with('total',$total);
        }
        else
        {
            return view('cart.checkout');
        }
        
    }

    public function get_payment()
    {
        echo 1;
    }

    public function post_payment(Request $request)
    {
        
        if($request->id == null)
        {
            dd('khong co hang');
        }
        $qty = $request->qty;
        $id = $request->id;
        $count = count($id);
        $price = $request->price;
        $name = $request->name;
        $address = $request->address;
        $note = $request->note;
        (float)$total = $request->total;
        if(Auth::check()==true)
        {
            $customerid = Auth::user()->CustomerID;
            $id_order = DB::table('db_order')->insertGetId(['CustomerName'=>$name,'CustomerID'=>$customerid,'Address'=> $address,'Total'=>$total,'Note'=>$note]);
        }
        else
        {
            $id_order = DB::table('db_order')->insertGetId(['CustomerName'=>$name,'Address'=> $address,'Total'=>$total,'Note'=>$note]);
        }
        for ($i = 0; $i < $count; $i++) {
            $data = array();
            $data['OrderID'] = $id_order;
            $data['BookID'] = $id[$i];
            $data['Quantity'] = $qty[$i];
            $data['Price'] = $price[$i];
            DB::table('orderdetail')->insert($data);
        }
        if(Auth::check() == true)
        {
            $data1 = DB::table('cart')->where('username',Auth::user()->username)->get();
            $data = array();
            $count = 0;
            foreach($data1 as $cart_content)
            {
                $data['weight'] = '1';
                $data['qty'] = $cart_content->qty;
                $data['price'] = $cart_content->price;
                $img = $cart_content->image;
                $data['image'] = $img;
                $data['username'] = Auth::user()->username;
                $data['sum'] = $data['price']*$data['qty'];
                $old_qty[] = DB::table('book')->where('BookID',$id[$count])->value('Quantity');
                $data_qty_book['Quantity'] = (int)$old_qty[$count] - (int)$qty[$count];
                DB::table('Book')->where('BookID',$id[$count])->update($data_qty_book);
                $count++;      
                DB::table('check_order')->insert($data);
            }
            DB::table('cart')->where('username',Auth::user()->username)->delete();
        }
        return Redirect::to('/cart');       
    }

    public function show_order()
    {
        if(Auth::check()==true)
        {
            $check = DB::table('check_order')->get()->where('username',Auth::user()->username);
            $total = DB::table('cart')->where('username',Auth::user()->username)->sum('sum');
            return view('cart.order')->with('cart',$check)->with('total',$total);
        }
    }

    public function show_cart()
    {
        if(Auth::check()==true)
        {
            $cart = DB::table('cart')->where('username',Auth::user()->username)->join('Book','cart.id','=','Book.BookID')->get();
            //dd($cart);
            $total = DB::table('cart')->where('username',Auth::user()->username)->sum('sum');
            return view('cart.show_cart')->with('cart',$cart)->with('total',$total);
        }
        return view('cart.show_cart');
    }
}
