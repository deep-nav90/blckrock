@extends('website.layout.layout')
@section('title','Food Court')


<style>
    
.nav-pills-custom .nav-link {
    color: #aaa;
    background: #fff;
    position: relative;
}

.nav-pills-custom .nav-link.active {
    color: #45b649;
    background: #fff;
}


/* Add indicator arrow for the active tab */
@media (min-width: 992px) {
    .nav-pills-custom .nav-link::before {
        content: '';
        display: block;
        border-top: 8px solid transparent;
        border-left: 10px solid #fff;
        border-bottom: 8px solid transparent;
        position: absolute;
        top: 50%;
        right: -10px;
        transform: translateY(-50%);
        opacity: 0;
    }
}

.nav-pills-custom .nav-link.active::before {
    opacity: 1;
}



.py-5.header {
    min-height: 100vh;
    background: linear-gradient(to left, #dce35b, #45b649);
}

</style>
@section('content')

<!-- banner section start start-->
<div class="inner-slider-wrapper float_left">
      <div class="container">
         <div class="inner-caption">
            <h4>Checkout</h4>
            <img src="{{url('public/website/images/title.png')}}" alt="img">
         </div>
         <!-- <img class="meat" src="{{url('public/website/images/foodc1.jpg')}}" alt="img"> -->
      </div>
   </div>
   <!-- banner section start end-->

<div class="inner-page-main-wrapper float_left ptb-100">
    <div class="container">
        <div class="row">
        <!-- Demo header-->
            <section class="py-5 header">
                <div class="container py-4">
                
                    <div class="row">
                        <div class="col-md-3">
                            <!-- Tabs nav -->
                            <div class="nav flex-column nav-pills nav-pills-custom" id="v-pills-tab">
                                <a class="nav-link mb-3 p-3 shadow highlightActive" data-id="myAccount">
                                    <i class="fa fa-user-circle-o mr-2"></i>
                                    <span class="font-weight-bold small text-uppercase">My Account</span></a>

                                <a class="nav-link mb-3 p-3 shadow highlightActive" data-id="changePassword">
                                    <i class="fa fa-calendar-minus-o mr-2"></i>
                                    <span class="font-weight-bold small text-uppercase">Change Password</span></a>

                                <a class="nav-link mb-3 p-3 shadow highlightActive" data-id="myOrders">
                                    <i class="fa fa-star mr-2"></i>
                                    <span class="font-weight-bold small text-uppercase">My Orders</span></a>

                                
                            </div>
                        </div>


                        <div class="col-md-9">
                            <!-- Tabs content -->
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade shadow rounded bg-white showActiveTab p-5" data-id="myAccount">
                                    <h4 class="font-italic mb-4">My Account</h4>

                                    <div class="myAccountFormClass">
                                        <form id="accountFormID">
                                            {{@csrf_field()}}

                                            <?php 
                                                $full_name = $checkLogin->full_name;
                                                $login_email = $checkLogin->email;
                                                $first_name = "";
                                                $last_name = "";
                                                $email = "";
                                                $phone_number = "";
                                                $address = "";
                                                $city = "";
                                                $state = "";
                                                $zip_code = "";

                                                if($checkLogin->userAddress){

                                                if($checkLogin->userAddress){
                                                    $first_name = $checkLogin->userAddress->first_name;
                                                    $last_name = $checkLogin->userAddress->last_name;
                                                    $email = $checkLogin->userAddress->email;
                                                    $phone_number = $checkLogin->userAddress->phone_number;
                                                    $address = $checkLogin->userAddress->address;
                                                    $city = $checkLogin->userAddress->city;
                                                    $state = $checkLogin->userAddress->state;
                                                    $zip_code = $checkLogin->userAddress->zip_code;
                                                }

                                                }
                                            ?>

                                                <div class="mb-3 row">
                                                    <div class="col-md-6 col-12">
                                                        <label>Full Name*</label>
                                                        <input type="text" class="form-control myaccountInput" name="full_name" value="{{$full_name}}" placeholder="Enter here">
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <label>Account Email</label>
                                                        <input type="text" class="form-control myaccountInput" value="{{$login_email}}" placeholder="Enter here" disabled>
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <div class="col-md-6 col-12">
                                                        <label>First Name*</label>
                                                        <input type="text" class="form-control myaccountInput" name="first_name" value="{{$first_name}}" placeholder="Enter here">
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <label>Last Name*</label>
                                                        <input type="text" class="form-control myaccountInput" name="last_name" value="{{$last_name}}" placeholder="Enter here">
                                                    </div>
                                                </div>
                                                <!--  -->
                                                <div class="mb-3 row">
                                                    <div class="col-md-6 col-12">
                                                        <label>Email*</label>
                                                        <input type="email"  value="{{$email}}" class="form-control myaccountInput" name="email" placeholder="Enter here">
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <label>Phone No.*</label>
                                                        <input type="text"  value="{{$phone_number}}" class="form-control myaccountInput" name="phone_number" placeholder="Enter here">
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <div class="col-md-6 col-12">
                                                        <label>Address*</label>
                                                        <input type="text" value="{{$address}}" name="address" class="form-control myaccountInput" placeholder="Enter here">
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <label>City*</label>
                                                        <input type="text" value="{{$city}}" name="city" class="form-control myaccountInput" placeholder="Enter here">
                                                    </div>
                                                </div>
                                                <!--  -->
                                                <div class="mb-3 row">
                                                    <div class="col-md-6 col-12">
                                                        <label>State*</label>
                                                        <input type="text" value="{{$state}}" name="state" class="form-control myaccountInput" placeholder="Enter here">
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <label>Zip Code*</label>
                                                        <input type="text" value="{{$zip_code}}" name="zip_code" class="form-control myaccountInput" placeholder="Enter here">
                                                    </div>
                                                </div>
                                                

                                                <button class="submit_btn" id="myAccountUpdateBtn" href="javascript:void(0);">Update</button>

                                            </form>

                                    </div>
                                    
                                </div>
                                
                                <div class="tab-pane fade shadow rounded bg-white showActiveTab p-5" data-id="changePassword">
                                    <h4 class="font-italic mb-4">Change Password</h4>

                                        <div class="changePasswordFormClass">
                                            <form id="changePasswordFormID">
                                                {{@csrf_field()}}

                                                

                                                    <div class="mb-3 row">
                                                        <div class="col-md-6 col-12">
                                                            <label>Old Password*</label>
                                                            <input type="password" class="form-control changePasswordInput" name="old_password"  placeholder="Enter here">
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <label>New Password*</label>
                                                            <input type="password" id="new_password" class="form-control changePasswordInput" name="new_password"  placeholder="Enter here">
                                                        </div>
                                                    </div>

                                                    <div class="mb-3 row">
                                                        <div class="col-md-6 col-12">
                                                            <label>Confirm Password*</label>
                                                            <input type="password" id="confirm_password" class="form-control changePasswordInput" name="confirm_password" placeholder="Enter here">
                                                        </div>
                                                       
                                                    </div>
                                                    
                                                    

                                                    <button class="submit_btn" id="changePasswordUpdateBtn" href="javascript:void(0);">Update</button>

                                                </form>

                                        </div>
                                    
                                </div>
                                
                                <div class="tab-pane fade shadow rounded bg-white showActiveTab p-5" data-id="myOrders">
                                    <h4 class="font-italic mb-4">My Orders</h4>

                                    <div class="">
                                        <div class="row justify-content-center">
                                            <div class="col-md-12">
                                            <div class="card">
                                                     
                                                <div class="card-body">
                                                
                                                @if (session('status'))
                                                    <div class="alert alert-success" role="alert">
                                                    {{ session('status') }}
                                                    </div>
                                                @endif
                                                <div class="table-responsive">
                                                    <table style="width:100%" id="categoryList" class="table table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                        <th>Sr. No.</th>
                                                        <th>Order ID</th>
                                                        <th>Total Amount</th>
                                                        <th>Discount Amount</th>
                                                        <th>Pay Amount</th>

                                                        <th>Payment Type</th>

                                                        <th>Payment Received</th>
                                                        <th>Status</th>
                                                        
                                                        <th>Date</th>
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
                                
                               
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>


<div class="modal fade" id="lodaerModal" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="lodaerModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     
      <img src="{{url('/public/loading-buffering.gif')}}" style="width: 50px; height:50px;">
     
  </div>
</div>




<!-- MODAL -->

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>
@endsection()


@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script>
        $('.datatable').DataTable( {
            columnDefs: [ {
                targets: 0,
                render: function ( data, type, row ) {
                    return data.substr( 0, 2 );
                }
            }]
        });
    </script>



<script>
    $(document).ready(function(){

        let defaultClickOn = localStorage.getItem("clickOnDropDownNavBar");

        setTimeout(() => {
            $(".highlightActive[data-id='"+defaultClickOn+"']").trigger("click");
        }, 100);
        

        $(document).on("click",".highlightActive",function(){

            //remove all previous active class
            $(".highlightActive").removeClass("active");
            $(".showActiveTab").removeClass(["show","active"]);

            let clickOn = $(this).data("id");
            localStorage.setItem("clickOnDropDownNavBar",clickOn);
            $(this).addClass("active");
            if(clickOn == "myAccount"){
                $(".showActiveTab[data-id='"+clickOn+"']").addClass(["show","active"]);
            }else if(clickOn == "changePassword"){
                //console.log("Sss", $(".showActiveTab"))
                $(".showActiveTab[data-id='"+clickOn+"']").addClass(["show","active"]);
            }else if(clickOn == "myOrders"){
                $(".showActiveTab[data-id='"+clickOn+"']").addClass(["show","active"]);

                let data = {
                    '_token': "{{csrf_token()}}"
                }

                dataTableHit(data);

            }

        })
    })
</script>

<script>
    $(document).ready(function(){
        var accountFormID = $( "#accountFormID" );
         accountFormID.validate({
           ignore: [],
           debug: false,
           rules: {

            full_name : {
              required : true,
              minlength : 2,
              maxlength : 50
            },

            first_name : {
              required : true,
              minlength : 2,
              maxlength : 50
            },
            last_name : {
              required : true,
              minlength : 2,
              maxlength : 50
            },
            email: {
              required: true,
              email:true
            },
            phone_number: {
              required: true,
              digits: true,  // <- here
              minlength : 8,
              maxlength : 16
            },
            address : {
              required : true,
              maxlength : 200
            },
            city: {
              required : true,
              maxlength : 30,
              minlength : 2
            },
            state : {
              required : true,
              maxlength : 30
            },
            zip_code : {
              required : true,
              digits: true,  // <- here
              minlength : 4,
              maxlength : 12
            }

             
             
           },
           messages: {
            full_name: {
               required: "Full Name is required.",
               minlength:"Full Name should be atleast 2 characters.",
               maxlength : "Full Name should be less than 50 characters."
             },
             first_name: {
               required: "First Name is required.",
               minlength:"First Name should be atleast 2 characters.",
               maxlength : "First Name should be less than 50 characters."
             },
             last_name: {
               required: "Last Name is required.",
               minlength:"Last Name should be atleast 2 characters.",
               maxlength : "Last Name should be less than 50 characters."
             },
             email: {
               required: "Email is required.",
               email:"Email address is invalid."
             },
             phone_number: {
               required: "Phone No. is required.",
               digits:"Phone No. should be digits only.",
               minlength : "Phone number should be 8 to 16 digits.",
               maxlength : "Phone number should be 8 to 16 digits.",
             },
             address: {
               required: "Address is required.",
               maxlength:"Address should be less than 200 characters."
             },
             city: {
               required: "City is required.",
               maxlength:"City should be less than 30 characters.",
               minlength : "City should be atleast 2 characters long."
             },
             zip_code: {
               required: "Zip Code is required.",
               digits:"Zip Code should be digits only.",
               minlength : "Zip Code should be 4 to 12 digits.",
               maxlength : "Zip Code should be 4 to 12 digits.",
             }                     
           },
           submitHandler:function(form){

            $("#lodaerModal").modal("show");

                var fd = new FormData();
                var other_data = $('#accountFormID').serializeArray();
                
                $.each(other_data, function(key, input) {
                    
                    fd.append(input.name, input.value);
                });

                
                var data = fd;

                $.ajax({
                    url:"{{route('updateAccount')}}",
                    data: fd,
                    contentType: false,
                    processData: false,
                    type: 'POST',
                    success: function(res){
                        

                        if(res.status == "true"){

                            Swal.fire({
                            title: 'Information',
                            text: res.message,
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ok',
                            allowOutsideClick: false
                            }).then((result) => {
                            
                            })

                            
                            

                            
                        }else if(res.status == "sessionExpired"){
                            Swal.fire({
                            title: 'Alert',
                            text: res.message,
                            icon: 'warning',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ok',
                            allowOutsideClick: false
                            }).then((result) => {
                                window.location.href="{{route('loginWeb')}}";
                            })
                        }
                        else{
                            Swal.fire("Alert", res.message, "error");
                        }

                        setTimeout(() => {
                            $("#lodaerModal").modal("hide");
                            
                            
                        }, 500);

                        
                        
                        
                    },
                    error: function(data, textStatus, xhr) {
                        if(data.status == 422){
                        
                        } 
                        
                        
                        
                        Swal.fire("Alert", "Something went wrong. Please try again.", "error");

                        setTimeout(() => {
                            $("#lodaerModal").modal("hide");
                            
                        }, 500);

                        


                    }
                });


            },
           onkeyup: false,
           onblur: true
         });


         //Change password Form


         var changePasswordFormID = $( "#changePasswordFormID" );
         changePasswordFormID.validate({
           ignore: [],
           debug: false,
           rules: {

            old_password : {
              required : true
            },

            new_password : {
              required : true
            },
            confirm_password : {
              required : true,
              equalTo : "#new_password"
            },
            
             
           },
           messages: {
            old_password: {
               required: "Old Password is required.",
               
             },
             new_password: {
               required: "New Password is required.",
               
             },
             confirm_password: {
               required: "Confirm Password is required.",
               equalTo: "New password and Confirm password must be same.",
             }                     
           },
           submitHandler:function(form){

            $("#lodaerModal").modal("show");

                var fd = new FormData();
                var other_data = $('#changePasswordFormID').serializeArray();
                
                $.each(other_data, function(key, input) {
                    
                    fd.append(input.name, input.value);
                });

                
                var data = fd;

                $.ajax({
                    url:"{{route('changePasswordUser')}}",
                    data: fd,
                    contentType: false,
                    processData: false,
                    type: 'POST',
                    success: function(res){
                        

                        if(res.status == "true"){

                            Swal.fire({
                            title: 'Information',
                            text: res.message,
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ok',
                            allowOutsideClick: false
                            }).then((result) => {
                                window.location.href="{{route('loginWeb')}}";
                            })

                            
                            

                            
                        }else if(res.status == "sessionExpired"){
                            Swal.fire({
                            title: 'Alert',
                            text: res.message,
                            icon: 'warning',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ok',
                            allowOutsideClick: false
                            }).then((result) => {
                                window.location.href="{{route('loginWeb')}}";
                            })
                        }
                        else{
                            Swal.fire("Alert", res.message, "error");
                        }

                        setTimeout(() => {
                            $("#lodaerModal").modal("hide");
                            
                            
                        }, 500);

                        
                        
                        
                    },
                    error: function(data, textStatus, xhr) {
                        if(data.status == 422){
                        
                        } 
                        
                        
                        
                        Swal.fire("Alert", "Something went wrong. Please try again.", "error");

                        setTimeout(() => {
                            $("#lodaerModal").modal("hide");
                            
                        }, 500);

                        


                    }
                });


            },
           onkeyup: false,
           onblur: true
         });





    })
</script>


<script>

    $(document).ready(function(){
        $(document).on("click",".openOrderDetailsModel",function(){
            let data_id = $(this).data("id");
            $("#staticBackdrop").modal("show");

        })
    })

    function dataTableHit(dataGET){
      $("#categoryList").dataTable().fnDestroy();
      $('#categoryList').dataTable({
             // /dom: "Bfrtip",
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "{{ route('myOrders') }}",
                "type": "POST",
                "data" : dataGET,
              complete:function(){

                // if($("#basic-datatables_wrapper").find(".wrap_all").length <= 0){

                //   $('#basic-datatables_info,#basic-datatables_paginate').wrapAll('<div class="wrap_all"></div>'); 
                // }

              }

            },
            createdRow: function( row, data, dataIndex ) {

              $( row ).find('td:eq(1)').attr('data-id', data['id']).attr('key_type','unique_order_id').addClass('td_click').addClass('white_space');
             
              $( row ).find('td:eq(2)').attr('data-id', data['id']).attr('key_type','total_amount').addClass('td_click').addClass('white_space');
              $( row ).find('td:eq(3)').attr('data-id', data['id']).attr('key_type','discount_amount_for_coupon').addClass('td_click').addClass('white_space');
              
              $( row ).find('td:eq(4)').attr('data-id', data['id']).attr('key_type','pay_amount').addClass('td_click').addClass('white_space');
              
              $( row ).find('td:eq(5)').attr('data-id', data['id']).attr('key_type','payment_type').addClass('td_click').addClass('white_space');

              $( row ).find('td:eq(6)').attr('data-id', data['id']).attr('key_type','payment_received').addClass('td_click').addClass('white_space');


              $( row ).find('td:eq(7)').attr('data-id', data['id']).attr('key_type','order_status').addClass('td_click').addClass('white_space');

              $( row ).find('td:eq(8)').attr('data-id', data['id']).attr('key_type','date_show').addClass('td_click').addClass('white_space');

            },
            "columns": [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'unique_order_id', name: 'unique_order_id'},
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
</script>

@endsection()