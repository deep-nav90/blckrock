<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use File;
use Session;
use App\Models\RatingReview;
use App\Models\Product;

class RatingReviewController extends Controller
{
    public function ratingReviewList(Request $request){
        if($request->isMethod('GET')){
            return view('admin.rating-review.list');
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
                $column = "full_name";
            }elseif($order == 2){
                $column = "product_name";
            }elseif($order == 3){
                $column = "rating";
            }elseif($order == 4){
                $column = "review";
            }elseif($order == 5){
                $column = "created_at";
            }
        

            $data = RatingReview::select("*",DB::raw('DATE_FORMAT(created_at, "%m-%d-%Y") AS date_show'), DB::raw('(SELECT product_name FROM products WHERE products.id = rating_reviews.product_id) AS product_name'), DB::raw('(SELECT full_name FROM users WHERE users.id = rating_reviews.user_id) AS full_name'))->whereDeletedAt(null)->orderBy($column,$asc_desc);
            $total = $data->get()->count();

            if(!empty($request->get("search")["value"])){
                $search = $request->get("search")["value"];
            }else{

                $search = $request->search_txt;
            }
            $filter = $total;


            if($search){
                $data  = $data->where(function($query) use($search){
                            $query->orWhere(DB::raw('(SELECT product_name FROM products WHERE products.id = rating_reviews.product_id)'), 'Like', '%'. $search . '%');
                            $query->orWhere(DB::raw('(SELECT full_name FROM users WHERE users.id = rating_reviews.user_id)'), 'Like', '%'. $search . '%');
                            $query->orWhere('rating', 'Like', '%'. $search . '%');
                            $query->orWhere('review', 'Like', '%'. $search . '%');
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

                
                // if(Auth::user()->can('view_rating_review')) {
                //     $btn .= '<a class="action-button" title="View" href="view/'.$row->id.'"><i class="text-info fa fa-eye"></i></a>';
                   
                // }

               

                if(Auth::user()->can('delete_rating_review')) {
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
    

    public function deleteRatingReview(Request $request){
        $find_rating_review = RatingReview::whereId($request->id)->first();
        $product_id = $find_rating_review->product_id;
        $find_rating_review->delete();
        

        $total_number_of_users_give_rating = RatingReview::whereDeletedAt(null)->whereProductId($product_id)->count();
        $sum_of_rate = RatingReview::whereDeletedAt(null)->whereProductId($product_id)->sum('rating');

        $average_rating = 5;
        if($sum_of_rate){
            $average_rating = round($sum_of_rate / $total_number_of_users_give_rating, 2);
        }
        

        Product::whereId($product_id)->update(['average_rating' => $average_rating]);

        

        Session::flash('success',"Rating & Review has been deleted successfully.");
        return ["success" => 1];

    }

    public function viewRatingReview(Request $request){
        $rating_review = RatingReview::whereId($request->id)->first();
        $rating_review_id = $request->id;
        
        return view('admin.rating-review.view',compact('rating_review','rating_review_id'));
    }
}
