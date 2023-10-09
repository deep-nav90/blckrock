@extends('adminlte::page')

@section('title', 'Configuration')

@section('content_header')
@stop

@section('content')



<div class="">
  <div class="row">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header alert d-flex justify-content-between align-items-center">
            <h3>Edit Configurations</h3>
            <!-- <a class="btn btn-sm btn-success" href="{{ route('user_index')}}">{{ __('adminlte::adminlte.back') }}</a> -->
          </div>
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif

              <div class="card-body form">
                @if ($errors->any())
                  <div class="alert alert-warning">
                    <ul>
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif
                <div class="Configurations_tabs">
                  <div class="tabs_wrap d-flex flex-wrap justify-content-between mb-3">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                      <a class="nav-link active checkActive" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                        <i class="fas fa-map-marker-alt"></i> Distance in Km</a>

                      <a class="nav-link checkActive" id="v-pills-home-tab1" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="fa-solid fa-percent"></i> Set Percentage/Amount</a>

                      <a class="nav-link checkActive" id="v-pills-home-tab2" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="fa-solid fa-clock"></i> Set Request Timeout</a>

                    </div>
                    <div class="tab-content" id="v-pills-tabContent">
                      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <div class="information_fields mb-0">
                          <form method="POST" id="validate_form">
                            {{@csrf_field()}}
                            <div class="row">
                               <div class="col-sm-12">
                                  <div class="form_wrap d-flex flex-wrap justify-content-between w-100">
                                    <div class="form-group two mb-0 w-100">
                                      <label>{{__('adminlte::adminlte.distance_in_km')}}<span class="text-danger"> *</span></label>
                                      <input type="text" value="{{$distance_in_km}}" maxlength="11" name="distance_in_km" id="distance_in_km" class="form-control" placeholder="Enter Distance In Km">
                                    </div>
                                      <!-- <label id="rate_error" class="error hide" for="name">The Conversion Rate (in htg) field is required.</label> -->
                                  </div>
                               </div>
                            </div>
                            <button id="submit_btn_form_1" class="btn btn-primary" hidden>{{ __('adminlte::adminlte.update') }}</button>
                          </form>


                          <form method="POST" id="validate_form2" action="{{ route('setRequestTimeout')}}" hidden>
                            {{@csrf_field()}}
                            <div class="row">
                               <div class="col-sm-6">
                                  <div class="form_wrap d-flex flex-wrap justify-content-between w-100">
                                    <div class="form-group two mb-0 w-100">
                                      <label>Permanent Request Timeout Action In Minutes<span class="text-danger"> *</span></label>
                                      <input type="text" value="{{$request_timeout}}" maxlength="11" name="request_timeout" id="request_timeout" class="form-control" placeholder="Enter Request Timeout In Minutes">
                                    </div>
                                    
                                  </div>
                               </div>

                               <div class="col-sm-6">
                                  <div class="form_wrap d-flex flex-wrap justify-content-between w-100">
                                    <div class="form-group two mb-0 w-100">
                                      <label>Temporary Request Timeout Action In Minutes<span class="text-danger"> *</span></label>
                                      <input type="text" value="{{$request_timeout_temporary}}" maxlength="11" name="request_timeout_temporary" id="request_timeout_temporary" class="form-control" placeholder="Enter Request Timeout In Minutes">
                                    </div>
                                    
                                  </div>
                               </div>

                            </div>
                            <button id="submit_btn_form_3" class="btn btn-primary" hidden>{{ __('adminlte::adminlte.update') }}</button>
                          </form>

                          <form method="POST" id="validate_form1"  action="{{ route('setAmount')}}" hidden>
                            {{@csrf_field()}}
                            <div class="row">
                               <div class="col-sm-6">
                                  <div class="form_wrap d-flex flex-wrap justify-content-between">
                                    <div class="form-group two">
                                      <label>{{__('adminlte::adminlte.minimum_verified_member_amount')}}<span class="text-danger"> *</span></label>
                                      <input type="text" value="{{$amounts->minimum_verified_member_amount}}" maxlength="11" name="minimum_verified_member_amount" id="minimum_verified_member_amount" class="form-control" placeholder="Enter Minimum Verified Member Amount">
                                    </div>
                                      <!-- <label id="rate_error" class="error hide" for="name">The Conversion Rate (in htg) field is required.</label> -->
                                  </div>
                               </div>
                               <div class="col-sm-6">
                                  <div class="form_wrap d-flex flex-wrap justify-content-between">
                                    <div class="form-group two">
                                      <label>{{__('adminlte::adminlte.minimum_security_deposit_amount')}}<span class="text-danger"> *</span></label>
                                      <input type="text" value="{{$amounts->minimum_security_deposit_amount}}" maxlength="11" name="minimum_security_deposit_amount" id="minimum_security_deposit_amount" class="form-control" placeholder="Enter Minimum Security Deposit Amount">
                                    </div>
                                      <!-- <label id="rate_error" class="error hide" for="name">The Conversion Rate (in htg) field is required.</label> -->
                                  </div>
                             </div>
                               <div class="col-sm-6">
                                  <div class="form_wrap d-flex flex-wrap justify-content-between">
                                    <div class="form-group two">
                                      <label>{{__('adminlte::adminlte.minimum_premium_member_amount')}}<span class="text-danger"> *</span></label>
                                      <input type="text" value="{{$amounts->minimum_premium_member_amount}}" maxlength="11" name="minimum_premium_member_amount" id="minimum_premium_member_amount" class="form-control" placeholder="Enter Minimum Premium Member Amount">
                                    </div>
                                      <!-- <label id="rate_error" class="error hide" for="name">The Conversion Rate (in htg) field is required.</label> -->
                                  </div>
                               </div>
                               <div class="col-sm-6">
                                  <div class="form_wrap d-flex flex-wrap justify-content-between">
                                    <div class="form-group two">
                                      <label>{{__('adminlte::adminlte.minimum_boost_profile_amount')}}<span class="text-danger"> *</span></label>
                                      <input type="text" value="{{$amounts->minimum_boost_profile_amount}}" maxlength="11" name="minimum_boost_profile_amount" id="minimum_boost_profile_amount" class="form-control" placeholder="Enter Minimum Boost Profile Amount">
                                    </div>
                                  </div>
                             </div>
                               <!-- <div class="col-sm-6">
                                  <div class="form_wrap d-flex flex-wrap justify-content-between">
                                    <div class="form-group two">
                                      <label>{{__('adminlte::adminlte.compensation_amount')}}<span class="text-danger"> *</span></label>
                                      <input type="text" value="{{$amounts->compensation_amount}}" maxlength="11" name="compensation_amount" id="compensation_amount" class="form-control" placeholder="Enter Compensation Amount">
                                    </div>
                                     
                                  </div>
                               </div> -->
                               <div class="col-sm-6">
                                  <div class="form_wrap d-flex flex-wrap justify-content-between">
                                    <div class="form-group two">
                                      <label>{{__('adminlte::adminlte.temporary_job_initial_percentage')}}<span class="text-danger"> *</span></label>
                                      <input type="text" value="{{$amounts->temporary_job_initial_percentage}}" maxlength="11" name="temporary_job_initial_percentage" id="temporary_job_initial_percentage" class="form-control" placeholder="Enter Temporary Job Initial Percentage">
                                    </div>
                                      <!-- <label id="rate_error" class="error hide" for="name">The Conversion Rate (in htg) field is required.</label> -->
                                  </div>
                             </div>
                               <div class="col-sm-6">
                                  <div class="form_wrap d-flex flex-wrap justify-content-between">
                                    <div class="form-group two">
                                      <label>{{__('adminlte::adminlte.permanent_job_initial_percentage')}}<span class="text-danger"> *</span></label>
                                      <input type="text" value="{{$amounts->permanent_job_initial_percentage}}" maxlength="11" name="permanent_job_initial_percentage" id="permanent_job_initial_percentage" class="form-control" placeholder="Enter Permanent Job Initial Percentage">
                                    </div>
                                      <!-- <label id="rate_error" class="error hide" for="name">The Conversion Rate (in htg) field is required.</label> -->
                                  </div>
                               </div>
                               <div class="col-sm-6">
                                  <div class="form_wrap d-flex flex-wrap justify-content-between">
                                    <div class="form-group two">
                                      <label>{{__('adminlte::adminlte.permanent_job_success_percentage')}}<span class="text-danger"> *</span></label>
                                      <input type="text" value="{{$amounts->permanent_job_success_percentage}}" maxlength="11" name="permanent_job_success_percentage" id="permanent_job_success_percentage" class="form-control" placeholder="Enter Permanent Job Success Percentage">
                                    </div>
                                      <!-- <label id="rate_error" class="error hide" for="name">The Conversion Rate (in htg) field is required.</label> -->
                                  </div>
                             </div>
                               <div class="col-sm-6">
                                  <div class="form_wrap d-flex flex-wrap justify-content-between">
                                    <div class="form-group two">
                                      <label>{{__('adminlte::adminlte.permanent_job_initial_minimum_amount')}}<span class="text-danger"> *</span></label>
                                      <input type="text" value="{{$amounts->permanent_job_initial_minimum_amount}}" maxlength="11" name="permanent_job_initial_minimum_amount" id="permanent_job_initial_minimum_amount" class="form-control" placeholder="Enter Permanent Job Initial Minimum Amount">
                                    </div>
                                      <!-- <label id="rate_error" class="error hide" for="name">The Conversion Rate (in htg) field is required.</label> -->
                                  </div>
                               </div>
                               <div class="col-sm-6">
                                  <div class="form_wrap d-flex flex-wrap justify-content-between">
                                    <div class="form-group two">
                                      <label>{{__('adminlte::adminlte.bookys_amount_percentage')}}<span class="text-danger"> *</span></label>
                                      <input type="text" value="{{$amounts->bookys_amount_percentage}}" maxlength="11" name="bookys_amount_percentage" id="bookys_amount_percentage" class="form-control" placeholder="Enter Bookys Amount Percentage">
                                    </div>
                                      <!-- <label id="rate_error" class="error hide" for="name">The Conversion Rate (in htg) field is required.</label> -->
                                  </div>
                               </div>
                               <div class="col-sm-6">
                                  <div class="form_wrap d-flex flex-wrap justify-content-between">
                                    <div class="form-group two">
                                      <label>{{__('adminlte::adminlte.reference_amount')}}<span class="text-danger"> *</span></label>
                                      <input type="text" value="{{$amounts->reference_amount}}" maxlength="11" name="reference_amount" id="reference_amount" class="form-control" placeholder="Enter Reference Amount">
                                    </div>
                                      <!-- <label id="rate_error" class="error hide" for="name">The Conversion Rate (in htg) field is required.</label> -->
                                  </div>

                                </div>
                             <button id="submit_btn_form_2" class="btn btn-primary" hidden>{{ __('adminlte::adminlte.update') }}</button>
                          </form>



                          


                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @can('edit_configuration')
              <div class="card-footer">
                <button id="submit_btn" class="btn btn-primary">{{ __('adminlte::adminlte.update') }}</button>
              </div>
              @endcan

          </div>
        </div>
      </div>
  </div>
