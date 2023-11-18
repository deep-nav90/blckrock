@extends('adminlte::page')

@section('title', 'Edit Product')

@section('content_header')
@stop

@section('content')

<style>

.main_icon {
    display: contents;
    
    position: relative;
  
}


.numeric_check {
    background-color: #e9ecef!important;
}


.form-control:disabled, .form-control[readonly] {
    
    color: #495057;
}

.form-group input {
    background-color: #e9ecef!important;
}

.main_icon img {
  margin: 0px 15px 0px 0px;
}

i.fa.fa-times {
    position: absolute;
    margin-left: 238px;
    margin-top: -15px;
    color: grey;
    font-weight: 600;
}

.video_setup {
    width: 200px;
    height: 150px;
    border: 2px solid #fff;
    border-radius: 7px;
    cursor: pointer;
  }

  .video_err {
      text-align: center;
      width: 100%;
      display: block;
  }


  span.video_err {
  
    color: #ff0000!important;
    font-size: 100%!important;
    
  }
  span.video_err:hover {
    color: #ff0000!important;
  }
  .dashboard_panel .add_imgae_box .user_img img.img_upload {
    border-radius: 7px;
    height: 150px;
      width: 176px;
      object-fit: contain;
      border: 2px solid #daa905;
      margin-bottom: 22px;
  }
  .dashboard_panel .add_imgae_box .add_img img.plus_icon {
    top: 129px;
      margin-left: 65px;
  }
  .dashboard_panel .add_imgae_box .cross_icon img.plus_icon {
    top: -17px;

  }
  .video_setup {
    width: 176px;
    height: 150px;
    border: 2px solid #daa905;
    border-radius: 7px;
    cursor: pointer;
  }
  .upload_align {
    display: flex;
    flex-wrap: wrap;
  }
  .mr-2 {
    margin-right: 25px !important;
  }
  .audio_img img {
    border-radius: 7px !important;
    height: 80px !important;
      width: 200px !important;
      object-fit: contain !important;
      /*border: 2px solid #fff;*/
      margin-bottom: 10px;
      margin-top: 10px;
  }
  .audio_width {
    width: 170px !important;
    height: 42px !important;
  }


  #lodaerModal .modal-body {
    text-align: center;
    margin: 0 auto;
    padding: 4rem;

}

#lodaerModal .modal-dialog {
    max-width: 400px;
    margin: 10.75rem auto;
}

.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #daa905;
  border-bottom: 16px solid #daa905;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

.user_img img {
    vertical-align: middle;
    border-style: none;
    width: 220px;
    height: 130px;
    border: 1px solid #dfdfdf;
}

.add_img.cross_icon {
    position: absolute;
    margin-left: 201px;
    margin-top: -145px;
}

img.cross_icon {
    width: 35px;
    height: 35px;
    border:unset;
}

