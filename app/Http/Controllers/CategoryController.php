<?php

namespace App\Http\Controllers;
use App\Models\Food_type;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\Specification;
use Illuminate\Support\Facades\DB;
class CategoryController extends Controller
{
    
    public function index(){
         $food_types= Food_type::all();
         $all_food_type= Food_type::orderBy('name','ASC')->get();

         $data = DB::table('food_types')
        ->join('restaurent_tbs', 'food_types.id', '=', 'restaurent_tbs.food_type_id')
        ->get();

        $services = DB::table('services')
        ->join('restaurent_tbs', 'services.rest_id', '=', 'restaurent_tbs.id')
        ->get();
        // $avg_reviews = Review::groupBy('rest_id')
        // ->selectRaw('sum(rating) as total,rest_id')
        // ->get();
        // $reviews_count = Review::groupBy('rest_id')
        // ->selectRaw('count(*) as total,rest_id')
        // ->get();
      

         $avg_reviews = Review::groupBy('rest_id')
        ->selectRaw('sum(rating) as single_rating_sum,rest_id')
        ->selectRaw('count(rating) as single_rating_count')
        ->get();
         $specifications=Specification::all();

        return view('frontend.category.index')->with('food_types',$food_types)->with('all_food_type',$all_food_type)->with('data', $data)->with('data', $data)->with('services', $services)->with('avg_reviews', $avg_reviews)->with('specifications',$specifications);
    }
}
