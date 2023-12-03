@extends('website.layout.layout')
@section('title','Black Rooster')

@section('content')




<style>
    .nav-pills-custom .nav-link {
    color: #aaa;
    background: #fff;
    position: relative;
}

a.action-button.openOrderDetailsModel {
    text-align: center;
    display: flex;
    justify-content: center;
}


.nav-pills-custom .nav-link.active {
    color: #ffffff !important;
    background: #fdbd3e !important;
    font-weight: 600 !important;
}

img.productImage {
    width: 50px;
    height: 50px;
    object-fit: cover;
}

.gradient-custom {
    /* fallback for old browsers */
    background: transparent;
}

a.invoiceSRC {
    font-size: 14px;
    color: #5e5eff;
    font-weight: 500;
}


/* Add indicator arrow for the active tab */
@media (min-width: 992px) {
    .nav-pills-custom .nav-link::before {
        content: '';
        display: block;
        border-top: 8px solid transparent;
        border-left: 10px solid #fff;
        border-bottom: 8px solid transparent;
        position: absolute;
        top: 50%;
        right: -10px;
        transform: translateY(-50%);
        opacity: 0;
    }
}


@media (min-width: 1200px) {
    .flex-wrr .ms-xl-5 {
        margin-left: 2rem!important;
        display: flex;
        justify-content: center;
        flex: 1;
        margin-right: 30px;
        flex-wrap: nowrap;
    }
}


.nav-pills-custom .nav-link.active::before {
    opacity: 1;
}

</style>

<div class="inner-slider-wrapper float_left">
      <div class="container">
         <div class="inner-caption">
            <h4>Track Order</h4>
            <img src="{{url('public/website/images/title.png')}}" alt="img">
         </div>
         <ol class="breadcrumb sicon">
            <li><a href="{{route('index')}}">Home</a></li>
            <li class="active">Track Order</li>
         </ol>
         <!-- <img class="meat" src="{{url('public/website/images/title-bottom.png')}}" alt="img"> -->
      </div>
   </div>


   <section class="h-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-10 col-xl-8" style="margin-top:50px;">
                <div class="card" style="border-radius: 10px;">
                <div class="card-header px-4 py-5">
                    <h5 class="text-muted mb-0">Thanks for your Order, <span style="color: #fdbd3e;" class="orderName"></span>!</h5>
                </div>
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                    <p class="lead fw-normal mb-0" style="color: #fdbd3e;">Order Details <a class="invoiceSRC" target="_blank" href="javascript:void(0);">(Click to view invoice)</a></p>
                    <p class="small text-muted mb-0">Order ID : <span class="orderID"></span></p>
                    </div>

                    <div class="appendModelProducts">
                        
                    </div>

                    <div class="d-flex justify-content-between pt-2">
                    <p class="fw-bold mb-0">Order Details</p>
                    <p class="text-muted mb-0"><span class="fw-bold me-4">Total</span><span class="productAmountT"></span></p>
                    </div>

                    <div class="d-flex justify-content-between pt-2">
                    <p class="text-muted mb-0">Order ID : <span class="orderID"></span></p>
                    <p class="text-muted mb-0"><span class="fw-bold me-4">Discount</span><span class="discountAmount"></span></p>
                    </div>

                    <div class="d-flex justify-content-between">
                    <p class="text-muted mb-0"></p>
                    <p class="text-muted mb-0"><span class="fw-bold me-4">Shipping Charges</span><span class="shippingCharges"></span></p>
                    </div>

                    <!-- <div class="d-flex justify-content-between mb-5">
                    <p class="text-muted mb-0">Recepits Voucher : 18KU-62IIK</p>
                    <p class="text-muted mb-0"><span class="fw-bold me-4">Delivery Charges</span> Free</p>
                    </div> -->
                </div>
                <div class="card-footer border-0 px-4 py-5"
                    style="background-color: #fdbd3e; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
                    <h5 class="d-flex align-items-center justify-content-end text-white text-uppercase mb-0">Total
                    paid: <span class="h2 mb-0 ms-2"><span class="totalAmountPaid"></span></span></h5>
                </div>
                </div>
            </div>
            </div>
        </div>
        </section>


   

@endsection()

@section('js')

<script>

    $(document).ready(function(){
        let orderDetails = <?php echo $getOrderDetails; ?>;

            console.log("",orderDetails)

            $(".orderName").text(orderDetails.billing_shipping_address.billing_first_name + " " + orderDetails.billing_shipping_address.billing_last_name)
            $(".orderID").text(orderDetails.unique_order_id);


            let htm="";

            for(let k=0; k<orderDetails.product_orders.length; k++){

                let line_value = 0;
                if(orderDetails.order_status == "Pending" || orderDetails.order_status == "Rejected"){
                    line_value = 18;
                }else if(orderDetails.order_status == "Accepted"){
                    line_value = 43;
                }else if(orderDetails.order_status == "Shipped"){
                    line_value = 71;
                }else if(orderDetails.order_status == "Completed"){
                    line_value = 100;
                }
                let product_default_image = "";

                orderDetails.product_orders[k].product.product_images.map(function(p){
                    if(p.is_featured_image == 1){
                        product_default_image = p.product_image;
                    }
                })

                htm += `<div class="card shadow-0 border mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <img class="productImage" src="`+product_default_image+`" class="img-fluid" alt="Product Image"/>
                                    </div>
                                    <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                        <p class="text-muted mb-0 productName">`+orderDetails.product_orders[k].product_name+`</p>
                                    </div>

                                    <div class="col-md-3 text-center d-flex justify-content-center align-items-center">
                                        <p class="text-muted mb-0 small productAttributeNameValue">`+orderDetails.product_orders[k].attribute_name+`: `+orderDetails.product_orders[k].attribute_value+`</p>
                                    </div>
                                    
                                
                                    <div class="col-md-3 text-center d-flex justify-content-center align-items-center">
                                        <p class="text-muted mb-0 small productQuantity">Quantity: `+orderDetails.product_orders[k].quantity+`</p>
                                    </div>
                                    <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                        <p class="text-muted mb-0 small productPrice">Price: ₹`+orderDetails.product_orders[k].sale_price+`</p>
                                    </div>
                                </div>
                                <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">
                                <div class="row d-flex align-items-center">
                                <div class="col-md-2">
                                    <p class="text-muted mb-0 small">Track Order</p>
                                </div>
                                <div class="col-md-10">
                                    <div class="progress" style="height: 6px; border-radius: 16px;">
                                    <div class="progress-bar" role="progressbar"
                                        style="width: `+line_value+`%; border-radius: 16px; background-color: #fdbd3e;" aria-valuenow="`+line_value+`"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="d-flex justify-content-around mb-1 flex-wrr">
                                    <p class="text-muted mt-1 mb-0 small ms-xl-5">Pending</p>
                                    <p class="text-muted mt-1 mb-0 small ms-xl-5">Accepted</p>
                                    <p class="text-muted mt-1 mb-0 small ms-xl-5">Shipped</p>
                                    <p class="text-muted mt-1 mb-0 small ms-xl-5">Delivered</p>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>`;
            }

            
            $(".appendModelProducts").html(htm);

            $(".productAmountT").text("₹"+orderDetails.total_amount);
            $(".discountAmount").text("₹"+orderDetails.discount_amount_for_coupon);
            $(".shippingCharges").text("₹"+orderDetails.shipping_charger);
            $(".totalAmountPaid").text("₹"+orderDetails.pay_amount);

            $(".invoiceSRC").attr("href","{{url('invoice')}}" + "/" + btoa(orderDetails.id));
    })

</script>
@endsection()
