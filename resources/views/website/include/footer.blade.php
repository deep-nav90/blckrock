<!-- footer section start -->
<?php 
   $product_find_id = "";
   if(isset($productFind)){
      $product_find_id = $productFind->id;
   }else{
      $product_find_id = "";
   }
   
?>
   <div class="footer-main-wrapper float_left ptb-100">
      <div class="container">
         <div class="row">
            <div class="col-lg-5 col-md-6 col-sm-12">
               <div class="link">
                  <span>Call Now</span>
                  <h4>+91 828 8800 857</h4>
                  <span>Get Special Email Offers</span><br>
                  <span> info@blackroosterindia.com</span>
                  <div class="line">
                     <img src="{{url('public/website/images/4.png')}}" alt="line">
                    
                  </div>

                  <!-- <div class="input-filed">
                     <input type="email" placeholder="Your Email">
                     <button>Join Us</button>
                  </div> -->
               </div>
            </div>
            <div class="col-lg-4 col-md-3 col-sm-12 col-xs-12">
               <div class="widgettitle">
                  <h4>Our Service</h4>
                  <div class="line">
                     <img src="{{url('public/website/images/4.png')}}" alt="line">
                  </div>
                  <div class="link-page">
                     <ul>
                        <li>
                           <a href="{{route('aboutUS')}}">About Us</a>
                        </li>
                        <li>
                           <a href="{{route('allProducts')}}">Our Products</a>
                        </li>
                        
                        <li>
                           <a href="javascript:void(0);">Terms & Conditions</a>
                        </li>
                        <li>
                           <a href="javascript:void(0);">Privacy Policy</a>
                        </li>

                     </ul>
                  </div>
               </div>
            </div>
            <!-- <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
               <div class="widgettitle">
                  <h4>Our Story</h4>
                  <div class="line">
                     <img src="{{url('public/website/images/4.png')}}" alt="line">
                  </div>
                  <div class="link-page">
                     <ul>
                        <li>
                           <a href="blog-left-sidebar.html">Blog Left Sidebar</a>
                        </li>
                        <li>
                           <a href="blog-right-sidebar.html">Blog Right Sidebar</a>
                        </li>
                        <li>
                           <a href="blog-single-left-sidebar.html">Blog Single Left Sidebar</a>
                        </li>
                        <li>
                           <a href="blog-single-right-sidebar.html">Blog Single Right Sidebar</a>
                        </li>
                        <li>
                           <a href="privacy.html">Privacy</a>
                        </li>
                        <li>
                           <a href="terms.html">Terms of Use</a>
                        </li>
                     </ul>
                  </div>
               </div>
            </div> -->
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
               <div class="widgettitle">
                  <h4>Our Story</h4>
                  <div class="line">
                     <img src="{{url('public/website/images/4.png')}}" alt="line">
                  </div>
                  <div class="link-page">
                     <div class="img-ftr">
                        <div class="small-img"> <img src="{{url('public/website/images/s1.jpg')}}" alt="img"> </div>
                        <div class="small-img"> <img src="{{url('public/website/images/s1.jpg')}}" alt="img"> </div>
                        <div class="small-img"> <img src="{{url('public/website/images/s1.jpg')}}" alt="img"> </div>
                        <div class="small-img"> <img src="{{url('public/website/images/s1.jpg')}}" alt="img"> </div>
                        <div class="small-img"> <img src="{{url('public/website/images/s1.jpg')}}" alt="img"> </div>
                        <div class="small-img"> <img src="{{url('public/website/images/s1.jpg')}}" alt="img"> </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="copy-right-wrapper float_left">
      <div class="container">
         <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12 col-12">
               <div class="copy-social">
                  <ul>
                     <li>
                        <a href="javascript:;"><i class="fab fa-facebook-f"></i></a>
                     </li>
                     <!-- <li>
                        <a href="javascript:;"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                     </li> -->
                     <!--<li>-->
                     <!--   <a href="javascript:;"><i class="fab fa-google" aria-hidden="true"></i></a>-->
                     <!--</li>-->
                     <li>
                        <a href="https://wa.me/+918288800857" target="_blank"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
                     </li>
                     <li>
                        <a href="https://www.instagram.com/blackroosterindia/" target="_blank"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                     </li>
                     <!-- <li>
                        <a href="javascript:;"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a>
                     </li> -->
                  </ul>
               </div>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12 col-12">
               <div class="copy-right">
                  <p>Copyright {{date('Y')}} © </p>
                  <a href="javascript:;">Black Rooster</a>
                  
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- footer section end -->
   <!-- Side Panel -->
   <script src="{{url('public/website/js/jquery-3.6.0.min.js')}}"></script>
   <script src="{{url('public/website/js/bootstrap.min.js')}}"></script>
   <script src="{{url('public/website/js/wow.js')}}"></script>
   <script src="{{url('public/website/js/counter.js')}}"></script>
   <script src="{{url('public/website/js/tesi.js')}}"></script>
   <script src="{{url('public/website/js/testi.js')}}"></script>
   <script src="{{url('public/website/js/tabs.js')}}"></script>
   <script src="{{url('public/website/js/jquery.magnific-popup.js')}}"></script>
   <script src="{{url('public/website/js/isotope.pkgd.min.js')}}"></script>
   <script src="{{url('public/website/js/custom.js')}}"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

   <!-- custom js-->
   <script>
      new WOW().init();
   </script>
   <!-- tabs -->

   

   <script type="text/javascript">
      $(document).ready(function(){

         $("#logoutBtn").on("click",function(){
            Swal.fire({
              title: 'Alert',
              text: "Are you sure you want to logout?",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Ok',
              allowOutsideClick: false
            }).then((result) => {
              if (result.isConfirmed) {
                  

                  window.location.href = "{{route('logout')}}";
              }
            })
         })


         setTimeout(function(){
            navBarCartProduct();
         },500);


         $(document).on("click",".cross_cart_product",function(){
            
            let productInCart = JSON.parse(localStorage.getItem('productInCart'));
            let currentProductID = $(this).attr('product_id');
            let findInArrayAfterRemove = productInCart.filter(function(item) {
               
                 return item["id"] != currentProductID;
            });

            if(findInArrayAfterRemove.length > 0){
               let stringify = JSON.stringify(findInArrayAfterRemove);

               localStorage.setItem('productInCart',stringify);
            }else{
               localStorage.removeItem('productInCart');
            }
            

            navBarCartProduct();

            //console.log(findInArrayAfterRemove)

         })
      })

      function navBarCartProduct(){
         //CHECK PRODUCT ADDED IN CART
            let productInCart = JSON.parse(localStorage.getItem('productInCart'));

            if(productInCart){
               $(".haveCartItem").removeAttr("hidden");
               // let currentProductID = "{{$product_find_id}}";
               // let findInArray = [];
               // if(currentProductID){
               //    findInArray = productInCart.filter(function(item) {
                  
               //      return item["id"] == currentProductID;
               //    });
               // }else{
               //    findInArray = productInCart;
               // }
               

               // if(findInArray.length > 0){
               //    let productDetail = findInArray[0];
               //    $(".multiplyBy").text(productDetail.selected_quantity);
               //    $(".single_page_sales_price").text(parseFloat(productDetail.calculate_price).toFixed(2));
                  
               //    $("#quantity").val(productDetail.selected_quantity);
               //    $("#addToCartBtn").text("View Cart").attr("link_add","added");

               //    let selected_product_price_attribute_id = productDetail.selected_product_price_attribute;
               //    $(".attribute_v_n.active").removeClass("active").attr("is_default_show","false");
               //    $(".attribute_v_n[data-id='"+selected_product_price_attribute_id+"']").trigger("click");
               //    //console.log("sss", productDetail)
               // }


               let htmlCartUL = '';
               let htmlCartULMobile = '';

               htmlCartUL += `<li>
                                 <span>`+productInCart.length+` Item</span>
                                 <a href="{{route('viewCart')}}"> View Cart</a>
                              </li>`;

               htmlCartULMobile = `<p>`+productInCart.length+` Item <span>View Cart</span> </p>`;

               let subTotal = 0;
               productInCart.map(function(e){

                  subTotal = subTotal + parseFloat(e.calculate_price);
                  let featuredImg = '';

                  e.product_images.map(function(k){
                     if(k.is_featured_image == 1){
                        featuredImg = k.product_image;
                     }
                  })
                  htmlCartUL += `<li class="cart_list">
                                       <div class="select_cart">
                                          <a href="javascript:void(0);">`+e.product_name+`</a>
                                          <span>`+e.selected_quantity+` x ₹`+e.calculate_price+`</span>
                                       </div>
                                       <div class="select_img">
                                          <img alt="img" src="`+featuredImg+`">
                                          <div class="close_btn cross_cart_product" product_id="`+e.id+`">
                                             <i class="fa fa-times"></i>
                                          </div>
                                       </div>
                                    </li>`;

                  htmlCartULMobile += `<div class="cart-list">
                                       <h5>`+e.product_name+`<span>`+e.selected_quantity+` x ₹`+e.calculate_price+`</span></h5>
                                    </div>
                                    <div class="cart-right">
                                       <img alt="img" src="`+featuredImg+`">
                                          <div class="close_btn cross_cart_product" product_id="`+e.id+`">
                                             <i class="fa fa-times"></i>
                                          </div>
                                    </div>`;
               })
               
               htmlCartUL += `<li class="sub_total">
                                       <p>Sub Total:<span>₹ `+subTotal+`</span></p>
                                    </li>
                                    <li class="cart_btn">
                                       <a href="{{route('viewCart')}}"><i class="fas fa-shopping-cart"></i>&nbsp; View Cart</a>
                                       <a href="{{route('checkout')}}"><i class="fas fa-share"></i>&nbsp; Checkout</a>
                                    </li>`;
               htmlCartULMobile += `<p>Sub Total: <span>₹ `+subTotal+`</span> </p>
                                    </div>
                                    <div class="btn-cart">
                                       <a href="{{route('viewCart')}}"><i class="fas fa-shopping-cart"></i>&nbsp; View Cart</a>
                                       <a href="{{route('checkout')}}"><i class="fas fa-share"></i>&nbsp; Checkout</a>
                                   </div>`;
               $(".cartUL").html(htmlCartUL);
               $(".cartULMobile").html(htmlCartULMobile);

            }else{
               $(".haveCartItem").attr("hidden","true");
               $(".cartUL").html(`<li>
                                       <span>0 Item</span>
                                       <a href="{{route('viewCart')}}"> View Cart</a>
                                    </li>`);
               $(".cartULMobile").html(`<p>0 Item <span>View Cart</span> </p>`);
            }

            //END OF CODE FOR CHECK CART AND UPDATE
      }
   </script>



   <script type="text/javascript">
      $(document).ready(function(){
         $(document).on("click",".AddCartAnchorTab",function(){
            let checkAddedInCard = $(this).attr("is_added_in_cart");
            if(checkAddedInCard == "false"){
               

               console.log($(this).attr("product_details"))

               let product_detail = JSON.parse($(this).attr("product_details"));
               // console.log(product_detail);
               // return false;
               let selected_quantity = 1;
               let calculate_price = product_detail.default_sale_price;
               let selected_product_price_attribute = product_detail.id;
               //alert(selected_product_price_attribute)

               product_detail.selected_quantity = selected_quantity;
               product_detail.calculate_price = calculate_price;
               product_detail.selected_product_price_attribute = selected_product_price_attribute;
               product_detail.selected_attribute_value = product_detail.default_attribute_value;
               product_detail.selected_attribute_name = product_detail.default_attribute_name;
               product_detail.selected_sale_price = product_detail.default_sale_price;
               //alert(product_detail.selected_sale_price)
               product_detail.selected_product_price = product_detail.default_product_price;



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



               $(this).text("View Cart").attr('is_added_in_cart',"true");

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
                  
                  let stringify = JSON.stringify(productInCart);
                  localStorage.setItem('productInCart',stringify);
                  navBarCartProduct();
                }
              })




            }else{
               //for true case

               let base64_encode = btoa($(this).attr('product_id'));
               let url = '{{ route("singleProductDetails", ":id") }}';
               url = url.replace(':id', base64_encode);

               window.location.href = url;
               //alert(url)

               
            }
         });


         checkAlreadyAddedInCart();

      })


      function checkAlreadyAddedInCart(){
         let productInCart = JSON.parse(localStorage.getItem('productInCart'));
         console.log("checkcccccc", productInCart)

         if(productInCart){
            productInCart.map(function(k){
               let p_id = k.id;
               $(".AddCartAnchorTab[product_id='"+p_id+"']").attr('is_added_in_cart',"true").text("View Cart");
            })
         }

         
      }
   </script>

   <script>
      $(document).ready(function(){
         $(document).on("click",".categorySelectLi",function(){
            let categoryID = $(this).data("id");
            localStorage.setItem("category_id_selected", categoryID);

            window.location.href = "{{route('allProducts')}}";
         })

         
         let category_id_selected = localStorage.getItem('category_id_selected');
         if(category_id_selected){
            $(".categorySelectLi").removeClass("active_cat");
            $(".categorySelectLi[data-id='"+category_id_selected+"']").addClass("active_cat");
            
         }
      })
      
   </script>

   <script>
      $(document).ready(function(){
         $(document).on("click",".clickOnDropDownNavBar",function(){
            let clickON = $(this).attr("id");
            localStorage.setItem("clickOnDropDownNavBar",clickON);
            

            if(clickON == "myAccount" || clickON == "myOrders" || clickON == "changePassword"){
               window.location.href = "{{route('accountDetails')}}";
            }
         });

         $(".shopClick").on("click",function(){
            localStorage.setItem("category_id_selected", "0");
            window.location.href = "{{route('allProducts')}}";
         })
         
      })
   </script>
   

   @yield('js')

   <script async src='https://d2mpatx37cqexb.cloudfront.net/delightchat-whatsapp-widget/embeds/embed.min.js'></script>
   <script>
      var wa_btnSetting = {"btnColor":"#16BE45","ctaText":"WhatsApp Us","cornerRadius":40,"marginBottom":20,"marginLeft":20,"marginRight":85,"btnPosition":"right","whatsAppNumber":"918288800857","welcomeMessage":"Hello","zIndex":999999,"btnColorScheme":"light"};
      var wa_widgetSetting = {"title":"Ella","subTitle":"Typically replies in a hour","headerBackgroundColor":"#FBFFC8","headerColorScheme":"dark","greetingText":"Hi there! \nHow can I help you?","ctaText":"Start Chat","btnColor":"#1A1A1A","cornerRadius":40,"welcomeMessage":"Hello","btnColorScheme":"light","brandImage":"https://uploads-ssl.webflow.com/5f68a65cd5188c058e27c898/6204c4267b92625c9770f687_whatsapp-chat-widget-dummy-logo.png","darkHeaderColorScheme":{"title":"#333333","subTitle":"#4F4F4F"}};  
      window.onload = () => {
      _waEmbed(wa_btnSetting, wa_widgetSetting);
      };
   </script>


      
   
</body>

</html>