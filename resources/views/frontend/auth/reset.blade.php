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
                     <h1 class="text-center pl-5 ml-4"> Reset Password</h1>
                      <div class="card-body">
                          <form method="POST" action="/reset-password">
                           @csrf
                           <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                          <div class="col-md-6 mt-4 pt-3">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>
                            <div class="col-md-6 mt-4 pt-3">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                      <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                            <div class="col-md-6 mt-4 pt-3">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>

                     <div class="form-group row mb-0 mt-4">
                           <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- @endsection --}}