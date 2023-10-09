<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Attribute;
use Auth;
use DB;
use File;
use App\Models\Product;
use App\Models\ProductImage;
use Session;
use App\Models\ProductPriceAttribute;

class ProductController extends Controller
{

    public static function uploadFile($file, $destinationPath){
        $fileName = date('mdYHis') . uniqid().'.'.$file->getClientOriginalExtension();
        $file->move($destinationPath, $fileName);

        return $fileName;
    }

    public function productList(Request $request){
        if($request->isMethod('GET')){

            // return Product::select("*", DB::raw('(SELECT category_name from categories WHERE categories.id = products.category_id) AS category_name'), DB::raw('(SELECT attribute_name from attributes WHERE attributes.id = products.attribute_id) AS attribute_name'), DB::raw('(CONCAT("$",product_price)) AS product_price'))->get();
            return view('admin.product.list');
        }


        if($request->isMethod('POST')){

            $admin = auth()->guard('admin')->user();
            $column = "id";
            $asc_desc = $request->get("order")[0]['dir'];

            if($asc_desc == "asc"){
                $asc_desc = "desc";
            }else{
                $asc_desc = "asc";
            }

            $order = $request->get("order")[0]['column'];
            if($order == 0){
                $column = "id";
            }elseif($order == 1){
                $column = "category_name";
            }elseif($order == 2){
                $column = "product_name";
            }elseif($order == 3){
                $column = "product_quantity";
            }elseif($order == 4){
                $column = "average_rating";
            }elseif($order == 5){
                $column = "status";
            }elseif($order == 6){
                $column = "created_at";
            }
        

            $data = Product::select("*", DB::raw('(SELECT category_name from categories WHERE categories.id = products.category_id) AS category_name'), DB::raw('DATE_FORMAT(created_at, "%m-%d-%Y") AS date_show'))->whereDeletedAt(null)->orderBy($column,$asc_desc);
            $total = $data->get()->count();

            if(!empty($request->get("search")["value"])){
                $search = $request->get("search")["value"];
            }else{

                $search = $request->search_txt;
            }
            $filter = $total;


            if($search){
                $data  = $data->where(function($query) use($search){
                            $query->orWhere(DB::raw('(SELECT category_name from categories WHERE categories.id = products.category_id)'), 'Like', '%'. $search . '%');
                            $query->orWhere('product_name', 'Like', '%'. $search . '%');
                            $query->orWhere('product_quantity', 'Like', '%'. $search . '%');
                            $query->orWhere('average_rating', 'Like', '%'. $search . '%');
                            
                            $query->orWhere('status', 'Like', '%'. $search . '%');
                            $query->orWhere(DB::raw('DATE_FORMAT(created_at, "%m-%d-%Y")'), 'Like', '%'. $search . '%');
                        });

                $filter = $data->get()->count();

            }

            $data = $data->offset($request->start);
            $data = $data->take($request->length);
            $data = $data->get();


            $start_from = $request->start;
            if($start_from == 0){
                $start_from  = 1;
            }
            if($start_from % 10 == 0){
                $start_from = $start_from + 1;
            }


            foreach ($data as $k => $row) {

                $btn ="";

                $ratingStar = "";
                $ratingStar .= '<span class="star_rating" style="--rating:'.$row->average_rating.'"></span>';


                
                if(Auth::user()->can('view_product')) {
                    $btn .= '<a class="action-button" title="View" href="view/'.$row->id.'"><i class="text-info fa fa-eye"></i></a>';
                   
                }

                if(Auth::user()->can('edit_product')) {
                    $btn .= '<a class="action-button" title="Edit" href="edit/'.$row->id.'"><i class="text-warning fa fa-edit"></i></a>';
                    
                }

                if(Auth::user()->can('delete_product')) {
                    $btn .= '<a class="action-button delete-button" title="Delete" href="javascript:void(0)" data-id="'.$row->id.'"><i class="text-danger fa fa-trash-alt"></i></a>';
                    
                }

                $row->action = $btn;

                $row->ratingStar = $ratingStar;

                $row->DT_RowIndex = $start_from++;



            }


            $return_data = [
                    "data" => $data,
                    "draw" => (int)$request->draw,
                    "recordsTotal" => $total,
                    "recordsFiltered" => $filter,
                    "input" => $request->all()
            ];
            return response()->json($return_data);

        }

    }

