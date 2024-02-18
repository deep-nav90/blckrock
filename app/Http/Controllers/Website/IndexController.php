<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Str;
use DB;
use Mail;
use Hash;
use App\Models\Category;
use App\Models\Product;
use App\Models\Coupon;
use Auth;
use App\Models\User;
use Session;
use App\Mail\OrderMail;
use App\Mail\ReceivedOrderMailAdmin;
use App\Mail\ContactUs;
use App\Mail\AcceptOrder;
use App\Models\UserAddress;
use App\Models\BillingShippingAddress;
use App\Models\Order;
use App\Models\Payment;
use App\Models\ProductOrder;
use App\Models\TblState;
use App\Models\OurClient;
use App\Models\Contact;

use Razorpay\Api\Api;
use Dompdf\Dompdf;
use PDF;
use Response;

use App\Mail\UserForgotPassword;
use App\Models\RatingReview;
use App\Models\Notification;

require(dirname(__FILE__)."/textlocal.class.php");

use Textlocal;

class IndexController extends Controller
{
    public function index(Request $request){


            
        
        
            //  $textlocal = new Textlocal(false, false, env('TEXT_LOCAL_API_KEY'));

            // $numbers = array('918556025369');
            // $sender = 'TXTLCL';
            // $message = 'This is your message';

            // try {
            //     $result = $textlocal->sendSms($numbers, $message, $sender);
            //     print_r($result);
            // } catch (Exception $e) {
            //     echo 'Error: ' . $e->getMessage();
            // }


        $all_product = Product::whereDeletedAt(null)->select("*", DB::raw('(SELECT attribute_name FROM attributes WHERE attributes.id = (SELECT attribute_id FROM product_price_attributes WHERE product_price_attributes.product_id = products.id AND is_default_show = 1 AND product_price_attributes.deleted_at IS NULL)) AS default_attribute_name'), DB::raw('(SELECT product_price FROM product_price_attributes WHERE product_price_attributes.product_id = products.id AND product_price_attributes.is_default_show = 1 AND product_price_attributes.deleted_at IS NULL) AS default_product_price'), DB::raw('(SELECT sale_price FROM product_price_attributes WHERE product_price_attributes.product_id = products.id AND product_price_attributes.is_default_show = 1 AND deleted_at IS NULL) AS default_sale_price'), DB::raw('(SELECT attribute_value FROM product_price_attributes WHERE product_price_attributes.product_id = products.id AND product_price_attributes.is_default_show = 1 AND deleted_at IS NULL) AS default_attribute_value'),DB::raw('(SELECT category_name FROM categories WHERE categories.id = products.category_id) AS cat_name'),DB::raw('(SELECT sub_category_name FROM sub_categories WHERE sub_categories.id = products.sub_category_id) AS sub_cat_name'))->where(DB::raw('(SELECT status FROM sub_categories WHERE sub_categories.id = products.sub_category_id)'), '=', 'Active')->where(DB::raw('(SELECT status FROM categories WHERE categories.id = products.category_id)'), '=', 'Active')->where('product_quantity', '>', 0)->with('productImages','subCategory','productPriceAttributes')->orderBy('average_rating','desc')->limit(8)->get();

        $createObjectCategory = (object)[
            "id" => 0,
            "category_name" => "All Product",
            "category_image" => url('public/website/images/blogi2.jpeg'),
            "meta_keyword" => "Show All roduct",
            "meta_description" => "Show All Products",
            "status" => "Active",
            "topThreeProducts" => $all_product
        ];

        $categories = Category::whereDeletedAt(null)->whereStatus('Active')->with('topThreeProducts')->get();


        $categories = [$createObjectCategory, ...$categories];

        $OurClients = OurClient::whereDeletedAt(null)->get();


        

        
       //$categories = [];

    	return view('website.index',compact('categories','OurClients'));
    }

    public function singleProductDetails(Request $request, $product_id){
    	if($request->isMethod('GET')){
            $loginUser = Auth::guard('web')->user();
    		$product_id = base64_decode($product_id);
    		$productFind = Product::select("*", DB::raw('(SELECT attribute_name FROM attributes WHERE attributes.id = (SELECT attribute_id FROM product_price_attributes WHERE product_price_attributes.product_id = products.id AND is_default_show = 1 AND product_price_attributes.deleted_at IS NULL)) AS default_attribute_name'), DB::raw('(SELECT product_price FROM product_price_attributes WHERE product_price_attributes.product_id = products.id AND product_price_attributes.is_default_show = 1 AND deleted_at IS NULL) AS default_product_price'), DB::raw('(SELECT sale_price FROM product_price_attributes WHERE product_price_attributes.product_id = products.id AND product_price_attributes.is_default_show = 1 AND deleted_at IS NULL) AS default_sale_price'), DB::raw('(SELECT attribute_value FROM product_price_attributes WHERE product_price_attributes.product_id = products.id AND product_price_attributes.is_default_show = 1 AND deleted_at IS NULL) AS default_attribute_value'),DB::raw('(SELECT category_name FROM categories WHERE categories.id = products.category_id) AS cat_name'),DB::raw('(SELECT sub_category_name FROM sub_categories WHERE sub_categories.id = products.sub_category_id) AS sub_cat_name'))->whereId($product_id)->with('category','subCategory','productPriceAttributes','productImages')->first();
            $categoryWithAllProducts = Category::whereId($productFind->category_id)->with('allProductsMatchCategoryId')->first();

            $rate_review = null;
            $give_rating = 0;
            $give_review = "";
            $totalReviews = RatingReview::whereDeletedAt(null)->whereProductId($product_id)->count();
            if($loginUser){
                $rate_review = RatingReview::whereDeletedAt(null)->whereProductId($product_id)->whereUserId($loginUser->id)->first();
                if($rate_review){
                    $give_rating = $rate_review->rating;
                    $give_review = $rate_review->review;
                }
                
            }
            

    		return view('website.product-single',compact('productFind','categoryWithAllProducts','loginUser','rate_review','give_rating','give_review','totalReviews'));
    	}

    	if($request->isMethod('POST')){

    	}
    }

