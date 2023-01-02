<?php

namespace App\Http\Controllers;
use App\Models\Restaurent_tb;
use App\Models\Review;
use App\Models\Like;
use App\Models\Menu_food_item;
use App\Models\Specification;
use App\Models\Youtube_review;
use App\Models\Wishlist;
use App\Models\Menu;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\save;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Input;
class SingleController extends Controller
{
    public function index($route_url){
      

        $restaurant = Restaurent_tb::where('route_url', '=', request('route_url'))->get();

        $menu= DB::table('restaurent_tbs')
         ->join('menus', 'restaurent_tbs.id', '=', 'menus.rest_id')
         ->get();

        $Rest_review= DB::table('users')
        ->join('reviews', 'users.id', '=', 'reviews.user_id')
        ->get();

        $youtube_review=Youtube_review::all();

        $services = DB::table('services')
        ->join('restaurent_tbs', 'services.rest_id', '=', 'restaurent_tbs.id')
        ->get();

        $array=[];
        foreach ($menu as $item){
            $sub_menu=DB::table('menu_food_items')->where('menu_id',$item->id)->get();
          
            array_push($array, [
                'menu' => $item,
                'sub_menu' => $sub_menu,
            ]);
        }


        $specification=Specification::all();
        $review_count=Review::where('rest_id',$restaurant->first()->id)->count();
        $review=Review::where('rest_id',$restaurant->first()->id)->get();

        $user_counts = Review::orderBy('user_id', 'desc')
        ->selectRaw('count(*) as total,user_id')
        ->groupBy('user_id')
        ->get();
       
       
       

         $avg_reviews = Review::groupBy('rest_id')
        ->selectRaw('sum(rating) as total,rest_id')
        ->get();

         $ratings = Review::groupBy(['rating', 'rest_id'])
        ->orderBy('rating', 'desc')
        ->selectRaw('count(id) as single_str_count,rating,rest_id')
        ->get();
        
        $sum=[];
        foreach($ratings  as  $rating){
            array_push($sum, [
                'count' => $rating->single_str_count,
                
            ]);
            
        }
        $tot_stars=0;
        foreach($sum  as  $sums){
            
            $tot_stars += array_sum($sums);
            
        }
        // return $tot_stars;
       

        

        $food_votes = Review::orderBy('rest_id')
        ->selectRaw('sum(food) as total, rest_id')
        ->groupBy('rest_id')
        ->where('food','=','1')
        ->get();

         $service_votes = Review::orderBy('rest_id')
        ->selectRaw('sum(service) as total, rest_id')
        ->groupBy('rest_id')
        ->where('service','=','1')
        ->get();
        $ambiance_votes = Review::orderBy('rest_id')
        ->selectRaw('sum(ambiance) as total, rest_id')
        ->groupBy('rest_id')
        ->where('ambiance','=','1')
        ->get();
        $value_votes = Review::orderBy('rest_id')
        ->selectRaw('sum(value) as total, rest_id')
        ->groupBy('rest_id')
        ->where('value','=','1')
        ->get();
        $interior_votes = Review::orderBy('rest_id')
        ->selectRaw('sum(Interior) as total, rest_id')
        ->groupBy('rest_id')
        ->where('Interior','=','1')
        ->get();

       
        

        return view('frontend.single.index')
        ->with('restaurants',$restaurant)
        ->with("services",$services)
        ->with('menus',$array)
        ->with('Rest_reviews',$Rest_review)
        ->with('specifications',$specification)
        ->with('review_counts',$review_count)
        ->with('reviews',$review)
        ->with('food_votes',$food_votes)
        ->with('service_votes',$service_votes)
        ->with('ambiance_votes',$ambiance_votes)
        ->with('value_votes',$value_votes)
        ->with('interior_votes',$interior_votes)
        ->with('user_counts',$user_counts)
        ->with('avg_reviews',$avg_reviews)->with('ratings',$ratings)->with('total_stars',$tot_stars)->with('youtubes_review',$youtube_review);
     
    }

 
    public function like($review_id){

        $response = new \stdClass();
        $response->status = 200;
        $response->is_logged_in = true;
        $response->like_count = 0;
        $response->dislike_count =0;
        $response->is_liked = false;
        if(!Auth::check()){
            $response->is_logged_in = false;
        }
        else{
            $user_id=Auth::user()->id;

            $review=Review::find($review_id);
            $likes = $review->likes;
            $dislikes = $review->dislikes;


            if(!$likes){
                $likes = [];

            }
            if(!$dislikes){
                $dislikes = [];

            }
           
         
            if (in_array($user_id,$dislikes)){
               $dislikes = \array_diff($dislikes, [$user_id]);
               
             } 
             
             if (in_array($user_id,$likes)){
                $likes = \array_diff($likes, [$user_id]);

            }else{
                $response->is_liked = true;
                array_push($likes, $user_id);
              }
               
            $review->likes = $likes;
            $review->dislikes = $dislikes;
            $review->save();
            $response->like_count = count($likes);
            $response->dislike_count = count($dislikes);
        }
        return new JsonResponse($response,$response->status);

    }



