<!DOCTYPE html>
<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Contact Us</title>
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
                                    <h4 style="font-size:20px;font-weight:600;margin: 0;color: #211f54;line-height:30px">Hello Admin</h4>
                                    <p style="color: #454860;margin: 0;font-size: 14px;text-align: center;line-height:30px  ">Your have received new Contact Us request from {{$data['name']}}</p>
                                </td>
                            </tr>

                            <tr>
                                <td align="left" valign="top" style="padding-left: 20px;font-family:arial, sans-serif; font-size:14px; color:#474747;">

                            <span style="display: block;"> <b style="color: #256cc5; display: block; font-size:20px;">Contact Us Details:</b></span><br>
                            <span style="display: block;"> <b style="padding-left: 0px !important;">Name</b>: {{$data['name']}} </br></span> <br>
                                
                               

                                <span style="display: block;"><b style="padding-left: 0px !important; ">Email</b>:<span style="padding-left: 0px;"> {{$data['email']}}</span></span> 
                                <br>

                                <span style="display: block;"><b style="padding-left: 0px !important; ">Phone No</b>:<span style="padding-left: 0px;"> {{$data['phone']}}</span></span> 
                                <br>

                                <span style="display: block;"><b style="padding-left: 0px !important; ">Message</b>:<span style="padding-left: 0px;"> {{$data['message']}}</span></span> 
                                <br>

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