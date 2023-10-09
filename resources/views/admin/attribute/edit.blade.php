@extends('adminlte::page')

@section('title', 'Edit Attribute')

@section('content_header')
@stop

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
        <div class="card-header alert d-flex justify-content-between align-items-center">
          <a class="btn btn-sm btn-success back-button" href="{{ url()->previous() }}">{{ __('adminlte::adminlte.back') }}</a>
            <h3>Edit Attribute</h3>
          </div>
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <form id="addAttribute" enctype='multipart/form-data'>
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
                        <label for="name">Attribute Name<span class="text-danger"> *</span></label>
                        <input type="text" name="attribute_name" class="form-control" value="{{$attribute->attribute_name}}" id="attribute_name" maxlength="30">
                        <div id ="attribute_name_error" class="error"></div>
                        @if($errors->has('attribute_name'))
                          <div class="error">{{ $errors->first('attribute_name') }}</div>
                        @endif
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Meta Keyword<span class="text-danger"> *</span></label>
                        <input type="text" name="meta_keyword" class="form-control" id="meta_keyword" value="{{$attribute->meta_keyword}}" maxlength="50">
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
                          <label for="name">Meta Description<span class="text-danger"> *</span></label>
                          <textarea type="text" name="meta_description" class="form-control textareaClass" id="meta_description">{{$attribute->meta_description}}</textarea>
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
                            
                            <option value="Active" @if($attribute->status == 'Active') selected @endif()>Active</option>
                            <option value="Inactive" @if($attribute->status == 'Inactive') selected @endif()>Inactive</option>
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
                <button id="submitButton" class="btn btn-primary">Update</button>
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
      $("#attribute_name").blur(function() {
        $.ajax({
          type:"POST",
          url:"{{route('check_attribute_name')}}",
          data: {
            attribute_name: $(this).val(),
            id : "{{$attribute_id}}"
          },
          success: function(result) {
            if(result) {
              $("#attribute_name_error").html("This Attribute Name is already exists.");
            }
            else {
              $("#attribute_name_error").html("");
            }
          }
        });
      });

      var addAttribute = $( "#addAttribute" );
      addAttribute.validate({
        ignore: [],
        debug: false,
        rules: {
          attribute_name: {
            required: true
          },
          meta_keyword: {
            required: true,
            maxlength:50,
            minlength:2
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
          attribute_name: {
            required: "The Attribute Name field is required."
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
                var other_data = $('#addAttribute').serializeArray();
                
                $.each(other_data, function(key, input) {
                  console.log("keyhhhh",key)
                  console.log("innnnnn",input)
                    fd.append(input.name, input.value);
                });

                

                var data = fd;

                

                $.ajax({
                    url:"{{route('edit_attribute',$attribute_id)}}",
                    data: fd,
                    contentType: false,
                    processData: false,
                    type: 'POST',
                    success: function(res){
                        console.log(res);
                        //return false;

                        if(res.status == "true"){
                            
                            swal({
                                title: "Information",
                                text: res.message,
                                type: "success",
                                showCancelButton: false,
                            }, function(willDelete) {
                                window.location.href="{{route('attribute_list')}}";
                            });

                            
                        }else{
                            swal("Alert", res.message, "error");
                        }

                        setTimeout(() => {
                            $("#lodaerModal").modal("hide");
                            $("#submitButton").removeAttr('disabled');
                            $("#attribute_name").val("");
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
