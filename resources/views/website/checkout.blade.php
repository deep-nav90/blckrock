@extends('website.layout.layout')
@section('title','Food Court')

@section('content')

<style>
   span.do_you_have_an_account {
    color: #111;
}

span.signupNow {
    color: #ef5350;
}
</style>

<?php 
$is_login = "false";
if(Auth::guard('web')->user()){
    $is_login = "true";
}
?>

   <!-- banner section start start-->
   <div class="inner-slider-wrapper float_left">
      <div class="container">
         <div class="inner-caption">
            <h4>Checkout</h4>
            <img src="{{url('public/website/images/title.png')}}" alt="img">
         </div>
         <ol class="breadcrumb sicon">
            <li><a href="{{route('index')}}">Home</a></li>
            <li class="active">Checkout</li>
         </ol>
         <!-- <img class="meat" src="{{url('public/website/images/foodc1.jpg')}}" alt="img"> -->
      </div>
   </div>
   <!-- banner section start end-->

   <div class="inner-page-main-wrapper float_left ptb-100">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 col-md-12 col-12">
               <div class="side-accordian">
                  <div class="accordions" id="secondAccordion">

                     @if($is_login == "false")
                     <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                           <button class="accordion-button" type="button" data-bs-toggle="collapse"
                              data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                              Signup / Login Account
                           </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse show" aria-labelledby="headingFour"
                           data-bs-parent="#secondAccordion">
                           <div class="accordion-body">
                              <div class="row">
                                 <div class="col-md-6 col-12">

                                 <div class="login-img">
                                    <img class="img-fluid" src="{{url('/public/website/images/product/login.webp')}}" alt="img">
                                 </div>

                                    <!-- <div class="new_customer">
                                       <h3>New Customer</h3>
                                       <form>
                                          <p>
                                             <input type="radio" id="test1" name="radio-group" checked>
                                             <label for="test1">Register Account</label>
                                          </p>
                                          <p>
                                             <input type="radio" id="test2" name="radio-group">
                                             <label for="test2">Stayc As Guest</label>
                                          </p>
                                       </form>
                                       <p>There are many variations of passages of Lorem Ipsum available, but the
                                          majority havesuffered alteration in.</p>
                                       <a class="submit_btn" href="#">Continue</a>
                                    </div> -->
                                 </div>
                                 <div class="col-md-6 col-12">
                                    <div class="login_form">
                                       <h3>Log In</h3>
                                       <form id="loginForm" method="POST">
                                          {{@csrf_field()}}
                                          <div class="mb-3 row">
                                             <div class="col-12">
                                                <label>Email</label>
                                             </div>
                                             <div class="col-12">
                                                <input type="email" name="email" placeholder="Enter Email Here">
                                             </div>
                                          </div>
                                          <div class="mb-3 row">
                                             <div class="col-12">
                                                <label>Password</label>
                                             </div>
                                             <div class="col-12">
                                                <input type="password" name="password" placeholder="Enter Password Here">
                                                <!-- <a href="#">Forgot Password!</a> -->
                                             </div>
                                          </div>

                                          
                                          
                                          <button class="submit_btn">Login Now</button>
                                       </form>

                                       <p class="signupCheckout mt-4"><span class="do_you_have_an_account">Do have an account?</span> <a  href="{{route('signUp')}}"><span class="signupNow">Sign Up now!</span></a></p>
                                       
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     @endif()

                     <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFive">
                           <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                              data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                              Billing Information
                           </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                           data-bs-parent="#secondAccordion">
                           <div class="accordion-body">
                              <div class="billing_info">
                                 <form id="billingInformation">
                                  {{@csrf_field()}}

                                  <?php 
                                    $first_name = "";
                                    $last_name = "";
                                    $email = "";
                                    $phone_number = "";
                                    $address = "";
                                    $city = "";
                                    $state = "";
                                    $zip_code = "";

                                    if($userWithAddress){

                                       if($userWithAddress->userAddress){
                                          $first_name = $userWithAddress->userAddress->first_name;
                                          $last_name = $userWithAddress->userAddress->last_name;
                                          $email = $userWithAddress->userAddress->email;
                                          $phone_number = $userWithAddress->userAddress->phone_number;
                                          $address = $userWithAddress->userAddress->address;
                                          $city = $userWithAddress->userAddress->city;
                                          $state = $userWithAddress->userAddress->state;
                                          $zip_code = $userWithAddress->userAddress->zip_code;
                                       }

                                    }
                                  ?>

                                    <div class="mb-3 row">
                                       <div class="col-md-6 col-12">
                                          <label>First Name*</label>
                                          <input type="text" class="form-control billingInput" name="first_name" value="{{$first_name}}" placeholder="Enter here">
                                       </div>
                                       <div class="col-md-6 col-12">
                                          <label>Last Name*</label>
                                          <input type="text" class="form-control billingInput" name="last_name" value="{{$last_name}}" placeholder="Enter here">
                                       </div>
                                    </div>
                                    <!--  -->
                                    <div class="mb-3 row">
                                       <div class="col-md-6 col-12">
                                          <label>Email*</label>
                                          <input type="email"  value="{{$email}}" class="form-control billingInput" name="email" placeholder="Enter here">
                                       </div>
                                       <div class="col-md-6 col-12">
                                          <label>Phone No.*</label>
                                          <input type="text"  value="{{$phone_number}}" class="form-control billingInput" name="phone_number" placeholder="Enter here">
                                       </div>
                                    </div>

                                    <div class="mb-3 row">
                                       <div class="col-md-6 col-12">
                                          <label>Address*</label>
                                          <input type="text" value="{{$address}}" name="address" class="form-control billingInput" placeholder="Enter here">
                                       </div>
                                       <div class="col-md-6 col-12">
                                          <label>City*</label>
                                          <input type="text" value="{{$city}}" name="city" class="form-control billingInput" placeholder="Enter here">
                                       </div>
                                    </div>
                                    <!--  -->
                                    <div class="mb-3 row">
                                       <div class="col-md-6 col-12">
                                          <label>State*</label>
                                          <input type="text" value="{{$state}}" name="state" class="form-control billingInput" placeholder="Enter here">
                                       </div>
                                       <div class="col-md-6 col-12">
                                          <label>Zip Code*</label>
                                          <input type="text" value="{{$zip_code}}" name="zip_code" class="form-control billingInput" placeholder="Enter here">
                                       </div>
                                    </div>
                                    <!--  -->
                                    <div class="fmb-3 row">
                                       <div class="col-md-12 col-12">
                                          <input type="checkbox" id="scales" name="scales">
                                          <label for="scales">Ship to Same Address As Billing</label>
                                       </div>
                                    </div>

                                    <button class="submit_btn" id="billingBtn" billing_information = "false" href="javascript:void(0);">Continue</button>

                                 </form>
                                 
                              </div>
                           </div>
                        </div>
                     </div>


                     <div class="accordion-item">
                        <h2 class="accordion-header" id="headingSix">
                           <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                              data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                              Shipping Information
                           </button>
                        </h2>
                        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                           data-bs-parent="#secondAccordion">
                           <div class="accordion-body">
                              <div class="billing_info">
                                 <form id="shippingInformation">
                                  {{@csrf_field()}}

                                  
                                    <div class="mb-3 row">
                                       <div class="col-md-6 col-12">
                                          <label>First Name*</label>
                                          <input type="text" class="form-control shippingInput" name="first_name" placeholder="Enter here">
                                       </div>
                                       <div class="col-md-6 col-12">
                                          <label>Last Name*</label>
                                          <input type="text" class="form-control shippingInput" name="last_name" placeholder="Enter here">
                                       </div>
                                    </div>
                                    <!--  -->
                                    <div class="mb-3 row">
                                       <div class="col-md-6 col-12">
                                          <label>Email*</label>
                                          <input type="email" class="form-control shippingInput" name="email" placeholder="Enter here">
                                       </div>
                                       <div class="col-md-6 col-12">
                                          <label>Phone No.*</label>
                                          <input type="text"  class="form-control shippingInput" name="phone_number" placeholder="Enter here">
                                       </div>
                                    </div>

                                    <div class="mb-3 row">
                                       <div class="col-md-6 col-12">
                                          <label>Address*</label>
                                          <input type="text"  name="address" class="form-control shippingInput" placeholder="Enter here">
                                       </div>
                                       <div class="col-md-6 col-12">
                                          <label>City*</label>
                                          <input type="text"  name="city" class="form-control shippingInput" placeholder="Enter here">
                                       </div>
                                    </div>
                                    <!--  -->
                                    <div class="mb-3 row">
                                       <div class="col-md-6 col-12">
                                          <label>State*</label>
                                          <input type="text"  name="state" class="form-control shippingInput" placeholder="Enter here">
                                       </div>
                                       <div class="col-md-6 col-12">
                                          <label>Zip Code*</label>
                                          <input type="text"  name="zip_code" class="form-control shippingInput" placeholder="Enter here">
                                       </div>
                                    </div>
                                    <!--  -->
                                    
                                    <button class="submit_btn" id="shippingBtn" billing_information = "false" href="javascript:void(0);">Continue</button>

                                 </form>
                                 
                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="accordion-item">
                        <h2 class="accordion-header" id="headingSeven">
                           <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                              data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                              Payment Method
                           </button>
                        </h2>
                        <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven"
                           data-bs-parent="#secondAccordion">
                           <div class="accordion-body">
                              <div class="payment_method">
                                 <form>
                                    <!-- <p>
                                       <input type="radio" id="test3" name="radio-group" checked>
                                       <label class="direct_bank" for="test3">Direct Bank Transfer
                                          <span class="small-text">Make your payment directly into our bank account.
                                             Please use your Order ID as the payment reference. Your order will not be
                                             shipped until the funds have cleared in our account.</span>
                                       </label>
                                    </p>
                                    <p>
                                       <input type="radio" id="test4" name="radio-group">
                                       <label for="test4">Cheque Payments
                                          <span class="small-text">Make your payment directly into our bank account.
                                             Please use your Order ID as the payment reference. Your order will not be
                                             shipped until the funds have cleared in our account.</span>
                                       </label>
                                    </p> -->
                                    <p>
                                       <input type="radio" class="paymentMethod" methodType="COD" id="test5" name="radio-group">
                                       <label for="test5">Cash On Delivery
                                          <span class="small-text">Make your payment directly into our bank account.
                                             Please use your Order ID as the payment reference. Your order will not be
                                             shipped until the funds have cleared in our account.</span>
                                       </label>
                                    </p>
                                    <!-- <p>
                                       <input type="radio" id="test6" name="radio-group">
                                       <label for="test6">Pay Pal</label>
                                    </p> -->
                                 </form>
                                 <div class="payment_card">
                                    <img class="img-fluid" src="{{url('public/website/images/payment_card.png')}}" alt="card">
                                    <a class="submit_btn placeOrderBtn" href="javascript:void(0)">Place Order</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-4 col-md-12 col-12">
               <div class="side-bar-strip">
                  <h4>Your Order</h4>
                  <img src="{{url('public/website/images/side-title.png')}}" alt="img">
                  <div class="order_details">
                    
                  </div>
                  <a class="custom-btn placeOrderBtn" href="javascript:;">Place Order</a>
               </div>
            </div>
         </div>
      </div>
   </div>

   <div class="modal fade" id="lodaerModal" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="lodaerModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     
      <img src="{{url('/public/loading-buffering.gif')}}" style="width: 50px; height:50px;">
     
  </div>
