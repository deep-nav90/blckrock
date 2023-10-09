@extends('adminlte::page')

@section('title', 'Add Coupon')

@section('content_header')
@stop

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
        <div class="card-header alert d-flex justify-content-between align-items-center">
          <a class="btn btn-sm btn-success back-button" href="{{ url()->previous() }}">{{ __('adminlte::adminlte.back') }}</a>
            <h3>Add Coupon</h3>
          </div>
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <form id="addCoupon" enctype='multipart/form-data'>
              @csrf


              <div class="card-body">
                @if ($errors->any())
                  <div class="alert alert-warning">
                    <ul>
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif
                
                <!-- Form Fields -->
                
                <!-- INFORMATION FIELDS -->
                <div class="information_fields">
                  <div class="row">

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Coupon Name<span class="text-danger"> *</span></label>
                        <input type="text" name="coupon_name" class="form-control" id="coupon_name" maxlength="30">
                        <div id ="coupon_name_error" class="error"></div>
                        @if($errors->has('coupon_name'))
                          <div class="error">{{ $errors->first('coupon_name') }}</div>
                        @endif
                      </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                          
                          <label for="name">Coupon Type<span class="text-danger"> *</span></label>
                          <select name="coupon_type" id="coupon_type" class="form-control w-100 ml-0">
                            
                            <option value="Flat">Flat</option>
                            <option value="Percentage">Percentage</option>
                          </select>

                          <div id ="coupon_type_error" class="error"></div>
                          @if($errors->has('coupon_type'))
                            <div class="error">{{ $errors->first('coupon_type') }}</div>
                          @endif
                        </div>
                      </div>

                    
                    
                  </div>

                  <div class="row">

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Coupon Amount/Percentage<span class="text-danger"> *</span></label>
                        <input type="text" name="coupon_amount_and_percentage" class="form-control coupon_amount_and_percentage numeric_check" id="coupon_amount_and_percentage">
                        <div id ="coupon_amount_and_percentage_error" class="error"></div>
                        @if($errors->has('coupon_amount_and_percentage'))
                          <div class="error">{{ $errors->first('coupon_amount_and_percentage') }}</div>
                        @endif
                      </div>
                    </div>


                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Meta Keyword<span class="text-danger"> *</span></label>
                        <input type="text" name="meta_keyword" class="form-control" id="meta_keyword" maxlength="50">
                        <div id ="meta_keyword_error" class="error"></div>
                        @if($errors->has('meta_keyword'))
                          <div class="error">{{ $errors->first('meta_keyword') }}</div>
                        @endif
                      </div>
                    </div>

                  </div>

                  <div class="row">

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">From Date<span class="text-danger"> *</span></label>
                        <input type="date" name="from_date" class="form-control" id="from_date">
                        <div id ="from_date" class="error"></div>
                        @if($errors->has('from_date'))
                          <div class="error">{{ $errors->first('from_date') }}</div>
                        @endif
                      </div>
                    </div>


                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">To Date<span class="text-danger"> *</span></label>
                        <input type="date" name="to_date" class="form-control" id="to_date">
                        <div id ="to_date" class="error"></div>
                        @if($errors->has('to_date'))
                          <div class="error">{{ $errors->first('to_date') }}</div>
                        @endif
                      </div>
                    </div>

                  </div>


                  <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="name">Meta Description<span class="text-danger"> *</span></label>
                          <textarea type="text" name="meta_description" class="form-control textareaClass" id="meta_description"></textarea>
                          <div id ="meta_description_error" class="error"></div>
                          @if($errors->has('meta_description'))
                            <div class="error">{{ $errors->first('meta_description') }}</div>
                          @endif
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="form-group">
                          
                          <label for="name">Status<span class="text-danger"> *</span></label>
                          <select name="status" id="status" class="form-control w-100 ml-0">
                            
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                          </select>

                          <div id ="status_error" class="error"></div>
                          @if($errors->has('status'))
                            <div class="error">{{ $errors->first('status') }}</div>
                          @endif
                        </div>
                      </div>

                  </div>

                
                  
                </div>
                <!-- /INFORMATION FIELDS -->
                <hr/>
               
                <!-- Form Fields -->

              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button id="submitButton" class="btn btn-primary">{{ __('adminlte::adminlte.save') }}</button>
              </div>
            </form>
          </div>
        </div>
      </div>
  </div>
</div>


<div class="modal fade" id="lodaerModal" tabindex="-1" role="dialog" aria-labelledby="lodaerModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     
      <img src="{{url('/public/loading-buffering.gif')}}" style="width: 50px; height:50px;">
     
  </div>
</div>
@endsection

@section('css')
  <style>
    .information_fields { margin-bottom: 30px; }
    .address_fields { margin-top: 30px; }
  </style>
@stop

