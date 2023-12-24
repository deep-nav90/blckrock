@extends('website.layout.layout')
@section('title','Black Rooster')

@section('content')
  <!-- banner section start start-->
<style>
   span.color-slider {
    color: #fdbd3e;
}
.color-slider-white{
   color:#fff
}
.testimonial-three-wrapper{
   background-color: #fdbd3e;
}
   </style>


  <div class=" float_left ptb-10">
      <div class="slidecls">
         <!-- crouselsection -->
            <div class="owl-carousel owl-theme">
               <div class="item">
                     <img src="{{url('public/webimg/slider1.png')}}" alt="Black roster">
                     <div class="cover">
                        <div class="container">
                           <div class="header-content">
                                 <div class="line"></div>
                                 <h2>Be Extra in the <span class="color-slider"> Ordinary</span></h2>
                                 <!-- <h1>Start-ups and solutions</h1> -->
                                 <h4>With nutrition that empowers you </h4>   
                                 <a href="/rock/all-products" class="animated-button">Shop Now</a>
                           </div>
                        </div>
                     </div>
               </div>                    
               <div class="item">
                     <img src="{{url('public/webimg/slider3.jpg')}}" alt="Black roster">
                     <div class="cover">
                        <div class="container">
                           <div class="header-content">
                                 <div class="line animated bounceInLeft"></div>
                                 <h2>An Egg That</h2>
                                 <h1><span class="color-slider"> Stands Out</span></h1>
                                 <h4>One-day  fresh | 11  safety checks | feed |</h4>
                                 <a href="/rock/all-products" class="animated-button">Shop Now</a>
                           </div>
                        </div>
                     </div>
               </div>                
               <div class="item">
                     <img src="{{url('public/webimg/slider4.jpg')}}" alt="Black roster">
                     <div class="cover">
                        <div class="container">
                           <div class="header-content">
                                 <div class="line animated bounceInLeft"></div>
                                 <h2>Whip up what’s delicious <span class="color-slider">&</span></h2>
                                 <h1>what’s delicious <span class="color-slider"> nutritious </span></h1>
                                 <h4>Check out these exciting egg recipes</h4>
                                 <a href="/rock/all-products" class="animated-button">Shop Now</a>
                           </div>
                        </div>
                     </div>
               </div>
            </div>
          <!-- end crosel section -->
      </div>
   </div>
   <!-- banner section start end-->
<!-- feature data -->
<div class="home-delivery-sec-wrapper float_left ptb-100">
      <div class="container">
         <div class="heading-title">
            <h4>Benefits of <span class="color-slider   ">Kadaknath Eggs</span></h4>
            <!-- <p>know about our delivery processes</p> -->
            <img class="img-fluid" src="{{url('public/website/images/line-yal.png')}}" alt="img">
         </div>
         <div class="delivery-main-wrapper">
            <div class="delivery-box-new">
               <img src="{{url('public/website/images/icon/im.png')}}" alt="img">
               <h4> Immunity Booster </h4>
               
            </div>
            <div class="delivery-box-new">
               <img src="{{url('public/webimg/f2.png')}}" alt="img">
               <h4> Highest Protein </h4>
               
            </div>
            <div class="delivery-box-new arro-remove">
               <img src="{{url('public/webimg/f3.png')}}" alt="img">
               <h4> Rich in Iron </h4>
              
            </div>
            
         </div>
         <div class="delivery-main-wrapper">
            <div class="delivery-box-new">
               <img src="{{url('public/webimg/f1.png')}}" alt="img">
               <h4> Low Cholesterol</h4>
               
            </div>
            <div class="delivery-box-new">
               <img src="{{url('public/website/images/icon/fat.png')}}" alt="img">
               <h4> Low Fat </h4>
               
            </div>
            <div class="delivery-box-new arro-remove">
               <img src="{{url('public/website/images/icon/bo.png')}}" alt="img">
               <h4>Boosts Energy </h4>
              
            </div>
            
         </div>
      </div>
   </div>
