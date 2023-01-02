<?php
namespace App\Http\Controllers\Auth;

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Models\Food_type;
use App\Models\Services;
use App\Models\User;
use App\Models\Review;
use App\Models\Specification;
use App\Models\Restaurent_tb;
class AuthController extends Controller
{
    public function register(){
        return view('frontend.auth.register');
    }
    public function login(){
        return view('frontend.auth.login');
    }


    public function store(Request $request){

        $request->validate( [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'terms' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);



        $store= User::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'terms' => $request['terms'],
            'password' => Hash::make($request['password']),
        ]);

        

        if($store){
            return back()->with('success_message','You have been successfully registered');
        }else{
             return back()->with('error_message','Something went wrong ');
        }
       
    }


    public function check(Request $request){
         $split = explode(" ", $request->name);

         $firstname = array_shift($split);
         $lastname  = implode(" ", $split);
 
      
       
        // return $request;
        $request->validate( [
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);
       
        $user = User::where([
            'first_name' => $firstname,
            'last_name' => $lastname,
            
            ])->first();
       
        if ($user && Hash::check($request->password, $user->password)) {
             Auth::login($user);

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
           

             return view('frontend.home.index')->with('food_types',$food_types)->with('new_restaurents',$new_restaurents)->with('services',$services)->with('specifications', $specifications)->with('restaurants',$restaurants)->with('reviews',$reviews)->with('users',$users)->with('avg_reviews',$avg_reviews)->with('arrays',$array);
        
        }else
        {
            return back()->with('error_message_login','No account found for this Username !');
         }
          
         

    }


    public function logout(){
        Auth::logout();
        return view('frontend.auth.register');
    }


    public function View(){
        return view('frontend.auth.forget');

    }
    public function postEmail(Request $request)
    {

        $request->validate([
            'email' => 'required|email|exists:users',
        ]);
    
        $token = str_random(64);
    
        DB::table('password_resets')->insert(
            ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
        );

        Mail::send('frontend.home.check', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password Notification');
        });
        return back()->with('message', 'We have e-mailed your password reset link!');

    }


    public function getPassword($token) { 
        return view('frontend.auth.reset')->with('token',$token);
     }


   
     public function updatePassword(Request $request)
     {
   
     $request->validate([
         'email' => 'required|email|exists:users',
         'password' => 'required|string|min:6|confirmed',
         'password_confirmation' => 'required',
   
     ]);
   
     $updatePassword = DB::table('password_resets')
                         ->where(['email' => $request->email, 'token' => $request->token])
                         ->first();
   
     if(!$updatePassword)
         return back()->withInput()->with('error', 'Invalid token!');
   
       $user = User::where('email', $request->email)
                   ->update(['password' => Hash::make($request->password)]);
   
       DB::table('password_resets')->where(['email'=> $request->email])->delete();
   
       return redirect('/vozonroshik-register')->with('message', 'Your password has been changed!');
   
     }
   
   


  
}