    public function allProducts(Request $request){
        if($request->isMethod('GET')){
            $mainProduct = Product::select("*", DB::raw('(SELECT attribute_name FROM attributes WHERE attributes.id = (SELECT attribute_id FROM product_price_attributes WHERE product_price_attributes.product_id = products.id AND is_default_show = 1 AND product_price_attributes.deleted_at IS NULL)) AS default_attribute_name'), DB::raw('(SELECT product_price FROM product_price_attributes WHERE product_price_attributes.product_id = products.id AND product_price_attributes.is_default_show = 1 AND deleted_at IS NULL) AS default_product_price'), DB::raw('(SELECT sale_price FROM product_price_attributes WHERE product_price_attributes.product_id = products.id AND product_price_attributes.is_default_show = 1 AND deleted_at IS NULL) AS default_sale_price'), DB::raw('(SELECT attribute_value FROM product_price_attributes WHERE product_price_attributes.product_id = products.id AND product_price_attributes.is_default_show = 1 AND deleted_at IS NULL) AS default_attribute_value'),DB::raw('(SELECT category_name FROM categories WHERE categories.id = products.category_id) AS cat_name'),DB::raw('(SELECT sub_category_name FROM sub_categories WHERE sub_categories.id = products.sub_category_id) AS sub_cat_name'))->whereDeletedAt(null)->whereStatus('Active')->where(DB::raw('(SELECT status FROM sub_categories WHERE sub_categories.id = products.sub_category_id)'), '=', 'Active')->where(DB::raw('(SELECT status FROM categories WHERE categories.id = products.category_id)'), '=', 'Active')->where('product_quantity', '>', 0)->with('category','subCategory','productPriceAttributes','productImages')->orderBy('average_rating','desc')->first();

            $topSellers = Product::select("*", DB::raw('(SELECT attribute_name FROM attributes WHERE attributes.id = (SELECT attribute_id FROM product_price_attributes WHERE product_price_attributes.product_id = products.id AND is_default_show = 1 AND product_price_attributes.deleted_at IS NULL)) AS default_attribute_name'), DB::raw('(SELECT product_price FROM product_price_attributes WHERE product_price_attributes.product_id = products.id AND product_price_attributes.is_default_show = 1 AND deleted_at IS NULL) AS default_product_price'), DB::raw('(SELECT sale_price FROM product_price_attributes WHERE product_price_attributes.product_id = products.id AND product_price_attributes.is_default_show = 1 AND deleted_at IS NULL) AS default_sale_price'), DB::raw('(SELECT attribute_value FROM product_price_attributes WHERE product_price_attributes.product_id = products.id AND product_price_attributes.is_default_show = 1 AND deleted_at IS NULL) AS default_attribute_value'),DB::raw('(SELECT category_name FROM categories WHERE categories.id = products.category_id) AS cat_name'),DB::raw('(SELECT sub_category_name FROM sub_categories WHERE sub_categories.id = products.sub_category_id) AS sub_cat_name'))->whereDeletedAt(null)->whereStatus('Active')->where(DB::raw('(SELECT status FROM sub_categories WHERE sub_categories.id = products.sub_category_id)'), '=', 'Active')->where(DB::raw('(SELECT status FROM categories WHERE categories.id = products.category_id)'), '=', 'Active')->where('product_quantity', '>', 0)->with('category','subCategory','productPriceAttributes','productImages')->orderBy('average_rating','desc')->limit(10)->get();

            $categories = Category::whereDeletedAt(null)->whereStatus('Active')->get();

            $createObjectCategory = (object)[
                "id" => 0,
                "category_name" => "All Product",
                "category_image" => url('public/website/images/blogi2.jpeg'),
                "meta_keyword" => "Show All roduct",
                "meta_description" => "Show All Products",
                "status" => "Active"
            ];

            $categories = [$createObjectCategory, ...$categories];

            return view('website.product-left-sidebar',compact('categories','mainProduct','topSellers'));
        }

        if($request->isMethod('POST')){
            $data = $request->all();
            $category_id = base64_decode($data['category_id']);
            $products = Product::select("*", DB::raw('(SELECT attribute_name FROM attributes WHERE attributes.id = (SELECT attribute_id FROM product_price_attributes WHERE product_price_attributes.product_id = products.id AND is_default_show = 1 AND product_price_attributes.deleted_at IS NULL)) AS default_attribute_name'), DB::raw('(SELECT product_price FROM product_price_attributes WHERE product_price_attributes.product_id = products.id AND product_price_attributes.is_default_show = 1 AND deleted_at IS NULL) AS default_product_price'), DB::raw('(SELECT sale_price FROM product_price_attributes WHERE product_price_attributes.product_id = products.id AND product_price_attributes.is_default_show = 1 AND deleted_at IS NULL) AS default_sale_price'), DB::raw('(SELECT attribute_value FROM product_price_attributes WHERE product_price_attributes.product_id = products.id AND product_price_attributes.is_default_show = 1 AND deleted_at IS NULL) AS default_attribute_value'),DB::raw('(SELECT category_name FROM categories WHERE categories.id = products.category_id) AS cat_name'),DB::raw('(SELECT sub_category_name FROM sub_categories WHERE sub_categories.id = products.sub_category_id) AS sub_cat_name'))
                ->where(function($query) use ($data, $category_id){

                    if((int)$category_id != 0){
                        $query->whereCategoryId($category_id);
                    }
                    $query->where('product_quantity', '>', 0);
                    $query->whereStatus('Active');
                    $query->where(DB::raw('(SELECT status FROM sub_categories WHERE sub_categories.id = products.sub_category_id)'), '=', 'Active');
                    $query->where(DB::raw('(SELECT status FROM categories WHERE categories.id = products.category_id)'), '=', 'Active');
                    $query->where(DB::raw('(SELECT category_name FROM categories WHERE categories.id = products.category_id)'), 'Like', '%'. $data['search_text'] . '%');
                    $query->whereDeletedAt(null);
                })->orWhere(function($query) use ($data,$category_id){
                    if((int)$category_id != 0){
                        $query->whereCategoryId($category_id);
                    }
                    $query->where('product_quantity', '>', 0);
                    $query->whereStatus('Active');
                    $query->where(DB::raw('(SELECT status FROM sub_categories WHERE sub_categories.id = products.sub_category_id)'), '=', 'Active');
                    $query->where(DB::raw('(SELECT status FROM categories WHERE categories.id = products.category_id)'), '=', 'Active');
                    $query->where(DB::raw('(SELECT sub_category_name FROM sub_categories WHERE sub_categories.id = products.sub_category_id)'), 'Like', '%'. $data['search_text'] . '%');
                    $query->whereDeletedAt(null);
                })->orWhere(function($query) use ($data,$category_id){
                    if((int)$category_id != 0){
                        $query->whereCategoryId($category_id);
                    }
                    $query->where('product_quantity', '>', 0);
                    $query->whereStatus('Active');
                    $query->where(DB::raw('(SELECT status FROM sub_categories WHERE sub_categories.id = products.sub_category_id)'), '=', 'Active');
                    $query->where(DB::raw('(SELECT status FROM categories WHERE categories.id = products.category_id)'), '=', 'Active');
                    $query->where('product_name', 'Like', '%'. $data['search_text'] . '%');
                    $query->whereDeletedAt(null);
                })
                ->with('category','subCategory','productPriceAttributes','productImages')
                ->orderBy('average_rating','desc')
                ->paginate(10);

            $paginate_links = "";
            $paginate_links .= $products->links();

            return response()->json(['products' => $products,'link_page' => $paginate_links]);

        }
    }

