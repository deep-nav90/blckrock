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
use App\Models\Order;
use App\Mail\AcceptOrder;
use App\Mail\RejectOrder;
use App\Mail\ShippedOrder;
use App\Mail\CompleteOrder;
use App\Models\User;
use App\Models\Payment;


class PaymentController extends Controller
{
    public function paymentList(Request $request){
        if($request->isMethod('GET')){

            return view('admin.payment.list');
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
        

            $data = Payment::select("*", DB::raw('(SELECT full_name from users WHERE users.id = payments.user_id) AS user_name'), DB::raw('(SELECT unique_order_id from orders WHERE orders.id = payments.order_id) AS show_order_id'), DB::raw('CONCAT("₹",discount_amount_for_coupon) AS discount_amount_for_coupon'), DB::raw('CONCAT("₹",shipping_charger) AS shipping_charger'), DB::raw('CONCAT("₹",total_amount) AS total_amount'), DB::raw('CONCAT("₹",pay_amount) AS pay_amount'), DB::raw('DATE_FORMAT(created_at, "%m-%d-%Y") AS date_show'))->whereDeletedAt(null)->orderBy($column,$asc_desc);
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
                    $btn .= '<a class="action-button" style="cursor:pointer;" title="View" href="view/'.$row->id.'"><i class="text-info fa fa-eye"></i></a>';
                   
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

    public function viewPayment(Request $request, $id){

    	$paymentDetail = Payment::find($id);

    	$orderDetail = Order::whereId($paymentDetail->order_id)->with('payment','productOrders','billingShippingAddress','user')->first();

        // return $orderDetail->billingShippingAddress->billing_state;

        return view('admin.payment.view',compact('orderDetail'));

    }

}
