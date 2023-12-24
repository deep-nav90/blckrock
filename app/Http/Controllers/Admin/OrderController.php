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

class OrderController extends Controller
{
    public function orderList(Request $request){
        if($request->isMethod('GET')){
            // $find_order = Order::whereId(45)->with('payment','productOrders','billingShippingAddress','user')->first();
            // try{
            //     \Mail::to($find_order->billingShippingAddress->billing_email)->send(new AcceptOrder($find_order));
            // }catch(\Exception $ex){
            //     return $ex->getMessage();
            // }
        	// return Order::select("*", DB::raw('(SELECT CONCAT(billing_first_name," ", billing_last_name) from billing_shipping_addresses WHERE billing_shipping_addresses.order_id = orders.id) AS user_name'), DB::raw('CASE WHEN payment_received = 1 THEN "Yes" ELSE "No" END as payment_received'), DB::raw('CONCAT("₹",total_amount) AS total_amount'), DB::raw('CONCAT("₹",discount_amount_for_coupon) AS discount_amount_for_coupon'), DB::raw('CONCAT("₹",pay_amount) AS pay_amount'), DB::raw('DATE_FORMAT(created_at, "%m-%d-%Y") AS date_show'))->whereDeletedAt(null)->get();

            return view('admin.order.list');
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
        

            $data = Order::select("*", DB::raw('(SELECT full_name from users WHERE users.id = orders.user_id) AS user_name'), DB::raw('CASE WHEN payment_received = 1 THEN "Yes" ELSE "No" END as payment_received'), DB::raw('CONCAT("₹",total_amount) AS total_amount'), DB::raw('CONCAT("₹",discount_amount_for_coupon) AS discount_amount_for_coupon'), DB::raw('CONCAT("₹",pay_amount) AS pay_amount'), DB::raw('DATE_FORMAT(created_at, "%m-%d-%Y") AS date_show'))->whereDeletedAt(null)->orderBy($column,$asc_desc);
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
                    $btn .= '<a class="action-button" style="cursor:pointer;" title="View" href="view/'.$row->id.'"><i class="text-info fa fa-eye"></i></a>';
                   
                }

                if($row->order_status == "Pending"){
                    if(Auth::user()->can('accept_order')) {
                        $btn .= '<a class="action-button acceptReject" style="cursor:pointer;" action="accept" title="Accept" data-id="'.$row->id.'" href="javascript:void(0);"><i class="accept fa fa-check"></i></a>';
                       
                    }

                    if(Auth::user()->can('reject_order')) {
                        $btn .= '<a class="action-button acceptReject" style="cursor:pointer;" action="reject" title="Reject" data-id="'.$row->id.'" href="javascript:void(0);"><i class="reject fa fa-times"></i></a>';
                       
                    }
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

    public function viewOrder(Request $request, $id){
    	$orderDetail = Order::whereId($id)->with('payment','productOrders','billingShippingAddress','user')->first();

        // return $orderDetail->billingShippingAddress->billing_state;

        return view('admin.order.view',compact('orderDetail'));
    }

    public function acceptRejectOrder(Request $request){
        $data = $request->all();

        $find_order = Order::whereId($data['order_id'])->with('payment','productOrders','billingShippingAddress','user')->first();

        if($data['action'] == 'accept'){
            Order::whereId($data['order_id'])->update(['order_status' => 'Accepted']);

            try{
                \Mail::to($find_order->billingShippingAddress->billing_email)->send(new AcceptOrder($find_order));
            }catch(\Exception $ex){
                //
            }
            return ['status' => 'true', 'message' => 'Order has been accepted successfully.'];
        }else{
            Order::whereId($data['order_id'])->update(['order_status' => 'Rejected']);

            try{
                \Mail::to($find_order->billingShippingAddress->billing_email)->send(new RejectOrder($find_order));
            }catch(\Exception $ex){
                //
            }

            return ['status' => 'true', 'message' => 'Order has been rejected successfully.'];
        }
    }

    public function shipOrder(Request $request){
        $data = $request->all();

        $find_order = Order::whereId($data['order_id'])->with('payment','productOrders','billingShippingAddress','user')->first();

        Order::whereId($data['order_id'])->update(['order_status' => 'Shipped']);

        try{
            \Mail::to($find_order->billingShippingAddress->billing_email)->send(new ShippedOrder($find_order));
        }catch(\Exception $ex){
            //
        }
        return ['status' => 'true', 'message' => 'Order has been shipped successfully.'];


    }

    public function completeOrder(Request $request){
        $data = $request->all();

        $find_order = Order::whereId($data['order_id'])->with('payment','productOrders','billingShippingAddress','user')->first();

        Order::whereId($data['order_id'])->update(['order_status' => 'Completed','payment_received' => 1]);

        try{
            \Mail::to($find_order->billingShippingAddress->billing_email)->send(new CompleteOrder($find_order));
        }catch(\Exception $ex){
            //
        }
        return ['status' => 'true', 'message' => 'Order has been completed successfully.'];
    }

}