<!-- end featuredata -->

   <!-- <div class="about-sec-wrapper float_left ptb-100">
      <div class="container">
         <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
               <div class="about-img float_left">
                  <img src="{{url('public/website/images/banner1.jpg')}}" alt="img">
               </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
               <div class="about-text float_left">
                  <h4>About Our Firm’s</h4>
                  <p>we are committed to total transparency about our products.</p>
               </div>
               <div class="div_line-yal2">
                  <img class="img-fluid" src="{{url('public/website/images/line-yal.png')}}" alt="img">
               </div>
               <div class="div_p">
                  <p>The Black Rooster India brings you the goodness of Kadaknath eggs – low on fat, high on protein, and a cholesterol-friendly choice.The primary aim for us is to reach as many people as we can and make this delectable and healthy poultry available to them. Our passion and devotion to providing a healthier alternative to people & our sense of patriotic pride makes us want our own domestic breed to be the front runner at the global scale.
                  </p>
                  <br>
                  <p>Taking up the mantle of being the biggest provider of the best quality & healthy produce is a big responsibility for us. We believe in breeding the birds ourselves in order to maintain the highest standards of hygiene on our completely organic farm. Our farm size is growing rapidly. We have our own hatchery & a feed processing plant that prepares the feed strictly according to the nutritional requirements of Kadaknath bird.
                  </p>
                  <br>
                  <p>Nothing less than the ‘natural miracle’, this premium breed is a quality product of nature itself. This bird is completely black – Black plumage, black legs, and toenails, beak, tongue, comb, wattles, meat, bones & even dark organs. This breed has a bachelor’s in adaption and a masters in disease resistance. And of course, an honorary in superb flavour and succulence.</p>
                  <a class="custom-btn" href="{{route('aboutUS')}}">Read More</a>
               </div>
            </div>
         </div>
      </div>
   </div> -->
  
   <div class="product-filter-main-wrapper float_left ptb-20">
      <div class="container">
         <div class="heading-title">
            <h4>Our <span class="color-slider">Product's</span></h4>
            <p>Pick your kind of egg from these four variants</p>
            <img class="img-fluid" src="{{url('public/website/images/line-yal.png')}}" alt="img">
         </div>
         <div class="row">
            <div class="col-lg-3 col-md-3 col-12" style="display:none;">
               <div class="tab">

                  @if(count($categories) > 0)

                  @foreach($categories as $category)
                  <button class="tablinks category_opencity" id="category_{{$category->id}}" onclick="openCity(event, '{{$category->category_name}}')">{{$category->category_name}} 
                     <span>
                        <img class="category_images_index_page" src="{{$category->category_image}}">
                     </span> </button>
                  @endforeach()

                  @else

                  <button class="tablinks"><span class="no_record_found">No Record Found</span>
                  </button>
                  @endif()

               </div>
            </div>
            <div class="col-lg-12 col-md-12 col-12">
               <div class="custom-tbs-content float_left">
                  @if(count($categories) > 0)
                  @foreach($categories as $category)
                  <div id="{{$category->category_name}}" class="tabcontent">
                     <div class="product-new-filter-block">
                        @if(count($category->topThreeProducts) > 0)
                        <?php $m = 1;?>
                        @foreach($category->topThreeProducts as $product)

                        @if($m <= 8)
                        <div class="custom-tabs-prdt">
                           <div class="product-thumbnail">
                              
                              @foreach($product->productImages as $productImage)
                              @if($productImage->is_featured_image == 1)
                              <a href="{{route('singleProductDetails',base64_encode($product->id))}}">
                              <img src="{{$productImage->product_image}}" alt="img">
                                 </a>
                              @endif()
                              @endforeach()
                              
                           </div>
                           <div class="product-body">
                              <h5 class="product-title">
                                 <a href="{{route('singleProductDetails',base64_encode($product->id))}}" title="{{$product->product_name}}">{{$product->product_name}}</a>
                                 <a class="sub_category_name_anchor" href="javascript:void(0);">{{$product->subCategory->sub_category_name}}</a>
                                 <a class="attribute_anchor" href="javascript:void(0);">{{$product->default_attribute_value}} ({{$product->default_attribute_name}})</a>
                              </h5>
                              <span class="star_rating" style="--rating:{{$product->average_rating}}"></span>
                              <span class="product-price">{{$product->default_sale_price}}₹ <span>{{$product->default_product_price}}₹</span> </span>
                              <?php 
                                 $limit = 100;
                                 if(strlen($product->product_description) > $limit){
                                    $show_description = substr($product->product_description, 0, $limit) . " ...";
                                 }else{
                                    $show_description = $product->product_description;
                                 }
                                 ?>
                              <p class="product-text">
                                 <span class="text_view">{{$show_description}}</span>
                                 @if(strlen($product->product_description) > $limit)
                                 <!-- <span class="read_more" less_read="{{$show_description}}" full_read = "{{$product->product_description}}">Read More</span> -->
                                 @endif()
                              </p>
                              <a class="custom-btn AddCartAnchorTab" product_details = "{{$product}}" is_added_in_cart="false" product_id="{{$product->id}}" href="javascript:void(0);">Add Cart</a>
                           </div>
                        </div>
                        @endif()
                        <?php $m++; ?>
                        @endforeach()


                        <div class="center-btn">
                           <a href="{{route('allProducts')}}">View All</a>
                        </div>

                        
                        @else
                        <div class="no_product_found">
                           <span class="no_record_found">No Record Found</span>
                        </div>
                        @endif()

                        </div>
                  </div>

                  

                  @endforeach()
                  @else
                  <div class="no_product_found">
                     <span class="no_record_found">No Record Found</span>
                  </div>
                  @endif()
               </div>
         </div>
      </div>
   </div>
   




   <!-- <div class="countdown-wrapper float_left">
      <div class="container">
         <div class="counter-main-wrapper">
            <div class="count-box">
               <div class="count">100</div>
               <span class="customer">Customer’s</span>
            </div>
            <div class="count-box">
               <div class="count">60</div>
               <span class="customer customer1">Meats Type’s</span>
            </div>
            <div class="count-box">
               <div class="count">70</div>
               <span class="customer customer2">Organic Farm’s</span>
            </div>
            <div class="count-box">
               <div class="count">50</div>
               <span class="customer customer3">Outlet's</span>
            </div>
         </div>
         <div class="counter-text">
            <img class="img-fluid" src="{{url('public/website/images/line-cd.png')}}" alt="img">
            <p>Donec blandit, tellus sed molestie posuere, erat lorem tempor enim, vestibulum tincidunt ex diam in elit.
               Suspendisse sed ipsum nibh. Proin euismod luctus mauris, quis scelerisque arcu ultricies condimentum.
               Donec pellentesque dictum tellus, ut tincidunt nibh ultricies vitae. Etiam luctus justo eu tellus
               maximus, id venenatis sem euismod.</p>
         </div>
      </div>
   </div> -->
   <div class="testimonial-three-wrapper padd-100 float-start w-100">
        <div class="heading-title">
        <h4>Our <span class="color-slider-white"> Client Say</span></h4>
        </div>
        <div class="container">
            <div class="row">
            @foreach($OurClients as $OurClient)
                <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="slider-two-wrapper">
                        <div class="slider-quote">
                            <i class="fas fa-quote-left"></i>
                        </div>
                        <?php 
                                 $limit = 300;
                                 if(strlen($OurClient->description) > $limit){
                                    $show_description_testi = substr($OurClient->description, 0, $limit) . " ...";
                                 }else{
                                    $show_description_testi = $OurClient->description;
                                 }
                                 ?>
                        <div class="slider-two-content">
                            <p>{{$show_description_testi}}
                            </p>
                        </div>
                        <div class="slider-author">
                            <!-- <img src="images/img-box/imgbox-1/image1.png" alt="image"> -->
                            <div class="author-name">
                                <h6>{{$OurClient->our_client_name}}</h6>
                                <!-- <span>Designer</span> -->
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach()
            </div>
        </div>
    </div>

  
    <div class="home-delivery-sec-wrapper float_left mt-4 mb-4">
      <div class="container">
         <div class="heading-title">
            <h4>Home <span class="color-slider"> Delivery</span></h4>
            <p>know about our delivery processes</p>
            <img class="img-fluid" src="{{url('public/website/images/line-yal.png')}}" alt="img">
         </div>
         <div class="delivery-main-wrapper">
            <div class="delivery-box">
               <img src="{{url('public/website/images/icon01.png')}}" alt="img">
               <h4> Choose </h4>
               
            </div>
            <div class="delivery-box">
               <img src="{{url('public/website/images/icon02.png')}}" alt="img">
               <h4> Recieve </h4>
              
            </div>
            <div class="delivery-box">
               <img src="{{url('public/website/images/icon03.png')}}" alt="img">
               <h4> Cook </h4>
               
            </div>
            <div class="delivery-box arro-remove">
               <img src="{{url('public/website/images/icon04.png')}}" alt="img">
               <h4> Eat </h4>
              
            </div>
         </div>
      </div>
   </div>


    <!--- second form start -->

    <div class="form-two-wrapper padd-100 float-start w-100">
      <!-- <div class="section-heading">
         <h4>GET IN TOUCH</h4>
      </div> -->
      <div class="heading-title">
            <h4>GET IN <span class="color-slider">TOUCH</span></h4>
            <p>Reach out to us for queries or feedback</p>
            <img class="img-fluid" src="{{url('public/website/images/line-yal.png')}}" alt="img">
         </div>
      <div class="container">
         <div class="row justify-content-end">
            <div class="col-lg-5 col-md-12 col-sm-12 col-12">
               <div class="form-two">
                  <form id="contactUsForm" method="POST" action="{{route('ContactUs')}}">
                     {{@csrf_field()}}
                     <div class="mb-3">
                        <input type="text" class="form-control" name="name" placeholder="Enter Your Name" aria-label="Enter Your Name">
                     </div>
                     <div class="mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Enter Your Email">
                     </div>
                     <div class="mb-3">
                        <input type="text" name="phone" class="form-control" maxlength="10" placeholder="Enter Your phone no" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');" 
                           >
                     </div>
                     <div class="mb-3">
                        <textarea class="form-control" name="message" rows="3"
                           placeholder="Enter your Message...."></textarea>
                     </div>
                     <div class="tb_es_btn_div">
                        <div class="response center"></div>
                        <input type="hidden" name="form_type" value="contact" />
                        <div class="tb_es_btn_wrapper os_contact_input">
                           <button type="submit" class="form-btn btn-two" style="background: #fdbd3e">Submit</button>
                        </div>
                     </div>

                     <!-- <button type="submit" class="form-btn btn-two">Submit</button> -->
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
   
   <!--- second form end -->

   <div class="modal fade" id="lodaerModal" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="lodaerModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     
      <img src="{{url('/public/loading-buffering.gif')}}" style="width: 50px; height:50px;">
     
  </div>
