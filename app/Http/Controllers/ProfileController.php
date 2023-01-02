<?php

namespace App\Http\Controllers;
use App\Models\Review;
use App\Models\User;
use App\Models\Youtube_review;
use App\Models\Instagram_review;
use App\Models\Restaurent_tb;
use App\Models\Menu_food_item;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile(){

        $user_id=Auth::user()->id;

        if($user_id){
            $data=User::where('id',$user_id)->get();
            
            $total_review=Review::where('user_id',$user_id)->count();
            $review=Review::where('user_id',$user_id)->get();
            $youtube_info=Youtube_review::where('user_id',$user_id)->get();
            $instagram_info=Instagram_review::where('user_id',$user_id)->get();
            $restaurant=Restaurent_tb::orderBy('rest_name','ASC')->get();
            $food=Menu_food_item::orderBy('food_name','ASC')->get();
            
            // return $review=Review::where('rest_id',$restaurant->first()->id)->get();
            
             $reviews_info = DB::table('restaurent_tbs')
            ->join('reviews','restaurent_tbs.id', '=', 'reviews.rest_id')
            ->where('reviews.user_id','=', $user_id )
            ->get();
       


            $array=[];
            foreach ($review as $reviews){
              
              
                array_push($array, [
                    'images' => $reviews->images,
                    
                ]);
            }

            // return count($array['images']);
            // return $array;
            $total_image=0;

          
               for($i=0; $i<count((array)$array); $i++){
                  
                 for($j=0; $j<count((array)$array[$i]['images']); $j++){
                   
                    $total_image++;
                 }
               }
     
           
             $review_count = Review::orderBy('rating', 'desc')
            ->selectRaw('count(*) as total, rating')
            ->groupBy('rating')
            ->get();

     
           
     

        

           $food_votes = Review::orderBy('food', 'desc')
            ->selectRaw('sum(food) as total, food')
            ->groupBy('food')
            ->where('food','=','1')
            ->get();
            $service_votes = Review::orderBy('service', 'desc')
            ->selectRaw('sum(service) as total, service')
            ->groupBy('service')
            ->where('service','=','1')
            ->get();
            $ambiance_votes = Review::orderBy('ambiance', 'desc')
            ->selectRaw('sum(ambiance) as total, ambiance')
            ->groupBy('ambiance')
            ->where('ambiance','=','1')
            ->get();
            $value_votes = Review::orderBy('value', 'desc')
            ->selectRaw('sum(value) as total, value')
            ->groupBy('value')
            ->where('value','=','1')
            ->get();
            $interior_votes = Review::orderBy('Interior', 'desc')
            ->selectRaw('sum(Interior) as total, Interior')
            ->groupBy('Interior')
            ->where('Interior','=','1')
            ->get();


             $top_restaurants = Review::orderBy('total', 'desc')
            ->selectRaw('count(*) as total, rest_id')
            ->groupBy('rest_id')
            ->get();

            $top_rest=[];
            foreach ($top_restaurants as $top_restaurant){
                $restaurent=DB::table('restaurent_tbs')
                ->where('id',$top_restaurant->rest_id)
                ->get();
          
              
                array_push($top_rest, [
                    'restaurent' =>$restaurent,
                    'total' => $top_restaurant->total,
                    
                ]);
            }
            // return $top_rest;
            return view('frontend.profile.index')->with('user_information',$data)->with('total_review',$total_review)->with('youtube_info',$youtube_info)->with('instagram_info',$instagram_info)->with('restaurant',$restaurant)->with('food',$food)->with('reviews_info',$reviews_info)->with('reviews_count',
            $review_count)->with('food_votes',$food_votes)->with('service_votes',$service_votes)->with('ambiance_votes',$ambiance_votes)->with('value_votes',$value_votes)->with('interior_votes',$interior_votes)->with('top_rest',$top_rest)->with('arrays',$array)->with('total_image',$total_image);
        }

   
   }
}
