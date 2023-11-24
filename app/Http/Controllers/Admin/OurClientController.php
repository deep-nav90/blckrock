<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OurClient;
use Auth;
use DB;
use File;
use Session;

class OurClientController extends Controller
{
    public static function uploadFile($file, $destinationPath){
        $fileName = date('mdYHis') . uniqid().'.'.$file->getClientOriginalExtension();
        $file->move($destinationPath, $fileName);

        return $fileName;
    }


    public function ourClientList(Request $request){
        if($request->isMethod('GET')){
            return view('admin.our-client.list');
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
                $column = "our_client_name";
            }elseif($order == 2){
                $column = "title";
            }elseif($order == 3){
                $column = "created_at";
            }
        

            $data = OurClient::select("*",DB::raw('DATE_FORMAT(created_at, "%m-%d-%Y") AS date_show'))->whereDeletedAt(null)->orderBy($column,$asc_desc);
            $total = $data->get()->count();

            if(!empty($request->get("search")["value"])){
                $search = $request->get("search")["value"];
            }else{

                $search = $request->search_txt;
            }
            $filter = $total;


            if($search){
                $data  = $data->where(function($query) use($search){
                            $query->orWhere('our_client_name', 'Like', '%'. $search . '%');
                            $query->orWhere('title', 'Like', '%'. $search . '%');
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

                
                if(Auth::user()->can('view_our_client')) {
                    $btn .= '<a class="action-button" title="View" href="view/'.$row->id.'"><i class="text-info fa fa-eye"></i></a>';
                   
                }

                if(Auth::user()->can('edit_our_client')) {
                    $btn .= '<a class="action-button" title="Edit" href="edit/'.$row->id.'"><i class="text-warning fa fa-edit"></i></a>';
                    
                }

                if(Auth::user()->can('delete_our_client')) {
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

    public function addOurClient(Request $request){
        if($request->isMethod('GET')){
            return view('admin.our-client.add');
        }

        if($request->isMethod('POST')){
            $data = $request->all();

            

            $our_client_name = $request->our_client_name;
            $check_exists = OurClient::whereOurClientName($our_client_name)->whereDeletedAt(null)->first();
            if($check_exists){
                return ['status' => 'false', 'message' =>  "Our Client Name already exists."];
            }

            $our_client = new OurClient();
            $our_client->fill($data);
            $our_client->save();
            return ['status' => 'true', 'message' =>  "Our Client added successfully."];
        }
    }

    public function editOurClient(Request $request){
        if($request->isMethod('GET')){
            $our_client_id = $request->id;
            $our_client = OurClient::whereId($request->id)->first();
            
            return view('admin.our-client.edit',compact('our_client','our_client_id'));
        }

        if($request->isMethod('POST')){
            //return $request->all();
            $our_client = OurClient::whereId($request->id)->first();
            $data = $request->all();
            $check_exists = OurClient::whereOurClientName($data['our_client_name'])->where('id', '!=', $request->id)->whereDeletedAt(null)->first();
            if($check_exists){
                return ['status' => 'false', 'message' =>  "Our Client Name already exists."];
            }

            
            $our_client->our_client_name = $data['our_client_name'];
            $our_client->title = $data['title'];
            $our_client->description = $data['description'];
            $our_client->update();
            return ['status' => 'true', 'message' =>  "Our Client updated successfully."];
        }
    }

    public function checkOurClientNameExists(Request $request){
        $our_client_name = $request->our_client_name;
        $id = $request->id;
        if($id){
            $check_exists = OurClient::whereOurClientName($our_client_name)->where('id','!=',$id)->whereDeletedAt(null)->first();
        }else{
            $check_exists = OurClient::whereOurClientName($our_client_name)->whereDeletedAt(null)->first();
        }
        
        if($check_exists){
            return true;
        }else{
            return false;
        }

    }

    public function deleteOurClient(Request $request){
        OurClient::find($request->id)->delete();
        Session::flash('success',"Our Client has been deleted successfully.");
        return ["success" => 1];

    }

    public function viewOurClient(Request $request){
        $our_client_id = $request->id;
        $our_client = OurClient::whereId($request->id)->first();
        
        return view('admin.our-client.view',compact('our_client','our_client_id'));
    }
}