img.click_upload.plus_icon.cross_icon_old {
    width: 35px;
    height: 35px;
    border:unset;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

.custom_check_wrap {
    margin: -20px 0px 0px 200px;
}


textarea.form-control {
    /* height: auto; */
    height: 105px!important;
}

</style>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
        <div class="card-header alert d-flex justify-content-between align-items-center">
          <a class="btn btn-sm btn-success back-button" href="{{ url()->previous() }}">{{ __('adminlte::adminlte.back') }}</a>
            <h3>Edit Product</h3>
          </div>
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <form id="addProduct" method="POST" enctype='multipart/form-data'>
              @csrf

              <input type="hidden" name="click_on_file_count" id="click_on_file_count">
              
                <input type="hidden" name="image_count" value="{{$image_count}}" id="image_count">
                <input type="hidden" name="click_on_cross_count" id="click_on_cross_count">
                <input type="hidden" name="upload_file_count" id="upload_file_count">

                <input type="hidden" name="acceptable[]" id="acceptable">
                <input type="hidden" name="non_acceptable[]" id="non_acceptable">

                <input type="hidden" name="file_deleted" id="file_deleted">


                <div class="files_container">

                    <!-- <input type='file' style="display:none" class ="files" name="files[0][]"> -->
                  
                </div>

              <div class="upload_align">

                
              


                @foreach($product_find->productImages as $productImage)
                <div class="user_img mr-2" ui="image" title="Upload Image/Video/Audio" style="position: relative; margin-bottom: 16px;">
                  <img class="click_upload img_upload" src="{{$productImage->product_image}}" alt="woman">
                  
                 



                  <div class="custom_check_wrap">
                    <div class="custom-check">
                      <input type="checkbox" data_id="{{$productImage->id}}" name="old_checkbox" disabled value="{{$productImage->id}}" @if($productImage->is_featured_image == 1) checked @endif() class="featured_checkbox_old chec" type_of_check="old">
                      <span></span>       
                    </div>
                    
                  </div>



                  
                  </div>
                  @endforeach()


              </div>

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
                          
                          <label for="name">Category<span class="text-danger"> *</span></label>
                          <select name="category_id" id="category_id" disabled class="form-control w-100 ml-0">
                            
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                            <option class="optionCategory" full_data="{{$category}}" value="{{$category->id}}" @if($category->id == $product_find->category_id) selected @endif()>{{$category->category_name}}</option>
                            @endforeach()
                            
                          </select>

                          <div id ="category_id_error" class="error"></div>
                          @if($errors->has('category_id'))
                            <div class="error">{{ $errors->first('category_id') }}</div>
                          @endif
                        </div>
                      </div>


                      <div class="col-sm-6">
                        <div class="form-group">
                          
                          <label for="name">Sub Category<span class="text-danger"> *</span></label>
                          <select name="sub_category_id" id="sub_category_id" disabled class="form-control w-100 ml-0">
                            
                            <option value="">Select Sub Category</option>
                            @foreach($product_find->category->subCategories as $sub_category)
                            <option value="{{$sub_category->id}}" @if($product_find->sub_category_id == $sub_category->id) selected @endif()>{{$sub_category->sub_category_name}}</option>
                            @endforeach()
                            
                          </select>

                          <div id ="sub_category_id_error" class="error"></div>
                          @if($errors->has('sub_category_id'))
                            <div class="error">{{ $errors->first('sub_category_id') }}</div>
                          @endif
                        </div>
                      </div>


                    

                    
                    
                </div>

                  <div class="row">

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Product Name<span class="text-danger"> *</span></label>
                        <input type="text" name="product_name" disabled class="form-control" value="{{$product_find->product_name}}" id="product_name" maxlength="50">
                        <div id ="product_name_error" class="error"></div>
                        @if($errors->has('product_name'))
                          <div class="error">{{ $errors->first('product_name') }}</div>
                        @endif
                      </div>
                    </div>


                  <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Product Quantity<span class="text-danger"> *</span></label>
                        <input type="text" name="product_quantity" disabled value="{{$product_find->product_quantity}}" class="form-control numeric_check" id="product_quantity" maxlength="50">
                        <div id ="product_quantity_error" class="error"></div>
                        @if($errors->has('product_quantity'))
                          <div class="error">{{ $errors->first('product_quantity') }}</div>
                        @endif
                      </div>
                    </div>
                  

                      <!-- <div class="col-sm-6">
                        <div class="form-group">
                          <label for="name">Sale Price<span class="text-danger"> *</span></label>
                          <textarea type="text" name="sale_price" class="form-control textareaClass" id="sale_price"></textarea>
                          <div id ="sale_price_error" class="error"></div>
                          @if($errors->has('sale_price'))
                            <div class="error">{{ $errors->first('sale_price') }}</div>
                          @endif
                        </div>
                      </div> -->

                      
                  </div>


                  <?php 
                      $meta_k = $product_find->meta_keyword ? $product_find->meta_keyword : "N/A";
                      $meta_d = $product_find->meta_description ? $product_find->meta_description : "N/A";
                    ?>

                  <div class="row">

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Meta Keyword<span class="text-danger"> *</span></label>
                        <input type="text" name="meta_keyword" disabled class="form-control" id="meta_keyword" value="{{$meta_k}}" maxlength="50">
                        <div id ="meta_keyword_error" class="error"></div>
                        @if($errors->has('meta_keyword'))
                          <div class="error">{{ $errors->first('meta_keyword') }}</div>
                        @endif
                      </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                          
                          <label for="name">Status<span class="text-danger"> *</span></label>
                          <select name="status" id="status" disabled class="form-control w-100 ml-0">
                            
                            <option value="Active" @if($product_find->status == 'Active') selected @endif()>Active</option>
                            <option value="Inactive" @if($product_find->status == 'Inactive') @endif()>Inactive</option>
                          </select>

                          <div id ="status_error" class="error"></div>
                          @if($errors->has('status'))
                            <div class="error">{{ $errors->first('status') }}</div>
                          @endif
                        </div>
                      </div>

                    

                    

                  </div>

                  

                  <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label for="name">Meta Description<span class="text-danger"> *</span></label>
                          <textarea type="text" name="meta_description" disabled class="form-control textareaClass" id="meta_description">{{$meta_d}}</textarea>
                          <div id ="meta_description_error" class="error"></div>
                          @if($errors->has('meta_description'))
                            <div class="error">{{ $errors->first('meta_description') }}</div>
                          @endif
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="name">Product Description<span class="text-danger"> *</span></label>
                          <textarea type="text" name="product_description" disabled class="form-control textareaClass" id="product_description">{{$meta_d}}</textarea>
                          <div id ="product_description_error" class="error"></div>
                          @if($errors->has('product_description'))
                            <div class="error">{{ $errors->first('product_description') }}</div>
                          @endif
                        </div>
                      </div>
                  </div>




                  <div class="attribute_and_product_price appendAttributeProductPrice">
                    <h5>Attribute & Product Price</h5>

                    <?php $i = 0; ?>
                    @foreach($product_find->productPriceAttributes as $product_price_attribute)

                    <div class="row mt-4 product_attribute" data-index="{{$i}}">


                      <div class="col-sm-2">
                        <div class="form-group">
                          <label for="name">Product Price<span class="text-danger"> *</span></label>
                          <input type="text" name="product_price[{{$i}}]" disabled value="{{$product_price_attribute->product_price}}" validate_name="Product Price" class="form-control numeric_check jqValidate">
                        </div>
                      </div>

                      <div class="col-sm-2">
                      <div class="form-group">
                          <label for="name">Sale Price<span class="text-danger"> *</span></label>
                          <input type="text" name="sale_price[{{$i}}]" disabled value="{{$product_price_attribute->sale_price}}" validate_name="Sale Price" class="form-control numeric_check jqValidate">
                        </div>
                      </div>


                      <div class="col-sm-4">
                        <div class="form-group">
                          
                          <label for="name">Attribute<span class="text-danger"> *</span></label>
                          <select name="attribute_ids[{{$i}}]" disabled validate_name="Attribute" class="form-control w-100 ml-0 jqValidate">
                            
                            <option value="">Select Attribute</option>
                            @foreach($attributes as $attribute)
                            <option value="{{$attribute->id}}" @if($product_price_attribute->attribute_id == $attribute->id) selected @endif()>{{$attribute->attribute_name}}</option>
                            @endforeach()
                            
                          </select>
                        </div>
                      </div>


                      <div class="col-sm-2">
                        <div class="form-group">
                          <label for="name">Attribute Value<span class="text-danger"> *</span></label>
                          <input type="text" name="attribute_value[{{$i}}]" disabled validate_name="Attribute Value" class="form-control numeric_check jqValidate" value="{{$product_price_attribute->attribute_value}}"  maxlength="30">
                        </div>
                      </div>


                      <div class="custom-check defaultCheckboxSelect">
                        <input type="checkbox" index_id="{{$i}}" disabled name="is_default[{{$i}}]" value="{{$i}}"  class="selectCheckBoxIndexID" @if($product_price_attribute->is_default_show == 1) checked @endif()>
                        <span></span>       
                      </div>

                      

                    </div>
                    <?php $i++; ?>
                    @endforeach()

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


<div id="alertModel" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #5FE7BA">
<!--         <button type="button" class="close" data-dismiss="modal">&times;</button>
 -->
 <div class="text-center" style="width: 100%;">       
  <h4 class="modal-title" style="font-size: 18px; color: #fff;">Alert</h4>
</div>
      </div>
      <div class="modal-body">
        <div class="text-center">
        <p style="font-size: 18px;" id="alert_message"></p>
    </div>
      </div>
        <div class="modal-footer">
          <button type="button" id="ok" class="btn btn-default" data-dismiss="modal">Ok</button>
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
  <style>
    .information_fields { margin-bottom: 30px; }
    .address_fields { margin-top: 30px; }
  </style>
@stop

@section('js')
  <script>
    $(document).ready(function() {
    
      var addProduct = $( "#addProduct" );
      addProduct.validate({
        ignore: [],
        debug: false,
        rules: {
          category_id: {
            required: true
          },
          sub_category_id: {
            required: true
          },
          product_name: {
            required: true,
            maxlength:50,
            minlength:2
          },
          
          status: {
            required: true
          },
          meta_keyword: {
            required: true,
            maxlength:50,
            minlength:2
          },
          product_quantity :{
            required:true
          },
          meta_description: {
            required: true,
            maxlength:1000,
            minlength:20
          },

          product_description: {
            required: true,
            maxlength:1000,
            minlength:20
          },
          
          
          
        },
        messages: {
          category_id: {
            required: "Please seletc category."
          },
          sub_category_id: {
            required: "Please seletc category."
          },
          product_name: {
            required: "Product Name is required.",
            maxlength:"Product Name should be less than 50 characters.",
            minlength:"Product Name should be atleast 2 characters long."
          },
          
          status: {
            required: "Please select status."
          },
          meta_keyword: {
            required: "Meta keyword is required.",
            maxlength:"Meta keyword less than 50 characters.",
            minlength:"Meta keyword should be atleast 2 characters long."
          },
          product_quantity : {
            required : "Product Quantity is required."
          },
          meta_description: {
            required: "Meta Description is required.",
            maxlength:"Meta Description should be less than 1000 characters.",
            minlength:"Meta Description should be atleast 20 characters long."
          },
          product_description: {
            required: "Product Description is required.",
            maxlength:"Product Description should be less than 1000 characters.",
            minlength:"Product Description should be atleast 20 characters long."
          },
                    
        },
        submitHandler:function(form){

                
                
                

                

                let image_count = $("#image_count").val();
                

                if(image_count == "" || image_count == 0){
                  swal("Alert", "Please upload images.", "error");
                  
                  
                  return false;
                }

                $("#submitButton").attr('disabled', "true");
                $("#lodaerModal").modal("show");
                $("#lodaerModal").unbind("click");
                  
                form.submit();
                //form.submit();
            },
        onkeyup: false,
        onblur: true
      });
    });
  </script>

   <script type="text/javascript">
  $(document).ready(function(){

    enableClickClasses();

    function enableClickClasses(){

      $(".file_upload_click").click(function(){

        let __count_click = $("#click_on_file_count").val();



        __count = __count_click == "" ? 0 : parseInt(__count_click) + 1;

        $("#click_on_file_count").val(__count);

        
        /*Make Html Input FIles*/

        $(".files_container").append(`<input type='file' style="display:none" id="files_`+__count+`" class ="files appendFiles" name="files[`+__count+`][]" multiple>`);


        $("#files_"+__count).click();



        $("#files_"+__count).on("change",function(event){

          var files = event.target.files;

          let error = "false";

            let image_count = 0;
            let video_count = 0;
            let audio_count = 0;

          $.each(files, function (i) {
              
            let file = event.target.files[i];


            let size = event.target.files[i].size;



                    if(file.type == "image/jpeg" || file.type == "image/jpg" || file.type == "image/png"){

                      if(size > 5242880){
                    
                        $("#alertModel").modal("show");
                          $("#alert_message").text("Image should not be greater than 5 MB.");
                          $("#alertModel").unbind("click");

                          $("#files_"+__count).remove();  
                          error = "true";
                          return false;
                        }

                        image_count++;
                     
                  }else{
                      

                      $("#alertModel").modal("show");
                      $("#alert_message").text("Please select image type of .jpg, .jpeg or .png format only.");
                      $("#alertModel").unbind("click");


                      $("#files_"+__count).remove();  
                      error =  "true";
                      return false;

                   }





          });

             // console.log(image_count);

            if(error == "false"){

              let already_upload_img_count = $("#image_count").val();

              let total_img_count = parseInt(already_upload_img_count) + image_count;

              


              let total_file_count = total_img_count;

              if(total_file_count > 10){
                
                $("#alertModel").modal("show");
                $("#alert_message").text("Maximum 10 images is allowed.");
                $("#alertModel").unbind("click");


                $("#files_"+__count).remove();  
                error =  "true";
                return false;
              }
              


              if(total_img_count > 10){

                $("#alertModel").modal("show");
                $("#alert_message").text("Maximum 10 images is allowed.");
                $("#alertModel").unbind("click");


                $("#files_"+__count).remove();  
                error =  "true";
                return false;
              }


            


            }


          if(error == "false"){

          $.each(files, function (i) {
              
            let file = event.target.files[i];


            if(file){

                     if(file.type == "image/jpeg" || file.type == "image/jpg" || file.type == "image/png"){

                      var reader = new FileReader();
                      
                      reader.onload = function(e) {
                        //$('#profile_picture').attr('src', e.target.result);
                        
                        let upload_file_count_val = $("#upload_file_count").val();

                        let __upload_file_count = upload_file_count_val == "" ? 1 : parseInt(upload_file_count_val) + 1;

                        $("#upload_file_count").val(__upload_file_count);


                        let acceptable_file_arr = __count+'_'+i;

                        
                        let acceptable_val = $("#acceptable").val();

                        let push_val_acceptable = acceptable_val == "" ? acceptable_file_arr : acceptable_val+','+acceptable_file_arr;

               

                        $("#acceptable").val(push_val_acceptable);


                        let image_count_val = $("#image_count").val();

                        let __count_image = image_count_val == "" ? 1 : parseInt(image_count_val) + 1;

                        $("#image_count").val(__count_image);



                        $(".upload_align").append(`<div class="user_img mr-2" ui="image" style="position: relative; margin-bottom: 16px;">
                  <img class="click_upload img_upload" id="accept_`+acceptable_file_arr+`" src="`+e.target.result+`" alt="woman">
                  
                  <div class="add_img cross_icon">
                    <img class="click_upload plus_icon cross_icon" ui="image" id="cross_`+acceptable_file_arr+`" src="{{url('/cross.png')}}" alt="cross">
                  </div>

                  <div class="custom_check_wrap">
                    <div class="custom-check">
                      <input type="checkbox" data_id="`+acceptable_file_arr+`" class="featured_checkbox_new chec" type_of_check="new" name="new_checkbox" value="`+acceptable_file_arr+`">
                      <span></span>       
                    </div>
                    
                  </div>


                  
                </div>`);




                        //cross function

                        $("#cross_"+acceptable_file_arr).on("click",function(){




                  let check_type = $(this).attr("ui");

                  if(check_type == "image"){
                    
                            let parent_div = $(this).parent().parent();

                            
                    let image_count_val = $("#image_count").val();

                    let sub_image_count_val = image_count_val - 1;

                    $("#image_count").val(sub_image_count_val);


                    let non_acceptable = $("#non_acceptable").val();

                    let acceptable = $(this).attr('id');

                    acceptable = acceptable.replace("cross_", "");

                            let push_val_non_acceptable = non_acceptable == "" ? acceptable : non_acceptable+','+acceptable;

                   

                            $("#non_acceptable").val(push_val_non_acceptable);


                            let cross_count_val = $("#click_on_cross_count").val();


                            let cross_count = cross_count_val == "" ? 1 : parseInt(cross_count_val) + 1;

                            $("#click_on_cross_count").val(cross_count);

                            parent_div.remove();



                  }

    
                        });

                        //end cross function




                      }
              
                     reader.readAsDataURL(file);
                     
                    }

                  }



          });
          }


          

        });

      });

    }

  })
 </script>


<script type="text/javascript">
  $(document).ready(function(){
    $("#ok").on("click",function(){
      $("#alertModel").modal("hide");
    });



    $(document).on("keypress",".numeric_check",function (event) {

      let key_number_put =  "";
      var charCode = (event.which) ? event.which : event.keyCode;
      
      var number = this.value.split('.');


      if(charCode == 48){
          key_number_put = 0;
      }else if(charCode == 49){
          key_number_put = 1;
      }else if(charCode == 50){
          key_number_put = 2;
      }else if(charCode == 51){
          key_number_put = 3;
      }else if(charCode == 52){
          key_number_put = 4;
      }else if(charCode == 53){
          key_number_put = 5;
      }else if(charCode == 54){
          key_number_put = 6;
      }else if(charCode == 55){
          key_number_put = 7;
      }else if(charCode == 56){
          key_number_put = 8;
      }else if(charCode == 57){
          key_number_put = 9;
      }

      let __val_add = number.toString() + key_number_put.toString();

      
      if(parseFloat(__val_add) > 9999999.99){
          event.preventDefault();
          
      }else{
          if(parseFloat(__val_add) == 9999999.99){
              if(charCode == 46){
                  event.preventDefault();
              }
          }   
          
      }

      var $this = $(this);
      if ((event.which != 46 || $this.val().indexOf('.') != -1) && ((event.which <48 || event.which > 57) && (event.which != 0 && event.which != 8))) {
          event.preventDefault();
      }
      var text = $(this).val();
      if (text.length === 18) {
          $(this).val(text + ".")
      }
      if ((event.which == 46) && (text.indexOf('.') == -1)) {
          setTimeout(function () {
              if ($this.val().substring($this.val().indexOf('.')).length > 3) {
                  $this.val($this.val().substring(0, $this.val().indexOf('.') + 3));
              }
          }, 1);
      }
      if ((text.indexOf('.') == 18 && text.substring(text.indexOf('.')).length > 2)) {
          event.preventDefault();
      }
      if (((text.indexOf('.') != -1) && (text.substring(text.indexOf('.')).length > 2) && (event.which != 0 && event.which != 8) && ($(this)[0].selectionStart >= text.length - 2))) {
          event.preventDefault();
      }
    });


    $(document).on('keydown keyup',".numeric_check", function(event) {
        
      if (event.key === "Backspace" || event.key === "Delete") {
          
          if(this.value > 0){
              
              setTimeout(function(){
                  if(event.target.value.toString().split('.')[0].length <= 0){

                      let ____val;
                      if(event.target.value.toString().split('.')[1] != undefined){
                          ____val = "000000000."+($(".numeric_check").val().toString().split('.')[1])
                      }else{
                          ____val = "";
                      }
                      
                      
                  }

                  if(event.target.value > 9999999){
                      let remove_lentgh = 1;
                      if(event.target.value.length > 7){
                          remove_lentgh = 2
                      }
                      $(this).val(event.target.value.substring(0, event.target.value.length - remove_lentgh))
                  }

              },50)
              
          }
          
      }else{
          if(event.target.value > 9999999.99){
              $(this).val(9999999.99);
          }
      }
   });

  });
</script>


<script type="text/javascript">
  $(document).ready(function(){

    $(".cross_icon_old").on("click",function(){
      let del_id = $(this).attr("del_id");
      let type = $(this).attr("ui");

      let deleted_files = $("#file_deleted").val();

      let push_val_del_file = deleted_files == "" ? del_id : deleted_files+','+del_id;

      $("#file_deleted").val(push_val_del_file);

      let parent_find_div = "";
      if(type == "image"){

        parent_find_div = $(this).parent().parent();

        let img_count = $("#image_count").val();

        let sub_1 = img_count - 1;

        $("#image_count").val(sub_1);

      }

      parent_find_div.remove();
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $(document).on("click",".featured_checkbox_old",function(){
      $(".chec").prop("checked", false);
      $(this).prop("checked", true);
    })

    $(document).on("click",".featured_checkbox_new",function(){
      $(".chec").prop("checked", false);
      $(this).prop("checked", true);
    })

    $(document).on("change","#category_id",function(){
      let val = $(this).val();
      let categoryData = JSON.parse($(".optionCategory[value='"+val+"']").attr("full_data"));
      let subCategories = categoryData.sub_categories;

      let options = `<option value="">Select Sub Category</option>`;
      subCategories.map(function(e){
        options += `<option value="`+e.id+`">`+e.sub_category_name+`</option>`;
      })

      $("#sub_category_id").html(options);
    })



    $(document).on("click",".plus_minus_icon",function(){

      let icon_type = $(this).attr("icon_type");
      let index_id = parseInt($(".plus_minus_icon").last().attr('index_id'));
      let next_index = index_id + 1;
      if(icon_type == "plus"){
        let appendHtml = '';

        appendHtml += `<div class="row mt-4 product_attribute" data-index="`+next_index+`">


                      <div class="col-sm-2">
                        <div class="form-group">
                          <label for="name">Product Price<span class="text-danger"> *</span></label>
                          <input type="text" name="product_price[`+next_index+`]" validate_name="Product Price" class="form-control numeric_check jqValidate">
                        </div>
                      </div>

                      <div class="col-sm-2">
                      <div class="form-group">
                          <label for="name">Sale Price<span class="text-danger"> *</span></label>
                          <input type="text" name="sale_price[`+next_index+`]" validate_name="Sale Price" class="form-control numeric_check jqValidate">
                        </div>
                      </div>


                      <div class="col-sm-4">
                        <div class="form-group">
                          
                          <label for="name">Attribute<span class="text-danger"> *</span></label>
                          <select name="attribute_ids[`+next_index+`]" validate_name="Attribute" class="form-control w-100 ml-0 jqValidate">
                            
                            <option value="">Select Attribute</option>
                            @foreach($attributes as $attribute)
                            <option value="{{$attribute->id}}">{{$attribute->attribute_name}}</option>
                            @endforeach()
                            
                          </select>
                        </div>
                      </div>


                      <div class="col-sm-2">
                        <div class="form-group">
                          <label for="name">Attribute Value<span class="text-danger"> *</span></label>
                          <input type="text" name="attribute_value[`+next_index+`]" validate_name="Attribute Value" class="form-control numeric_check jqValidate"  maxlength="30">
                        </div>
                      </div>

                      <div class="custom-check defaultCheckboxSelect">
                        <input type="checkbox" index_id="`+next_index+`" name="is_default[`+next_index+`]" value="`+next_index+`"   class="selectCheckBoxIndexID">
                        <span></span>       
                      </div>

                      <div class="plus_minus_icon" icon_type = "minus" index_id="`+next_index+`">
                        <img class="icon_img" src="{{url('public/images/minus_icon.png')}}">
                      </div>

                    </div>`;

        $(".appendAttributeProductPrice").append(appendHtml);
      }else{
        //remove case

        let topParent = $(this).parents(".product_attribute");
        topParent.remove();


        let checkSelectedCheckbox = $(".selectCheckBoxIndexID:checked");
        console.log(checkSelectedCheckbox)
        if(checkSelectedCheckbox.length <= 0){
          $(".selectCheckBoxIndexID").eq(0).prop("checked",true);
        }

      }


      
      addRulesValidation();
      
      

    })


    addRulesValidation();


    $(document).on("click",".selectCheckBoxIndexID",function(){
      $(".selectCheckBoxIndexID").prop("checked",false);
      $(this).prop("checked", true);
    })


  })


function addRulesValidation(){
    $('.jqValidate').each(function () {
      let validate_name=$(this).attr('validate_name');
        $(this).rules('add', {
            required: true,
            messages: {
                required: validate_name +" is required."
            }
        });

    });
  }

</script>

 
@stop
