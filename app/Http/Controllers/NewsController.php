<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Redirect;

class NewsController extends Controller
{
    
    public function add_news(){
        return view('admin.add_news');
    }

    public function all_news(){
        $all_news = DB::table('News')->get();
        return view('admin.all_news')->with('all_news',$all_news);
    }

    public function save_news(Request $request){ 
        $data = array();
        $data['NewsName'] = $request->news_name;
        $data['NewsDay'] = $request->newsday;
        $data['NewsMonthYear'] = $request->newmonthyear;
        $data['Img'] = $request->news_img;
        $data['Introduction'] = $request->news_introduction;
        $data['Description'] = $request->news_description;
        DB::table('News')->insert($data);
        return view('pages.save_news');
    }

    public function edit_news($newsid){
        $edit_news = DB::table('News')->where('NewsID',$newsid)->get();
        return view('admin.edit_news')->with('edit_news',$edit_news);
    }

    public function update_news(Request $request, $newsid){
        $data = array();
        $data['NewsName'] = $request->news_name;
        $data['NewsDay'] = $request->newsday;
        $data['NewsMonthYear'] = $request->newmonthyear;
        $data['Introduction'] = $request->news_introduction;
        $data['Description'] = $request->news_description;
        DB::table('News')->where('NewsID',$newsid)->update($data);
        return Redirect::to('all-news');
    }


    public function delete_news($newsid){ 
        DB::table('News')->where('NewsID',$newsid)->delete();
        return Redirect::to('all-news');  
    }
}


