@extends('adminlte::page')

@section('title', 'Role Permissions')

@section('content_header')
@stop

@section('content')
<div class="">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header alert d-flex justify-content-between align-items-center mb-0">
          <a class="btn btn-sm btn-success back-button" href="{{ url()->previous() }}">{{ __('adminlte::adminlte.back') }}</a>
            <h3>Permissions</h3>
          </div>
          <div class="card-body pb-3">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <form id="addRoleForm" method="post", action="{{ route('save_permissions') }}">
              @csrf
              <div class="card-body">
                <div class="role-name">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label for="role_name">{{ __('adminlte::adminlte.role_name') }}</label>
                        <input type="hidden" name="role_id" id="role_id">
                        <select name="role_name" class="form-control" id="role_name">
                            <option value="" hidden>Select Role</option>
                          @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                          @endforeach
                        </select>
                        @if($errors->has('role_name'))
                          <div class="error">{{ $errors->first('role_name') }}</div>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="role-permissions" id="role-permissions">
                  <label for="permissions[]" class="label">{{ __('adminlte::adminlte.permissions') }}</label>
                  <label id="permissions[]-error" class="error" for="permissions[]" style="font-weight: 400 !important;"></label>
                  <br>
                  @if($errors->has('permissions'))
                    <div class="error">{{ $errors->first('permissions') }}</div>
                  @endif

                  <div class="custom_check_wrap">
                    <div class="custom-check">
                      <input type="checkbox" id="full_access" class="">
                      <span></span>       
                    </div>
                    <strong>FULL ACCESS</strong>                     
                  </div> 

                  <div class="title">
                    <h5>User Management</h5>
                    <hr/>
                  </div>

                  <div class="row permissions-section">
                    
              
                    <div class="col-md-4">
                      <div class="form-group">
                        <div class="permissions-section-inner-sec">
                          <p class="headings"><strong class="list-text">Users</strong></p>
                          <div class="custom_check_wrap">
                            <div class="custom-check">
                              <input type="checkbox" id="users_permissions" class="ckbCheckAll">
                              <span></span>
                            </div>
                              <strong class="list-text">Select All</strong>
                          </div>
                          <div id="checkBoxes">
                            @foreach($usersPermissions as $permission)
                              <div class="custom_check_wrap">
                                <div class="custom-check">
                                  <input type="checkbox" class="checkBoxClass userscheckBox" name="permissions[]" value="{{ $permission->id }}" id="button_{{ $permission->id }}">
                                  <span></span>
                                </div>
                                <label class="mb-0">{{ $permission->name }}</label>
                              </div>
                            @endforeach
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <div class="permissions-section-inner-sec">
                          <p class="headings"><strong class="list-text">Admins</strong></p>
                          <div class="custom_check_wrap">
                            <div class="custom-check">
                              <input type="checkbox" id="admins_permissions" class="ckbCheckAll">
                              <span></span>
                            </div>
                              <strong class="list-text">Select All</strong>
                          </div>
                          <div id="checkBoxes">
                            @foreach($adminsPermissions as $permission)
                              <div class="custom_check_wrap">
                                <div class="custom-check">
                                  <input type="checkbox" class="checkBoxClass adminscheckBox" name="permissions[]" value="{{ $permission->id }}" id="button_{{ $permission->id }}">
                                  <span></span>
                                </div>
                                <label class="mb-0">{{ $permission->name }}</label>
                              </div>
                            @endforeach
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>

                  



                  <div class="title">
                    <h5>Category Management</h5>
                    <hr/>
                  </div>

                  <div class="row permissions-section">
                    
              
                    <div class="col-md-4">
                      <div class="form-group">
                        <div class="permissions-section-inner-sec">
                          <p class="headings"><strong class="list-text">Categories</strong></p>
                          <div class="custom_check_wrap">
                            <div class="custom-check">
                              <input type="checkbox" id="category_permissions" class="ckbCheckAll">
                              <span></span>
                            </div>
                              <strong class="list-text">Select All</strong>
                          </div>
                          <div id="checkBoxes">
                            @foreach($categoriesPermissions as $permission)
                              <div class="custom_check_wrap">
                                <div class="custom-check">
                                  <input type="checkbox" class="checkBoxClass categoriescheckBox" name="permissions[]" value="{{ $permission->id }}" id="button_{{ $permission->id }}">
                                  <span></span>
                                </div>
                                <label class="mb-0">{{ $permission->name }}</label>
                              </div>
                            @endforeach
                          </div>
                        </div>
                      </div>
                    </div>


                    <div class="col-md-4">
                      <div class="form-group">
                        <div class="permissions-section-inner-sec">
                          <p class="headings"><strong class="list-text">Sub Categories</strong></p>
                          <div class="custom_check_wrap">
                            <div class="custom-check">
                              <input type="checkbox" id="sub_category_permissions" class="ckbCheckAll">
                              <span></span>
                            </div>
                              <strong class="list-text">Select All</strong>
                          </div>
                          <div id="checkBoxes">
                            @foreach($subcategoriesPermissions as $permission)
                              <div class="custom_check_wrap">
                                <div class="custom-check">
                                  <input type="checkbox" class="checkBoxClass subcategoriescheckBox" name="permissions[]" value="{{ $permission->id }}" id="button_{{ $permission->id }}">
                                  <span></span>
                                </div>
                                <label class="mb-0">{{ $permission->name }}</label>
                              </div>
                            @endforeach
                          </div>
                        </div>
                      </div>
                    </div>



                  </div>
                  

                  

                  <div class="title">
                    <h5>Attribute Management</h5>
                    <hr/>
                  </div>

                  <div class="row permissions-section">
                    
              
                    <div class="col-md-4">
                      <div class="form-group">
                        <div class="permissions-section-inner-sec">
                          <p class="headings"><strong class="list-text">Attributes</strong></p>
                          <div class="custom_check_wrap">
                            <div class="custom-check">
                              <input type="checkbox" id="attribute_permissions" class="ckbCheckAll">
                              <span></span>
                            </div>
                              <strong class="list-text">Select All</strong>
                          </div>
                          <div id="checkBoxes">
                            @foreach($attributesPermissions as $permission)
                              <div class="custom_check_wrap">
                                <div class="custom-check">
                                  <input type="checkbox" class="checkBoxClass attributescheckBox" name="permissions[]" value="{{ $permission->id }}" id="button_{{ $permission->id }}">
                                  <span></span>
                                </div>
                                <label class="mb-0">{{ $permission->name }}</label>
                              </div>
                            @endforeach
                          </div>
                        </div>
                      </div>
                    </div>


                    



                  </div>


                  <div class="title">
                    <h5>Coupon Management</h5>
                    <hr/>
                  </div>

                  <div class="row permissions-section">
                    
              
                    <div class="col-md-4">
                      <div class="form-group">
                        <div class="permissions-section-inner-sec">
                          <p class="headings"><strong class="list-text">Coupons</strong></p>
                          <div class="custom_check_wrap">
                            <div class="custom-check">
                              <input type="checkbox" id="coupon_permissions" class="ckbCheckAll">
                              <span></span>
                            </div>
                              <strong class="list-text">Select All</strong>
                          </div>
                          <div id="checkBoxes">
                            @foreach($couponsPermissions as $permission)
                              <div class="custom_check_wrap">
                                <div class="custom-check">
                                  <input type="checkbox" class="checkBoxClass couponscheckBox" name="permissions[]" value="{{ $permission->id }}" id="button_{{ $permission->id }}">
                                  <span></span>
                                </div>
                                <label class="mb-0">{{ $permission->name }}</label>
                              </div>
                            @endforeach
                          </div>
                        </div>
                      </div>
                    </div>


                    



                  </div>



                  <div class="title">
                    <h5>Product Management</h5>
                    <hr/>
                  </div>

                  <div class="row permissions-section">
                    
              
                    <div class="col-md-4">
                      <div class="form-group">
                        <div class="permissions-section-inner-sec">
                          <p class="headings"><strong class="list-text">Products</strong></p>
                          <div class="custom_check_wrap">
                            <div class="custom-check">
                              <input type="checkbox" id="product_permissions" class="ckbCheckAll">
                              <span></span>
                            </div>
                              <strong class="list-text">Select All</strong>
                          </div>
                          <div id="checkBoxes">
                            @foreach($productsPermissions as $permission)
                              <div class="custom_check_wrap">
                                <div class="custom-check">
                                  <input type="checkbox" class="checkBoxClass productscheckBox" name="permissions[]" value="{{ $permission->id }}" id="button_{{ $permission->id }}">
                                  <span></span>
                                </div>
                                <label class="mb-0">{{ $permission->name }}</label>
                              </div>
                            @endforeach
                          </div>
                        </div>
                      </div>
                    </div>


                    



                  </div>


                  <div class="title">
                    <h5>Order Management</h5>
                    <hr/>
                  </div>

                  <div class="row permissions-section">
                    
              
                    <div class="col-md-4">
                      <div class="form-group">
                        <div class="permissions-section-inner-sec">
                          <p class="headings"><strong class="list-text">Orders</strong></p>
                          <div class="custom_check_wrap">
                            <div class="custom-check">
                              <input type="checkbox" id="order_permissions" class="ckbCheckAll">
                              <span></span>
                            </div>
                              <strong class="list-text">Select All</strong>
                          </div>
                          <div id="checkBoxes">
                            @foreach($ordersPermissions as $permission)
                              <div class="custom_check_wrap">
                                <div class="custom-check">
                                  <input type="checkbox" class="checkBoxClass orderscheckBox" name="permissions[]" value="{{ $permission->id }}" id="button_{{ $permission->id }}">
                                  <span></span>
                                </div>
                                <label class="mb-0">{{ $permission->name }}</label>
                              </div>
                            @endforeach
                          </div>
                        </div>
                      </div>
                    </div>


                    



                  </div>


                  <div class="title">
                    <h5>Payment Management</h5>
                    <hr/>
                  </div>

                  <div class="row permissions-section">
                    
              
                    <div class="col-md-4">
                      <div class="form-group">
                        <div class="permissions-section-inner-sec">
                          <p class="headings"><strong class="list-text">Payments</strong></p>
                          <div class="custom_check_wrap">
                            <div class="custom-check">
                              <input type="checkbox" id="payment_permissions" class="ckbCheckAll">
                              <span></span>
                            </div>
                              <strong class="list-text">Select All</strong>
                          </div>
                          <div id="checkBoxes">
                            @foreach($paymentsPermissions as $permission)
                              <div class="custom_check_wrap">
                                <div class="custom-check">
                                  <input type="checkbox" class="checkBoxClass paymentscheckBox" name="permissions[]" value="{{ $permission->id }}" id="button_{{ $permission->id }}">
                                  <span></span>
                                </div>
                                <label class="mb-0">{{ $permission->name }}</label>
                              </div>
                            @endforeach
                          </div>
                        </div>
                      </div>
                    </div>


                    



                  </div>


                  <div class="title">
                    <h5>Our Client Management</h5>
                    <hr/>
                  </div>

                  <div class="row permissions-section">
                    
              
                    <div class="col-md-4">
                      <div class="form-group">
                        <div class="permissions-section-inner-sec">
                          <p class="headings"><strong class="list-text">Our Clients</strong></p>
                          <div class="custom_check_wrap">
                            <div class="custom-check">
                              <input type="checkbox" id="our_client_permissions" class="ckbCheckAll">
                              <span></span>
                            </div>
                              <strong class="list-text">Select All</strong>
                          </div>
                          <div id="checkBoxes">
                            @foreach($ourClientsPermissions as $permission)
                              <div class="custom_check_wrap">
                                <div class="custom-check">
                                  <input type="checkbox" class="checkBoxClass ourClientscheckBox" name="permissions[]" value="{{ $permission->id }}" id="button_{{ $permission->id }}">
                                  <span></span>
                                </div>
                                <label class="mb-0">{{ $permission->name }}</label>
                              </div>
                            @endforeach
                          </div>
                        </div>
                      </div>
                    </div>


                    



                  </div>



                  <div class="title">
                    <h5>Contact Us Management</h5>
                    <hr/>
                  </div>

                  <div class="row permissions-section">
                    
              
                    <div class="col-md-4">
                      <div class="form-group">
                        <div class="permissions-section-inner-sec">
                          <p class="headings"><strong class="list-text">Contact Us</strong></p>
                          <div class="custom_check_wrap">
                            <div class="custom-check">
                              <input type="checkbox" id="contact_us_permissions" class="ckbCheckAll">
                              <span></span>
                            </div>
                              <strong class="list-text">Select All</strong>
                          </div>
                          <div id="checkBoxes">
                            @foreach($contactUsPermissions as $permission)
                              <div class="custom_check_wrap">
                                <div class="custom-check">
                                  <input type="checkbox" class="checkBoxClass contactUscheckBox" name="permissions[]" value="{{ $permission->id }}" id="button_{{ $permission->id }}">
                                  <span></span>
                                </div>
                                <label class="mb-0">{{ $permission->name }}</label>
                              </div>
                            @endforeach
                          </div>
                        </div>
                      </div>
                    </div>


                    



                  </div>


                  <div class="title">
                    <h5>Rating & Review Management</h5>
                    <hr/>
                  </div>

                  <div class="row permissions-section">
                    
              
                    <div class="col-md-4">
                      <div class="form-group">
                        <div class="permissions-section-inner-sec">
                          <p class="headings"><strong class="list-text">Rating & review</strong></p>
                          <div class="custom_check_wrap">
                            <div class="custom-check">
                              <input type="checkbox" id="rating_review_permissions" class="ckbCheckAll">
                              <span></span>
                            </div>
                              <strong class="list-text">Select All</strong>
                          </div>
                          <div id="checkBoxes">
                            @foreach($ratingReviewPermissions as $permission)
                              <div class="custom_check_wrap">
                                <div class="custom-check">
                                  <input type="checkbox" class="checkBoxClass ratingReviewcheckBox" name="permissions[]" value="{{ $permission->id }}" id="button_{{ $permission->id }}">
                                  <span></span>
                                </div>
                                <label class="mb-0">{{ $permission->name }}</label>
                              </div>
                            @endforeach
                          </div>
                        </div>
                      </div>
                    </div>


                    



                  </div>

                  

                  



                  <div class="title">
                    <h5>Access Control</h5>
                    <hr/>
                  </div>

                  <div class="row permissions-section">
                    <div class="col-md-4">
                      <div class="form-group">
                        <div class="permissions-section-inner-sec">
                          <p class="headings"><strong class="list-text">Roles</strong></p>
                          <div class="custom_check_wrap">
                            <div class="custom-check">
                              <input type="checkbox" id="roles_permissions" class="ckbCheckAll">
                              <span></span>
                            </div>
                              <strong class="list-text">Select All</strong>
                          </div>
                          <div id="checkBoxes">
                            @foreach($rolesPermissions as $permission)
                              <div class="custom_check_wrap">
                                <div class="custom-check">
                                  <input type="checkbox" class="checkBoxClass rolescheckBox" name="permissions[]" value="{{ $permission->id }}" id="button_{{ $permission->id }}">
                                  <span></span>
                                </div>
                                <label class="mb-0">{{ $permission->name }}</label>
                              </div>
                            @endforeach
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <div class="permissions-section-inner-sec">
                          <p class="headings"><strong class="list-text">Permissions</strong></p>
                          <div class="custom_check_wrap">
                            <div class="custom-check">
                              <input type="checkbox" id="access_permissions" class="ckbCheckAll">
                              <span></span>
                            </div>
                              <strong class="list-text">Select All</strong>
                          </div>
                          <div id="checkBoxes">
                            @foreach($accessPermissions as $permission)
                              <div class="custom_check_wrap">
                                <div class="custom-check">
                                  <input type="checkbox" class="checkBoxClass accesscheckBox" name="permissions[]" value="{{ $permission->id }}" id="button_{{ $permission->id }}">
                                  <span></span>    
                                </div>
                                <label class="mb-0">{{ $permission->name }}</label>
                              </div>
                            @endforeach
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>

                 {{-- <div class="title">
                    <h5>Recycle Bin</h5>
                    <hr/>
                  </div>

                  <div class="row permissions-section">
                    <div class="col-md-4">
                      <div class="form-group">
                        <div class="permissions-section-inner-sec">
                          <div class="custom_check_wrap">
                            <div class="custom-check">
                              <input type="checkbox" id="restore_permissions" class="ckbCheckAll">
                              <span></span>
                            </div>
                              <strong class="list-text">Select All</strong>
                          </div>
                          <div id="checkBoxes">
                            @foreach($restorePermissions as $permission)
                              <div class="custom_check_wrap">
                                <div class="custom-check">
                                  <input type="checkbox" class="checkBoxClass restorecheckBox" name="permissions[]" value="{{ $permission->id }}" id="button_{{ $permission->id }}">
                                  <span></span>
                                </div>
                                  <label class="mb-0">{{ $permission->name }}</label>
                              </div>
                            @endforeach
                          </div>
                        </div>
                      </div>
                    </div>
                  </div> --}}
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer permission">
                <button type="submit" class="btn btn-primary">{{ __('adminlte::adminlte.save') }}</button>
              </div>
            </form>
          </div>
        </div>
      </div>
  </div>
