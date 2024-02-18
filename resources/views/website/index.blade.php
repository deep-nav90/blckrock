@extends('website.layout.layout')
@section('title','Black Rooster')

@section('content')
  <!-- banner section start start-->
<style>
.table-section table th, .table-section table td{
    border:0 !important;
}
section.home-product-section {
    background: #f6f2e7;
}
section.table-section {
    padding: 50px 0 70px;
}

   span.color-slider {
    color: #fdbd3e;
}
.color-slider-white{
   color:#fff
}
.testimonial-three-wrapper{
   background-color: #fdbd3e;
}

.about-item {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 20px;
    transition:all 0.5s ease 0s;
    cursor:pointer;
}
.about-item:hover{
   transform: translateY(-10px);
}
.about-item:hover .icon{
    background: #fdbd3e;
    color:#ffffff;
}
.about-item:hover .icon svg{
  fill: #ffffff;  
}
.icon {
    background: #ffffff;
    width: 60px;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    color:#fdbd3e;
    transition: all 0.5s ease 0s;
}
.icon svg {
    width: 25px;
    height: 25px;
    fill: #fdbd3e;
}
   </style>

<!--new slider -->


<!--end new slider-->
   <!--<div class=" float_left ptb-10">-->
   <!--   <div class="slidecls">-->
        
   <!--         <div class="owl-carousel owl-carousel-home owl-theme">-->
   <!--            <div class="item">-->
   <!--                  <img src="{{url('public/webimg/slider1.png')}}" alt="Black roster">-->
   <!--                  <div class="cover">-->
   <!--                     <div class="container">-->
   <!--                        <div class="header-content">-->
   <!--                              <div class="line"></div>-->
   <!--                              <h2>Be Extra in the <span class="color-slider"> Ordinary</span></h2>-->
                                
   <!--                              <h4>With nutrition that empowers you </h4>   -->
   <!--                              <a href="/rock/all-products" class="animated-button">Shop Now</a>-->
   <!--                        </div>-->
   <!--                     </div>-->
   <!--                  </div>-->
   <!--            </div>                    -->
   <!--            <div class="item">-->
   <!--                  <img src="{{url('public/webimg/slider3.jpg')}}" alt="Black roster">-->
   <!--                  <div class="cover">-->
   <!--                     <div class="container">-->
   <!--                        <div class="header-content">-->
   <!--                              <div class="line animated bounceInLeft"></div>-->
   <!--                              <h2>An Egg That</h2>-->
   <!--                              <h1><span class="color-slider"> Stands Out</span></h1>-->
   <!--                              <h4>One-day  fresh | 11  safety checks | feed |</h4>-->
   <!--                              <a href="/rock/all-products" class="animated-button">Shop Now</a>-->
   <!--                        </div>-->
   <!--                     </div>-->
   <!--                  </div>-->
   <!--            </div>                -->
   <!--            <div class="item">-->
   <!--                  <img src="{{url('public/webimg/slider4.jpg')}}" alt="Black roster">-->
   <!--                  <div class="cover">-->
   <!--                     <div class="container">-->
   <!--                        <div class="header-content">-->
   <!--                              <div class="line animated bounceInLeft"></div>-->
   <!--                              <h2>Whip up what’s delicious <span class="color-slider">&</span></h2>-->
   <!--                              <h1>what’s delicious <span class="color-slider"> nutritious </span></h1>-->
   <!--                              <h4>Check out these exciting egg recipes</h4>-->
   <!--                              <a href="/rock/all-products" class="animated-button">Shop Now</a>-->
   <!--                        </div>-->
   <!--                     </div>-->
   <!--                  </div>-->
   <!--            </div>-->
   <!--         </div>-->
       
   <!--   </div>-->
   <!--</div> -->
   <!-- banner section start end-->
     <!-- Carousel Start -->
    <!--<div class="container-fluid p-0 wow fadeIn homepage-slider" data-wow-delay="0.1s">-->
    <!--    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">-->
    <!--        <div class="carousel-inner">-->
    <!--            <div class="carousel-item active">-->
    <!--                <img class="w-100 main-img" src="https://demo.htmlcodex.com/2463/organic-food-website-template/img/carousel-1.jpg" alt="Image" >-->
    <!--                <div class="carousel-caption">-->
    <!--                    <div class="container">-->
    <!--                        <div class="row justify-content-start">-->
    <!--                            <div class="col-lg-7">-->
    <!--                                <div class="d-flex justify-content-center align-items-start flex-column h-100">-->
    <!--                                <h1 class="display-2 mb-2 animated slideInDown">Be Extra in the <span class="color-slider"> Ordinary</span></h1>-->
    <!--                                <h3 class="display-2 mb-5 animated slideInDown">With nutrition that empowers you</span></h3>-->
    <!--                                <a href="/rock/all-products" class="btn btn-primary rounded-pill py-sm-3 px-sm-5">Shop Now</a>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                            <div class="col-lg-5">-->
    <!--                                <div class='right-image'>-->
    <!--                                    <img src="{{url('public/webimg/slider-egg-1.jpeg')}}" alt="slider-1" />-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="carousel-item">-->
    <!--                <img class="w-100 main-img" src="https://demo.htmlcodex.com/2463/organic-food-website-template/img/carousel-1.jpg" alt="Image">-->
    <!--                <div class="carousel-caption">-->
    <!--                    <div class="container">-->
    <!--                        <div class="row justify-content-start">-->
    <!--                            <div class="col-lg-7">-->
    <!--                                <div class="d-flex justify-content-center align-items-start flex-column h-100">-->
    <!--                                <h1 class="display-2 mb-2 animated slideInDown">An Egg That<span class="color-slider"> Stands Out</span></h1>-->
    <!--                                <h3 class="display-2 mb-5 animated slideInDown">One-day  fresh | 11  safety checks | feed |</h3>-->
    <!--                                <a href="/rock/all-products" class="btn btn-primary rounded-pill py-sm-3 px-sm-5">Shop Now</a>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                            <div class="col-lg-5">-->
    <!--                                <div class='right-image'>-->
    <!--                                    <img src="{{url('public/webimg/slider-egg-2.jpeg')}}" alt="slider-1" />-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="carousel-item">-->
    <!--                <img class="w-100 main-img" src="https://demo.htmlcodex.com/2463/organic-food-website-template/img/carousel-1.jpg" alt="Image" >-->
    <!--                <div class="carousel-caption">-->
    <!--                    <div class="container">-->
    <!--                        <div class="row justify-content-start">-->
    <!--                            <div class="col-lg-7">-->
    <!--                                <div class="d-flex justify-content-center align-items-start flex-column h-100">-->
    <!--                                <h1 class="display-2 mb-2 animated slideInDown">Whip up what’s delicious <span class="color-slider">& nutritious</span></h1>-->
    <!--                                <h3 class="display-2 mb-5 animated slideInDown">Check out these exciting egg recipes</h3>-->
    <!--                                <a href="/rock/all-products" class="btn btn-primary rounded-pill py-sm-3 px-sm-5">Shop Now</a>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                            <div class="col-lg-5">-->
    <!--                                <div class='right-image'>-->
    <!--                                    <img src="{{url('public/webimg/slider-egg-3.jpeg')}}" alt="slider-1" />-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">-->
    <!--            <span class="carousel-control-prev-icon" aria-hidden="true"></span>-->
    <!--            <span class="visually-hidden">Previous</span>-->
    <!--        </button>-->
    <!--        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">-->
    <!--            <span class="carousel-control-next-icon" aria-hidden="true"></span>-->
    <!--            <span class="visually-hidden">Next</span>-->
    <!--        </button>-->
    <!--    </div>-->
    <!--</div>-->
    <!-- Carousel End -->
    
    
    <!--new custom slider -->
    
    
    <link rel="stylesheet" type="text/css" href="{{url('public/css/animate-slide.css')}}" />
    <section class="custom-slider">
        <div class="pxl-overlay-image imageLeft"><div class="bg-image"></div></div>
        <div class="pxl-overlay-image imageRight"><div class="bg-image"></div></div>
        <div class="pxl-swiper-slider">
            <div class="pxl-swiper-wrapper container">
                <div class="swiper heroMainSwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="swiper-inner-item">
                                <div class="pxl-item-left">
                                    <div class="pxl-item-content">
                                        <div class="pxl-item-subtitle wow PXLfadeInUp" data-wow-delay="200ms">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="34" height="39" viewBox="0 0 34 39"><path class="color-primary" d="M12.019,26.5c2.32-3.613,6.768-6.212,11.03-7.167,1.859,0.213,3.735.351,5.567,0.678a3.453,3.453,0,0,1,1.751,1.076c1.119,1.2.982,1.742-.306,2.933-3.657,3.383-7.286,6.8-10.926,10.2-0.271.255-.53,0.522-0.807,0.769-1.553,1.386-3.281,2.286-5.265,1.494a4.452,4.452,0,0,1-2.813-4.9A12.19,12.19,0,0,1,12.019,26.5Z"></path><path d="M30.293,14.787c-1.169.206-2.367,0.155-3.545,0.311-4.063.537-8.12,1.165-12.185,1.656A39.588,39.588,0,0,1,8.4,17.1,7.962,7.962,0,0,1,4.95,16.066c-3.266-1.816-3.78-5.545-1.187-8.523a15.76,15.76,0,0,1,9.456-5.1c6.644-.706,12.647.54,16.612,6.414a17.9,17.9,0,0,1,1.857,3.916C32.087,13.875,31.349,14.6,30.293,14.787Z"></path></svg>
                                            <span>Black Rooster Eggs</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="29" viewBox="0 0 36 29"><path class="color-primary" d="M9.745,20.884c4.954-3.266,10.2-4.549,15.715-2.721a12.136,12.136,0,0,1,3.866,2.218,10.481,10.481,0,0,1,1.732,2.742c-0.024,2-.851,3.559-2.651,4.02a8.873,8.873,0,0,1-3.99.133c-3.439-.768-6.8-1.809-10.213-2.693-1.335-.346-2.738-0.479-4.054-0.874A2.307,2.307,0,0,1,8.611,22.52,2.444,2.444,0,0,1,9.745,20.884Z"></path><path d="M33.213,9.4a11.979,11.979,0,0,1-5.94,3.175c-4.462,1.056-8.972,1.869-13.4,3.085-2.814.772-5.509,2.091-8.261,3.154a7.228,7.228,0,0,1-1.937.647,1.405,1.405,0,0,1-1.284-2.249C8.3,9.7,15.036,3.391,24.722,1.858a19.273,19.273,0,0,1,6.17.187,4.459,4.459,0,0,1,3.633,3.629A4.363,4.363,0,0,1,33.213,9.4Z"></path></svg>
                                        </div>
                                        <h3 class="pxl-item-title wow PXLfadeInUp" data-wow-delay="400ms"> From Our Farm to Your Table</h3>
                                        <div class="pxl-item-divider wow PXLfadeInUp" data-wow-delay="600ms">
                                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="273.000000pt" height="19.000000pt" viewBox="0 0 273.000000 19.000000" preserveAspectRatio="xMidYMid meet"><g transform="translate(0.000000,19.000000) scale(0.100000,-0.100000)" class="color-primary" stroke="none"><path d="M1545 159 c-533 -17 -1033 -58 -1381 -114 -189 -31 -130 -29 226 6 542 52 947 77 1485 89 231 5 453 10 494 10 41 0 72 3 68 6 -9 9 -630 12 -892 3z"></path></g>
                                            </svg>
                                        </div>
                                        <div class="pxl-item-desc wow PXLfadeInUp" data-wow-delay="800ms">Freshness Unleashed</div>
                                        <div class="pxl-item-button wow PXLfadeInUp " data-wow-delay="1000ms"> <a href="/rock/all-products" class="btn btn-default"><span class="pxl-ml-12">Shop Now</span> </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="pxl-item-right">
                                    <div class="pxl-item-image">
                                        
                                        <div class="pxl-image-main wow zoomInSmall" data-wow-delay="300ms">
                                            <img decoding="async" class="no-lazyload " src="{{url('public/webimg/new-eggs.webp')}}"  alt="slider-dish-1" title="slider-dish-1" />
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="swiper-inner-item">
                                <div class="pxl-item-left">
                                    <div class="pxl-item-content">
                                        <div class="pxl-item-subtitle wow PXLfadeInUp" data-wow-delay="200ms">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="34" height="39" viewBox="0 0 34 39"><path class="color-primary" d="M12.019,26.5c2.32-3.613,6.768-6.212,11.03-7.167,1.859,0.213,3.735.351,5.567,0.678a3.453,3.453,0,0,1,1.751,1.076c1.119,1.2.982,1.742-.306,2.933-3.657,3.383-7.286,6.8-10.926,10.2-0.271.255-.53,0.522-0.807,0.769-1.553,1.386-3.281,2.286-5.265,1.494a4.452,4.452,0,0,1-2.813-4.9A12.19,12.19,0,0,1,12.019,26.5Z"></path><path d="M30.293,14.787c-1.169.206-2.367,0.155-3.545,0.311-4.063.537-8.12,1.165-12.185,1.656A39.588,39.588,0,0,1,8.4,17.1,7.962,7.962,0,0,1,4.95,16.066c-3.266-1.816-3.78-5.545-1.187-8.523a15.76,15.76,0,0,1,9.456-5.1c6.644-.706,12.647.54,16.612,6.414a17.9,17.9,0,0,1,1.857,3.916C32.087,13.875,31.349,14.6,30.293,14.787Z"></path></svg>
                                            <span>Simply Delicious</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="29" viewBox="0 0 36 29"><path class="color-primary" d="M9.745,20.884c4.954-3.266,10.2-4.549,15.715-2.721a12.136,12.136,0,0,1,3.866,2.218,10.481,10.481,0,0,1,1.732,2.742c-0.024,2-.851,3.559-2.651,4.02a8.873,8.873,0,0,1-3.99.133c-3.439-.768-6.8-1.809-10.213-2.693-1.335-.346-2.738-0.479-4.054-0.874A2.307,2.307,0,0,1,8.611,22.52,2.444,2.444,0,0,1,9.745,20.884Z"></path><path d="M33.213,9.4a11.979,11.979,0,0,1-5.94,3.175c-4.462,1.056-8.972,1.869-13.4,3.085-2.814.772-5.509,2.091-8.261,3.154a7.228,7.228,0,0,1-1.937.647,1.405,1.405,0,0,1-1.284-2.249C8.3,9.7,15.036,3.391,24.722,1.858a19.273,19.273,0,0,1,6.17.187,4.459,4.459,0,0,1,3.633,3.629A4.363,4.363,0,0,1,33.213,9.4Z"></path></svg>
                                        </div>
                                        <h3 class="pxl-item-title wow PXLfadeInUp" data-wow-delay="400ms">Kadaknath Chicken Your Health Partner</h3>
                                        <div class="pxl-item-divider wow PXLfadeInUp" data-wow-delay="600ms">
                                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="273.000000pt" height="19.000000pt" viewBox="0 0 273.000000 19.000000" preserveAspectRatio="xMidYMid meet"><g transform="translate(0.000000,19.000000) scale(0.100000,-0.100000)" class="color-primary" stroke="none"><path d="M1545 159 c-533 -17 -1033 -58 -1381 -114 -189 -31 -130 -29 226 6 542 52 947 77 1485 89 231 5 453 10 494 10 41 0 72 3 68 6 -9 9 -630 12 -892 3z"></path></g>
                                            </svg>
                                        </div>
                                        <div class="pxl-item-desc wow PXLfadeInUp " data-wow-delay="800ms">Savor Pure Gastronomic Excellence</div>
                                        <div class="pxl-item-button wow PXLfadeInUp" data-wow-delay="1000ms"> <a href="/rock/all-products" class="btn btn-default"><span class="pxl-ml-12">Shop Now</span> </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="pxl-item-right">
                                    <div class="pxl-item-image">
                                        
                                        <div class="pxl-image-main wow zoomInSmall" data-wow-delay="300ms">
                                            <img decoding="async" class="no-lazyload " src="{{url('public/webimg/chicken-new.webp')}}" alt="slider-dish-1" title="slider-dish-1" />
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="swiper-inner-item">
                                <div class="pxl-item-left">
                                    <div class="pxl-item-content">
                                        <div class="pxl-item-subtitle wow PXLfadeInUp" data-wow-delay="200ms">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="34" height="39" viewBox="0 0 34 39"><path class="color-primary" d="M12.019,26.5c2.32-3.613,6.768-6.212,11.03-7.167,1.859,0.213,3.735.351,5.567,0.678a3.453,3.453,0,0,1,1.751,1.076c1.119,1.2.982,1.742-.306,2.933-3.657,3.383-7.286,6.8-10.926,10.2-0.271.255-.53,0.522-0.807,0.769-1.553,1.386-3.281,2.286-5.265,1.494a4.452,4.452,0,0,1-2.813-4.9A12.19,12.19,0,0,1,12.019,26.5Z"></path><path d="M30.293,14.787c-1.169.206-2.367,0.155-3.545,0.311-4.063.537-8.12,1.165-12.185,1.656A39.588,39.588,0,0,1,8.4,17.1,7.962,7.962,0,0,1,4.95,16.066c-3.266-1.816-3.78-5.545-1.187-8.523a15.76,15.76,0,0,1,9.456-5.1c6.644-.706,12.647.54,16.612,6.414a17.9,17.9,0,0,1,1.857,3.916C32.087,13.875,31.349,14.6,30.293,14.787Z"></path></svg>
                                            <span>Black Rooster Eggs</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="29" viewBox="0 0 36 29"><path class="color-primary" d="M9.745,20.884c4.954-3.266,10.2-4.549,15.715-2.721a12.136,12.136,0,0,1,3.866,2.218,10.481,10.481,0,0,1,1.732,2.742c-0.024,2-.851,3.559-2.651,4.02a8.873,8.873,0,0,1-3.99.133c-3.439-.768-6.8-1.809-10.213-2.693-1.335-.346-2.738-0.479-4.054-0.874A2.307,2.307,0,0,1,8.611,22.52,2.444,2.444,0,0,1,9.745,20.884Z"></path><path d="M33.213,9.4a11.979,11.979,0,0,1-5.94,3.175c-4.462,1.056-8.972,1.869-13.4,3.085-2.814.772-5.509,2.091-8.261,3.154a7.228,7.228,0,0,1-1.937.647,1.405,1.405,0,0,1-1.284-2.249C8.3,9.7,15.036,3.391,24.722,1.858a19.273,19.273,0,0,1,6.17.187,4.459,4.459,0,0,1,3.633,3.629A4.363,4.363,0,0,1,33.213,9.4Z"></path></svg>
                                        </div>
                                        <h3 class="pxl-item-title wow PXLfadeInUp" data-wow-delay="400ms">Flavourful Feats, Limitless Choices</h3>
                                        <div class="pxl-item-divider wow PXLfadeInUp" data-wow-delay="600ms" style="visibility: visible; animation-delay: 600ms;">
                                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="273.000000pt" height="19.000000pt" viewBox="0 0 273.000000 19.000000" preserveAspectRatio="xMidYMid meet"><g transform="translate(0.000000,19.000000) scale(0.100000,-0.100000)" class="color-primary" stroke="none"><path d="M1545 159 c-533 -17 -1033 -58 -1381 -114 -189 -31 -130 -29 226 6 542 52 947 77 1485 89 231 5 453 10 494 10 41 0 72 3 68 6 -9 9 -630 12 -892 3z"></path></g>
                                            </svg>
                                        </div>
                                        <div class="pxl-item-desc wow PXLfadeInUp" data-wow-delay="800ms">
