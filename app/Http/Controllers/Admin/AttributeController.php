<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Attribute;
use Auth;
use DB;
use File;
use Session;

class AttributeController extends Controller
{
    public static function uploadFile($file, $destinationPath){
        $fileName = date('mdYHis') . uniqid().'.'.$file->getClientOriginalExtension();
        $file->move($destinationPath, $fileName);

        return $fileName;
    }


    public function attributeList(Request $request){
        if($request->isMethod('GET')){
            return view('admin.attribute.list');
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
                $column = "attribute_name";
            }elseif($order == 2){
                $column = "status";
            }elseif($order == 3){
                $column = "created_at";
            }
        

            $data = Attribute::select("*",DB::raw('DATE_FORMAT(created_at, "%m-%d-%Y") AS date_show'))->whereDeletedAt(null)->orderBy($column,$asc_desc);
            $total = $data->get()->count();

            if(!empty($request->get("search")["value"])){
                $search = $request->get("search")["value"];
            }else{

                $search = $request->search_txt;
            }
            $filter = $total;


            if($search){
                $data  = $data->where(function($query) use($search){
                            $query->orWhere('attribute_name', 'Like', '%'. $search . '%');
                            $query->orWhere('status', 'Like', '%'. $search . '%');
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

                
                if(Auth::user()->can('view_attribute')) {
                    $btn .= '<a class="action-button" title="View" href="view/'.$row->id.'"><i class="text-info fa fa-eye"></i></a>';
                   
                }

                if(Auth::user()->can('edit_attribute')) {
                    $btn .= '<a class="action-button" title="Edit" href="edit/'.$row->id.'"><i class="text-warning fa fa-edit"></i></a>';
                    
                }

                if(Auth::user()->can('delete_attribute')) {
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

    public function addAttribute(Request $request){
        if($request->isMethod('GET')){
            return view('admin.attribute.add');
        }

        if($request->isMethod('POST')){
            $data = $request->all();

            

            $attribute_name = $request->attribute_name;
            $check_exists = Attribute::whereAttributeName($attribute_name)->whereDeletedAt(null)->first();
            if($check_exists){
                return ['status' => 'false', 'message' =>  "Attribute Name already exists."];
            }

            $attribute = new Attribute();
            $attribute->fill($data);
            $attribute->save();
            return ['status' => 'true', 'message' =>  "Attribute added successfully."];
        }
    }

    public function editAttribute(Request $request){
        if($request->isMethod('GET')){
            $attribute_id = $request->id;
            $attribute = Attribute::whereId($request->id)->first();
            
            return view('admin.attribute.edit',compact('attribute','attribute_id'));
        }

        if($request->isMethod('POST')){
            //return $request->all();
            $attribute = Attribute::whereId($request->id)->first();
            $data = $request->all();
            $check_exists = Attribute::whereAttributeName($data['attribute_name'])->where('id', '!=', $request->id)->whereDeletedAt(null)->first();
            if($check_exists){
                return ['status' => 'false', 'message' =>  "Attribute Name already exists."];
            }

            
            $attribute->attribute_name = $data['attribute_name'];
            $attribute->meta_keyword = $data['meta_keyword'];
            $attribute->meta_description = $data['meta_description'];
            $attribute->status = $data['status'];
            $attribute->update();
            return ['status' => 'true', 'message' =>  "Attribute updated successfully."];
        }
    }

    public function checkAttributeNameExists(Request $request){
        $attribute_name = $request->attribute_name;
        $id = $request->id;
        if($id){
            $check_exists = Attribute::whereAttributeName($attribute_name)->where('id','!=',$id)->whereDeletedAt(null)->first();
        }else{
            $check_exists = Attribute::whereAttributeName($attribute_name)->whereDeletedAt(null)->first();
        }
        
        if($check_exists){
            return true;
        }else{
            return false;
        }

    }

    public function deleteAttribute(Request $request){
        Attribute::find($request->id)->delete();
        Session::flash('success',"Attribute has been deleted successfully.");
        return ["success" => 1];

    }

    public function viewAttribute(Request $request){
        $attribute_id = $request->id;
        $attribute = Attribute::whereId($request->id)->first();
        
        return view('admin.attribute.view',compact('attribute','attribute_id'));
    }
}