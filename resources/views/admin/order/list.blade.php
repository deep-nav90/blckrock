
@extends('adminlte::page')

@section('title', 'Orders')

@section('content_header')
@stop

@section('content')

<style type="text/css">
  
  [style^=--rating] {
  --color: #fb0;
  display: inline-block;
  touch-action: none;
  user-select: none;
  cursor: pointer;
}

[style^=--rating]::after {
  content: "★★★★★";
  font-size: 1.2em;
  white-space: nowrap;
  background: linear-gradient(90deg, var(--color) calc(var(--rating) * 20%), #ddd calc(var(--rating) * 20%));
  background-clip: text;
  -webkit-background-clip: text;
  color: #0000;
}

</style>
<div class="">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header alert d-flex justify-content-between align-items-center mb-0">
          <h3>Orders</h3>

        </div>      
        <div class="card-body">
         
          @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif
          <div class="table-responsive">
            <table style="width:100%" id="categoryList" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Sr. No.</th>
                  <th>Order ID</th>
                  <th>User Name</th>
                  <th>Total Amount</th>
                  <th>Discount Amount</th>
                  <th>Pay Amount</th>

                  <th>Payment Type</th>

                  <th>Payment Received</th>
                  <th>Status</th>
                  
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

<div class="modal fade" id="lodaerModal" tabindex="-1" role="dialog" aria-labelledby="lodaerModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     
      <img src="{{url('/public/loading-buffering.gif')}}" style="width: 50px; height:50px;">
     
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
      $("#categoryList").dataTable().fnDestroy();
      $('#categoryList').dataTable({
             // /dom: "Bfrtip",
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "{{ route('order_list') }}",
                "type": "POST",
                "data" : dataGET,
              complete:function(){

                // if($("#basic-datatables_wrapper").find(".wrap_all").length <= 0){

                //   $('#basic-datatables_info,#basic-datatables_paginate').wrapAll('<div class="wrap_all"></div>'); 
                // }

              }

            },
            createdRow: function( row, data, dataIndex ) {

              $( row ).find('td:eq(1)').attr('data-id', data['id']).attr('key_type','unique_order_id').addClass('td_click').addClass('white_space');
              $( row ).find('td:eq(2)').attr('data-id', data['id']).attr('key_type','user_name').addClass('td_click').addClass('white_space');
              $( row ).find('td:eq(3)').attr('data-id', data['id']).attr('key_type','total_amount').addClass('td_click').addClass('white_space');
              $( row ).find('td:eq(4)').attr('data-id', data['id']).attr('key_type','discount_amount_for_coupon').addClass('td_click').addClass('white_space');
              
              $( row ).find('td:eq(5)').attr('data-id', data['id']).attr('key_type','pay_amount').addClass('td_click').addClass('white_space');
              
              $( row ).find('td:eq(6)').attr('data-id', data['id']).attr('key_type','payment_type').addClass('td_click').addClass('white_space');

              $( row ).find('td:eq(7)').attr('data-id', data['id']).attr('key_type','payment_received').addClass('td_click').addClass('white_space');


              $( row ).find('td:eq(8)').attr('data-id', data['id']).attr('key_type','order_status').addClass('td_click').addClass('white_space');

              $( row ).find('td:eq(9)').attr('data-id', data['id']).attr('key_type','date_show').addClass('td_click').addClass('white_space');

            },
            "columns": [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'unique_order_id', name: 'unique_order_id'},
              {data: 'user_name', name: 'user_name'},
              {data: 'total_amount', name: 'total_amount'},
              {data: 'discount_amount_for_coupon', name: 'discount_amount_for_coupon'},
              {data: 'pay_amount', name: 'pay_amount'},
              {data: 'payment_type', name: 'payment_type'},
              {data: 'payment_received', name: 'payment_received'},
              {data: 'order_status', name: 'order_status'},
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




    $(document).on('click','.show-user-advance-options',function(e){
        e.preventDefault();
        $('.advance-options-user').slideToggle();
      });


    });
      </script>

      <script type="text/javascript">
        const ratingFromPoint = (evt) => {
          const el = evt.currentTarget;
          const pointerX = evt.pageX - el.offsetLeft;
          return Math.max(1, Math.min(5, Math.ceil(pointerX / el.offsetWidth * 5)));
        };

        const starRating = (el) => {
        // const colorDefault = getComputedStyle(el).getPropertyValue("--color");
        // const colorClick = "#f00";
        // let ratingSelected = 0;
        
        // el.addEventListener("pointerdown", (evt) => {
        //   ratingSelected = ratingFromPoint(evt);
        //   el.style.setProperty("--color", colorClick);
        //   el.style.setProperty("--rating", ratingSelected);
        // });
        
        // el.addEventListener("pointermove", (evt) => {
        //   evt.preventDefault();
        //   const ratingHover = ratingFromPoint(evt);
        //   el.style.setProperty("--rating", ratingHover);
        // });
        
        // el.addEventListener("pointerleave", (evt) => {
        //   el.style.setProperty("--color", colorDefault);
        //   el.style.setProperty("--rating", ratingSelected);
        // });

        // el.addEventListener("pointerup", (evt) => {
        //   ratingSelected = ratingFromPoint(evt);
        //   console.log(ratingSelected); // @TODO: Send ratingSelected value to server
        // });
      };

      document.querySelectorAll("[style^=--rating]").forEach(starRating);

      </script>

      <script type="text/javascript">
        $(document).ready(function(){
          $(document).on("click",".acceptReject",function(){
            let action = $(this).attr("action");
            let data_id = $(this).attr("data-id");

            if(action == "accept"){
              swal({
                  title: "Alert",
                  text: "Are you sure you want to accept this order.",
                  type: "warning",
                  showCancelButton: true,
              }, function(willDelete) {

                  if(willDelete){

                    $("#lodaerModal").modal("show");


                    let data = {
                      order_id : data_id,
                      action : action
                    }

                    $.ajax({
                        url:"{{route('acceptRejectOrder')}}",
                        data: data,
                        // contentType: false,
                        // processData: false,
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
                                    window.location.href="{{route('order_list')}}";
                                });

                                
                            }else{
                                swal("Alert", res.message, "error");
                            }

                            setTimeout(() => {
                                $("#lodaerModal").modal("hide");
                                $("#submitButton").removeAttr('disabled');
                                
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

                  }
                  
              });
            }else{

              swal({
                  title: "Alert",
                  text: "Are you sure you want to reject this order.",
                  type: "warning",
                  showCancelButton: true,
              }, function(willDelete) {

                if(willDelete)     {

                  $("#lodaerModal").modal("show");

                  let data = {
                      order_id : data_id,
                      action : action
                    }

                    $.ajax({
                        url:"{{route('acceptRejectOrder')}}",
                        data: data,
                        // contentType: false,
                        // processData: false,
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
                                    window.location.href="{{route('order_list')}}";
                                });

                                
                            }else{
                                swal("Alert", res.message, "error");
                            }

                            setTimeout(() => {
                                $("#lodaerModal").modal("hide");
                                $("#submitButton").removeAttr('disabled');
                                
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
                }
                  
              });
            }
          })
        })
      </script>
@stop
