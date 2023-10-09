@extends('adminlte::page')

@section('title', 'Role Information')

@section('content_header')
@stop

@section('content')
<div class="">
  <div class="row">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header alert d-flex justify-content-between align-items-center">
            <h3>{{ __('adminlte::adminlte.role') }} Details</h3>
            <a class="btn btn-sm btn-success" href="{{ url()->previous() }}">{{ __('adminlte::adminlte.back') }}</a>
          </div>
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <form class="form_wrap">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>{{ __('adminlte::adminlte.role_name') }}</label>
                    <input class="form-control" placeholder="{{ $role->name }}" readonly>
                  </div>
                </div>
                
                <div class="col-md-6">
                  <div class="form-group">
                    <label>{{ __('adminlte::adminlte.role_tag') }}</label>
                    <input class="form-control" placeholder="{{ $role->tag }}" readonly>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Permissions</label>
                    <?php 
                      $permissions = $role->permissions;
                      $permissionNames = [];
                      for($i=0; $i<count($permissions);$i++) {
                        array_push($permissionNames, $permissions[$i]->slug);
                      }
                    ?>
                    <div class="permission-names row m-0">
                      <?php foreach($permissionNames as $name) {
                        echo '<li class="col-md-4">'.ucwords(str_replace('_', ' ', $name)).'</li>';
                      } ?>
                    </div>
                  </div>
                </div>
              </div>
                
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>{{ __('adminlte::adminlte.created_date') }}</label>
                    <input class="form-control" placeholder="{{ $role->created_at ? date('Y-m-d', strtotime($role->created_at)) : '' }}" readonly>
                  </div>
                </div>
                
                <div class="col-md-6">
                  <div class="form-group">
                    <label>{{ __('adminlte::adminlte.last_updated_date') }}</label>
                    <input class="form-control" placeholder="{{ $role->updated_at ? date('Y-m-d', strtotime($role->updated_at)) : '' }}" readonly>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
  </div>
</div>
@endsection

@section('css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
@stop

@section('js')
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
  <script>
    $('#roles-list').DataTable( {
      columnDefs: [ {
        targets: 0,
        render: function ( data, type, row ) {
          return data.substr( 0, 2 );
        }
      }]
    });

    $('#delete-button').click(function(e) {
      var id = $(this).attr('data-id');
      console.log("ID - ", id);
      var obj = $(this);
      console.log("obj - ", obj);
      e.preventDefault();
      swal({
        title: "Are you sure you want to delete Role?",
        text: "",
        icon: "warning",
        buttons:{
          confirm: {
            text : 'Yes',
            className : 'btn btn-success'
          },
          cancel: {
            visible: true,
            className: 'btn btn-danger'
          }
        },
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
          $.ajax({
            url:"{{url('delete_role')}}",
            type:'post',
            data:{
              id:id
            },
            dataType: "JSON",
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response){
              window.location.reload();
              /* console.log("response", response);
              obj.parent().parent().remove(); */
            }
          });
        } 
      });
    });
  </script>
@stop