</div>
@endsection

@section('css')
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <link rel="stylesheet" type="text/css" href="https://fengyuanchen.github.io/cropperjs/css/cropper.css">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">

  <style>
    .information_fields { margin-bottom: 30px; }
    .address_fields { margin-top: 30px; }
    li.country { display: none; }
    li.divider { display: none; }
    li.country.preferred { display: block; }

    .label { cursor: pointer; }
    .modal-dialog { margin-top: 10rem; }
    .progress { display: none; margin-bottom: 1rem; }
    .img-container img { max-width: 100%; }
    .modal-backdrop { position: relative; }
    #profileImage { height: 150px; width: 200px; border-radius: 10px; object-fit: contain; background-color: #fbfbfb; border: 1px solid #343d49; padding: 10px; }
    /* #updateProfileForm { display:none } */
  </style>
@stop

@section('js')
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
  <script>
    $(function() {
      $( "#datepicker" ).datepicker({
        format: "yyyy-mm-dd",
        calendarWeeks: false,
        autoclose: true,
        todayHighlight: true,
        orientation: "auto"
      });
    });
  </script>

  <script type="text/javascript" src="https://fengyuanchen.github.io/cropperjs/js/cropper.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
  <script>
    $(document).ready(function() {

      $("#validate_form").validate({
        ignore: [],
        debug: false,
        rules: {
          distance_in_km: {
            required: true,
            number : true
          },
        },
        messages: {
          distance_in_km: {
            required: "{{__('adminlte::adminlte.required_distance')}}",
            number: "{{__('adminlte::adminlte.distance_should_number')}}",
          }
        },
        onkeyup: false,
        onblur: true
      });

      $("#validate_form2").validate({
        ignore: [],
        debug: false,
        rules: {
          request_timeout: {
            required: true,
            number : true
          },
          request_timeout_temporary: {
            required: true,
            number : true
          },
        },
        messages: {
          request_timeout: {
            required: "Permanent Request Timeout is required.",
            number: "Permanent Request Timeout should be number only.",
          },
          request_timeout_temporary: {
            required: "Temporary Request Timeout is required.",
            number: "Temporary Request Timeout should be number only.",
          }
        },
        onkeyup: false,
        onblur: true
      });


      // $('#distance_in_km').keypress(function (event) {
      //   return isNumber(event, this)
      // });

      $("#distance_in_km").on("keypress keyup blur", function (event) {
         var patt = new RegExp(/[0-9]*[.]{1}[0-9]{2}/i);
         var matchedString = $(this).val().match(patt);
         if (matchedString) {
             $(this).val(matchedString);
         }
         if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
             event.preventDefault();
         }
      });

      $('#distance_in_km').on("cut copy paste",function(e) {
          e.preventDefault();
      });



      $('.alert-success').fadeIn().delay(5000).fadeOut();



    });

    function isNumber(evt, element) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (
        (charCode != 46 || $(element).val().indexOf('.') != -1) &&      // “.” CHECK DOT, AND ONLY ONE.
        (charCode < 48 || charCode > 57))
        return false;
        return true;
    }
  </script>

  <script type="text/javascript">
    $(document).ready(function(){
      $("#validate_form1").validate({
        ignore: [],
        debug: false,
        rules: {
          minimum_verified_member_amount: {
            required: true,
            number : true
          },
          minimum_security_deposit_amount: {
            required: true,
            number : true
          }, minimum_premium_member_amount: {
            required: true,
            number : true
          }, minimum_boost_profile_amount: {
            required: true,
            number : true
          }, 
          //compensation_amount: {
          //  required: true,
           // number : true
          //}, 
          temporary_job_initial_percentage: {
            required: true,
            number : true
          }, permanent_job_initial_percentage: {
            required: true,
            number : true
          }, permanent_job_success_percentage: {
            required: true,
            number : true
          }, permanent_job_initial_minimum_amount: {
            required: true,
            number : true
          }, reference_amount: {
            required: true,
            number : true
          }, bookys_amount_percentage: {
            required: true,
            number : true
          },
        },
        messages: {
          distance_in_km: {
            required: "{{__('adminlte::adminlte.required_amount')}}",
            number: "{{__('adminlte::adminlte.amount_should_number')}}",
          }
        },
        onkeyup: false,
        onblur: true
      });
       $("#minimum_verified_member_amount,#minimum_security_deposit_amount,#minimum_premium_member_amount,#minimum_boost_profile_amount,#compensation_amount,#temporary_job_initial_percentage,#permanent_job_initial_percentage,#permanent_job_success_percentage,#permanent_job_initial_minimum_amount,#reference_amount,#bookys_amount_percentage").on("keypress keyup blur", function (event) {
         var patt = new RegExp(/[0-9]*[.]{1}[0-9]{2}/i);
         var matchedString = $(this).val().match(patt);
         if (matchedString) {
             $(this).val(matchedString);
         }
         if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
             event.preventDefault();
         }
      });


      $("#v-pills-home-tab1").css({"color" : "#000000", "background-color" : "#f6f7fb"});
      $("#v-pills-home-tab2").css({"color" : "#000000", "background-color" : "#f6f7fb"});
      $("#v-pills-home-tab").on("click",function(){

        $("#v-pills-home-tab1").css({"color" : "#000000", "background-color" : "#f6f7fb"});
        $("#v-pills-home-tab2").css({"color" : "#000000", "background-color" : "#f6f7fb"});

        $(this).css({"color" : "#ffffff", "background-color" : "#5fe7ba"});

        $("#validate_form").removeAttr("hidden");
        $("#validate_form1").attr("hidden","true");
        $("#validate_form2").attr("hidden","true");
      });


      $("#v-pills-home-tab1").on("click",function(){

        $("#v-pills-home-tab").css({"color" : "#000000", "background-color" : "#f6f7fb"});
        $("#v-pills-home-tab2").css({"color" : "#000000", "background-color" : "#f6f7fb"});

        $(this).css({"color" : "#ffffff", "background-color" : "#5fe7ba"});
        $("#validate_form1").removeAttr("hidden");
        $("#validate_form").attr("hidden","true");
        $("#validate_form2").attr("hidden","true");

      });

      $("#v-pills-home-tab2").on("click",function(){

        $("#v-pills-home-tab").css({"color" : "#000000", "background-color" : "#f6f7fb"});
        $("#v-pills-home-tab1").css({"color" : "#000000", "background-color" : "#f6f7fb"});

        $(this).css({"color" : "#ffffff", "background-color" : "#5fe7ba"});
        $("#validate_form2").removeAttr("hidden");
        $("#validate_form1").attr("hidden","true");
        $("#validate_form").attr("hidden","true");

      });


      $("#submit_btn").on("click",function(){
        let active_class_check = $(".checkActive.active").attr('id');

        if(active_class_check == "v-pills-home-tab"){
          //submit form 1


          $("#submit_btn_form_1").click();
        }else if(active_class_check == "v-pills-home-tab1"){
          //submit form 2
          $("#submit_btn_form_2").click();
        }else{
          //submit form 3
          $("#submit_btn_form_3").click();
        }
      });
    });
  </script>


@stop
