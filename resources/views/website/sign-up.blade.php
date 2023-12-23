<!DOCTYPE html>
<!-- 
   Template Name: Butcher
   Version: 1.0.0
   Author: Webstrot 
   
   -->
<!--[if IE 8]> 
<html lang="en" class="ie8 no-js">
   <![endif]-->
<!--[if IE 9]> 
   <html lang="en" class="ie9 no-js">
      <![endif]-->
<!--[if !IE]><!-->
<html lang="zxx" dir="ltr">
<!--[endif]-->

<head>
   <meta charset="utf-8" />
   <title>Meat</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <!--Template style -->
   <link rel="stylesheet" type="text/css" href="{{url('public/website/css/animate.css')}}" />
   <link rel="stylesheet" type="text/css" href="{{url('public/website/css/animate.min.css')}}" />
   <link rel="stylesheet" type="text/css" href="{{url('public/website/css/bootstrap.min.css')}}" />
   <link rel="stylesheet" type="text/css" href="{{url('public/website/css/fonts.css')}}" />
   <link rel="stylesheet" type="text/css" href="{{url('public/website/css/font-awesome.css')}}" />
   <link rel='stylesheet' href='https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css'>
   <link rel="stylesheet" type="text/css" href="{{url('public/website/css/style.css')}}" />
   <link rel="stylesheet" type="text/css" href="{{url('public/website/css/responsive.css')}}" />
   <link rel="stylesheet" type="text/css" href="{{url('public/website/css/custom.css')}}" />
   <!--favicon-->
   <link rel="shortcut icon" type="image/png" href="{{url('public/website/images/fav-icon.png')}}" />
</head>

<style type="text/css">
   #lodaerModal .modal-dialog {
    right: 0;
    text-align: center;
    left: 0;
    top: 40%;
}
.login_box_main_wrapper .signin-wrapper .left-side form .login-btn-sec .sub-btn:after {
   background: #fdbd3e1f!important;
   color:#ffffff!important;
}
p.do_have_an_account a {
   color:#fdbd3e
}
</style>

<body class="page-bg">

   <div id="preloader">
      <div id="status">
         <img src="{{url('public/website/images/loader.gif')}}" id="preloader_image" alt="loader">
      </div>
   </div>
   <div class="login_box_main_wrapper" id="login_height">
      <div class="container">
         <div class="login-logo">
         <a href="/"> <img style="width: 200px; " src="{{url('public/webimg/newlogowhite.png')}}" alt="logo"> </a>
         </div>
         <div class="signin-wrapper">
            <div class="row">
               <div class="col-lg-6 col-md-6 col-12">
                  <div class="left-side">
                     <h4>Sign Up</h4>
                     <form id="signupForm" method="POST">
                        {{@csrf_field()}}
                        <div class="form-group field-icon row">
                           <div class="col-md-12">
                              <input type="text" name="full_name" placeholder="Enter Full Name">
                              <span><i class="fa fa-user" aria-hidden="true"></i></span>
                           </div>
                        </div>
                        <div class="form-group field-icon row">
                           <div class="col-md-12">
                              <input type="text" name="email" placeholder="Enter Email">
                              <span><i class="fa fa-envelope" aria-hidden="true"></i></span>
                           </div>
                        </div>
                        <div class="form-group field-icon row">
                           <div class="col-md-12">
                              <input type="password" name="password" placeholder="Enter Password">
                              <span><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
                           </div>
                        </div>
                        <div class="cond">
                           <input type="checkbox" id="box1" name="box1" value="box1">
                           <label for="box1"> Yes, I understand and agree to the Terms &amp; Conditions.</label>
                        </div>
                        <div class="login-btn-sec">
                           <button class="sub-btn" id="submitBtn" href="javascript:;">Sign Up</button>
                        </div>

                        <!-- <div class="login-btn-sec remove-social">
                           
                           
                           <p>Do have an account? <a href="{{route('loginWeb')}}">Sign In now!</a></p>
                        </div> -->
                     </form>

                     <p class="do_have_an_account">Do have an account? <a href="{{route('loginWeb')}}">Sign In now!</a></p>
                  </div>
               </div>
               <div class="col-lg-6 col-md-6 col-12">
                  <div class="login-img">
                     <img class="img-fluid" src="{{url('public/website/images/product/login.webp')}}" alt="img">
                  </div>
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

<div class="modal fade" id="lodaerModal" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="lodaerModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     
      <img src="{{url('/public/loading-buffering.gif')}}" style="width: 50px; height:50px;">
     
  </div>
</div>



   <!-- Side Panel -->
   <script src="{{url('public/website/js/jquery-3.6.0.min.js')}}"></script>
   <script src="{{url('public/website/js/bootstrap.min.js')}}"></script>
   <script src="{{url('public/website/js/jquery.magnific-popup.js')}}"></script>
   <script src="{{url('public/website/js/wow.js')}}"></script>
   <script src="{{url('public/website/js/owl.carousel.min.js')}}"></script>
   <script src="{{url('public/website/js/custom.js')}}"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

   <!-- custom js-->
   <script>
      const types = ['load', 'resize'];
      types.forEach(function (type) {
         window.addEventListener(type, () => {

            let elem = document.getElementById('login_height');
            let wh = window.innerHeight;

            elem.style.height = wh + 'px';

         });
      });

   </script>

   <script type="text/javascript">
      $(document).ready(function(){
         var signupForm = $( "#signupForm" );
         signupForm.validate({
           ignore: [],
           debug: false,
           rules: {
            full_name: {
               required: true,
               maxlength:80,
               minlength:2
             },
             email: {
               required: true,
               email:true
             },
             password: {
               required: true
             }
             
             
           },
           messages: {
            full_name : {
               required : "Full Name is required."
            },
             email: {
               required: "Email is required.",
               email:"Email address is invalid."
             },
             password: {
               required: "Password is required."
             }
                       
           },
           submitHandler:function(form){
                  $("#submitBtn").attr("disabled","true")
                   $("#lodaerModal").modal("show");



                   if($("#box1").prop("checked") == false){
                     Swal.fire("Alert", "Please select the terms & condition checkbox", "error");

                        setTimeout(() => {
                            $("#lodaerModal").modal("hide");
                            $("#submitBtn").removeAttr("disabled")
                            
                        }, 500);
                     return false;
                   }

                   var fd = new FormData();
                   var other_data = $('#signupForm').serializeArray();
                   
                   $.each(other_data, function(key, input) {
                     console.log("keyhhhh",key)
                     console.log("innnnnn",input)
                       fd.append(input.name, input.value);
                   });

                   
                   var data = fd;

                   $.ajax({
                       url:"{{route('signUp')}}",
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
                   //form.submit();
               },
           onkeyup: false,
           onblur: true
         });
      })
   </script>
</body>

</html>