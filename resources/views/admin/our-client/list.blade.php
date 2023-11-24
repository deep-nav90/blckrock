
@extends('adminlte::page')

@section('title', 'Our Client')

@section('content_header')
@stop

@section('content')
<div class="">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header alert d-flex justify-content-between align-items-center mb-0">
          <h3>Our Clients</h3>
          @can('add_our_client')
          <a href="{{route('add_our_client')}}" >Add Client</a>
          @endcan()
        </div>      
        <div class="card-body">
         
          @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif
          <div class="table-responsive">
            <table style="width:100%" id="OurClientList" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Sr. No.</th>
                  <th>Client Name</th>
                  <th>Title</th>
                  <th>Created On</th>
                  <th>{{ __('adminlte::adminlte.actions') }}</th>
                </tr>
              </thead>
              <tbody>
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
@stop

@section('js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
 




  <script type="text/javascript">

    function dataTableHit(dataGET){
      $("#OurClientList").dataTable().fnDestroy();
      $('#OurClientList').dataTable({
             // /dom: "Bfrtip",
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "{{ route('our_client_list') }}",
                "type": "POST",
                "data" : dataGET,
              complete:function(){

                // if($("#basic-datatables_wrapper").find(".wrap_all").length <= 0){

                //   $('#basic-datatables_info,#basic-datatables_paginate').wrapAll('<div class="wrap_all"></div>'); 
                // }

              }

            },
            createdRow: function( row, data, dataIndex ) {

              $( row ).find('td:eq(1)').attr('data-id', data['id']).attr('key_type','our_client_name').addClass('td_click').addClass('white_space');
              $( row ).find('td:eq(2)').attr('data-id', data['id']).attr('key_type','title').addClass('td_click').addClass('white_space');
              $( row ).find('td:eq(3)').attr('data-id', data['id']).attr('key_type','date_show').addClass('td_click').addClass('white_space');
            },
            "columns": [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'our_client_name', name: 'our_client_name'},
              {data: 'title', name: 'title'},
              {data: 'date_show', name: 'date_show'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
 
        });
    }

    $(document).ready(function() {

          let data = {
            '_token': "{{csrf_token()}}"
          }

          dataTableHit(data);



      $(document).on("click", '.delete-button',function(e) {
          var id = $(this).attr('data-id');
          var obj = $(this);
          // console.log({id});
          swal({
            title: "Alert",
            text: "Are you sure you want to delete this Client?",
            type: "warning",
            showCancelButton: true,
          }, function(willDelete) {
            if (willDelete) {
              $.ajax({
                url: "{{ route('delete_our_client')}}",
                type: 'post',
                data: {
                  id: id
                },
                dataType: "JSON",
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                  if(response.success == 1) {
                    window.location.reload();
                  }
                  else {
                    console.log("FALSE");
                    setTimeout(() => {
                    alert("Something went wrong! Please try again.");
                    }, 500);
                  }
                }
              });
            } 
          });
        });





    $(document).on('click','.show-user-advance-options',function(e){
        e.preventDefault();
        $('.advance-options-user').slideToggle();
      });


    });
      </script>
@stop