Naturally Nutritious, Deliciously Fresh</div>
                                        <div class="pxl-item-button wow PXLfadeInUp" data-wow-delay="1000ms"> <a href="/rock/all-products" class="btn btn-default"><span class="pxl-ml-12">Shop Now</span> </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="pxl-item-right">
                                    <div class="pxl-item-image">
                                        
                                        <div class="pxl-image-main wow zoomInSmall" data-wow-delay="300ms">
                                            <img decoding="async" class="no-lazyload " src="{{url('public/webimg/egg-premium-1.webp')}}" alt="slider-dish-1" title="slider-dish-1" />
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
                
                <div thumbsSlider="" class="swiper heroThumbSwiper hero-content-slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="pxl-thumb-inner">
                                <div class="pxl-thumb-image">
                                    <img decoding="async" class="no-lazyload " src="{{url('public/webimg/new-eggs.webp')}}" width="128" height="128" alt="slider-dish-2" title="slider-dish-2">
                                </div>
                                <div class="pxl-thumb-title">Nutrition rich delight</div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="pxl-thumb-inner">
                                <div class="pxl-thumb-image">
                                    <img decoding="async" class="no-lazyload " src="{{url('public/webimg/chicken-new.webp')}}" width="128" height="128" alt="slider-dish-2" title="slider-dish-2">
                                </div>
                                <div class="pxl-thumb-title">Fresh Organic Bliss</div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="pxl-thumb-inner">
                                <div class="pxl-thumb-image">
                                    <img decoding="async" class="no-lazyload " src="{{url('public/webimg/egg-premium-1.webp')}}" width="128" height="128" alt="slider-dish-2" title="slider-dish-2">
                                </div>
                                <div class="pxl-thumb-title">Culinary Diversity</div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            
            </div>
            <div class="pxl-bottom-image" data-parallax-value=""> <img decoding="async" width="100%" height="117" src="{{url('public/webimg/section-divider1.png')}}" class="no-lazyload attachment-full" alt="" style="object-fit:cover">
            </div>
            
        </div>
    </section>
    
    
    <!-- About Start -->
    <section class="home-about-section">
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-7 wow fadeIn" data-wow-delay="0.1s">
                    <div class="row align-items-center">
                        <div class="col-md-7">
                            <div class="about-img position-relative overflow-hidden d-flex">
                                <img class="img-fluid w-100" src="{{url('public/webimg/about-home1.jpeg')}}">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="about-img position-relative second-img-section">
                        <img class="img-fluid w-100 second-img" src="{{url('public/webimg/about-second.avif')}}">
                        <img class="murga-img" src="{{url('public/webimg/murga.webp')}}" alt="murga" />
                        
                    </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="display-5 mb-4">Uniting Freshness with<span class="color-slider"> Healthy Excellence</span></h1>
                    <p class="mb-4">Our vision extends beyond providing exceptional eggs; it encompasses a commitment to fostering a connection between consumers and the food they consume. We envision a world where every meal is a celebration of freshness, sustainability, and culinary excellence.</p>
                  <div class="row">
                      <div class="col-sm-6">
                          <div class="about-item">
                              <div class='icon'>
                                  <svg id="Capa_1" enable-background="new 0 0 504.122 504.122" height="512" viewBox="0 0 504.122 504.122" width="512" xmlns="http://www.w3.org/2000/svg"><g><path d="m504.019 272.747c-.644-26.701-3.331-51.654-7.985-74.167-2.599-12.574-22.189-8.544-19.586 4.049 4.413 21.342 6.961 45.095 7.577 70.6.975 40.426-5.313 75.521-18.688 104.309-21.378 46.011-63.184 76.325-112.598 85.367-.256.046-23.758 4.17-56.457-2.544 13.46-8.709 30.093-21.931 45.155-40.908 46.866-59.047 47.344-137.371 27.56-207.009-12.47-43.895-30.199-87.341-57.613-124.144 42.547-21.599 72.761-13.359 74.049-12.99.289.091.4.118.696.182 1.415.326 34.967 8.496 62.639 53.538 6.776 11.027 23.749.449 17.041-10.47-31.146-50.695-70.433-61.417-74.998-62.513-4.419-1.224-42.265-10.444-92.287 16.409-24.68-27.907-58.627-53.49-96.761-57.436-28.392-2.937-56.782 7.868-80.166 23.312-21.555 14.236-41.118 34.124-58.146 59.11-20.97 30.771-38.162 69.463-51.099 115-19.784 69.639-19.306 147.96 27.56 207.009 30.259 38.124 66.867 53.035 71.324 54.749 48.796 21.996 109.924 18.97 158.968-.036 27.233 8.733 57.355 13.353 85.775 8.476 55.154-6.38 104.071-46.764 127.189-96.022 14.893-31.729 21.908-70.042 20.851-113.871zm-384.687 183.167c-.245-.115-.514-.227-.767-.321-.352-.131-35.524-13.549-63.571-49.313-42.26-53.886-41.31-125.338-23.404-188.369 27.505-96.815 69.408-141.54 99.717-162.011 25.197-17.019 48.623-21.41 58.198-21.41.27 0 .53.003.778.01.261.011.521.011.782 0 1.051-.035 106.026-1.976 158.692 183.41 17.908 63.033 18.857 134.483-23.402 188.369-28.047 35.764-63.219 49.182-63.551 49.305-44.217 16.274-99.514 20.687-143.472.33z"/><path d="m300.01 316.311c0-60.288-49.048-109.336-109.336-109.336-16.892 0-33.092 3.751-48.151 11.148-11.525 5.661-2.724 23.618 8.818 17.951 12.291-6.038 25.524-9.1 39.333-9.1 49.26 0 89.336 40.076 89.336 89.336s-40.076 89.336-89.336 89.336-89.336-40.076-89.336-89.336c0-8.993 1.33-17.864 3.952-26.366 3.784-12.27-15.322-18.18-19.112-5.894-3.211 10.413-4.839 21.267-4.839 32.26 0 60.288 49.048 109.336 109.336 109.336s109.335-49.047 109.335-109.335z"/><path d="m105.997 256.575c1.618 3.948 5.72 6.455 9.964 6.151 4.342-.31 8.06-3.544 9.013-7.783 1.961-8.718-8.172-15.504-15.5-10.358-3.777 2.653-5.254 7.724-3.477 11.99z"/><path d="m465.807 155.905c-4.894 7.334 1.873 17.267 10.506 15.296 4.151-.948 7.346-4.518 7.758-8.771.402-4.155-1.902-8.229-5.678-10.016-4.4-2.082-9.909-.602-12.586 3.491z"/></g></svg>
                              </div>
                              <p>Fresh Eggs</p>
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="about-item">
                              <div class='icon'>
                                   <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 256 256" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M224,104h-8.37a88,88,0,0,0-175.26,0H32a8,8,0,0,0-8,8,104.35,104.35,0,0,0,56,92.28V208a16,16,0,0,0,16,16h64a16,16,0,0,0,16-16v-3.72A104.35,104.35,0,0,0,232,112,8,8,0,0,0,224,104Zm-24.46,0H148.12a71.84,71.84,0,0,1,41.27-29.57A71.45,71.45,0,0,1,199.54,104ZM173.48,56.23q2.75,2.25,5.27,4.75a87.92,87.92,0,0,0-49.15,43H100.1A72.26,72.26,0,0,1,168,56C169.83,56,171.66,56.09,173.48,56.23ZM128,40a71.87,71.87,0,0,1,19,2.57A88.36,88.36,0,0,0,83.33,104H56.46A72.08,72.08,0,0,1,128,40Zm36.66,152A8,8,0,0,0,160,199.3V208H96v-8.7A8,8,0,0,0,91.34,192a88.29,88.29,0,0,1-51-72H215.63A88.29,88.29,0,0,1,164.66,192Z"></path></svg>
                                  
                              </div>
                              <p>Fresh/Organic Chicken</p>
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="about-item">
                              <div class='icon'>
                                 <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0 0h24v24H0z"></path><path d="M19 7c0-1.1-.9-2-2-2h-3v2h3v2.65L13.52 14H10V9H6c-2.21 0-4 1.79-4 4v3h2c0 1.66 1.34 3 3 3s3-1.34 3-3h4.48L19 10.35V7zM7 17c-.55 0-1-.45-1-1h2c0 .55-.45 1-1 1z"></path><path d="M5 6h5v2H5zM19 13c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3zm0 4c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1z"></path></svg>
                              </div>
                              <p>Fast Delivery</p>
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="about-item">
                              <div class='icon'>
                                  <?xml version="1.0" encoding="UTF-8"?>
