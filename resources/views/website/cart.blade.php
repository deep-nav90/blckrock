@extends('website.layout.layout')
@section('title','Food Court')

@section('content')

<style type="text/css">
   span.select_quan, span.sales_price, span.cross_icon {
    padding-left: unset!important;
}

span#totalProductPrice, span#shippingCharges, span#couponAmount, span#finalPrice {
    padding-left: unset;
}

.coupon {
    border: 5px dotted #bbb;
    width: 32%;
    border-radius: 15px;
    margin: 35px -30px -25px 37px;
    max-width: 480px;
    max-height: 203px;
    overflow: scroll;
}
.container {
  padding: 2px 16px;
  background-color: #f1f1f1;
}

.promo {
  background: #ccc;
  padding: 3px;
}

.expire {
  color: red;
}

a.custom-btn.applyCoupon {
    position: relative;
    display: inline-block;
    
    font-size: 14px;
    border: none;
    outline: none;
    -webkit-box-shadow: none;
    box-shadow: none;
    height: 50px;
    border-radius: 30px;
    line-height: 50px;
    color: #ffffff;
    background: #ef5350;
    
    padding: 0px 38px;
    text-transform: uppercase;
    font-weight: 400;
    position: relative;
    overflow: hidden;
    margin-left: 280px;
    
}


.couponAppendData {
    display: flex;
    flex-wrap: wrap;
}
h6.h6_coupon {
    font-size: 22px;
    font-weight: 600;
}

.container {
    padding: 2px 16px;
     background-color: unset; 
}



</style>
   <!-- banner section start start-->
   <div class="inner-slider-wrapper float_left">
      <div class="container">
         <div class="inner-caption">
            <h4>Shopping Cart</h4>
            <img src="{{url('public/website/images/title.png')}}" alt="img">
         </div>
         <ol class="breadcrumb sicon">
            <li><a href="{{route('index')}}">Home</a></li>
            <li class="active">Shopping Cart</li>
         </ol>
         <img class="meat" src="{{url('public/website/images/foodc2.jpg')}}" alt="img">
      </div>
   </div>
   <!-- banner section start end-->

   <div class="shopping-cart-main-wrapper float_left ptb-100">
      <div class="container appendCartProducts">
         
         
      </div>

      <div class="couponAppendData" hidden>

         @foreach($coupons as $coupon)

         <div class="coupon">
            <?php 
               $text_show = "";
               if($coupon->coupon_type == "Percentage"){
                  $text_show = $coupon->coupon_amount_and_percentage . "% OFF YOUR PURCHASE";
               }else{
                  $text_show = $coupon->coupon_amount_and_percentage . "$ Flat OFF YOUR PURCHASE";
               }

               $limit = 100;
               if(strlen($coupon->meta_description) > $limit){
                  $show_description = substr($coupon->meta_description, 0, $limit) . " ...";
               }else{
                  $show_description = $coupon->meta_description;
               }

            ?>
  
  
           <div class="container" style="background-color:white">
             <h6 class="h6_coupon">{{$text_show}}</h6> 
             <p style="font-size: 12px;" class="wordwrap">
               <span class="text_view">{{$show_description}}</span>

               @if(strlen($coupon->meta_description) > $limit)
               <span class="read_more" less_read="{{$show_description}}" full_read = "{{$coupon->meta_description}}">Read More</span>
               
               @endif()

             </p>
             
           </div>
           <div class="container">
             <p style="font-size: 12px;">Use Promo Code: <span class="promo">{{$coupon->coupon_code}}</span></p>
             <?php 
                  $expireDate = Carbon\Carbon::parse($coupon->to_date)->format('d-M-Y');
             ?>
             <p style="font-size: 12px;" class="expire">Expires: {{$expireDate}}</p>
             <a class="custom-btn applyCoupon" coupon_id="{{$coupon->id}}" coupon_details="{{$coupon}}" href="javascript:void(0);">Apply</a>
           </div>
         </div>

         @endforeach()

         
      </div>

   </div>


   <div class="shopping-details-wrapper float_left totalPriceShow" hidden>
      <div class="container">
         <div class="row shoping-box">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
               <div class="terms">
                  <form>
                     <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">I have read and agreed to the Terms &
                           Conditions.</label>
                     </div>
                  </form>
               </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
               <div class="shipping-account-wrapper">
                  <p>Total of product pricing </p>
                  <span>₹<span id="totalProductPrice">0</span></span>
               </div>
               <div class="shipping-account-wrapper">
                  <p>Estimated Shipping Charges </p>
                  <span>₹<span id="shippingCharges">0</span></span>
               </div>
               <div class="shipping-account-wrapper coupon-wrapper" hidden>
                  <p>Coupon Amount </p>
                  <span>₹<span id="couponAmount">0</span></span>
               </div>
               <div class="shipping-account-wrapper mt-4">
                  <p>Total </p>
                  <h5>₹<span id="finalPrice">0</span></h5>
               </div>
            </div>
         </div>
      </div>
   </div>

   <div class="cart-btn-wrapper float_left buttonShow">
      <div class="container">
         <div class="cart-btn">
            <a class="out-line" href="{{route('allProducts')}}">Continue to shop</a>
            <a class="custom-btn goToCheckOutPage" href="javascript:void(0);">Proceed to Payment</a>
         </div>
      </div>
   </div>


