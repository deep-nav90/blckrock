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
   <title>@yield('title')</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <!--Template style -->
   <link rel="stylesheet" type="text/css" href="{{url('public/website/css/animate.css')}}" />
   <link rel="stylesheet" type="text/css" href="{{url('public/website/css/animate.min.css')}}" />
   <link rel="stylesheet" type="text/css" href="{{url('public/website/css/bootstrap.min.css')}}" />
   <link rel="stylesheet" type="text/css" href="{{url('public/website/css/fonts.css')}}" />
   <link rel="stylesheet" type="text/css" href="{{url('public/website/css/font-awesome.css')}}" />
   <link rel="stylesheet" type="text/css" href="{{url('public/website/css/magnific-popup.css')}}" />
   <link rel="stylesheet" type="text/css" href="{{url('public/website/css/owl.carousel.min.css')}}" />
   <link rel="stylesheet" type="text/css" href="{{url('public/website/css/owl.theme.default.min.css')}}" />
   <link rel="stylesheet" type="text/css" href="{{url('public/website/css/tabs.css')}}" />
   <link rel="stylesheet" type="text/css" href="{{url('public/website/css/style.css')}}" />
   <link rel="stylesheet" type="text/css" href="{{url('public/website/css/responsive.css')}}" />
   <link rel="stylesheet" type="text/css" href="{{url('public/website/css/custom.css')}}" />
   <!--favicon-->
   <link rel="shortcut icon" type="image/png" href="{{url('public/website/images/fav-icon.png')}}" />

   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>


</head>

<?php 
   $dropdownCats = App\Models\Category::whereDeletedAt(null)->whereStatus('Active')->get();
?>

