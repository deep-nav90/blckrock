<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Auth;
use DB;
use File;
use Session;

class ContactUsController extends Controller
{
    public function contactUsList(Request $request){
        if($request->isMethod('GET')){
            return view('admin.contact-us.list');
        }


        if($request->isMethod('POST')){

            $admin = auth()->guard('admin')->user();
            $column = "id";
            $asc_desc = $request->get("order")[0]['dir'];

            if($asc_desc == "asc"){
                $asc_desc = "desc";
            }else{
                $asc_desc = "asc";
            }

            $order = $request->get("order")[0]['column'];
            if($order == 0){
                $column = "id";
            }elseif($order == 1){
                $column = "name";
            }elseif($order == 2){
                $column = "email";
            }elseif($order == 3){
                $column = "subject";
            }elseif($order == 4){
                $column = "created_at";
            }
        

            $data = Contact::select("*",DB::raw('DATE_FORMAT(created_at, "%m-%d-%Y") AS date_show'))->whereDeletedAt(null)->orderBy($column,$asc_desc);
            $total = $data->get()->count();

            if(!empty($request->get("search")["value"])){
                $search = $request->get("search")["value"];
            }else{

                $search = $request->search_txt;
            }
            $filter = $total;


            if($search){
                $data  = $data->where(function($query) use($search){
                            $query->orWhere('name', 'Like', '%'. $search . '%');
                            $query->orWhere('email', 'Like', '%'. $search . '%');
                            $query->orWhere('subject', 'Like', '%'. $search . '%');
                            $query->orWhere(DB::raw('DATE_FORMAT(created_at, "%m-%d-%Y")'), 'Like', '%'. $search . '%');
                        });

                $filter = $data->get()->count();

            }

            $data = $data->offset($request->start);
            $data = $data->take($request->length);
            $data = $data->get();


            $start_from = $request->start;
            if($start_from == 0){
                $start_from  = 1;
            }
            if($start_from % 10 == 0){
                $start_from = $start_from + 1;
            }


            foreach ($data as $k => $row) {

                $btn ="";

                
                if(Auth::user()->can('view_contact_us')) {
                    $btn .= '<a class="action-button" title="View" href="view/'.$row->id.'"><i class="text-info fa fa-eye"></i></a>';
                   
                }

                if(Auth::user()->can('reply_contact_us')) {
                    $btn .= '<a class="action-button" title="Reply" href="mailto:'.$row->email.'"><i class="fa fa-reply"></i></a>';
                    
                }

                if(Auth::user()->can('delete_contact_us')) {
                    $btn .= '<a class="action-button delete-button" title="Delete" href="javascript:void(0)" data-id="'.$row->id.'"><i class="text-danger fa fa-trash-alt"></i></a>';
                    
                }

                $row->action = $btn;

                $row->DT_RowIndex = $start_from++;



            }


            $return_data = [
                    "data" => $data,
                    "draw" => (int)$request->draw,
                    "recordsTotal" => $total,
                    "recordsFiltered" => $filter,
                    "input" => $request->all()
            ];
            return response()->json($return_data);

        }

        
    }
    

    public function deleteContactUs(Request $request){
        Contact::find($request->id)->delete();
        Session::flash('success',"Contact Us Record has been deleted successfully.");
        return ["success" => 1];

    }

    public function viewContactUs(Request $request){
        $contact_us = Contact::whereId($request->id)->first();
        $contact_us_id = $request->id;
        
        return view('admin.contact-us.view',compact('contact_us','contact_us_id'));
    }
}