    public function addProduct(Request $request){
        if($request->isMethod('GET')){
            $categories = Category::where(function($query)use($request){
                                    $query->whereDeletedAt(null);
                                    $query->whereStatus('Active');
                                    $query->whereHas('subCategories', function($q) use ($request){
                                        $q->whereDeletedAt(null);
                                        $q->whereStatus('Active');
                                    });
                                })
                                ->with('subCategories')
                                ->get();
            $attributes = Attribute::whereDeletedAt(null)->whereStatus('Active')->get();
            return view('admin.product.add',compact('categories','attributes'));
        }

        if($request->isMethod('POST')){
            $data = $request->all();

            $product = new Product();
            $product->fill($data);
            $product->save();


            $acceptable_files = array_filter($request->acceptable);
            $non_acceptable_files = array_filter($request->non_acceptable);

            $explode_accepted_files = explode(',', $acceptable_files[0]);

            if(isset($non_acceptable_files[0]) && !empty($non_acceptable_files[0])){

                $explode_non_accepted_files = explode(',', $non_acceptable_files[0]);



                //#override and remove dupicate array
                $explode_accepted_files = array_diff($explode_accepted_files, $explode_non_accepted_files);

            }


            $files_uploded = $request->file("files");

            $files = [];

            $have_featured_img = 0;
            foreach ($explode_accepted_files as $acceptable_file) {

                $is_featured_image = 0;
                if(isset($data['new_checkbox'])){
                    if($data['new_checkbox'] == $acceptable_file){
                        $is_featured_image = 1;
                        $have_featured_img = 1;
                    }
                }

                $exp_file = explode('_', $acceptable_file);

                $extension = $files_uploded[$exp_file[0]][$exp_file[1]]->getClientOriginalExtension();

                $file1_thumbname = "";
                if($extension == "jpg" || $extension == "png" || $extension == "jpeg" || $extension == "JPG" || $extension == "PNG" || $extension == "JPEG"){

                    $destinationPath = storage_path("/app/public/product_images");
                    $file_name = $this->uploadFile($files_uploded[$exp_file[0]][$exp_file[1]], $destinationPath);

                    $files[] = ['file_url' => $file_name, 'thumbnail_url' => $file1_thumbname,'file_type' => "image", 'is_featured_image' => $is_featured_image];
                }




            }

            foreach ($files as $file) {

                if($have_featured_img == 0){
                    $file['is_featured_image'] = 1;
                    $have_featured_img = 1;
                }else{
                    $file['is_featured_image'] = $file['is_featured_image'];
                }
                
                $product_image = new ProductImage();
                $product_image->product_id = $product->id;
                $product_image->product_image = $file['file_url'];
                $product_image->is_featured_image = $file['is_featured_image'];
                $product_image->save();
            }


            foreach ($data['product_price'] as $key => $p_ap) {
                $ProductPriceAttribute = new ProductPriceAttribute();
                $ProductPriceAttribute->product_id = $product->id;
                $ProductPriceAttribute->attribute_id = $data['attribute_ids'][$key];
                $ProductPriceAttribute->product_price = $data['product_price'][$key];
                $ProductPriceAttribute->sale_price = $data['sale_price'][$key];
                $ProductPriceAttribute->attribute_value = $data['attribute_value'][$key];


                if(isset($data['is_default'][$key])){

                    if($data['is_default'][$key] ==  $key){
                        $ProductPriceAttribute->is_default_show = 1;
                    }else{
                        $ProductPriceAttribute->is_default_show = 0;
                    }

                }else{
                    $ProductPriceAttribute->is_default_show = 0;
                }

                $ProductPriceAttribute->save();

            }

            Session::flash('status',"Product has been addedd successfully.");
            return redirect(route('product_list'));
        }


    }

