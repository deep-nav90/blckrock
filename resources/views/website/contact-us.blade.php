@extends('website.layout.layout')
@section('title','Black Rooster')

@section('content')
<style>
    .icon4-main-wrapper .social-icons ul li {
    padding: 6px !important;
}
.padd-30{
    padding: 26px 0;
}

button.form-btn.send-btn.custom-btn {
    display: inline-block;
    border: none;
    outline: none;
    -webkit-box-shadow: none;
    box-shadow: none;
    height: 45px;
    border-radius: 30px;
    line-height: 47px;
    color: #ffffff;
    background: #fdbd3e;
    text-align: center;
    padding: 0px 38px;
    margin-top: 15px;
    text-transform: uppercase;
    font-weight: 400;
    position: relative;
    overflow: hidden;
}

    </style>
<!-- banner section start start-->
<div class="inner-slider-wrapper float_left">
      <div class="container">
         <div class="inner-caption">
            <h4>Contact Us</h4>
            <!-- <img src="{{url('public/website/images/title.png')}}" alt="img"> -->
         </div>
         <ol class="breadcrumb sicon">
            <li><a href="{{route('index')}}">Home</a></li>
            <li class="active mt-1"><i class="fa fa-angle-double-right"></i>Contact us </li>
         </ol>
         <!-- <img class="meat" src="{{url('public/website/images/title-bottom.png')}}" alt="img"> -->
      </div>
   </div>
   <!-- banner section start end-->
     <!--- icon-two-start -->

     <div class="ic-section-2 padd-100 float-start w-100 ">
      <div class="container">
         <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay=".1s">
               <div class="icon-box-two">
                  <span>
                     <i class="fas fa-chart-pie"></i>
                  </span>
                  <h4><a href="javascript:;">Our Location</a></h4>
                 
                  <p>Khasra No 879, NH-44, Vill Pragpur Kot Kalan, Jalandhar, Punjab, India <br> Pin : 144001</p>
               </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay=".1s">
               <div class="icon-box-two">
                  <span>
                     <i class="fas fa-book-reader"></i>
                  </span>
                  <h4><a href="javascript:;">Phone</a></h4>
                  <p>Mb: +91 8288800857 <br><br>Email : info@blackroosterindia.com<br></p>
               </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay=".1s">
               <div class="icon-box-two">
                  <span>
                     <i class="fas fa-bong"></i>
                  </span>
                  <h4><a href="javascript:;">Social</a></h4>
                  <!-- code -->
                  <div class="icon4-main-wrapper padd-30 float-start w-100" style="background-color: #ffffff;">
    
        
        
               <div class="social-icons">
                  <ul>
                     <li><a class="facebook" href="https://www.facebook.com/" target="_blank"><i
                              class="fab fa-facebook-f"></i></a></li>
                     <!-- <li><a class="twitter" href="http://www.twitter.com" target="_blank"><i
                              class="fab fa-twitter"></i></a></li> -->
                     <!--<li><a class="google" href="http://plus.google.com" target="_blank"><i-->
                     <!--         class="fab fa-google-plus-g"></i></a></li>-->
                     <!-- <li><a class="dribbble" href="http://www.dribbble.com" target="_blank"><i
                              class="fab fa-dribbble"></i></a></li>
                     <li><a class="linkedin" href="http://www.linkedin.com" target="_blank"><i
                              class="fab fa-linkedin-in"></i></a></li> -->
                     <li><a class="instagram" href="http://www.instagram.com" target="_blank"><i
                              class="fab fa-instagram"></i></a></li>
                  
                  </ul>
               </div>
            
        
      </div>
   
                  <!-- endocde -->
               </div>
            </div>
           
         </div>
      </div>
   </div>

   <!--- icon-three-start -->
      <!--- third form start -->

      <div class="form-three-wrapper padd-100 float-start w-100">
      <div class="section-heading" style="text-align: center;">
      <h4>GET IN <span class="color-slider">TOUCH</span></h4>
      <p >Reach out to us for queries or feedback</p>
            <img class="img-fluid" src="{{url('public/website/images/line-yal.png')}}" alt="img">

      </div>
      <!-- <div class="heading-title">
            <h4>GET IN <span class="color-slider">TOUCH</span></h4>
            <p>Reach out to us for queries or feedback</p>
            <img class="img-fluid" src="{{url('public/website/images/line-yal.png')}}" alt="img">
         </div> -->
      <div class="container">
         <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
               <div class="form-three">
                  <form class="row" id="contactUsForm" method="POST">
                     {{@csrf_field()}}
                     <div class="col-lg-6 col-md-12">
                        <div class="mb-4">
                           <input type="text" class="form-control" name="name" placeholder="Enter Your Name" aria-label="Enter Your Name">
                        </div>
                        <div class="mb-4">
                           <input type="email" class="form-control" name="email" id="exampleInputEmail3" placeholder="Enter Your Email">
                        </div>
                        <div class="mb-4">
                            <input type="text" name="phone" class="form-control" maxlength="10" placeholder="Enter Your Phone No" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');" 
                           >
                         
                        </div>
                        <!-- <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label check-btn" for="exampleCheck1"> I accept the terms & conditions
                           and privacy
                           policy.</label> -->
                     </div>
                     <div class="col-lg-6 col-md-12">
                        <textarea class="form-control" style="resize:none;" name="message" rows="3"
                           placeholder="Enter Your Message"></textarea>
                        <div class="tb_es_btn_div">
                           <div class="response center"></div>
                           <input type="hidden" name="form_type" value="contact" />
                           <div class="tb_es_btn_wrapper os_contact_input">
                              <button type="submit" class="form-btn send-btn custom-btn">Send Message</button>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!--- third form end -->

   <div class="modal fade" id="lodaerModal" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="lodaerModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     
      <img src="{{url('/public/loading-buffering.gif')}}" style="width: 50px; height:50px;">
     
  </div>
