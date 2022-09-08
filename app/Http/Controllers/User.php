<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Redirect;

class User extends Controller
{
    public function search_user(Request $request){
        $search_user = DB::table('db_user')->where('Username', 'like', '%'.$request->user.'%')
        ->orwhere('Email', 'like', '%'.$request->user.'%')
        ->orwhere('Phonenumber', 'like', '%'.$request->user.'%')
        ->orwhere('UserID', 'like', '%'.$request->user.'%')->get();
        return view('admin.search_user')->with('search_user', $search_user);
    }

    public function add_user(){
        return view('admin.add_user');
    }

    public function all_user(){
        $all_user = DB::table('db_user')->get();
        return view('admin.all_user')->with('all_user',$all_user);
    }

    public function edit_user($userid){
        $edit_user = DB::table('db_user')->where('UserID',$userid)->get();
        return view('admin.edit_user')->with('edit_user',$edit_user);
    }

    public function save_user(Request $request){ 
        $data = array();
        $data['Username'] = $request->username;
        $data['Password'] = $request->password;
        $data['Role'] = $request->role;
        $data['Gender'] = $request->gender;
        $data['PhoneNumber'] = $request->phonenumber;
        $data['Email'] = $request->email;
        $data['Address'] = $request->address;
        $data['UserStatus'] = $request->status;
        DB::table('db_user')->insert($data);
        return view('pages.save_user');
    }

    public function delete_user($userid){ 
        DB::table('db_user')->where('UserID',$userid)->delete();
        return Redirect::to('all-user');  
    }

    public function update_user(Request $request,$userid){
        $data = array();
        $data['Username'] = $request->username;
        $data['Password'] = $request->password;
        $data['Role'] = $request->role;
        $data['Gender'] = $request->gender;
        $data['PhoneNumber'] = $request->phonenumber;
        $data['Email'] = $request->email;
        $data['Address'] = $request->address;
        $data['UserStatus'] = $request->status;
        DB::table('db_user')->where('UserID',$userid)->update($data);
        return Redirect::to('all-user');
    }

    public function active_user($userid)
    {
        DB::table('db_user')->where('UserID',$userid)->update(['UserStatus'=>1]);
        return Redirect::to('all-user'); 
    }

    public function unactive_user($userid)
    {
        DB::table('db_user')->where('UserID',$userid)->update(['UserStatus'=>0]);
        return Redirect::to('all-user'); 
    }
}