    public function editProduct(Request $request, $id){
        if($request->isMethod('GET')){
            $image_count = 0;
            $product_find = Product::whereId($id)->with('productImages')->with('category','productPriceAttributes')->first();
            $categories = Category::where(function($query)use($request){
                            $query->whereDeletedAt(null);
                            $query->whereStatus('Active');
                            $query->whereHas('subCategories', function($q) use ($request){
                                $q->whereDeletedAt(null);
                                $q->whereStatus('Active');
                            });
                        })
                        ->with('subCategories')
                        ->get();
            $attributes = Attribute::whereDeletedAt(null)->whereStatus('Active')->get();
            if($product_find){
                $image_count = count($product_find->productImages);
            }
            
            return view('admin.product.edit',compact('categories','attributes','product_find','image_count'));

        }

        if($request->isMethod('POST')){
            $data = $request->all();
            $product_find = Product::whereId($id)->with('productImages')->first();
            $product_find->fill($data);
            $product_find->update();


            $acceptable_files = array_filter($request->acceptable);
            $non_acceptable_files = array_filter($request->non_acceptable);


            $deleted_files = $request->file_deleted;

            if(!empty($deleted_files)){
                $explode_del_files = explode(',',$deleted_files);

                //delete files

                ProductImage::whereIn('id',$explode_del_files)->delete();
                //
            }


            if(count($acceptable_files) > 0){

                $explode_accepted_files = explode(',', $acceptable_files[0]);
            }else{
                $explode_accepted_files = [];
            }

            if(isset($non_acceptable_files[0]) && !empty($non_acceptable_files[0])){

                $explode_non_accepted_files = explode(',', $non_acceptable_files[0]);



                //#override and remove dupicate array
                $explode_accepted_files = array_diff($explode_accepted_files, $explode_non_accepted_files);

            }



            $files_uploded = $request->file("files");

            $files = [];

            foreach ($explode_accepted_files as $acceptable_file) {
                $is_featured_image = 0;
                if(isset($data['new_checkbox'])){
                    if($data['new_checkbox'] == $acceptable_file){
                        $is_featured_image = 1;
                    }
                }
                $exp_file = explode('_', $acceptable_file);

                $extension = $files_uploded[$exp_file[0]][$exp_file[1]]->getClientOriginalExtension();

                $file1_thumbname = "";
                if($extension == "jpg" || $extension == "png" || $extension == "jpeg" || $extension == "JPG" || $extension == "PNG" || $extension == "JPEG"){

                    $destinationPath = storage_path("/app/public/product_images");
                    $file_name = $this->uploadFile($files_uploded[$exp_file[0]][$exp_file[1]], $destinationPath);

                    $files[] = ['file_url' => $file_name, 'thumbnail_url' => $file1_thumbname,'file_type' => "image", 'is_featured_image' => $is_featured_image];
                }




            }

            foreach ($files as $file) {

                if($file['is_featured_image'] == 1){
                    ProductImage::whereProductId($product_find->id)->update(['is_featured_image' => 0]);
                }
                
                $product_image = new ProductImage();
                $product_image->product_id = $product_find->id;
                $product_image->product_image = $file['file_url'];
                $product_image->is_featured_image = $file['is_featured_image'];


                $product_image->save();
            }

            if(isset($data['old_checkbox'])){
                ProductImage::whereProductId($product_find->id)->update(['is_featured_image' => 0]);
                $findImage = ProductImage::whereId($data['old_checkbox'])->update(['is_featured_image' => 1]);
            }


            //delete previous ProductPriceAttribute

            ProductPriceAttribute::whereProductId($product_find->id)->delete();


            foreach ($data['product_price'] as $key => $p_ap) {
                $ProductPriceAttribute = new ProductPriceAttribute();
                $ProductPriceAttribute->product_id = $product_find->id;
                $ProductPriceAttribute->attribute_id = $data['attribute_ids'][$key];
                $ProductPriceAttribute->product_price = $data['product_price'][$key];
                $ProductPriceAttribute->sale_price = $data['sale_price'][$key];
                $ProductPriceAttribute->attribute_value = $data['attribute_value'][$key];


                if(isset($data['is_default'][$key])){

                    if($data['is_default'][$key] ==  $key){
                        $ProductPriceAttribute->is_default_show = 1;
                    }else{
                        $ProductPriceAttribute->is_default_show = 0;
                    }

                }else{
                    $ProductPriceAttribute->is_default_show = 0;
                }

                $ProductPriceAttribute->save();

            }

            Session::flash('status',"Product has been updated successfully.");
            return redirect(route('product_list'));


        }
        
    }

    public function viewProduct(Request $request, $id){
        if($request->isMethod('GET')){
            $product_find = Product::whereId($id)->with('productImages')->first();
            $categories = Category::where(function($query)use($request){
                            $query->whereDeletedAt(null);
                            $query->whereStatus('Active');
                            $query->whereHas('subCategories', function($q) use ($request){
                                $q->whereDeletedAt(null);
                                $q->whereStatus('Active');
                            });
                        })
                        ->with('subCategories')
                        ->get();
            $attributes = Attribute::whereDeletedAt(null)->whereStatus('Active')->get();
            $image_count = count($product_find->productImages);
            return view('admin.product.view',compact('categories','attributes','product_find','image_count'));

        }
    }

    public function deleteProduct(Request $request){
        Product::find($request->id)->delete();
        Session::flash('success',"Product has been deleted successfully.");
        return ["success" => 1];

    }


}
