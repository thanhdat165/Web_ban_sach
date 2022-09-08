<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Middleware\AccessPermission;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cart;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\User;
session_start();
class AdminController extends Controller
{
    public function index()
    {
        return view('admin_layout');
    }

    public function show_dashboard()
    {
        return view('admin_layout');
    }

    public function get_login()
    {
        return view('login');
    }


    public function post_login(Request $request)
    {
        $user_data = [
            'username' => $request->get('username'),
            'password' => $request->get('password')
        ];
        if (Auth::attempt($user_data) && Auth::user()->Role == 1) {
            return Redirect()->route(route: 'show_admin');
        } else if (Auth::attempt($user_data) && Auth::user()->Role == 2) {
            session()->put('login', true);
            $name = DB::table('customer')->where('username', $request->get('username'))->pluck('CustomerName')->first();
            $customerid = ($custumerid = DB::table('customer')->where('username', $request->get('username'))->pluck('CustomerID'))->first();
            session()->put('name', $name);
            session()->put('username', $request->get('username'));
            session()->put('id', $customerid);
            $content = Cart::content();
            foreach ($content as $cart_content) {
                $data1 = array();
                $data1['id'] = $cart_content->id;
                $data1['name'] = $cart_content->name;
                $data1['price'] = $cart_content->price;
                $data1['weight'] = '1';
                $data1['qty'] = $cart_content->qty;
                $data1['image'] = $cart_content->options->image;
                $data1['username'] = Auth::user()->username;
                if (DB::table('cart')->where('username', Auth::user()->username)->where('id', $cart_content->id)->exists()) {
                    DB::table('cart')->where('username', Auth::user()->username)->where('id', $cart_content->id)->delete();
                }
                $data1['sum'] = $data1['price'] * $data1['qty'];
                DB::table('cart')->insert($data1);
            }

            return Redirect()->route(route: 'home')->with('success', 'Đăng nhập thành công.');
        }
        $alert='Sai tài khoản hoặc mật khẩu.';
        return redirect()->back()->with('alert',$alert);
    }

    public function get_logout(Request $request)
    {
        $request->session()->flush();
        return Redirect()->route('login.get');
    }
}
