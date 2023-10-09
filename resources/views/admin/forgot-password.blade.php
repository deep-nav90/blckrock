@extends('adminlte::auth.auth-page', ['auth_type' => 'login'])

@section('adminlte_css_pre')
    <link rel="stylesheet" href="{{ asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@stop

@php( $login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login') )
@php( $register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register') )
@php( $password_reset_url = View::getSection('password_reset_url') ?? config('adminlte.password_reset_url', 'password/reset') )

@if (config('adminlte.use_route_url', false))
    @php( $login_url = $login_url ? route($login_url) : '' )
    @php( $register_url = $register_url ? route($register_url) : '' )
    @php( $password_reset_url = $password_reset_url ? route($password_reset_url) : '' )
@else
    @php( $login_url = $login_url ? url($login_url) : '' )
    @php( $register_url = $register_url ? url($register_url) : '' )
    @php( $password_reset_url = $password_reset_url ? url($password_reset_url) : '' )
@endif


@section('auth_body')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

    <div class="login_wrap">
        <div class="right">
        <div class="login-logo-inner">
            <a href="#">
                <img class="logoIMG" src="{{asset('images/Logo.png')}}">
                <b></b>
            </a>
            
            </div>
            <form id="forgotPassword" class="login_form">
                    {{ csrf_field() }}

                    {{-- Email field --}}
                    <div class="input-group">
                        <div class="form-group email position-relative">
                            <label><img src="{{url('images/icon.png')}}" alt=""></label>
                            <input type="email" id="forgot_email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email"  value="{{ old('email') }}" placeholder="{{ __('adminlte::adminlte.email') }}" autofocus placeholder="Email address" >
                        </div>

                        @if($errors->has('email'))
                            <div class="error-msg">
                                <p>{{ $errors->first('email') }}</p>
                            </div>
                        @endif
                    </div>

                    

                    


                    {{-- Login field --}}
                    <div class="row">
                        <div class="col-12">
                            <button type=submit id="forgotPasswordBtn" class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
        </div>
    </div>

<div class="modal fade" id="lodaerModal" tabindex="-1" role="dialog" aria-labelledby="lodaerModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     
      <img src="{{url('public/loading-buffering.gif')}}" style="width: 50px; height:50px;">
     
  </div>
</div>

@stop

@section('css')
@stop

@section('js')
<script type="text/javascript">
    $("#login_email").keyup(function(){
        $(".error-msg").hide()
    });
</script>


<script>
        $('#forgotPassword').validate({
            ignore: [],
            debug: false,
            rules: {
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                email: {
                    required: "The Email field is required.",
                    email: "Please enter a valid Email"
                }
            },
            submitHandler:function(form){
                $("#lodaerModal").modal("show");
                $("#forgotPasswordBtn").attr('disabled', "true");

                var data = {
                '_token': "{{csrf_token()}}",
                'email': $("#forgot_email").val()
                };

                $.ajax({
                    url:"{{route('adminForgotPassword')}}",
                    type:'POST',
                    data:data,
                    success: function(res){
                        console.log(res);
                        

                        if(res.status == "true"){
                            
                            swal("Information", res.message, "success");
                        }else{
                            swal("Alert", res.message, "error");
                        }

                        setTimeout(() => {
                            $("#lodaerModal").modal("hide");
                            $("#forgotPasswordBtn").removeAttr('disabled');
                            $("#forgot_email").val("");
                        }, 500);

                        
                        
                        
                    },
                    error: function(data, textStatus, xhr) {
                        if(data.status == 422){
                        
                        } 
                        
                        
                        
                        swal("Alert", "Something went wrong. Please try again.", "error");

                        setTimeout(() => {
                            $("#lodaerModal").modal("hide");
                            $("#forgotPasswordBtn").removeAttr('disabled');
                        }, 500);

                        


                    }
                });
                //form.submit();
            }
        });
    </script>
@stop