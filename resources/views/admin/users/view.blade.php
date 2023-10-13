@extends('adminlte::page')

@section('title', 'User Details')

@section('content_header')
@stop

@section('content')
<div class="">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header alert d-flex justify-content-between align-items-center">
          <div class="tabs_wrapper">
            <a class="btn btn-sm btn-success tabButton active" data-id="user_details_tab" href="javascript:void(0);">User Details</a>
            
            <a class="btn btn-sm btn-success tabButton" data-id="address_details_tab" href="javascript:void(0);">Address Details</a>
            
            
            <a class="btn btn-sm btn-success tabButton" data-id="order_details_tab" href="javascript:void(0);">Order Details</a>

            <a class="btn btn-sm btn-success tabButton" data-id="payment_details_tab" href="javascript:void(0);">Payment Details</a>

          </div>
          <a class="btn btn-sm btn-success" href="{{ url()->previous() }}">{{ __('adminlte::adminlte.back') }}</a>
        </div>
        


                      <!-- USER DETAILS -->

              <div class="card-body data-expand" id="user_details_data">
                
                
      
                
                <!-- INFORMATION FIELDS -->
                <div class="information_fields">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" name="full_name" class="form-control" value="{{$userDetails->full_name}}" id="full_name" maxlength="30" disabled>
                        <div id ="full_name_error" class="error"></div>
                        @if($errors->has('full_name'))
                          <div class="error">{{ $errors->first('full_name') }}</div>
                        @endif
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Email Address</label>
                        <input type="text" name="email" class="form-control" id="email" value="{{$userDetails->email}}" maxlength="50" disabled>
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
                            if($userDetails->is_block == 1){
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
                            $created_at = Carbon\Carbon::parse($userDetails->created_at)->format("d-M-Y");
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

              <div class="card-body data-expand" id="address_details_data" hidden>
                
                
      
                
                <!-- INFORMATION FIELDS -->
                <div class="information_fields">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">First Name</label>
                        <input type="text" name="first_name" class="form-control" value="{{$userDetails->userAddress->first_name}}" id="first_name" maxlength="30" disabled>
                        <div id ="first_name_error" class="error"></div>
                        @if($errors->has('first_name'))
                          <div class="error">{{ $errors->first('first_name') }}</div>
                        @endif
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Last Name</label>
                        <input type="text" name="last_name" class="form-control" id="last_name" value="{{$userDetails->userAddress->last_name}}" maxlength="50" disabled>
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
                        <input type="text" name="email" class="form-control" id="email" value="{{$userDetails->userAddress->email}}" maxlength="50" disabled>
                        <div id ="email_error" class="error"></div>
                        @if($errors->has('email'))
                          <div class="error">{{ $errors->first('email') }}</div>
                        @endif
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Phone Number</label>
                        <input type="text" name="phone_number" class="form-control" id="phone_number" value="{{$userDetails->userAddress->phone_number}}" maxlength="50" disabled>
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
                        <input type="text" name="address" class="form-control" id="address" value="{{$userDetails->userAddress->address}}" maxlength="50" disabled>
                        <div id ="address_error" class="error"></div>
                        @if($errors->has('address'))
                          <div class="error">{{ $errors->first('address') }}</div>
                        @endif
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">City</label>
                        <input type="text" name="city" class="form-control" id="city" value="{{$userDetails->userAddress->city}}" maxlength="50" disabled>
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
                        <input type="text" name="state" class="form-control" id="state" value="{{$userDetails->userAddress->state}}" maxlength="50" disabled>
                        <div id ="state_error" class="error"></div>
                        @if($errors->has('state'))
                          <div class="error">{{ $errors->first('state') }}</div>
                        @endif
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Zip Code</label>
                        <input type="text" name="zip_code" class="form-control" id="zip_code" value="{{$userDetails->userAddress->zip_code}}" maxlength="50" disabled>
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




        <!-- Order Details -->


        <div class="card-body data-expand" id="order_details_data" hidden="true">


            <div class="">
                    <div class="row justify-content-center">
                      <div class="col-md-12">
                        <div class="card">
                          <div class="card-header alert d-flex justify-content-between align-items-center mb-0">
                            <h3>Order History</h3>
                            <!-- <a href="" class="show-user-advance-options">Advance Options <i class="fa fa-caret-down"></i></a> -->
                          </div>
                          <div class="card-body">

                            @if (session('status'))
                              <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                              </div>
                            @endif
                            <div class="table-responsive">
                              <table style="width:100%" id="orderHistoryList" class="table table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th>Sr. No.</th>
                                    <th>Order ID</th>
                                    <th>User Name</th>
                                    <th>Total Amount</th>
                                    <th>Discount Amount</th>
                                    <th>Pay Amount</th>

                                    <th>Payment Type</th>

                                    <th>Payment Received</th>
                                    <th>Status</th>
                                    
                                    <th>Created On</th>
                                    <th>{{ __('adminlte::adminlte.actions') }}</th>
                                  </tr>
                                </thead>
                                <tbody>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
          </div>

          <!-- Order History END -->



<!-- Payment Details -->


        <div class="card-body data-expand" id="payment_details_data" hidden="true">


            <div class="">
                    <div class="row justify-content-center">
                      <div class="col-md-12">
                        <div class="card">
                          <div class="card-header alert d-flex justify-content-between align-items-center mb-0">
                            <h3>Payment History</h3>
                            <!-- <a href="" class="show-user-advance-options">Advance Options <i class="fa fa-caret-down"></i></a> -->
                          </div>
                          <div class="card-body">

                            @if (session('status'))
                              <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                              </div>
                            @endif
                            <div class="table-responsive">
                              <table style="width:100%" id="paymentHistoryList" class="table table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th>Sr. No.</th>
                                    <th>Transaction ID</th>
                                    <th>Order ID</th>
                                    <th>User Name</th>
                                    <th>Payment Type</th>

                                    <th>Discount Amount</th>
                                    <th>shipping Charges</th>
                                    <th>Total Amount</th>
                                    <th>Pay Amount</th>
                                    
                                    <th>Created On</th>
                                    <th>{{ __('adminlte::adminlte.actions') }}</th>
                                  </tr>
                                </thead>
                                <tbody>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
          </div>

          <!-- Payment History END -->



              </div>

          </div>

      </div>

<!-- ---------- -->










    </div>
  </div>
</div>







<!-- MODAL -->

<div class="modal fade" id="lodaerModal" tabindex="-1" role="dialog" aria-labelledby="lodaerModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     
      <img src="{{url('/public/loading-buffering.gif')}}" style="width: 50px; height:50px;">
     
  </div>
</div>


<!-- END -->
@endsection

@section('css')

  <link rel="stylesheet" href="{{url('raty-master/lib/jquery.raty.css')}}">

<style>
  #profileImage {
    height: 150px;
    width: 200px;
    border-radius: 10px;
    object-fit: contain;
    background-color: #fbfbfb;
    border: 1px solid #343d49;
    padding: 10px;
  }

  div#language {
    background-color: #ffffff!important;
}