    public function dislike($review_id){
        $response_data = new \stdClass();
        $response_data->status = 200;
        $response_data->is_logged_in = true;
        $response_data->dislike_count = 0;
        $response_data->like_count = 0;
        $response_data->is_disliked = false;
        if(!Auth::check()){
            $response_data->is_logged_in = false;
        }else{
      
        $user_id=Auth::user()->id;

        $review=Review::find($review_id);
        $dislikes = $review->dislikes;
        $likes = $review->likes;


       if(!$dislikes){
           $dislikes = [];
       }
       if(!$likes){
        $likes = [];

        }
       if (in_array($user_id,$likes)){
        $likes = \array_diff($likes, [$user_id]);

    }
        
        if (in_array($user_id,$dislikes)){
            $dislikes = \array_diff($dislikes, [$user_id]);
            
          }
        else{
            $response_data->is_disliked = true;
            array_push($dislikes, $user_id); 
        }
      
        
        $review->dislikes = $dislikes;
        $review->likes = $likes;
        $review->save();

        $response_data->dislike_count = count($dislikes);
        $response_data->like_count = count($likes);

              
    }

    return new JsonResponse($response_data,$response_data->status);
    }

  


 public function save_restaurant($rest_id){
    $response_data = new \stdClass();
    $response_data->status = 200;
    $response_data->is_logged_in = true;
    if(!Auth::check()){
        $response_data->is_logged_in = false;
    }else{
        $user_id=Auth::user()->id;

        $wishlist = new Wishlist();

        $wishlist->user_id =$user_id;
        $wishlist->rest_id = $rest_id;
        $wishlist->save();
        // $store= Wishlist::create([
        //     'user_id' => $user_id,
        //     'rest_id' => $rest_id,
        // ]);
        if($wishlist){
            return new JsonResponse($response_data,$response_data->status);
        }else{
             return back()->with('error_message','Something went wrong ');
        }

    } 



 }

    public function search(Request $request){
      
        $text = $request->input('text');
        if($request->ajax())
        {
                $output="";
                $output_1="";
                $data = DB::table('menu_food_items')->where('food_name','like', '%'.$text.'%')->get();

                // $food_item=Menu_food_item::->where('food_name','like', '%'.$search_txt.'%')->get();
               

                $array_value=[];
                foreach ($data as $item){
                    $menu=DB::table('menus')->where('id',$item->menu_id)->get();
                    // $services_name=DB::table('services')->where('rest_id',$item->id)->get();
                
                    array_push($array_value, [
                        'food_item' => $item,
                        'menu' => $menu,
                    ]);
                }
                
                
            
                // return json_encode($array_value);
                // $products=DB::table('products')->where('title','LIKE','%'.$request->search."%")->get();
            if($array_value)
            {
                    foreach ($array_value as $key => $product) {
                    //    foreach ($product['services_name'] as $key => $services_name) {
                    
                    $output.='<div class="col-lg-4  col-md-6 col-xs-12 restaurent_body mb-5 ">'.
                   '<div class="property-main ">'.
                        '<div class="property-wrap ">'.
                            '<div class="property-item ">'.
                                '<div class="item-thumb ">'.
                                    '<a class="hover-effect " href="# ">'.
                                        '<img width="300" class="img-fluid " src="'. asset('assets') .$product['food_item']->food_image.' " alt=" ">'.
                                    '</a>'.

                               ' </div>'.

                            '</div>'.
                        '</div>'.
                    '</div>'.


                '</div>'.
                '<div class="col-lg-6 col-md-6 col-11 mt-4 ">'.

                    '<div class="discription-menu ">'.
                        '<div class="discription-menu-title">'.
                            '<h5>' .$product['food_item']->food_name. '</h5>'.
                        '</div>'.
                        '<div class="discription-menu-text">'.
                            '<span>'.$product['food_item']->description.'</span>'.
                        '</div>'.
                       '<span><i class="fa fa-star checked_2"></i>&nbsp;<i class="fa fa-star checked_2"></i>&nbsp;<i class="fa fa-star checked_2"></i>&nbsp;<i class="fa fa-star checked_2"></i>&nbsp;<i class="fa fa-star checked_2"></i>&nbsp;</span>'.
                        '</span>'.

                    '</div>'.
               '</div>'.
                '<div class="col-lg-2 col-md-6 col-xs-12 mt-4 ">'.

                    '<div class="pricin-list ">'.
                        '<div class="pricin-list-title ">'.
                            '<span>Tk.<span>'.$product['food_item']->food_price.'</span> </span>'.
                        '</div>'.

                    '</div>'.
                '</div>';

               
               
                
                    
                
            


    
               
            

                }
              
                    //  $count=0;
                
                    // foreach ($array_value as $key => $product) {
                    //     foreach($product['menu'] as $menu){
                       
                    //     if($product['food_item']->menu_id==$menu->id){
                    //         $output_1.='<li class="nav-item "><a data-toggle="pill"  href="#m_{{'.$menu->id.'}}" ' .'style=" text-decoration: none !important;">'.$menu->menu_name.'</a></li>';

                    //     }
                    //  }
                 
               
                    // }
                
                 
               
               
                
                      return Response( [$output]);

               
            
                }
              
           }
        
    }


}
