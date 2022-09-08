<?php

namespace App\Http\Controllers;

use Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

session_start();
class HomeController extends Controller
{


    public function index()
    {
        $relate_product = DB::table('book')->join('author', 'author.AuthorID', '=', 'book.AuthorID')->get();
        $detail_news = DB::table('news')->get();
        $slide = DB::table('slider')->where('SliderStatus', 1)->get();
        return view('pages.home')->with('relate_product', $relate_product)->with('news', $detail_news)->with('slide', $slide);
    }

    public function login()
    {
        return view('login');
    }

    public function signup()
    {
        return view('signup');
    }

    public function post_signup(Request $request)
    {
        $data1 = array();
        $data2 = array();
        $username = $request->username;
        $password = bcrypt($request->password);
        $email = $request->email;
        $name = $request->customername;

        if ($username == null || $password == null || $email == null || $name == null) {
            $alert_signup = 'Không được để trống thông tin.';
            return redirect()->back()->with('alert_signup', $alert_signup);
        } else {
            $username_check = DB::table('db_usert')->where('username', $username);
            if ($username_check == null) {
                $data2['username'] = $username;
                $data2['password'] = $password;
                $data2['Email'] = $email;
                $data2['CustomerName'] = $name;
                DB::table('customer')->insert($data2);

                $data1['username'] = $username;
                $data1['password'] = $password;
                $data1['Role'] = 2;
                $data1['Email'] = $email;
                $data1['CustomerID'] = ($custumerid = DB::table('customer')->where('username', $username)->pluck('CustomerID'))->first();
                DB::table('db_user')->insert($data1);
                $alert_signup = 'Đăng kí thành công.';
                return redirect()->back()->with('alert', $alert_signup);
            } else {
                $alert_signup = 'Tên đăng nhập đã tồn tại.';
                return redirect()->back()->with('alert_signup', $alert_signup);
            }
        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function gioi_thieu()
    {
        return view('introduce.introduce');
    }
    public function chinh_sach()
    {
        return view('chinhsach.chinhsach');
    }
    public function lien_he()
    {
        return view('lienhe.lienhe');
    }

    public function search_book(Request $request)
    {
        $search_book = DB::table('Book')
            ->join('Author', 'Author.AuthorID', '=', 'Book.AuthorID')
            ->join('Producer', 'Producer.ProducerID', '=', 'Book.ProducerID')
            ->join('Category', 'Category.CategoryID', '=', 'Book.CategoryID')
            ->where('BookName', 'like', '%' . $request->book . '%')
            ->orwhere('AuthorName', 'like', '%' . $request->book . '%')
            ->orwhere('ProducerName', 'like', '%' . $request->book . '%')
            ->orwhere('CategoryName', 'like', '%' . $request->book . '%')
            ->orwhere('BookID', 'like', '%' . $request->book . '%')->get();
        $search_author = DB::table('Author')->get();
        $producer =  DB::table('Producer')->get();
        $category =  DB::table('Category')->get();
        $detail_product = DB::table('book')->get();
        $author = DB::table('author')->get();
        $category = DB::table('category')->get();
        return view('pages.search_book_cs')->with('product', $detail_product)->with('author', $author)->with('category', $category)->with('search_book', $search_book)->with('all_book1', $search_author)->with('all_book2', $producer)->with('all_book3', $category);
    }

    public function filter_book(Request $request)
    {
        
        $author = $request->authorid;
        $price_check = $request->price;
        
        $category = $request->category;
        $query1[] = null;
        $query2[] = null; 
        $query3[] = null;
        if($author != null)
        {
            foreach ($author as $value) {
                $query = DB::table('Book')
                ->where('AuthorID', $value)->value('BookID');
                $query1[] = $query;
            }
        }
        
        if($price_check != null)
        {
            switch ((int)$price_check[0]) {
                    case 1:
                        $price_from = 0;
                        $price_to = 100000;
                        break;
                    case 2:
                        $price_from = 100000;
                        $price_to = 200000;
                        break;
                    case 3:
                        $price_from = 200000;
                        $price_to = 500000;
                        break;
                    case 4:
                        $price_from = 500000;
                        $price_to = 1000000;
                        break;
                    case 5:
                        $price_from = 1000000;
                        $price_to = 2000000;
                        break;
                    case 6:
                        $price_from = 2000000;
                        $price_to = 20000000000;
                        break;              
            }
            $count = DB::table('Book')->whereBetween('PriceSale', [$price_from, $price_to])->count();
            $query = DB::table('Book')
            ->whereBetween('PriceSale', [$price_from, $price_to])->get('BookID'); 
            for ($i = 0; $i < $count; $i++){
                $query2[$i] = (int)$query[$i]->BookID;
            }
        }

        if($category != null)
        {
            foreach ($category as $value) {
                $count = DB::table('Book')
                ->where('CategoryID', $value)->get('BookID')->count();
                $query = DB::table('Book')
                ->where('CategoryID', $value)->get('BookID');              
                for ($i = 0; $i < $count; $i++){
                    $query3[] = (int)$query[$i]->BookID;
                }
            }
        }
        
        $temp = array_intersect($query1,$query2);
        $query = array_intersect($temp,$query3);
        $query_book = DB::table('Book');
        if($query == null)
        {
            $result='Không có sản phẩm phù hợp.';
        }
        else
        {
            foreach ($query as $value) {
                $query_book->orWhere('BookID', $value);
            }
            $result = $query_book->get();
        }
        

        // $query_distinct = $query->unique();
        // $query = DB::table('Book');
        // foreach ($query_distinct as $value) {
        //     $query->orWhere('BookID', $value->BookID);
        // }
        // $result = $query->get();
        $author = DB::table('author')->get();
        $category = DB::table('category')->get();
        return view('pages.cs_all_product')->with('product', $result)->with('author', $author)->with('category', $category);
    }
}