<svg xmlns="http://www.w3.org/2000/svg" id="icons" viewBox="0 0 60 60" width="512" height="512"><path d="M30,7A16,16,0,1,0,46,23,16.019,16.019,0,0,0,30,7Zm0,30A14,14,0,1,1,44,23,14.015,14.015,0,0,1,30,37Z"/><path d="M33.879,16.879,26,24.761a3.071,3.071,0,0,0-4.118.118,3,3,0,0,0,0,4.242l2,2a3.029,3.029,0,0,0,4.243,0l10-10a3,3,0,0,0-4.242-4.242Zm2.828,2.828-10,10a1.021,1.021,0,0,1-1.414,0l-2-2a1,1,0,0,1,1.414-1.414l.586.586a1,1,0,0,0,1.414,0l8.586-8.586a1,1,0,0,1,1.414,1.414Z"/><path d="M51.48,19.128,49.405,18.3a19.751,19.751,0,0,0-2.361-5.693l.878-2.056A2.243,2.243,0,0,0,47.6,8.2c-.365-.439-.784-.9-1.341-1.472-.552-.538-1.014-.957-1.442-1.312a2.254,2.254,0,0,0-2.362-.337l-2.057.879A19.751,19.751,0,0,0,34.7,3.6l-.83-2.078A2.291,2.291,0,0,0,31.986.089a22.2,22.2,0,0,0-3.961,0,2.3,2.3,0,0,0-1.9,1.432L25.3,3.6a19.762,19.762,0,0,0-5.693,2.361L17.55,5.078A2.241,2.241,0,0,0,15.2,5.4c-.441.365-.9.785-1.472,1.34-.538.552-.958,1.014-1.311,1.442a2.248,2.248,0,0,0-.339,2.363l.879,2.057A19.809,19.809,0,0,0,10.594,18.3l-2.078.831a2.288,2.288,0,0,0-1.427,1.885,22.182,22.182,0,0,0,0,3.959,2.294,2.294,0,0,0,1.432,1.9l2.074.829a19.809,19.809,0,0,0,2.362,5.693l-.878,2.056A2.243,2.243,0,0,0,12.4,37.8c.365.441.785.9,1.341,1.472.551.538,1.013.958,1.441,1.312.035.03.078.045.115.073L10.249,52.269a3.082,3.082,0,0,0,2.841,4.279h4.29a.411.411,0,0,1,.294.119L20.113,59.1a3.089,3.089,0,0,0,5.008-.935L30,47.417l4.874,10.73a3.079,3.079,0,0,0,2.254,1.8A3.026,3.026,0,0,0,37.7,60a3.087,3.087,0,0,0,2.182-.9l2.443-2.433a.413.413,0,0,1,.292-.116h4.29a3.082,3.082,0,0,0,2.837-4.289L44.693,40.664c.034-.026.076-.04.109-.068.439-.365.9-.784,1.472-1.341.538-.552.957-1.014,1.312-1.442a2.248,2.248,0,0,0,.337-2.362l-.879-2.057A19.751,19.751,0,0,0,49.405,27.7l2.078-.83a2.291,2.291,0,0,0,1.428-1.885A19.4,19.4,0,0,0,53,23a19.275,19.275,0,0,0-.089-1.98A2.3,2.3,0,0,0,51.48,19.128ZM23.293,57.347a1.088,1.088,0,0,1-1.768.332l-2.437-2.427a2.425,2.425,0,0,0-1.708-.7H13.09a1.068,1.068,0,0,1-.9-.485,1.054,1.054,0,0,1-.1-1.005L17.342,40.98c.069-.022.139-.028.207-.057l2.057-.879A19.762,19.762,0,0,0,25.3,42.405l.83,2.079a2.293,2.293,0,0,0,1.885,1.427c.147.015.306.022.459.033Zm24.616-4.3a1.081,1.081,0,0,1-1,1.5H42.62a2.422,2.422,0,0,0-1.7.7l-2.442,2.432a1.09,1.09,0,0,1-1.773-.347l-5.173-11.39c.149-.011.3-.017.448-.032a2.3,2.3,0,0,0,1.9-1.432l.829-2.075a19.751,19.751,0,0,0,5.693-2.361l2.056.878c.064.028.132.033.2.055ZM50.92,24.8a.289.289,0,0,1-.182.218l-2.562,1.024a1.006,1.006,0,0,0-.608.721,17.818,17.818,0,0,1-2.488,6A1,1,0,0,0,45,33.7l1.085,2.541a.277.277,0,0,1-.029.289c-.328.4-.714.822-1.2,1.315-.512.5-.936.886-1.345,1.223a.278.278,0,0,1-.279.019L40.7,38a1,1,0,0,0-.936.081,17.818,17.818,0,0,1-6,2.488,1.006,1.006,0,0,0-.721.608l-1.023,2.559a.292.292,0,0,1-.231.186A17.663,17.663,0,0,1,30.006,44h-.012a17.765,17.765,0,0,1-1.791-.08.29.29,0,0,1-.218-.182l-1.024-2.562a1,1,0,0,0-.72-.608,17.794,17.794,0,0,1-6-2.488,1,1,0,0,0-.544-.161A.994.994,0,0,0,19.3,38l-2.541,1.085a.269.269,0,0,1-.288-.029c-.4-.329-.822-.715-1.315-1.2-.5-.511-.884-.934-1.224-1.345a.275.275,0,0,1-.018-.278L15,33.7a1,1,0,0,0-.081-.936,17.82,17.82,0,0,1-2.489-6,1,1,0,0,0-.607-.721L9.265,25.017a.3.3,0,0,1-.186-.231C9.026,24.255,9,23.671,9,23s.026-1.255.08-1.8a.291.291,0,0,1,.182-.217l2.562-1.024a1,1,0,0,0,.607-.721,17.82,17.82,0,0,1,2.489-6A1,1,0,0,0,15,12.3L13.917,9.763a.277.277,0,0,1,.029-.29c.329-.4.714-.821,1.2-1.315.511-.5.935-.884,1.346-1.223a.269.269,0,0,1,.277-.018L19.3,8a1,1,0,0,0,.937-.081,17.794,17.794,0,0,1,6-2.488,1,1,0,0,0,.72-.608l1.022-2.558a.294.294,0,0,1,.232-.187,20.214,20.214,0,0,1,3.582,0,.289.289,0,0,1,.218.182l1.024,2.562a1.006,1.006,0,0,0,.721.608,17.818,17.818,0,0,1,6,2.488A1,1,0,0,0,40.7,8l2.541-1.085a.277.277,0,0,1,.289.029c.4.328.822.714,1.315,1.2.5.512.886.936,1.223,1.345a.273.273,0,0,1,.019.279L45,12.3a1,1,0,0,0,.081.936,17.818,17.818,0,0,1,2.488,6,1.006,1.006,0,0,0,.608.721l2.559,1.023a.29.29,0,0,1,.185.219v.012A17.483,17.483,0,0,1,51,23,17.585,17.585,0,0,1,50.92,24.8Z"/></svg>

                              </div>
                              <p>Quality Assured</p>
                          </div>
                      </div>
                  </div>
                    <a class="btn about-btn btn-primary rounded-pill py-3 px-5 mt-3" href="/rock/about-us">Read More</a>
                </div>
            </div>
        </div>
    </div>
    </section>
    <!-- About End -->
        <!-- Feature Start -->
    <!--    <section class="home-delivery-sec-wrapper benifit-section">-->
    <!--<div class="container-fluid my-5 py-6">-->
    <!--    <div class="container">-->
    <!--        <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">-->
                
    <!--            <div class="heading-title mb-3">-->
    <!--        <h4>Benefits of <span class="color-slider   ">Kadaknath Eggs</span></h4>-->
    <!--     </div>-->
    <!--            <p>"Eggs: Effective remedy for headaches, asthma, kidney issues, anemia, recovery."</p>-->
    <!--        </div>-->
    <!--        <div class="row g-4">-->
    <!--            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">-->
    <!--                <div class="bg-white text-center h-100 p-4 p-xl-5">-->
    <!--                    <img class="img-fluid mb-4" src="{{url('public/website/images/icon/im.png')}}" alt="">-->
    <!--                    <h4 class="mb-3">Immunity Booster</h4>-->
    <!--                    <p class="mb-4">High protein eggs aid weight loss, benefit nephritis, headaches, asthma, boost immunity.</p>-->
                        
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">-->
    <!--                <div class="bg-white text-center h-100 p-4 p-xl-5">-->
    <!--                    <img class="img-fluid mb-4" src="{{url('public/webimg/f2.png')}}" alt="">-->
    <!--                    <h4 class="mb-3">Highest Protein</h4>-->
    <!--                    <p class="mb-4">Eggs help headaches, asthma, kidneys, anemia, and postpartum recovery.</p>-->
                        
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">-->
    <!--                <div class="bg-white text-center h-100 p-4 p-xl-5">-->
    <!--                    <img class="img-fluid mb-4" src="{{url('public/webimg/f3.png')}}" alt="">-->
    <!--                    <h4 class="mb-3">Rich in Iron</h4>-->
    <!--                    <p class="mb-4">Effective against headaches, asthma, kidney issues, iron deficiency, and quick recovery after delivery.</p>-->
                        
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">-->
    <!--                <div class="bg-white text-center h-100 p-4 p-xl-5">-->
    <!--                    <img class="img-fluid mb-4" src="{{url('public/webimg/f1.png')}}" alt="">-->
    <!--                    <h4 class="mb-3">Low Cholesterol</h4>-->
    <!--                    <p class="mb-4">Lowers the Risk of Heart Disease</p>-->
                        
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">-->
    <!--                <div class="bg-white text-center h-100 p-4 p-xl-5">-->
    <!--                    <img class="img-fluid mb-4" src="{{url('public/website/images/icon/fat.png')}}" alt="">-->
    <!--                    <h4 class="mb-3">Low Fat</h4>-->
    <!--                    <p class="mb-4">Eggs: High protein aids weight loss, benefits nephritis, headaches, asthma, boosts immunity.</p>-->
                        
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">-->
    <!--                <div class="bg-white text-center h-100 p-4 p-xl-5">-->
    <!--                    <img class="img-fluid mb-4" src="{{url('public/website/images/icon/bo.png')}}" alt="">-->
    <!--                    <h4 class="mb-3">Boosts Energy</h4>-->
    <!--                    <p class="mb-4">The nutrient-packed black eggs energizes and boosts vitality effectively.</p>-->
                        
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <!--</section>-->
     <section class="home-delivery-sec-wrapper benifit-section">
    <div class="container-fluid my-5 py-6">
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
    <section class="table-section">
        <div class="container">
            <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px; visibility: visible; animation-delay: 0.1s;">
                
                <div class="heading-title mb-3">
            <h4>Comparison <span class="color-slider">Normal</span> vs<span class="color-slider"> Kadaknath</span></h4>
         </div>
                
            </div>
            <div class="table-wrapper">
            <table class="table">
  <thead>
      <tr>
          <th></th>
          <th style="position: relative;width: 360px;"><img src="{{url('public/webimg/chicken-new.webp')}}" alt="" class="table-img"/></th>
          <th style="position: relative;width: 360px;"><img src="{{url('public/webimg/pngegg.webp')}}" alt="" class="table-img" style="top:-30px" /></th>
      </tr>
      <tr>
          <th>Properties</th>
          <th>Kadaknath</th>
          <th>Other Breed Chicken</th>
      </tr>
  </thead>
  <tbody>
      <tr>
          <td>Protein Content</td>
          <td>25%</td>
          <td>18-20 %</td>
      </tr>
      <tr>
          <td>Fat Content</td>
          <td>0・73-1.03</td>
          <td>13-25%</td>
      </tr>
      <tr>
          <td>Linoleic Acid</td>
          <td>24% 21%</td>
          <td>NIL</td>
      </tr>
      <tr>
          <td>Cholestrol</td>
          <td>184.75Mg/100g</td>
          <td>218.12Mg/100g</td>
      </tr>
  </tbody>
