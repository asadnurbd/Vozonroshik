<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VojonRoshik | Sign Up</title>
     @include('frontend.include.assets')

     <Style>

      .forget input {
            width: 300px;
            height: 44px;
            border-radius: 25px;
            padding-left: 5px;
        }

        .forget button{
            width:100px; 
            height:44px;
            border-radius: 20px;
        }
        .model-hight{
            margin-top:15%;
        }

        
     </Style>
</head>

<body>

    <!--  Header section -->
    <section>
        <div class="container-fluid ">
            <nav class="navbar navbar-light  justify-content-between">
                <a class="signup-logo" href="/">
                    <img src="{{ asset('assets') }}/images/logo.png">
                </a>
            </nav>
        </div>
        <div class="container mt-2 pt-3 ">


            
            <ul class="nav nav-pills list-inline mr-lg-4  list-register">
                <li class="nav-item "  >
                  <a class="nav-link active sign-up" href="/register" style="border-radius: 6px;">Sign Up Here</a>
                </li>
                <li class="nav-item" data-toggle="pill" >
                  <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModal" href="#" data-toggle="modal" data-target="#exampleModal" style="border-radius: 6px;">Sign In</a>
                </li>
              </ul>

        
        </div>
    </section>

    <!--  Header section end -->


    <!--  SIGN UP SECTION START -->
 

    <section class="mb-lg-5  pb-lg-5">
        
        <!-- The slideshow -->
        <div class="carousel-inner">

            <div class="row ">
              
                <div class="col-lg-6 col-md-6 col-xs-12 ">
                    
                    <div class="col-lg-7 col-sm-7 col-md-8 col-7 success-message">
                         @if(Session::get('success_message'))
                
                        <div class="alert alert-success ">
                        
                             {{Session::get('success_message')}}
                        </div>
                             
                        @endif
                     </div>
                    <div class="col-lg-7 col-sm-7 col-md-8 col-7 success-message">
                        @if(Session::get('error_message'))
                
                        <div class="alert alert-danger">
                       
                             {{Session::get('error_message')}}
                        </div>
                             
                        @endif
                     </div>

                    <form class="form-1" method="post" action="{{route('auth.store')}}">
                        @csrf
                        <label>
                          <p class="label-txt">FULL NAME</p>
                          <div class="row">
                              <div class="col-6">
                                <input type="text" class="input" name="first_name" value="{{old('first_name')}}"  placeholder="First Name">
                                <div class="line-box">
                                  <div class="line"></div>
                                </div>
                                <span class="text-danger " role="alert" >
                                    @error('first_name')
                                      {{ $message }}
                                    
                                    @enderror
                                  </span>

                              </div>

                              

                              <div class="col-6">
                                <input type="text" class="input" name="last_name" value="{{old('last_name')}}" placeholder="Last Name">
                                <div class="line-box">
                                  <div class="line"></div>
                                </div>
                                
                                <span class="text-danger" role="alert" >
                                    @error('last_name')
                                      {{ $message }}
                                    
                                    @enderror
                                </span>

                              </div>

                          
                        </div>
                        </label>

                        <label>
                          <p class="label-txt">EMAIL</p>
                          <input type="email" class="input" name="email" value="{{old('email')}}" placeholder="Your e-mail goes here">
                          <div class="line-box">
                            <div class="line"></div>
                          </div>

                          <span class="text-danger" role="alert">
                            @error('email')
                        
                              {{ $message }}
                            
                            @enderror
                        </span>

                        </label>

                      
                        <label>
                          <p class="label-txt">PASSWORD</p>
                          <div class="line"> <i class="far fa-eye"></i></div>
                          <input type="password" class="input" name="password" value="{{old('password')}}" placeholder="*************" required>
                          <div class="line-box">
                            <div class="line"></div>
                          </div>

                          <span class="text-danger" role="alert" >
                            @error('password')
                        
                              {{ $message }}
                            
                            @enderror
                        </span>
                        </label>
                        <label>
                          <p class="label-txt">RE-ENTER PASSWORD</p>
                          
                          <input type="password" class="input" name="password_confirmation" placeholder="*************" required >
                        
                          <div class="line-box">
                            <div class="line"></div>
                          </div>
                          <div class="line  "> <i class="far fa-eye"></i></div>
                        </label>
                        <div class="continer txt text-left">
                            <p class="col-12">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>

                            <div class="form-check pb-4 col-11">
                                <input class="form-check-input pl-lg-4" type="checkbox" value="1" name="terms" id="defaultCheck1">
                                <span class="form-check-label" for="defaultCheck1">
                                    Agree to Terms & Conditions
                                </span>
                            </div>

                            <span class="text-danger" role="alert" >
                                @error('terms')
                            
                                  {{ $message }}
                                
                                @enderror
                            </span>

                            

                        </div>


                        <button class="sign-up-btn shadow-sm" type="submit">Sign Up</button>
                        <div class="row  line-width">
                            <div class="col-5  mt-3 ">
                                <div class="line-box2">
                                    <div class="line"></div>
                                </div>

                            </div>
                            <div class="col-1  pb-lg-4">
                                <span class="or-inline">or</span>

                            </div>

                            <div class="col-5  mt-3 ">
                                <div class="line-box2">
                                    <div class="line"></div>
                                </div>

                            </div>

                        </div>
                       
                        <a style=" color: #FFFFFF;
                        text-decoration: none;" class="sign-up-fbtn shadow-sm pt-2 " href="{{route('login.facebook')}}"> Sign Up with Facebook  <i class="fab fa-facebook-square pl-lg-2"></i></a>
                        <a style=" color: #FFFFFF;
                        text-decoration: none;"class="sign-up-gbtn shadow-sm pt-2" href="{{route('login.google')}}">  SIgn Up with Google <i class="fab fa-google pl-lg-2"></i></button></a> 

                    </form>

                </div>

                <div class="col-lg-6 col-md-5 col-xs-12 ">
                    <div class="property-main ">
                        <div class="property-wrap ">
                            <div class="property-item ml-lg-5  sign-up-img">

                                <a class="hover-effect " href="# ">
                                    <img width="700" height="200" class="img-fluid hover-shadow " src="{{ asset('assets') }}/images/sign_up/cover.jpg" alt=" ">
                                </a>

                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>




    <!-- sign in section -->
   @include('frontend.auth.login')



    <!-- Site footer -->
    @include('frontend.auth.footer.footer')
   
</body>

</html>