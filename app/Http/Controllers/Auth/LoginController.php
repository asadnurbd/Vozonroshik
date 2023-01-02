<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\Food_type;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }



    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Google callback
    public function handleGoogleCallback()
    {
        try{
            $socialUser = Socialite::driver('google')->user();
            $this->_registerOrLoginUser($socialUser);

            $food_types= Food_type::orderBy('name','ASC')->get();
            // return $food_types;
            return view('frontend.home.index')->with('food_types',$food_types);
       
        
         }catch(\Exception $e){
               return view('frontend.auth.register');

         }
    }



     // Facebook login
     public function redirectToFacebook()
     {

        // return view('frontend.auth.register');
         return Socialite::driver('facebook')->redirect();
     }
     // Facebook callback
     public function handleFacebookCallback()
     {
         try{
            $socialUser = Socialite::driver('facebook')->user();
            $this->_registerOrLoginUser($socialUser);
           $food_types= Food_type::orderBy('name','ASC')->get();
             // return $food_types;
            return view('frontend.home.index')->with('food_types',$food_types);
        
        
         }catch(\Exception $e){
               return view('frontend.auth.register');

         }


     }




     protected function _registerOrLoginUser($socialUser)
     {

        $split = explode(" ", $socialUser->getName());
        $firstname = array_shift($split);
        $lastname  = implode(" ", $split);
        
        $user=User::where('provider_id',$socialUser->getId())->first();
        
        if(!$user){
         

            $data=  User::create([
                'provider_id'=>$socialUser->getId(),
                'email'=>$socialUser->getEmail(),
                'first_name'=> $firstname,
                'last_name'=> $lastname,
            ]);

            Auth::login($data);

           
           
          
          }
            
     }



}
