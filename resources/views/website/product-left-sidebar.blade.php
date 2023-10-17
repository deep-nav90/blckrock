
@extends('website.layout.layout')
@section('title','Food Court')

@section('content')

<style type="text/css">
  img, svg {
    vertical-align: middle;
    width: 20px;
}

p.text-sm.text-gray-700.leading-5 {
    position: absolute;
    left: 0;
    display: list-item;
    margin: 40px 0px 0px 512px;
}

.flex.justify-between.flex-1.sm\:hidden {
    display: none;
}

span.relative.inline-flex {
  color: #ef5350
}

.blog-slider-wrapper .custom-pegination {
     text-align: unset; 
    
}

</style>

   <!-- banner section start start-->
   <div class="inner-slider-wrapper float_left">
      <div class="container">
         <div class="inner-caption">
            <h4>All Products</h4>
            <img src="{{url('public/website/images/title.png')}}" alt="img">
         </div>
         <ol class="breadcrumb sicon">
            <li><a href="{{route('index')}}">Home</a></li>
            <li class="active">All Products</li>
         </ol>
         <!-- <img class="meat" src="{{url('public/website/images/title-bottom.png')}}" alt="img"> -->
      </div>
   </div>
   <!-- banner section start end-->

   <div class="inner-page-main-wrapper float_left ptb-100">
      <div class="container">
         <div class="row">
            <div class="col-lg-4 col-md-4 col-12">
               <div class="side-bar-strip">
                  <h4>Search</h4>
                  <img src="{{url('public/website/images/side-title.png')}}" alt="img">
                  <div class="input-search">
                     <input type="text" id="searchbar" placeholder="Search Here">
                     <button id="searchBtn"><i class="fa fa-search"></i></button>
                  </div>
               </div>
               <!--  -->
               <div class="side-bar-strip">
                  <h4>Categories</h4>
                  <img src="{{url('public/website/images/side-title.png')}}" alt="img">
                  <div class="side-accordian">
                     <ul>
                        @if(count($categories) > 0)
                        @foreach($categories as $category)
                           <li class="category_all_products" id="cat_{{$category->id}}">
                              <a href="javascript:void(0);">{{$category->category_name}}
                                 <span>
                                    <img class="category_images_all_products" src="{{$category->category_image}}">
                                 </span>
                              </a>
                           </li>
                        @endforeach()
                        @else
                        <li>
                           <p class="cat_no_record"><span class="no_record_found">No Record Found</span></p>

                        </li>
                        @endif()
                     </ul>
                  </div>
               </div>
               
               <div class="side-bar-strip">
                  <h4>Top Seller</h4>
                  <img src="{{url('public/website/images/side-title.png')}}" alt="img">

                  @if(count($topSellers) > 0)
                  @foreach($topSellers as $product)
                 
                  <div class="side-main-box">
                     @foreach($product->productImages as $productImage)
                     @if($productImage->is_featured_image == 1)
                     <div class="side-img-box top_seller_img">
                        <img src="{{$productImage->product_image}}" alt="img">
                     </div>
                     @endif()
                     @endforeach()
                     <div class="side-img-content">
                        <h5> <a href="{{route('singleProductDetails',base64_encode($product->id))}}">{{$product->product_name}}</a> </h5>
                        <span class="star_rating" style="--rating:{{$product->average_rating}}"></span>
                        <h5> <a href="javascript:void(0);">₹{{$product->default_product_price}}</a> </h5>
                     </div>
                  </div>
                  @endforeach()

                  @else
                  <p class="cat_no_record"><span class="no_record_found">No Record Found</span>
                  </p>

                  @endif()
                  
               </div>


            </div>
            <div class="col-lg-8 col-md-8 col-12">
               <div class="blog-slider-wrapper float_left">
                  @if($mainProduct)
                  <div class="blog-cat">
                     <div class="blog-post-slider">
                        <div class="owl-carousel owl-theme">
                           @foreach($mainProduct->productImages as $productImage)
                           <div class="item">
                              <img src="{{$productImage->product_image}}" alt="img">
                           </div>
                           @endforeach()
                        </div>
                     </div>
                     <div class="slider-content">
                        <del>₹{{$mainProduct->default_product_price}}</del>
                        <h4><a href="javascript:void(0);">NOW ONLY ₹{{$mainProduct->default_sale_price}}</a></h4>
                        <div class="post-tag">
                           <a href="javascript:void(0);">{{$mainProduct->subCategory->sub_category_name}} ({{$mainProduct->default_attribute_value}} {{$mainProduct->default_attribute_name}}) </a>
                        </div>
                        <span class="star_rating" style="--rating:{{$mainProduct->average_rating}}"></span>


                        <?php 
                          $limit = 100;
                          if(strlen($mainProduct->meta_description) > $limit){
                             $show_description = substr($mainProduct->meta_description, 0, $limit) . " ...";
                          }else{
                             $show_description = $mainProduct->meta_description;
                          }
                        ?>


                        <p class="product-text">
                            <span class="text_view" style="font-size: 12px;">{{$show_description}}</span>
                            @if(strlen($mainProduct->meta_description) > $limit)
                            <!-- <span class="read_more" less_read="{{$show_description}}" full_read = "{{$mainProduct->meta_description}}">Read More</span> -->
                            
                            @endif()

                            


                         </p>


                      
                        <a class="custom-btn AddCartAnchorTab" product_details = "{{$mainProduct}}" is_added_in_cart="false" product_id="{{$mainProduct->id}}" href="javascript:void(0);">Add Cart</a>

                     </div>
                  </div>
                  @endif()
                  <!--  -->

                  <div class="product-single-wrapper appendProduct">

                     <!-- <div class="custom-tabs-prdt">
                        <div class="product-thumbnail">
                           <a href="javascript:;">
                              <img src="{{url('public/website/images/product/pc1.png')}}" alt="img">
                           </a>
                        </div>
                        <div class="product-body">
                           <h5 class="product-title">
                              <a href="product-single.html" title="Beef">Fainting Beef</a>
                           </h5>
                           <ul class="star-review">
                              <li> <a href="javascript:;"><i class="fa fa-star" aria-hidden="true"></i></a> </li>
                              <li> <a href="javascript:;"><i class="fa fa-star" aria-hidden="true"></i></a> </li>
                              <li> <a href="javascript:;"><i class="fa fa-star" aria-hidden="true"></i></a> </li>
                              <li> <a href="javascript:;"><i class="fa fa-star" aria-hidden="true"></i></a> </li>
                              <li> <a href="javascript:;"><i class="fa fa-star" aria-hidden="true"></i></a> </li>
                           </ul>
                           <span class="product-price">2,500$ <span>4,600$</span> </span>
                           <p class="product-text">Lorem Ipsum is simply dummy text of the printing and typesetting
                              industry.</p>
                           <a class="custom-btn" href="product-single.html">Add Cart</a>
                        </div>
                     </div> -->

                     <!-- <p class="product_no_record"><span class="no_record_found">No Record Found</span>
                     </p>
 -->
                     
                     
                  </div>

                  <!--  -->

                  <div class="custom-pegination">
                     <ul class="paginate_data">
                        <!-- <li class="preious"> <a href="javascript:;"> <span>
                                 Previous</span> </a> </li>
                        <li class="active"> <a href="javascript:;"> <span>1</span> </a> </li>
                        <li> <a href="javascript:;"> <span>2</span> </a> </li>
                        <li> <a href="javascript:;"> <span>3</span> </a> </li>
                        <li> <a href="javascript:;"> <span>4</span> </a> </li>
                        <li> <a href="javascript:;"> <span>5</span> </a> </li>
                        <li class="preious active"> <a href="javascript:;"> <span>Next </span> </a> </li> -->
                     </ul>
                  </div>
               
              </div>
            </div>
         </div>
      </div>
   </div>

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
                  <a class="custom-btn" href="store.html">COntact Us</a>
               </div>
            </div>
         </div>
      </div>
   </div> -->

   <div class="modal fade" id="lodaerModal" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="lodaerModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     
      <img src="{{url('/public/loading-buffering.gif')}}" style="width: 50px; height:50px;">
     
  </div>
