<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Coupon;
use Auth;
use DB;
use File;
use Session;
use Str;

class CouponController extends Controller
{
    public static function uploadFile($file, $destinationPath){
        $fileName = date('mdYHis') . uniqid().'.'.$file->getClientOriginalExtension();
        $file->move($destinationPath, $fileName);

        return $fileName;
    }


    public function CouponList(Request $request){
        if($request->isMethod('GET')){
            return view('admin.coupon.list');
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
                $column = "coupon_name";
            }elseif($order == 2){
                $column = "coupon_type";
            }elseif($order == 3){
                $column = "coupon_amount_and_percentage";
            }elseif($order == 4){
                $column = "status";
            }elseif($order == 5){
                $column = "created_at";
            }
        

            $data = Coupon::select("*",DB::raw('DATE_FORMAT(created_at, "%m-%d-%Y") AS date_show'))->whereDeletedAt(null)->orderBy($column,$asc_desc);
            $total = $data->get()->count();

            if(!empty($request->get("search")["value"])){
                $search = $request->get("search")["value"];
            }else{

                $search = $request->search_txt;
            }
            $filter = $total;


            if($search){
                $data  = $data->where(function($query) use($search){
                            $query->orWhere('coupon_name', 'Like', '%'. $search . '%');
                            $query->orWhere('coupon_type', 'Like', '%'. $search . '%');
                            $query->orWhere('coupon_amount_and_percentage', 'Like', '%'. $search . '%');
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

                
                if(Auth::user()->can('view_coupon')) {
                    $btn .= '<a class="action-button" title="View" href="view/'.$row->id.'"><i class="text-info fa fa-eye"></i></a>';
                   
                }

                if(Auth::user()->can('edit_coupon')) {
                    $btn .= '<a class="action-button" title="Edit" href="edit/'.$row->id.'"><i class="text-warning fa fa-edit"></i></a>';
                    
                }

                if(Auth::user()->can('delete_coupon')) {
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

    public function addCoupon(Request $request){
        if($request->isMethod('GET')){
            return view('admin.coupon.add');
        }

        if($request->isMethod('POST')){
            $data = $request->all();

            

            $coupon_name = $request->coupon_name;
            $check_exists = Coupon::whereCouponName($coupon_name)->whereDeletedAt(null)->first();
            if($check_exists){
                return ['status' => 'false', 'message' =>  "Coupon Name already exists."];
            }

            $data['coupon_code'] = Str::random(8);

            $coupon = new Coupon();
            $coupon->fill($data);
            $coupon->save();
            return ['status' => 'true', 'message' =>  "Coupon added successfully."];
        }
    }

    public function editCoupon(Request $request){
        if($request->isMethod('GET')){
            $coupon_id = $request->id;
            $coupon = Coupon::whereId($request->id)->first();
            
            return view('admin.coupon.edit',compact('coupon','coupon_id'));
        }

        if($request->isMethod('POST')){
            //return $request->all();
            $coupon = Coupon::whereId($request->id)->first();
            $data = $request->all();
            $check_exists = Coupon::whereCouponName($data['coupon_name'])->where('id', '!=', $request->id)->whereDeletedAt(null)->first();
            if($check_exists){
                return ['status' => 'false', 'message' =>  "Coupon Name already exists."];
            }

            
            $coupon->coupon_name = $data['coupon_name'];
            $coupon->coupon_type = $data['coupon_type'];
            $coupon->coupon_amount_and_percentage = $data['coupon_amount_and_percentage'];
            $coupon->meta_keyword = $data['meta_keyword'];
            $coupon->meta_description = $data['meta_description'];
            $coupon->from_date = $data['from_date'];
            $coupon->to_date = $data['to_date'];
            $coupon->status = $data['status'];
            $coupon->update();
            return ['status' => 'true', 'message' =>  "Coupon updated successfully."];
        }
    }

    public function checkCouponNameExists(Request $request){
        $coupon_name = $request->coupon_name;
        $id = $request->id;
        if($id){
            $check_exists = Coupon::whereCouponName($coupon_name)->where('id','!=',$id)->whereDeletedAt(null)->first();
        }else{
            $check_exists = Coupon::whereCouponName($coupon_name)->whereDeletedAt(null)->first();
        }
        
        if($check_exists){
            return true;
        }else{
            return false;
        }

    }

    public function deleteCoupon(Request $request){
        Coupon::find($request->id)->delete();
        Session::flash('success',"Coupon has been deleted successfully.");
        return ["success" => 1];

    }

    public function viewCoupon(Request $request){
        $coupon_id = $request->id;
        $coupon = Coupon::whereId($request->id)->first();
        
        return view('admin.coupon.view',compact('coupon','coupon_id'));
    }
}