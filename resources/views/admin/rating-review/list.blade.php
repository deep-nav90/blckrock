
@extends('adminlte::page')

@section('title', 'Rating & Review')

@section('content_header')
@stop


<style>
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
@section('content')
<div class="">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header alert d-flex justify-content-between align-items-center mb-0">
          <h3>Rating & Review</h3>
          
        </div>      
        <div class="card-body">
         
          @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif
          <div class="table-responsive">
            <table style="width:100%" id="ratingReviewList" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Sr. No.</th>
                  <th>User Name</th>
                  <th>Product Name</th>
                  <th>Rating</th>
                  <th>Review</th>
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
      $("#ratingReviewList").dataTable().fnDestroy();
      $('#ratingReviewList').dataTable({
             // /dom: "Bfrtip",
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "{{ route('rating_review_list') }}",
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
              $( row ).find('td:eq(2)').attr('data-id', data['id']).attr('key_type','product_name').addClass('td_click').addClass('white_space');
              $( row ).find('td:eq(3)').attr('data-id', data['id']).attr('key_type','rating').addClass('td_click').addClass('white_space');
              $( row ).find('td:eq(3)').attr('data-id', data['id']).attr('key_type','review').addClass('td_click').addClass('white_space');
              $( row ).find('td:eq(4)').attr('data-id', data['id']).attr('key_type','date_show').addClass('td_click').addClass('white_space');
            },
            "columns": [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'full_name', name: 'full_name'},
              {data: 'product_name', name: 'product_name'},
              { data: 'rating', name: 'rating', render: function(data, type, full, meta) {
                // Assuming data is the rating value, you can modify this part as needed
                return `<span class="star_rating" style="--rating:`+data+`"></span>`
            } },
              {data: 'review', name: 'review'},
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
            text: "Are you sure you want to delete this rating & review record?",
            type: "warning",
            showCancelButton: true,
          }, function(willDelete) {
            if (willDelete) {
              $.ajax({
                url: "{{ route('delete_rating_review')}}",
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

  <script type="text/javascript">
    const ratingFromPoint = (evt) => {
      const el = evt.currentTarget;
      const pointerX = evt.pageX - el.offsetLeft;
      return Math.max(1, Math.min(5, Math.ceil(pointerX / el.offsetWidth * 5)));
    };

    const starRating = (el) => {
    //   const colorDefault = getComputedStyle(el).getPropertyValue("--color");
    //   const colorClick = "#f00";
    //   let ratingSelected = 0;
      
    //   el.addEventListener("pointerdown", (evt) => {
    //     if(el.getAttribute("give_rate") == "true"){
    //       ratingSelected = ratingFromPoint(evt);
    //       el.style.setProperty("--color", colorClick);
    //       el.style.setProperty("--rating", ratingSelected);
    //     }
        
    //   });
      
    //   el.addEventListener("pointermove", (evt) => {
    //     if(el.getAttribute("give_rate") == "true"){
    //       evt.preventDefault();
    //       const ratingHover = ratingFromPoint(evt);
    //       el.style.setProperty("--rating", ratingHover);
    //     }
        
    //   });
      
    //   el.addEventListener("pointerleave", (evt) => {
    //     if(el.getAttribute("give_rate") == "true"){
    //       el.style.setProperty("--color", colorDefault);
    //       el.style.setProperty("--rating", ratingSelected);

          
    //     }
        
    //   });

    //   el.addEventListener("pointerup", (evt) => {
    //     if(el.getAttribute("give_rate") == "true"){
    //       ratingSelected = ratingFromPoint(evt);
    //       console.log(ratingSelected); // @TODO: Send ratingSelected value to server
    //       $("#rating_product").val(ratingSelected);
    //     }
       
    //  });
   };

   document.querySelectorAll("[style^=--rating]").forEach(starRating);

</script>
@stop