</div>
@endsection()

@section('js')

<script type="text/javascript">
   $(document).ready(function(){
      $(document).on("click",".read_more",function(){
         let text = $(this).text();
         if(text == "Read More"){
            $(this).text("Read Less");
            $(this).parent().find('.text_view').text($(this).attr('full_read'));
         }else{
            $(this).text("Read More");
            $(this).parent().find('.text_view').text($(this).attr('less_read'));
         }
      })
   })
</script>


<script type="text/javascript">
   const ratingFromPoint = (evt) => {
     const el = evt.currentTarget;
     const pointerX = evt.pageX - el.offsetLeft;
     return Math.max(1, Math.min(5, Math.ceil(pointerX / el.offsetWidth * 5)));
   };

const starRating = (el) => {
  // const colorDefault = getComputedStyle(el).getPropertyValue("--color");
  // const colorClick = "#f00";
  // let ratingSelected = 0;
  
  // el.addEventListener("pointerdown", (evt) => {
  //   ratingSelected = ratingFromPoint(evt);
  //   el.style.setProperty("--color", colorClick);
  //   el.style.setProperty("--rating", ratingSelected);
  // });
  
  // el.addEventListener("pointermove", (evt) => {
  //   evt.preventDefault();
  //   const ratingHover = ratingFromPoint(evt);
  //   el.style.setProperty("--rating", ratingHover);
  // });
  
  // el.addEventListener("pointerleave", (evt) => {
  //   el.style.setProperty("--color", colorDefault);
  //   el.style.setProperty("--rating", ratingSelected);
  // });

  // el.addEventListener("pointerup", (evt) => {
  //   ratingSelected = ratingFromPoint(evt);
  //   console.log(ratingSelected); // @TODO: Send ratingSelected value to server
  // });
};

document.querySelectorAll("[style^=--rating]").forEach(starRating);

</script>

<script>

      function openCity(evt, cityName) {
         var i, tabcontent, tablinks;
         tabcontent = document.getElementsByClassName("tabcontent");
         for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
         }
         tablinks = document.getElementsByClassName("tablinks");
         for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
         }
         document.getElementById(cityName).style.display = "block";
         evt.currentTarget.className += " active";
      }


      $(document).ready(function(){
         let id = $(".category_opencity").eq(0).attr("id");
         document.getElementById(id).click();
      })

      // Get the element with id="defaultOpen" and click on it
     // $('#carouselExampleControls').carousel();
   
</script>
<script>
            $('.owl-carousel').owlCarousel({
                  loop:true,
                  margin:10,
                  dots:false,
                  nav:true,
                  mouseDrag:false,
                  autoplay:true,
                  //animateOut: 'slideOutUp',
                  responsive:{
                     0:{
                           items:1
                     },
                     600:{
                           items:1
                     },
                     1000:{
                           items:1
                     }
                  }
               });
            </script>

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

@endsection()


   