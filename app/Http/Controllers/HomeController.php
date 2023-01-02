<?php
namespace App\Http\Controllers;
use App\Models\Food_type;
use App\Models\Services;
use App\Models\User;
use App\Models\Review;
use App\Models\Specification;
use App\Models\Restaurent_tb;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class HomeController extends Controller
{
            public function index(){
              
                $new_restaurents=Restaurent_tb:: orderBy('created_at','desc')->get();   
                $services=Services:: all();   
                $specifications=Specification::all();
               
                $food_types=Food_type::orderBy('name','ASC')->get();

                $restaurants = DB::table('food_types')
                ->join('restaurent_tbs', 'food_types.id', '=', 'restaurent_tbs.food_type_id')
                ->get();

                $reviews = DB::table('restaurent_tbs')
                ->join('reviews', 'restaurent_tbs.id', '=', 'reviews.rest_id')
                ->get();

                $users=User::all();
                $review=Review::all();
                $array=[];
                foreach ($review as $review){
                  
                  
                    array_push($array, [
                        'images' => $review->images,
                        'review_id'=>$review->id,
                    ]);
                }



                 $avg_reviews = Review::groupBy('rest_id')
                ->selectRaw('sum(rating) as single_rating_sum,rest_id')
                ->selectRaw('count(rating) as single_rating_count')
                ->get();

                $all_avg=[];
                foreach($avg_reviews as $avg_review){
                 for($i=0;$i<count($restaurants);$i++){
                    if($avg_review->rest_id==$restaurants[$i]->id){
                        $avg=$avg_review->single_rating_sum/$avg_review->single_rating_count;
                        array_push($all_avg, [
                            'avg' => $avg,
                            'rest_id'=>$avg_review->rest_id,
                        ]);
                    }
                 }
              
                }

                

                return view('frontend.home.index')->with('food_types',$food_types)->with('new_restaurents',$new_restaurents)->with('services',$services)->with('specifications', $specifications)->with('restaurants',$restaurants)->with('reviews',$reviews)->with('users',$users)->with('arrays',$array)->with('avg_reviews',$avg_reviews);
          }


        public function show_name_order($restaurant){
            $all_food_type= Food_type::orderBy('name','ASC')->get();
            $food_types= Food_type::orderBy('name','ASC')->get();
            $food_index = 0;
            for($i=0;$i<count($food_types);$i++){
                if ($food_types[$i]->name == $restaurant){
                     $food_index = $i;
                     break;
                }
             }

            
             $food_types = json_decode($food_types,true);
             $food_types1 = array_slice($food_types,$food_index);
             array_splice($food_types, $food_index);
              $food_types = array_merge($food_types1,$food_types);
          
         
            $data = DB::table('food_types')
            ->join('restaurent_tbs', 'food_types.id', '=', 'restaurent_tbs.food_type_id')
            ->get();

             $services = DB::table('services')
            ->join('restaurent_tbs', 'services.rest_id', '=', 'restaurent_tbs.id')
            ->get();

            $avg_reviews = Review::groupBy('rest_id')
            ->selectRaw('sum(rating) as single_rating_sum,rest_id')
            ->selectRaw('count(rating) as single_rating_count')
            ->get();
            
             $specifications=Specification::all();
            
            return view('frontend.category.index')->with('all_food_type',$all_food_type)->with('food_types', $food_types)->with('data', $data)->with('services', $services)->with('avg_reviews', $avg_reviews)->with('specifications', $specifications);
        
        }



        public function search(Request $request){
            $request->validate( [
                'search' =>'required',
                
            ]);
             $search_txt= $request->search;
             $restaurent=Restaurent_tb::orderBy('id','desc')
            ->where('rest_name','like', '%'.$search_txt.'%')->get();
             $service=Services::all();
             $specification=Specification::all();
             $review=Review::all();
            
            return view('frontend.search.index')->with('restaurents',$restaurent)->with('search_txt',$search_txt)->with('services',$service)->with('specifications',$specification)->with('reviews',$review);
     }


   
}
