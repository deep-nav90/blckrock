@extends('website.layout.layout')
@section('title','Black Rooster')

@section('content')

   <!-- banner section start start-->
   <div class="inner-slider-wrapper">
      <div class="container">
         <div class="inner-caption">
            <h4>About Us</h4>
            <!-- <img src="{{url('public/website/images/title.png')}}" alt="img"> -->
         </div>
         <ol class="breadcrumb sicon align-items-center">
            <li style='line-height:0'><a href="{{route('index')}}">Home</a></li>
            <li class="active"><i class="fa fa-angle-double-right"></i>About us</li>
         </ol>
         <!-- <img class="meat" src="{{url('public/website/images/title-bottom.png')}}" alt="img"> -->
      </div>
   </div>
   <!-- banner section start end-->
   <div class="about-sec-wrapper  ptb-100">
      <div class="container">
         <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
               <div class="about-img-sec">
                  <figure class="abt-img1">
                     <img src="{{url('public/webimg/eggbasket.webp')}}" alt="img" style="width:75%;">
                  </figure>
                  <!-- <figure class="abt-img2">
                     <img src="{{url('public/webimg/fresh1.jpg')}}" alt="img">
                  </figure> -->
               </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 mar-left">
               <div class="about-text">
                  <h4>About <span class="color-slider"> Us</span> </h4>
                  <p>Uniting Freshness with Healthy Excellence</p>
               </div>
               <div class="div_line-yal2">
                  <img class="img-fluid" src="{{url('public/website/images/line-yal.png')}}" alt="img">
               </div>
               <div class="div_p">
                  <p>Our vision extends beyond providing exceptional eggs; it encompasses a commitment to fostering a connection between consumers and the food they consume. We envision a world where every meal is a celebration of freshness, sustainability, and culinary excellence.
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
<!--<div class="home-delivery-sec-wrapper float_left ptb-100">-->
<!--      <div class="container">-->
<!--         <div class="heading-title">-->
<!--            <h4>Benefits of <span class="color-slider   ">Kadaknath Eggs</span></h4>-->
            <!-- <p>know about our delivery processes</p> -->
<!--            <img class="img-fluid" src="{{url('public/website/images/line-yal.png')}}" alt="img">-->
<!--         </div>-->
<!--         <div class="delivery-main-wrapper">-->
<!--            <div class="delivery-box-new">-->
<!--               <img src="{{url('public/website/images/icon/im.png')}}" alt="img">-->
<!--               <h4> Immunity Booster </h4>-->
               
<!--            </div>-->
<!--            <div class="delivery-box-new">-->
<!--               <img src="{{url('public/webimg/f2.png')}}" alt="img">-->
<!--               <h4> Highest Protein </h4>-->
               
<!--            </div>-->
<!--            <div class="delivery-box-new arro-remove">-->
<!--               <img src="{{url('public/webimg/f3.png')}}" alt="img">-->
<!--               <h4> Rich in Iron </h4>-->
              
<!--            </div>-->
            
<!--         </div>-->
<!--         <div class="delivery-main-wrapper">-->
<!--            <div class="delivery-box-new">-->
<!--               <img src="{{url('public/webimg/f1.png')}}" alt="img">-->
<!--               <h4> Low Cholesterol</h4>-->
               
<!--            </div>-->
<!--            <div class="delivery-box-new">-->
<!--               <img src="{{url('public/website/images/icon/fat.png')}}" alt="img">-->
<!--               <h4> Low Fat </h4>-->
               
<!--            </div>-->
<!--            <div class="delivery-box-new arro-remove">-->
<!--               <img src="{{url('public/website/images/icon/bo.png')}}" alt="img">-->
<!--               <h4>Boosts Energy </h4>-->
              
<!--            </div>-->
            
<!--         </div>-->
<!--      </div>-->
<!--   </div>-->
<section class="kadaknath-section">
    <div class="container">
        <div class="col-md-6">
            <div class="content">
                <h4>What is
<span class="color-slider">Kadaknath?</span></h4>
                <p>Kadaknath breed is a type of chicken breed native to India, particularly found in the state of Madhya Pradesh. These chickens are known for their unique black feathers and meat, which is considered to be rich in protein and low in fat. Kadaknath chicken is popular for its distinct taste and is often used in traditional Indian dishes. It's also believed to have certain medicinal properties according to traditional Indian medicine (Ayurveda). </p>
                </div>
        </div>
    </div>
    <div class="king-murga">
        <img src="{{url('public/webimg/king-murga.webp')}}" alt="king-murga" />
    </div>