</table>
</div>
        </div>
    </section>
    <!-- Feature End -->

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
   
     <!-- Product Start -->
     <section class="home-product-section">
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                        <h1 class="display-5 mb-3">Our <span class="color-slider">Product's</h1>
                        
                    </div>
                </div>
                <!--  <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">-->
                <!--    <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">-->
                <!--        <li class="nav-item me-2">-->
                <!--            <a class="btn btn-outline-primary border-2 active" data-bs-toggle="pill"-->
                <!--                href="#tab-1">Vegetable</a>-->
                <!--        </li>-->
                <!--        <li class="nav-item me-2">-->
                <!--            <a class="btn btn-outline-primary border-2" data-bs-toggle="pill" href="#tab-2">Fruits </a>-->
                <!--        </li>-->
                <!--        <li class="nav-item me-0">-->
                <!--            <a class="btn btn-outline-primary border-2" data-bs-toggle="pill" href="#tab-3">Fresh</a>-->
                <!--        </li>-->
                <!--    </ul>-->
                <!--</div>-->
            </div>
            <div class="tab-content">
                @if(count($categories) > 0)
                  @foreach($categories as $category)
                <div id="{{$category->category_name}}" class="tab-pane fade show p-0 ">
                    <div class="row g-4">
                        @if(count($category->topThreeProducts) > 0)
                        <?php $m = 1;?>
                        @foreach($category->topThreeProducts as $product)

                        @if($m <= 8)
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="product-item">
                                <div class="position-relative bg-light overflow-hidden">
                                     @foreach($product->productImages as $productImage)
                              @if($productImage->is_featured_image == 1)
                              <a href="{{route('singleProductDetails',base64_encode($product->id))}}">
                                    <img class="img-fluid w-100" src="{{$productImage->product_image}}" alt="">
                                    </a>
                                     @endif()
                              @endforeach()
                                    <div class="bg-new rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                                </div>
                                <div class="text-center p-4">
                                    <a class="d-block h5 mb-2 prod-title" href="{{route('singleProductDetails',base64_encode($product->id))}}" title="{{$product->product_name}}">{{$product->product_name}}</a>
                                    <!-- <a class="sub_category_name_anchor" href="javascript:void(0);">{{$product->subCategory->sub_category_name}}</a> -->
                                 <!-- <a class="attribute_anchor" href="javascript:void(0);">{{$product->default_attribute_value}} ({{$product->default_attribute_name}})</a> -->
                                 <span class="star_rating" style="--rating:{{$product->average_rating}}"></span>
                                    <span class="rate me-1">₹{{$product->default_sale_price}}</span>
                                    <span class="text-body text-decoration-line-through">₹{{$product->default_product_price}}</span>
                                </div>
                                <div class="d-flex border-top">
                                    <small class="w-50 text-center border-end py-2">
                                        <a class="text-body" href="{{route('singleProductDetails',base64_encode($product->id))}}"><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                                    </small>
                                    <small class="w-50 text-center py-2">
                                        <a class="text-body AddCartAnchorTab" product_details = "{{$product}}" is_added_in_cart="false" product_id="{{$product->id}}" href="javascript:void(0);"><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                                    </small>
                                </div>
                            </div>
                        </div>
                        @endif()
                        <?php $m++; ?>
                        @endforeach()
                        
                        <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                            <a class="btn rounded-pill py-3 px-5 all-prod" href="{{route('allProducts')}}">Browse More Products</a>
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
    </section>
    <!-- Product End -->
    
    <!--new section-->
    
    <section class="premium-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="content">
                <h4>Why Kadaknath<br />