@section('js')
  <script>
    $(document).ready(function() {
      $( "input[name=contact_number]" ).focus(function() {
          $('input[name=country_code]').val($('.country-list .country.active').data('dial-code'));
       });
      $("#coupon_name").blur(function() {
        $.ajax({
          type:"POST",
          url:"{{route('check_coupon_name')}}",
          data: {
            coupon_name: $(this).val()
          },
          success: function(result) {
            if(result) {
              $("#coupon_name_error").html("This Coupon Name is already exists.");
            }
            else {
              $("#coupon_name_error").html("");
            }
          }
        });
      });

      var addCoupon = $( "#addCoupon" );
      addCoupon.validate({
        ignore: [],
        debug: false,
        rules: {
          coupon_name: {
            required: true,
            maxlength:30,
            minlength:2
          },
          coupon_type: {
            required: true,
          },
          coupon_amount_and_percentage: {
            required: true
          },
          meta_keyword: {
            required: true,
            maxlength:50,
            minlength:2
          },
          from_date: {
            required: true
          },
          to_date: {
            required: true
          },
          meta_description: {
            required: true,
            maxlength:1000,
            minlength:20
          },
          status: {
            required: true
          },
          
          
        },
        messages: {
          coupon_name: {
            required: "The Coupon Name field is required."
          },
          coupon_type: {
            required: "The Coupon Type is required."
          },
          coupon_amount_and_percentage: {
            required: "The Coupon Amount And Percentage field is required."
          },
          meta_keyword : {
            required : "The Meta Keyword is required."
          },
          meta_description : {
            required : "The Meta Description is required."
          },
          status : {
            required : "The Status is required."
          },
                    
        },
        submitHandler:function(form){
                $("#lodaerModal").modal("show");
                $("#submitButton").attr('disabled', "true");


               


                var fd = new FormData();
                var other_data = $('#addCoupon').serializeArray();
                
                $.each(other_data, function(key, input) {
                  console.log("keyhhhh",key)
                  console.log("innnnnn",input)
                    fd.append(input.name, input.value);
                });

                
                var data = fd;

                $.ajax({
                    url:"{{route('add_coupon')}}",
                    data: fd,
                    contentType: false,
                    processData: false,
                    type: 'POST',
                    success: function(res){
                        // console.log("resultback",res);
                        // return false;

                        if(res.status == "true"){
                            
                            swal({
                                title: "Information",
                                text: res.message,
                                type: "success",
                                showCancelButton: false,
                            }, function(willDelete) {
                                window.location.href="{{route('coupon_list')}}";
                            });

                            
                        }else{
                            swal("Alert", res.message, "error");
                        }

                        setTimeout(() => {
                            $("#lodaerModal").modal("hide");
                            $("#submitButton").removeAttr('disabled');
                            
                        }, 500);

                        
                        
                        
                    },
                    error: function(data, textStatus, xhr) {
                        if(data.status == 422){
                        
                        } 
                        
                        
                        
                        swal("Alert", "Something went wrong. Please try again.", "error");

                        setTimeout(() => {
                            $("#lodaerModal").modal("hide");
                            $("#submitButton").removeAttr('disabled');
                        }, 500);

                        


                    }
                });
                //form.submit();
            },
        onkeyup: false,
        onblur: true
      });
    });
  </script>


  <script type="text/javascript">
  $(document).ready(function(){
    $("#ok").on("click",function(){
      $("#alertModel").modal("hide");
    });



    $(document).on("keypress",".numeric_check",function (event) {

      let key_number_put =  "";
      var charCode = (event.which) ? event.which : event.keyCode;
      
      var number = this.value.split('.');


      if(charCode == 48){
          key_number_put = 0;
      }else if(charCode == 49){
          key_number_put = 1;
      }else if(charCode == 50){
          key_number_put = 2;
      }else if(charCode == 51){
          key_number_put = 3;
      }else if(charCode == 52){
          key_number_put = 4;
      }else if(charCode == 53){
          key_number_put = 5;
      }else if(charCode == 54){
          key_number_put = 6;
      }else if(charCode == 55){
          key_number_put = 7;
      }else if(charCode == 56){
          key_number_put = 8;
      }else if(charCode == 57){
          key_number_put = 9;
      }

      let __val_add = number.toString() + key_number_put.toString();

      
      if(parseFloat(__val_add) > 9999999.99){
          event.preventDefault();
          
      }else{
          if(parseFloat(__val_add) == 9999999.99){
              if(charCode == 46){
                  event.preventDefault();
              }
          }   
          
      }

      var $this = $(this);
      if ((event.which != 46 || $this.val().indexOf('.') != -1) && ((event.which <48 || event.which > 57) && (event.which != 0 && event.which != 8))) {
          event.preventDefault();
      }
      var text = $(this).val();
      if (text.length === 18) {
          $(this).val(text + ".")
      }
      if ((event.which == 46) && (text.indexOf('.') == -1)) {
          setTimeout(function () {
              if ($this.val().substring($this.val().indexOf('.')).length > 3) {
                  $this.val($this.val().substring(0, $this.val().indexOf('.') + 3));
              }
          }, 1);
      }
      if ((text.indexOf('.') == 18 && text.substring(text.indexOf('.')).length > 2)) {
          event.preventDefault();
      }
      if (((text.indexOf('.') != -1) && (text.substring(text.indexOf('.')).length > 2) && (event.which != 0 && event.which != 8) && ($(this)[0].selectionStart >= text.length - 2))) {
          event.preventDefault();
      }
    });


    $(document).on('keydown keyup',".numeric_check", function(event) {
        
      if (event.key === "Backspace" || event.key === "Delete") {
          
          if(this.value > 0){
              
              setTimeout(function(){
                  if(event.target.value.toString().split('.')[0].length <= 0){

                      let ____val;
                      if(event.target.value.toString().split('.')[1] != undefined){
                          ____val = "000000000."+($(".numeric_check").val().toString().split('.')[1])
                      }else{
                          ____val = "";
                      }
                      
                      
                  }

                  if(event.target.value > 9999999){
                      let remove_lentgh = 1;
                      if(event.target.value.length > 7){
                          remove_lentgh = 2
                      }
                      $(this).val(event.target.value.substring(0, event.target.value.length - remove_lentgh))
                  }

              },50)
              
          }
          
      }else{
          if(event.target.value > 9999999.99){
              $(this).val(9999999.99);
          }
      }
   });





    $(document).on("keypress",".percentage_check",function (event) {

      let key_number_put =  "";
      var charCode = (event.which) ? event.which : event.keyCode;
      
      var number = this.value.split('.');


      if(charCode == 48){
          key_number_put = 0;
      }else if(charCode == 49){
          key_number_put = 1;
      }else if(charCode == 50){
          key_number_put = 2;
      }else if(charCode == 51){
          key_number_put = 3;
      }else if(charCode == 52){
          key_number_put = 4;
      }else if(charCode == 53){
          key_number_put = 5;
      }else if(charCode == 54){
          key_number_put = 6;
      }else if(charCode == 55){
          key_number_put = 7;
      }else if(charCode == 56){
          key_number_put = 8;
      }else if(charCode == 57){
          key_number_put = 9;
      }

      let __val_add = number.toString() + key_number_put.toString();

      
      if(parseFloat(__val_add) > 99.99){
          event.preventDefault();
          
      }else{
          if(parseFloat(__val_add) == 99.99){
              if(charCode == 46){
                  event.preventDefault();
              }
          }   
          
      }

      var $this = $(this);
      if ((event.which != 46 || $this.val().indexOf('.') != -1) && ((event.which <48 || event.which > 57) && (event.which != 0 && event.which != 8))) {
          event.preventDefault();
      }
      var text = $(this).val();
      if (text.length === 18) {
          $(this).val(text + ".")
      }
      if ((event.which == 46) && (text.indexOf('.') == -1)) {
          setTimeout(function () {
              if ($this.val().substring($this.val().indexOf('.')).length > 3) {
                  $this.val($this.val().substring(0, $this.val().indexOf('.') + 3));
              }
          }, 1);
      }
      if ((text.indexOf('.') == 18 && text.substring(text.indexOf('.')).length > 2)) {
          event.preventDefault();
      }
      if (((text.indexOf('.') != -1) && (text.substring(text.indexOf('.')).length > 2) && (event.which != 0 && event.which != 8) && ($(this)[0].selectionStart >= text.length - 2))) {
          event.preventDefault();
      }
    });


    $(document).on('keydown keyup',".percentage_check", function(event) {
        
      if (event.key === "Backspace" || event.key === "Delete") {
          
          if(this.value > 0){
              
              setTimeout(function(){
                  if(event.target.value.toString().split('.')[0].length <= 0){

                      let ____val;
                      if(event.target.value.toString().split('.')[1] != undefined){
                          ____val = "000000000."+($(".percentage_check").val().toString().split('.')[1])
                      }else{
                          ____val = "";
                      }
                      
                      
                  }

                  if(event.target.value > 99.99){
                      let remove_lentgh = 1;
                      if(event.target.value.length > 7){
                          remove_lentgh = 2
                      }
                      $(this).val(event.target.value.substring(0, event.target.value.length - remove_lentgh))
                  }

              },50)
              
          }
          
      }else{
          if(event.target.value > 100){
              $(this).val(100);
          }
      }
   });


    $(document).on("click",function(){
      $(".percentage_check").each(function(){
        let __val = $(this).val();
        if(__val > 100){
          $(this).val(100);
        }
      })

      $(".numeric_check").each(function(){
        let __val = $(this).val();
        if(__val > 9999999.99){
          $(this).val(9999999.99);
        }
      })
    })

    $(document).on("change","#coupon_type",function(){
      let type = $(this).val();
      $(".coupon_amount_and_percentage").val("");
      if(type == "Flat"){
        $(".coupon_amount_and_percentage").removeClass("percentage_check").addClass("numeric_check");
      }else{
        $(".coupon_amount_and_percentage").removeClass("numeric_check").addClass("percentage_check");
      }
    })

  });
</script>

  
 
@stop
