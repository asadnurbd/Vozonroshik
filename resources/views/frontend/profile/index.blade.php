
@extends('frontend.master')

@section('title')
 VozonRoshik | Single
@endsection


@section('header')
<!--  Header section -->
<section class="sub-category-header">

    <div class="container-fluid ">

        
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

                        
                        <a class="nav-link  sign-in-link " type="button"  data-toggle="modal" data-target="#exampleModal" href="#" data-toggle="modal" data-target="#exampleModal">Sign In</a>
                      </li>
                    </ul>
              </div>
            
          
            @else
            <ul class="nav nav-pills list-inline mr-lg-4" >
                <li class="nav-item"data-toggle="pill"  >
                  <a class="nav-link active" href="/register" data-toggle="modal" data-target="#">{{Auth::user()->first_name}}&nbsp;{{Auth::user()->last_name}}</a>
                </li>
                
                <li class="nav-item"  >
                  <a class="nav-link " href="/logout">Logout</a>
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


        <div class="container cateory-search ">
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
</section>

<!--  Header section end -->
@endsection



@section('main_container')

@foreach($user_information as $users_information)

 <div class="container">

    <div class="row" style="margin-top: 9%;">

        
        <div class="col-2 col-sm-5 col-md-4 col-lg-1 col-xl-2">
          <div class=" mb-4  profile-img">
            <img class="card-img-top" src="{{ asset('assets') }}/{{$users_information->image}}">
           
          </div>
        </div>
        <div class="col-10 col-sm-7 col-md-7 col-lg-5 col-xl-4 profile-title about-user">
            <h3>{{$users_information->first_name}}&nbsp;{{$users_information->last_name}}</h3>
            <span class=" address">{{$users_information->address}}</span><br>
            <span class="icon "><img class="img-review-icon"src="assets/images/profile/review-icon.png"><span class="txt-bold">{{$total_review}}</span> Reviews &nbsp; &nbsp;<img class="img-camera-icon"src="assets/images/profile/camera-icon.png"><span class="txt-bold">{{$total_image}}</span>Photos &nbsp;</span>
          <p class="mt-2">
            {{$users_information->about_us}}
          </p>
        </div>
        <div class="col-md-5  col-lg-5 col-xl-5 profile-title right-title">
            <span class="txt"><i class="fas fa-envelope"></i>Send Message</span><br>
            <span class="txt"><i class="fas fa-user-plus"></i>Follow {{$users_information->first_name}}&nbsp;{{$users_information->last_name}}</span>
        
        </div>
      

    </div>

    <div class="col-12 pt-lg-4 ">
        <div class="bar "></div>
    </div>
    
  </div>
   
 <div class="container">

    <div class="row pt-1">
     
        <div class="col-lg-2 col-md-12 profile-menu ">
                    <h5>{{$users_information->first_name}}&nbsp;{{$users_information->last_name}} Profile</h5>
                  <div class="nav-right-menu  nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <div class="row">
                    <div class="col-lg-12 col-md-4 col-sm-6 col-6">
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="fas fa-user"></i> &nbsp;Profile Overview</a>
                     <hr>
                    </div>
                    <div class="col-lg-12 col-md-4 col-sm-6 col-6">
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="fas fa-address-card"></i>&nbsp; Followers</a>
                    <hr>
                   </div>
                   <div class="col-lg-12 col-md-4 col-sm-6 col-6">
                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false"><img src="assets/images/profile/star-box.png"> Reviews</a>
                    <hr>
                  </div>
                  <div class="col-lg-12 col-md-4 col-sm-6 col-6">
                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false"><i class="fas fa-camera"></i>&nbsp;Photos</a>
                    <hr>
                  </div>
                  <div class="col-lg-12 col-md-4 col-sm-6 col-6">
                    
                      <div class="flag-icon pt-md-4 pt-sm-5 "><i class="fas fa-flag"></i>&nbsp; &nbsp;<span>Report this profile</span></div>

                  </div>

                    </div>

                </div>
                {{-- <div class="col-9">
                  <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">...</div>
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">...</div>
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
                  </div>
                </div> --}}
             
        </div>
        <div class="col-lg-7  ml-lg-5 ">
            <div id="youtube_restaurent" class="carousel slide youtube-section" data-ride="carousel">
                <!-- Indicators -->
                <!-- The slideshow -->
                <div class="carousel-inner categoy">

                    <div class="row  ">
                        <div class="col-7 header-title ">
                            <div class="section-title-header2 text-center pr-5 ">
    
                                <h4 class="  pt-lg-4 social-title youtube-title">LATEST UPDATES IN
                                    YOUTUBE CHANNEL</h4>
                            </div>
    
                        </div>
    
                    </div>
                

        <?php
        
        $active="active";
        for($i = 0; $i < count($youtube_info);) {

            if($i>2){$active=" ";}
        ?>       
            <div class="carousel-item {{$active}}">

                <div class="row ">
                    <?php
                    $j = min($i + 3, count($youtube_info)) ;
                    for(; $i < $j; $i++) { 
                     ?>
                   {{-- @foreach($youtube_info as $youtubes_info)  --}}
                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col-6 pb-5 video-card ">
                        <div class="card ">
                            <!--Card image-->
                          

                                <iframe src="{{$youtube_info[$i]->video_link}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            
                            
                            <!--Card content-->
                            <div class="body container">
                            <!--Title-->
                              <div class="row">
                                  <div class="col-2">
                                    <img src="{{ asset('assets') }}/{{$youtube_info[$i]->user_image}}" class="rounded-circle" alt="Cinque Terre">

                                  </div>
                                  <div class="col-9">
                                    <p class="video-title">{{$youtube_info[$i]->youtube_title}} </p>

                                  </div>

                              </div>
                            <!--Text-->
                            <p class="video-paragraph text-left">
                                {{$youtube_info[$i]->youtube_description}} 
                                                        
                            </div>
                         </div>
                    </div>
                   {{-- @endforeach  --}}

                   <?php }  ?>
                
                        
                         
                </div>
            </div>
         
        <?php
        }
        ?>
           
            </div>


                <div class="col-12  ">
                    <div class="text-center c_view ">
                        <a class="left carousel-control" href="#youtube_restaurent" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"><i class="fas fa-arrow-left "></i></span></a>
    
                       <a class="right carousel-control" href="#youtube_restaurent" data-slide="next"><span class="glyphicon glyphicon-chevron-right"><i class="fas fa-arrow-right "></i></span><span class="view_btn ">
                               
                     </span></a><a href="/sub-category/4">View All </a> 
                                                           
                    </div>
                </div>

            </div>

            
            <div class="col-12 pt-lg-5 ">
                <div class="bar "></div>
            </div>

            <div id="instagram_restaurent" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <!-- The slideshow -->
            <div class="carousel-inner categoy">
                <div class="row  ">
                    <div class="col-7 header-title ">
                        <div class="section-title-header2 text-center pr-5 ">

                            <h4 class="  pt-lg-4 social-title youtube-title">LATEST UPDATES IN
                                INSTAGRAM</h4>
                        </div>

                    </div>

                </div>
                <?php
        
                $active="active";
                for($i = 0; $i < count($instagram_info);) {

                    if($i>2){$active=" ";}
                ?> 
                    
                <div class="carousel-item instagram {{$active}}">

                    <div class="row ">
                    
                    {{-- @foreach($instagram_info as $instagrams_info) --}}
                    <?php
                    $j = min($i + 3, count($instagram_info)) ;
                    for(; $i < $j; $i++) { 
                     ?>
                        <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col-6 pb-5 instagram-card ">
                            <div class="card ">
                                <!--Card image-->
                                <div class="row">
                                    <div class="col-1  col-lg-1">
                                    <img src="{{ asset('assets') }}/{{$instagram_info[$i]->user_image}}" class="rounded-circle user-icon" alt="Cinque Terre">

                                    </div>
                                    <div class="col-5 col-sm-6 col-lg-7">
                                    <p class="instagram-title">{{$instagram_info[$i]->name}} on {{ date('j F , Y', strtotime($instagram_info[$i]->publish_date)) }}  </p>

                                    </div>
                                    <div class="col-2 col-sm-3 col-lg-2">
                                    <span><img src="assets/images/profile/instagram.png" class="rounded-circle instagram-icon" alt="Cinque Terre"></span>


                                    </div>
                                
                                
                                </div>
                                
                                
                                    <img src="{{ asset('assets') }}/{{$instagram_info[$i]->image}} "  alt="..." class="img-thumbnail responsive instagram-img">
                                    

                            
                                <!--Card content-->
                                <div class="body container ">
                                <div class="row">
                                    <div class="col-2">
                                        <span><i class="far fa-heart"></i></span>
                                    </div>
                                    <div class="col-2">
                                        <span><i class="far fa-comment"></i></span>
                                    </div>
                                    <div class="col-2">
                                        <span><i class="fa fa-location-arrow"></i></span>
                                    </div>
                                    <div class="col-2 col-sm-5  text-right">
                                        <span><i class="far fa-bookmark"></i></span>
                                    </div>
                                </div>
                                <span class="total-like"><span>{{$instagram_info[$i]->total_like}} &nbsp; Likes</span></span>
                                <p class="paragraph text-left">
                                    {{$instagram_info[$i]->instagram_description}}
                                
                                                            
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                        {{-- @endforeach --}}
                    
                    
                    
                    
                    
                            
                            
                    </div>
                </div> 
                
                <?php
                }
                ?>
                
                
            </div>


                <div class="col-12 mt-lg-4 ">
                    <div class="text-center c_view ">
                        <a class="left carousel-control" href="#instagram_restaurent" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"><i class="fas fa-arrow-left "></i></span></a>
    
                       <a class="right carousel-control" href="#instagram_restaurent" data-slide="next"><span class="glyphicon glyphicon-chevron-right"><i class="fas fa-arrow-right "></i></span><span class="view_btn ">
                               
                     </span></a><a href="/sub-category/4">View All </a> 
                                                           
                    </div>
                </div>

            </div>

            <div class="col-12 pt-lg-5 ">
                <div class="bar "></div>
            </div>

         
        </div>


        <div class="col-lg-2  col-md-12 profile-title about-title pt-5">
            <span class="title-txt">About {{$users_information->first_name}}&nbsp;{{$users_information->last_name}}</span><br>
         <div class="row">
           <div class="col-lg-12 col-md-6 col-sm-6 col-7">
            
            <div class=" mt-5">
              <span class=" table-body-title user-title ">Rating Calculation</span><br>
  
              <table style="border-collapse: collapse" class="table table-body table-borderless table-responsive-sm">
           
                  <tbody>
                    @foreach($reviews_count as $review_count)
                    <tr>
                      <td>
                       <span>
                           @if($review_count->rating==5)
                           <i class="fa fa-star checked_2"></i>&nbsp;<i class="fa fa-star checked_2"></i>&nbsp;<i class="fa fa-star checked_2"></i>&nbsp;<i class="fa fa-star checked_2"></i>&nbsp;<i class="fa fa-star checked_2"></i>
                           @elseif($review_count->rating==4)
                           <i class="fa fa-star checked_2"></i>&nbsp;<i class="fa fa-star checked_2"></i>&nbsp;<i class="fa fa-star checked_2"></i>&nbsp;<i class="fa fa-star checked_2"></i>&nbsp;
                           @elseif($review_count->rating==3)
                           <i class="fa fa-star checked_2"></i>&nbsp;<i class="fa fa-star checked_2"></i>&nbsp;<i class="fa fa-star checked_2"></i>&nbsp;
                           @elseif($review_count->rating==2)
                           <i class="fa fa-star checked_2"></i>&nbsp;<i class="fa fa-star checked_2"></i>&nbsp;
                           @elseif($review_count->rating==1)
                           <i class="fa fa-star checked_2"></i>&nbsp;
                           @endif
                        </span>
                      </td>
                      <td><span class="value">{{$review_count->total}}</span></td>
                    </tr>
                    @endforeach  
        
              
                  </tbody>
                
                </table>
           </div>
              <div class="col-12  ">
                  <div class="about-bar "></div>
              </div>
           </div>
         
            <div class="col-lg-12 col-md-6 col-sm-6 col-4 review-vote">
                <div class=" mt-4 ">
                    <span class="user-title">Review Votes</span><br>


                    <table cellspacing="0" class="table table-body table-borderless table-responsive-sm">
                    
                        <tbody>
                        <tr>
                            <td>
                                <span class="review-votes">Food</span>
                            </td>
                            <td>
                                @foreach($food_votes as $food_vote)
                                <span class="value">{{$food_vote->total}}</span>
                                @endforeach
                            </td>
                                
                        
                        </tr>
                        <tr>
                            <td>
                                
                                <span class="review-votes">Service</span>
                                
                            </td>
                            <td>
                                 @foreach($service_votes as $service_vote)
                                <span class="value">{{$service_vote->total}}</span>
                                @endforeach
                            </td>

                        
                        </tr>
                        <tr>
                            <td>
                                <span class="review-votes">Ambiance</span>

                            </td>
                            <td>
                                @foreach($ambiance_votes as $ambiance_vote)
                               <span class="value">{{$ambiance_vote->total}}</span>
                               @endforeach
                           </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="review-votes">Value</span>

                                
                            </td>
                            <td>
                                @foreach($value_votes as $value_vote)
                               <span class="value">{{$value_vote->total}}</span>
                               @endforeach
                           </td>
                    
                        </tr>
                        <tr>
                            <td>
                                <span class="review-votes">Interior</span>


                            </td>
                            <td>
                                @foreach($interior_votes as $interior_vote)
                               <span class="value">{{$interior_vote->total}}</span>
                               @endforeach
                           </td>
                        </tr>
                        </tbody>
                    </table>
                    </div>
                    <div class="col-12  ">
                        <div class="about-bar "></div>
                    </div>
            </div>
                
  
            <div class="col-lg-12 col-md-6 col-sm-6 col-7">
                <div id="carouselExampleControls" class="carousel slide mt-4" data-ride="carousel">
                    <div class="carousel-inner">
                        <span class="user-title">Top Reviewed Restaurants</span><br>
                       
                        <?php 
                        $active="active";
                        for($i=0;$i<count($top_rest);){
                            if($i>0){$active=" ";}
                       ?>
                        <div class="carousel-item {{$active}}">
                            <div class=" mt-4">
                    
                    
                                <table cellspacing="0" class="table table-body table-borderless table-responsive-sm">
                                
                                    <tbody>
                                   <?php 
                                         $j = min($i + 5, count($top_rest)) ;
                                        for(; $i < $j; $i++) { 
                                    ?>
                                {{-- @foreach($top_rest  as $top_resturent)       --}}
                                    <tr>
                                        
                                        <td>
                                            @foreach ($top_rest[$i]['restaurent'] as $resturent_name)
                                            <span class="review-votes"> {{$resturent_name->rest_name}}</span>
                                            @endforeach
                                        </td>
                                        <td>{{$top_rest[$i]['total']}}</td>
                                    </tr>
                                    <?php  }?>
                                 {{-- @endforeach    --}}
                                   
                              
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php }?>
                        {{-- <div class="carousel-item ">
                            <div class=" mt-4">
                    
                    
                                <table cellspacing="0" class="table table-body table-borderless table-responsive-sm">
                                
                                    <tbody>
                                    <tr>
                                        
                                        <td>
                                            <span class="review-votes"> Kacchi Bhai, Mirpur-1o</span>
                                        
                                        </td>
                                        <td>30</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="review-votes"> Shwarma House,Dhanmondi-2</span>
                    
                                        </td>
                                        <td>190</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="review-votes">  BFC, Kolabagan</span>
                    
                                        
                                        </td>
                                        <td>103</td>
                                    </tr>
                                    <tr>
                                        <td>
                                    
                                            <span class="review-votes">  Tehari Ghor, Sobhanbagh</span>
                                        
                                        </td>
                                        <td>30</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="review-votes"> Dostorkhana, Mirpur-6</span>
                    
                    
                                        </td>
                                        <td>2</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> --}}
                    </div>


                    <div class="col-12 mt-lg-4 pb-4 ">
                        <div class="text-center review-view">
                            <a class="left carousel-control" href="#carouselExampleControls" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"><i class="fas fa-arrow-left "></i></span></a>

                        <a class="right carousel-control" href="#carouselExampleControls" data-slide="next"><span class="glyphicon glyphicon-chevron-right"><i class="fas fa-arrow-right "></i></span><span class="view_btn ">
                                
                                                            
                        </div>
                    </div>
                
                </div>

            
                <div class="col-12  ">
                    <div class="about-bar "></div>
                </div>
            </div>
  
              
            <div class="col-lg-12 col-md-12 col-sm-12 col-12 ">
                <div class=" mt-4 info">
                    <span >Location</span><br>
                    <p>{{$users_information->address}}</p>
                    
                    <span >In Vozonroshik</span><br>
                    <p> Since {{ date('M Y', strtotime($users_information->created_at)) }} </p>

                    <span >Things I Love</span><br>
                    
                    <p>{{$users_information->favourites_food}}</p>
                    
                    <span >Hometown</span><br>
                    <p>{{$users_information->hometown}}</p>
                    
                
                    <span > How Are My Reviews</span><br>
                    <p>Informative</p>
                   
                    
                </div>
               
                    
            </div>
  
           

         </div>
         <div class="col-12  ">
            <div class="about-bar "></div>
        </div>


                

          </div>
          </div>
     </div>
        

    </div>

  <div class="row recommended-section">
      <div class="col-xl-7 col-lg-7 col-md-12" style="margin-top:-22%">
            <div class="  mb-lg-4  pt-lg-2">

                
                <div class="row  ">
                    <div class="col-8 recommend-header ">
                        <div class="section-title-header2 text-center pr-5 ">
                            <h4 class="  pt-lg-4  recommend-title">RECOMMENDEDS</h4>
                        </div>

                    </div>

                </div>
         
                <div class="singleinfos" id="nav-bar" >
                    <div class="row container-fluid ">

                  <nav class=" col-11 col-lg-12 col-xl-12 navbar-expand-lg navbar-lightcol-10  mt-4 navbar-expand-lg navbar-light  shadow navbar-expand-lg bg-white bg-light rounded">
                        
                    <div class="singleinfostabs" id="menu">
                
                        <ul id="menu_item" class="nav nav-pills nav-justified menu recommended-menu"> 
     
                        <li class="nav-item active "><a data-toggle="pill" href="#restaurant" >RESTAURANTS</a></li>
                        <li class="nav-item  "><a data-toggle="pill" href="#foods" style="text-decoration: none !important;">FOODS</a></li>
                        </ul>

                
                    </div>
                 </nav>
                
                    </div>
                </div>
      


                <div class="tab-content" >
                    <div class="tab-pane fade show active" id="restaurant" role="tabpanel" aria-labelledby="home-tab">
                        <div id="recommended" class="carousel slide " data-ride="carousel">
                            <!-- Indicators -->
                            <?php
                   
                            $carousel_inner=" ";
                            for($l = 0; $l < count($restaurant);$l++){
            
                                if($l<1){
                                    $carousel_inner="carousel-inner2";
                                }else if($l>1){
                                    $carousel_inner=" ";
                                }
                            }
                             ?>
                            <!-- The slideshow -->
                            <div class="carousel-inner {{$carousel_inner}} pb-5 ">
                                <?php
                   
                                $active="active";
                                for($i = 0; $i < count($restaurant);) {
                
                                    if($i>3){$active=" ";}
                                    
                                 ?>
                                <div class="carousel-item {{$active}}">
                               
                                    <div class="row food-gallery ">
                                        <?php
                                        $j = min($i + 4, count($restaurant)) ;
                                        for(; $i < $j; $i++) { 
                                         ?>  
                                       
                                        <div class=" item text-center" style="align-items: center;margin:auto;"  >
                                            <a class="hover-effect " href="/restaurant/{{$restaurant[$i]->route_url}}">
            
                                                <img  class="rounded-circle responsive" width="110" height="110" src="{{ asset('assets') }}/{{$restaurant[$i]->rest_image}}" alt=" ">
                                            </a>
                                            <p class="food-name">{{$restaurant[$i]->rest_name}}
                                            </p>
                                           
                                        </div>
                                        <?php }  ?>

                                    
    
    
                                    </div>
                                </div>
                             
                                <?php }  ?>


                            </div>

                        </div>

                            <div class="col-12 mt-lg-4  pr-lg-4  ">
                                <div class="text-center view_all">
                                    <a class="left carousel-control" href="#recommended" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"><i class="fas fa-arrow-left "></i></span></a>
                                    <a class="right carousel-control" href="#recommended" data-slide="next"><span class="glyphicon glyphicon-chevron-right"><i class="fas fa-arrow-right "></i></span>
                                <span class="view_btn ">view All</span></a>
                                </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="foods" role="tabpanel" aria-labelledby="profile-tab">    
                    <div id="food" class="carousel slide " data-ride="carousel">
                        <?php
                   
                        $carousel_inner=" ";
                        for($l = 0; $l < count($food);$l++){
        
                            if($l<1){
                                $carousel_inner="carousel-inner2";
                            }else if($l>1){
                                $carousel_inner=" ";
                            }
                        }
                         ?>
                        <!-- Indicators -->
                        <!-- The slideshow -->
                        <div class="carousel-inner pb-5 {{$carousel_inner}}">
                            <?php
                   
                            $active="active";
                            for($i = 0; $i < count($food);) {
            
                                if($i>3){$active=" ";}
                                
                             ?>
                             
                            <div class="carousel-item {{$active}}">
                           
                                <div class="row food-gallery ">
                                    <?php
                                    $j = min($i + 4, count($food)) ;
                                    for(; $i < $j; $i++) { 
                                     ?>  
                                   <div class=" item text-center" style="align-items: center;margin:auto;"  >
                                    <a class="hover-effect " href="#">
    
                                        <img  class="rounded-circle responsive" width="110" height="110" src="{{ asset('assets') }}/{{$food[$i]->food_image}}" alt=" ">
                                    </a>
                                    <p class="food-name">{{$food[$i]->food_name}}
                                    </p>
                                   
                                </div>
                               
                                <?php }  ?>


                                </div>
                            </div>
                            <?php
                        }
                        ?>


                        </div>

                    </div>

                        <div class="col-12 mt-lg-4  pr-lg-4  ">
                            <div class="text-center view_all">
                                <a class="left carousel-control" href="#food" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"><i class="fas fa-arrow-left "></i></span></a>
                                <a class="right carousel-control" href="#food" data-slide="next"><span class="glyphicon glyphicon-chevron-right"><i class="fas fa-arrow-right "></i></span>
                            <span class="view_btn ">view All</span></a>
                            </div>
                    </div>
                    </div>
                </div>
        

            

            </div>

            <div class="col-12 pt-lg-4 ">
                <div class="bar "></div>
            </div>

            <div class="container review-container pt-lg-4">
                <div class="row header_title ">
                    {{-- <div class="col-7 title ">
                        <div class="section-title-header2  text-center pr-lg-5 ">

                            <h4 class="  pt-lg-4 review-header-title">REVIEWS</h4>
                        </div>

                    </div> --}}

                    <div class="col-7 review-header ">
                        <div class="section-title-header2 text-center pr-5 ">
                            <h4 class="  pt-lg-4  recommend-title">REVIEWS</h4>
                        </div>

                    </div>

                </div>
         
        

                <div class="dropdown">
                    <button class=" dropdown-btn " type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span >Sort by: &nbsp;</span>
                    </button>
                
                    <select class="selectpicker dropdown-btn dropdown-toggle">
                        <option>Date</option>
                        <option>Ketchup</option>
                        <option>Relish</option>
                    </select>
                    
                </div>
         
            
                <div class="cotainer review">
                    <?php $outer_index = 0;?>
                 @foreach($reviews_info  as $review_info)
                    <div class="row mt-4">
                        <div class="col-xl-2 col-lg-3 col-md-2 ">
                            <div>
                                <img class=" rounded-img" src="{{ asset('assets') }}/{{$review_info->rest_image}}" alt=" ">
                            
                            </div>
                        </div>
                    
                        <div class="col-xl-9 col-lg-8 col-md-8 col-11 pr-lg-4 ">

                            <div class="review-discription  pl-md-2 pl-lg-4">
                                <span>{{$review_info->rest_name}}</span>
                                
                        

                                <div class="review-title">
                                    <p>Traditional Kacchi, Roast & Festival Items</p>
                                
                                </div>
                                <div class="rest-address">
                                    <span class="review-address-txt">{{$review_info->rest_address}} </span>
                                   <p> <span><i class="fa fa-star checked_2"></i>&nbsp;<i class="fa fa-star checked_2"></i>&nbsp;<i class="fa fa-star checked_2"></i>&nbsp;<i class="far fa-star"></i>&nbsp;<i class="far fa-star"></i>&nbsp;</span>
                                    <span class="date pl-sm-3">  {{ date('m/d/ Y', strtotime($review_info->created_at)) }}  </span></p>
                                </div>
                            

                             

                            </div>
                        </div>


                    
                        <div class="col-xl-12 col-lg-12 col-md-11 col-sm-12 col-xs-10 col-10  ">

                        
                                <div class="body-text pt-sm-1 text-left">

                                    {{$review_info->review_content}}
                                  
                                </div>
                         
                               <?php 
                                $index=0;
                                $images = $arrays[$outer_index]['images'];
                                $number_of_image = count($images);
                                
                                ?>
                      
                                <div class="row pt-4 review-img ">
                                    @foreach($images as $image)
                                    <?php  if ($index == 0){?>
                                    
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mb-4 mb-lg-0 text-center ">
                                       
                               
                                        <img
                                            src="{{ asset('assets') }}/{{$image}}"
                                            class=" shadow-1-strong  mb-4 left-img"
                                            alt=""
                                        />
                                    
                                    </div>
                                    <?php
                                    }
                                    else if($index > 0 and count($images)>2){
                                    ?>

                                   <div class="col-xl-6 col-lg-6 col-md-3 col-sm-3 col-3 mb-4 mb-lg-0 ">
                                            <?php
                                            if($index == 1){
                                            ?>
                                        <img
                                            src="{{ asset('assets') }}/{{$image}}"
                                            {{-- src="/assets/images/profile/review_img2.jpg" --}}
                                            class=" shadow-1-strong  mb-3 right-img"
                                            alt=""
                                        />
                                        <div class="overlay-img">
                                            <img 
                                                src="{{ asset('assets') }}/{{$image}}"
                                                {{-- src="/assets/images/profile/review_img3.jpg"  --}}
                                                alt="Avatar" 
                                                class=" right-img">
                                            <div class="overlay">
                                            {{-- <a href="" class="overlay-txt"> --}}
                                                <span class="text">View All {{$number_of_image}}</span>
                                            
                                            {{-- </a> --}}
                                            </div>
                                        </div>

                                   
                                        <?php
                                            }
                                            else if($index == 2){
                                            ?>
                                           
                                        <?php
                                            }
                                         ?>
                                    </div>
                                    
                                    <?php
                                        } 
                                        else {

                                    ?>
                                   
                                    <div class="col-xl-6 col-lg-6 col-md-3 col-sm-3 col-3  mb-lg-0 ">
                                    <img
                                        src="{{ asset('assets') }}/{{$image}}"
                                        {{-- src="/assets/images/profile/review_img4.jpg" --}}
                                        class=" shadow-1-strong  mb-3 right-full-img"
                                        alt=""
                                    />
                                    </div>
                                    <?php
                                        }
                                        if($index ==2){
                                            break;
                                        } 
                                        $index++;
                                    ?>

                                     @endforeach 
                                </div>
                               
                        

                               



                                
                                <hr>

                                

                        </div>

                </div>
            <?php $outer_index++;?>
              @endforeach

                {{-- <div class="cotainer review">
                    <div class="row mt-4">
                        <div class="col-xl-2 col-lg-3 col-md-2 ">
                            <div>
                                <img class=" rounded-img" src="/assets/images/profile/restaurant_img.png " alt=" ">
                            
                            </div>
                        </div>
                    
                        <div class="col-xl-9 col-lg-8 col-md-8 col-11 pr-lg-4 ">

                            <div class="review-discription  pl-md-4">
                                <span>Kacchi Bhai- Mirpur-10</span>
                                
                        

                                <div class="review-title">
                                    <p>Traditional Kacchi, Roast & Festival Items</p>
                                
                                </div>
                                <div class="rest-address">
                                    <span class="review-address-txt">Mirpur-10 circle, Dhaka</span>
                                   <p> <span><i class="fa fa-star checked_2"></i>&nbsp;<i class="fa fa-star checked_2"></i>&nbsp;<i class="fa fa-star checked_2"></i>&nbsp;<i class="far fa-star"></i>&nbsp;<i class="far fa-star"></i>&nbsp;</span>
                                    <span class="date pl-sm-3">11/20/2020 </span></p>
                                </div>
                            

                             

                            </div>
                        </div>


                    
                        <div class="col-xl-12 col-lg-12 col-md-11 col-sm-12 col-xs-10 col-10  ">

                        
                                <div class="body-text pt-sm-1 text-left">
                                    It is a long established fact that a reader will be distracted by the readable content of a page
                                    when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less
                                    normal distribution of letters, as opposed to using 'Content here, content here', making it
                                    look like readable English. Many desktop publishing packages and web page editors now use
                                    Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many
                                    web sites still in their infancy. Various versions have evolved over the years, sometimes by
                                    accident,sometimes on purpose (injected humour and the like).
                                </div>

                                <div class="row pt-4 review-img ">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mb-4 mb-lg-0 text-center">
                                    
                                
                                    <img
                                        src="/assets/images/profile/review_img1.jpg "
                                        class=" shadow-1-strong  mb-4 left-img"
                                        alt=""
                                    />
                                    </div>
                                
                              
                                
                                </div>


                               



                                
                                <hr>

                                

                        </div>

                </div>
                --}}




                </div>
              



                </div>
                
                
            


                <div class="  text-center review-btn review-big-btn pt-4 pb-4">

                    <a type="button " class="btn px-btn px-btn-theme text-light">View More Reviews Mr. F</a>

                </div>
            </div>
      </div>
</div>
    
  </div>
  

@endforeach


@endsection


@section('footer')
  
 <!-- Site footer -->
 @include('frontend.auth.footer.footer')


<script src="{{ asset('assets') }}/js/jquery-3.6.0.min.js"></script>
<script src="{{ asset('assets') }}/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script>
    //Click event handler for nav-items
    $('.nav-item').on('click',function(){
    
    //Remove any previous active classes
    $('.nav-item').removeClass('active');
    
    //Add active class to the clicked item
    $(this).addClass('active');
    });
</script>


<script>
    //Click event handler for nav-items
    $('.nav-link').on('click',function(){
    
    //Remove any previous active classes
    $('.nav-link').removeClass('active');
    
    //Add active class to the clicked item
    $(this).addClass('active');
    });
</script>
@endsection