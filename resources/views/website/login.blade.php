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
   <!--favicon-->
   <link rel="shortcut icon" type="image/png" href="{{url('public/website/images/fav-icon.png')}}" />
   <link rel="stylesheet" type="text/css" href="{{url('public/website/css/custom.css')}}" />
   
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
               <div class="col-lg-6 col-md-12 col-12">
                  <div class="left-side">
                     <h4>Sign In</h4>
                     <form id="loginForm" method="POST">
                        {{@csrf_field()}}
                        <div class="form-group field-icon row">
                           <div class="col-md-12">
                              <input type="text" name="email" placeholder="Enter Email">
                              <span><i class="fa fa-user" aria-hidden="true"></i></span>
                           </div>
                        </div>
                        <div class="form-group field-icon row">
                           <div class="col-md-12">
                              <input type="password" name="password" placeholder="Enter Password">
                              <span><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
                           </div>
                        </div>
                        <div class="round">
                           <input type="checkbox" id="box1">
                           <label for="box1"><span>Remember Me</span></label>
                        </div>
                        <a class="forgot" href="javascript:;">Forgot Password?</a>
                        <div class="login-btn-sec">
                           <button class="sub-btn" id="submitBtn" href="javascript:;"><span>Sign In</span></button>
                           <!-- <div class="social-btn">
                              <span>- OR -</span>
                              <ul>
                                 <li>
                                    <a href="javascript:;"> <span> <svg viewBox="0 0 25 48" version="1.1"
                                             xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink">
                                             <g id="Page-1" stroke="none">
                                                <g id="Social-Icons---Isolated"
                                                   transform="translate(-176.000000, -55.000000)">
                                                   <path
                                                      d="M200.78439,55.3395122 L200.78439,62.9141463 L196.28878,62.9258537 C192.764878,62.9258537 192.085854,64.6 192.085854,67.0468293 L192.085854,72.4673171 L200.48,72.4673171 L199.39122,80.9434146 L192.085854,80.9434146 L192.085854,103 L183.329951,103 L183.329951,80.9434146 L176,80.9434146 L176,72.4673171 L183.329951,72.4673171 L183.329951,66.2156098 C183.329951,58.9570732 187.754146,55 194.24,55 C197.331902,55 200,55.2341463 200.78439,55.3395122 Z"
                                                      id="Facebook"></path>
                                                </g>
                                             </g>
                                          </svg></span> </a>
                                 </li>
                                 <li>
                                    <a href="javascript:;"> <span><svg version="1.1" id="Capa_1"
                                             xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                             viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                                             xml:space="preserve">
                                             <path d="M512,97.248c-19.04,8.352-39.328,13.888-60.48,16.576c21.76-12.992,38.368-33.408,46.176-58.016
                                                   c-20.288,12.096-42.688,20.64-66.56,25.408C411.872,60.704,384.416,48,354.464,48c-58.112,0-104.896,47.168-104.896,104.992
                                                   c0,8.32,0.704,16.32,2.432,23.936c-87.264-4.256-164.48-46.08-216.352-109.792c-9.056,15.712-14.368,33.696-14.368,53.056
                                                   c0,36.352,18.72,68.576,46.624,87.232c-16.864-0.32-33.408-5.216-47.424-12.928c0,0.32,0,0.736,0,1.152
                                                   c0,51.008,36.384,93.376,84.096,103.136c-8.544,2.336-17.856,3.456-27.52,3.456c-6.72,0-13.504-0.384-19.872-1.792
                                                   c13.6,41.568,52.192,72.128,98.08,73.12c-35.712,27.936-81.056,44.768-130.144,44.768c-8.608,0-16.864-0.384-25.12-1.44
                                                   C46.496,446.88,101.6,464,161.024,464c193.152,0,298.752-160,298.752-298.688c0-4.64-0.16-9.12-0.384-13.568
                                                   C480.224,136.96,497.728,118.496,512,97.248z"></path>
                                          </svg></span> </a>
                                 </li>
                                 <li>
                                    <a href="javascript:;"> <span>
                                          <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                             <path
                                                d="m75 512h362c41.355469 0 75-33.644531 75-75v-362c0-41.355469-33.644531-75-75-75h-362c-41.355469 0-75 33.644531-75 75v362c0 41.355469 33.644531 75 75 75zm-45-437c0-24.8125 20.1875-45 45-45h362c24.8125 0 45 20.1875 45 45v362c0 24.8125-20.1875 45-45 45h-362c-24.8125 0-45-20.1875-45-45zm0 0">
                                             </path>
                                             <path
                                                d="m256 391c74.4375 0 135-60.5625 135-135s-60.5625-135-135-135-135 60.5625-135 135 60.5625 135 135 135zm0-240c57.898438 0 105 47.101562 105 105s-47.101562 105-105 105-105-47.101562-105-105 47.101562-105 105-105zm0 0">
                                             </path>
                                             <path
                                                d="m406 151c24.8125 0 45-20.1875 45-45s-20.1875-45-45-45-45 20.1875-45 45 20.1875 45 45 45zm0-60c8.269531 0 15 6.730469 15 15s-6.730469 15-15 15-15-6.730469-15-15 6.730469-15 15-15zm0 0">
                                             </path>
                                          </svg>
                                       </span></a>
                                 </li>
                              </ul>
                           </div> -->
                           
                        </div>

                        

                     </form>

                     

                     <p class="do_have_an_account">Don't have an account? <a href="{{route('signUp')}}">Sign Up now!</a></p>
                  </div>
               </div>
               <div class="col-lg-6 col-md-12 col-12">
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
                  $("#submitBtn").attr("disabled","true")
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
                       url:"{{route('loginWeb')}}",
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
                                window.location.href="{{route('index')}}";
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