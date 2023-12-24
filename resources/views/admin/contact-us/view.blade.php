@extends('adminlte::page')

@section('title', 'View Contact Us')

@section('content_header')
@stop


<style>
    input.form-control:disabled {
    background-color: #eaecef!important;
}

.form-control:disabled, .form-control[readonly] {
    color: #495057!important;
}
</style>


@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
        <div class="card-header alert d-flex justify-content-between align-items-center">
          <a class="btn btn-sm btn-success back-button" href="{{ url()->previous() }}">{{ __('adminlte::adminlte.back') }}</a>
            <h3>View Contact Us</h3>
          </div>
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <form id="addCategory" enctype='multipart/form-data'>
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
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{$contact_us->name}}" id="name" maxlength="30" disabled>
                        <div id ="name_error" class="error"></div>
                        @if($errors->has('name'))
                          <div class="error">{{ $errors->first('name') }}</div>
                        @endif
                      </div>
                    </div>


                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Email</label>
                        <input type="text" name="email" class="form-control" id="email" value="{{$contact_us->email}}" maxlength="50" disabled>
                        <div id ="email_error" class="error"></div>
                        @if($errors->has('email'))
                          <div class="error">{{ $errors->first('email') }}</div>
                        @endif
                      </div>
                    </div>

                
                  
             

                    
                  </div>


                  


                <div class="row">

                <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Phone Number</label>
                        <input type="text" name="phone" class="form-control" id="phone" value="{{$contact_us->phone}}" maxlength="50" disabled>
                        <div id ="phone_error" class="error"></div>
                        @if($errors->has('phone'))
                          <div class="error">{{ $errors->first('phone') }}</div>
                        @endif
                      </div>
                    </div>


                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="name">Message</label>
                          <textarea type="text" name="message" class="form-control textareaClass" id="message" disabled>{{$contact_us->message}}</textarea>
                          <div id ="message_error" class="error"></div>
                          @if($errors->has('message'))
                            <div class="error">{{ $errors->first('message') }}</div>
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
              
            </form>
          </div>
        </div>
      </div>
  </div>
</div>


<div class="modal fade" id="lodaerModal" tabindex="-1" role="dialog" aria-labelledby="lodaerModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     
      <img src="{{url('public/loading-buffering.gif')}}" style="width: 50px; height:50px;">
     
  </div>
</div>
@endsection

@section('css')
  <style>
    .information_fields { margin-bottom: 30px; }
    .address_fields { margin-top: 30px; }
  </style>
@stop


