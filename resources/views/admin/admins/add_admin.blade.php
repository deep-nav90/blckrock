@extends('adminlte::page')

@section('title', 'Add Admin')

@section('content_header')
@stop

@section('content')
<div class="">
  <div class="row">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header alert d-flex justify-content-between align-items-center">
            <h3>{{ __('adminlte::adminlte.add_admin') }}</h3>
            <a class="btn btn-sm btn-success" href="{{ url()->previous() }}">{{ __('adminlte::adminlte.back') }}</a>
          </div>
          <div class="card-body add">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <form id="addAdminForm" method="post", action="{{ route('save_admin') }}">
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
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="name">{{ __('adminlte::adminlte.first_name') }}<span class="text-danger"> *</span></label>
                      <input type="text" name="first_name" class="form-control" id="first_name" maxlength="100">
                      @if($errors->has('first_name'))
                        <div class="error">{{ $errors->first('first_name') }}</div>
                      @endif
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="name">{{ __('adminlte::adminlte.last_name') }}<span class="text-danger"> *</span></label>
                      <input type="text" name="last_name" class="form-control" id="last_name" maxlength="100">
                      @if($errors->has('last_name'))
                        <div class="error">{{ $errors->first('last_name') }}</div>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="email">{{ __('adminlte::adminlte.email') }}<span class="text-danger"> *</span></label>
                      <input type="text" name="email" class="form-control" id="email" placeholder="Ex: emaple@centralmotors.com" maxlength="100">
                      <div id ="email_error" class="error"></div>
                      @if($errors->has('email'))
                        <div class="error">{{ $errors->first('email') }}</div>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="role_id">{{ __('adminlte::adminlte.role') }}<span class="text-danger"> *</span></label>
                      <select name="role_id" class="form-control" id="role_id">
                        <option value="" hidden>{{ __('adminlte::adminlte.select_role') }}</option>
                        <?php for ($i=0; $i < count($roles); $i++) { ?> 
                          <option value="{{ $roles[$i]->id }}">{{ $roles[$i]->name }}</option>
                        <?php } ?>
                      </select>
                      @if($errors->has('role_id'))
                        <div class="error">{{ $errors->last('role_id') }}</div>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="password">{{ __('adminlte::adminlte.password') }}<span class="text-danger"> *</span></label>
                      <input type="password" name="password" class="form-control" id="password" maxlength="100">
                      @if($errors->has('password'))
                        <div class="error">{{ $errors->last('password') }}</div>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="confirm_password">{{ __('adminlte::adminlte.confirm_password') }}<span class="text-danger"> *</span></label>
                      <input type="password" name="confirm_password" class="form-control" id="confirm_password" maxlength="100">
                      @if($errors->has('confirm_password'))
                        <div class="error">{{ $errors->last('confirm_password') }}</div>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="text" class="btn btn-primary">{{ __('adminlte::adminlte.save') }}</button>
              </div>
            </form>
          </div>
        </div>
      </div>
  </div>
</div>
@endsection

@section('css')
@stop

@section('js')
  <script>
    $(document).ready(function() {
      $("#email").blur(function() {
        $.ajax({
          type:"POST",
          url:"{{ route('checkEmailInAdminTable') }}",
          data: {
            email: $(this).val(),
            table_name: 'admins'
          },
          success: function(result) {
            if(result) {
              $("#email_error").html("This email is already registered.");
            }
            else {
              $("#email_error").html("");
            }
          }
        });
      });
      $('#addAdminForm').validate({
        ignore: [],
        debug: false,
        rules: {
          first_name: {
            required: true
          },
          last_name: {
            required: true
          },
          email: {
            required: true,
            email: true
          },
          role_id: {
            required: true
          },
          password: {
            required: true,
            minlength: 8
          },
          confirm_password: {
            required: true,
            minlength: 8,
            equalTo : "#password"
          },
        },
        messages: {
          first_name: {
            required: "The First Name is required."
          },
          last_name: {
            required: "The Last Name is required."
          },
          email: {
            required: "The Email is required.",
            email: "Please enter a valid Email"
          },
          role_id: {
            required: "The Role is required."
          },
          password: {
            required: "The Password is required.",
            minlength: "Minimum length should be 8"
          },
          confirm_password: {
            required: "The Confirm Password is required.",
            minlength: "Minimum length should be 8",
            equalTo : "The Confirm Password must be equal to Password."
          },
        }
      });
    });
  </script>
@stop