    public function viewCart(Request $request){
        if($request->isMethod('GET')){
            $coupons = Coupon::whereDeletedAt(null)->whereDate('from_date', '<=', Carbon::now()->toDateString())->whereDate('to_date', '>=', Carbon::now()->toDateString())->whereStatus('Active')->get();
            return view('website.cart',compact('coupons'));
        }
    }

    public function checkout(Request $request){
        if($request->isMethod('GET')){
            
            $loginUser = Auth::guard('web')->user();
            if($loginUser){
                $userWithAddress = User::whereId($loginUser->id)->with('userAddress')->first();

            }else{
                $userWithAddress = "";
            }

            $findIndiaCountryID = DB::table('tbl_countries')->whereName('India')->first();

            $states_and_cities = TblState::select("*", DB::raw('(SELECT count(*) FROM tbl_cities WHERE tbl_cities.state_id = tbl_states.id) AS total_city'))
            ->whereCountryId($findIndiaCountryID->id)
            ->with('tblCities')
            ->having('total_city', '>', 0)
            ->get();

            //return $userWithAddress;

            return view('website.checkout',compact('loginUser','userWithAddress','states_and_cities'));
        }
    }

    public function loginOnCheckoutPage(Request $request){
        

        $data = $request->all();

        $findUser = User::whereEmail($data['email'])->first();

        if($findUser){

            if($findUser->deleted_at != null){
                return ['status' => 'false', 'message' => 'Your account has been deleted by admin.'];
            }

            if($findUser->is_block == 1){
                return ['status' => 'false', 'message' => 'Your account has been blocked by admin.'];
            }

            if (\Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {

                return ['status' => 'true', 'message' => 'Logged in successfully.'];
            }else{
                return ['status' => 'false', 'message' => 'Email address and password is invalid.'];
            }

        }else{
            return ['status' => 'false', 'message' => 'Email address and password is invalid.'];
        }

        
        


    }

    public function signUp(Request $request){
        if($request->isMethod('GET')){

            $checkLogin = Auth::guard('web')->user();
            if($checkLogin){
                return redirect(route('index'));
            }
            return view('website.sign-up');
        }

        if($request->isMethod('POST')){
            $data = $request->all();

            $checkEmail = User::whereEmail($data['email'])->whereDeletedAt(null)->first();
            if($checkEmail){
                return ['status' => "false", "message" => "Email already exists."];
            }

            $user = new User();
            $user->role_type = "Employee";
            $user->email = $data['email'];
            $user->password = Hash::make($data['password']);
            $user->full_name = $data['full_name'];
            $user->save();
            Auth::guard('web')->loginUsingId($user->id);
            return ['status' => "true", "message" => "Your account has been registered successfully."];


        }
    }

    public function loginWeb(Request $request){
        if($request->isMethod('GET')){

            $checkLogin = Auth::guard('web')->user();
            if($checkLogin){
                return redirect(route('index'));
            }
            return view('website.login');
        }

        if($request->isMethod('POST')){

            $data = $request->all();

            $findUser = User::whereEmail($data['email'])->first();

            if($findUser){

                if($findUser->deleted_at != null){
                    return ['status' => 'false', 'message' => 'Your account has been deleted by admin.'];
                }

                if($findUser->is_block == 1){
                    return ['status' => 'false', 'message' => 'Your account has been blocked by admin.'];
                }


                if (\Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {

                    return ['status' => 'true', 'message' => 'Logged in successfully.'];
                }else{
                    return ['status' => 'false', 'message' => 'Email address and password is invalid.'];
                }

            }else{
                return ['status' => 'false', 'message' => 'Email address and password is invalid.'];
            }
            
        }
    }

    public function logout(Request $request){
        Auth::guard('web')->logout();
        return redirect(route('index'));
    }

    public function placeOrder(Request $request){

        $last_order_find = Order::orderBy('id','desc')->first();
        $seq_number = "01";
        if($last_order_find){
            if($last_order_find->id >= 10){
                $seq_number = $last_order_find->id;
            }else{
                $seq_number = "0" . $last_order_find->id;
            }
        }

        $uniq_id = "BLK" . $seq_number;
        $data = $request->all();
        $data['uniq_id'] = $uniq_id;
        
        $billingInfo = json_decode($data['billingInfo']);
        $shippingInfo = json_decode($data['shippingInfo']);
        $finalAmount = json_decode($data['finalAmount']);
        $couponCode = json_decode($data['couponCode']);
        $productInCart =json_decode($data['productInCart']);
        $paymentMethod = $data['paymentMethod'];

        $billingData = [];
        foreach ($billingInfo as $info) {
                $key_name = $info->key;
                $billingData[$key_name] = $info->value;
        }

        $shippingData = [];
        foreach ($shippingInfo as $info) {
                $key_name = $info->key;
                $shippingData[$key_name] = $info->value;
        }


        //Check STOCK AVAILABLE

        if(!isset($productInCart)){
            return ['status' => 'out_of_stock', 'message' => "You have no item in cart please add first to continue order."];
        }


        foreach($productInCart as $product){

            $findP = Product::whereId($product->id)->first();
            $selected_quantity = $product->selected_quantity;

            if((int)$findP->product_quantity < (int)$selected_quantity){
                return ['status' => 'out_of_stock', 'message' => "Some product is out of stock. You can continue shopping to choese another product."];
            }
                

        }


        // END OF CHECK STOCK



        $checkLogin = Auth::guard('web')->user();

        if($checkLogin){


            if($checkLogin->deleted_at != null){
                return ['status' => 'sessionExpire', 'message' => 'Your account has been deleted by admin.'];
            }

            if($checkLogin->is_block == 1){
                return ['status' => 'sessionExpire', 'message' => 'Your account has been blocked by admin.'];
            }



            if($paymentMethod == "Razorpay"){

                $api = new Api(env('RAZORPAY_KEY_ID'), env('RAZORPAY_KEY_SECRET'));

                $orderData = [
                    'receipt' => $data['uniq_id'],
                    'amount' => (float)$finalAmount->finalPrice * 100, // Convert to paise
                    'currency' => 'INR',
                ];

                try{    
                    $order = $api->order->create($orderData);

                    $orderRecord = [
                                    'id' => $order->id, 
                                    "entity" => $order->entity,
                                    "amount" => $order->amount,
                                    "amount_paid" => $order->amount_paid,
                                    "amount_due" => $order->amount_due,
                                    "currency" => $order->currency,
                                    "receipt" => $order->receipt,
                                    "offer_id" => $order->offer_id,
                                    "status" => $order->status,
                                    "attempts" => $order->attempts,
                                    "created_at" => $order->created_at,
                                ];
                

                    return ['status' => 'true','message' => "Razorpay Order ID created successfully.", 'orderData' => $orderRecord];

                }catch(\Exception $ex){
                    return ['status' => 'false', 'message' => 'Error: ' . $ex->getMessage()];
                }

            }else{
                //FOR COD METHOD

                $order_id = $this->saveDataAfterPaymentComplete($checkLogin, $billingData, $shippingData, $transaction_id="xxxxxxx12345", $paymentMethod, $couponCode, $finalAmount, $productInCart, $data);

                return ['status' => 'true', 'message' => 'Your order has been processed successfully. Invoice has been sent to your billing email address.', 'order_id' => $order_id];

            }

            

            

        }else{
            return ['status' => 'false', 'message' => 'Your session has been timeout. Please login again.'];
        }


    }

    public function saveDataAfterPaymentComplete($checkLogin, $billingData, $shippingData, $transaction_id="xxxxxxx12345", $paymentMethod, $couponCode, $finalAmount, $productInCart, $data){

        $checkUserAddress = UserAddress::whereDeletedAt(null)->whereUserId($checkLogin->id)->first();

            if($checkUserAddress == ""){
                $user_address = new UserAddress();
                $user_address->user_id = $checkLogin->id;
                $user_address->first_name = $billingData['first_name'];
                $user_address->last_name = $billingData['last_name'];
                $user_address->email = $billingData['email'];
                $user_address->phone_number = $billingData['phone_number'];
                $user_address->address = $billingData['address'];
                $user_address->city = $billingData['city'];
                $user_address->state = $billingData['state'];
                $user_address->zip_code = $billingData['zip_code'];
                $user_address->save();
                
            }

            $payment_received  = 1;
            $order_status = "Accepted";
            if($paymentMethod == "COD"){
                $transaction_id = "xxxxxxx12345";
                $payment_received = 0;
                $order_status = "Pending";

            }

            $payment = new Payment();
            $payment->user_id = $checkLogin->id;
            $payment->transaction_id = $transaction_id;
            $payment->payment_type = $paymentMethod;

            if($couponCode){
                $payment->coupon_code = $couponCode->coupon_code;
                $payment->coupon_amount_and_percentage = (float)$couponCode->coupon_amount_and_percentage;
                $payment->coupon_type = $couponCode->coupon_type;
                $payment->discount_amount_for_coupon = (float)$finalAmount->couponAmount;
            }
            

            $payment->shipping_charger = (float)$finalAmount->shippingCharges;
            $payment->total_amount = (float)$finalAmount->totalProductPrice;
            $payment->pay_amount = (float)$finalAmount->finalPrice;
            $payment->save();


            $order = new Order();
            $order->unique_order_id = $data['uniq_id'];
            $order->user_id = $checkLogin->id;
            $order->payment_id = $payment->id;
            $order->payment_received = $payment_received;
            $order->order_status = $order_status;

            if($couponCode){
                $order->coupon_code = $couponCode->coupon_code;
                $order->coupon_amount_and_percentage = $couponCode->coupon_amount_and_percentage;
                $order->coupon_type = $couponCode->coupon_type;
                $order->discount_amount_for_coupon = (float)$finalAmount->couponAmount;
            }




            $order->shipping_charger = (float)$finalAmount->shippingCharges;
            $order->total_amount = (float)$finalAmount->totalProductPrice;
            $order->payment_type = $paymentMethod;
            $order->pay_amount = (float)$finalAmount->finalPrice;
            $order->save();

            //Update Order ID in payment table

            Payment::whereId($payment->id)->update(['order_id' => $order->id]);


            foreach($productInCart as $product){

                //return $product;
                $product_orders = new ProductOrder();
                $product_orders->order_id = $order->id;
                $product_orders->product_id = $product->id;
                $product_orders->payment_id = $payment->id;

                $product_orders->product_price = $product->selected_product_price;

                $product_orders->sale_price = $product->selected_sale_price;

                $product_orders->quantity = $product->selected_quantity;

                $product_orders->category_name = $product->cat_name;

                $product_orders->sub_category_name = $product->sub_cat_name;

                $product_orders->product_name = $product->product_name;

                $product_orders->product_description = $product->product_description;

                $product_orders->attribute_name = $product->selected_attribute_name;
                $product_orders->attribute_value = $product->selected_attribute_value;

                $product_orders->calculated_amount = $product->calculate_price;

                $product_orders->save();

                $pendingQuantity = (int)$product->product_quantity - (int)$product->selected_quantity;
                Product::whereId($product->id)->update(['product_quantity' => $pendingQuantity]);

            }


            $billing_shipping = new BillingShippingAddress();
            $billing_shipping->payment_id = $payment->id;
            $billing_shipping->order_id = $order->id;
            $billing_shipping->billing_first_name = $billingData['first_name'];
            $billing_shipping->billing_last_name = $billingData['last_name'];
            $billing_shipping->billing_email = $billingData['email'];
            $billing_shipping->billing_phone_number = $billingData['phone_number'];
            $billing_shipping->billing_address = $billingData['address'];
            $billing_shipping->billing_city = $billingData['city'];
            $billing_shipping->billing_state = $billingData['state'];
            $billing_shipping->billing_zip_code = $billingData['zip_code'];

            $billing_shipping->shipping_first_name = $shippingData['first_name'];
            $billing_shipping->shipping_last_name = $shippingData['last_name'];
            $billing_shipping->shipping_email = $shippingData['email'];
            $billing_shipping->shipping_phone_number = $shippingData['phone_number'];
            $billing_shipping->shipping_address = $shippingData['address'];
            $billing_shipping->shipping_city = $shippingData['city'];
            $billing_shipping->shipping_state = $shippingData['state'];
            $billing_shipping->shipping_zip_code = $shippingData['zip_code'];

            $billing_shipping->save();


            $getOrderDetails = Order::whereId($order->id)->with('payment','productOrders','billingShippingAddress')->first();
            
            //generatePDF
            $generatePdfFileName = $this->generateInvoiceAndSendToMail($getOrderDetails, $checkLogin);

            $getOrderDetails->pdf_file_name = $generatePdfFileName;
            $getOrderDetails->update();


            try{

                

                //return $getOrderDetails->billingShippingAddress;
                \Mail::to($billingData['email'])->send(new OrderMail($checkLogin, $getOrderDetails));
            }catch(\Exception $ex){
                //return ['status' => 'false', 'message' => $ex->getMessage()];
            }

            foreach($getOrderDetails->productOrders as $productOrder){
                $notification_new_order = new Notification();
                $notification_new_order->user_id = $checkLogin->id;
                $notification_new_order->product_id = $productOrder->product->id;
                $notification_new_order->title = "New Order";
                $notification_new_order->description = "Your order" . " (" . $productOrder->order->unique_order_id . ") for product " . $productOrder->product->product_name . ' has been ordered successfully.';
                $notification_new_order->save();

            }

            if($paymentMethod != "COD"){
                try{
                    \Mail::to($getOrderDetails->billingShippingAddress->billing_email)->send(new AcceptOrder($getOrderDetails));
                }catch(\Exception $ex){
                    //
                }

                foreach($getOrderDetails->productOrders as $productOrder){
                    $notification_order_accept = new Notification();
                    $notification_order_accept->user_id = $checkLogin->id;
                    $notification_order_accept->product_id = $productOrder->product->id;
                    $notification_order_accept->title = "Accepted Order";
                    $notification_order_accept->description = "Your order" . " (" . $productOrder->order->unique_order_id . ") for product " . $productOrder->product->product_name . ' has been accepted successfully.';
                    $notification_order_accept->save();

                }

                 
            }


            

            try{

                //return $getOrderDetails->billingShippingAddress;
                \Mail::to(env('ADMIN_EMAIL'))->send(new ReceivedOrderMailAdmin($checkLogin, $getOrderDetails));
            }catch(\Exception $ex){
                //return ['status' => 'false', 'message' => $ex->getMessage()];
            }

            

            return $getOrderDetails->id;
    }

    public function accountDetails(Request $request){
        $checkLogin = Auth::guard('web')->user();

        if($checkLogin == ""){
            return redirect(route('loginWeb'));
        }


        $findIndiaCountryID = DB::table('tbl_countries')->whereName('India')->first();

        $states_and_cities = TblState::select("*", DB::raw('(SELECT count(*) FROM tbl_cities WHERE tbl_cities.state_id = tbl_states.id) AS total_city'))
        ->whereCountryId($findIndiaCountryID->id)
        ->with('tblCities')
        ->having('total_city', '>', 0)
        ->get();

        return view('website.account-details',compact('checkLogin','states_and_cities'));

        
    }

    public function updateAccount(Request $request){
        $checkLogin = Auth::guard('web')->user();

        if($checkLogin == ""){
            return ['status' => 'sessionExpired','message' => "Your Session has been expired. Please login again."];
        }

        $data = $request->all();

        $updateUser = User::whereId($checkLogin->id)->update(['full_name' => $data['full_name']]);
        
        $findUserAddress = UserAddress::whereId($checkLogin->id)->first();
        $findUserAddress->fill($data);
        $findUserAddress->update();

        return ['status' => 'true','message' => "Your Account has been updated successfully."];
    }

    public function changePasswordUser(Request $request){
        $checkLogin = Auth::guard('web')->user();

        if($checkLogin == ""){
            return ['status' => 'sessionExpired','message' => "Your Session has been expired. Please login again."];
        }

        $data = $request->all();


        if(Hash::check($data['old_password'], $checkLogin->password)){
            $hashMake = Hash::make($data['new_password']);
            $updateUser = User::whereId($checkLogin->id)->update(['password' => $hashMake]);
            //after change then logout user
            Auth::guard('web')->logout();
            return ['status' => 'true','message' => "Your Password has been updated successfully."];
        }else{
            return ['status' => 'false', 'message' => 'Old Password is wrong.'];
        }
        
    }

    public function myOrders(Request $request){
        $checkLogin = Auth::guard('web')->user();

        if($checkLogin == ""){
            return ['status' => 'sessionExpired','message' => "Your Session has been expired. Please login again."];
        }

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
                $column = "total_amount";
            }elseif($order == 3){
                $column = "discount_amount_for_coupon";
            }elseif($order == 4){
                $column = "pay_amount";
            }elseif($order == 5){
                $column = "payment_type";
            }elseif($order == 6){
                $column = "payment_received";
            }elseif($order == 7){
                $column = "order_status";
            }elseif($order == 8){
                $column = "created_at";
            }
        

            $data = Order::select("*", DB::raw('(SELECT full_name from users WHERE users.id = orders.user_id) AS user_name'), DB::raw('CASE WHEN payment_received = 1 THEN "Yes" ELSE "No" END as payment_received'), DB::raw('CONCAT("₹",total_amount) AS total_amount'), DB::raw('CONCAT("₹",discount_amount_for_coupon) AS discount_amount_for_coupon'), DB::raw('CONCAT("₹",pay_amount) AS pay_amount'), DB::raw('DATE_FORMAT(created_at, "%m-%d-%Y") AS date_show'))
            ->whereDeletedAt(null)
            ->whereUserId($checkLogin->id)
            ->orderBy($column,$asc_desc)
            ->with('billingShippingAddress','productOrders');
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

                $btn ="<div class='d-flex '>";

                


                $base64Encode = base64_encode($row);
                
                $btn .= '<a href="'.url('invoice'). "/" . base64_encode($row->id) .'" class="action-button" orderDetails="'.$base64Encode.'" style="cursor:pointer;" title="View" data-id="'.$row->id.'" href="javascript:void(0);"><i class="text-info fa fa-eye"></i></a>';
                   
                $btn .= '<a target="_blank" href="'.url("/invoice/download"). "/" . base64_encode($row->id) . '" class="action-button" orderDetails="'.$base64Encode.'" style="cursor:pointer;" title="Download" data-id="'.$row->id.'" href="javascript:void(0);"><i class="fa fa-arrow-down" aria-hidden="true"></i></a>';

                $btn .= '<a target="_blank" href="'.url("/track/order"). "/" . base64_encode($row->id) . '" class="action-button" orderDetails="'.$base64Encode.'" style="cursor:pointer;" title="Track Order" data-id="'.$row->id.'" href="javascript:void(0);"><i class="fa fa-universal-access" aria-hidden="true"></i>
                </a></div>';

                


              

                


                

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

    public function aboutUS(Request $request){
        return view('website.about-us');
    }
    public function Contactus(Request $request){
        if($request->isMethod('GET')){
            return view('website.contact-us');
        }

        if($request->isMethod('POST')){
            $data = $request->all();
       

            try {
                \Mail::to(env('ADMIN_EMAIL'))->send(new ContactUs($data));
            }catch(\Exception $ex){
                return ['status' => 'false','message' => "Error: " . $ex->getMessage()]; 
            }

            $contact_us = new Contact();
            $contact_us->fill($data);
            $contact_us->save();
            return ['status' => 'true','message' => "Your request has been submitted successfully. Admin will be contact you within 1 day."]; 
        }
        
    }


    public function paymentSuccess(Request $request){


        $last_order_find = Order::orderBy('id','desc')->first();
        $seq_number = "01";
        if($last_order_find){
            if($last_order_find->id >= 10){
                $seq_number = $last_order_find->id;
            }else{
                $seq_number = "0" . $last_order_find->id;
            }
        }

        $uniq_id = "BLK" . $seq_number;
        $data = $request->all();
        $data['uniq_id'] = $uniq_id;
        $encodeData = json_decode($request->encodedData);
        
        $billingInfo = $encodeData->billingInfo;
        $shippingInfo = $encodeData->shippingInfo;
        $finalAmount = $encodeData->finalAmount;
        $couponCode = $encodeData->couponCode;
        $productInCart = $encodeData->productInCart;
        $paymentMethod = "Razorpay";
        $transaction_id = $encodeData->transaction_id;

        $billingData = [];
        foreach ($billingInfo as $info) {
                $key_name = $info->key;
                $billingData[$key_name] = $info->value;
        }

        $shippingData = [];
        foreach ($shippingInfo as $info) {
                $key_name = $info->key;
                $shippingData[$key_name] = $info->value;
        }


        $checkLogin = Auth::guard('web')->user();
        
        $order_id = $this->saveDataAfterPaymentComplete($checkLogin, $billingData, $shippingData, $transaction_id, $paymentMethod, $couponCode, $finalAmount, $productInCart, $data);

       
        return redirect(route('invoicePage',base64_encode($order_id)));
        
    }


    public function generateInvoiceAndSendToMail($orderDetails, $loginUserDetail){


            //echo $htmlCode; die();
            $loginUserDetail = Auth::guard('web')->user();
            $getOrderDetails = $orderDetails;
            $file_name = time().'_'.Str::random(6).'.pdf';
            $pdf = PDF::loadView('website.invoice-pdf',compact('getOrderDetails','loginUserDetail'));
            $path = storage_path('app/public/pdf_files') . "/" . $file_name;
            $pdf->save($path);

            return $file_name;

    }

    public function invoicePage(Request $request, $orderID){
        $encodeOrderID = base64_decode($orderID);
        $loginUserDetail = Auth::guard('web')->user();

        if(empty($loginUserDetail)){
            return redirect(route('index'));
        }

        $getOrderDetails = Order::whereId($encodeOrderID)->with('payment','productOrders','billingShippingAddress')->first();
        return view("website.invoice-page",compact('getOrderDetails','loginUserDetail'));
    }
    public function invoicePdf(Request $request, $order_id){
     
        $encodeOrderID=base64_decode($order_id);
        $loginUserDetail = Auth::guard('web')->user();
        $getOrderDetails=Order::whereId($encodeOrderID)->with('payment','productOrders','billingShippingAddress')->first();
        //return view('website.invoice-pdf',compact('getOrderDetails','loginUserDetail'));
        $pdf = PDF::loadView('website.invoice-pdf',compact('getOrderDetails','loginUserDetail'));
        $path = storage_path('app/public/pdf_files/invoice.pdf');
        $pdf->save($path);
       // return $pdf->download(storage_path('app/public/pdf_files/invoice.pdf'));

        return $pdf->stream('invoice.pdf');
    }

    public function invoiceDownload(Request $request, $orderID){
        $encodeOrderID = base64_decode($orderID);
        $findOrder = Order::find($encodeOrderID);
        $file_path = public_path('/storage/pdf_files') ."/". $findOrder->pdf_file_name;
        return Response::download($file_path);
    }

    public function trackOrder(Request $request, $order_id){
        $encodeOrderID = base64_decode($order_id);
        $loginUserDetail = Auth::guard('web')->user();

        $getOrderDetails = Order::whereId($encodeOrderID)->with('payment','productOrders','billingShippingAddress')->first();
        return view("website.track-order",compact('getOrderDetails','loginUserDetail'));
    }

    public function privacyPolicy(Request $request){
        return view('website.privacy-policy');
    }
     public function termsConditions(Request $request){
        return view('website.terms-conditions');
    }

    public function userForgotPassword(Request $request){
        if($request->isMethod('GET')){

            $checkLogin = Auth::guard('web')->user();
            if($checkLogin){
                return redirect(route('index'));
            }


            return view('website.forgot-password');
        }

        if($request->isMethod('POST')){
            $data = $request->all();


            $token = Str::random(32);
            $email = $request->email;

            $find_user = User::whereEmail($email)->whereDeletedAt(null)->first();

            if($find_user){
                DB::table('password_resets')->whereEmail($email)->delete();

                DB::table('password_resets')->insert([
                    'email' => $email,
                    'token' => $token,
                    'created_at' => Carbon::now()
                ]);

                try{
                    \Mail::to($data['email'])->send(new UserForgotPassword($token, $find_user));

                }catch(\Exception $ex){
                    return ['status' => 'false', 'message' =>  "Error " . $ex->getMessage()];
                }
                return ['status' => 'true', 'message' => 'A reset password link has been sent to your entered email address.'];
            }else{
                return ['status' => 'false', 'message' =>  "Please enter registered email address."];
            }
            
        }
    }

    public function userResetPassword(Request $request, $token){

        if($request->isMethod('GET')){

            $checkLogin = Auth::guard('web')->user();
            if($checkLogin){
                return redirect(route('index'));
            }



            $token = $token;
            $check_token = DB::table('password_resets')->whereToken($token)->first();

            return view('website.reset-password',compact('token', 'check_token'));

        }

        if($request->isMethod('POST')){

            $check_token = DB::table('password_resets')->whereToken($token)->first();
            if($check_token){
                $find_user = User::whereEmail($check_token->email)->whereDeletedAt(null)->first();
                if($find_user){
                    $hash = Hash::make($request->password);
                    $find_user->password = $hash;
                    $find_user->update();

                    DB::table('password_resets')->whereToken($token)->delete();
                    
                    return ['status' => 'true', 'message' =>  "Password has been reset successfully."];
                }else{
                    return ['status' => 'false', 'message' =>  "Your account has been deleted by admin."];
                }
            }else{
                return ['status' => 'false', 'message' =>  "Your link has been invalid or expired. So please send forgot password email again to reset your password."];
            }

        }

    }


    public function giveRating(Request $request){
        $checkLogin = Auth::guard('web')->user();
        if(empty($checkLogin)){
            return ['status' => 'false', 'message' => 'Please login first to give the review.'];
        }
        $data = $request->all();
        $data['user_id'] = $checkLogin->id;

        $check_rate_review = RatingReview::whereDeletedAt(null)->whereUserId($checkLogin->id)->whereProductId($data['product_id'])->first();

        if($check_rate_review){
            $check_rate_review->fill($data);
            $check_rate_review->save();

            //calculate average rating

            $total_number_of_users_give_rating = RatingReview::whereDeletedAt(null)->whereProductId($data['product_id'])->count();
            $sum_of_rate = RatingReview::whereDeletedAt(null)->whereProductId($data['product_id'])->sum('rating');
            $average_rating = round($sum_of_rate / $total_number_of_users_give_rating, 2);

            Product::whereId($data['product_id'])->update(['average_rating' => $average_rating]);



            return ['status' => 'true', 'message' => 'Your rate & review has been updated successfully.']; 
        }else{  
            $rate_review = new RatingReview();
            $rate_review->fill($data);
            $rate_review->save();

            //calculate average rating

            $total_number_of_users_give_rating = RatingReview::whereDeletedAt(null)->whereProductId($data['product_id'])->count();
            $sum_of_rate = RatingReview::whereDeletedAt(null)->whereProductId($data['product_id'])->sum('rating');
            $average_rating = round($sum_of_rate / $total_number_of_users_give_rating, 2);

            Product::whereId($data['product_id'])->update(['average_rating' => $average_rating]);
            
            return ['status' => 'true', 'message' => 'Your rate & review has been saved successfully.']; 
        }
        
        
        
    }

    
}
