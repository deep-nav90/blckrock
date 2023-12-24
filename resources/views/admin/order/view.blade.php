@extends('adminlte::page')

@section('title', 'Order Detials')

@section('content_header')
@stop


<style>
    input.form-control:disabled {
    background-color: #eaecef!important;
}

.form-control:disabled, .form-control[readonly] {
    color: #495057!important;
}

label.countLabel {
    border: 1px solid #dfdfdfdf;
    padding: 5px 10px 5px 10px;
    background-color: #5ee7ba;
    color: #ffffff;
    border-radius: 12px;
    margin-bottom: 20px;
    border-top-right-radius: 0px;
}


textarea.form-control {
    height: 120px!important;
    resize: none;
}

</style>


@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
        <div class="card-header alert d-flex justify-content-between align-items-center">


            <div class="tabs_wrapper">
              <a class="btn btn-sm btn-success tabButton active" data-id="order_details_tab" href="javascript:void(0);">Order Details</a>

              <a class="btn btn-sm btn-success tabButton" data-id="user_details_tab" href="javascript:void(0);">User Details</a>

              <a class="btn btn-sm btn-success tabButton" data-id="user_address_tab" href="javascript:void(0);">User Address</a>


              @if($orderDetail->coupon_code)
                <a class="btn btn-sm btn-success tabButton" data-id="coupon_details_tab" href="javascript:void(0);">Coupon Details</a>
              @endif()


              <a class="btn btn-sm btn-success tabButton" data-id="product_details_tab" href="javascript:void(0);">Product Details</a>

              <a class="btn btn-sm btn-success tabButton" data-id="billing_details_tab" href="javascript:void(0);">Billing Details</a>

              <a class="btn btn-sm btn-success tabButton" data-id="shipping_details_tab" href="javascript:void(0);">Shipping Details</a>

              <a class="btn btn-sm btn-success tabButton" data-id="payment_details_tab" href="javascript:void(0);">Payment Details</a>




              
            </div>


            <a class="btn btn-sm btn-success back-button" href="{{ url()->previous() }}">{{ __('adminlte::adminlte.back') }}</a>
            
        </div>
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
          
              
              <div class="card-body data-expand" id="order_details_data">
                
                
      
                
                <!-- INFORMATION FIELDS -->
                <div class="information_fields">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Order ID</label>
                        <input type="text" name="unique_order_id" class="form-control" value="{{$orderDetail->unique_order_id}}" id="unique_order_id" maxlength="30" disabled>
                        <div id ="unique_order_id_error" class="error"></div>
                        @if($errors->has('unique_order_id'))
                          <div class="error">{{ $errors->first('unique_order_id') }}</div>
                        @endif
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Discount Amount</label>
                        <input type="text" name="discount_amount_for_coupon" class="form-control" id="discount_amount_for_coupon" value="{{$orderDetail->discount_amount_for_coupon}}" maxlength="50" disabled>
                        <div id ="discount_amount_for_coupon_error" class="error"></div>
                        @if($errors->has('discount_amount_for_coupon'))
                          <div class="error">{{ $errors->first('discount_amount_for_coupon') }}</div>
                        @endif
                      </div>
                    </div>
                    
                  </div>


                  


                <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="name">Shipping Charges</label>
                          <input type="text" name="shipping_charger" class="form-control" id="shipping_charger" value="{{$orderDetail->shipping_charger}}" maxlength="50" disabled>
                          <div id ="shipping_charger_error" class="error"></div>
                          @if($errors->has('shipping_charger'))
                            <div class="error">{{ $errors->first('shipping_charger') }}</div>
                          @endif
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="name">Total Amount</label>
                          <input type="text" name="total_amount" class="form-control" id="total_amount" value="{{$orderDetail->total_amount}}" maxlength="50" disabled>
                          <div id ="total_amount_error" class="error"></div>
                          @if($errors->has('total_amount'))
                            <div class="error">{{ $errors->first('total_amount') }}</div>
                          @endif
                        </div>
                      </div>


                      

                      

                  </div>


                  <div class="row">

                    <div class="col-sm-6">
                        <div class="form-group">
                          <label for="name">Status</label>
                          <input type="text" name="order_status" class="form-control" id="order_status" value="{{$orderDetail->order_status}}" maxlength="50" disabled>
                          <div id ="order_status_error" class="error"></div>
                          @if($errors->has('order_status'))
                            <div class="error">{{ $errors->first('order_status') }}</div>
                          @endif
                        </div>
                      </div>


                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="name">Payment Type</label>
                          <input type="text" name="payment_type" class="form-control" id="payment_type" value="{{$orderDetail->payment_type}}" maxlength="50" disabled>
                          <div id ="payment_type_error" class="error"></div>
                          @if($errors->has('payment_type'))
                            <div class="error">{{ $errors->first('payment_type') }}</div>
                          @endif
                        </div>
                      </div>


                      

                      

                  </div>


                  <div class="row">


                    <div class="col-sm-6">
                        <div class="form-group">
                          <label for="name">Amount Pay</label>
                          <input type="text" name="pay_amount" class="form-control" id="pay_amount" value="{{$orderDetail->pay_amount}}" maxlength="50" disabled>
                          <div id ="pay_amount_error" class="error"></div>
                          @if($errors->has('pay_amount'))
                            <div class="error">{{ $errors->first('pay_amount') }}</div>
                          @endif
                        </div>
                      </div>


                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="name">Payment Received</label>
                          <?php 
                            if($orderDetail->payment_received == 1){
                              $payment_received = "Yes";
                            }else{
                              $payment_received = "No";
                            }
                          ?>
                          <input type="text" name="payment_received" class="form-control" id="payment_received" value="{{$payment_received}}" maxlength="50" disabled>
                          <div id ="payment_received_error" class="error"></div>
                          @if($errors->has('payment_received'))
                            <div class="error">{{ $errors->first('payment_received') }}</div>
                          @endif
                        </div>
                      </div>

                      

                  </div>


                  <div class="card-footer">
                    @if($orderDetail->order_status == "Accepted")
                    <button id="shipAddress" data-id="{{$orderDetail->id}}" class="btn btn-primary">Ship Order</button>

                    @elseif($orderDetail->order_status == "Shipped")
                      <button id="markAsCompleted" data-id="{{$orderDetail->id}}" class="btn btn-primary">Mark AS Completed</button>
                    @else

                    @endif()
                  </div>

                
                  
                </div>
                <!-- /INFORMATION FIELDS -->
                <hr/>
               
                <!-- Form Fields -->

              </div>
              <!-- /.card-body -->


              <!-- USER DETAILS -->

              <div class="card-body data-expand" id="user_details_data" hidden>
                
                
      
                
                <!-- INFORMATION FIELDS -->
                <div class="information_fields">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" name="full_name" class="form-control" value="{{$orderDetail->user->full_name}}" id="full_name" maxlength="30" disabled>
                        <div id ="full_name_error" class="error"></div>
                        @if($errors->has('full_name'))
                          <div class="error">{{ $errors->first('full_name') }}</div>
                        @endif
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Email Address</label>
                        <input type="text" name="email" class="form-control" id="email" value="{{$orderDetail->user->email}}" maxlength="50" disabled>
                        <div id ="email_error" class="error"></div>
                        @if($errors->has('email'))
                          <div class="error">{{ $errors->first('email') }}</div>
                        @endif
                      </div>
                    </div>
                    
                  </div>


                  


                

                  


                  <div class="row">

                    <div class="col-sm-6">
                        <div class="form-group">
                          <label for="name">Status</label>
                          <?php 
                            if($orderDetail->user->is_block == 1){
                              $is_block = "Blocked";
                            }else{
                              $is_block = "Unblock";
                            }
                          ?>
                          <input type="text" name="is_block" class="form-control" id="is_block" value="{{$is_block}}" maxlength="50" disabled>
                          <div id ="is_block_error" class="error"></div>
                          @if($errors->has('is_block'))
                            <div class="error">{{ $errors->first('is_block') }}</div>
                          @endif
                        </div>
                      </div>



                    <div class="col-sm-6">
                        <div class="form-group">
                          <label for="name">Created At</label>

                          <?php 
                            $created_at = Carbon\Carbon::parse($orderDetail->user->created_at)->format("d-M-Y");
                          ?>

                          <input type="text" name="created_at" class="form-control" id="created_at" value="{{$created_at}}" maxlength="50" disabled>
                          <div id ="created_at_error" class="error"></div>
                          @if($errors->has('created_at'))
                            <div class="error">{{ $errors->first('created_at') }}</div>
                          @endif
                        </div>
                      </div>


                      

                      

                  </div>


                
                  
                </div>
                <!-- /INFORMATION FIELDS -->
                <hr/>
               
                <!-- Form Fields -->

              </div>



              <!-- END OF USER DETAILS -->

              <!-- USER Address -->

              <div class="card-body data-expand" id="user_address_data" hidden>
                
                
      
                
                <!-- INFORMATION FIELDS -->
                <div class="information_fields">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">First Name</label>
                        <input type="text" name="first_name" class="form-control" value="{{$orderDetail->user->userAddress->first_name}}" id="first_name" maxlength="30" disabled>
                        <div id ="first_name_error" class="error"></div>
                        @if($errors->has('first_name'))
                          <div class="error">{{ $errors->first('first_name') }}</div>
                        @endif
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Last Name</label>
                        <input type="text" name="last_name" class="form-control" id="last_name" value="{{$orderDetail->user->userAddress->last_name}}" maxlength="50" disabled>
                        <div id ="last_name_error" class="error"></div>
                        @if($errors->has('last_name'))
                          <div class="error">{{ $errors->first('last_name') }}</div>
                        @endif
                      </div>
                    </div>
                    
                  </div>


                  <div class="row">


                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Email Address</label>
                        <input type="text" name="email" class="form-control" id="email" value="{{$orderDetail->user->userAddress->email}}" maxlength="50" disabled>
                        <div id ="email_error" class="error"></div>
                        @if($errors->has('email'))
                          <div class="error">{{ $errors->first('email') }}</div>
                        @endif
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Phone Number</label>
                        <input type="text" name="phone_number" class="form-control" id="phone_number" value="{{$orderDetail->user->userAddress->phone_number}}" maxlength="50" disabled>
                        <div id ="phone_number_error" class="error"></div>
                        @if($errors->has('phone_number'))
                          <div class="error">{{ $errors->first('phone_number') }}</div>
                        @endif
                      </div>
                    </div>
                      

                  </div>

                  <div class="row">


                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Address</label>
                        <input type="text" name="address" class="form-control" id="address" value="{{$orderDetail->user->userAddress->address}}" maxlength="50" disabled>
                        <div id ="address_error" class="error"></div>
                        @if($errors->has('address'))
                          <div class="error">{{ $errors->first('address') }}</div>
                        @endif
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">City</label>
                        <input type="text" name="city" class="form-control" id="city" value="{{$orderDetail->user->userAddress->city}}" maxlength="50" disabled>
                        <div id ="city_error" class="error"></div>
                        @if($errors->has('city'))
                          <div class="error">{{ $errors->first('city') }}</div>
                        @endif
                      </div>
                    </div>
                      

                  </div>

                  <div class="row">


                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">State</label>
                        <input type="text" name="state" class="form-control" id="state" value="{{$orderDetail->user->userAddress->state}}" maxlength="50" disabled>
                        <div id ="state_error" class="error"></div>
                        @if($errors->has('state'))
                          <div class="error">{{ $errors->first('state') }}</div>
                        @endif
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Zip Code</label>
                        <input type="text" name="zip_code" class="form-control" id="zip_code" value="{{$orderDetail->user->userAddress->zip_code}}" maxlength="50" disabled>
                        <div id ="zip_code_error" class="error"></div>
                        @if($errors->has('zip_code'))
                          <div class="error">{{ $errors->first('zip_code') }}</div>
                        @endif
                      </div>
                    </div>
                      

                  </div>


                
                  
                </div>
                <!-- /INFORMATION FIELDS -->
                <hr/>
               
                <!-- Form Fields -->

              </div>



              <!-- END OF USER Address -->




              <!-- Coupon DETAILS -->

              @if($orderDetail->coupon_code)

              <div class="card-body data-expand" id="coupon_details_data" hidden>
                
                
      
                
                <!-- INFORMATION FIELDS -->
                <div class="information_fields">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Coupon Code</label>
                        <input type="text" name="coupon_code" class="form-control" value="{{$orderDetail->coupon_code}}" id="coupon_code" maxlength="30" disabled>
                        <div id ="coupon_code_error" class="error"></div>
                        @if($errors->has('coupon_code'))
                          <div class="error">{{ $errors->first('coupon_code') }}</div>
                        @endif
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Coupon Amount / Percentage</label>
                        <input type="text" name="coupon_amount_and_percentage" class="form-control" id="coupon_amount_and_percentage" value="{{$orderDetail->coupon_amount_and_percentage}}" maxlength="50" disabled>
                        <div id ="coupon_amount_and_percentage_error" class="error"></div>
                        @if($errors->has('coupon_amount_and_percentage'))
                          <div class="error">{{ $errors->first('coupon_amount_and_percentage') }}</div>
                        @endif
                      </div>
                    </div>
                    
                  </div>


                  


                

                  


                  <div class="row">

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Coupon Type</label>
                        <input type="text" name="coupon_type" class="form-control" id="coupon_type" value="{{$orderDetail->coupon_type}}" maxlength="50" disabled>
                        <div id ="coupon_type_error" class="error"></div>
                        @if($errors->has('coupon_type'))
                          <div class="error">{{ $errors->first('coupon_type') }}</div>
                        @endif
                      </div>
                    </div>


                  </div>


                
                  
                </div>
                <!-- /INFORMATION FIELDS -->
                <hr/>
               
                <!-- Form Fields -->

              </div>
              @endif()


              <!-- END OF Coupon DETAILS -->



              <!-- Product DETAILS -->

    

              <div class="card-body data-expand" id="product_details_data" hidden>
                
                <?php $k = 1; ?>
                @foreach($orderDetail->productOrders as $productOrder)
                <label class="countLabel">{{$k}}</label>
                <!-- INFORMATION FIELDS -->
                <div class="information_fields">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" name="product_name" class="form-control" value="{{$productOrder->product_name}}" i maxlength="30" disabled>
                        <div id ="product_name_error" class="error"></div>
                        @if($errors->has('product_name'))
                          <div class="error">{{ $errors->first('product_name') }}</div>
                        @endif
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Product Price</label>
                        <input type="text" name="product_price" class="form-control"  value="{{$productOrder->product_price}}" maxlength="50" disabled>
                        <div id ="product_price_error" class="error"></div>
                        @if($errors->has('product_price'))
                          <div class="error">{{ $errors->first('product_price') }}</div>
                        @endif
                      </div>
                    </div>
                    
                  </div>


                  


                

                  


                  <div class="row">

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Sale Price</label>
                        <input type="text" name="sale_price" class="form-control"  value="{{$productOrder->sale_price}}" maxlength="50" disabled>
                        <div id ="sale_price_error" class="error"></div>
                        @if($errors->has('sale_price'))
                          <div class="error">{{ $errors->first('sale_price') }}</div>
                        @endif
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Quantity</label>
                        <input type="text" name="quantity" class="form-control"  value="{{$productOrder->quantity}}" maxlength="50" disabled>
                        <div id ="quantity_error" class="error"></div>
                        @if($errors->has('quantity'))
                          <div class="error">{{ $errors->first('quantity') }}</div>
                        @endif
                      </div>
                    </div>



                  </div>

                  <div class="row">

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Category Name</label>
                        <input type="text" name="category_name" class="form-control" value="{{$productOrder->category_name}}" maxlength="50" disabled>
                        <div id ="category_name_error" class="error"></div>
                        @if($errors->has('category_name'))
                          <div class="error">{{ $errors->first('category_name') }}</div>
                        @endif
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Sub Category Name</label>
                        <input type="text" name="sub_category_name" class="form-control"  value="{{$productOrder->sub_category_name}}" maxlength="50" disabled>
                        <div id ="sub_category_name_error" class="error"></div>
                        @if($errors->has('sub_category_name'))
                          <div class="error">{{ $errors->first('sub_category_name') }}</div>
                        @endif
                      </div>
                    </div>



                  </div>


                  <div class="row">

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Attribute Name</label>
                        <input type="text" name="attribute_name" class="form-control" value="{{$productOrder->attribute_name}}" maxlength="50" disabled>
                        <div id ="attribute_name_error" class="error"></div>
                        @if($errors->has('attribute_name'))
                          <div class="error">{{ $errors->first('attribute_name') }}</div>
                        @endif
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Attribute Value</label>
                        <input type="text" name="attribute_value" class="form-control"  value="{{$productOrder->attribute_value}}" maxlength="50" disabled>
                        <div id ="attribute_value_error" class="error"></div>
                        @if($errors->has('attribute_value'))
                          <div class="error">{{ $errors->first('attribute_value') }}</div>
                        @endif
                      </div>
                    </div>



                  </div>

                  <div class="row">

                    

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Total Product Price</label>
                        <input type="text" name="calculated_amount" class="form-control"  value="{{$productOrder->calculated_amount}}" maxlength="50" disabled>
                        <div id ="calculated_amount_error" class="error"></div>
                        @if($errors->has('calculated_amount'))
                          <div class="error">{{ $errors->first('calculated_amount') }}</div>
                        @endif
                      </div>
                    </div>
                    

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Product Description</label>
                        <textarea type="text" name="product_description" class="form-control"  disabled>{{$productOrder->product_description}}</textarea>
                        <div id ="product_description_error" class="error"></div>
                        @if($errors->has('product_description'))
                          <div class="error">{{ $errors->first('product_description') }}</div>
                        @endif
                      </div>
                    </div>


                  </div>

                 



                
                  
                </div>

                <?php $k++; ?>
                @endforeach()


                


                <!-- /INFORMATION FIELDS -->
                <hr/>
               
                <!-- Form Fields -->

              </div>
          


              <!-- END OF Product DETAILS -->



              <!-- Payment DETAILS -->

              

              <div class="card-body data-expand" id="payment_details_data" hidden>
                
                
      
                
                <!-- INFORMATION FIELDS -->
                <div class="information_fields">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Transaction ID</label>
                        <input type="text" name="transaction_id" class="form-control" value="{{$orderDetail->payment->transaction_id}}" id="transaction_id" maxlength="30" disabled>
                        <div id ="transaction_id_error" class="error"></div>
                        @if($errors->has('transaction_id'))
                          <div class="error">{{ $errors->first('transaction_id') }}</div>
                        @endif
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Payment Type</label>
                        <input type="text" name="payment_type" class="form-control" value="{{$orderDetail->payment->payment_type}}" id="payment_type" maxlength="30" disabled>
                        <div id ="payment_type_error" class="error"></div>
                        @if($errors->has('payment_type'))
                          <div class="error">{{ $errors->first('payment_type') }}</div>
                        @endif
                      </div>
                    </div>
                    
                  </div>


                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Discount Amount</label>
                        <input type="text" name="coupon_amount_and_percentage" class="form-control" value="{{$orderDetail->payment->coupon_amount_and_percentage}}" id="coupon_amount_and_percentage" maxlength="30" disabled>
                        <div id ="coupon_amount_and_percentage_error" class="error"></div>
                        @if($errors->has('coupon_amount_and_percentage'))
                          <div class="error">{{ $errors->first('coupon_amount_and_percentage') }}</div>
                        @endif
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Shipping Charges</label>
                        <input type="text" name="shipping_charger" class="form-control" value="{{$orderDetail->payment->shipping_charger}}" id="shipping_charger" maxlength="30" disabled>
                        <div id ="shipping_charger_error" class="error"></div>
                        @if($errors->has('shipping_charger'))
                          <div class="error">{{ $errors->first('shipping_charger') }}</div>
                        @endif
                      </div>
                    </div>
                    
                  </div>


                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Total Amount</label>
                        <input type="text" name="total_amount" class="form-control" value="{{$orderDetail->payment->total_amount}}" id="total_amount" maxlength="30" disabled>
                        <div id ="total_amount_error" class="error"></div>
                        @if($errors->has('total_amount'))
                          <div class="error">{{ $errors->first('total_amount') }}</div>
                        @endif
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Pay Amount</label>
                        <input type="text" name="pay_amount" class="form-control" value="{{$orderDetail->payment->pay_amount}}" id="pay_amount" maxlength="30" disabled>
                        <div id ="pay_amount_error" class="error"></div>
                        @if($errors->has('pay_amount'))
                          <div class="error">{{ $errors->first('pay_amount') }}</div>
                        @endif
                      </div>
                    </div>
                    
                  </div>




                 


                
                  
                </div>
                <!-- /INFORMATION FIELDS -->
                <hr/>
               
                <!-- Form Fields -->

              </div>
              


              <!-- END OF Payment DETAILS -->






              <!-- Billing DETAILS -->

              

              <div class="card-body data-expand" id="billing_details_data" hidden>
                
                
      
                
                <!-- INFORMATION FIELDS -->
                <div class="information_fields">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">First Name</label>
                        <input type="text" name="billing_first_name" class="form-control" value="{{$orderDetail->billingShippingAddress->billing_first_name}}" id="billing_first_name" maxlength="30" disabled>
                        <div id ="billing_first_name_error" class="error"></div>
                        @if($errors->has('billing_first_name'))
                          <div class="error">{{ $errors->first('billing_first_name') }}</div>
                        @endif
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Last Name</label>
                        <input type="text" name="billing_last_name" class="form-control" value="{{$orderDetail->billingShippingAddress->billing_last_name}}" id="billing_last_name" maxlength="30" disabled>
                        <div id ="billing_last_name_error" class="error"></div>
                        @if($errors->has('billing_last_name'))
                          <div class="error">{{ $errors->first('billing_last_name') }}</div>
                        @endif
                      </div>
                    </div>
                    
                  </div>


                  


                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Email</label>
                        <input type="text" name="billing_email" class="form-control" value="{{$orderDetail->billingShippingAddress->billing_email}}" id="billing_email" maxlength="30" disabled>
                        <div id ="billing_email_error" class="error"></div>
                        @if($errors->has('billing_email'))
                          <div class="error">{{ $errors->first('billing_email') }}</div>
                        @endif
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Phone Number</label>
                        <input type="text" name="billing_phone_number" class="form-control" value="{{$orderDetail->billingShippingAddress->billing_phone_number}}" id="billing_phone_number" maxlength="30" disabled>
                        <div id ="billing_phone_number_error" class="error"></div>
                        @if($errors->has('billing_phone_number'))
                          <div class="error">{{ $errors->first('billing_phone_number') }}</div>
                        @endif
                      </div>
                    </div>
                    
                  </div>


                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Address</label>
                        <input type="text" name="billing_address" class="form-control" value="{{$orderDetail->billingShippingAddress->billing_address}}" id="billing_address" maxlength="30" disabled>
                        <div id ="billing_address_error" class="error"></div>
                        @if($errors->has('billing_address'))
                          <div class="error">{{ $errors->first('billing_address') }}</div>
                        @endif
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">City</label>
                        <input type="text" name="billing_city" class="form-control" value="{{$orderDetail->billingShippingAddress->billing_city}}" id="billing_city" maxlength="30" disabled>
                        <div id ="billing_city_error" class="error"></div>
                        @if($errors->has('billing_city'))
                          <div class="error">{{ $errors->first('billing_city') }}</div>
                        @endif
                      </div>
                    </div>
                    
                  </div>


                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">State</label>
                        <input type="text" name="billing_state" class="form-control" value="{{$orderDetail->billingShippingAddress->billing_state}}" id="billing_state" maxlength="30" disabled>
                        <div id ="billing_state_error" class="error"></div>
                        @if($errors->has('billing_state'))
                          <div class="error">{{ $errors->first('billing_state') }}</div>
                        @endif
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Zip Code</label>
                        <input type="text" name="billing_zip_code" class="form-control" value="{{$orderDetail->billingShippingAddress->billing_zip_code}}" id="billing_zip_code" maxlength="30" disabled>
                        <div id ="billing_zip_code_error" class="error"></div>
                        @if($errors->has('billing_zip_code'))
                          <div class="error">{{ $errors->first('billing_zip_code') }}</div>
                        @endif
                      </div>
                    </div>
                    
                  </div>




                 


                
                  
                </div>
                <!-- /INFORMATION FIELDS -->
                <hr/>
               
                <!-- Form Fields -->

              </div>
              


              <!-- END OF Billing DETAILS -->




              <!-- Shipping DETAILS -->

              

              <div class="card-body data-expand" id="shipping_details_data" hidden>
                
                
      
                
                <!-- INFORMATION FIELDS -->
                <div class="information_fields">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">First Name</label>
                        <input type="text" name="shipping_first_name" class="form-control" value="{{$orderDetail->billingShippingAddress->shipping_first_name}}" id="shipping_first_name" maxlength="30" disabled>
                        <div id ="shipping_first_name_error" class="error"></div>
                        @if($errors->has('shipping_first_name'))
                          <div class="error">{{ $errors->first('shipping_first_name') }}</div>
                        @endif
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Last Name</label>
                        <input type="text" name="shipping_last_name" class="form-control" value="{{$orderDetail->billingShippingAddress->shipping_last_name}}" id="shipping_last_name" maxlength="30" disabled>
                        <div id ="shipping_last_name_error" class="error"></div>
                        @if($errors->has('shipping_last_name'))
                          <div class="error">{{ $errors->first('shipping_last_name') }}</div>
                        @endif
                      </div>
                    </div>
                    
                  </div>


                  


                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Email</label>
                        <input type="text" name="shipping_email" class="form-control" value="{{$orderDetail->billingShippingAddress->shipping_email}}" id="shipping_email" maxlength="30" disabled>
                        <div id ="shipping_email_error" class="error"></div>
                        @if($errors->has('shipping_email'))
                          <div class="error">{{ $errors->first('shipping_email') }}</div>
                        @endif
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Phone Number</label>
                        <input type="text" name="shipping_phone_number" class="form-control" value="{{$orderDetail->billingShippingAddress->shipping_phone_number}}" id="shipping_phone_number" maxlength="30" disabled>
                        <div id ="shipping_phone_number_error" class="error"></div>
                        @if($errors->has('shipping_phone_number'))
                          <div class="error">{{ $errors->first('shipping_phone_number') }}</div>
                        @endif
                      </div>
                    </div>
                    
                  </div>


                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Address</label>
                        <input type="text" name="shipping_address" class="form-control" value="{{$orderDetail->billingShippingAddress->shipping_address}}" id="shipping_address" maxlength="30" disabled>
                        <div id ="shipping_address_error" class="error"></div>
                        @if($errors->has('shipping_address'))
                          <div class="error">{{ $errors->first('shipping_address') }}</div>
                        @endif
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">City</label>
                        <input type="text" name="shipping_city" class="form-control" value="{{$orderDetail->billingShippingAddress->shipping_city}}" id="shipping_city" maxlength="30" disabled>
                        <div id ="shipping_city_error" class="error"></div>
                        @if($errors->has('shipping_city'))
                          <div class="error">{{ $errors->first('shipping_city') }}</div>
                        @endif
                      </div>
                    </div>
                    
                  </div>


                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">State</label>
                        <input type="text" name="shipping_state" class="form-control" value="{{$orderDetail->billingShippingAddress->shipping_state}}" id="shipping_state" maxlength="30" disabled>
                        <div id ="shipping_state_error" class="error"></div>
                        @if($errors->has('shipping_state'))
                          <div class="error">{{ $errors->first('shipping_state') }}</div>
                        @endif
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Zip Code</label>
                        <input type="text" name="shipping_zip_code" class="form-control" value="{{$orderDetail->billingShippingAddress->shipping_zip_code}}" id="shipping_zip_code" maxlength="30" disabled>
                        <div id ="shipping_zip_code_error" class="error"></div>
                        @if($errors->has('shipping_zip_code'))
                          <div class="error">{{ $errors->first('shipping_zip_code') }}</div>
                        @endif
                      </div>
                    </div>
                    
                  </div>




                 


                
                  
                </div>
                <!-- /INFORMATION FIELDS -->
                <hr/>
               
                <!-- Form Fields -->

              </div>
              


              <!-- END OF Shipping DETAILS -->


              
      
          </div>
        </div>
      </div>
  </div>