</div>

   @endsection()
   @section('js')

   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>

   <script type="text/javascript">
      $(document).ready(function(){

        $(document).on("click",".cross_cart_product",function(){

          setTimeout(function(){
            let productInCart = JSON.parse(localStorage.getItem('productInCart'));
            

            if(!productInCart){
               Swal.fire({
                title: 'Alert',
                text: "You have no item in cart please add item in cart first.",
                icon: 'warning',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ok',
                allowOutsideClick: false
              }).then((result) => {
                window.location.href="{{route('allProducts')}}";
              })
            }
          },300);
            
            

         })



         var loginForm = $( "#loginForm" );
         loginForm.validate({
           ignore: [],
           debug: false,
           rules: {
             email: {
               required: true,
               email:true
             },
             password: {
               required: true
             }
             
             
           },
           messages: {
             email: {
               required: "Email is required.",
               email:"Email address is invalid."
             },
             password: {
               required: "Password is required."
             }
                       
           },
           submitHandler:function(form){
                   $("#lodaerModal").modal("show");

                   var fd = new FormData();
                   var other_data = $('#loginForm').serializeArray();
                   
                   $.each(other_data, function(key, input) {
                     console.log("keyhhhh",key)
                     console.log("innnnnn",input)
                       fd.append(input.name, input.value);
                   });

                   
                   var data = fd;

                   $.ajax({
                       url:"{{route('loginOnCheckoutPage')}}",
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
                                window.location.href="{{route('checkout')}}";
                              })

                               
                               

                               
                           }else{
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
                   //form.submit();
               },
           onkeyup: false,
           onblur: true
         });







         var billingInformation = $( "#billingInformation" );
         billingInformation.validate({
           ignore: [],
           debug: false,
           rules: {

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


              if($("#scales").prop("checked") == true){
                $(".billingInput").each(function(){
                  let name = $(this).attr('name');
                  let _val = $(this).val();
                  console.log(name)
                  $(".shippingInput[name='"+name+"']").val(_val);
                })
              }else{
                $(".shippingInput").each(function(){
                  $(this).val("");
                })
              }

              $("#headingFive").children().click();

              setTimeout(function(){
                 $("#headingSix").children().click();
              },500)
            },
           onkeyup: false,
           onblur: true
         });




         var shippingInformation = $( "#shippingInformation" );
         shippingInformation.validate({
           ignore: [],
           debug: false,
           rules: {

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

              $("#headingSix").children().click();

              setTimeout(function(){
                 $("#headingSeven").children().click();
              },500)
            },
           onkeyup: false,
           onblur: true
         });





         setTimeout(function(){
          getProducts();
         },500)

         
         $(document).on("click",".placeOrderBtn",function(){

            let checkLogin = "{{$is_login}}";
            if(checkLogin == "false"){
               Swal.fire({
                 title: 'Alert',
                 text: "Please login first to continue.",
                 icon: 'warning',
                 showCancelButton: false,
                 confirmButtonColor: '#3085d6',
                 cancelButtonColor: '#d33',
                 confirmButtonText: 'Ok',
                 allowOutsideClick: false
               }).then((result) => {
                 
               })

               return false;
            }

            let allFill = true;
            $(".form-control").each(function(){
               let _val = $(this).val().trim();
               console.log($(this))
               if(_val == ""){
                  allFill = false;
               }
            });


            if(allFill == false){
               Swal.fire({
                 title: 'Alert',
                 text: "Please fill the billing details & shipping details for place order.",
                 icon: 'warning',
                 showCancelButton: false,
                 confirmButtonColor: '#3085d6',
                 cancelButtonColor: '#d33',
                 confirmButtonText: 'Ok',
                 allowOutsideClick: false
               }).then((result) => {
                 
               })

               return false;
            }


            let checkPayMethod = false;
            $(".paymentMethod").each(function(){
               if($(this).prop("checked") == true){
                  checkPayMethod = true;
               }
            })


            if(checkPayMethod == false){
               Swal.fire({
                 title: 'Alert',
                 text: "Please fselect the payment method for place order.",
                 icon: 'warning',
                 showCancelButton: false,
                 confirmButtonColor: '#3085d6',
                 cancelButtonColor: '#d33',
                 confirmButtonText: 'Ok',
                 allowOutsideClick: false
               }).then((result) => {
                 
               })

               return false;
            }





            //API HIT


            let finalAmount = JSON.parse(localStorage.getItem('finalAmount'));
            let couponCode = JSON.parse(localStorage.getItem('couponCode'));
            let productInCart = JSON.parse(localStorage.getItem('productInCart'));


            var form_data = new FormData();


            var otherBillingData = $('#billingInformation').serializeArray();
            let billingInfo = [];
            $.each(otherBillingData, function(key, input) {

               let name = input.name;

               let _val = input.value;

               let obj = {
                  key : name,
                  value : _val
               }

               billingInfo.push(obj);

               //billingFd.append(input.name, input.value);
            });

          
            var otherShippingData = $('#shippingInformation').serializeArray();
            let shippingInfo = [];
            $.each(otherShippingData, function(key, input) {
               let name = input.name;
               let _val = input.value;

               let obj = {
                  key : name,
                  value : _val
               }

               shippingInfo.push(obj);            
            });


            let paymentMethod = $(".paymentMethod:checked").attr('methodType');
            


            form_data.append("billingInfo", JSON.stringify(billingInfo));
            form_data.append("shippingInfo", JSON.stringify(shippingInfo));
            form_data.append("finalAmount", JSON.stringify(finalAmount));
            form_data.append("couponCode", JSON.stringify(couponCode));
            form_data.append("productInCart", JSON.stringify(productInCart));
            form_data.append("paymentMethod",paymentMethod);



            

            $("#lodaerModal").modal("show");
            $.ajax({
              url:"{{route('placeOrder')}}",
              data: form_data,
              contentType: false,
              processData: false,
              type: 'POST',
              success: function(res){
                  
                  console.log("placeOrderData",res)

                  if(res.status == "true"){

                     Swal.fire({
                       title: 'Information',
                       text: "Your order has been processed successfully.",
                       icon: 'success',
                       showCancelButton: false,
                       confirmButtonColor: '#3085d6',
                       cancelButtonColor: '#d33',
                       confirmButtonText: 'Ok',
                       allowOutsideClick: false
                     }).then((result) => {
                       window.location.href = "{{route('allProducts')}}";
                     })

                     setTimeout(function(){

                        localStorage.removeItem('finalAmount');
                        localStorage.removeItem('couponCode');
                        localStorage.removeItem('productInCart');
                     },300);
                     

                      
                      

                      
                  }else if(res.status == "out_of_stock"){
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
                       window.location.href = "{{route('allProducts')}}";
                     })

                     setTimeout(function(){

                        localStorage.removeItem('finalAmount');
                        localStorage.removeItem('couponCode');
                        localStorage.removeItem('productInCart');
                     },300);
                  }else if(res.status == 'sessionExpire'){
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
                       window.location.href = "{{route('allProducts')}}";
                     })

                     setTimeout(function(){

                        localStorage.removeItem('finalAmount');
                        localStorage.removeItem('couponCode');
                        localStorage.removeItem('productInCart');
                     },300);
                  }else{
                      Swal.fire("Alert", res.message, "error");

                  }

                  setTimeout(() => {
                      $("#lodaerModal").modal("hide");
                      $("#submitBtn").removeAttr("disabled")
                      
                      
                  }, 500);

                  
                  
                  
              },
              error: function(data, textStatus, xhr) {
                  if(data.status == 422){
                  
                  } 
                  
                  
                  
                  swal("Alert", "Something went wrong. Please try again.", "error");

                  setTimeout(() => {
                      $("#lodaerModal").modal("hide");
                      $("#submitBtn").removeAttr("disabled")
                      
                  }, 500);

                  


              }
          });
            




            

         })






         
      })

      function getProducts(){
         let productInCart = JSON.parse(localStorage.getItem('productInCart'));

         if(!productInCart){
          Swal.fire({
            title: 'Alert',
            text: "You have no item in cart please add item in cart first.",
            icon: 'warning',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ok',
            allowOutsideClick: false
          }).then((result) => {
            window.location.href="{{route('allProducts')}}";
          })
          return false;
         }

         let finalAmount = JSON.parse(localStorage.getItem('finalAmount'));

         if(!finalAmount){

            let subTotalProduct = 0;

            productInCart.map(function(p){
              subTotalProduct = subTotalProduct + parseFloat(p.calculate_price);
            })


            finalAmount = {
               "totalProductPrice" : subTotalProduct,
               "shippingCharges" : 0,
               "couponAmount" : 0,
               "finalPrice" : subTotalProduct
            }

            localStorage.setItem("finalAmount", JSON.stringify(finalAmount));
         }
         

         console.log(productInCart);
         let orderDetails = '';
         let subTotal = 0;
         productInCart.map(function(e){
            orderDetails += `<p> `+e.product_name+` <span>₹`+e.calculate_price+`</span> </p>`;
            subTotal = parseFloat(subTotal) + parseFloat(e.calculate_price);
         })


         let finalPrice = 0;
         if(finalAmount){
          if(parseFloat(finalAmount.couponAmount) > 0){
            orderDetails += `<p> Coupon Applied <span>₹`+finalAmount.couponAmount+`</span> </p>`;
          }

          
            finalPrice = parseFloat(subTotal) + parseFloat(finalAmount.shippingCharges) - parseFloat(finalAmount.couponAmount);

            orderDetails += `<h3>Order Total <span>₹`+finalPrice+`</span></h3>`;
         }


         

         finalAmount = {
             "totalProductPrice" : subTotal,
             "shippingCharges" : finalAmount.shippingCharges,
             "couponAmount" : finalAmount.couponAmount,
             "finalPrice" : finalPrice
          }


         localStorage.setItem("finalAmount", JSON.stringify(finalAmount));
         
         
         $(".order_details").html(orderDetails);

      }
      
   </script>

   <script type="text/javascript">
      $(document).ready(function(){
         $("#scales").on("click",function(){
            if($(this).prop("checked") == true){
               $(".billingInput").each(function(){
                  let name = $(this).attr('name');
                  let _val = $(this).val();
                  console.log(name)
                  $(".shippingInput[name='"+name+"']").val(_val);
                })
            }else{
               $(".shippingInput").each(function(){
                  $(this).val("");
               })
            }
         })
      })
   </script>
   @endsection()