</div>

@endsection()

@section('js')

<!-- CONTACT US FORM SUBMIT -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>

<script>
    $(document).ready(function(){

         var contactUsForm = $( "#contactUsForm" );
         contactUsForm.validate({
           ignore: [],
           debug: false,
           rules: {

            name : {
              required : true,
              minlength : 2,
              maxlength:50
            },

            email : {
              required : true,
              email:true
            },
            phone : {
              required : true,
            },
            subject : {
              required : true,
              minlength:2,
              maxlength:100
            },
            message : {
              required : true,
              minlength:20,
              maxlength:1000
            },
            
             
           },
           messages: {
            name: {
               required: "Name is required.",
               minlength : "Name should be atleast 2 characters long.",
               maxlength : "Name should be less than 50 characters."
               
             },
             email: {
               required: "Email is required.",
               email : "Email is invalid."
               
             },
             phone: {
               required: "Phone Number is required.",
             },
             subject: {
               required: "Subject is required.",
               minlength : "Subject should be atleast 2 characters long.",
               maxlength : "Subject should be less than 100 characters."
               
             },
             message: {
               required: "Message is required.",
               minlength : "Message should be atleast 20 characters long.",
               maxlength : "Message should be less than 1000 characters."
               
             },                   
           },
           submitHandler:function(form){

            $("#lodaerModal").modal("show");

                var fd = new FormData();
                var other_data = $('#contactUsForm').serializeArray();
                
                $.each(other_data, function(key, input) {
                    
                    fd.append(input.name, input.value);
                });

                
                var data = fd;

                $.ajax({
                    url:"{{route('ContactUs')}}",
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

                            
                            

                            
                        }else{
                            Swal.fire("Alert", res.message, "error");
                        }

                        setTimeout(() => {
                            $("#lodaerModal").modal("hide");
                            $(".form-control").val("");
                            
                            
                        }, 500);

                        
                        
                        
                    },
                    error: function(data, textStatus, xhr) {
                        if(data.status == 422){
                        
                        } 
                        
                        
                        
                        Swal.fire("Alert", "Something went wrong. Please try again.", "error");

                        setTimeout(() => {
                            $("#lodaerModal").modal("hide");
                            $(".form-control").val("");
                            
                        }, 500);

                        


                    }
                });


            },
           onkeyup: false,
           onblur: true
         });





    })
</script>

<!-- END OF CONTACT US FORM SUBMIT -->
@endsection()