</div>


<div class="modal fade" id="lodaerModal" tabindex="-1" role="dialog" aria-labelledby="lodaerModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     
      <img src="{{url('public/loading-buffering.gif')}}" style="width: 50px; height:50px;">
     
  </div>
</div>
@endsection

@section('css')
  <style>
    .information_fields { margin-bottom: 30px; }
    .address_fields { margin-top: 30px; }
  </style>
@stop

@section('js')
  <script type="text/javascript">
    $(document).ready(function(){
      $(".tabButton").on("click",function(){
        $(".data-expand").attr("hidden","true");
        $(".tabButton").removeClass("active");
        $(this).addClass("active");
        let dataId = $(this).data("id");
         if(dataId == "order_details_tab"){
          $("#order_details_data").removeAttr("hidden");
         }else if(dataId == "user_details_tab"){
          $("#user_details_data").removeAttr("hidden");
          $("#user_details_tab").addClass("active");
         }else if(dataId == "user_address_tab"){
          $("#user_address_data").removeAttr("hidden");
          $("#user_address_tab").addClass("active");
         }else if(dataId == "coupon_details_tab"){
          $("#coupon_details_data").removeAttr("hidden");
          $("#coupon_details_tab").addClass("active");
         }else if(dataId == "product_details_tab"){
          $("#product_details_data").removeAttr("hidden");
          $("#product_details_tab").addClass("active");
         }else if(dataId == "payment_details_tab"){
          $("#payment_details_data").removeAttr("hidden");
          $("#payment_details_tab").addClass("active");
         }else if(dataId == "billing_details_tab"){
          $("#billing_details_data").removeAttr("hidden");
          $("#billing_details_tab").addClass("active");
         }else if(dataId == "shipping_details_tab"){
          $("#shipping_details_data").removeAttr("hidden");
          $("#shipping_details_tab").addClass("active");
         }
      });
    })
  </script>

  <script type="text/javascript">
    $(document).ready(function(){
      $("#shipAddress").on("click",function(){
        let order_id = $(this).attr("data-id");

        swal({
            title: "Alert",
            text: "Are you sure you want to ship this order.",
            type: "warning",
            showCancelButton: true,
        }, function(willDelete) {

            if(willDelete){

              $("#lodaerModal").modal("show");
              

              let data = {
                order_id : order_id
              }

              $.ajax({
                  url:"{{route('shipOrder')}}",
                  data: data,
                  // contentType: false,
                  // processData: false,
                  type: 'POST',
                  success: function(res){
                      // console.log("resultback",res);
                      // return false;

                      if(res.status == "true"){
                          
                          swal({
                              title: "Information",
                              text: res.message,
                              type: "success",
                              showCancelButton: false,
                          }, function(willDelete) {
                              window.location.href="";
                          });

                          
                      }else{
                          swal("Alert", res.message, "error");
                      }

                      setTimeout(() => {
                          $("#lodaerModal").modal("hide");
                          $("#submitButton").removeAttr('disabled');
                          
                      }, 500);

                      
                      
                      
                  },
                  error: function(data, textStatus, xhr) {
                      if(data.status == 422){
                      
                      } 
                      
                      
                      
                      swal("Alert", "Something went wrong. Please try again.", "error");

                      setTimeout(() => {
                          $("#lodaerModal").modal("hide");
                          $("#submitButton").removeAttr('disabled');
                      }, 500);

                      


                  }
              });

            }
            
        });
      });






      $("#markAsCompleted").on("click",function(){
        let order_id = $(this).attr("data-id");

        swal({
            title: "Alert",
            text: "Are you sure you want to complete this order.",
            type: "warning",
            showCancelButton: true,
        }, function(willDelete) {

            if(willDelete){

              $("#lodaerModal").modal("show");
              

              let data = {
                order_id : order_id
              }

              $.ajax({
                  url:"{{route('completeOrder')}}",
                  data: data,
                  // contentType: false,
                  // processData: false,
                  type: 'POST',
                  success: function(res){
                      // console.log("resultback",res);
                      // return false;

                      if(res.status == "true"){
                          
                          swal({
                              title: "Information",
                              text: res.message,
                              type: "success",
                              showCancelButton: false,
                          }, function(willDelete) {
                              window.location.href="";
                          });

                          
                      }else{
                          swal("Alert", res.message, "error");
                      }

                      setTimeout(() => {
                          $("#lodaerModal").modal("hide");
                          $("#submitButton").removeAttr('disabled');
                          
                      }, 500);

                      
                      
                      
                  },
                  error: function(data, textStatus, xhr) {
                      if(data.status == 422){
                      
                      } 
                      
                      
                      
                      swal("Alert", "Something went wrong. Please try again.", "error");

                      setTimeout(() => {
                          $("#lodaerModal").modal("hide");
                          $("#submitButton").removeAttr('disabled');
                      }, 500);

                      


                  }
              });

            }
            
        });
      });



    })
  </script>
 
@stop
