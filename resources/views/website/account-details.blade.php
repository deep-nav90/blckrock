@extends('website.layout.layout')
@section('title','Food Court')


<style>
    .nav-pills-custom .nav-link {
    color: #aaa;
    background: #fff;
    position: relative;
}

a.action-button.openOrderDetailsModel {
    text-align: center;
    display: flex;
    justify-content: center;
}


.nav-pills-custom .nav-link.active {
    color: #ffffff !important;
    background: #fdbd3e !important;
    font-weight: 600 !important;
}

img.productImage {
    width: 50px;
    height: 50px;
    object-fit: cover;
}

.gradient-custom {
    /* fallback for old browsers */
    background: #cd9cf2;

    /* Chrome 10-25, Safari 5.1-6 */
    background: -webkit-linear-gradient(to top left, rgba(205, 156, 242, 1), rgba(246, 243, 255, 1));

    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    background: linear-gradient(to top left, rgba(205, 156, 242, 1), rgba(246, 243, 255, 1))
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


@media (min-width: 1200px) {
    .flex-wrr .ms-xl-5 {
        margin-left: 2rem!important;
        display: flex;
        justify-content: center;
        flex: 1;
        margin-right: 30px;
        flex-wrap: nowrap;
    }
}


.nav-pills-custom .nav-link.active::before {
    opacity: 1;
}

</style>
@section('content')

<!-- banner section start start-->
<div class="inner-slider-wrapper float_left">
      <div class="container">
         <div class="inner-caption">
            <h4>All Products</h4>
            <!-- <img src="{{url('public/webimg/tibreadtle.png')}}" alt="img"> -->
         </div>
         <ol class="breadcrumb sicon">
            <li><a href="{{route('index')}}">Home</a></li>
            <li class="active">My Accounts</li>
         </ol>
         <!-- <img class="meat" src="{{url('public/website/images/title-bottom.png')}}" alt="img"> -->
      </div>
   </div>

<div class="inner-page-main-wrapper float_left">
    <div class="container">
        <div class="row">
        <!-- Demo header-->
        
            <section class="header">
                <div class="container py-4">
                
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-3">
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


                        <div class="col-lg-9 col-md-9 col-9">
                            <!-- Tabs content -->
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade shadow rounded bg-white showActiveTab p-5" data-id="myAccount">
                                    <h4 class="font-italic mb-4 heading-color">My Account</h4>

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
                                                        <label>State*</label>

                                                        <select class="form-control form-select myaccountInput stateSelectBilling" name="state">
                                                            <option class="option_state_billing" value="">Select State</option>
                                                            @foreach($states_and_cities as $state_and_citie)
                                                            <option value="{{$state_and_citie->name}}" @if($state == $state_and_citie->name) selected @endif() class="option_state_billing" city-data="{{$state_and_citie->tblCities}}">{{$state_and_citie->name}}</option>
                                                            @endforeach()

                                                        </select>
                                                        <!-- <input type="text" value="{{$city}}" name="city" class="form-control myaccountInput" placeholder="Enter here"> -->
                                                    </div>
                                                </div>
                                                <!--  -->
                                                <div class="mb-3 row">
                                                    <div class="col-md-6 col-12">
                                                        <label>City*</label>

                                                        <select class="form-control form-select myaccountInput citySelectBilling appendCityDataBilling" name="city">
                                                            <option class="option_city_billing" value="">Select City</option>
                                                            

                                                        </select>

                                                        <!-- <input type="text" value="{{$state}}" name="state" class="form-control myaccountInput" placeholder="Enter here"> -->
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <label>Zip Code*</label>
                                                        <input type="text" value="{{$zip_code}}" name="zip_code" class="form-control myaccountInput" placeholder="Enter here">
                                                    </div>
                                                </div>
                                                

                                                <button class="submit_btn btn btn-web" id="myAccountUpdateBtn" href="javascript:void(0);">Update</button>

                                            </form>

                                    </div>
                                    
                                </div>
                                
                                <div class="tab-pane fade shadow rounded bg-white showActiveTab p-5" data-id="changePassword">
                                    <h4 class="font-italic mb-4 heading-color">Change Password</h4>

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
                                                    
                                                    

                                                    <button class="submit_btn btn btn-web" id="changePasswordUpdateBtn" href="javascript:void(0);">Update</button>

                                                </form>

                                        </div>
                                    
                                </div>
                                
                                <div class="tab-pane fade shadow rounded bg-white showActiveTab p-5" data-id="myOrders">
                                    <h4 class="font-italic mb-4 heading-color">My Orders</h4>
                                    <div class="col-lg-12 col-md-12 col-12">

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
                                        
                                    <!-- <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Office</th>
                                                <th>Age</th>
                                                <th>Start date</th>
                                                <th>Salary</th>
                                            </tr>
                                        </thead>
                                
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Office</th>
                                                <th>Age</th>
                                                <th>Start date</th>
                                                <th>Salary</th>
                                            </tr>
                                        </tfoot>
                                
                                        <tbody>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>System Architect</td>
                                                <td>Edinburgh</td>
                                                <td>61</td>
                                                <td>2011/04/25</td>
                                                <td>$320,800</td>
                                            </tr>
                                            <tr>
                                                <td>Garrett Winters</td>
                                                <td>Accountant</td>
                                                <td>Tokyo</td>
                                                <td>63</td>
                                                <td>2011/07/25</td>
                                                <td>$170,750</td>
                                            </tr>
                                            <tr>
                                                <td>Ashton Cox</td>
                                                <td>Junior Technical Author</td>
                                                <td>San Francisco</td>
                                                <td>66</td>
                                                <td>2009/01/12</td>
                                                <td>$86,000</td>
                                            </tr>
                                            <tr>
                                                <td>Cedric Kelly</td>
                                                <td>Senior Javascript Developer</td>
                                                <td>Edinburgh</td>
                                                <td>22</td>
                                                <td>2012/03/29</td>
                                                <td>$433,060</td>
                                            </tr>
                                            <tr>
                                                <td>Airi Satou</td>
                                                <td>Accountant</td>
                                                <td>Tokyo</td>
                                                <td>33</td>
                                                <td>2008/11/28</td>
                                                <td>$162,700</td>
                                            </tr>
                                            <tr>
                                                <td>Brielle Williamson</td>
                                                <td>Integration Specialist</td>
                                                <td>New York</td>
                                                <td>61</td>
                                                <td>2012/12/02</td>
                                                <td>$372,000</td>
                                            </tr>
                                           <tr>
                                                <td>Cara Stevens</td>
                                                <td>Sales Assistant</td>
                                                <td>New York</td>
                                                <td>46</td>
                                                <td>2011/12/06</td>
                                                <td>$145,600</td>
                                            </tr>
                                            <tr>
                                                <td>Hermione Butler</td>
                                                <td>Regional Director</td>
                                                <td>London</td>
                                                <td>47</td>
                                                <td>2011/03/21</td>
                                                <td>$356,250</td>
                                            </tr>
                                            <tr>
                                                <td>Lael Greer</td>
                                                <td>Systems Administrator</td>
                                                <td>London</td>
                                                <td>21</td>
                                                <td>2009/02/27</td>
                                                <td>$103,500</td>
                                            </tr>
                                            <tr>
                                                <td>Jonas Alexander</td>
                                                <td>Developer</td>
                                                <td>San Francisco</td>
                                                <td>30</td>
                                                <td>2010/07/14</td>
                                                <td>$86,500</td>
                                            </tr>
                                            <tr>
                                                <td>Shad Decker</td>
                                                <td>Regional Director</td>
                                                <td>Edinburgh</td>
                                                <td>51</td>
                                                <td>2008/11/13</td>
                                                <td>$183,000</td>
                                            </tr>
                                            <tr>
                                                <td>Michael Bruce</td>
                                                <td>Javascript Developer</td>
                                                <td>Singapore</td>
                                                <td>29</td>
                                                <td>2011/06/27</td>
                                                <td>$183,000</td>
                                            </tr>
                                            <tr>
                                                <td>Donna Snider</td>
                                                <td>Customer Support</td>
                                                <td>New York</td>
                                                <td>27</td>
                                                <td>2011/01/25</td>
                                                <td>$112,000</td>
                                            </tr>
                                        </tbody>
                                    </table> -->
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
<div class="modal fade" id="staticBackdrop"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="max-width:1000px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Order Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        

      <section class="h-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-10 col-xl-8">
                <div class="card" style="border-radius: 10px;">
                <div class="card-header px-4 py-5">
                    <h5 class="text-muted mb-0">Thanks for your Order, <span style="color: #a8729a;" class="orderName"></span>!</h5>
                </div>
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                    <p class="lead fw-normal mb-0" style="color: #a8729a;">Order Details</p>
                    <p class="small text-muted mb-0">Order ID : <span class="orderID"></span></p>
                    </div>

                    <div class="appendModelProducts">
                        
                    </div>

                    <div class="d-flex justify-content-between pt-2">
                    <p class="fw-bold mb-0">Order Details</p>
                    <p class="text-muted mb-0"><span class="fw-bold me-4">Total</span><span class="productAmountT"></span></p>
                    </div>

                    <div class="d-flex justify-content-between pt-2">
                    <p class="text-muted mb-0">Order ID : <span class="orderID"></span></p>
                    <p class="text-muted mb-0"><span class="fw-bold me-4">Discount</span><span class="discountAmount"></span></p>
                    </div>

                    <div class="d-flex justify-content-between">
                    <p class="text-muted mb-0"></p>
                    <p class="text-muted mb-0"><span class="fw-bold me-4">Shipping Charges</span>₹<span class="shippingCharges"></span></p>
                    </div>

                    <!-- <div class="d-flex justify-content-between mb-5">
                    <p class="text-muted mb-0">Recepits Voucher : 18KU-62IIK</p>
                    <p class="text-muted mb-0"><span class="fw-bold me-4">Delivery Charges</span> Free</p>
                    </div> -->
                </div>
                <div class="card-footer border-0 px-4 py-5"
                    style="background-color: #a8729a; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
                    <h5 class="d-flex align-items-center justify-content-end text-white text-uppercase mb-0">Total
                    paid: <span class="h2 mb-0 ms-2"><span class="totalAmountPaid"></span></span></h5>
                </div>
                </div>
            </div>
            </div>
        </div>
        </section>



      </div>
      
    </div>
  </div>
</div>
@endsection()


@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>
<!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> -->

<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js"></script>
<script>
       
        $(document).ready(function() {
    $('#example').dataTable();
} );
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
              //maxlength : 30,
             // minlength : 2
            },
            state : {
              required : true,
              //maxlength : 30
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
             state: {
               required: "State is required.",
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

            let orderDetails = JSON.parse(atob($(this).attr("orderDetails")));

            console.log(orderDetails)

            $(".orderName").text(orderDetails.billing_shipping_address.billing_first_name + " " + orderDetails.billing_shipping_address.billing_last_name)
            $(".orderID").text(orderDetails.unique_order_id);


            let htm="";

            for(let k=0; k<orderDetails.product_orders.length; k++){

                let line_value = 0;
                if(orderDetails.order_status == "Pending" || orderDetails.order_status == "Rejected"){
                    line_value = 0;
                }else if(orderDetails.order_status == "Accepted"){
                    line_value = 43;
                }else if(orderDetails.order_status == "Shipped"){
                    line_value = 71;
                }else if(orderDetails.order_status == "Completed"){
                    line_value = 100;
                }
                let product_default_image = "";

                orderDetails.product_orders[k].product.product_images.map(function(p){
                    if(p.is_featured_image == 1){
                        product_default_image = p.product_image;
                    }
                })

                htm += `<div class="card shadow-0 border mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <img class="productImage" src="`+product_default_image+`" class="img-fluid" alt="Product Image"/>
                                    </div>
                                    <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                        <p class="text-muted mb-0 productName">`+orderDetails.product_orders[k].product_name+`</p>
                                    </div>

                                    <div class="col-md-3 text-center d-flex justify-content-center align-items-center">
                                        <p class="text-muted mb-0 small productAttributeNameValue">`+orderDetails.product_orders[k].attribute_name+`: `+orderDetails.product_orders[k].attribute_value+`</p>
                                    </div>
                                    
                                
                                    <div class="col-md-3 text-center d-flex justify-content-center align-items-center">
                                        <p class="text-muted mb-0 small productQuantity">Quantity: `+orderDetails.product_orders[k].quantity+`</p>
                                    </div>
                                    <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                        <p class="text-muted mb-0 small productPrice">Price: ₹`+orderDetails.product_orders[k].sale_price+`</p>
                                    </div>
                                </div>
                                <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">
                                <div class="row d-flex align-items-center">
                                <div class="col-md-2">
                                    <p class="text-muted mb-0 small">Track Order</p>
                                </div>
                                <div class="col-md-10">
                                    <div class="progress" style="height: 6px; border-radius: 16px;">
                                    <div class="progress-bar" role="progressbar"
                                        style="width: `+line_value+`%; border-radius: 16px; background-color: #a8729a;" aria-valuenow="`+line_value+`"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="d-flex justify-content-around mb-1 flex-wrr">
                                    <p class="text-muted mt-1 mb-0 small ms-xl-5">Pending</p>
                                    <p class="text-muted mt-1 mb-0 small ms-xl-5">Accepted</p>
                                    <p class="text-muted mt-1 mb-0 small ms-xl-5">Shipped</p>
                                    <p class="text-muted mt-1 mb-0 small ms-xl-5">Delivered</p>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>`;
            }

            
            $(".appendModelProducts").html(htm);

            $(".productAmountT").text(orderDetails.total_amount);
            $(".discountAmount").text(orderDetails.discount_amount_for_coupon);
            $(".shippingCharges").text(orderDetails.shipping_charger);
            $(".totalAmountPaid").text(orderDetails.pay_amount);

            $("#staticBackdrop").modal("show");

        })
    })

    function dataTableHit(dataGET){
      $("#categoryList").dataTable().fnDestroy();
      $('#categoryList').dataTable({
             // /dom: "Bfrtip",
            "processing": false,
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

<script>
    $(document).ready(function(){


        // SELECTED STATE ACCORDING TO CITY SELECT

        let __alreadySelectedState = $(".stateSelectBilling").val();

        if(__alreadySelectedState){
            let __selectedCityName = "{{$city}}";
            let __cityDataAttr = $(".option_state_billing[value='"+__alreadySelectedState+"']").attr('city-data');
            let __cityData = JSON.parse(__cityDataAttr);
            let __cityHtml = "";

            __cityHtml += `<option class="option_city_billing" value="">Select City</option>`;
            for(let k=0; k<__cityData.length; k++){
                let __selectedVariable = "";

                if(__cityData[k].name == __selectedCityName){
                    __selectedVariable = "selected";
                }
                __cityHtml += `
                    <option value="`+__cityData[k].name+`" `+__selectedVariable+` class="option_city_billing">`+__cityData[k].name+`</option>`;
            }

            $(".appendCityDataBilling").html(__cityHtml);

        }
        

        $(document).on("change",".stateSelectBilling",function(){

            let _val = $(this).val();

            let cityDataAttr = $(".option_state_billing[value='"+_val+"']").attr('city-data');
            let cityData = JSON.parse(cityDataAttr);

            let cityHtml = "";


            cityHtml += `<option class="option_city_billing" value="">Select City</option>`;
            for(let k=0; k<cityData.length; k++){
            cityHtml += `
                <option value="`+cityData[k].name+`" class="option_city_billing">`+cityData[k].name+`</option>`;
            }

            $(".appendCityDataBilling").html(cityHtml);
        });
    })
</script>

@endsection()
