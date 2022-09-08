<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Redirect;


class News extends Controller
{
    public function show_news()
    {
        $all_news = DB::table('News')->get();
        return view('news.news')->with('news',$all_news);
    }

    public function detail_news($newsid)
    {
        $detail_news = DB::table('News')->where('NewsID',$newsid)->get();
        return view('news.news_detail')->with('news',$detail_news);
    }
}
