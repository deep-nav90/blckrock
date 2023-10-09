<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    {{-- Base Meta Tags --}}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Custom Meta Tags --}}
    @yield('meta_tags')

    {{-- Title --}}
    <title>
       {{-- @yield('title_prefix', config('adminlte.title_prefix', ''))
        @yield('title', config('adminlte.title', 'AdminLTE 3'))
        @yield('title_postfix', config('adminlte.title_postfix', '')) --}}
        Rock
    </title>

    {{-- Custom stylesheets (pre AdminLTE) --}}
    @yield('adminlte_css_pre')

    {{-- Base Stylesheets --}}
    @if(!config('adminlte.enabled_laravel_mix'))
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

        {{-- Configured Stylesheets --}}
        @include('adminlte::plugins', ['type' => 'css'])

        <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    @else
        <link rel="stylesheet" href="{{ mix(config('adminlte.laravel_mix_css_path', 'css/app.css')) }}">
    @endif
        <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/custom.css') }}">

    {{-- Livewire Styles --}}
    @if(config('adminlte.livewire'))
        @if(app()->version() >= 7)
            @livewireStyles
        @else
            <livewire:styles />
        @endif
    @endif

    {{-- Custom Stylesheets (post AdminLTE) --}}
    @yield('adminlte_css')

    {{-- Favicon --}}
    @if(config('adminlte.use_ico_only'))
        <link rel="shortcut icon" href="{{ asset('favicons/favicon.ico') }}" />
    @elseif(config('adminlte.use_full_favicon'))
        <link rel="shortcut icon" href="{{ asset('favicons/favicon.ico') }}" />
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicons/apple-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicons/apple-icon-60x60.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicons/apple-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicons/apple-icon-76x76.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicons/apple-icon-114x114.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicons/apple-icon-120x120.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicons/apple-icon-144x144.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicons/apple-icon-152x152.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicons/apple-icon-180x180.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicons/favicon-16x16.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicons/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicons/favicon-96x96.png') }}">
        <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('favicons/android-icon-192x192.png') }}">
        <link rel="manifest" href="{{ asset('favicons/manifest.json') }}">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="{{ asset('favicon/ms-icon-144x144.png') }}">
    @endif
    <link rel="stylesheet" type="text/css" href="https://www.jquery-az.com/jquery/css/intlTelInput/intlTelInput.css">
    <link rel="stylesheet" type="text/css" href="https://www.jquery-az.com/jquery/css/intlTelInput//demo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
    .card {
        margin-top: 1rem;
        box-shadow: 0 0 1px rgb(0 0 0 / 13%), 0 1px 3px rgb(0 0 0 / 20%);
        margin-bottom: 1rem;
    }
    body.sidebar-mini .card-header {
        border-bottom: 1px solid rgba(0,0,0,.125);
        padding: .75rem 0;
        border-radius: 0;
    }
    .content-wrapper .card .card-header.alert:after {
        position: absolute;
    }
    .card-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin: 0 20px;
      border-bottom: 1px solid rgba(0,0,0,.125);
      padding: .75rem 0;
      border-radius: 0;
    }
    .card-header a.btn.btn-sm.btn-danger {
        color: #ffffff;
        font-weight: 600;
        background-color: #e50237;
        border: 1px solid #e50237;
        padding: 8px 20px;
        text-decoration: auto;
        font-size: 13px;
        top: 0;
        order: 2;
        border-radius: .2rem;
    }
    .card-header.alert {
        background-color: transparent;
        display: block !important;
        display: flex !important;
        justify-content: space-between !important;
        align-items: center !important;
    }
    .content-wrapper .card .card-header h3 {
        font-size: 18px;
        margin: 0;
        font-weight: 600;
        order: 1;
        color: #212529;
    }
    .tabslist .form-group label {
        font-size: 15px;
        font-weight: 600;
        color: #343d49;
    }
    .tabslist .form-group input {
        border: 1px solid #ced4da;
        height: 50px;
        box-shadow: none;
        font-size: 14px;
    }
    .form-control:disabled, .form-control[readonly] {
        background-color: #f6f7fb;
        opacity: 1;
        color: #929090;
    }
    .personal_info h4.user-heading {
        margin-bottom: 0;
        font-size: 20px;
        padding: 10px 0px;
        font-weight: 600;
    }
    .user-heading {
        left: 0px;
        top: 0px;
        margin-bottom: 0px !important;
    }
    .sticky-top .card.events {
        box-shadow: none;
        border: none;
    }
    .tabslist ul li.nav-item a.active {
        border: 1px solid #343d49;
        background-color: #343d49;
        border-radius: 0;
        box-shadow: 0 0 1px rgb(0 0 0 / 13%), 0 1px 3px rgb(0 0 0 / 20%);
    }
    .tabslist ul li.nav-item a {
        font-weight: 600;
        font-size: 14px;
        color: #343d49;
        margin-right: 5px;
    }
    .form-group .pro-img img.profile_image {
        width: 100%;
        height: 200px;
        border: 1px solid #333333;
        border-radius: 5px;
        object-fit: contain;
    }
    .timeline .time-label span.bg-red {
        background-color: #dc3545;
        border-radius: 4px;
        color: #ffffff;
        display: inline-block;
        font-weight: 600;
        padding: 5px 10px;
        font-size: 14px;
    }
    .timeline::before {
        border-radius: .25rem;
        background: #dee2e6;
        bottom: 0;
        content: '';
        left: 32px;
        margin: 0;
        position: absolute;
        top: 0;
        width: 4px;
    }
    .timeline .Comments-item .timeline-item {
        box-shadow: 0 0 1px rgb(0 0 0 / 13%), 0 1px 3px rgb(0 0 0 / 20%);
        border-radius: .25rem;
        background: #fff;
        color: #495057;
        margin-left: 40px;
        margin-top: 0;
        padding: 0;
        position: relative;
    }
    .timeline .time-label {
        z-index: 1;
        position: relative;
        margin-bottom: 15px;
    }
    .timeline .Comments-item .timeline-item .timeline-header {
        border-bottom: 1px solid rgba(0,0,0,.125);
        color: #495057;
        font-size: 16px;
        line-height: 1.1;
        margin: 0;
        padding: 10px;
    }
    .timeline .Comments-item .timeline-item .timeline-body, .timeline .Comments-item .timeline-item .timeline-footer {
        padding: 10px;
        font-size: 14px;
    }
    .timeline .Comments-item .timeline-item .timeline-header a {
        font-size: 14px;
        font-weight: 600;
    }
    .timeline .Comments-item .chat_group i {
        margin: 0 auto;
        font-size: 25px;
    }
    .Comments-item .chat_group {
        background-color: #ffc107;
        height: 45px;
        width: 45px;
        border-radius: 100px;
        display: flex;
        align-items: center;
        z-index: 1;
        position: relative;
        left: 20px;
    }
    .Comments-item .chat_group img, 
    .chat_group.clock img {
        width: 30px;
        margin: 0 auto;
        display: block;
    }
    .Comments-item.clock .chat_group {
        background-color: #adb5bd;
    }
    form.form_wrap.inputs_space .external_events {
        width: 100%;
    }
    form.form_wrap.inputs_space .external_events .external-event {
        margin-right: 15px;
        width: 333.33%;
        padding: 10px 20px;
        color: #ffffff;
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 0;
        border-radius: 0;
    }
    .fc-toolbar.fc-header-toolbar .fc-left button span.fc-icon {
        font-size: 16px;
        vertical-align: baseline;
    }
    button.fc-today-button.fc-button.fc-button-primary {
        font-size: 14px;
    }
    .fc-toolbar.fc-header-toolbar .fc-center h2 {
        font-size: 22px;
        font-weight: 700;
        margin-bottom: 0;
    }
    .fc-unthemed .fc-content, .fc-unthemed .fc-divider, .fc-unthemed .fc-list-heading td, .fc-unthemed .fc-list-view, .fc-unthemed .fc-popover, .fc-unthemed .fc-row, .fc-unthemed tbody, .fc-unthemed td, .fc-unthemed th, .fc-unthemed thead {
        padding: 6px 0 !important;
    }
    .fc-right .fc-button-group button {
        font-size: 14px;
    }
    form.form_wrap.inputs_space .external_events .external-event:first-child {
        background-color: #E50237;
    }
    form.form_wrap.inputs_space .external_events .external-event:nth-child(2) {
        background-color: #098500;
    }
    form.form_wrap.inputs_space .external_events .external-event:last-child {
        background-color: #DBB004;
    }
    form.membership_plans ul {
        list-style: none;
        background-color: #f6f7fb;
        padding: 20px 20px;
    }
    form.membership_plans ul li:hover {
        box-shadow: 0 0 1px rgb(0 0 0 / 13%), 0 1px 3px rgb(0 0 0 / 20%);
        background-color: #ffffff;
    }
    form.membership_plans ul li {
        margin-bottom: 20px;
        border-bottom: 1px solid rgba(0,0,0,.125);
        padding: 12px 12px;
        font-size: 15px;
    }
    form.membership_plans ul li:last-child {
        margin-bottom: 0px;
      /*  border-bottom: none;*/
    }
    .widget-user-image img.img-circle.elevation-2 {
        height: 70px;
        width: 70px;
        box-shadow: 0 3px 6px rgb(0 0 0 / 16%), 0 3px 6px rgb(0 0 0 / 23%);
        border-radius: 100px;
    }
    form.membership_plans .widget-user-header {
        padding: 20px 20px;
    }
