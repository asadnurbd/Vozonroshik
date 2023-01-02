<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VojonRoshik | Sign Up</title>
     @include('frontend.include.assets')

     <Style>

.form-control {
    border-radius: 0rem;
    height: 40px;
    width:200px;
    color: #000000;
    font-size: 19px;
    width: 279px;
    font-family: 'PT Serif', serif;
}
.card{
       border-radius: 20px;
       border: 2px solid gray;
       padding:6%;
       background-color:rgb(255, 255, 255);
}
.container{
    margin-top:10%;
   
}

.btn {
    border-radius: 10px;
    background-image: repeating-linear-gradient(#13a1f3, #13a1f3, #13a1f3);
    color: #ffffff;
    width:279px;
}
    
.card h1{
    color:gray;
    font-size:30px;
}
     </Style>
</head>

  
<div class="container">
     <div class="row justify-content-center">
         <div class="col-md-8">
            <div class="card">
                     <h1 class="text-center pl-5 "> Forget Password</h1>
                     <p class="text-center container text-justify" style="padding:20px">We will send You instructions on how to reset your password By email .</p>

                      <div class="card-body">


                        
                    <form class="form-2" method="POST" action="/forget-password">
                        @csrf
                        <div class="row pl-3 forget">
                            <div class="col-8 pl-5 ml-3">
                                <input style="width: 300px;height: 40px; border-radius: 5px;"type="text" id="email-name" class="input_form " name="email" placeholder="Email" required style="" >

                            </div>
                            <div class="col-2 pl-5">
                                <button style="height: 40px; border-radius: 5px;"type="submit" class="btn-primary" style="">Submit</button>

                            </div>


                        </div>
                        <span class="text-danger" role="alert" style="font-family: 'PT Serif', serif;">
                            @error('name')
                        
                                {{ $message }}
                            
                             @enderror
                        </span>


                    </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>

{{-- @endsection --}}

