<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{
    public function index(){
      
        return view('pages.contact');
    }

    public function add_contact(){
           $this->AdminAuthCheck();
        return view('admin.add_contact');
    }

    
    public function save_contact(Request $request){

        $data = array();
        $data['contact_id'] = $request->contact_id;
        $data['contact_company_name'] = $request->contact_company_name;
        $data['contact_address1'] = $request->contact_address1;
        $data['contact_city'] = $request->contact_city;
        $data['contact_mobile_number'] = $request->contact_mobile_number;
        $data['contact_fax'] = $request->contact_fax;
        $data['contact_email'] = $request->contact_email;
        $data['publication_status'] = $request->publication_status;

        DB::table('tbl_contact')->insert($data);
        Session::put('message','Contact added succesfully!!');
        return Redirect::to('/add-contact');
    }
    
    public function all_contact(){
        $this->AdminAuthCheck();
        $all_contact_info = DB::table('tbl_contact')->get();
        $manage_contact = view('admin.all_contact')
                ->with('all_contact_info', $all_contact_info);
        return view('admin_layout')
            ->with('admin.all_contact', $manage_contact);  

        //return view('admin.all_category');
    }

    public function inactive_contact($contact_id){
        DB::table('tbl_contact')
          ->where('contact_id', $contact_id)
          ->update(['publication_status' => 0]);
          Session::put('message','Inactivated Successfully !!');
          return Redirect::to('/all-contact');
      }
  
      public function active_contact($contact_id){
          DB::table('tbl_contact')
            ->where('contact_id', $contact_id)
            ->update(['publication_status' => 1]);
            Session::put('message','Activated Successfully !!');
            return Redirect::to('/all-contact');
        }

        public function edit_contact($contact_id){
            $contact_info = DB::table('tbl_contact')
                   ->where('contact_id',$contact_id)
                   ->first();
    
            $contact_info = view('admin.edit_contact')
                ->with('contact_info',$contact_info);
                
           Session::put('message', 'Contact Edited Successfully');
           return view('admin_layout')
                ->with('admin.edit_contact', $contact_info); 
        }
    
        public function update_contact(Request $request, $contact_id){
    
            $data = array();
    
            $data['contact_company_name'] = $request->contact_company_name;
            $data['contact_address1'] = $request->contact_address1;
            $data['contact_city'] = $request->contact_city;
            $data['contact_mobile_number'] = $request->contact_mobile_number;
            $data['contact_fax'] = $request->contact_fax;
            $data['contact_email'] = $request->contact_email;
    
            DB::table('tbl_contact')
                ->where('contact_id', $contact_id)
                ->update($data);
    
            Session::put('message', 'Contact Updated Successfully');
            
            return Redirect::to('/all-contact');
        }
    
        public function delete_contact($contact_id){
            
          DB::table('tbl_contact')
            ->where('contact_id',$contact_id)
            ->delete();
            Session::put('message', 'Contact Deleted Successfully');
           return Redirect::to('/all-contact');
        }



        public function save_inquiry(Request $request){
            $data = array();
            $data['inquiry_name'] = $request->name;
            $data['inquiry_email'] = $request->email;
            $data['inquiry_subject'] = $request->subject;
            $data['inquiry_message'] = $request->message;
    
            DB::table('tbl_inquiry')->insert($data);
            Session::put('message','Submitted Succesfully!!');
            return Redirect::to('/contact');
        }



        public function all_inquiry(){


            $this->AdminAuthCheck();
            $all_inquiry_info = DB::table('tbl_inquiry')->get();
            $manage_inquiry = view('admin.all_inquiry')
                    ->with('all_inquiry_info', $all_inquiry_info);
    
            return view('admin_layout')
                ->with('admin.all_inquiry', $manage_inquiry);   
                     
            //return view('admin.all_category');
        }

    public function AdminAuthCheck(){
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return;
        } else {
             return Redirect::to('/admin')->send();
        }
        
    }


}