</div>
@endsection

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
  strong.list-text {
    position: relative;
    left: -8px;
    top: -3px;
  }
  span.list-text {
    position: relative;
    left: -8px;
    top: -3px;
  }
  .content-wrapper .card-footer {
      margin: 0px 20px 0px;
      background-color: transparent;
      padding: 30px 0px 30px;
  }
</style>
@stop

@section('js')
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
    $(document).ready(function() {
      checkAll();
      $("input[type='checkbox']").change(function() {
        checkAll();
      });
      $("#role_name").change(function() {
        $('input').filter(':checkbox').prop('checked',false);
        var role = $(this);
        $("#role_id").val(role.val());
        $(".checkBoxClass").removeAttr('checked');
        var id = $("#role_name").val();
        $.ajax({
          url: "{{ route('get_role_permissions') }}",
          type: 'post',
          data: {
            role_id: id
          },
          dataType: "JSON",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function(res) {
            for (let i = 0; i < res.length; i++) {
              const response = res[i];
              var permissionId = "#button_"+response.permission_id;
              $(permissionId).prop('checked', 'true');
              checkAll();
            }
          }
        });
      });
      
      $('#addRoleForm').validate({
        ignore: [],
        debug: false,
        rules: {
          role_name: {
            required: true
          },
          "permissions[]":{
            required: true
          }
        },
        messages: {
          role_name: {
            required: "The Role Name field is required."
          },
          "permissions[]": {
            required: "You must select at least one permission.",
          }
        }
      });
    });
    
    function checkAll() {

      //While click on Select all checked all chekbox automatically

      $("#full_access").click(function() {
        $("input[type=checkbox]").prop('checked', this.checked)
      })
      
      $("#admins_permissions").click(function() {
        $(".adminscheckBox").prop('checked', this.checked)
      })

      $("#users_permissions").click(function() {
        $(".userscheckBox").prop('checked', this.checked)
      })

      $("#category_permissions").click(function(){
        $(".categoriescheckBox").prop('checked', this.checked)
      })

      $("#sub_category_permissions").click(function(){
        $(".subcategoriescheckBox").prop('checked', this.checked)
      })

      $("#attribute_permissions").click(function(){
        $(".attributescheckBox").prop('checked', this.checked)
      })

      $("#coupon_permissions").click(function(){
        $(".couponscheckBox").prop('checked', this.checked)
      })


      $("#product_permissions").click(function(){
        $(".productscheckBox").prop('checked', this.checked)
      })

      $("#order_permissions").click(function(){
        $(".orderscheckBox").prop('checked', this.checked)
      })

      $("#payment_permissions").click(function(){
        $(".paymentscheckBox").prop('checked', this.checked)
      })

      $("#our_client_permissions").click(function(){
        $(".ourClientscheckBox").prop('checked', this.checked)
      })

      $("#contact_us_permissions").click(function(){
        $(".contactUscheckBox").prop('checked', this.checked)
      })

      $("#rating_review_permissions").click(function(){
        $(".ratingReviewcheckBox").prop('checked', this.checked)
      })

      
      $("#roles_permissions").click(function() {
        $(".rolescheckBox").prop('checked', this.checked)
      })
      $("#access_permissions").click(function() {
        $(".accesscheckBox").prop('checked', this.checked)
      })
    }
  </script>
@stop