Eggs are <span class="color-slider">Premium?</span></h4>
                <p>Kadaknath eggs stand out for their premium quality due to the breed's unique characteristics. Known for their robust and distinct flavor, these eggs are rich in nutrients. Raised in a natural environment, Kadaknath hens produce eggs with a deep-colored yolk and a delicate taste. </p>
                </div>
            </div>
            </div>
        </div>
        <div class="premium-egg">
            <img src="{{url('public/webimg/egg-premium.webp')}}" alt="premium" />
        </div>
        <div class="chicken-product">
            <img src="{{url('public/webimg/new-chicken.webp')}}" alt="chickne" />
        </div>
    </section>
    <section class="health-section">
        <div class="container">
           <div class="heading-title text-center">
            <h4>Health Benefits of<br /> <span class="color-slider   ">Kadaknath Eggs</span></h4>
         </div>
         <div class="row">
             <div class="col-md-4">
                 <div class="health-wrapper">
                     <h3>Rich in Protein</h3>
                     <p>Kadaknath eggs are a protein powerhouse, promoting muscle development, tissue repair, and overall body strength.</p>
                 </div>
             </div>
             <div class="col-md-4">
                 <div class="health-wrapper">
                     <h3>Nutrient-Rich Yolk</h3>
                     <p>The deep-colored yolk signifies high nutrient content, offering essential vitamins, minerals, and antioxidants for overall health.</p>
                 </div>
             </div>
             <div class="col-md-4">
                 <div class="health-wrapper">
                     <h3>Low Cholesterol</h3>
                     <p>Kadaknath eggs have lower cholesterol levels, supporting heart health and maintaining a balanced cholesterol profile.</p>
                 </div>
             </div>
             <div class="col-md-4">
                 <div class="health-wrapper">
                     <h3>Boosts Immunity</h3>
                     <p>Packed with immune-boosting properties, Kadaknath eggs strengthen the body's defense mechanisms against infections and illnesses.</p>
                 </div>
             </div>
             <div class="col-md-4">
                 <div class="health-wrapper">
                     <h3>Enhances Brain Function</h3>
                     <p>The eggs contribute to improved cognitive function, memory, and mental alertness due to their nutrient-rich composition.</p>
                 </div>
             </div>
             <div class="col-md-4">
                 <div class="health-wrapper">
                     <h3>Aids in Weight Management</h3>
                     <p>With a satisfying protein content, Kadaknath eggs promote a feeling of fullness, aiding in weight management and satiety.</p>
                 </div>
             </div>
         </div>
        </div>
    </section>
  
   <div class="product-filter-main-wrapper float_left ptb-20 pb-0">
      <div class="container" style="display:none;">
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
                                 <!-- <a class="sub_category_name_anchor" href="javascript:void(0);">{{$product->subCategory->sub_category_name}}</a> -->
                                 <!-- <a class="attribute_anchor" href="javascript:void(0);">{{$product->default_attribute_value}} ({{$product->default_attribute_name}})</a> -->
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
   
 <!-- Firm Visit Start -->
 <section class="visit-section position-relative">
    <div class="py-6">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-md-7 wow fadeIn" data-wow-delay="0.1s">
                    <h1 class="display-5 text-white mb-3">Quality Beyond Compare</h1>
                    <p class="text-white mb-5">Eggs are a testament to our unwavering commitment to quality. From the moment each egg is laid to its journey to your table, we adhere to the highest standards of freshness. Our eggs are carefully handled, minimally processed, and delivered to you at the peak of their natural goodness.</p>
                    <a class="btn btn-lg rounded-pill py-3 px-5 text-white" style="background:#000000" href="/rock/contact-us">Shop Now</a>
                </div>
                <div class="col-md-5 text-md-end wow fadeIn" data-wow-delay="0.5s">
                    
                </div>
            </div>
        </div>
        <div class="plate-egg-img">
                        <img src="{{url('public/webimg/crop-img.webp')}}" alt="egg-plate" />
                    </div>
    </div>
    </section>
    <!-- Firm Visit End -->
 <!-- Testimonial Start -->
    <div class="container-fluid testimonial-section bg-icon py-6">
        <div class="container">
            <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s"
                style="max-width: 500px;">
                <div class="heading-title">
        <h4>Our <span class="color-slider"> Client Say</span></h4>
        </div>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="testimonial-item position-relative p-5 mt-4">
                    <div class="img-div">
                    <img class="flex-shrink-0 rounded-circle" src="{{url('public/webimg/user.png')}}" alt="">
                    <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                    </div>
                    <p class="mb-4">Delighted with the rich flavor and superior quality of Blackrooster Kadaknath eggs. Each bite is a testament to farm-fresh excellence, making breakfast a daily indulgence.</p>
                    <div class="d-flex align-items-center justify-content-center">
                        <div class="ms-3">
                            <h5 class="mb-1">Jaskaran Singh</h5>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item position-relative p-5 mt-4">
                    <div class="img-div">
                    <img class="flex-shrink-0 rounded-circle" src="{{url('public/webimg/user.png')}}" alt="">
                    <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                    </div>
                    <p class="mb-4">The superior quality and robust taste set them apart. A healthy and flavorful choice for my family.</p>
                    <div class="d-flex align-items-center justify-content-center">
                       
                        <div class="ms-3">
                            <h5 class="mb-1">Rohit Sharma</h5>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item position-relative p-5 mt-4">
                     <div class="img-div">
                    <img class="flex-shrink-0 rounded-circle" src="{{url('public/webimg/user.png')}}" alt="">
                    <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                    </div>
                    <p class="mb-4">The farm-fresh goodness shines through, making them a staple in our kitchen for their unrivaled flavor and health benefits</p>
                    <div class="d-flex align-items-center justify-content-center">
                       
                        <div class="ms-3">
                            <h5 class="mb-1">Pawan Kashyap</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


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
  
  <!--start new home delivery section-->
  <section class="home-delivery-new-section">
      <div class="container">
          <div class="row">
              <div class="col-md-5" style="padding-top:50px;position:relative;">
                  <div>
                  <div style="position:relative;z-index:5">
                  <div class="lotties-img">
                      <lottie-player src="{{url('public/webimg/json-scooter.json')}}" background="transparent"  speed="1"  style="width: 100%; height: 100%;" loop autoplay></lottie-player>
                  </div>
                  </div>
                  <div class="pbmit-circle-box"></div>
                  </div>
              </div>
              <div class="col-md-7">
                  <div class="home-content">
                      <h4 class="subtitle">
                          Freshness Defined
                      </h4>
                      <h2>Directly Delivered from Farm to Your Table</h2>
                      <p>Elevate your culinary experience with the finest, farm-fresh goodness delivered right to you</p>
                      <div class="delivery-sections">
                          <div class="delivery-card">
                              <img src="{{url('public/webimg/aroma.png')}}" alt="aroma" />
                              <h5>No Bad Odour</h5>
                          </div>
                          <div class="delivery-card">
                              <img src="{{url('public/webimg/chicken-leg.png')}}" alt="chiken-leg" />
                              <h5>Nutri Enriched Feed</h5>
                          </div>
                          <div class="delivery-card">
                              <img src="{{url('public/webimg/barn.png')}}" alt="" />
                              <h5>Modern Farm</h5>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!--end new home delivery section-->
   <!-- <div class="home-delivery-sec-wrapper float_left pt-5 mb-4">-->
   <!--   <div class="container">-->
   <!--       <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s"-->
   <!--             style="max-width: 500px;">-->
   <!--      <div class="heading-title">-->
   <!--         <h4>Home <span class="color-slider"> Delivery</span></h4>-->
   <!--         <p>know about our delivery processes</p>-->
   <!--         </div>-->
            
   <!--      </div>-->
   <!--      <div class="delivery-main-wrapper">-->
   <!--         <div class="delivery-box">-->
   <!--            <img src="{{url('public/website/images/icon01.png')}}" alt="img">-->
   <!--            <h4> Choose </h4>-->
               
   <!--         </div>-->
   <!--         <div class="delivery-box">-->
   <!--            <img src="{{url('public/website/images/icon02.png')}}" alt="img">-->
   <!--            <h4> Recieve </h4>-->
              
   <!--         </div>-->
   <!--         <div class="delivery-box">-->
   <!--            <img src="{{url('public/website/images/icon03.png')}}" alt="img">-->
   <!--            <h4> Cook </h4>-->
               
   <!--         </div>-->
   <!--         <div class="delivery-box arro-remove">-->
   <!--            <img src="{{url('public/website/images/icon04.png')}}" alt="img">-->
   <!--            <h4> Eat </h4>-->
              
   <!--         </div>-->
   <!--      </div>-->
   <!--   </div>-->
   <!--</div>-->


    <!--- second form start -->

    <div class="form-two-wrapper padd-100 float-start w-100">
      <!-- <div class="section-heading">
         <h4>GET IN TOUCH</h4>
      </div> -->
    
      <div class="container position-relative">
         <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
               <div class="form-two">
                     <div class="mx-auto wow fadeInUp" data-wow-delay="0.1s">
      <div class="heading-title">
            <h4>GET IN <span class="color-slider">TOUCH</span></h4>
            <p>Reach out to us for queries or feedback</p>
            </div>
            
         </div>
                  <form id="contactUsForm" method="POST" action="{{route('ContactUs')}}">
                     {{@csrf_field()}}
                     <div class="mb-3">
                         <label>Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Your Name" aria-label="Enter Your Name">
                     </div>
                     <div class="mb-3">
                         <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter Your Email">
                     </div>
                     <div class="mb-3">
                         <label>Phone</label>
                        <input type="text" name="phone" class="form-control" maxlength="10" placeholder="Enter Your phone no" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');" 
                           >
                     </div>
                     <div class="mb-3">
                         <label>Message</label>
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
            <div class="col-md-6">
                <div class="center-img text-center">
                        <img class="img-fluid" src="{{url('public/webimg/new-8.webp')}}" alt="egg" width="100%">
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
            $('.owl-carousel-home').owlCarousel({
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
<script>

     var swiper3 = new Swiper(".heroThumbSwiper", {
                loop: true,
                spaceBetween: 30,
                slidesPerView: 3,
                direction:"vertical",
                freeMode: true,
                watchSlidesProgress: true,
            });
            var swiper2 = new Swiper(".heroMainSwiper", {
                loop: true,
                spaceBetween: 10,
                cssMode: true,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                thumbs: {
                    swiper: swiper3,
                },
            });
            
             
            


var swiper = new Swiper('.product-slider', {
    spaceBetween: 30,
    effect: 'fade',
    // initialSlide: 2,
    loop: false,
    navigation: {
        nextEl: '.next',
        prevEl: '.prev'
    },
    // mousewheel: {
    //     // invert: false
    // },
    on: {
        init: function () {
            var index = this.activeIndex;

            var target = $('.product-slider__item').eq(index).data('target');

            console.log(target);

            $('.product-img__item').removeClass('active');
            $('.product-img__item#' + target).addClass('active');
        }
    }

});

swiper.on('slideChange', function () {
    var index = this.activeIndex;

    var target = $('.product-slider__item').eq(index).data('target');

    console.log(target, 'click');

    $('.product-img__item').removeClass('active');
    $('.product-img__item#' + target).addClass('active');

    if (swiper.isEnd) {
        $('.prev').removeClass('disabled');
        $('.next').addClass('disabled');
    } else {
        $('.next').removeClass('disabled');
    }

    if (swiper.isBeginning) {
        $('.prev').addClass('disabled');
    } else {
        $('.prev').removeClass('disabled');
    }
});

$(".js-fav").on("click", function () {
    $(this).find('.heart').toggleClass("is-active");
});
</script>
<script>
   $(document).ready(function(){
      (function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();
    
    
    // Initiate the wowjs
    new WOW().init();


    // Fixed Navbar
    $(window).scroll(function () {
        if ($(window).width() < 992) {
            if ($(this).scrollTop() > 45) {
                $('.fixed-top').addClass('bg-white shadow');
            } else {
                $('.fixed-top').removeClass('bg-white shadow');
            }
        } else {
            if ($(this).scrollTop() > 45) {
                $('.fixed-top').addClass('bg-white shadow').css('top', -45);
            } else {
                $('.fixed-top').removeClass('bg-white shadow').css('top', 0);
            }
        }
    });
    
    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        margin: 25,
        loop: true,
        center: true,
        dots: false,
        nav: true,
        navText : [
            '<i class="bi bi-chevron-left"></i>',
            '<i class="bi bi-chevron-right"></i>'
        ],
        responsive: {
            0:{
                items:1
            },
            768:{
                items:2
            },
            992:{
                items:3
            }
        }
    });

    
})(jQuery);


   });
</script>


@endsection()


   