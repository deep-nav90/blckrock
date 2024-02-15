@extends('website.layout.layout')
@section('title','Black Rooster')

@section('content')

<?php 
   $product_find_id = "";
   if(isset($productFind)){
      $product_find_id = $productFind->id;
   }else{
      $product_find_id = "";
   }
   
?>

   <!-- banner section start start-->
   <div class="inner-slider-wrapper float_left">
      <div class="container">
         <div class="inner-caption">
            <h4>Product Details</h4>
         </div>
         <ol class="breadcrumb sicon">
            <li><a href="{{route('index')}}">Home</a></li>
            <li><a href="javascript:void(0);">{{$productFind->category->category_name}}</a></li>
            <li class="active"><i class="fa fa-angle-double-right"></i>{{$productFind->product_name}}</li>
            
         </ol>
         <!-- <img class="meat" src="{{url('public/website/images/foodc1.jpg')}}" alt="img"> -->
      </div>
   </div>
   <!-- banner section start end-->



   <div class="product-client-say-wrapper float_left ptb-100">
      <div class="container">
         <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
               <div class="testi-slider float_left">
                  <div id="my-carousel" class="owl-carousel">
                     @foreach($productFind->productImages as $productImage)
                     <div class="item">
                        <img src="{{$productImage->product_image}}" alt="img">
                     </div>
                     @endforeach()
                     
                  </div>
                  <div class="navigation-img-wrapper">
                     <?php $i = 0; ?>
                     @foreach($productFind->productImages as $productImage)
                     <div class="navigator" data-item="{{$i}}"><img src="{{$productImage->product_image}}" alt="img"></div>
                     <?php $i++; ?>
                     @endforeach()
                  </div>
               </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
               <div class="product-des">
                  <h4>{{$productFind->product_name}} (<span class="attr_price_name">{{$productFind->default_attribute_value}} {{$productFind->default_attribute_name}}</span>)</h4>
                  <span class="from_only">From only ₹{{$productFind->default_sale_price}}</span>
                  <h5 class="h5_class_from_only">{{$productFind->default_product_price}}₹</h5>
                  <span class="star_rating" style="--rating:{{$productFind->average_rating}}"></span>

                  
                  @foreach($productFind->productPriceAttributes as $product_price_attribute)

                  <div class="card-product attributePrice" data-id="{{$product_price_attribute->id}}">
                     <div class="card-product-text">
                        <h5><span class="multiplyBy">1</span> x {{$productFind->product_name}}</h5>
                        <span class="sub_cat">{{$productFind->subCategory->sub_category_name}}</span>
                        <span class="attributePrice">({{$product_price_attribute->attribute_value}} {{$product_price_attribute->attribute->attribute_name}})</span>
                     </div>
                     <div class="card-product-rate">
                        <h5>₹<span class="sales_price single_page_sales_price">{{$product_price_attribute->sale_price}}</span></h5>
                        <form>
                           <div class="form-group">
                              <input type="checkbox" class="checkboxForAttribute" data-all="{{$product_price_attribute}}" id="price_{{$product_price_attribute->id}}"  @if($product_price_attribute->is_default_show == 1) checked @endif()>
                              <label for="price_{{$product_price_attribute->id}}"></label>
                           </div>
                        </form>
                     </div>
                  </div>
                  
                  @endforeach()

                
                  
               </div>
               <div class="value-produt">
                  <!-- <div>
                     <button class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</button>
                     <input type="number" id="number" value="0" />
                     <button class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">+</button>
                  </div> -->
                  <div class="number">
                     <span class="minus">-</span>
                     <input type="text" id="quantity" value="1"/>
                     <span class="plus">+</span>
                  </div>
                  <a class="custom-btn" id="addToCartBtn" link_add="noadded" product_detail="{{$productFind}}" href="javascript:void(0);">Add to Cart</a>
               </div>
               
            </div>
         </div>
      </div>
   </div>


   <div class="about-the-product float_left">
      <div class="container">
         <div class="heading-title">
            <h4>About the Product</h4>
            <p>Additional information,reviews & description</p>
            <img class="img-fluid " src="{{url('public/website/images/under-line.png')}}" alt="img">
         </div>
         <div class="custom-tabs float_left">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
               <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                     type="button" role="tab" aria-controls="home" aria-selected="true">Description</button>
               </li>
               
               <li class="nav-item" role="presentation">
                  <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button"
                     role="tab" aria-controls="contact" aria-selected="false">Review (14)</button>
               </li>
            </ul>
            <div class="tab-content" id="myTabContent">
               <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <h5>About {{$productFind->product_name}}</h5>
                  <p style="word-break: break-all;">{{$productFind->product_description}}</p>
               </div>
               
               <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                  <h5>Be the first one to review "{{$productFind->product_name}}"</h5>
                  <span>YOUR REVIEWS</span>
                  <ul class="star-review">
                     <li> <a href="javascript:;"><i class="fa fa-star" aria-hidden="true"></i></a> </li>
                     <li> <a href="javascript:;"><i class="fa fa-star" aria-hidden="true"></i></a> </li>
                     <li> <a href="javascript:;"><i class="fa fa-star" aria-hidden="true"></i></a> </li>
                     <li> <a href="javascript:;"><i class="fa fa-star" aria-hidden="true"></i></a> </li>
                     <li> <a href="javascript:;"><i class="fa fa-star" aria-hidden="true"></i></a> </li>
                  </ul>
                  <div class="text-msg">
                     <textarea name="message" style="resize: none;" id="" cols="30" rows="5" placeholder="Type Here.."></textarea>
                     <button id="reviewSubmitBtn">Submit</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   @if(count($categoryWithAllProducts->allProductsMatchCategoryId) > 0)
   <div class="customer-blog-wrapper float_left ptb-100">
      <div class="container">
         <div class="heading-title">
            <h4>Customers Also Bought</h4>
            <p>You may also like</p>
            <img class="img-fluid " src="{{url('public/website/images/under-line.png')}}" alt="img">
         </div>
         <div class="product-single-wrapper">

            @foreach($categoryWithAllProducts->allProductsMatchCategoryId as $product)
            <div class="custom-tabs-prdt">
               <div class="product-thumbnail">
                  <a href="{{route('singleProductDetails',base64_encode($product->id))}}">
                     @foreach($product->productImages as $productImage)
                        @if($productImage->is_featured_image == 1)
                           <img src="{{$productImage->product_image}}" alt="img">
                        @endif()
                     @endforeach()

                  </a>
               </div>
               <div class="product-body">
                  <h5 class="product-title">
                     <a href="product-single.html" title="{{$product->product_name}}">{{$product->product_name}}</a>
                     <a class="sub_category_name_anchor" href="javascript:void(0);">{{$product->subCategory->sub_category_name}}</a>

                     <a class="attribute_anchor" href="javascript:void(0);">{{$product->default_attribute_name}}: {{$product->default_attribute_value}}</a>

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
                     <!-- @if(strlen($product->product_description) > $limit)
                     <span class="read_more" less_read="{{$show_description}}" full_read = "{{$product->product_description}}">Read More</span>
                     
                     @endif() -->

                     


                  </p>
                  <a class="custom-btn" href="{{route('singleProductDetails',base64_encode($product->id))}}">Add Cart</a>
               </div>
            </div>
            @endforeach()
            
         </div>
      </div>
   </div>
   @endif()


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


      
      $(document).ready(function() {


         $('.minus').click(function () {

            var $input = $(this).parent().find('input');
            var count = parseInt($input.val()) - 1;
            count = count < 1 ? 1 : count;
            $input.val(count);
            $input.change();

            $(".checkboxForAttribute:checked").parents(".attributePrice").find(".multiplyBy").text(count);

            let productPriceAttribute = JSON.parse($(".checkboxForAttribute:checked").attr("data-all"));

            

            let calculatePrice = parseFloat(productPriceAttribute.sale_price) * parseFloat(count);
            calculatePrice = calculatePrice.toFixed(2);


            $(".checkboxForAttribute:checked").parents(".attributePrice").find(".single_page_sales_price").text(calculatePrice);
            
            return false;
         });
         $('.plus').click(function () {


            
    

            var $input = $(this).parent().find('input');
            var count = parseInt($input.val()) + 1;
            let total_quantity = "{{$productFind->product_quantity}}";
            count = count > parseInt(total_quantity) ? parseInt(total_quantity) : count;
            $input.val(count);
            $input.change();

            

            
            $(".checkboxForAttribute:checked").parents(".attributePrice").find(".multiplyBy").text(count);
            let productPriceAttribute = JSON.parse($(".checkboxForAttribute:checked").attr("data-all"));

            let calculatePrice = parseFloat(productPriceAttribute.sale_price) * parseFloat($input.val());
            calculatePrice = calculatePrice.toFixed(2);

           // console.log("hgghhgh", $(".checkboxForAttribute:checked").parents(".attributePrice").find(".single_page_sales_price"))
            $(".checkboxForAttribute:checked").parents(".attributePrice").find(".single_page_sales_price").text(calculatePrice);
  

            return false;
         });



         $("#addToCartBtn").on("click",function(){
            
            $("#lodaerModal").modal("show");
            let product_detail = JSON.parse($(this).attr('product_detail'));
            let selected_quantity = $("#quantity").val();
            let calculate_price = $(".checkboxForAttribute:checked").parents(".attributePrice").find(".sales_price").text();

            let productPriceAttribute = JSON.parse($(".checkboxForAttribute:checked").attr("data-all"));

            let selected_product_price_attribute = productPriceAttribute.id;
            //alert(selected_product_price_attribute)

            product_detail.selected_quantity = selected_quantity;
            product_detail.calculate_price = calculate_price;
            product_detail.selected_product_price_attribute = selected_product_price_attribute;
            product_detail.selected_attribute_value = productPriceAttribute.attribute_value;
            product_detail.selected_attribute_name = productPriceAttribute.attribute.attribute_name;
            product_detail.selected_sale_price = productPriceAttribute.sale_price;
            //alert(product_detail.selected_sale_price)
            product_detail.selected_product_price = productPriceAttribute.product_price;



            let productInCart = JSON.parse(localStorage.getItem('productInCart'));

            if(productInCart && productInCart.length > 0){

              //Remove SAME PRODUCT ID

              let currentProductID = "{{$product_find_id}}";
              let findInArray = [];
               if(currentProductID){
                  findInArray = productInCart.filter(function(item) {
                  
                    return item["id"] != currentProductID;
                  });
               }else{
                  findInArray = productInCart;
               }

               productInCart = findInArray;

              // END REMOVE SAME ID
               
               productInCart.push(product_detail);
            }else{
               productInCart = [];
               productInCart.push(product_detail);
            }



            $(this).text("View Cart");

            
            if($(this).attr("link_add") == "noadded"){
              Swal.fire({
                title: 'Information',
                text: "Product added in cart successfully.",
                icon: 'success',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ok',
                allowOutsideClick: false
              }).then((result) => {
                if (result.isConfirmed) {
                  $("#lodaerModal").modal("hide");
                  let stringify = JSON.stringify(productInCart);
                  localStorage.setItem('productInCart',stringify);
                  navBarCartProduct();
                }
              })

              $("#addToCartBtn").attr("link_add","added");

            }else{

              setTimeout(function(){
                $("#lodaerModal").modal("hide");
                let stringify = JSON.stringify(productInCart);
                localStorage.setItem('productInCart',stringify);
                navBarCartProduct();

                window.location.href = "{{route('viewCart')}}";
              },1000)

              
            }

            

            console.log(productInCart)
         })


      });
   
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

   <script type="text/javascript">
     $(document).ready(function(){

      $(document).on("click",".checkboxForAttribute",function(){
         $(".checkboxForAttribute:checked").prop("checked",false);
         $(this).prop("checked", true);

         let productPriceAttribute = JSON.parse($(this).attr("data-all"));
         $(".attr_price_name").text(productPriceAttribute.attribute_value + " " + productPriceAttribute.attribute.attribute_name);
         $(".h5_class_from_only").text(productPriceAttribute.sale_price + "₹");


         let quantity = $(".checkboxForAttribute:checked").parents(".attributePrice").find(".multiplyBy").text();
         $("#quantity").val(quantity);
         
      });


      //Default Selected ProductPriceAttribute

         let productInCart = JSON.parse(localStorage.getItem('productInCart'));

         let currentProductID = "{{$product_find_id}}";
         let findInArray = [];
         if(currentProductID){
            findInArray = productInCart.filter(function(item) {
            
               return item["id"] == currentProductID;
            });
         }else{
            findInArray = productInCart;
         }
         

         if(findInArray.length > 0){
            let productDetail = findInArray[0];

            let selected_product_price_attribute = productDetail.selected_product_price_attribute;


            $(".checkboxForAttribute[id='price_"+selected_product_price_attribute+"']").parents(".attributePrice").find(".multiplyBy").text(productDetail.selected_quantity);

            $(".checkboxForAttribute[id='price_"+selected_product_price_attribute+"']").parents(".attributePrice").find(".sales_price").text(productDetail.calculate_price);

            $(".checkboxForAttribute[id='price_"+selected_product_price_attribute+"']").trigger("click");

            
            
            $("#addToCartBtn").text("View Cart").attr("link_add","added");
            //console.log("kjhbhfhg", productDetail)

            // $(".multiplyBy").text(productDetail.selected_quantity);
            // $(".single_page_sales_price").text(parseFloat(productDetail.calculate_price).toFixed(2));
            
            // $("#quantity").val(productDetail.selected_quantity);
            // $("#addToCartBtn").text("View Cart").attr("link_add","added");

            // let selected_product_price_attribute_id = productDetail.selected_product_price_attribute;
            // $(".attribute_v_n.active").removeClass("active").attr("is_default_show","false");
            // $(".attribute_v_n[data-id='"+selected_product_price_attribute_id+"']").trigger("click");
            //console.log("sss", productDetail)
         }
      
     })
   </script>


   @endsection()