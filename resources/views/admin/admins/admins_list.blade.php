@extends('adminlte::page')

@section('title', 'Admins')

@section('content_header')
@stop

@section('content')
<div class="">
  <div class="row">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header alert d-flex justify-content-between align-items-center mb-0">
            <h3>Admins</h3>
            @can('add_admin')
           <a class="btn btn-sm btn-success" href="add">{{ __('adminlte::adminlte.add_new_admin') }}</a> 
            @endcan()
          </div>           
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <table style="width:100%" id="adminList" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>{{ __('adminlte::adminlte.first_name') }}</th>
                  <th>{{ __('adminlte::adminlte.last_name') }}</th>
                  <th>{{ __('adminlte::adminlte.email') }}</th>
                  <th>{{ __('adminlte::adminlte.role') }}</th>
                  <th>{{ __('adminlte::adminlte.actions') }}</th>
                </tr>
              </thead>
              <tbody>
                <?php for ($i=0; $i < count((is_countable($adminsList)?$adminsList:[])); $i++) { 
                  $role = \App\Models\Role::where('id', $adminsList[$i]->role_id)->get();
                  ?>
                  <tr>
                    <td>{{ $adminsList[$i]->first_name }}</td>
                    <td>{{ $adminsList[$i]->last_name }}</td>
                    <td>{{ $adminsList[$i]->email }}</td>
                    <td>{{ $role[0]->name }}</td>
                      <td>
                          <a class="action-button" title="View" href="view/{{$adminsList[$i]->id}}"><i class="text-info fa fa-eye"></i></a>
                          @can('edit_admin')
                           <a class="action-button" title="Edit" href="edit/{{$adminsList[$i]->id}}"><i class="text-warning fa fa-edit"></i></a>
                           @endcan()
                           @can('delete_admin')
                           <a class="action-button delete-button" title="Delete" href="javascript:void(0)" data-id="{{ $adminsList[$i]->id}}"><i class="text-danger fa fa-trash-alt"></i></a>
                          @endcan()
                          </td>
                  </tr>
                <?php } ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>{{ __('adminlte::adminlte.name') }}</th>
                  <th>{{ __('adminlte::adminlte.email') }}</th>
                  <th>{{ __('adminlte::adminlte.role') }}</th>
                  <th>{{ __('adminlte::adminlte.actions') }}</th>
                </tr>
              </tfoot>
            </table>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script>
    
    $(document).ready(function() {
     $('#adminList').DataTable({
        columnDefs: [{
          targets: 0,
          render: function ( data, type, row ) {
            return data.substr( 0, 20 );
          }
        }]
    });

    $('.delete-button').click(function(e) {
      var id = $(this).attr('data-id');
      var obj = $(this);
      swal({
        title: "Are you sure?",
        text: "Are you sure you want to move this Admin to the Recycle Bin?",
        type: "warning",
        showCancelButton: true,
      }, function(willDelete) {
        if (willDelete) {
          $.ajax({
            url: "{{ route('delete_admin') }}",
            type: 'post',
            data: {
              id: id
            },
            dataType: "JSON",
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
              console.log("Response", response);
              if(response.success == 1) {
                window.location.reload();
              }
              else {
                setTimeout(() => {
                alert("Something went wrong! Please try again.");
                }, 500);
              }
            }
          });
        } 
      });
    });
  });
  </script>
@stop
