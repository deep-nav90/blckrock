@extends('website.layout.layout')
@section('title','Food Court')

@section('content')
  <!-- banner section start start-->
  <div class=" float_left ptb-10">
      <div class="">
         <!-- 2 -->
         <div style="width:100%;margin: 40px auto;background:#eee;"><div id="carouselExampleControls" class="carousel slide newcarousal" data-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <img class="d-block w-100"src="{{url('public/webimg/ban4.webp')}}" alt="First slide">
                  </div>
                  <div class="carousel-item">
                     <img class="d-block w-100" src="{{url('public/webimg/ban2.webp')}}" alt="Second slide">
                  </div>
                  <div class="carousel-item">
                     <img class="d-block w-100" src="{{url('public/webimg/ban3.webp')}}" alt="Third slide">
                  </div>
               </div>
               <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
               </a>
               <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
               </a>
               </div>
               </div>
         <!-- end 2 -->
           
        
      </div>
   </div>
   <!-- banner section start end-->
   <div class="about-sec-wrapper float_left ptb-100">
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
                  <a class="custom-btn" href="#">Read More</a>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="home-delivery-sec-wrapper float_left">
      <div class="container">
         <div class="heading-title">
            <h4>Home Delivery</h4>
            <p>know about our delivery processes</p>
            <img class="img-fluid" src="{{url('public/website/images/line-yal.png')}}" alt="img">
         </div>
         <div class="delivery-main-wrapper">
            <div class="delivery-box">
               <img src="{{url('public/website/images/icon01.png')}}" alt="img">
               <h4> Choose </h4>
               <p>Nunc elementum purus ex iaculis elfend. Curabitur bibendum odio</p>
            </div>
            <div class="delivery-box">
               <img src="{{url('public/website/images/icon02.png')}}" alt="img">
               <h4> Recieve </h4>
               <p>Aunc elementum purus ex iaculis elfend. Curabitur bibendum odio</p>
            </div>
            <div class="delivery-box">
               <img src="{{url('public/website/images/icon03.png')}}" alt="img">
               <h4> Cook </h4>
               <p>Nunc elementum purus ex iaculis elfend. Curabitur bibendum odio</p>
            </div>
            <div class="delivery-box arro-remove">
               <img src="{{url('public/website/images/icon04.png')}}" alt="img">
               <h4> Eat </h4>
               <p>Aunc elementum purus ex iaculis elfend. Curabitur bibendum odio</p>
            </div>
         </div>
      </div>
   </div>
   <div class="product-filter-main-wrapper float_left ptb-20">
      <div class="container">
         <div class="heading-title">
            <h4>Our Product's</h4>
            <p>know about our delivery processes</p>
            <img class="img-fluid" src="{{url('public/website/images/line-yal.png')}}" alt="img">
         </div>
         <div class="row">
            <div class="col-lg-3 col-md-3 col-12">
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
            <div class="col-lg-9 col-md-9 col-12">
               <div class="custom-tbs-content float_left">
                  @if(count($categories) > 0)
                  @foreach($categories as $category)
                  <div id="{{$category->category_name}}" class="tabcontent">
                     <div class="product-new-filter-block">
                        @if(count($category->topThreeProducts) > 0)
                        <?php $m = 1;?>
                        @foreach($category->topThreeProducts as $product)

                        @if($m <= 3)
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
                                 $limit = 70;
                                 if(strlen($product->meta_description) > $limit){
                                    $show_description = substr($product->meta_description, 0, $limit) . " ...";
                                 }else{
                                    $show_description = $product->meta_description;
                                 }
                                 ?>
                              <p class="product-text">
                                 <span class="text_view">{{$show_description}}</span>
                                 @if(strlen($product->meta_description) > $limit)
                                 <!-- <span class="read_more" less_read="{{$show_description}}" full_read = "{{$product->meta_description}}">Read More</span> -->
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

   <div class="our-butchery-wrapper float_left">
      <div class="container">
         <div class="row">
            <div class="col-lg-5 col-md-12 col-sm-12">
               <div class="about-text float_left">
                  <h4>Our Process</h4>
                  <p>we are committed to total transparency about our products.</p>
               </div>
               <div class="div_line-yal2">
                  <img class="img-fluid" src="{{url('public/website/images/line-yal.png')}}" alt="img">
               </div>
               <div class="div_p">
                  <p class="p1">The Black Rooster India brings you the goodness of Kadaknath eggs – low on fat, high on protein, and a cholesterol-friendly choice.The primary aim for us is to reach as many people as we can and make this delectable and healthy poultry available to them. Our passion and devotion to providing a healthier alternative to people & our sense of patriotic pride makes us want our own domestic breed to be the front runner at the global scale.
                  </p>
                  <br>
                  <p class="p1">Taking up the mantle of being the biggest provider of the best quality & healthy produce is a big responsibility for us. We believe in breeding the birds ourselves in order to maintain the highest standards of hygiene on our completely organic farm. Our farm size is growing rapidly. We have our own hatchery & a feed processing plant that prepares the feed strictly according to the nutritional requirements of Kadaknath bird.
                  </p>
                  <a class="custom-btn" href="#">Read More</a>
               </div>
            </div>
            <div class="col-lg-7 col-md-12 col-sm-12">
               <div class="about-img-block">
                  <figure class="img1">
                     <img class="img-fluid" src="{{url('public/webimg/sideegg.webp')}}" alt="img">
                  </figure>
                  <!-- <figure class="img2">
                     <img class="img-fluid doubleImg" src="{{url('public/website/images/banner7.jpg')}}" alt="img">
                  </figure> -->
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- 
   <div class="team-client-main-wrapper float_left ptb-100">
      <div class="container">
         <div class="heading-title">
            <h4>Our Butcher Team</h4>
            <p>know about our delivery processes</p>
            <img class="img-fluid" src="{{url('public/website/images/line-yal.png')}}" alt="img">
         </div>
         <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6">
               <div class="team-box-wrapper">
                  <div class="team-img">
                     <img class="img-fluid" src="{{url('public/website/images/userc1.jpg')}}" alt="img">
                  </div>
                  <div class="team-text">
                     <h4> <a href="team-single.html">Shams Tabrez</a> </h4>
                     <p>OWNER</p>
                     <ul class="social-tag">
                        <li>
                           <a href="javascript:;">
                              <span>
                                 <svg viewBox="0 0 25 48" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g id="Page-1" stroke="none">
                                       <g id="Social-Icons---Isolated1" transform="translate(-176.000000, -55.000000)">
                                          <path
                                             d="M200.78439,55.3395122 L200.78439,62.9141463 L196.28878,62.9258537 C192.764878,62.9258537 192.085854,64.6 192.085854,67.0468293 L192.085854,72.4673171 L200.48,72.4673171 L199.39122,80.9434146 L192.085854,80.9434146 L192.085854,103 L183.329951,103 L183.329951,80.9434146 L176,80.9434146 L176,72.4673171 L183.329951,72.4673171 L183.329951,66.2156098 C183.329951,58.9570732 187.754146,55 194.24,55 C197.331902,55 200,55.2341463 200.78439,55.3395122 Z"
                                             id="Facebook"></path>
                                       </g>
                                    </g>
                                 </svg>
                              </span>
                           </a>
                        </li>
                        <li>
                           <a href="javascript:;">
                              <span>
                                 <svg version="1.1" id="Capa_14" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"
                                    style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                    <path d="M512,97.248c-19.04,8.352-39.328,13.888-60.48,16.576c21.76-12.992,38.368-33.408,46.176-58.016
                                                c-20.288,12.096-42.688,20.64-66.56,25.408C411.872,60.704,384.416,48,354.464,48c-58.112,0-104.896,47.168-104.896,104.992
                                                c0,8.32,0.704,16.32,2.432,23.936c-87.264-4.256-164.48-46.08-216.352-109.792c-9.056,15.712-14.368,33.696-14.368,53.056
                                                c0,36.352,18.72,68.576,46.624,87.232c-16.864-0.32-33.408-5.216-47.424-12.928c0,0.32,0,0.736,0,1.152
                                                c0,51.008,36.384,93.376,84.096,103.136c-8.544,2.336-17.856,3.456-27.52,3.456c-6.72,0-13.504-0.384-19.872-1.792
                                                c13.6,41.568,52.192,72.128,98.08,73.12c-35.712,27.936-81.056,44.768-130.144,44.768c-8.608,0-16.864-0.384-25.12-1.44
                                                C46.496,446.88,101.6,464,161.024,464c193.152,0,298.752-160,298.752-298.688c0-4.64-0.16-9.12-0.384-13.568
                                                C480.224,136.96,497.728,118.496,512,97.248z"></path>
                                 </svg>
                              </span>
                           </a>
                        </li>
                        <li>
                           <a href="javascript:;">
                              <span>
                                 <svg version="1.1" id="Capa_12" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    viewBox="0 0 475.092 475.092" style="enable-background:new 0 0 475.092 475.092;"
                                    xml:space="preserve">
                                    <g>
                                       <g>
                                          <path
                                             d="M273.372,302.498c-5.041-6.762-10.608-13.045-16.7-18.842c-6.091-5.804-12.183-11.088-18.271-15.845
                                                      c-6.092-4.757-11.659-9.329-16.702-13.709c-5.042-4.374-9.135-8.945-12.275-13.702c-3.14-4.757-4.711-9.61-4.711-14.558
                                                      c0-6.855,2.19-13.278,6.567-19.274c4.377-5.996,9.707-11.799,15.986-17.417c6.28-5.617,12.559-11.753,18.844-18.415
                                                      c6.276-6.665,11.604-15.465,15.985-26.412c4.373-10.944,6.563-23.458,6.563-37.542c0-16.75-3.713-32.835-11.136-48.25
                                                      c-7.423-15.418-17.89-27.412-31.405-35.976h38.54L303.2,0H178.441c-17.699,0-35.498,1.906-53.384,5.72
                                                      c-26.453,5.9-48.723,19.368-66.806,40.397C40.171,67.15,31.129,90.99,31.129,117.637c0,28.171,10.138,51.583,30.406,70.233
                                                      c20.269,18.649,44.585,27.978,72.945,27.978c5.71,0,12.371-0.478,19.985-1.427c-0.381,1.521-1.043,3.567-1.997,6.136
                                                      s-1.715,4.62-2.286,6.14c-0.57,1.521-1.047,3.375-1.425,5.566c-0.382,2.19-0.571,4.428-0.571,6.71
                                                      c0,12.563,6.086,26.744,18.271,42.541c-14.465,0.387-28.737,1.67-42.825,3.86c-14.084,2.19-28.833,5.616-44.252,10.28
                                                      c-15.417,4.661-29.217,11.42-41.396,20.27c-12.182,8.854-21.317,19.366-27.408,31.549C3.533,361.559,0.01,374.405,0.01,386.017
                                                      c0,12.751,2.857,24.314,8.565,34.69c5.708,10.369,13.035,18.842,21.982,25.406c8.945,6.57,19.273,12.083,30.978,16.562
                                                      c11.704,4.47,23.315,7.659,34.829,9.562c11.516,1.903,22.888,2.854,34.119,2.854c51.007,0,90.981-12.464,119.909-37.397
                                                      c26.648-23.223,39.971-50.062,39.971-80.517c0-10.855-1.57-20.984-4.712-30.409C282.51,317.337,278.42,309.254,273.372,302.498z
                                                      M163.311,198.722c-9.707,0-18.937-2.475-27.694-7.426c-8.757-4.95-16.18-11.374-22.27-19.273
                                                      c-6.088-7.898-11.418-16.796-15.987-26.695c-4.567-9.896-7.944-19.792-10.135-29.692c-2.19-9.895-3.284-19.318-3.284-28.265
                                                      c0-18.271,4.854-33.974,14.562-47.108c9.705-13.134,23.411-19.701,41.112-19.701c12.563,0,23.935,3.899,34.118,11.704
                                                      c10.183,7.804,18.177,17.701,23.984,29.692c5.802,11.991,10.277,24.407,13.417,37.257c3.14,12.847,4.711,24.983,4.711,36.403
                                                      c0,19.036-4.139,34.317-12.419,45.833C195.144,192.964,181.775,198.722,163.311,198.722z M242.251,413.123
                                                      c-5.23,8.949-12.319,15.94-21.267,20.981c-8.946,5.048-18.509,8.758-28.693,11.14c-10.183,2.385-20.889,3.572-32.12,3.572
                                                      c-12.182,0-24.27-1.431-36.258-4.284c-11.99-2.851-23.459-7.187-34.403-12.991c-10.944-5.8-19.795-13.798-26.551-23.982
                                                      c-6.757-10.184-10.135-21.744-10.135-34.69c0-11.419,2.568-21.601,7.708-30.55c5.142-8.945,11.709-16.084,19.702-21.408
                                                      c7.994-5.332,17.319-9.713,27.979-13.131c10.66-3.433,20.937-5.808,30.833-7.139c9.895-1.335,19.985-1.995,30.262-1.995
                                                      c6.283,0,11.043,0.191,14.277,0.567c1.143,0.767,4.043,2.759,8.708,5.996s7.804,5.428,9.423,6.57
                                                      c1.615,1.137,4.567,3.326,8.85,6.563c4.281,3.237,7.327,5.661,9.135,7.279c1.803,1.618,4.421,4.045,7.849,7.279
                                                      c3.424,3.237,5.948,6.043,7.566,8.422c1.615,2.378,3.616,5.28,5.996,8.702c2.38,3.433,4.043,6.715,4.998,9.855
                                                      c0.948,3.142,1.854,6.567,2.707,10.277c0.855,3.72,1.283,7.569,1.283,11.57C250.105,393.713,247.487,404.182,242.251,413.123z" />
                                          <polygon
                                             points="401.998,73.089 401.998,0 365.449,0 365.449,73.089 292.358,73.089 292.358,109.636 365.449,109.636 
                                                      365.449,182.725 401.998,182.725 401.998,109.636 475.081,109.636 475.081,73.089      " />
                                       </g>
                                    </g>
                                 </svg>
                              </span>
                           </a>
                        </li>
                        <li>
                           <a href="javascript:;">
                              <span>
                                 <svg xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision"
                                    text-rendering="geometricPrecision" image-rendering="optimizeQuality"
                                    fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 640 640">
                                    <path
                                       d="M228.582 205.715h126.462v64.832h1.83c17.611-31.595 60.675-64.832 124.892-64.832C615.303 205.715 640 288.818 640 396.926v220.219H508.116V421.93c0-46.536-.969-106.442-68.576-106.442-68.67 0-79.194 50.658-79.194 103.052v198.605H228.581v-411.43zM137.152 91.43c0 37.855-30.721 68.576-68.576 68.576-37.855 0-68.587-30.721-68.587-68.576 0-37.855 30.732-68.576 68.587-68.576 37.855 0 68.576 30.721 68.576 68.576zM-.011 205.715h137.163v411.43H-.011v-411.43z" />
                                 </svg>
                              </span>
                           </a>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
               <div class="team-box-wrapper">
                  <div class="team-img">
                     <img class="img-fluid" src="{{url('public/website/images/userc2.jpg')}}" alt="img">
                  </div>
                  <div class="team-text">
                     <h4> <a href="team-single.html">Jhon Doe</a> </h4>
                     <p>SNR. BUTCHER</p>
                     <ul class="social-tag">
                        <li>
                           <a href="javascript:;">
                              <span>
                                 <svg viewBox="0 0 25 48" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g id="Page-2" stroke="none">
                                       <g id="Social-Icons---Isolated2" transform="translate(-176.000000, -55.000000)">
                                          <path
                                             d="M200.78439,55.3395122 L200.78439,62.9141463 L196.28878,62.9258537 C192.764878,62.9258537 192.085854,64.6 192.085854,67.0468293 L192.085854,72.4673171 L200.48,72.4673171 L199.39122,80.9434146 L192.085854,80.9434146 L192.085854,103 L183.329951,103 L183.329951,80.9434146 L176,80.9434146 L176,72.4673171 L183.329951,72.4673171 L183.329951,66.2156098 C183.329951,58.9570732 187.754146,55 194.24,55 C197.331902,55 200,55.2341463 200.78439,55.3395122 Z"
                                             id="Facebook2"></path>
                                       </g>
                                    </g>
                                 </svg>
                              </span>
                           </a>
                        </li>
                        <li>
                           <a href="javascript:;">
                              <span>
                                 <svg version="1.1" id="Capa_145" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"
                                    style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                    <path d="M512,97.248c-19.04,8.352-39.328,13.888-60.48,16.576c21.76-12.992,38.368-33.408,46.176-58.016
                                                c-20.288,12.096-42.688,20.64-66.56,25.408C411.872,60.704,384.416,48,354.464,48c-58.112,0-104.896,47.168-104.896,104.992
                                                c0,8.32,0.704,16.32,2.432,23.936c-87.264-4.256-164.48-46.08-216.352-109.792c-9.056,15.712-14.368,33.696-14.368,53.056
                                                c0,36.352,18.72,68.576,46.624,87.232c-16.864-0.32-33.408-5.216-47.424-12.928c0,0.32,0,0.736,0,1.152
                                                c0,51.008,36.384,93.376,84.096,103.136c-8.544,2.336-17.856,3.456-27.52,3.456c-6.72,0-13.504-0.384-19.872-1.792
                                                c13.6,41.568,52.192,72.128,98.08,73.12c-35.712,27.936-81.056,44.768-130.144,44.768c-8.608,0-16.864-0.384-25.12-1.44
                                                C46.496,446.88,101.6,464,161.024,464c193.152,0,298.752-160,298.752-298.688c0-4.64-0.16-9.12-0.384-13.568
                                                C480.224,136.96,497.728,118.496,512,97.248z"></path>
                                 </svg>
                              </span>
                           </a>
                        </li>
                        <li>
                           <a href="javascript:;">
                              <span>
                                 <svg version="1.1" id="Capa_13" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    viewBox="0 0 475.092 475.092" style="enable-background:new 0 0 475.092 475.092;"
                                    xml:space="preserve">
                                    <g>
                                       <g>
                                          <path
                                             d="M273.372,302.498c-5.041-6.762-10.608-13.045-16.7-18.842c-6.091-5.804-12.183-11.088-18.271-15.845
                                                      c-6.092-4.757-11.659-9.329-16.702-13.709c-5.042-4.374-9.135-8.945-12.275-13.702c-3.14-4.757-4.711-9.61-4.711-14.558
                                                      c0-6.855,2.19-13.278,6.567-19.274c4.377-5.996,9.707-11.799,15.986-17.417c6.28-5.617,12.559-11.753,18.844-18.415
                                                      c6.276-6.665,11.604-15.465,15.985-26.412c4.373-10.944,6.563-23.458,6.563-37.542c0-16.75-3.713-32.835-11.136-48.25
                                                      c-7.423-15.418-17.89-27.412-31.405-35.976h38.54L303.2,0H178.441c-17.699,0-35.498,1.906-53.384,5.72
                                                      c-26.453,5.9-48.723,19.368-66.806,40.397C40.171,67.15,31.129,90.99,31.129,117.637c0,28.171,10.138,51.583,30.406,70.233
                                                      c20.269,18.649,44.585,27.978,72.945,27.978c5.71,0,12.371-0.478,19.985-1.427c-0.381,1.521-1.043,3.567-1.997,6.136
                                                      s-1.715,4.62-2.286,6.14c-0.57,1.521-1.047,3.375-1.425,5.566c-0.382,2.19-0.571,4.428-0.571,6.71
                                                      c0,12.563,6.086,26.744,18.271,42.541c-14.465,0.387-28.737,1.67-42.825,3.86c-14.084,2.19-28.833,5.616-44.252,10.28
                                                      c-15.417,4.661-29.217,11.42-41.396,20.27c-12.182,8.854-21.317,19.366-27.408,31.549C3.533,361.559,0.01,374.405,0.01,386.017
                                                      c0,12.751,2.857,24.314,8.565,34.69c5.708,10.369,13.035,18.842,21.982,25.406c8.945,6.57,19.273,12.083,30.978,16.562
                                                      c11.704,4.47,23.315,7.659,34.829,9.562c11.516,1.903,22.888,2.854,34.119,2.854c51.007,0,90.981-12.464,119.909-37.397
                                                      c26.648-23.223,39.971-50.062,39.971-80.517c0-10.855-1.57-20.984-4.712-30.409C282.51,317.337,278.42,309.254,273.372,302.498z
                                                      M163.311,198.722c-9.707,0-18.937-2.475-27.694-7.426c-8.757-4.95-16.18-11.374-22.27-19.273
                                                      c-6.088-7.898-11.418-16.796-15.987-26.695c-4.567-9.896-7.944-19.792-10.135-29.692c-2.19-9.895-3.284-19.318-3.284-28.265
                                                      c0-18.271,4.854-33.974,14.562-47.108c9.705-13.134,23.411-19.701,41.112-19.701c12.563,0,23.935,3.899,34.118,11.704
                                                      c10.183,7.804,18.177,17.701,23.984,29.692c5.802,11.991,10.277,24.407,13.417,37.257c3.14,12.847,4.711,24.983,4.711,36.403
                                                      c0,19.036-4.139,34.317-12.419,45.833C195.144,192.964,181.775,198.722,163.311,198.722z M242.251,413.123
                                                      c-5.23,8.949-12.319,15.94-21.267,20.981c-8.946,5.048-18.509,8.758-28.693,11.14c-10.183,2.385-20.889,3.572-32.12,3.572
                                                      c-12.182,0-24.27-1.431-36.258-4.284c-11.99-2.851-23.459-7.187-34.403-12.991c-10.944-5.8-19.795-13.798-26.551-23.982
                                                      c-6.757-10.184-10.135-21.744-10.135-34.69c0-11.419,2.568-21.601,7.708-30.55c5.142-8.945,11.709-16.084,19.702-21.408
                                                      c7.994-5.332,17.319-9.713,27.979-13.131c10.66-3.433,20.937-5.808,30.833-7.139c9.895-1.335,19.985-1.995,30.262-1.995
                                                      c6.283,0,11.043,0.191,14.277,0.567c1.143,0.767,4.043,2.759,8.708,5.996s7.804,5.428,9.423,6.57
                                                      c1.615,1.137,4.567,3.326,8.85,6.563c4.281,3.237,7.327,5.661,9.135,7.279c1.803,1.618,4.421,4.045,7.849,7.279
                                                      c3.424,3.237,5.948,6.043,7.566,8.422c1.615,2.378,3.616,5.28,5.996,8.702c2.38,3.433,4.043,6.715,4.998,9.855
                                                      c0.948,3.142,1.854,6.567,2.707,10.277c0.855,3.72,1.283,7.569,1.283,11.57C250.105,393.713,247.487,404.182,242.251,413.123z" />
                                          <polygon
                                             points="401.998,73.089 401.998,0 365.449,0 365.449,73.089 292.358,73.089 292.358,109.636 365.449,109.636 
                                                      365.449,182.725 401.998,182.725 401.998,109.636 475.081,109.636 475.081,73.089      " />
                                       </g>
                                    </g>
                                 </svg>
                              </span>
                           </a>
                        </li>
                        <li>
                           <a href="javascript:;">
                              <span>
                                 <svg xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision"
                                    text-rendering="geometricPrecision" image-rendering="optimizeQuality"
                                    fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 640 640">
                                    <path
                                       d="M228.582 205.715h126.462v64.832h1.83c17.611-31.595 60.675-64.832 124.892-64.832C615.303 205.715 640 288.818 640 396.926v220.219H508.116V421.93c0-46.536-.969-106.442-68.576-106.442-68.67 0-79.194 50.658-79.194 103.052v198.605H228.581v-411.43zM137.152 91.43c0 37.855-30.721 68.576-68.576 68.576-37.855 0-68.587-30.721-68.587-68.576 0-37.855 30.732-68.576 68.587-68.576 37.855 0 68.576 30.721 68.576 68.576zM-.011 205.715h137.163v411.43H-.011v-411.43z" />
                                 </svg>
                              </span>
                           </a>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
               <div class="team-box-wrapper">
                  <div class="team-img">
                     <img class="img-fluid" src="{{url('public/website/images/userc3.jpg')}}" alt="img">
                  </div>
                  <div class="team-text">
                     <h4> <a href="team-single.html">Lisa Doe</a> </h4>
                     <p>SALES PERSONS</p>
                     <ul class="social-tag">
                        <li>
                           <a href="javascript:;">
                              <span>
                                 <svg viewBox="0 0 25 48" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g id="Page-3" stroke="none">
                                       <g id="Social-Icons---Isolated" transform="translate(-176.000000, -55.000000)">
                                          <path
                                             d="M200.78439,55.3395122 L200.78439,62.9141463 L196.28878,62.9258537 C192.764878,62.9258537 192.085854,64.6 192.085854,67.0468293 L192.085854,72.4673171 L200.48,72.4673171 L199.39122,80.9434146 L192.085854,80.9434146 L192.085854,103 L183.329951,103 L183.329951,80.9434146 L176,80.9434146 L176,72.4673171 L183.329951,72.4673171 L183.329951,66.2156098 C183.329951,58.9570732 187.754146,55 194.24,55 C197.331902,55 200,55.2341463 200.78439,55.3395122 Z"
                                             id="Facebook3"></path>
                                       </g>
                                    </g>
                                 </svg>
                              </span>
                           </a>
                        </li>
                        <li>
                           <a href="javascript:;">
                              <span>
                                 <svg version="1.1" id="Capa_146" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"
                                    style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                    <path d="M512,97.248c-19.04,8.352-39.328,13.888-60.48,16.576c21.76-12.992,38.368-33.408,46.176-58.016
                                                c-20.288,12.096-42.688,20.64-66.56,25.408C411.872,60.704,384.416,48,354.464,48c-58.112,0-104.896,47.168-104.896,104.992
                                                c0,8.32,0.704,16.32,2.432,23.936c-87.264-4.256-164.48-46.08-216.352-109.792c-9.056,15.712-14.368,33.696-14.368,53.056
                                                c0,36.352,18.72,68.576,46.624,87.232c-16.864-0.32-33.408-5.216-47.424-12.928c0,0.32,0,0.736,0,1.152
                                                c0,51.008,36.384,93.376,84.096,103.136c-8.544,2.336-17.856,3.456-27.52,3.456c-6.72,0-13.504-0.384-19.872-1.792
                                                c13.6,41.568,52.192,72.128,98.08,73.12c-35.712,27.936-81.056,44.768-130.144,44.768c-8.608,0-16.864-0.384-25.12-1.44
                                                C46.496,446.88,101.6,464,161.024,464c193.152,0,298.752-160,298.752-298.688c0-4.64-0.16-9.12-0.384-13.568
                                                C480.224,136.96,497.728,118.496,512,97.248z"></path>
                                 </svg>
                              </span>
                           </a>
                        </li>
                        <li>
                           <a href="javascript:;">
                              <span>
                                 <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    viewBox="0 0 475.092 475.092" style="enable-background:new 0 0 475.092 475.092;"
                                    xml:space="preserve">
                                    <g>
                                       <g>
                                          <path
                                             d="M273.372,302.498c-5.041-6.762-10.608-13.045-16.7-18.842c-6.091-5.804-12.183-11.088-18.271-15.845
                                                      c-6.092-4.757-11.659-9.329-16.702-13.709c-5.042-4.374-9.135-8.945-12.275-13.702c-3.14-4.757-4.711-9.61-4.711-14.558
                                                      c0-6.855,2.19-13.278,6.567-19.274c4.377-5.996,9.707-11.799,15.986-17.417c6.28-5.617,12.559-11.753,18.844-18.415
                                                      c6.276-6.665,11.604-15.465,15.985-26.412c4.373-10.944,6.563-23.458,6.563-37.542c0-16.75-3.713-32.835-11.136-48.25
                                                      c-7.423-15.418-17.89-27.412-31.405-35.976h38.54L303.2,0H178.441c-17.699,0-35.498,1.906-53.384,5.72
                                                      c-26.453,5.9-48.723,19.368-66.806,40.397C40.171,67.15,31.129,90.99,31.129,117.637c0,28.171,10.138,51.583,30.406,70.233
                                                      c20.269,18.649,44.585,27.978,72.945,27.978c5.71,0,12.371-0.478,19.985-1.427c-0.381,1.521-1.043,3.567-1.997,6.136
                                                      s-1.715,4.62-2.286,6.14c-0.57,1.521-1.047,3.375-1.425,5.566c-0.382,2.19-0.571,4.428-0.571,6.71
                                                      c0,12.563,6.086,26.744,18.271,42.541c-14.465,0.387-28.737,1.67-42.825,3.86c-14.084,2.19-28.833,5.616-44.252,10.28
                                                      c-15.417,4.661-29.217,11.42-41.396,20.27c-12.182,8.854-21.317,19.366-27.408,31.549C3.533,361.559,0.01,374.405,0.01,386.017
                                                      c0,12.751,2.857,24.314,8.565,34.69c5.708,10.369,13.035,18.842,21.982,25.406c8.945,6.57,19.273,12.083,30.978,16.562
                                                      c11.704,4.47,23.315,7.659,34.829,9.562c11.516,1.903,22.888,2.854,34.119,2.854c51.007,0,90.981-12.464,119.909-37.397
                                                      c26.648-23.223,39.971-50.062,39.971-80.517c0-10.855-1.57-20.984-4.712-30.409C282.51,317.337,278.42,309.254,273.372,302.498z
                                                      M163.311,198.722c-9.707,0-18.937-2.475-27.694-7.426c-8.757-4.95-16.18-11.374-22.27-19.273
                                                      c-6.088-7.898-11.418-16.796-15.987-26.695c-4.567-9.896-7.944-19.792-10.135-29.692c-2.19-9.895-3.284-19.318-3.284-28.265
                                                      c0-18.271,4.854-33.974,14.562-47.108c9.705-13.134,23.411-19.701,41.112-19.701c12.563,0,23.935,3.899,34.118,11.704
                                                      c10.183,7.804,18.177,17.701,23.984,29.692c5.802,11.991,10.277,24.407,13.417,37.257c3.14,12.847,4.711,24.983,4.711,36.403
                                                      c0,19.036-4.139,34.317-12.419,45.833C195.144,192.964,181.775,198.722,163.311,198.722z M242.251,413.123
                                                      c-5.23,8.949-12.319,15.94-21.267,20.981c-8.946,5.048-18.509,8.758-28.693,11.14c-10.183,2.385-20.889,3.572-32.12,3.572
                                                      c-12.182,0-24.27-1.431-36.258-4.284c-11.99-2.851-23.459-7.187-34.403-12.991c-10.944-5.8-19.795-13.798-26.551-23.982
                                                      c-6.757-10.184-10.135-21.744-10.135-34.69c0-11.419,2.568-21.601,7.708-30.55c5.142-8.945,11.709-16.084,19.702-21.408
                                                      c7.994-5.332,17.319-9.713,27.979-13.131c10.66-3.433,20.937-5.808,30.833-7.139c9.895-1.335,19.985-1.995,30.262-1.995
                                                      c6.283,0,11.043,0.191,14.277,0.567c1.143,0.767,4.043,2.759,8.708,5.996s7.804,5.428,9.423,6.57
                                                      c1.615,1.137,4.567,3.326,8.85,6.563c4.281,3.237,7.327,5.661,9.135,7.279c1.803,1.618,4.421,4.045,7.849,7.279
                                                      c3.424,3.237,5.948,6.043,7.566,8.422c1.615,2.378,3.616,5.28,5.996,8.702c2.38,3.433,4.043,6.715,4.998,9.855
                                                      c0.948,3.142,1.854,6.567,2.707,10.277c0.855,3.72,1.283,7.569,1.283,11.57C250.105,393.713,247.487,404.182,242.251,413.123z" />
                                          <polygon
                                             points="401.998,73.089 401.998,0 365.449,0 365.449,73.089 292.358,73.089 292.358,109.636 365.449,109.636 
                                                      365.449,182.725 401.998,182.725 401.998,109.636 475.081,109.636 475.081,73.089      " />
                                       </g>
                                    </g>
                                 </svg>
                              </span>
                           </a>
                        </li>
                        <li>
                           <a href="javascript:;">
                              <span>
                                 <svg xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision"
                                    text-rendering="geometricPrecision" image-rendering="optimizeQuality"
                                    fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 640 640">
                                    <path
                                       d="M228.582 205.715h126.462v64.832h1.83c17.611-31.595 60.675-64.832 124.892-64.832C615.303 205.715 640 288.818 640 396.926v220.219H508.116V421.93c0-46.536-.969-106.442-68.576-106.442-68.67 0-79.194 50.658-79.194 103.052v198.605H228.581v-411.43zM137.152 91.43c0 37.855-30.721 68.576-68.576 68.576-37.855 0-68.587-30.721-68.587-68.576 0-37.855 30.732-68.576 68.587-68.576 37.855 0 68.576 30.721 68.576 68.576zM-.011 205.715h137.163v411.43H-.011v-411.43z" />
                                 </svg>
                              </span>
                           </a>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div> -->



   <!-- <div class="call-now-wrapper float_left">
      <div class="container">
         <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-6"></div>
            <div class="col-lg-6 col-md-12 align-self-end">
               <div class="call-sec-wrapper float_left">
                  <h4>Call Now</h4>
                  <img class="img-fluid" src="{{url('public/website/images/line-yal-red.png')}}" alt="img">
                  <h2 class="call">+61 3 8376 6284</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla condimentumlaoreet velit ut rhoncus.
                     Class aptent taciti sociosqu ad litora torquent per conubia nostra</p>
                  <a class="custom-btn" href="store.html">Contact Us</a>
               </div>
            </div>
         </div>
      </div>
   </div> -->



   <!-- <div class="news-blog-wrapper float_left ptb-100">
      <div class="container">
         <div class="heading-title">
            <h4>New’s & Blog’s</h4>
            <p>know about our delivery processes</p>
            <img class="img-fluid" src="{{url('public/website/images/line-yal.png')}}" alt="img">
         </div>
         <div class="row">
            <div class="col-lg-6 col-md-12 col-12">
               <div class="blog-box">
                  <div class="blog-img">
                     <img class="img-fluid" src="{{url('public/website/images/blogi2.jpeg')}}" alt="img">
                  </div>
                  <div class="blog-text">
                     <p>JULY / 15 / 2022</p>
                     <h4> <a href="javascript:void(0);">Aorem ipsum dolor sit amet consect.</a> </h4>
                     <p class="p-text"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. </p>
                     <a class="custom-btn" href="javascript:void(0);">Read More</a>
                  </div>
               </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12">
               <div class="blog-box">
                  <div class="blog-img">
                     <img class="img-fluid" src="{{url('public/website/images/blog3i.jpeg')}}" alt="img">
                  </div>
                  <div class="blog-text">
                     <p>JULY / 15 / 2022</p>
                     <h4> <a href="javascript:void(0);">Aorem ipsum dolor sit amet consect.</a> </h4>
                     <p class="p-text"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. </p>
                     <a class="custom-btn" href="javascript:void(0);">Read More</a>
                  </div>
               </div>
            </div>

         </div>
      </div>
   </div> -->



   <div class="countdown-wrapper float_left">
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
   </div>


   <div class="testimonial-client-say-wrapper float_left ptb-100">
      <div class="container">
         <div class="heading-title">
            <h4>Our Client Say</h4>
            <p>Donec blandit, tellus sed molestie posuere,</p>
            <img class="img-fluid" src="{{url('public/website/images/line-yal.png')}}" alt="img">
         </div>
         <div class="testi-slider float_left">
            <div id="my-carousel" class="owl-carousel">
               <div class="item">
                  <div class="row">
                     <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                        <img src="{{url('public/website/images/userc1.jpg')}}" alt="img">
                     </div>
                     <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                        <h4>Ibn Battuta</h4>
                        <span>Business Man</span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                           tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                           quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                           consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                           cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                           proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                     </div>
                  </div>
               </div>
               <div class="item">
                  <div class="row">
                     <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                        <img src="{{url('public/website/images/userc2.jpg')}}" alt="img">
                     </div>
                     <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                        <h4>Ibn Battuta</h4>
                        <span>Business Man</span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                           tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                           quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                           consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                           cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                           proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                     </div>
                  </div>
               </div>
               <div class="item">
                  <div class="row">
                     <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                        <img src="{{url('public/website/images/userc3.jpg')}}" alt="img">
                     </div>
                     <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                        <h4>Ibn Battuta</h4>
                        <span>Business Man</span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                           tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                           quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                           consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                           cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                           proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                     </div>
                  </div>
               </div>

            </div>
            <div class="navigation-img-wrapper">
               <div class="navigator" data-item="0"><img src="{{url('public/website/images/userc1.jpg')}}" alt="img"></div>
               <div class="navigator" data-item="1"><img src="{{url('public/website/images/userc2.jpg')}}" alt="img"></div>
               <div class="navigator" data-item="2"><img src="{{url('public/website/images/userc3.jpg')}}" alt="img"></div>
            </div>
         </div>
      </div>
   </div>


   <!-- <div class="contact_img_background">
      <div class="container">
         <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
               <div class="logo-white">
                  <img src="{{url('public/website/images/white-logo.png')}}" alt="logo">
               </div>

               <div class="request-list">
                  <div class="r-list">
                     <i class="fa fa-map-marker" aria-hidden="true"></i>
                  </div>
                  <div class="r-text">
                     <h4>PO Box 16122 Collins Street <br /> West Victoria 8007</h4>
                  </div>
               </div>
            
               <div class="request-list">
                  <div class="r-list">
                     <i class="fa fa-map-marker" aria-hidden="true"></i>
                  </div>
                  <div class="r-text">
                     <h4> 121 King Street, Melbourne <br /> Victoria 3000</h4>
                  </div>
               </div>
            
               <div class="request-list">
                  <div class="r-list">
                     <i class="fa fa-phone" aria-hidden="true"></i>
                  </div>
                  <div class="r-text">
                     <h4> +1 800 123 4567</h4>
                  </div>
               </div>
            
               <div class="request-list">
                  <div class="r-list">
                     <i class="far fa-envelope"></i>
                  </div>
                  <div class="r-text">
                     <h4> info@example.com</h4>
                  </div>
               </div>
            

            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
               <div class="request-form-wrapper">
                  <h4>Send Your Request</h4>
                  <p>We Are Committed To Total Transparency About Our Products.</p>
                  <div class="div_line-yal">
                     <img class="img-fluid" src="{{url('public/website/images/line-yal.png')}}" alt="img">
                  </div>
                  <form>
                     <div class="mb-3 icon-filed">
                        <input type="text" class="form-control require" name="first_name" required="" placeholder="Enter Name">
                        <span><i class="fa fa-user"></i></span>
                     </div>
                     <div class="mb-3 icon-filed">
                        <input type="email" class="form-control require" name="email" required="" data-valid="email" data-error="Email should be valid." placeholder="Enter Email">
                        <span><i class="fa fa-envelope"></i></span>
                     </div>
                     <div class="mb-3 icon-filed">
                        <input type="text" class="form-control require" name="contact_no" placeholder="Enter Mob. Number">
                        <span><i class="fa fa-phone"></i></span>
                     </div>
                     <div class="mb-3 icon-filed">
                        <textarea rows="3" cols="3" class="form-control require" name="message"  placeholder="Enter Message"></textarea>
                        <span><i class="fas fa-edit"></i></span>
                     </div>
                     <button class="submitForm custom-btn">Send Now</button>
                  </form>
                  
               </div>
            </div>
         </div>
      </div>
   </div> -->


   <div class="brand-company-wrapper float_left ptb-100">
      <div class="container">
         <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-12">
               <div class="brand-img">
                  <img src="{{url('public/website/images/foodc1.jpg')}}" alt="img">
               </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-12">
               <div class="brand-img">
                  <img src="{{url('public/website/images/foodc2.jpg')}}" alt="img">
               </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-12">
               <div class="brand-img">
                  <img src="{{url('public/website/images/foodc3.jpg')}}" alt="img">
               </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-3 col-12">
               <div class="brand-img">
                  <img src="{{url('public/website/images/foodc4.jpg')}}" alt="img">
               </div>
            </div>
         </div>
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
      $(document).ready(function(){
         var myCarousel = document.querySelector('#carouselExampleControls')
               var carousel = new bootstrap.Carousel(myCarousel, {
               interval: 1500,
               wrap: true,
               touch:true,
               ride:true
               })
      })
</script>

@endsection()


   