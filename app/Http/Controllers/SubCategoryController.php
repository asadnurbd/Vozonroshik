<?php

namespace App\Http\Controllers;
use App\Models\Restaurent_tb;
use App\Models\Services;
use App\Models\Food_type;
use App\Models\Review;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index($permalink){
        
        $restaurant= Food_type::where('permalink',$permalink)->first();
        $restaurant= Restaurent_tb::where('food_type_id', $restaurant->id)->get();

        $services = DB::table('services')
        ->join('restaurent_tbs', 'services.rest_id', '=', 'restaurent_tbs.id')
        ->get();

        //  $top_restaurants = Review::orderBy('total', 'desc')
        // ->selectRaw('count(*) as total, rest_id')
        // ->groupBy('rest_id')
        // ->get();


        $food_type= Food_type::orderBy('name','ASC')->get();
        return view('frontend.sub_category.index')->with('restaurants',$restaurant)->with("services",$services)->with('food_types',$food_type);
    }
    // public function search(Request $request){

        // if($request->search){
        //    return $areas=Restaurent_tb::orderBy('id','desc')
            // ->where('rest_address','like', '%'.$request->get('search').'%')->get();
          
        //    return json_encode($areas);
        //     if($areas){
        //         foreach($areas as $area){

        //         }
        //     }
        // }
    // }

    // public function search(Request $request) {
    //     $text = $request->input('text');
    
    //     $data = DB::table('Restaurent_tbs')->where('rest_address', 'Like', "$text")->get();
    //     return json_encode($data);

    //     // return response()->json($patients);
    // }





    public function search(Request $request)
    {
      $text = $request->input('text');
     
        if($request->ajax())
        {
                $output="";
                $output_2="";
                // $data = DB::table('Restaurent_tbs')->where('rest_address', 'Like', "$text")->get();
                $data = DB::table('Restaurent_tbs')->where('rest_address','like', '%'.$text.'%')->get();
                $array=[];
                foreach ($data as $item){
                    $services_name=DB::table('services')->where('rest_id',$item->id)->get();
                
                    array_push($array, [
                        'data' => $item,
                        'services_name' => $services_name,
                    ]);
                }
                
            
                // return json_encode($data);
                // $products=DB::table('products')->where('title','LIKE','%'.$request->search."%")->get();
            if($array)
            {
                    foreach ($array as $key => $product) {
                    //    foreach ($product['services_name'] as $key => $services_name) {
                    
                    $output.='<div class="col-lg-4 col-md-6 col-xs-6 restaurent_body ">'.
                    '<div class="property-main ">'.
                        '<div class="property-wrap ">'.
                            '<div class="property-item ">'.
                                '<div class="item-thumb ">'.
                                    '<a class="hover-effect shadow " href="/restaurant/'.$product['data']->route_url.'">'.
                                        '<img width="300 " class="img-fluid " src="'.asset('assets').$product['data']->rest_image.'" alt=" ">'.
                                    '</a>'.

                                '</div>'.

                            '</div>'.
                        '</div>'.
                    '</div>'.

                '</div>'.
                
                '<div class="col-lg-5 col-md-10 col-10 col-xs-8 pl-4 pt-md-4 ">'.

                                    '<div class="discription-category ">'.
                                        '<div class="discription-menu-title pb-lg-3 ">'.
                                            '<h3>'.$product['data']->rest_name.
                                            '</h3>'.
                                        '</div>'.
                                        '<span>'.'<i class="fa fa-star checked_2 "></i>&nbsp;<i class="fa fa-star checked_2 "></i>&nbsp;<i class="fa fa-star checked_2 "></i>&nbsp;<i class="fa fa-star checked_2 "></i>&nbsp;<i class="fas fa-star-half "></i>&nbsp;</span>'.
                                        '</span>'.
                                        '<div class="discription-category-text mt-lg-3 mb-lg-3 ">'.
                                            '<p>'.$product['data']->rest_description.'</p>'.
                                        '</div>'.

                                        '<div class="mb-lg-3 ">'.

                                            '<table>'.

                                        
                                                
                                        // //    'foreach('.$product['services_name'] . 'as' . $sub_item .'){'.
                                        // //             //  .if($product['data']->id==$sub_item->rest_id){.
                                                    // '<tr>'.$product['services_name'].'</tr>'.
                                        // //             //  .}.
                                        // //    '}'.         
                                            '</table>'.
                                        
                                        '</div>'.
                                        '<a class="view-details" href="/restaurant/'.$product['data']->route_url.'"><button type="button " class="btn btn-link "> View Details</button></a>'.

                                    '</div>'.
                                '</div>' .'<div class="col-11 pt-lg-4 ">'.
                                '<div class="sm_bar "></div>'.
                            '</div>';
                
                    
                
            


    
               
            
                }
                return Response($output);
        }
        }

    
   }
  
}