</section>
<section class="home-delivery-sec-wrapper benifit-section">
    <div class="container-fluid mb-5 py-6">
        <div class="container">
            <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                
                <div class="heading-title mb-3">
            <h4>Benefits of <span class="color-slider">Kadaknath Eggs</span></h4>
         </div>
                <p>Discover the Outstanding Benefits of Kadaknath Eggs!</p>
            </div>
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="benifit-card text-center">
                        <div class="textIcon">
                            <span>01</span>
                            <h4 class="mb-3">Immunity Booster</h4>
                        </div>
                        <p class="mb-4">High protein eggs aid weight loss, benefit nephritis, headaches, asthma, boost immunity.</p>
                        
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="benifit-card text-center">
                        <div class="textIcon">
                            <span>02</span>
                            <h4 class="mb-3">Highest Protein</h4>
                        </div>
                        
                        <p class="mb-4">Eggs help headaches, asthma, kidneys, anemia, and postpartum recovery.</p>
                        
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="benifit-card text-center">
                        <div class="textIcon">
                            <span>03</span>
                        <h4 class="mb-3">Rich in Iron</h4>
                        </div>
                        <p class="mb-4">Effective against headaches, asthma, kidney issues, iron deficiency, and quick recovery after delivery.</p>
                        
                    </div>
                </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="center-img text-center">
                        <img class="img-fluid" src="{{url('public/webimg/Eggs_fly.webp')}}" alt="egg" width="80%">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="benifit-card text-center">
                        <div class="textIcon">
                            <span>04</span>
                            <h4 class="mb-3">Low Cholesterol</h4>
                        </div>
                        
                        <p class="mb-4">Lowers the Risk of Heart Disease</p>
                        
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="benifit-card text-center">
                        <div class="textIcon">
                            <span>05</span>
                        <h4 class="mb-3">Low Fat</h4>
                        </div>
                        <p class="mb-4">Eggs: High protein aids weight loss, benefits nephritis, headaches, asthma, boosts immunity.</p>
                        
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="benifit-card text-center">
                        <div class="textIcon">
                            <span>06</span>
                        <h4 class="mb-3">Boosts Energy</h4>
                        </div>
                        <p class="mb-4">The nutrient-packed black eggs energizes and boosts vitality effectively.</p>
                        
                    </div>
                </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    </section>
<!-- end featuredata -->

   
   <div class="our-info-main-wrapper ptb-100">
      <div class="container">
         <div class="row">
            <div class="col-lg-6 col-md-12 col-12">
               <div class="blog-box">
                  <div class="blog-img">
                     <img src="{{url('public/webimg/eggs-cups-burlap-with-dry-grass.webp')}}" alt="img">
                  </div>
                  <div class="blog-text">
                     <h4>OUR MISSION </h4>
                     <p class="p-text"> At Blackrooster, our mission is to revolutionize the culinary landscape by providing discerning consumers with the epitome of excellence – Kadaknath Eggs. We are dedicated to fostering sustainable farming practices, ensuring the well-being of our content birds, and delivering eggs that stand for unmatched quality, freshness, and nutritional richness. Our commitment extends beyond the plate, as we strive to educate and inspire a conscious and healthy lifestyle.</p>
                  </div>
               </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12">
               <div class="blog-box">
                  <div class="blog-img">
                     <img src="{{url('public/webimg/basket-with-brown-chicken-eggs-goes-up-table.webp')}}" alt="img">
                  </div>
                  <div class="blog-text">
                     <h4> OUR VISION </h4>
                     <p class="p-text">Our vision extends beyond providing exceptional eggs; it encompasses a commitment to fostering a connection between consumers and the food they consume. We envision a world where every meal is a celebration of freshness, sustainability, and culinary excellence.</p>
                  </div>
               </div>
            </div>
            <!-- <div class="col-lg-4 col-md-12 col-12">
               <div class="blog-box">
                  <div class="blog-img">
                     <img src="{{url('public/website/images/product/pm-2.gif')}}" alt="img">
                  </div>
                  <div class="blog-text">
                     <h4> WAT WE DO </h4>
                     <p class="p-text">Nunc elementum purus ex iaculis elfend. Curabitur bibendum odio du</p>
                  </div>
               </div>
            </div> -->
         </div>
      </div>
   </div>

   <!--<div class="home-delivery-sec-wrapper certificate-award float_left">-->
   <!--   <div class="container">-->
   <!--      <div class="heading-title">-->
   <!--         <h4>Certificates & Awards</h4>-->
   <!--         <p>What we achive and what we deliver</p>-->
   <!--         <img class="img-fluid" src="{{url('public/website/images/line-yal.png')}}" alt="img">-->
   <!--      </div>-->
   <!--      <div class="delivery-main-wrapper">-->
   <!--         <div class="delivery-box">-->
   <!--            <img src="{{url('public/website/images/a1.png')}}" alt="img">-->

   <!--         </div>-->
   <!--         <div class="delivery-box">-->
   <!--            <img src="{{url('public/website/images/a2.png')}}" alt="img">-->

   <!--         </div>-->
   <!--         <div class="delivery-box">-->
   <!--            <img src="{{url('public/website/images/a3.png')}}" alt="img">-->

   <!--         </div>-->
   <!--         <div class="delivery-box">-->
   <!--            <img src="{{url('public/website/images/a4.png')}}" alt="img">-->

   <!--         </div>-->
   <!--      </div>-->
   <!--   </div>-->
   <!--</div>-->

   @endsection()

   @section('js')
   @endsection()