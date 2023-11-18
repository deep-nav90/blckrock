<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Auth;
use DB;
use File;
use Session;

class CategoryController extends Controller
{

    public static function uploadFile($file, $destinationPath){
        $fileName = date('mdYHis') . uniqid().'.'.$file->getClientOriginalExtension();
        $file->move($destinationPath, $fileName);

        return $fileName;
    }


    public function categoryList(Request $request){
        if($request->isMethod('GET')){
            return view('admin.category.list');
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
                $column = "status";
            }elseif($order == 3){
                $column = "created_at";
            }
        

            $data = Category::select("*",DB::raw('DATE_FORMAT(created_at, "%m-%d-%Y") AS date_show'))->whereDeletedAt(null)->orderBy($column,$asc_desc);
            $total = $data->get()->count();

            if(!empty($request->get("search")["value"])){
                $search = $request->get("search")["value"];
            }else{

                $search = $request->search_txt;
            }
            $filter = $total;


            if($search){
                $data  = $data->where(function($query) use($search){
                            $query->orWhere('category_name', 'Like', '%'. $search . '%');
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

                
                if(Auth::user()->can('view_category')) {
                    $btn .= '<a class="action-button" title="View" href="view/'.$row->id.'"><i class="text-info fa fa-eye"></i></a>';
                   
                }

                if(Auth::user()->can('edit_category')) {
                    $btn .= '<a class="action-button" title="Edit" href="edit/'.$row->id.'"><i class="text-warning fa fa-edit"></i></a>';
                    
                }

                if(Auth::user()->can('delete_category')) {
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

    public function addCategory(Request $request){
        if($request->isMethod('GET')){
            return view('admin.category.add');
        }

        if($request->isMethod('POST')){
            $data = $request->all();

            if(isset($data['category_image'])){
                if($data['category_image'] != "undefined"){
                    $destinationPath = storage_path("/app/public/category_images");
                    $data['category_image'] = $this->uploadFile($data['category_image'], $destinationPath);
                }

            }

            $category_name = $request->category_name;
            $check_exists = Category::whereCategoryName($category_name)->whereDeletedAt(null)->first();
            if($check_exists){
                return ['status' => 'false', 'message' =>  "Category Name already exists."];
            }

            $category = new Category();
            $category->fill($data);
            $category->save();
            return ['status' => 'true', 'message' =>  "Category added successfully."];
        }
    }

    public function editCategory(Request $request){
        if($request->isMethod('GET')){
            $category_id = $request->id;
            $category = Category::whereId($request->id)->first();
            
            return view('admin.category.edit',compact('category','category_id'));
        }

        if($request->isMethod('POST')){
            //return $request->all();
            $category = Category::whereId($request->id)->first();
            $data = $request->all();
            $check_exists = Category::whereCategoryName($data['category_name'])->where('id', '!=', $request->id)->whereDeletedAt(null)->first();
            if($check_exists){
                return ['status' => 'false', 'message' =>  "Category Name already exists."];
            }

            if(isset($data['category_image'])){
                if($data['category_image'] != "undefined"){
                    $destinationPath = storage_path("/app/public/category_images");
                    $category->category_image = $this->uploadFile($data['category_image'], $destinationPath);
                }

            }
            $category->category_name = $data['category_name'];
            $category->meta_keyword = $data['meta_keyword'];
            $category->meta_description = $data['meta_description'];
            $category->status = $data['status'];
            $category->update();
            return ['status' => 'true', 'message' =>  "Category updated successfully."];
        }
    }

    public function checkCategoryNameExists(Request $request){
        $category_name = $request->category_name;
        $check_exists = Category::whereCategoryName($category_name)->whereDeletedAt(null)->first();
        if($check_exists){
            return true;
        }else{
            return false;
        }

    }

    public function deleteCategory(Request $request){
        Category::find($request->id)->delete();
        Session::flash('success',"Category has been deleted successfully.");
        return ["success" => 1];

    }

    public function viewCategory(Request $request){
        $category_id = $request->id;
        $category = Category::whereId($request->id)->first();
        
        return view('admin.category.view',compact('category','category_id'));
    }
}
