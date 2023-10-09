@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
@stop

@section('content')
<div class="">
  <div class="row">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header alert d-flex justify-content-between align-items-center mb-0">
            <h3>Roles</h3>
            @can('add_role')
           <a class="btn btn-sm btn-success float-right clear" href="add">Add Role</a>
           @endcan()
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table style="width:100%" id="roles-list" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th style="display: none;"></th>
                    <th>Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php for ($i=0; $i < count($roles); $i++) { ?>
                    <tr>
                      <th style="display: none;"></th>
                      <td>{{ $roles[$i]->name }}</td>
                        <td>
                           <a href="{{ route('view_role', ['id' => $roles[$i]->id]) }}" title="View"><i class="text-info fa fa-eye"></i></a>
                            @can('edit_role')
                           <a title="Edit" href="{{ route('edit_role', ['id' => $roles[$i]->id]) }}"><i class="text-warning fa fa-edit"></i></a>
                            @endcan()
                            @can('delete_role')
                          <a class="action-button delete-button" title="Delete" href="javascript:void(0)" data-id="{{ $roles[$i]->id}}"><i class="text-danger fa fa-trash-alt"></i></a>
                            @endcan()
                        </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
@endsection

@section('css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

  <style type="text/css">
    .nav-link {
      /*background:#ffc513*/
    }
  </style>
@stop

@section('js')
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#roles-list').DataTable( {
        columnDefs: [ {
          targets: 0,
          render: function ( data, type, row ) {
            return data.substr( 0, 2 );
          }
        }]
      });

      $(document).on('click', '.delete-button', function(e) {
        var id = $(this).attr('data-id');
        swal({
          title: "Are you sure?",
          text: "Are you sure you want to move this Role to the Recycle Bin?",
          type: "warning",
          showCancelButton: true,
        }, function(willDelete) {
          if (willDelete) {
            $.ajax({
              url: "{{ route('delete_role') }}",
              type: 'post',
              data: {
                id: id
              },
              dataType: "JSON",
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              success: function(response) {
                window.location.reload();
              }
            });
          } 
        });
      });
    });
  </script>
@stop