.card-header {
    padding: 20px 0;
    background-color: transparent;
}
.chat_list_by_ajax {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
    list-style-type: none;
    padding: 30px 20px 0;
    margin: 0;
}
.chat-container {
    margin-bottom: 30px;
    overflow-y: scroll;
    height: 400px;
}
.message {
    border-radius: 50px;
    position: relative;
    margin-bottom: 30px;
}
.message.left {
    padding: 15px 20px 15px 70px;
    background-color: #fff;
    border: 1px solid rgba(0,0,0,.125);
    text-align: left;
}
.message.right {
    align-self: flex-end;
    padding: 15px 20px 15px 20px;
    background-color: #5fe7ba;
    color: #ffffff;
    text-align: right;
}
.avatar {
    border-radius: 50%;
    object-fit: cover;
    position: absolute;
    left: 10px;
    top: -10px;
    width: 50px;
    height: 50px;
    border: 2px solid #b8c4cc;
}
.message.right .avatar {
    left: auto;
    right: 10px;
    border-color: #5C8049;
}
.message p {
    margin: 0;
}
.send-msg_wrap {
    font-size: 1rem;
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 10px 20px;
    width: 100%;
    height: 70px;
    border-top: 1px solid rgba(0,0,0,.125);
    border-radius: 0;
    border-left: none;
    border-right: none;
    background-color: transparent;
    border-bottom: none;
}
.send-msg_wrap input.text_input {
    border: none;
    padding: 0;
}
input.text_input:focus-visible {
    outline: none;
}
button.send {
    width: 45px;
    height: 45px;
    padding: 0;
}
button.send img {
    width: 40px;
}
button, button:hover {
    background-color: transparent;
    border: none;
}
button.send:focus {
    outline: none;
}
.send-msg_wrap textarea.text_input {
    width: 100%;
    overflow: hidden;
    border: none;
    height: 25px;
    padding: 0;
}
.send-msg_wrap textarea.text_input:focus-visible {
    outline: none;
}

/*Responsive*/

