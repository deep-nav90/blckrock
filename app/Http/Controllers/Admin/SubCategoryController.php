<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Auth;
use DB;
use File;
use Session;

class SubCategoryController extends Controller
{
    public static function uploadFile($file, $destinationPath){
        $fileName = date('mdYHis') . uniqid().'.'.$file->getClientOriginalExtension();
        $file->move($destinationPath, $fileName);

        return $fileName;
    }

    public function subCategoryList(Request $request){
        if($request->isMethod('GET')){
            return view('admin.sub-category.list');
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
                $column = "sub_category_name";
            }elseif($order == 3){
                $column = "meta_keyword";
            }elseif($order == 4){
                $column = "status";
            }elseif($order == 5){
                $column = "created_at";
            }
        

            $data = SubCategory::select("*",DB::raw('DATE_FORMAT(created_at, "%m-%d-%Y") AS date_show'), DB::raw('(SELECT category_name from categories WHERE categories.id = sub_categories.category_id) AS category_name'),)->whereDeletedAt(null)->orderBy($column,$asc_desc);
            $total = $data->get()->count();

            if(!empty($request->get("search")["value"])){
                $search = $request->get("search")["value"];
            }else{

                $search = $request->search_txt;
            }
            $filter = $total;


            if($search){
                $data  = $data->where(function($query) use($search){
                            $query->orWhere(DB::raw('(SELECT category_name from categories WHERE categories.id = sub_categories.category_id)'),'Like','%' . $search . '%');
                            $query->orWhere('sub_category_name', 'Like', '%'. $search . '%');

                            $query->orWhere('meta_keyword', 'Like', '%'. $search . '%');
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

                
                if(Auth::user()->can('view_sub_category')) {
                    $btn .= '<a class="action-button" title="View" href="view/'.$row->id.'"><i class="text-info fa fa-eye"></i></a>';
                   
                }

                if(Auth::user()->can('edit_sub_category')) {
                    $btn .= '<a class="action-button" title="Edit" href="edit/'.$row->id.'"><i class="text-warning fa fa-edit"></i></a>';
                    
                }

                if(Auth::user()->can('delete_sub_category')) {
                    $btn .= '<a class="action-button delete-button" title="Delete" href="javascript:void(0)" data-id="'.$row->id.'"><i class="text-danger fa fa-trash-alt"></i></a>';
                    
                }

                $row->action = $btn;

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

    public function addSubCategory(Request $request){
        if($request->isMethod('GET')){
        	$categories = Category::whereDeletedAt(null)->whereStatus('Active')->get();
            return view('admin.sub-category.add',compact('categories'));
        }

        if($request->isMethod('POST')){
            $data = $request->all();

            if(isset($data['sub_category_image'])){
                if($data['sub_category_image'] != "undefined"){
                    $destinationPath = storage_path("/app/public/category_images");
                    $data['sub_category_image'] = $this->uploadFile($data['sub_category_image'], $destinationPath);
                }

            }

            $category_name = $request->sub_category_name;
            $check_exists = SubCategory::whereSubCategoryName($category_name)->whereCategoryId($request->category_id)->whereDeletedAt(null)->first();
            if($check_exists){
                return ['status' => 'false', 'message' =>  "Sub Category Name already exists for same selected category."];
            }

            $sub_category = new SubCategory();
            $sub_category->fill($data);
            $sub_category->save();
            return ['status' => 'true', 'message' =>  "Sub Category added successfully."];
        }
    }

    public function editSubCategory(Request $request){
        if($request->isMethod('GET')){
        	$categories = Category::whereDeletedAt(null)->whereStatus('Active')->get();
            $sub_category_id = $request->id;
            $sub_category = SubCategory::whereId($request->id)->first();
            
            return view('admin.sub-category.edit',compact('sub_category','sub_category_id','categories'));
        }

        if($request->isMethod('POST')){
            //return $request->all();
            $sub_category = SubCategory::whereId($request->id)->first();
            $data = $request->all();
            $check_exists = SubCategory::whereSubCategoryName($data['sub_category_name'])->whereCategoryId($data['category_id'])->where('id', '!=', $request->id)->whereDeletedAt(null)->first();
            if($check_exists){
                return ['status' => 'false', 'message' =>  "Sub Category Name already exists for same selected category."];
            }

            if(isset($data['sub_category_image'])){
                if($data['sub_category_image'] != "undefined"){
                    $destinationPath = storage_path("/app/public/category_images");
                    $sub_category->sub_category_image = $this->uploadFile($data['sub_category_image'], $destinationPath);
                }

            }
            $sub_category->sub_category_name = $data['sub_category_name'];
            $sub_category->category_id = $data['category_id'];
            $sub_category->meta_keyword = $data['meta_keyword'];
            $sub_category->meta_description = $data['meta_description'];
            $sub_category->status = $data['status'];
            $sub_category->update();
            return ['status' => 'true', 'message' =>  "Sub Category updated successfully."];
        }
    }

    public function checkSubCategoryNameExists(Request $request){
        $sub_category_name = $request->sub_category_name;
        $check_exists = SubCategory::whereSubCategoryName($sub_category_name)->whereDeletedAt(null)->first();
        if($check_exists){
            return true;
        }else{
            return false;
        }

    }

    public function deleteSubCategory(Request $request){
        SubCategory::find($request->id)->delete();
        Session::flash('success',"Sub Category has been deleted successfully.");
        return ["success" => 1];

    }

    public function viewSubCategory(Request $request){
        $sub_category_id = $request->id;
        $sub_category = SubCategory::whereId($request->id)->first();
        $categories = Category::whereDeletedAt(null)->get();
        return view('admin.sub-category.view',compact('sub_category','sub_category_id','categories'));
    }

}
