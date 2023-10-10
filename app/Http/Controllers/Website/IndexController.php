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
use App\Models\UserAddress;
use App\Models\BillingShippingAddress;
use App\Models\Order;
use App\Models\Payment;
use App\Models\ProductOrder;
class IndexController extends Controller
{
    public function index(Request $request){

        $categories = Category::whereDeletedAt(null)->whereStatus('Active')->with('topThreeProducts')->get();
        //$categories = [];
    	return view('website.index',compact('categories'));
    }

    public function singleProductDetails(Request $request, $product_id){
    	if($request->isMethod('GET')){
    		$product_id = base64_decode($product_id);
    		$productFind = Product::select("*", DB::raw('(SELECT attribute_name FROM attributes WHERE attributes.id = (SELECT attribute_id FROM product_price_attributes WHERE product_price_attributes.product_id = products.id AND is_default_show = 1 AND product_price_attributes.deleted_at IS NULL)) AS default_attribute_name'), DB::raw('(SELECT product_price FROM product_price_attributes WHERE product_price_attributes.product_id = products.id AND product_price_attributes.is_default_show = 1 AND deleted_at IS NULL) AS default_product_price'), DB::raw('(SELECT sale_price FROM product_price_attributes WHERE product_price_attributes.product_id = products.id AND product_price_attributes.is_default_show = 1 AND deleted_at IS NULL) AS default_sale_price'), DB::raw('(SELECT attribute_value FROM product_price_attributes WHERE product_price_attributes.product_id = products.id AND product_price_attributes.is_default_show = 1 AND deleted_at IS NULL) AS default_attribute_value'),DB::raw('(SELECT category_name FROM categories WHERE categories.id = products.category_id) AS cat_name'),DB::raw('(SELECT sub_category_name FROM sub_categories WHERE sub_categories.id = products.sub_category_id) AS sub_cat_name'))->whereId($product_id)->with('category','subCategory','productPriceAttributes','productImages')->first();
            $categoryWithAllProducts = Category::whereId($productFind->category_id)->with('allProductsMatchCategoryId')->first();
    		return view('website.product-single',compact('productFind','categoryWithAllProducts'));
    	}

    	if($request->isMethod('POST')){

    	}
    }

