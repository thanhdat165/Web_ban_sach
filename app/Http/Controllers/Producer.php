<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Redirect;

class Producer extends Controller
{
    public function search_producer(Request $request){
        $search_producer = DB::table('Producer')->where('ProducerName', 'like', '%'.$request->producer.'%')->orwhere('ProducerID', 'like', '%'.$request->producer.'%')->get();
        return view('admin.search_producer')->with('search_producer', $search_producer);
    }
    
    public function add_producer(){
        return view('admin.add_producer');
    }

    public function all_producer(){
        $all_producer = DB::table('Producer')->get();
        return view('admin.all_producer')->with('all_producer',$all_producer);
        //return view('admin_layout')->with('admin.all_producer',$manager_producer);
    }

    public function save_producer(Request $request){ 
        $data = array();
        $data['ProducerName'] = $request->producer_name;
        $data['producerStatus'] = $request->producer_status;
        DB::table('Producer')->insert($data);
        return view('pages.save_producer');
    }

    public function edit_producer($producerid){
        $edit_producer = DB::table('Producer')->where('ProducerID',$producerid)->get();
        return view('admin.edit_producer')->with('edit_producer',$edit_producer);
    }

    public function update_producer(Request $request,$producerid){
        $data = array();
        $data['ProducerName'] = $request->producer_name;
        $data['ProducerStatus'] = $request->producer_status;
        DB::table('Producer')->where('ProducerID',$producerid)->update($data);
        return Redirect::to('all-producer');
    }
    
    public function delete_producer($producerid){ 
        DB::table('Producer')->where('ProducerID',$producerid)->delete();
        return Redirect::to('all-producer');  
    }
}