@media screen and (max-width: 1700px) {
    button.send {
        width: 35px;
        height: 35px;
        padding: 0;
    }
    button.send img {
        width: 30px;
    }
    .send-msg_wrap textarea.text_input {
        width: 100%;
        overflow: hidden;
        border: none;
        height: 26px;
        padding: 0;
        font-size: 15px;
    }
}
</style>
@stop

@section('js')

<!-- <script src="//code.jquery.com/jquery.min.js"></script> -->
<script src="{{url('raty-master/lib/jquery.raty.js')}}"></script>


<script type="text/javascript">

  $(document).ready(function(){

    $(".tabButton").on("click",function(){
      $(".data-expand").attr("hidden","true");
      $(".tabButton").removeClass("active");
      $(this).addClass("active");
      let dataId = $(this).data("id");
       if(dataId == "user_details_tab"){
        $("#user_details_data").removeAttr("hidden");
       }else if(dataId == "address_details_tab"){
        $("#address_details_data").removeAttr("hidden");
        $("#address_details_tab").addClass("active");
       }else if(dataId == "order_details_tab"){
        $("#order_details_data").removeAttr("hidden");
        let user_id = "{{$userDetails->id}}";
        let data = {
          '_token': "{{csrf_token()}}",
          'user_id' : user_id
        }

        dataTableHitOrderDetails(data);
       }else if(dataId == "payment_details_tab"){
          $("#payment_details_data").removeAttr("hidden");
          let user_id = "{{$userDetails->id}}";
          let data = {
            '_token': "{{csrf_token()}}",
            'user_id' : user_id
          }

          dataTableHitPaymentDetails(data);
       }
    });


    $(".click_on_user_document").on("click",function(){

      var get_base64 = $(this).attr('img_url');
      if(get_base64){
      fetch(get_base64)
        .then(e => e.blob())
        .then(e => {
            let obj = URL.createObjectURL(e);
            window.open(obj);
        })
        .catch(e => {
           console.log(e)
        });
       }
    });
});




    function dataTableHitOrderDetails(dataGET){
      $("#orderHistoryList").dataTable().fnDestroy();
      $('#orderHistoryList').dataTable({
             // /dom: "Bfrtip",
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "{{ route('orderHistoryList') }}",
                "type": "POST",
                "data" : dataGET,
              complete:function(){

                // if($("#basic-datatables_wrapper").find(".wrap_all").length <= 0){

                //   $('#basic-datatables_info,#basic-datatables_paginate').wrapAll('<div class="wrap_all"></div>');
                // }

                //rating_start();

              }

            },
            createdRow: function( row, data, dataIndex ) {

              $( row ).find('td:eq(1)').attr('data-id', data['id']).attr('key_type','unique_order_id').addClass('td_click').addClass('white_space');
              $( row ).find('td:eq(2)').attr('data-id', data['id']).attr('key_type','user_name').addClass('td_click').addClass('white_space');
              $( row ).find('td:eq(3)').attr('data-id', data['id']).attr('key_type','total_amount').addClass('td_click').addClass('white_space');
              $( row ).find('td:eq(4)').attr('data-id', data['id']).attr('key_type','discount_amount_for_coupon').addClass('td_click').addClass('white_space');
              
              $( row ).find('td:eq(5)').attr('data-id', data['id']).attr('key_type','pay_amount').addClass('td_click').addClass('white_space');
              
              $( row ).find('td:eq(6)').attr('data-id', data['id']).attr('key_type','payment_type').addClass('td_click').addClass('white_space');

              $( row ).find('td:eq(7)').attr('data-id', data['id']).attr('key_type','payment_received').addClass('td_click').addClass('white_space');


              $( row ).find('td:eq(8)').attr('data-id', data['id']).attr('key_type','order_status').addClass('td_click').addClass('white_space');

              $( row ).find('td:eq(9)').attr('data-id', data['id']).attr('key_type','date_show').addClass('td_click').addClass('white_space');
            },
            "columns": [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'unique_order_id', name: 'unique_order_id'},
              {data: 'user_name', name: 'user_name'},
              {data: 'total_amount', name: 'total_amount'},
              {data: 'discount_amount_for_coupon', name: 'discount_amount_for_coupon'},
              {data: 'pay_amount', name: 'pay_amount'},
              {data: 'payment_type', name: 'payment_type'},
              {data: 'payment_received', name: 'payment_received'},
              {data: 'order_status', name: 'order_status'},
              {data: 'date_show', name: 'date_show'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
            ],

        });
    }



    function dataTableHitPaymentDetails(dataGET){
      $("#paymentHistoryList").dataTable().fnDestroy();
      $('#paymentHistoryList').dataTable({
             // /dom: "Bfrtip",
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "{{ route('paymentHistoryList') }}",
                "type": "POST",
                "data" : dataGET,
              complete:function(){

                // if($("#basic-datatables_wrapper").find(".wrap_all").length <= 0){

                //   $('#basic-datatables_info,#basic-datatables_paginate').wrapAll('<div class="wrap_all"></div>');
                // }

              }

            },
            createdRow: function( row, data, dataIndex ) {

              $( row ).find('td:eq(1)').attr('data-id', data['id']).attr('key_type','transaction_id').addClass('td_click').addClass('white_space');
              $( row ).find('td:eq(2)').attr('data-id', data['id']).attr('key_type','show_order_id').addClass('td_click').addClass('white_space');
              $( row ).find('td:eq(3)').attr('data-id', data['id']).attr('key_type','user_name').addClass('td_click').addClass('white_space');
              $( row ).find('td:eq(4)').attr('data-id', data['id']).attr('key_type','payment_type').addClass('td_click').addClass('white_space');
              
              $( row ).find('td:eq(5)').attr('data-id', data['id']).attr('key_type','discount_amount_for_coupon').addClass('td_click').addClass('white_space');
              
              $( row ).find('td:eq(6)').attr('data-id', data['id']).attr('key_type','shipping_charger').addClass('td_click').addClass('white_space');

              $( row ).find('td:eq(7)').attr('data-id', data['id']).attr('key_type','total_amount').addClass('td_click').addClass('white_space');


              $( row ).find('td:eq(8)').attr('data-id', data['id']).attr('key_type','pay_amount').addClass('td_click').addClass('white_space');

              $( row ).find('td:eq(9)').attr('data-id', data['id']).attr('key_type','date_show').addClass('td_click').addClass('white_space');
            },
            "columns": [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'transaction_id', name: 'transaction_id'},
              {data: 'show_order_id', name: 'show_order_id'},
              {data: 'user_name', name: 'user_name'},
              {data: 'payment_type', name: 'payment_type'},
              {data: 'discount_amount_for_coupon', name: 'discount_amount_for_coupon'},

              {data: 'shipping_charger', name: 'shipping_charger'},
              {data: 'total_amount', name: 'total_amount'},
              {data: 'pay_amount', name: 'pay_amount'},
              {data: 'date_show', name: 'date_show'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
            ],

        });
    }


  



