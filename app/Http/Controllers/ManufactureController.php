<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class ManufactureController extends Controller
{

    public function AdminAuthCheck(){
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return;
        } else {
             return Redirect::to('/admin')->send();
        }
        
    }

    public function index(){
        $this->AdminAuthCheck();
        return view('admin.add_manufacture');
    } 

    public function all_manufacture(){
        $this->AdminAuthCheck();
        $all_manufacture_info = DB::table('tbl_manufacture')->get();
        $manage_manufacture = view('admin.all_manufacture')
                ->with('all_manufacture_info', $all_manufacture_info);

        return view('admin_layout')
            ->with('admin.all_manufacture', $manage_manufacture);        
        //return view('admin.all_category');
    }

    public function save_manufacture(Request $request){

        $data = array();
        $data['manufacture_id'] = $request->manufacture_id;
        $data['manufacture_name'] = $request->manufacture_name;
        $data['manufacture_description'] = $request->manufacture_description;
        $data['publication_status'] = $request->publication_status;

        DB::table('tbl_manufacture')->insert($data);
        Session::put('message','Manufacture added succesfully!!');
        return Redirect::to('/add-manufacture');
    }


    public function inactive_manufacture($manufacture_id){
        DB::table('tbl_manufacture')
          ->where('manufacture_id', $manufacture_id)
          ->update(['publication_status' => 0]);
          Session::put('message','Inactivated Successfully !!');
          return Redirect::to('/all-manufacture');
      }
  
    public function active_manufacture($manufacture_id){
          DB::table('tbl_manufacture')
            ->where('manufacture_id', $manufacture_id)
            ->update(['publication_status' => 1]);
            Session::put('message','Activated Successfully !!');
            return Redirect::to('/all-manufacture');
        }

    public function edit_manufacture($manufacture_id){
            $manufacture_info = DB::table('tbl_manufacture')
                   ->where('manufacture_id',$manufacture_id)
                   ->first();
    
            $manufacture_info = view('admin.edit_manufacture')
                ->with('manufacture_info',$manufacture_info);
           Session::put('message', 'Manufacture Edited Successfully');
           return view('admin_layout')
                ->with('admin.edit_manufacture', $manufacture_info); 
        }
    
    public function update_manufacture(Request $request, $manufacture_id){
    
            $data = array();
    
            $data['manufacture_name'] = $request->manufacture_name;
            $data['manufacture_description'] = $request->manufacture_description;
    
            DB::table('tbl_manufacture')
                ->where('manufacture_id', $manufacture_id)
                ->update($data);
    
            Session::put('message', 'Manufacture Updated Successfully');
            
            return Redirect::to('/all-manufacture');
        }
    
    public function delete_manufacture($manufacture_id){
           
          DB::table('tbl_manufacture')
            ->where('manufacture_id',$manufacture_id)
            ->delete();
            Session::put('message', 'Manufacture Deleted Successfully');
           return Redirect::to('/all-manufacture');
    }
}