    public function allProducts(Request $request){
        if($request->isMethod('GET')){
            $mainProduct = Product::select("*", DB::raw('(SELECT attribute_name FROM attributes WHERE attributes.id = (SELECT attribute_id FROM product_price_attributes WHERE product_price_attributes.product_id = products.id AND is_default_show = 1 AND product_price_attributes.deleted_at IS NULL)) AS default_attribute_name'), DB::raw('(SELECT product_price FROM product_price_attributes WHERE product_price_attributes.product_id = products.id AND product_price_attributes.is_default_show = 1 AND deleted_at IS NULL) AS default_product_price'), DB::raw('(SELECT sale_price FROM product_price_attributes WHERE product_price_attributes.product_id = products.id AND product_price_attributes.is_default_show = 1 AND deleted_at IS NULL) AS default_sale_price'), DB::raw('(SELECT attribute_value FROM product_price_attributes WHERE product_price_attributes.product_id = products.id AND product_price_attributes.is_default_show = 1 AND deleted_at IS NULL) AS default_attribute_value'),DB::raw('(SELECT category_name FROM categories WHERE categories.id = products.category_id) AS cat_name'),DB::raw('(SELECT sub_category_name FROM sub_categories WHERE sub_categories.id = products.sub_category_id) AS sub_cat_name'))->whereDeletedAt(null)->whereStatus('Active')->where(DB::raw('(SELECT status FROM sub_categories WHERE sub_categories.id = products.sub_category_id)'), '=', 'Active')->where(DB::raw('(SELECT status FROM categories WHERE categories.id = products.category_id)'), '=', 'Active')->with('category','subCategory','productPriceAttributes','productImages')->orderBy('average_rating','desc')->first();

            $topSellers = Product::select("*", DB::raw('(SELECT attribute_name FROM attributes WHERE attributes.id = (SELECT attribute_id FROM product_price_attributes WHERE product_price_attributes.product_id = products.id AND is_default_show = 1 AND product_price_attributes.deleted_at IS NULL)) AS default_attribute_name'), DB::raw('(SELECT product_price FROM product_price_attributes WHERE product_price_attributes.product_id = products.id AND product_price_attributes.is_default_show = 1 AND deleted_at IS NULL) AS default_product_price'), DB::raw('(SELECT sale_price FROM product_price_attributes WHERE product_price_attributes.product_id = products.id AND product_price_attributes.is_default_show = 1 AND deleted_at IS NULL) AS default_sale_price'), DB::raw('(SELECT attribute_value FROM product_price_attributes WHERE product_price_attributes.product_id = products.id AND product_price_attributes.is_default_show = 1 AND deleted_at IS NULL) AS default_attribute_value'),DB::raw('(SELECT category_name FROM categories WHERE categories.id = products.category_id) AS cat_name'),DB::raw('(SELECT sub_category_name FROM sub_categories WHERE sub_categories.id = products.sub_category_id) AS sub_cat_name'))->whereDeletedAt(null)->whereStatus('Active')->where(DB::raw('(SELECT status FROM sub_categories WHERE sub_categories.id = products.sub_category_id)'), '=', 'Active')->where(DB::raw('(SELECT status FROM categories WHERE categories.id = products.category_id)'), '=', 'Active')->with('category','subCategory','productPriceAttributes','productImages')->orderBy('average_rating','desc')->limit(10)->get();

            $categories = Category::whereDeletedAt(null)->whereStatus('Active')->get();
            return view('website.product-left-sidebar',compact('categories','mainProduct','topSellers'));
        }

        if($request->isMethod('POST')){
            $data = $request->all();
            $category_id = base64_decode($data['category_id']);
            $products = Product::select("*", DB::raw('(SELECT attribute_name FROM attributes WHERE attributes.id = (SELECT attribute_id FROM product_price_attributes WHERE product_price_attributes.product_id = products.id AND is_default_show = 1 AND product_price_attributes.deleted_at IS NULL)) AS default_attribute_name'), DB::raw('(SELECT product_price FROM product_price_attributes WHERE product_price_attributes.product_id = products.id AND product_price_attributes.is_default_show = 1 AND deleted_at IS NULL) AS default_product_price'), DB::raw('(SELECT sale_price FROM product_price_attributes WHERE product_price_attributes.product_id = products.id AND product_price_attributes.is_default_show = 1 AND deleted_at IS NULL) AS default_sale_price'), DB::raw('(SELECT attribute_value FROM product_price_attributes WHERE product_price_attributes.product_id = products.id AND product_price_attributes.is_default_show = 1 AND deleted_at IS NULL) AS default_attribute_value'),DB::raw('(SELECT category_name FROM categories WHERE categories.id = products.category_id) AS cat_name'),DB::raw('(SELECT sub_category_name FROM sub_categories WHERE sub_categories.id = products.sub_category_id) AS sub_cat_name'))
                ->where(function($query) use ($data, $category_id){
                    $query->whereCategoryId($category_id);
                    $query->whereStatus('Active');
                    $query->where(DB::raw('(SELECT status FROM sub_categories WHERE sub_categories.id = products.sub_category_id)'), '=', 'Active');
                    $query->where(DB::raw('(SELECT status FROM categories WHERE categories.id = products.category_id)'), '=', 'Active');
                    $query->where(DB::raw('(SELECT category_name FROM categories WHERE categories.id = products.category_id)'), 'Like', '%'. $data['search_text'] . '%');
                    $query->whereDeletedAt(null);
                })->orWhere(function($query) use ($data,$category_id){
                    $query->whereCategoryId($category_id);
                    $query->whereStatus('Active');
                    $query->where(DB::raw('(SELECT status FROM sub_categories WHERE sub_categories.id = products.sub_category_id)'), '=', 'Active');
                    $query->where(DB::raw('(SELECT status FROM categories WHERE categories.id = products.category_id)'), '=', 'Active');
                    $query->where(DB::raw('(SELECT sub_category_name FROM sub_categories WHERE sub_categories.id = products.sub_category_id)'), 'Like', '%'. $data['search_text'] . '%');
                    $query->whereDeletedAt(null);
                })->orWhere(function($query) use ($data,$category_id){
                    $query->whereCategoryId($category_id);
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

            //return $userWithAddress;

            return view('website.checkout',compact('loginUser','userWithAddress'));
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
            return ['status' => "true", "message" => "Your account has been registered successfully."];


        }
    }

    public function loginWeb(Request $request){
        if($request->isMethod('GET')){
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
        $data = $request->all();
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

            $transaction_id = "xxxxxxx12345";
            $payment_received  = 1;
            if($paymentMethod == "COD"){
                $transaction_id = "xxxxxxx12345";
                $payment_received = 0;

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
            $order->unique_order_id = Str::random(10);
            $order->user_id = $checkLogin->id;
            $order->payment_id = $payment->id;
            $order->payment_received = $payment_received;

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
                $product_orders->payment_id = $payment->id;

                $product_orders->product_price = $product->selected_product_price;

                $product_orders->sale_price = $product->selected_sale_price;

                $product_orders->quantity = $product->selected_quantity;

                $product_orders->category_name = $product->cat_name;

                $product_orders->sub_category_name = $product->sub_cat_name;

                $product_orders->product_name = $product->product_name;

                $product_orders->product_meta_description = $product->meta_description;

                $product_orders->product_meta_keyord = $product->meta_keyword;

                $product_orders->calculated_amount = $product->calculate_price;

                $product_orders->save();

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


            try{

                

                //return $getOrderDetails->billingShippingAddress;
                \Mail::to($billingData['email'])->send(new OrderMail($checkLogin, $getOrderDetails));
            }catch(\Exception $ex){
                //return ['status' => 'false', 'message' => $ex->getMessage()];
            }

            try{

                //return $getOrderDetails->billingShippingAddress;
                \Mail::to(env('ADMIN_EMAIL'))->send(new ReceivedOrderMailAdmin($checkLogin, $getOrderDetails));
            }catch(\Exception $ex){
                //return ['status' => 'false', 'message' => $ex->getMessage()];
            }




            return ['status' => 'true', 'message' => 'Your order has been processed successfully.'];

        }else{
            return ['status' => 'false', 'message' => 'Your session has been timeout. Please login again.'];
        }


        

        return ['billingInfo' => $billingInfo,'shippingInfo' => $shippingInfo,'finalAmount' => $finalAmount,'couponCode' => $couponCode,'productInCart' => $productInCart,'paymentMethod' => $paymentMethod];








    }
}