<body>
   <div id="preloader">
      <div id="status">
         <img src="{{url('public/website/images/loader.gif')}}" id="preloader_image" alt="loader">
      </div>
   </div>
   <!-- top to return -->
   <a href="javascript:;" id="return-to-top" class="change-bg2"> <i class="fas fa-angle-double-up"></i></a>
   <!-- header start -->
   <div class="main-header-wrapper1 float_left">

      <div class="sb-main-header1">
         <div class="menu-items-wrapper menu-item-wrapper3 d-xl-block d-lg-block d-md-none d-sm-none d-none">
            <div class="top-header-wrapper float_left">
               <div class="container">
                  <div class="row">
                     <div class="col-md-9 col-sm-9 col-xs-6">
                        <ul class="contact-details">
                           <li class="hidden-xs"><a href="#">Family Butchers Est. 1901</a>
                           </li>
                           <li><a href="#"><i class="fa fa-phone"></i> <b>+91 8288800857</b> (Open Right Now)</a>
                           </li>
                           <li class="hidden-xs"><a href="#"><i
                                    class="fa fa-paper-plane-o"></i>&nbsp;&nbsp;info@example.com</a>
                           </li>
                        </ul>
                     </div>
                     <div class="col-md-3 col-sm-3 col-xs-6">
                        @if(Auth::guard('web')->user())
                        

                        <div class="dropdown">

                        <ul class="social-list">


                        <li>
                           <div class="dropdown">
                              <a class="dropdown-toggle" href="javascript:void(0);" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="fa fa-user" aria-hidden="true"></i>
                              {{Auth::guard('web')->user()->full_name}} 
                              </a>

                              <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                 
                                 <li><a class="dropdown-item clickOnDropDownNavBar" href="javascript:void(0);" id="myAccount">My Account</a></li>
                                 <li><a class="dropdown-item clickOnDropDownNavBar"  href="javascript:void(0);" id="myOrders">My Orders</a></li>
                                 <li><a class="dropdown-item clickOnDropDownNavBar"  href="javascript:void(0);" id="myNotifications">Notifications</a></li>
                                 <li><a class="dropdown-item clickOnDropDownNavBar"  href="javascript:void(0);" id="navChangePassword">Change Password</a></li>
                                 <li><a class="dropdown-item clickOnDropDownNavBar" href="javascript:void(0);" id="logoutBtn">Logout</a></li>
                              </ul>
                           </div>
                        </li>


                          
                           
                        </ul>
                        
                           
                        </div>

                        
                        @else
                        <ul class="social-list">
                           <li>
                              <a href="{{route('loginWeb')}}"><i class="fa fa-user" aria-hidden="true"></i>
                                 Login</a>
                           </li>
                        </ul>
                        @endif()
                     </div>
                  </div>
               </div>
            </div>
            <div class="float_left">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-12 col-md-12">
                        <div class="index1-logo">
                           <a href="{{route('index')}}">
                              <img src="{{url('public/webimg/newlogo.png')}}" alt="logo">
                           </a>
                        </div>
                        <nav class="navbar navbar-expand-lg">
                           <ul class="navbar-nav">
                           <!-- <li class="nav-item categorySelectLi">
                              <select class="form-select categorySelect" aria-label="category">
                                 <option class="optionCategorySelect" value="0" data-id="" selected>Select Category</option>
                                 @foreach($dropdownCats as $dropdownCat)
                                 <option class="optionCategorySelect" data-id="{{$dropdownCat->id}}" value="{{$dropdownCat->id}}">{{$dropdownCat->category_name}}</option>
                                 @endforeach()
                              </select>
                           </li> -->

                              <li class="nav-item  menu-click5 ps-rel">
                                 <a class="nav-link" href="{{route('index')}}">Home</a>
                                 
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="javascript:void(0);">About</a>
                              </li>

                              <!-- <li class="nav-item menu-click4 ps-rel">
                                 <a class="nav-link" href="javascript:;">Shortcodes
                                    <span><i class="fas fa-chevron-down"></i></span>
                                 </a>
                                 <ul class="dropdown-items menu-open4">
                                    <li class="megamenu-wrapper">
                                       <div class="megamenu-list">
                                          <h5>Shortcode (1)</h5>
                                          <a href="accordion.html">Accordian</a>
                                          <a href="client.html">Client</a>
                                          <a href="counter.html">Counter</a>
                                          <a href="form.html">Form</a>
                                          <a href="gallery.html">Gallery</a>
                                       </div>
                                       <div class="megamenu-list">
                                          <h5>Shortcode (2)</h5>
                                          <a href="alert.html">Alert</a>
                                          <a href="icon.html">Icon</a>
                                          <a href="list.html">List</a>
                                          <a href="pricing.html">Pricing</a>
                                          <a href="social-icon.html">Social Icon</a>
                                       </div>
                                       <div class="megamenu-list">
                                          <h5>Shortcode (3)</h5>
                                          <a href="button.html">Button</a>
                                          <a href="tab.html">Tabs</a>
                                          <a href="team.html">Team</a>
                                          <a href="testimonial.html">Testimonial</a>
                                       </div>
                                    </li>
                                 </ul>
                              </li> -->

                              <li class="nav-item menu-click3 ps-rel">
                                 <a class="nav-link" href="{{route('allProducts')}}">Shop <span>
                                    <!-- <i
                                          class="fas fa-chevron-down"></i> -->
                                       </span></a>
                                <!--  <ul class="dropdown-items menu-open3">
                                    <li><a href="product.html">Product</a></li>
                                    <li><a href="product-left-sidebar.html">Product Left Sidebar</a></li>
                                    <li><a href="product-right-sidebar.html">Product Right Sidebar</a></li>
                                    <li><a href="product-single.html"> Product Single</a></li>
                                    <li><a href="checkout.html"> Checkout</a></li>
                                 </ul> -->
                              </li>
                              <li class="nav-item menu-click3 ps-rel">
                                 <a class="nav-link" >Our Product <span>
                                    <i class="fas fa-chevron-down"></i>
                                       </span></a>
                                 <ul class="dropdown-items menu-open3">
                                 @foreach($dropdownCats as $dropdownCat)
                                 <li><a data-id="{{$dropdownCat->id}}" href="javascrip:void(0)">{{$dropdownCat->category_name}}</a></li>
                                 <!-- <option class="optionCategorySelect" data-id="{{$dropdownCat->id}}" value="{{$dropdownCat->id}}">{{$dropdownCat->category_name}}</option> -->
                                 @endforeach()
                                    
                                 </ul>
                              </li>
                              <li class="nav-item menu-click ps-rel">
                                 <a class="nav-link" href="javascript:;">Blog
                                    <span><i class="fas fa-chevron-down"></i></span>
                                 </a>
                                 <ul class="dropdown-items menu-open">
                                    <li>
                                       <a href="javascript:;">Blog Category <span><i
                                                class="fas fa-chevron-right"></i></span></a>
                                       <ul class="sub-dropdown">
                                          <li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
                                          <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                                       </ul>
                                    </li>
                                    <li>
                                       <a href="javascript:;">Blog Single <span><i
                                                class="fas fa-chevron-right"></i></span></a>
                                       <ul class="sub-dropdown">
                                          <li><a href="blog-single-left-sidebar.html">Blog Single Left Sidebar</a></li>
                                          <li><a href="blog-single-right-sidebar.html">Blog Single Right Sidebar</a>
                                          </li>

                                       </ul>
                                    </li>
                                 </ul>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="javascript:void(0);">Store</a>
                              </li>

                              <li class="nav-item menu-click1 ps-rel">
                                 <a class="nav-link" href="javascript:;"><i class="far fa-dot-circle haveCartItem" hidden>&nbsp;</i>Cart &nbsp;<i class="fa fa-shopping-cart"
                                       aria-hidden="true"></i></a>

                                 <ul class="dropdown-items menu-open1 cartUL">

                                    
                                   

                                    
                                    <!-- <li>
                                       <span>1 Item</span>
                                       <a href="javascript:;"> View Cart</a>
                                    </li>
                                    <li class="cart_list">
                                       <div class="select_cart">
                                          <a href="#">Bee Meat</a>
                                          <span>1 x $258.00</span>
                                       </div>
                                       <div class="select_img">
                                          <img alt="img" src="{{url('public/website/images/pm3.gif')}}">
                                          <div class="close_btn">
                                             <i class="fa fa-times"></i>
                                          </div>
                                       </div>
                                    </li>
                                    <li class="sub_total">
                                       <p>Sub Total:<span>$ 289.00</span></p>
                                    </li>
                                    <li class="cart_btn">
                                       <a href="cart.html"><i class="fas fa-shopping-cart"></i>&nbsp; View Cart</a>
                                       <a href="checkout.html"><i class="fas fa-share"></i>&nbsp; Checkout</a>
                                    </li> -->
                                 </ul>

                              </li>
                           </ul>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- responsive menu bar start -->
         <div class="mobile-menu-wrapper d-xl-none d-lg-none d-md-block d-sm-block">
            <div class="container">
               <div class="row">
                  <div class=" col-md-4 col-sm-4 col-6">
                     <div class="mobile-logo">
                        <a href="{{route('index')}}">
                           <img src="{{url('public/website/images/logo.jpg')}}" alt="logo">
                        </a>
                     </div>
                  </div>
                  <div class="col-md-8 col-sm-8 col-6">
                     <div class="d-flex  justify-content-end">
                        <div class="social-media-icons">
                           <ul>
                              <li class="login-btn">
                                 <a href="javascript:;">
                                    <i class="far fa-dot-circle haveCartItem" hidden>&nbsp;</i>
                                    Cart<span><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                                 </a>
                                 <div class="user-text cartULMobile">
                                    
                                 </div>
                              </li>
                           </ul>
                        </div>
                        <div class="d-flex align-items-center">
                           <div class="toggle-main-wrapper mt-2" id="sidebar-toggle">
                              <span class="line"></span>
                              <span class="line"></span>
                              <span class="line"></span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div id="sidebar">
            <div class="sidebar_logo">
               <a href="{{route('index')}}"><img src="{{url('public/website/images/logo.jpg')}}" alt="img"></a>
            </div>
            <div id="toggle_close">&times;</div>
            <div id='cssmenu'>
               <ul class="float_left">
                  <li class="has-sub">
                     <a href="{{route('index')}}">Home</a>
                     
                  </li>
                  <li><a href="javascript:void(0);">about</a></li>

                  <li class="has-sub">
                     <a href="{{route('allProducts')}}">Shop</a>
                     <!-- <ul>
                        <li><a href="{{route('allProducts')}}">Product</a></li>
                        <li><a href="product-left-sidebar.html">Product Left Sidebar</a></li>
                        <li><a href="jproduct-right-sidebar.html">Product Right Sidebar</a></li>
                        <li><a href="product-single.html">Product Single</a></li>
                        <li><a href="checkout.html">Checkout</a></li>
                     </ul> -->
                  </li>
                  <li class="has-sub">
                     <a href="javascript:void(0);">Blog</a>
                    <!--  <ul>
                        <li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
                        <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                        <li><a href="blog-single-left-sidebar.html">Blog Single Left Sidebar</a></li>
                        <li><a href="blog-single-right-sidebar.html">Blog Single Right Sidebar</a></li>
                     </ul> -->
                  </li>
                  <li class="border-none"><a href="javascript:void(0);">Store</a></li>
               </ul>
            </div>
         </div>
         <!-- responsive menu End -->
      </div>
   </div>
   <!-- header end -->