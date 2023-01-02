

    <div class="container">



        <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">


        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title ml-lg-4 pl-2" id="exampleModalLabel">Sign In</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <!-- Modal Header -->
            {{-- <div class="modal-header">
                <h4 class="modal-title ml-lg-4 pl-2">Sign In</h4>
                <button type="button" class="close" data-dismiss="pill">&times;</button>
            </div> --}}


            <!-- Modal body -->
            <div class="modal-body">

                <div class="col-lg-10 col-sm-8 col-md-8 col-7 pl-lg-5 ml-lg-2 error_message">
                    @if(Session::get('error_message_login'))

                    <div class="alert alert-danger">
                      
                         {{Session::get('error_message_login')}}
                    </div>
                         
                    @endif
                </div>


                <form class="form-2" method="post"   action="{{route('auth.check')}}">
                    @csrf
                    
                    <input type="text" id="user-name" class="input-form" name="name" placeholder="Name" required >

                    <span class="text-danger" role="alert" style="font-family: 'PT Serif', serif;">
                        @error('name')
                    
                            {{ $message }}
                        
                         @enderror
                    </span>

                    <input type="password" id="user-pass" class="input-form" name="password" placeholder="Password" required ><br>
                    <span class="text-danger" role="alert" style="font-family: 'PT Serif', serif;">
                        @error('password')
                    
                            {{ $message }}
                        
                         @enderror
                    </span>

                    
                    {{-- <a class="text-right" href="#" id="forgot_pswd" data-toggle="modal" data-target="#forgot_pswd">Forgot password?</a> --}}
           <a class="text-right" target="_blank" href="/forget-password-temp" >Forgot password?</a>

                    <button class="sign-in-btn shadow-sm" type="submit">Sign In</button>
                    <p class="divider-text">
                        <span class="bg-or">OR</span>
                    </p>

                    <div class="row fb-g-section">
                        <div class="col-lg-5 col-12 ml-lg-4">
                            <button class="sign-in-fbtn shadow-sm  " type="submit"> <a  style="color:#fff" href="{{route('login.facebook')}}">Sign In with Facebook </a> <i class="fab fa-facebook-square pl-lg-2"></i></button>

                        </div>
                       
                        <div class="col-lg-5 col-12  ml-lg-4">
                            <button class="sign-in-gbtn shadow-sm " type="submit"><a  style="color:#fff" href="{{route('login.google')}}">SIgn Up with Google </a> <i class="fab fa-google pl-lg-2"></i></button>


                        </div>
                        <div class="col-lg-12 col-12">
                            <div class="sign-in-txt  ">

                                <span>New to Restaurant Review?</span>
                                <br>

                                <span class="create"> <a href="/vojonroshik-register">Create an Account</a></span>
                            </div>

                        </div>


                    </div>


                </form>
            </div>
        </div>
     
    </div>
  </div>
        
    </div>



