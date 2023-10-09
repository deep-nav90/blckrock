
@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
@stop

@section('content')
<div class="">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header alert d-flex justify-content-between align-items-center mb-0">
          <h3>Users</h3>
<!--           <a href="" class="show-user-advance-options">Advance Options <i class="fa fa-caret-down"></i></a> -->
        </div>      
        <div class="card-body">
         <!--  <div class="advance_options text-right mb-3">
            <div class="advance-options-user payment_advance_options">
              <div class="title text-left">
                <h5><i class="fa fa-filter mr-1"></i>Apply Search Filter</h5>
              </div>
              <div class="left_option">
                <div class="button_input_wrap d-flex align-items-center mr-0">
                  <div class="select_input d-flex align-items-center mr-2">
                    <div class="input_wrap text-left">
                      <label>Select User Type</label>
                      <select name="status" id="user_type" class="form-control w-100 ml-0">
                        <option value="">All</option>
                        <option value="Employer">Employer</option>
                        <option value="Staff">Staff</option>
                      </select>
                    </div>
                  </div>

                   <div class="select_input d-flex align-items-center mr-2">
                    <div class="input_wrap text-left">
                      <label>Select User Status</label>
                      <select name="status" id="user_status" class="form-control w-100 ml-0">
                        <option value="">All</option>
                        <option value="Unblock">Unblock</option>
                        <option value="Block">Block</option>
                        <option value="Online">Online</option>
                        <option value="Active_Users">Active Users</option>
                        <option value="Locked_Users_Account">Locked Users Account</option>
                        <option value="Most_Active_Users">Most Active Users</option>
                      </select>
                    </div>
                  </div>

                  <div class="apply_reset_btn ml-0">
                    <button class="btn btn-primary apply apply-filter mr-1"><i class="fas fa-paper-plane mr-2"></i>Apply</button>
                    <button class="btn btn-primary reset-button"><i class="fas fa-sync-alt mr-2"></i>Reset</button>
                  </div>
                </div>
              </div>

            </div>
          </div>
 -->          @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif
          <div class="table-responsive">
            <table style="width:100%" id="userList" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Sr. No.</th>
                  <th>Full Name</th>
                  <th>Email</th>
                  <th>Status</th>
                  <th>Created At</th>

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
      $("#userList").dataTable().fnDestroy();
      $('#userList').dataTable({
             // /dom: "Bfrtip",
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "{{ route('user_index') }}",
                "type": "POST",
                "data" : dataGET,
              complete:function(){

                // if($("#basic-datatables_wrapper").find(".wrap_all").length <= 0){

                //   $('#basic-datatables_info,#basic-datatables_paginate').wrapAll('<div class="wrap_all"></div>'); 
                // }

              }

            },
            createdRow: function( row, data, dataIndex ) {

              $( row ).find('td:eq(1)').attr('data-id', data['id']).attr('key_type','full_name').addClass('td_click').addClass('white_space');
              $( row ).find('td:eq(2)').attr('data-id', data['id']).attr('key_type','email').addClass('td_click').addClass('white_space');
              $( row ).find('td:eq(3)').attr('data-id', data['id']).attr('key_type','is_block').addClass('td_click');
              $( row ).find('td:eq(4)').attr('data-id', data['id']).attr('key_type','date_show').addClass('td_click');
            },
            "columns": [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'full_name', name: 'full_name'},
              {data: 'email', name: 'email'},
              {data: 'is_block', name: 'is_block'},
              {data: 'date_show', name: 'date_show'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
 
        });
    }

    $(document).ready(function() {
  
          let user_status = $("#user_status").val();
          let user_type = $("#user_type").val();

          let data = {
            '_token': "{{csrf_token()}}",
            'user_status' : user_status,
            'user_type' : user_type
          }

          dataTableHit(data);


          $(".apply-filter").on("click",function(){

            let __user_status = $("#user_status").val();
            let __user_type= $("#user_type").val();

            let __data = {
              '_token': "{{csrf_token()}}",
              'user_status' : __user_status,
              'user_type' : __user_type
            }

            
            dataTableHit(__data);

          });

          $(".reset-button").on("click",function(){

            $("#user_status").val("");
            $("#user_type").val("");

            let ____user_status = $("#user_status").val();
            let ____user_type = $("#user_type").val();

            let ____data = {
              '_token': "{{csrf_token()}}",
              'user_status' : ____user_status,
              'user_type' : ____user_type
            }

            
            dataTableHit(____data);

          });






      $(document).on("click", '.delete-button',function(e) {
          var id = $(this).attr('data-id');
          var obj = $(this);
          // console.log({id});
          swal({
            title: "Are you sure?",
            text: "Are you sure you want to delete this user?",
            type: "warning",
            showCancelButton: true,
          }, function(willDelete) {
            if (willDelete) {
              $.ajax({
                url: "{{ route('delete_user')}}",
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