/*    .well.well-sm .profile-picture {
        box-shadow: 0 0 1px rgb(0 0 0 / 13%), 0 1px 3px rgb(0 0 0 / 20%);
        border-radius: .25rem;
        padding: 20px 20px;
        margin-bottom: 20px;
    }*/
    .widget-content h6 {
        font-size: 20px;
        font-weight: 600;
    }
    .widget-content h5 {
        font-size: 14px;
        margin-bottom: 0; 
    }
    form.membership_plans ul li span {
        font-weight: 500;
    }
    .profile-picture img.img-rounded.img-responsive {
        width: 160px;
        height: 100%;
    }
    .tabslist .personal_info {
        display: flex;
        align-items: center;
    }
    .tabslist .personal_info i {
        margin-right: 15px;
        font-size: 20px;
    }
    .well.well-sm .profile-picture .profile-text p.paragraph {
        font-size: 14px;
        margin-right: 15px;
    }
    .well.well-sm .profile-picture .profile-text {
        width: 65%;
    }
    table.table.table-bordered td.no.bg-danger, table.table.table-bordered td.no.bg-info {
        background-color: #f6f7fb !important;
        width: 60px;
        text-align: center;
        font-size: 14px;
        font-weight: 600;
        color: #212529 !important;
    }
    .btn { background-color: #E50335; border: 1px solid #E50335; padding: 8px 20px; text-decoration: auto; font-size: 13px; top: 0; order: 2; color: #ffffff; }
    .btn:hover { color: #ffffff; background-color: #c82333; border-color: #bd2130 !important; }
    .error { font-size: 13px !important; font-weight: 400 !important; position: relative; top: 10px; }
    /* width */
    .fc-scroller::-webkit-scrollbar {
      width: 5px;
    }
    /* Track */
    .fc-scroller::-webkit-scrollbar-track {
      background: #f1f1f1;
    }
    /* Handle */
    .fc-scroller::-webkit-scrollbar-thumb {
      background: #888;
    }
    /* Handle on hover */
    .fc-scroller::-webkit-scrollbar-thumb:hover {
      background: #555;
    }
    .timeline-item .timeline-body {
        font-size: 14px;
    }
    .card-body .tabslist ul li.nav-item a:hover {
        color: #343d49;
    }
    .card-body .tabslist ul li.nav-item a.active:hover {
        color: #ffffff;
    }
    </style>

    <link rel="stylesheet" href="https://adminlte.io/themes/dev/AdminLTE/plugins/fullcalendar/main.min.css">
    <link rel="stylesheet" href="https://adminlte.io/themes/dev/AdminLTE/plugins/fullcalendar-daygrid/main.min.css">
    <link rel="stylesheet" href="https://adminlte.io/themes/dev/AdminLTE/plugins/fullcalendar-timegrid/main.min.css">
    <link rel="stylesheet" href="https://adminlte.io/themes/dev/AdminLTE/plugins/fullcalendar-bootstrap/main.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body class="@yield('classes_body')" @yield('body_data')>

    {{-- Body Content --}}
    @yield('body')

    {{-- Base Scripts --}}
    @if(!config('adminlte.enabled_laravel_mix'))
        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

        {{-- Configured Scripts --}}
        @include('adminlte::plugins', ['type' => 'js'])

        <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
        <script src="{{ asset('vendor/adminlte/dist/js/jquery.validate.min.js') }}"></script><link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.colorbox/1.4.33/example1/colorbox.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.colorbox/1.4.33/jquery.colorbox-min.js"></script>
        <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    @else
        <script src="{{ mix(config('adminlte.laravel_mix_js_path', 'js/app.js')) }}"></script>
    @endif
    <script type="text/javascript" src="https://www.jquery-az.com/jquery/js/intlTelInput/intlTelInput.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>
    <script>
        $('.datatable').DataTable( {
            columnDefs: [ {
                targets: 0,
                render: function ( data, type, row ) {
                    return data.substr( 0, 2 );
                }
            }]
        });
    </script>

    <script type="text/javascript">
        $('.alert').fadeIn("slow").delay(3000).fadeOut('slow');
    </script>

    {{-- Livewire Script --}}
    @if(config('adminlte.livewire'))
        @if(app()->version() >= 7)
            @livewireScripts
        @else
            <livewire:scripts />
        @endif
    @endif

    {{-- Custom Scripts --}}
    @yield('adminlte_js')

  <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> -->
</body>

</html>
