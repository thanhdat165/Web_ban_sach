<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Redirect;

class Author extends Controller
{
    public function search_author(Request $request){
        $search_author = DB::table('Author')->where('AuthorName', 'like', '%'.$request->author.'%')
        ->orwhere('Email', 'like', '%'.$request->author.'%')
        ->orwhere('Phone', 'like', '%'.$request->author.'%')
        ->orwhere('AuthorID', 'like', '%'.$request->author.'%')->get();
        return view('admin.search_author')->with('search_author', $search_author);
    }

    public function add_author(){
        return view('admin.add_author');
    }

    public function all_author(){
        $all_author = DB::table('Author')->get();
        $manager_author = view('admin.all_author')->with('all_author', $all_author);
        return view('admin_layout')->with('admin.all_author',$manager_author);
    }

    public function save_author(Request $request){ 
        $data = array();
        $data['AuthorName'] = $request->author_name;
        $data['Email'] = $request->author_email;
        $data['Phone'] = $request->author_phone;
        $data['Gender'] = $request->author_gender;
        $data['AuthorStatus'] = $request->author_status;
        DB::table('author')->insert($data);
        return view('pages.save_author');
    }

    public function edit_author($authorid){
        $edit_author = DB::table('Author')->where('AuthorID',$authorid)->get();
        $manager_author = view('admin.edit_author')->with('edit_author',$edit_author);
        return view ('admin_layout')->with('admin.edit_author',$manager_author);
    }

    public function update_author(Request $request,$authorid){
        $data = array();
        $data['AuthorName'] = $request->author_name;
        $data['Email'] = $request->author_email;
        $data['Phone'] = $request->author_phone;
        $data['Gender'] = $request->author_gender;
        $data['AuthorStatus'] = $request->author_status;
        DB::table('Author')->where('AuthorID',$authorid)->update($data);
        return Redirect::to('all-author');
    }
    
    public function delete_author($authorid){ 
        DB::table('Author')->where('AuthorID',$authorid)->delete();
        return Redirect::to('all-author');  
    }
}
