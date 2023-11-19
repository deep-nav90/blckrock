<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Carbon\Carbon;
use Auth;
use Session;
use DB;
use App\Models\Order;
use App\Models\Payment;
class UserContoller extends Controller
{

    public static function uploadFile($file, $destinationPath){
        $fileName = date('mdYHis') . uniqid().'.'.$file->getClientOriginalExtension();
        $file->move($destinationPath, $fileName);

        return $fileName;
    }

    public function index(Request $request)
    {
        if($request->isMethod('GET')){
            //return 1;
            return view('admin.users.index');
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
                $column = "full_name";
            }elseif($order == 2){
                $column = "email";
            }elseif($order == 3){
                $column = "is_block";
            }elseif($order == 4){
                $column = "date_show";
            }




            $data = User::select("*", DB::raw('DATE_FORMAT(created_at, "%m-%d-%Y") AS date_show'), DB::raw('(CASE WHEN is_block = 0 THEN "Unblock" ELSE "Block" END) AS is_block'))->whereDeletedAt(null)->orderBy($column,$asc_desc);
            $total = $data->get()->count();

            if(!empty($request->get("search")["value"])){
                $search = $request->get("search")["value"];
            }else{

                $search = $request->search_txt;
            }
            $filter = $total;


            if($search){
                $data  = $data->where(function($query) use($search){
                            $query->orWhere(DB::raw('DATE_FORMAT(created_at, "%m-%d-%Y")'), 'Like', '%' . $search . '%');
                            $query->orWhere(DB::raw('(CASE WHEN is_block = 0 THEN "Unblock" ELSE "Block" END)'), 'Like', '%' . $search . '%');
                            $query->orWhere('full_name', 'Like', '%' . $search . '%');
                            $query->orWhere('email', 'Like', '%' . $search . '%');
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

                
                if(Auth::user()->can('view_user')) {
                    $btn .= '<a class="action-button" title="View" href="view/'.$row->id.'"><i class="text-info fa fa-eye"></i></a>';
                    
                    $block_show = "hidden";
                    $unblock_show = "";
                    if($row->is_block == "Unblock"){
                        $block_show = "";
                        $unblock_show = "hidden";
                    }else{
                        $block_show = "hidden";
                        $unblock_show = "";
                    }
                    $btn .= '<a class="action-button blockUnblock" title="Block" data-id="'.$row->id.'" '.$block_show.' href="javascript:void(0);"><i class="fa fa-unlock-alt" aria-hidden="true"></i></a>';
                    $btn .= '<a class="action-button blockUnblock" title="Unblock" data-id="'.$row->id.'" '.$unblock_show.' href="javascript:void(0);"><i class="fa fa-lock" aria-hidden="true"></i></a>';
                }

               
                if(Auth::user()->can('delete_user')) {
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

    
    public function blockUser(Request $request){
        $userID = $request->id;
        $findUser = User::whereId($userID)->first();
        if($findUser->is_block == 1){
            $findUser->is_block = 0;
        }else{

            $findUser->is_block = 1;
        }

        $findUser->update();
        return ['success' => 1];
    }
    

    public function viewUser($id)
    {

        
        $userDetails = User::whereId($id)->with('userAddress')->first();
        return view('admin.users.view',compact('userDetails'));
    }

    public function orderHistoryList(Request $request){

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
                $column = "unique_order_id";
            }elseif($order == 2){
                $column = "user_name";
            }elseif($order == 3){
                $column = "total_amount";
            }elseif($order == 4){
                $column = "discount_amount_for_coupon";
            }elseif($order == 5){
                $column = "pay_amount";
            }elseif($order == 6){
                $column = "payment_type";
            }elseif($order == 7){
                $column = "payment_received";
            }elseif($order == 8){
                $column = "order_status";
            }elseif($order == 9){
                $column = "created_at";
            }

            $user_id = $request->user_id;
        

            $data = Order::select("*", DB::raw('(SELECT full_name from users WHERE users.id = orders.user_id) AS user_name'), DB::raw('CASE WHEN payment_received = 1 THEN "Yes" ELSE "No" END as payment_received'), DB::raw('CONCAT("₹",total_amount) AS total_amount'), DB::raw('CONCAT("₹",discount_amount_for_coupon) AS discount_amount_for_coupon'), DB::raw('CONCAT("₹",pay_amount) AS pay_amount'), DB::raw('DATE_FORMAT(created_at, "%m-%d-%Y") AS date_show'))->whereDeletedAt(null)->whereUserId($user_id)->orderBy($column,$asc_desc);
            $total = $data->get()->count();

            if(!empty($request->get("search")["value"])){
                $search = $request->get("search")["value"];
            }else{

                $search = $request->search_txt;
            }
            $filter = $total;


            if($search){
                $data  = $data->where(function($query) use($search){
                            $query->orWhere('unique_order_id', 'Like', '%'. $search . '%');
                            $query->orWhere(DB::raw('(SELECT full_name from users WHERE users.id = orders.user_id)'), 'Like', '%'. $search . '%');
                            $query->orWhere(DB::raw('CONCAT("₹",total_amount)'), 'Like', '%'. $search . '%');
                            $query->orWhere(DB::raw('CONCAT("₹",discount_amount_for_coupon)'), 'Like', '%'. $search . '%');
                            $query->orWhere(DB::raw('CONCAT("₹",pay_amount)'), 'Like', '%'. $search . '%');
                            
                            $query->orWhere('payment_type', 'Like', '%'. $search . '%');

                            $query->orWhere(DB::raw('CASE WHEN payment_received = 1 THEN "Yes" ELSE "No" END'), 'Like', '%'. $search . '%');
                            

                            $query->orWhere('order_status', 'Like', '%'. $search . '%');

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

                


                
                if(Auth::user()->can('view_order')) {
                    $url = url('admin/orders/view') . "/" . $row->id;
                    $btn .= '<a class="action-button" style="cursor:pointer;" title="View" href="'.$url.'"><i class="text-info fa fa-eye"></i></a>';
                   
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

    public function paymentHistoryList(Request $request){

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
            $column = "transaction_id";
        }elseif($order == 2){
            $column = "show_order_id";
        }elseif($order == 3){
            $column = "user_name";
        }elseif($order == 4){
            $column = "payment_type";
        }elseif($order == 5){
            $column = "discount_amount_for_coupon";
        }elseif($order == 6){
            $column = "shipping_charger";
        }elseif($order == 7){
            $column = "total_amount";
        }elseif($order == 8){
            $column = "pay_amount";
        }elseif($order == 9){
            $column = "created_at";
        }

        $user_id = $request->user_id;
    

        $data = Payment::select("*", DB::raw('(SELECT full_name from users WHERE users.id = payments.user_id) AS user_name'), DB::raw('(SELECT unique_order_id from orders WHERE orders.id = payments.order_id) AS show_order_id'), DB::raw('CONCAT("₹",discount_amount_for_coupon) AS discount_amount_for_coupon'), DB::raw('CONCAT("₹",shipping_charger) AS shipping_charger'), DB::raw('CONCAT("₹",total_amount) AS total_amount'), DB::raw('CONCAT("₹",pay_amount) AS pay_amount'), DB::raw('DATE_FORMAT(created_at, "%m-%d-%Y") AS date_show'))->whereUserId($user_id)->whereDeletedAt(null)->orderBy($column,$asc_desc);
        $total = $data->get()->count();

        if(!empty($request->get("search")["value"])){
            $search = $request->get("search")["value"];
        }else{

            $search = $request->search_txt;
        }
        $filter = $total;


        if($search){
            $data  = $data->where(function($query) use($search){
                        $query->orWhere('transaction_id', 'Like', '%'. $search . '%');
                        $query->orWhere(DB::raw('(SELECT unique_order_id from orders WHERE orders.id = payments.order_id)'), 'Like', '%'. $search . '%');
                        $query->orWhere(DB::raw('(SELECT full_name from users WHERE users.id = payments.user_id)'), 'Like', '%'. $search . '%');
                        $query->orWhere('payment_type', 'Like', '%'. $search . '%');

                        $query->orWhere(DB::raw('CONCAT("₹",total_amount)'), 'Like', '%'. $search . '%');
                        $query->orWhere(DB::raw('CONCAT("₹",discount_amount_for_coupon)'), 'Like', '%'. $search . '%');
                        $query->orWhere(DB::raw('CONCAT("₹",pay_amount)'), 'Like', '%'. $search . '%');
                      
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

            


            
            if(Auth::user()->can('view_payment')) {

                $url = url('admin/payments/view') . "/" . $row->id;


                $btn .= '<a class="action-button" style="cursor:pointer;" title="View" href="'.$url.'"><i class="text-info fa fa-eye"></i></a>';
               
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
    

    public function deleteUser(Request $request){
        $user = User::find($request->id)->delete();
        $userList = User::orderBy("id")->get();

        return ["success" => 1];
    }

}
