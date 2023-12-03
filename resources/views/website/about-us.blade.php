@extends('website.layout.layout')
@section('title','Black Rooster')

@section('content')
   <!-- banner section start start-->
   <div class="inner-slider-wrapper float_left">
      <div class="container">
         <div class="inner-caption">
            <h4>About Us</h4>
            <img src="{{url('public/website/images/title.png')}}" alt="img">
         </div>
         <ol class="breadcrumb sicon">
            <li><a href="{{route('index')}}">Home</a></li>
            <li class="active">About us</li>
         </ol>
         <!-- <img class="meat" src="{{url('public/website/images/title-bottom.png')}}" alt="img"> -->
      </div>
   </div>
   <!-- banner section start end-->
   <div class="about-sec-wrapper float_left ptb-100" style="height:430px">
      <div class="container">
         <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
               <div class="about-img-sec float_left">
                  <figure class="abt-img1">
                     <img src="{{url('public/webimg/fresh.jpg')}}" alt="img" style="width:100%">
                  </figure>
                  <!-- <figure class="abt-img2">
                     <img src="{{url('public/webimg/fresh1.jpg')}}" alt="img">
                  </figure> -->
               </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 mar-left">
               <div class="about-text float_left">
                  <h4>About <span class="color-slider"> Our Firm’s</span> </h4>
                  <p>we are committed to total transparency about our products.</p>
               </div>
               <div class="div_line-yal2">
                  <img class="img-fluid" src="{{url('public/website/images/line-yal.png')}}" alt="img">
               </div>
               <div class="div_p">
                  <p>We belong to the egg industry since the last 30 years and have seen how the nutrition in eggs was not a concern to the producers. We are conscious farmers who aim to give the best of our produce to the society at the most affordable prices.
                  </p>
                  <br>
                  <p>We understand these concerns and have resorted to giving our birds Tulsi, Turmeric, Cinnamon and other herbs to keep them healthy without the need of any antibiotics.
                  </p>
               </div>
               <!-- <div class="about-list-wrapper">
                  <div class="a-let">
                     <img src="{{url('public/website/images/icon-fish.gif')}}" alt="icon">
                  </div>
                  <div class="a-rit">
                     <h5>Hygienic and Healthy</h5>
                     <p>Nunc faucibus vehicula Holawely accumsan.</p>
                  </div>
               </div> -->
               <!--  -->
               <!-- <div class="about-list-wrapper">
                  <div class="a-let">
                     <img src="{{url('public/website/images/icon-02.gif')}}" alt="icon">
                  </div>
                  <div class="a-rit">
                     <h5>Esay to cook</h5>
                     <p>Nunc faucibus vehicula Holawely accumsan.</p>
                  </div>
               </div> -->
               <!--  -->
               <!-- <div class="about-list-wrapper">
                  <div class="a-let">
                     <img src="{{url('public/website/images/icon-004.gif')}}" alt="icon">
                  </div>
                  <div class="a-rit">
                     <h5>Farm fresh meats</h5>
                     <p>Nunc faucibus vehicula Holawely accumsan.</p>
                  </div>
               </div> -->
               <!--  -->
               <!-- <div class="about-list-wrapper">
                  <div class="a-let">
                     <img src="{{url('public/website/images/icon-003.gif')}}" alt="icon">
                  </div>
                  <div class="a-rit">
                     <h5>Halal Certified</h5>
                     <p>Nunc faucibus vehicula Holawely accumsan.</p>
                  </div>
               </div> -->
               <!--  -->
            </div>
         </div>
      </div>
   </div>
   <!-- feature data -->
<div class="home-delivery-sec-wrapper float_left ptb-100">
      <div class="container">
         <div class="heading-title">
            <h4>Top Featured <span class="color-slider   ">Products</span></h4>
            <!-- <p>know about our delivery processes</p> -->
            <img class="img-fluid" src="{{url('public/website/images/line-yal.png')}}" alt="img">
         </div>
         <div class="delivery-main-wrapper">
            <div class="delivery-box">
               <img src="{{url('public/webimg/f1.png')}}" alt="img">
               <h4> Enriched Eggs </h4>
               
            </div>
            <div class="delivery-box">
               <img src="{{url('public/webimg/f2.png')}}" alt="img">
               <h4> Organic Eggs </h4>
               
            </div>
            <div class="delivery-box">
               <img src="{{url('public/webimg/f3.png')}}" alt="img">
               <h4> Regular Eggs </h4>
              
            </div>
            <div class="delivery-box arro-remove">
               <img src="{{url('public/webimg/f4.png')}}" alt="img">
               <h4> Organic Chicken </h4>
               
            </div>
         </div>
      </div>
   </div>
<!-- end featuredata -->

   
   <div class="our-info-main-wrapper float_left ptb-100">
      <div class="container">
         <div class="row">
            <div class="col-lg-4 col-md-12 col-12">
               <div class="blog-box">
                  <div class="blog-img">
                     <img src="{{url('public/website/images/product/pm3.gif')}}" alt="img">
                  </div>
                  <div class="blog-text">
                     <h4>OUR MISSION </h4>
                     <p class="p-text"> Nunc elementum purus ex iaculis elfend. Curabitur bibendum odio du</p>
                  </div>
               </div>
            </div>
            <div class="col-lg-4 col-md-12 col-12">
               <div class="blog-box">
                  <div class="blog-img">
                     <img src="{{url('public/website/images/product/pm-1.png')}}" alt="img">
                  </div>
                  <div class="blog-text">
                     <h4> OUR HISTORY </h4>
                     <p class="p-text">Nunc elementum purus ex iaculis elfend. Curabitur bibendum odio du</p>
                  </div>
               </div>
            </div>
            <div class="col-lg-4 col-md-12 col-12">
               <div class="blog-box">
                  <div class="blog-img">
                     <img src="{{url('public/website/images/product/pm-2.gif')}}" alt="img">
                  </div>
                  <div class="blog-text">
                     <h4> WAT WE DO </h4>
                     <p class="p-text">Nunc elementum purus ex iaculis elfend. Curabitur bibendum odio du</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <div class="home-delivery-sec-wrapper certificate-award float_left">
      <div class="container">
         <div class="heading-title">
            <h4>Certificates & Awards</h4>
            <p>What we achive and what we deliver</p>
            <img class="img-fluid" src="{{url('public/website/images/line-yal.png')}}" alt="img">
         </div>
         <div class="delivery-main-wrapper">
            <div class="delivery-box">
               <img src="{{url('public/website/images/a1.png')}}" alt="img">

            </div>
            <div class="delivery-box">
               <img src="{{url('public/website/images/a2.png')}}" alt="img">

            </div>
            <div class="delivery-box">
               <img src="{{url('public/website/images/a3.png')}}" alt="img">

            </div>
            <div class="delivery-box">
               <img src="{{url('public/website/images/a4.png')}}" alt="img">

            </div>
         </div>
      </div>
   </div>

   @endsection()

   @section('js')
   @endsection()