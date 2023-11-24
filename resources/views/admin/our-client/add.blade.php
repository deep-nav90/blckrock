@extends('adminlte::page')

@section('title', 'Add Client')

@section('content_header')
@stop

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
        <div class="card-header alert d-flex justify-content-between align-items-center">
          <a class="btn btn-sm btn-success back-button" href="{{ url()->previous() }}">{{ __('adminlte::adminlte.back') }}</a>
            <h3>Add Client</h3>
          </div>
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <form id="addOurClient" enctype='multipart/form-data'>
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
                        <label for="name">Client Name<span class="text-danger"> *</span></label>
                        <input type="text" name="our_client_name" class="form-control" id="our_client_name" maxlength="30">
                        <div id ="our_client_name_error" class="error"></div>
                        @if($errors->has('our_client_name'))
                          <div class="error">{{ $errors->first('our_client_name') }}</div>
                        @endif
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Title</label>
                        <input type="text" name="title" class="form-control" id="title" maxlength="50">
                        <div id ="title_error" class="error"></div>
                        @if($errors->has('title'))
                          <div class="error">{{ $errors->first('title') }}</div>
                        @endif
                      </div>
                    </div>
                    
                  </div>

                  <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="name">Description</label>
                          <textarea type="text" name="description" class="form-control textareaClass" id="description"></textarea>
                          <div id ="description_error" class="error"></div>
                          @if($errors->has('description'))
                            <div class="error">{{ $errors->first('description') }}</div>
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
      $("#our_client_name").blur(function() {
        $.ajax({
          type:"POST",
          url:"{{route('check_our_client_name')}}",
          data: {
            our_client_name: $(this).val()
          },
          success: function(result) {
            if(result) {
              $("#our_client_name_error").html("This Client Name is already exists.");
            }
            else {
              $("#our_client_name_error").html("");
            }
          }
        });
      });

      var addOurClient = $( "#addOurClient" );
      addOurClient.validate({
        ignore: [],
        debug: false,
        rules: {
          our_client_name: {
            required: true,
            maxlength:30,
            minlength:2
          },
          title: {
            required: true,
            maxlength:50,
            minlength:2
          },
          description: {
            required: true,
            maxlength:1000,
            minlength:20
          },
          
          
          
        },
        messages: {
          our_client_name: {
            required: "The Client Name field is required."
          },
          title : {
            required : "The Meta Keyword is required."
          },
          description : {
            required : "The Meta Description is required."
          },
          
                    
        },
        submitHandler:function(form){
                $("#lodaerModal").modal("show");
                $("#submitButton").attr('disabled', "true");


               


                var fd = new FormData();
                var other_data = $('#addOurClient').serializeArray();
                
                $.each(other_data, function(key, input) {
                  console.log("keyhhhh",key)
                  console.log("innnnnn",input)
                    fd.append(input.name, input.value);
                });

                
                var data = fd;

                $.ajax({
                    url:"{{route('add_our_client')}}",
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
                                window.location.href="{{route('our_client_list')}}";
                            });

                            
                        }else{
                            swal("Alert", res.message, "error");
                        }

                        setTimeout(() => {
                            $("#lodaerModal").modal("hide");
                            $("#submitButton").removeAttr('disabled');
                            $("#our_client_name").val("");
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

  
 
@stop
