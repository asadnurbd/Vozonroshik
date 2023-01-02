
@extends('frontend.master')

@section('title')
 VozonRoshik | Home
@endsection


@section('header')
<section class="header">
    <div class="container-fluid imgBackground ">
        <nav class="navbar navbar-expand-lg navbar-light  justify-content-between">


            <a class="navbar-brand ml-lg-5 " href="/">
                <img src="{{ asset('assets') }}/images/logo.png">
            </a>

            <!-- Collapsible wrapper -->
            @if (Auth::guest())

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="nav nav-pills list-inline mr-lg-4">
                      <li class="nav-item"  >
                        <a class="nav-link active" href="/register">Create Account</a>
                      </li>
                      <li class="nav-item" data-toggle="pill" >

                        
                        <a class="nav-link  sign-in-link" type="button"  data-toggle="modal" data-target="#exampleModal" href="#" data-toggle="modal" data-target="#exampleModal">Sign In</a>
                      </li>
                    </ul>
              </div>
         
          
            @else
            <ul class="nav nav-pills list-inline mr-lg-4" >
                <li class="nav-item"data-toggle="pill"  >
                  <a class="nav-link active" href="/register" data-toggle="modal" data-target="#">{{Auth::user()->first_name}}&nbsp;{{Auth::user()->last_name}}</a>
                </li>
                
                <li class="nav-item"  >
                  <a class="nav-link active" href="/logout">Logout</a>
                </li>
              </ul>

            {{-- <ul class="list-inline nav-pills mr-lg-4">
                <li class="list-inline-item sign_up " data-toggle="pill" ><a class="text-xs-center " target="_blank" href="#">{{Auth::user()->first_name}}&nbsp;{{Auth::user()->last_name}}</a></li>
            </ul>
            --}}
           @endif
            <!-- Collapsible wrapper -->
        </nav>




        <!-- sign in section -->
        @include('frontend.auth.login')

        <div class="container main-search ">
            <br/>

            <form  action="/restaurant-search" method="get" >
              
            <div class="wrapper">
                <input type="text" class="input" name="search"
                placeholder="Enter Restaurant Name ">
                <div class="searchbtn"><button type='submit'><i class="fas fa-search"></i></button></div>
            </div>

           </form>





           <form  action="/restaurant-search" method="get" >
            @csrf
                <div class="advanced-wrapper">
                
                    <button class="advanced-searchbtn" type='submit'><i class="fas fa-search"></i></button><span class="advance-txt">Advanced Search</span>
                    
                </div>

            </form>
       
        </div>
    </div>
</section>
@endsection



@section('main_container')

 



    <!--  TOP RESTAURANTS IN DHAKA CITY SECTION START -->
    <section class="top_restaurent ">
       
        <div class="container ">
            <?php $k=0?>
            <div id="top_restaurent{{$k++}}" class="carousel slide " data-ride="carousel ">
     
                <!-- Indicators -->

                <!-- The slideshow -->

            
                <div class="carousel-inner ">
                  
                    <div class="row header_title pt-lg-4">
                        <div class="col-md-7 col-lg-7 col-xl-7 col-6 title ">
                            <div class="section-title-header text-center ">
                                <h4 class="section-title ">Top result matching "{{$search_txt}}"</h4>
                            </div>
                        </div>

                        <div class="col-md-3 col-lg-3   col-3 ">
                            <div class="text-center arrow  ">
                                <a class="left carousel-control " href="#top_restaurent{{$k-1}}" data-slide="prev"><span class="glyphicon glyphicon-chevron-left" ><i class="fas fa-arrow-left "></i></span></a>
                                <a class="right carousel-control " href="#top_restaurent{{$k-1}}" data-slide="next"><span class="glyphicon glyphicon-chevron-right"><i class="fas fa-arrow-right "></i></span>

                                </a>
                            </div>
                        </div>
                    </div>

                    <?php
                   
                    $active="active";
                    for($i = 0; $i < count($restaurents);) {

                        if($i>2){$active=" ";}
                     ?>

                    <div class="carousel-item  {{$active}} ">
                        <div class="row ">

                            <?php
                            $j = min($i + 6, count($restaurents)) ;
                            for(; $i < $j; $i++) { 
                             ?>
                            <div class="col-lg-4 col-md-6 col-xs-6 col-sm-6 pb-lg-5 pb-lg-5 pb-5 restaurent_body">
                                <div class="property-main ">
                                    <div class="property-wrap ">
                                        <div class="property-item  ">
                                            <div class="item-thumb ">
                                                <a class="hover-effect " href="/restaurant/{{$restaurents[$i]->route_url}}">
                                                    <img class="img-fluid " src="{{ asset('assets') }}{{$restaurents[$i]->rest_image}} " alt=" ">
                                                </a>

                                            </div>
                                            <div class="item-body ">

                                                <div class="float-right review-rate mt-2 mr-2 pt-1 ">

                                                    @foreach($reviews as $review)
                                                     @if($review->rest_id==$restaurents[$i]->id)
                                                     <span>{{ number_format((int)$review->total_rating, 1, '.', '') }}</span>
                                                     @endif
                                                    @endforeach
                                                </div>
                                                <h6 class="featured-title ">{{$restaurents[$i]->rest_name}}</h6>

                                                <div class="pricin-list pb-2 ">
                                                    <div class="property-price" style="padding-top: 5%;">

                                                        @foreach($services as $service)
                                                         @if($service->rest_id==$restaurents[$i]->id)
                                                        <span class="service">{{$service->name}} &nbsp;</span>
                                                         @endif
                                                        @endforeach
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="pricin-list ">
                                    <div class="bottom-title ">
                                        @foreach($specifications as $specification)
                                         @if($specification->rest_id==$restaurents[$i]->id)
                                        <span class="ml-2">{{$specification->specifications_name}},</span>
                                         @endif
                                        
                                        @endforeach
                                       
                                     

                                    </div>

                                </div>
                            </div>
                            <?php }  ?>
                          
                        </div>
                    </div>
                    <?php }  ?>
                  
                   




                </div>

             

            </div>


        </div>
      
    </section>


 


@endsection


@section('footer')
 <!-- Site footer -->
 @include('frontend.auth.footer.footer')

<script src="{{ asset('assets') }}/js/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="{{ asset('assets') }}/js/bootstrap.min.js"></script>




@endsection