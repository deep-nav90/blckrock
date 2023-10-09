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
            <form id="resetPassword" class="login_form">
                    {{ csrf_field() }}

                    {{-- Password field --}}
                    <div class="input-group">
                        <div class="form-group password position-relative">
                            <label><img src="{{url('images/icon-2.png')}}" alt=""></label>
                            <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" placeholder="{{ __('adminlte::adminlte.password') }}" id="password">
                             <span class="btn-show-pass"><i class="bi-eye" id="togglePassword"></i></span>
                        </div>

                        @if($errors->has('password'))
                            <div class="error-msg">
                                <p>{{ $errors->first('password') }}</p>
                            </div>
                        @endif
                    </div>


                    <div class="input-group">
                        <div class="form-group password position-relative">
                            <label><img src="{{url('images/icon-2.png')}}" alt=""></label>
                            <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="confirm_password" placeholder="{{ __('adminlte::adminlte.password') }}" id="confirm_password">
                             <span class="btn-show-pass"><i class="bi-eye" id="togglePassword1"></i></span>
                        </div>

                        @if($errors->has('confirm_password'))
                            <div class="error-msg">
                                <p>{{ $errors->first('confirm_password') }}</p>
                            </div>
                        @endif
                    </div>
                    

                    


                    {{-- Login field --}}
                    <div class="row">
                        <div class="col-12">
                            <button type=submit id="confirmPasswordBtn" class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
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

<script type="text/javascript">
    const togglePassword = document.querySelector('#togglePassword');
    const togglePassword1 = document.querySelector('#togglePassword1');
</script>

<script type="text/javascript">
    togglePassword.addEventListener('click', function (e) {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        // toggle the eye / eye slash icon
        if($(this).hasClass('bi bi-eye-slash')){
            $(this).addClass('bi-eye');
            $(this).removeClass('bi bi-eye-slash');
        }else{
            $(this).removeClass('bi-eye');
            $(this).addClass('bi bi-eye-slash');
        }
    });

    togglePassword1.addEventListener('click', function (e) {
        // toggle the type attribute
        const type1 = confirm_password.getAttribute('type') === 'password' ? 'text' : 'password';
        confirm_password.setAttribute('type', type1);
        // toggle the eye / eye slash icon
        if($(this).hasClass('bi bi-eye-slash')){
            $(this).addClass('bi-eye');
            $(this).removeClass('bi bi-eye-slash');
        }else{
            $(this).removeClass('bi-eye');
            $(this).addClass('bi bi-eye-slash');
        }
    });
</script>


<script>
        $('#resetPassword').validate({
            ignore: [],
            debug: false,
            rules: {
                password: {
                    required: true
                },
                confirm_password : {
                    required : true,
                    equalTo : "#password"
                }
            },
            messages: {
                password: {
                    required: "The Password field is required.",
                },
                confirm_password: {
                    required: "The Confirm Password field is required.",
                    equalTo : "Confirm Password & Password must be same."
                }
            },
            submitHandler:function(form){
                $("#lodaerModal").modal("show");
                $("#confirmPasswordBtn").attr('disabled', "true");

                var data = {
                '_token': "{{csrf_token()}}",
                'password': $("#password").val(),
                'confirm_password' : $("#confirm_password").val()
                };

                $.ajax({
                    url:"{{route('adminResetPassword',$token)}}",
                    type:'POST',
                    data:data,
                    success: function(res){
                        console.log(res);
                        

                        if(res.status == "true"){
                            
                            swal({
                                title: "Information",
                                text: res.message,
                                type: "success",
                                showCancelButton: false,
                            }, function(willDelete) {
                                window.location.href="{{route('admin_home')}}";
                            });
                            
                        }else{
                            swal("Alert", res.message, "error");
                        }

                        setTimeout(() => {
                            $("#lodaerModal").modal("hide");
                            $("#confirmPasswordBtn").removeAttr('disabled');
                            $("#password").val("");
                            $("#confirm_password").val("");
                        }, 500);

                        
                        
                        
                    },
                    error: function(data, textStatus, xhr) {
                        if(data.status == 422){
                        
                        } 
                        
                        
                        
                        swal("Alert", "Something went wrong. Please try again.", "error");

                        setTimeout(() => {
                            $("#lodaerModal").modal("hide");
                            $("#confirmPasswordBtn").removeAttr('disabled');
                            $("#password").val("");
                            $("#confirm_password").val("");
                        }, 500);
                        
                        


                    }
                });
                //form.submit();
            }
        });
    </script>
@stop