function rating_start(){
  $(".demo_rate").each(function(){
    let __value = $(this).data("id");
    $(this).raty({

        // shows a cancel button to cancel the rating.
        cancel      : false,

        // CSS class for cancel button
        cancelClass : 'raty-cancel',

        // hint of cancel button
        cancelHint  : 'Cancel this rating!',

        // icons for cancel button
        cancelOff   : 'cancel-off.png',
        cancelOn    : 'cancel-on.png',

        // position of cancel button
        cancelPlace : 'left',

        // fired on rating click
        click       : undefined,

        // enable half star selection
        half        : true,

        // enable half star
        halfShow    : true,

        // default hints of stars
        hints       : ['bad', 'poor', 'regular', 'good', 'gorgeous'],

        // Object list with position and icon on and off to do a mixed icons.
        iconRange   : undefined,

        // fired on mouseout.
        mouseout    : undefined,

        // fired on mouseover
        mouseover   : undefined,

        // hint for no rated elements when it's readOnly.
        noRatedMsg  : 'Not rated yet!',

        // number of stars
        number      : 5,

        // max number of stars
        numberMax   : 20,

        // a global locate where the icon will be looked.
        path        : undefined,

        // enables the selection of a precision score.
        precision   : false,

        // enables readonly mode
        readOnly    : true,

        // included values attributes to do the score round math.
        round       : { down: .25, full: .6, up: .76 },

        // initial rating
        score       : __value,

        // name of the hidden field that holds the score value.
        scoreName   : 'score',

        // enables just a single star selection.
        single      : false,

        // space between icons
        space       : true,

        // custom icons
        starHalf    : '{{url("raty-master/lib/images/star-half.png")}}',
        starOff     : '{{url("raty-master/lib/images/star-off.png")}}',
        starOn      : '{{url("raty-master/lib/images/star-on.png")}}',

        // target container
        target      : undefined,

        // template to interpolate the score in.
        targetFormat: '{score}',

        // if the last rating value will be keeped after mouseout.
        targetKeep  : false,

        // element selector where the score will be filled, instead of creating a new hidden field (scoreName option).
        targetScore : undefined,

        // default text setted on target.
        targetText  : '',

        // choose if target will receive hint or 'score' type.
        targetType  : 'hint',

        // element used to represent a star.
        starType    : 'img',

      });
  });
}
</script>
@stop
