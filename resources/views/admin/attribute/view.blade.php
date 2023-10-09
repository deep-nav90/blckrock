@extends('adminlte::page')

@section('title', 'View Attribute')

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
            <h3>View Attribute</h3>
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
                        <label for="name">Attribute Name</label>
                        <input type="text" name="attribute_name" class="form-control" value="{{$attribute->attribute_name}}" value="{{$attribute->name}}" disabled id="attribute_name" maxlength="30">
                        <div id ="attribute_name_error" class="error"></div>
                        @if($errors->has('attribute_name'))
                          <div class="error">{{ $errors->first('attribute_name') }}</div>
                        @endif
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Meta Keyword</label>
                        <input type="text" name="meta_keyword" class="form-control" value="{{$attribute->meta_keyword}}" id="meta_keyword" disabled value="{{$attribute->meta_keyword}}" maxlength="50">
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
                          <label for="name">Meta Description</label>
                          <textarea type="text" name="meta_description" class="form-control textareaClass" id="meta_description" disabled>{{$attribute->meta_description}}</textarea>
                          <div id ="meta_description_error" class="error"></div>
                          @if($errors->has('meta_description'))
                            <div class="error">{{ $errors->first('meta_description') }}</div>
                          @endif
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="form-group">
                          
                          <label for="name">Status</label>
                          <select name="status" id="status" class="form-control w-100 ml-0" disabled>
                            
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

@section('js')
 
@stop
