<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Redirect;

class Category extends Controller
{
    public function search_category(Request $request){
        $search_category = DB::table('Category')->where('CategoryName', 'like', '%'.$request->category.'%')->orwhere('CategoryID', 'like', '%'.$request->category.'%')->get();
        return view('admin.search_category')->with('search_category', $search_category);
    }
    
    public function add_category(){
        return view('admin.add_category');
    }

    public function all_category(){
        $all_category = DB::table('Category')->get();
        $manager_category = view('admin.all_category')->with('all_category',$all_category);
        return view('admin_layout')->with('admin.all_category',$manager_category);
    }

    public function save_category(Request $request){ 
        $data = array();
        $data['categoryname'] = $request->category_name;
        $data['ParentID'] = $request->category_parentname;
        $data['CategoryStatus'] = $request->category_status;
        echo $request->category_name;
        DB::table('category')->insert($data);
        return view('pages.save_category');
    }

    public function edit_category($categoryid){
        $edit_category = DB::table('Category')->where('CategoryID',$categoryid)->get();
        $manager_category = view('admin.edit_category')->with('edit_category',$edit_category);
        return view ('admin_layout')->with('admin.edit_category',$manager_category);
    }

    public function update_category(Request $request,$categoryid){
        $data = array();
        $data['categoryname'] = $request->category_name;
        $data['CategoryStatus'] = $request->category_status;
        DB::table('category')->where('CategoryID',$categoryid)->update($data);
        return Redirect::to('all-category');
    }
    
    public function delete_category($categoryid){ 
        DB::table('Category')->where('CategoryID',$categoryid)->delete();
        return Redirect::to('all-category');  
    }
}