@endsection()

@section('js')
<script type="text/javascript">
   $(document).ready(function(){

      $(document).on("click",".applyCoupon",function(){
         let coupon_details = JSON.parse($(this).attr("coupon_details"));

         let checkText = $(this).text();


         if(checkText == "Apply"){
            $(".applyCoupon").text("Apply");

               Swal.fire({
                 title: 'Information',
                 text: "Congratulation! coupon has been applied successfully.",
                 icon: 'success',
                 showCancelButton: false,
                 confirmButtonColor: '#3085d6',
                 cancelButtonColor: '#d33',
                 confirmButtonText: 'Ok',
                 allowOutsideClick: false
               }).then((result) => {
                 localStorage.setItem('couponCode', JSON.stringify(coupon_details));
                 $(this).text("Remove");

                 $(".coupon-wrapper").removeAttr("hidden");
                  let couponAmount = 0;
                  let totalProductPrice = $("#totalProductPrice").text();
                  let finalPrice = 0;

                  if(coupon_details.coupon_type == "Percentage"){
                    
                     couponAmount = (parseFloat(totalProductPrice) / 100) * parseFloat(coupon_details.coupon_amount_and_percentage);
                     finalPrice = parseFloat($("#finalPrice").attr('totalAmountWithOutCoupon')) - parseFloat(couponAmount);
                    
                  }else{
                     couponAmount = parseFloat(coupon_details.coupon_amount_and_percentage);
                     finalPrice = parseFloat($("#finalPrice").attr('totalAmountWithOutCoupon')) - parseFloat(couponAmount);
                  }

                  $("#couponAmount").text(couponAmount.toFixed(2));
                  $("#finalPrice").text(finalPrice);




                  putFinalPriceOnLocal();
                  

               })
            }else{

               Swal.fire({
                 title: 'Alert',
                 text: "Are you sure you want to remove coupon?.",
                 icon: 'warning',
                 showCancelButton: true,
                 confirmButtonColor: '#3085d6',
                 cancelButtonColor: '#d33',
                 confirmButtonText: 'Ok',
                 allowOutsideClick: false
               }).then((result) => {
                  console.log(result)
                  if(result.isConfirmed){
                     $(this).text("Apply");

                    localStorage.removeItem('couponCode');
                    
                    let beforeCouponAmount = $("#couponAmount").text();
                    $(".coupon-wrapper").attr("hidden");
                    $("#couponAmount").text(0);
                    let finalPrice = parseFloat($("#finalPrice").text()) + parseFloat(beforeCouponAmount);
                    $("#finalPrice").text(finalPrice);



                    putFinalPriceOnLocal();

                  }
                  
                  
                  

               })

               

            }

         

         console.log(coupon_details)


         


      })
      

        setTimeout(function(){

            getCartProducts();
            navBarCartProduct();

            checkApplyCouponCode();
           

        },500)

         

      

      $(document).on("click",".goToCheckOutPage",function(){
         if($("#exampleCheck1").prop('checked')){
            putFinalPriceOnLocal();

            window.location.href = "{{route('checkout')}}";
         }else{
            Swal.fire({
              title: 'Alert',
              text: "Please select terms & conditions checkbox.",
              icon: 'warning',
              showCancelButton: false,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Ok',
              allowOutsideClick: false
            }).then((result) => {
              
            })
         }  
         
      })

      $(document).on("click",".crossP",function(){

         let currentProductID = $(this).attr('p_id');
         let productInCart = JSON.parse(localStorage.getItem('productInCart'));
         
         let findInArrayAfterRemove = productInCart.filter(function(item) {
            
              return item["id"] != currentProductID;
         });
         let stringify = JSON.stringify(findInArrayAfterRemove);


         Swal.fire({
           title: 'Alert',
           text: "Are you sure you want to remove item in Cart?",
           icon: 'warning',
           showCancelButton: true,
           confirmButtonColor: '#3085d6',
           cancelButtonColor: '#d33',
           confirmButtonText: 'Ok',
           allowOutsideClick: false
         }).then((result) => {
           if (result.isConfirmed) {
               

                if(findInArrayAfterRemove.length > 0){
                  localStorage.setItem('productInCart',stringify);
                }else{
                  localStorage.removeItem('productInCart');
                }
               

               $(this).parents(".cart-strip-main-wrapper[p_id='"+currentProductID+"']").remove();

               getCartProducts();
               navBarCartProduct();
           }
         })


         
         
      })

      $(document).on("click",".decreaseValue",function() {
         var $input = $(this).parent().find('input');
         var count = parseInt($input.val()) - 1;
         count = count < 1 ? 1 : count;
         $input.val(count);
         $input.change();

         let sale_price = $(this).attr('sale_price');
         let p_id = $(this).attr('p_id');

         

         let calculatePrice = parseFloat(sale_price) * parseFloat(count);
         calculatePrice = calculatePrice.toFixed(2);

         $(".sales_price[p_id='"+p_id+"']").text(calculatePrice);

         $(".select_quan[p_id='"+p_id+"']").text(count);

         $("#totalProductPrice").text(calculatePrice);
         checkApplyCouponCode();

         updateProductInCart(p_id, count);
         return false;
      });
      $(document).on("click",".increaseValue",function() {
         var $input = $(this).parent().find('input');
         var count = parseInt($input.val()) + 1;
         let total_quantity = $(this).attr('max_quan');
         count = count > parseInt(total_quantity) ? parseInt(total_quantity) : count;
         $input.val(count);
         $input.change();

         let sale_price = $(this).attr('sale_price');
         let p_id = $(this).attr('p_id');

         let calculatePrice = parseFloat(sale_price) * parseFloat($input.val());
         calculatePrice = calculatePrice.toFixed(2);

         $(".sales_price[p_id='"+p_id+"']").text(calculatePrice);

         $(".select_quan[p_id='"+p_id+"']").text(count);

         $("#totalProductPrice").text(calculatePrice);
         checkApplyCouponCode();


         updateProductInCart(p_id, count);



         return false;
      });

   })

