<!DOCTYPE html>
<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Reject Order</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <style>
        .mm {
            margin: 0 30px 30px;
        }
        
     

    </style>
</head>

<body>
    <center style="max-width: 600px;margin:45px auto 0 0;font-family: 'Poppins', sans-serif;">
        <table style="width: 100%;background-color: #fff;" class="main-table">
            <tr>
                <td style="text-align: center;padding: 22px;">
                    <img src="{{$message->embed($logo)}}" alt="logo" class="logo-img" style="max-width: 150px;">
                </td>
            </tr>
            <tr>
                <td>
                    <div class="mm">
                        <table style="background-color: #fff;border: 1px solid #dfdfdf;padding: 25px;
                    border-radius: 10px;box-shadow: 0 0 25px #1111111a;margin:auto;width:100%;min-width: 320px;" class="inner-table">
                            <tr>
                                <td style="text-align: center;">
                                    <img src="{{$message->embed($logo)}}" style="width:100px;" alt="logo">
                                    <h4 style="font-size:20px;font-weight:600;margin: 0;color: #211f54;line-height:30px">Hello {{$find_order->BillingShippingAddress->first_name}} {{$find_order->BillingShippingAddress->last_name}}</h4>
                                    <p style="color: #454860;margin: 0;font-size: 14px;text-align: center;line-height:30px  ">Your order ({{$find_order->unique_order_id}}) has been rejected by admin.</p>
                                </td>
                            </tr>

                            <tr>
                                <td align="left" valign="top" style="padding-left: 20px;font-family:arial, sans-serif; font-size:14px; color:#474747;">

                            <span style="display: block;"> <b style="color: #256cc5; display: block; font-size:20px;">Order Details:</b></span><br>
                            <span style="display: block;"> <b style="padding-left: 0px !important;">Order ID</b>: {{$find_order->unique_order_id}} </br></span> <br>
                                
                                @if($find_order->coupon_type != 'None')
                                <span style="display: block;"><b style="padding-left: 0px !important; ">Coupon Code</b>:<span style="padding-left: 0px;"> {{$find_order->coupon_code}}</span></span> 
                                <br>

                                <span style="display: block;"><b style="padding-left: 0px !important; ">Discount Amount</b>:<span style="padding-left: 0px;"> {{$find_order->discount_amount_for_coupon}}</span></span> 
                                <br>
                                @endif()

                                <span style="display: block;"><b style="padding-left: 0px !important; ">Shipping Charges</b>:<span style="padding-left: 0px;"> ₹{{$find_order->shipping_charger}}</span></span> 
                                <br>

                                <span style="display: block;"><b style="padding-left: 0px !important; ">Total Amount</b>:<span style="padding-left: 0px;"> ₹{{$find_order->total_amount}}</span></span> 
                                <br>

                                <span style="display: block;"><b style="padding-left: 0px !important; ">Payment Type</b>:<span style="padding-left: 0px;"> {{$find_order->payment_type}}</span></span> 
                                <br>

                                <span style="display: block;"><b style="padding-left: 0px !important; ">Pay Amount</b>:<span style="padding-left: 0px;"> ₹{{$find_order->pay_amount}}</span></span> 
                                <br><br>

                                <span style="display: block;"> <b style="color: #256cc5; display: block; font-size:20px;">Product Details:</b></span><br>
                                
                                @foreach($find_order->productOrders as $product)
                                <div class="box-mail" style="border-radius: 5px;border: 2px solid #dfdfdf;padding: 5px; margin-bottom:10px;">
                                    <span style="display: block;"> <b style="padding-left: 0px !important;">Product Name</b>: {{$product->product_name}} </br></span> <br>

                                    <span style="display: block;"> <b style="padding-left: 0px !important; ">Product Price</b>: ₹{{$product->product_price}} </br></span> <br>

                                    <span style="display: block;"> <b style="padding-left: 0px !important; ">Attribute</b>: {{$product->attribute_value}}({{$product->attribute_name}}) </br></span> <br>

                                    <span style="display: block;"> <b style="padding-left: 0px !important; ">Quantity</b>: {{$product->quantity}} </br></span> <br>

                                    <span style="display: block;"> <b style="padding-left: 0px !important; ">Amount</b>: ₹{{$product->calculated_amount}} </br></span> <br>
                                </div>
                                @endforeach()



                                </td>
                            </tr>
                            
                           
                        </table>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="text-align: center;padding: 22px;padding: 0px 34px 30px 34px;">
                    <h5 style="color:#211f54;font-size:17px;font-weight:600;margin:0;border-top:1px solid #dfdfdf;padding-top: 38px;line-height:30px">
                        Rock</h5>
                    <a href="javascript:void(0);" target="_blank" style="color: #626DE9;margin: 0;font-weight: 500;text-decoration:none;">
                        rock.com</a>
                </td>
            </tr>
        </table>
    </center>
</body>

</html>