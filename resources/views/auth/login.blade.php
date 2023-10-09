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
            <form action="{{ $login_url }}" method="post" id="loginForm" class="login_form">
                    {{ csrf_field() }}

                    {{-- Email field --}}
                    <div class="input-group">
                        <div class="form-group email position-relative">
                            <label><img src="{{url('images/icon.png')}}" alt=""></label>
                            <input type="email" id="login_email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email"  value="{{ old('email') }}" placeholder="{{ __('adminlte::adminlte.email') }}" autofocus placeholder="Email address" >
                        </div>

                        @if($errors->has('email'))
                            <div class="error-msg">
                                <p>{{ $errors->first('email') }}</p>
                            </div>
                        @endif
                    </div>

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

                    <div class="form-group forgotPasswordLoginPage">
                        <a class="anchorTag" href="{{url('/admin/forgot-password')}}">Forgot Password?</a>
                    </div>


                    {{-- Login field --}}
                    <div class="row">

                        <div class="col-12">
                            <button type=submit class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
                                {{ __('adminlte::adminlte.log_in') }}
                            </button>
                        </div>
                    </div>
                </form>
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
</script>
@stop