</div>

@endsection()

@section('js')

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

<script type="text/javascript">
   $(document).ready(function(){

      //$("#lodaerModal").modal("show");

      //console.log($(".category_all_products").eq(0))

      $("#searchBtn").on("click",function(){

          let category_id = $(".category_all_products.active").attr("id");
          category_id = category_id.replace("cat_","");
          category_id = btoa(category_id);
          let searchbar = $("#searchbar").val().trim();

          
          let data = {
             "_token": "{{ csrf_token() }}",
             "category_id": category_id,
             "search_text" : searchbar
           }

          let url = "{{route('allProducts')}}";
          getProductsAll(url,data);
          

          

      })

      setTimeout(function(){
        let category_id = $(".category_all_products").eq(0).attr("id");
        document.getElementById(category_id).click();
      },500)

                

      $(document).on("click",".category_all_products",function(){
         $(".category_all_products").removeClass('active');
         $(this).addClass('active');
         let category_id = $(this).attr("id");
         category_id = category_id.replace("cat_","");
         category_id = btoa(category_id);

         let searchbar = $("#searchbar").val().trim();
         let data = {
                 "_token": "{{ csrf_token() }}",
                 "category_id": category_id,
                 'search_text' : searchbar
               }
          let url = "{{route('allProducts')}}";
          getProductsAll(url, data);
         

      });


      $(document).on("click",".relative.inline-flex",function(){

        event.preventDefault();

        let url = $(this).attr("href");
        if(url){
          let category_id = $(".category_all_products.active").attr("id");
          category_id = category_id.replace("cat_","");
          category_id = btoa(category_id);
          let searchbar = $("#searchbar").val().trim();

          let data = {
             "_token": "{{ csrf_token() }}",
             "category_id": category_id,
             "search_text" : searchbar
           }

          getProductsAll(url,data);
        }
        
      });

   });


   function getProductsAll(url, payload){
    $("#lodaerModal").modal("show");

       $.ajax({
         url:url,
         data: payload,
         //contentType: false,
         //processData: false,
         type: 'POST',
         success: function(res){
             
             console.log(res);

             let html = '';

             let result = res.products.data;
             if(result.length > 0){



                for(let k=0; k<result.length; k++){
                  let stringify = JSON.stringify(result[k]);
                  //console.log("ggggggg",stringify);
                   let decodeID = btoa(result[k].id);

                   let detailProductUrl = '{{ route("singleProductDetails", ":id") }}';
                   detailProductUrl = detailProductUrl.replace(':id', decodeID);

                   let imgShow = '';

                   let limit = 100;
                   let show_description = "";
                   let readMoreShow = '';
                   if(result[k].meta_description.length > limit){

                      show_description = result[k].meta_description.substr(0, limit) + " ...";
                      //readMoreShow += `<span class="read_more" less_read="`+show_description+`" full_read = "`+result[k].meta_description+`">Read More</span>`;
                    }else{
                      show_description =result[k].meta_description;
                    }

                   //console.log(result[k].product_images)
                   for(let p=0; p<result[k].product_images.length; p++){
                      if(result[k].product_images[p].is_featured_image == 1){
                         imgShow = `<a href="javascript:void(0);">
                            <img src="`+result[k].product_images[p].product_image+`" alt="img">
                         </a>`;
                      }
                   }

                   //alert(detailProductUrl);
                   html += `<div class="custom-tabs-prdt">
                      <div class="product-thumbnail">
                      `+imgShow+`
                      </div>
                      <div class="product-body">
                         <h5 class="product-title">
                            <a href="`+detailProductUrl+`" title="`+result[k].product_name+`">`+result[k].product_name+`</a>

                            <a class="sub_category_name_anchor" href="javascript:void(0);">`+result[k].sub_category.sub_category_name+`</a>

                            <a class="attribute_anchor" href="javascript:void(0);">`+result[k].default_attribute_name+`: `+result[k].default_attribute_value+`</a>
                         </h5>
                         <span class="star_rating" style="--rating:`+result[k].average_rating+`"></span>

                         <span class="product-price">`+result[k].default_sale_price+`$ <span>`+result[k].default_product_price+`$</span> </span>
                         <p class="product-text">
                            <span class="text_view">`+show_description+`</span>
                            `+readMoreShow+`
                         </p>

                         <a class="custom-btn AddCartAnchorTab" product_details = '`+stringify+`' is_added_in_cart="false" product_id="`+result[k].id+`" href="javascript:void(0);">Add Cart</a>

                         
                      </div>
                   </div>`;
                }


                $(".paginate_data").html(res.link_page);
                
             }else{
                html += `<p class="product_no_record"><span class="no_record_found">No Record Found</span>
                   </p>`;
             }



             $(".appendProduct").html(html);
             setTimeout(() => {
                 $("#lodaerModal").modal("hide");

                 checkAlreadyAddedInCart();

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
   }
</script>

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



@endsection()
   