function putFinalPriceOnLocal(){
  let totalProductPrice = $("#totalProductPrice").text();
  let shippingCharges = $("#shippingCharges").text();
  let couponAmount = $("#couponAmount").text();
  let finalPrice = $("#finalPrice").text();

  let finalAmount = {
     "totalProductPrice" : totalProductPrice,
     "shippingCharges" : shippingCharges,
     "couponAmount" : couponAmount,
     "finalPrice" : finalPrice
  }

  console.log("checkFFFF", finalAmount)

  localStorage.setItem("finalAmount", JSON.stringify(finalAmount));
}

   function getCartProducts(){
      let productInCart = JSON.parse(localStorage.getItem('productInCart'));
      let cartP = '';

      if(productInCart && productInCart.length > 0){

         let subTotalProduct = 0;

         productInCart.map(function(p){
            subTotalProduct = subTotalProduct + parseFloat(p.calculate_price);
            let is_featured_image = '';
            let pp = JSON.stringify(p);

            p.product_images.map(function(k){
               if(k.is_featured_image == 1){
                  is_featured_image = k.product_image;
               }
            })
            cartP += `<div class="cart-strip-main-wrapper" p_id="`+p.id+`">
                     <div class="cart-item">
                        <div class="cart-item-img">
                           <img src="`+is_featured_image+`" alt="logo" />
                           <h5><span class="select_quan" p_id="`+p.id+`">`+p.selected_quantity+`</span> x `+p.product_name+`</h5>
                        </div>
                     </div>
                     <div class="cart-item">
                        <p>`+p.selected_attribute_value+` `+p.selected_attribute_name+`</p>
                     </div>
                     <div class="cart-item">
                        <div class="quantity-field">
                           <button class="value-button decrease-button decreaseValue" sale_price="`+p.selected_sale_price+`" p_id="`+p.id+`" max_quan="`+p.product_quantity+`" product_detail="`+pp+`" title="Azalt">-</button>
                           <input class="number quantity_select" value="`+p.selected_quantity+`" disabled>
                           <button class="value-button increase-button increaseValue" sale_price="`+p.selected_sale_price+`" p_id="`+p.id+`" max_quan="`+p.product_quantity+`" product_detail="`+pp+`" title="Arrtır">+
                           </button>
                        </div>
                     </div>
                     <div class="cart-item">
                        <h4>₹<span class="sales_price" p_id="`+p.id+`">`+p.calculate_price+`</span></h4>
                     </div>
                     <div class="cart-item crossP" p_id="`+p.id+`">
                        <span class="cross_icon">X</span>
                     </div>
                  </div>`;
         })

         $(".appendCartProducts").html(cartP);
         $(".buttonShow").removeAttr("hidden");
         $(".totalPriceShow").removeAttr("hidden");
         $("#totalProductPrice").text(subTotalProduct);
         $("#shippingCharges").text(0);
         $("#finalPrice").text(subTotalProduct);
         $("#finalPrice").attr("totalAmountWithOutCoupon",subTotalProduct);
         $(".couponAppendData").removeAttr("hidden");
         $(".buttonShow").removeAttr("hidden");

      }else{
         $(".appendCartProducts").html(`<p class="cart_no_added"><span class="no_record_found">No Record Found</span></p>`);
         $(".buttonShow").attr("hidden");
         $(".totalPriceShow").attr("hidden");
         $("#totalProductPrice").text(0);
         $("#shippingCharges").text(0);
         $("#finalPrice").text(0);
         $("#finalPrice").attr("totalAmountWithOutCoupon",0);
         $(".couponAppendData").attr("hidden","true");
         $(".buttonShow").attr("hidden","true");
      }

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

   <script type="text/javascript">
     function checkApplyCouponCode(){
        $(".applyCoupon").text("Apply");
         let checkCouponApply = JSON.parse(localStorage.getItem('couponCode'));

         if(checkCouponApply){
            $(".coupon-wrapper").removeAttr("hidden");
            let couponAmount = 0;
            let totalProductPrice = $("#totalProductPrice").text();
            let finalPrice = 0;

            if(checkCouponApply.coupon_type == "Percentage"){
               
               couponAmount = (parseFloat(totalProductPrice) / 100) * parseFloat(checkCouponApply.coupon_amount_and_percentage);
               finalPrice = parseFloat($("#totalProductPrice").text()) - parseFloat(couponAmount) + parseFloat($("#shippingCharges").text());
              
            }else{
               couponAmount = parseFloat(checkCouponApply.coupon_amount_and_percentage);
               finalPrice = parseFloat($("#totalProductPrice").text()) - parseFloat(couponAmount) + parseFloat($("#shippingCharges").text());
            }

            $("#couponAmount").text(couponAmount.toFixed(2));
            $("#finalPrice").text(parseFloat(finalPrice).toFixed(2));
            $(".applyCoupon[coupon_id="+checkCouponApply.id+"]").text("Remove");
         }else{

            let finalPrice = 0;
            finalPrice = parseFloat($("#totalProductPrice").text()) + parseFloat($("#shippingCharges").text());
            
            $("#finalPrice").text(parseFloat(finalPrice).toFixed(2));
         }
     }
   </script>


   <script type="text/javascript">
     function updateProductInCart(productID, count){
        let productInCart = JSON.parse(localStorage.getItem('productInCart'));
        let totalProductPrice = $("#totalProductPrice").text();
         let getProduct = [];
         if(productID){
            getProduct = productInCart.filter(function(item) {
            
              if(item["id"] == productID){
                item['selected_quantity'] = count;
                item['calculate_price'] = totalProductPrice;
              }

              return item;
            });

            let stringify = JSON.stringify(getProduct);

             localStorage.setItem('productInCart',stringify);


           // console.log(getProduct);
         }
     }
   </script>

@endsection()