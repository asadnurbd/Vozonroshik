
@extends('frontend.master')

@section('title')
 VozonRoshik | Single
@endsection


@section('header')
<!--  Header section -->
@foreach($restaurants as $restaurant)
<section class="header">

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

    <div class="container-fluid single-imgBackground ">
      
        <nav class="navbar navbar-expand-lg navbar-light  justify-content-between">

            <button type="button" class="save-btn see-button btn-default shadow-lg" data-id="{{$restaurant->id}}" ><span ><i class="far fa-bookmark"></i>&nbsp;</span> Save This Restaurant</button>

           

           
        
          
        </nav>



        
        @include('frontend.auth.login')



        <div class="container single-main-search ">
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
    {{-- <div class="container-fluid single-imgBackground ">
      
        <nav class="navbar navbar-expand-lg navbar-light  justify-content-between">


            <a class="navbar-brand ml-lg-5 " href="/">
                <img src="{{ asset('assets') }}/images/logo.png">
            </a>

           
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

       
           @endif
          
        </nav>



        
        @include('frontend.auth.login')



        <div class="container single-main-search ">
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

     

    </div> --}}
</section>

<!--  Header section end -->
@endsection



@section('main_container')
{{-- <button type="button" class="save-btn see-button btn-default shadow-lg" data-id="{{$restaurant->id}}" ><span ><i class="far fa-bookmark"></i>&nbsp;</span> Save This Restaurant</button> --}}


{{-- <div class="row mb-2">
    <div class="col-lg-11 col-md-12 col-xs-12 ">
        <div class="property-main  single-cover">



            <button type="button" class="save-btn see-button btn-default shadow-lg" data-id="{{$restaurant->id}}" ><span ><i class="far fa-bookmark"></i>&nbsp;</span> Save This Restaurant</button>
            
            <a class="hover-effect " href="# ">

                <img src="{{ asset('assets') }}/images/single/Single-cover.jpg " alt=" ">
            </a>



        </div>
    </div>
</div> --}}







<!--  SINGLE PAGE  RESTAURANTS IN DHAKA CITY SECTION START -->
<section>

{{-- @if(isset($restaurant)) --}}

    <div class="row ">
       
        <div class="col-lg-8 col-md-7 col-xs-12 ml-lg-4 ">
            <div class="row">
                <div class="col-1 mt-4">
                    <img width="150" height="150" src="{{ asset('assets') }}/images/single/logo.jpg" class="rounded float-left" alt="...">  
                    
                </div>
                <div class="col-11">
                <div class=" mb-lg-3 ml-lg-5 ">
                    <div class="description  pt-2 pl-lg-3 pl-xl-5">
                      
                        <div class="col-8 pl-xl-4">
                            <div class="category-title restaurant">
                                <h1 class="section-title restaurant-title">{{$restaurant->rest_name}}</h1>
                                <?php 
                                $hasComma = false;
                                ?>
                                <span class="pl-3">
                                @foreach($specifications as $specification)
                                  @if($specification->rest_id==$restaurant->id)
                                  <?php 
                                  if ($hasComma){ 
                                     echo '<sub class="comma">'.",".'</sub>'; 
                                 }?>
    
                                  <?php  echo'<tr class="mt-2" > <span id="specification">'.ucfirst($specification->specifications_name).'</span></tr>'; ?>
                                  
    
                                                                                             
                                                                                            
                                <?php $hasComma=true; ?> 
                                   
                                  @endif
                                @endforeach
                            </span>
                                <br>
                                <span class="ml-1"><i class="fa fa-star checked_2"></i><i class="fa fa-star checked_2"></i><i class="fa fa-star checked_2"></i><i class="fa fa-star checked_2"></i><i class="fas fa-star-half checked_2"></i><span>&nbsp; {{$review_counts}} Reviews</span></span>
                                </span>
                                <p>{{$restaurant->rest_description}}</p>
                            </div>
                            
                            <div class="ml-3">
                                <h4 class="pt-1">Services</h4>
                                
                                 <table>
                                    <?php foreach($services as  $service){ ?>
                                        @if($restaurant->id==$service->rest_id)
                                    <tr>
                                        <tr><span class="service-name"><?php echo $service->name; ?><span><i class="fas fa-check"></i>  &nbsp; </tr>
                                    </tr>
                                        @endif
                                    <?php } ?>
                                </table>
                                {{-- <span>Dine In &nbsp;<i class="fas fa-check"></i>&nbsp;Take Away&nbsp;<i class="fas fa-check"></i>&nbsp;Home Delivery&nbsp;<i class="fas fa-check"></i>&nbsp;</span> --}}
    
    
                            </div>
                        </div>
    
    
    
                    </div>
    
    
                </div>
                </div>
            </div>
          
            <div class="col-12 pt-lg-4 ">
                <div class="bar "></div>
            </div>
            <!-- Popular Dishes section -->
            <div class=" gallery_container mb-lg-4 ml-4 ">

                <div class="row header_title ">
                    <div class="col-7 title ">
                        <div class="section-title-header2 text-center pr-lg-5 ">

                            <h4 class="section-title Popular-title pt-lg-4 pl-lg-3 ">Popular Dishes</h4>
                        </div>

                    </div>

                </div>

                <div id="gallery" class="carousel slide " data-ride="carousel">
                    <!-- Indicators -->


                    <!-- The slideshow -->
                    <div class="carousel-inner pb-3 ml-lg-5 pl-lg-5">
                        <div class="carousel-item active">

                            <div class="row gallery p_gallery ">
                                <div class="col-xl-2 col-lg-3 col-sm-4 col-md-6 col-6 restaurent_body2">
                                    <div class="property-main ">
                                        <div class="property-wrap ">
                                            <div class="property-item ">
                                                <div class="item-thumb ml-lg-4">
                                                    <a class="hover-effect  " href="# ">

                                                        <img width="146" height="146" src="{{ asset('assets') }}/images/single/gallery_1.png" alt=" ">
                                                    </a>
                                                    <p class="p_pizza_name  ml-lg-1 pl-lg-3 pt-3">Bashmoti Kacchi</p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-3 col-sm-4 col-md-6  col-6 ml-lg-4 restaurent_body2">
                                    <div class="property-main ">
                                        <div class="property-wrap ">
                                            <div class="property-item ">
                                                <div class="item-thumb ml-lg-4 ">
                                                    <a class="hover-effect " href="# ">
                                                        <img width="146 " height="146 " src="{{ asset('assets') }}/images/single/gallery_2.png " alt=" ">
                                                    </a>
                                                    <p class="p_pizza_name pl-lg-3 ml-lg-4 pt-3 ml-md-4 ml-sm-4">Morog Polao</p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-3 col-sm-4 col-md-6 col-6 ml-lg-4 restaurent_body2">
                                    <div class="property-main ">
                                        <div class="property-wrap ">
                                            <div class="property-item ">
                                                <div class="item-thumb ml-lg-4 ">
                                                    <a class="hover-effect " href="# ">
                                                        <img width="146" height="146" src="{{ asset('assets') }}/images/single/gallery_3.png" alt=" ">
                                                    </a>
                                                    <p class="p_pizza_name pl-lg-3 ml-lg-4 pt-3 ml-md-4 ml-sm-4">Beef Tehari</p>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-3 col-sm-4 col-md-6 col-6 ml-lg-4 restaurent_body2">
                                    <div class="property-main ">
                                        <div class="property-wrap ">
                                            <div class="property-item ">
                                                <div class="item-thumb ml-lg-4 ">
                                                    <a class="hover-effect " href="# ">
                                                        <img width="146" height="146" src="{{ asset('assets') }}/images/single/gallery_4.png " alt=" ">
                                                    </a>
                                                    <p class="p_pizza_name pl-lg-4 pt-3">Special Borhani</p>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>


                    </div>

                </div>

                <div class="col-12 mt-lg-4  pr-lg-4  ">
                    <div class="text-center view_all">
                        <a class="left carousel-control" href="#gallery" data-slide="prev"><span class="glyphicon glyphicon-chevron-left" ><i class="fas fa-arrow-left "></i></span></a>
                        <a class="right carousel-control" href="#gallery" data-slide="next"><span class="glyphicon glyphicon-chevron-right"><i class="fas fa-arrow-right "></i></span>
                     <span class="view_btn ">view All</span></a>
                    </div>
                </div>


            </div>

            <div class="col-12 pt-lg-4 ">
                <div class="bar "></div>
            </div>

        </div>


        <div class="col-lg-3 col-md-2 col-xs-12 side_bar ">
            <div class="property-main ">
                <div class="property-wrap ">

                    <div class=" delivery-button ">

                        <a type="button " class="btn s_px-btn text-light pt-2 mr-4 ">INFORMATION<i class="fas fa-user-lock "></i></a>


                    </div>
                    <div class="card home-box ">
                        <div class="card-body card-border ">

                            <div class="card-text ml-2 "><i class="fas fa-clock "></i>&nbsp;&nbsp;Open Now- {{$restaurant->opening_time}} AM - {{$restaurant->closing_time}} PM</div>
                            <div class="card-text ml-2 "><i class="fas fa-map-marked-alt "></i>&nbsp;&nbsp;{{$restaurant->rest_address}}</div>
                            <div class="card-text ml-2 " style="font-size:17px"><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;&nbsp;{{$restaurant->phone_number}}</div>
                            <div class="card-text ml-2 "><i class="fas fa-envelope "></i>&nbsp;&nbsp;{{$restaurant->email}}</div>
                            <div class="card-text ml-2 "><i class="fab fa-facebook-f "></i>&nbsp;&nbsp;{{$restaurant->fb_link}}</div>
                            <div class="card-text ml-2 "><i class="fas fa-directions "></i>&nbsp;&nbsp;Get Direction</div>
                            <iframe class="mt-3 " width="270 " height="260 " frameborder="0 " scrolling="no " marginheight="0 " marginwidth="0 " id="gmap_canvas " src="{{$restaurant->google_link}}"></iframe>

                        </div>
                    </div>

                </div>
            </div>


        </div>
        <div class="col-lg-8 col-md-7 col-xs-12 ml-lg-4 ">

            <div class="col-12 pt-lg-4 ">
                <div class="responsive_bar"></div>
            </div>
            <!-- Menu section -->
            <div class="container gallery_container pt-lg-3">

                <div class="row ">
                    <div class="col-7 title pt-lg-3">
                        <div class="section-title-header text-center  ">

                            <h4 class="section-title Popular-title pt-4 pl-lg-2 ">Menu</h4>
                        </div>

                    </div>

                </div>
                
                <div class="container h-100">
                    <div class="d-flex justify-content-center ">
                       
                           
                            <div class="searchbar">
                                
                                <a class="search_icon " type="submit" value="Search"><i class="fas fa-search"></i></a>
                                <input class="search_input" type="text" id="food_search"  placeholder="Food You Want">
    
                            </div>
                        
                    </div>
                </div>


                
    
               
            
             @foreach($menus as $menu)
               @if($restaurant->id==$menu['menu']->rest_id)
               
                 @if(!empty($menu['menu']->menu_name))
               
                <div class="singleinfos">
                    <div class="row container-fluid ">
                        <nav class="navbar navbar-expand-lg navbar-lightcol-10 col-md-12 col-lg-11 col-xl-10 mt-4 navbar-expand-lg navbar-light  shadow navbar-expand-lg bg-white bg-light rounded">
                         
                      <div class="singleinfostabs" id="menu" >
                 
                        <ul id="menu_item" class="nav nav-pills nav-justified menu" >
                       
                            @php
                            $count=0;
                            @endphp
                            @foreach($menus as $menu)
                            @if($count==0)
                            @php
                               $active='active';
                            @endphp
                           @else
                           @php
                           $active='';
                           @endphp
                           @endif
                           @if($restaurant->id==$menu['menu']->rest_id)
                          
                          <li class="nav-menu {{$active}}"><a data-toggle="pill"  href="#m_{{$menu['menu']->id}}" style=" text-decoration: none !important;">{{$menu['menu']->menu_name}}</a></li>
                          {{-- <li  class="active"><a style=" text-decoration: none !important; color:gray" data-toggle="pill" href="#m_{{$menu['menu']->id}}">{{$menu['menu']->menu_name}}</a></li> --}}
                         
                       
                            @endif
                            @php
                            $count++;
                            @endphp
                            @endforeach
                         
                       
                        </ul>

                   
                      </div>
                    </nav>
                 
                    </div>
                </div>
                 @break
                 @endif
                 @endif
                @endforeach
                  

               


                <div class="container"> 
                    <div class="tab-content">
                    @php
                    $counter = 0;
                    @endphp 
                    
                    @php
                    $class="tab-pane fade show active"
                    @endphp
                @foreach($menus as $menu)  
                @if($restaurant->id==$menu['menu']->rest_id)
                        @if($counter>0)
                        @php
                       $class="tab-pane fade"
                        @endphp
                        
                    @endif

                    @php
                    $counter++;
                    @endphp
            
                 <?php $count=count($menu['sub_menu'])-1; ?>
                      <div id="m_{{$menu['menu']->id}}" class="{{$class}}">
                        <?php for($i=0;$i<count($menu['sub_menu']);$i++ ){?>
                        {{-- @foreach($menu['sub_menu'] as $sub_item) --}}
                        <div >
                            <div id="menu_container" class="row mt-4 ml-lg-5  ml-md-3 ml-sm-4 pl-lg-3">
                                <div class="col-lg-4  col-md-6 col-xs-12 restaurent_body ">
                                    <div class="property-main ">
                                        <div class="property-wrap ">
                                            <div class="property-item ">
                                                <div class="item-thumb ">
                                                    <a class="hover-effect " href="# ">
                                                        <img width="300" class="img-fluid " src="{{ asset('assets') }}{{$menu['sub_menu'][$i]->food_image}}" alt=" ">
                                                    </a>
        
                                                </div>
        
                                            </div>
                                        </div>
                                    </div>
        
        
                                </div>
                                <div class="col-lg-6 col-md-6 col-11 mt-4 ">
        
                                    <div class="discription-menu ">
                                        <div class="discription-menu-title">
                                            <h5> {{$menu['sub_menu'][$i]->food_name}} </h5>
                                        </div>
                                        <div class="discription-menu-text">
                                            <span>{{$menu['sub_menu'][$i]->description}}</span>
                                        </div>
                                        <span><i class="fa fa-star checked_2"></i>&nbsp;<i class="fa fa-star checked_2"></i>&nbsp;<i class="fa fa-star checked_2"></i>&nbsp;<i class="fa fa-star checked_2"></i>&nbsp;<i class="fa fa-star checked_2"></i>&nbsp;</span>
                                        </span>
        
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-xs-12 mt-4 ">
        
                                    <div class="pricin-list ">
                                        <div class="pricin-list-title ">
                                            <span>Tk.<span>{{$menu['sub_menu'][$i]->food_price}}</span> </span>
                                        </div>
        
                                    </div>
                                </div>
        
                            </div>
        
                        </div>
                       <?php 
                       if($i==$count){
                        ?>  
                        <?php }else{?>
                        <div class="col-11 pt-lg-4 ">
                            <div class="sm_bar "></div>
                        </div>
                                                    
                       <?php }} ?>
                        
                      </div>

             @endif        
            @endforeach     
                   
                    </div>
                  </div>



               
              
               



            </div>
           

           
            <div class="col-12 pt-lg-3 pr-lg-5 ">
                <div class="bar "></div>
            </div>



            <!-- What People Are Saying section -->

            <div class="container gallery_container pt-lg-2">

                <div class="row header_title ">
                    <div class="col-7 title pt-lg-5">
                        <div class="section-title-header text-center  ">

                            <h4 class="section-title pt-4 ">What People Are Saying</h4>
                        </div>

                    </div>

                </div>

                <div class="row ">
                    <div class="col-lg-7 col-md-12 col-sm-12 col-11">


                        <div class=" rating_part">
                            <h6>Overall Ratings & Reviews</h6>
                            <span>Reviews can be made by both dine in and take away customers</span></br>
                            <span><i class="fa fa-star checked_2"></i>&nbsp;<i class="fa fa-star checked_2"></i>&nbsp;<i class="fa fa-star checked_2"></i>&nbsp;<i class="fa fa-star checked_2"></i>&nbsp;<i class="fas fa-star-half"></i>&nbsp;
                            {{-- @foreach($Rest_reviews as $Rest_review)   --}}
                                @foreach($avg_reviews as $avg_review)
                                  @if($avg_review->rest_id==$restaurant->id)
                                <span>&nbsp; 
                                 <?php
                                 $avg=$avg_review->total/$review_counts;
                                 
                                 ?> {{ round($avg , 1) }}  (Overall Rating)
                                 </span>
                                 @endif
                                @endforeach
                            {{-- @endforeach --}}
                            </span>

                            <div class="row ">
                                @foreach($food_votes as $food_vote)
                                @if($food_vote->total!=null)
                                @if($food_vote->rest_id==$restaurant->id)
                                <div class="col-lg-2 col-sm-2 col-3 right-bar ">     
                                   
                                    <span class="text-middle ml-3">
                                        {{$food_vote->total}}
                                    </span>
                                        
                                    <br> <span class="ml-3">Food </span>
                                </div>
                                @endif
                                @endif
                                @endforeach
                               

                                @foreach($service_votes as $service_vote)
                                @if($service_vote->total!=null)
                                @if($service_vote->rest_id==$restaurant->id)
                                <div class="col-lg-2 col-sm-2 col-3 right-bar pl-3">          
                                   
                                    <span class="text-middle ml-2">
                                        {{$service_vote->total}}
                                    </span>
                                
                                     <br><span>Service </span>
                                </div>
                                @endif
                                @endif
                                @endforeach

                                @foreach($ambiance_votes as $ambiance_vote)
                                @if($ambiance_vote->total!=null)
                                @if($ambiance_vote->rest_id==$restaurant->id)
                               
                                <div class="col-lg-2 col-sm-2 col-3 right-bar2 pr-4 ">
                                    <span class="text-middle ml-3">
                                        {{$ambiance_vote->total}}
                                    </span>
                                   
                                   
                                     <br> <span class="">Ambiance &nbsp;</span>
                                </div>
                                @endif
                                @endif
                                @endforeach

                                @foreach($value_votes as $value_vote)
                                @if($value_vote->total!=null)
                                @if($value_vote->rest_id==$restaurant->id)
                                <div class="col-lg-2 col-sm-2 col-3 right-bar pl-4">
                                  
                                    <span class="text-middle ">
                                        {{$value_vote->total}}
                                    </span>
                                    
                                   
                                     <br><span>Value </span>
                                   
                                </div>
                                @endif
                                @endif
                                @endforeach
                               
                                @foreach($interior_votes as $interior_vote)
                                @if($value_vote->total!=null)
                                @if($interior_vote->rest_id==$restaurant->id)
                          
                                <div class="col-lg-2 col-sm-2 col-3 right-bar pl-3">    
                                   
                                    <span class="text-middle ml-2">
                                        {{$interior_vote->total}}
                                    </span>
                                    
                                   
                                     <br><span>Interior </span>
                                    
                                </div>
                                @endif
                                @endif
                                @endforeach
                               
                            </div>



                        </div>
                    </div>
                    <div class="col-lg-4 ">
                    <?php
                        $max_rating_count = 1;
                        $rest_ratings = [];
                        foreach($ratings as $rating){  
                             if($restaurant->id==$rating->rest_id){
                                array_push($rest_ratings, $rating);
                             }
                               
                        } 
                        foreach($rest_ratings as $rating) {
                            $max_rating_count = max($max_rating_count, $rating->single_str_count);
                        }
                        $rest_all_ratings=[];
                        for($i=1;$i<6;$i++){
                            $check = false;
                            foreach($rest_ratings as $rating) {
                                if($rating->rating == $i) {
                                    array_push($rest_all_ratings, $rating);
                                    $check = true;
                                    break;
                                }
                            }
                            if(!$check) {
                                $tempobj = new stdClass();
                                $tempobj->single_str_count = 0;
                                $tempobj->rating = $i;
                                $tempobj->rest_id = $restaurant->id;
                                array_push($rest_all_ratings, $tempobj);
                                // array_push($rest_all_ratings, json_encode($tempobj));
                            } 
                        }
                        ?>

                        <script>
                            console.log(<?= json_encode($rest_all_ratings); ?>);
                        </script>

                        <?php

                     ?>    
                    @foreach($rest_all_ratings as $rating)
                        <div class="row pt-2">
                            <div class="col-1">{{$rating->rating}}</div>
                            <div class="col-10 mt-1">
                                <div class="progress ">
                                    <div class="progress-bar " role="progressbar" aria-valuenow="" aria-valuemin="" aria-valuemax="" style="width:{{ ($rating->single_str_count*100) / $max_rating_count}}%; background-color:#ff7420 !important;">
                                    </div>
                                </div>
                               
                            </div>

                        </div>
                  
                      
                       
                  
                    @endforeach

                    @if (Auth::guest())
                    <div class="col-sm-4 text-center mt-5">
                       
                        <button type="button" name="add_login"  class="btn btn-primary" data-toggle="modal" data-target="#login_modal">Review</button>
                    </div>
                    @else
                    <div class="col-sm-4 text-center mt-5">
                       
                        <button type="button" name="add_review" id="add_review" class="btn btn-primary">Review</button>
                    </div>
                    @endif
                    </div>
                </div>


                
                <!-- Modal -->
                <div class="modal fade" id="login_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                                    <div class="input-group">
  

                                    <div class="input-group phone-input">
                                    <span class="input-group-addon">
                                        <select name="sal">
                                        <option selected="selected" value="Mr.">Mr.</option>
                                        <option value="Mrs.">Mrs.</option>
                                        <option value="Miss">Miss</option>
                                        </select>
                                    </span>
                                    <input type="text" name="Name" class="form-control" placeholder="Phone" oninput="FullName.value = sal.value +' '+ Name.value">
                                    </div>
                                    
                                        
                                    </div>
                                    
                                    <span class="text-danger" role="alert" style="font-family: 'PT Serif', serif;">
                                        @error('name')
                                    
                                            {{ $message }}
                                        
                                        @enderror
                                    </span>

                                

                                    <button class="sign-in-btn shadow-sm" type="submit">Send On Time Password</button>
                                    <p class="divider-text">
                                        <span class="bg-or">OR</span>
                                    </p>
                                    <button class="sign-f-btn shadow-sm" type="submit"><a  style="color:#fff" href="{{route('login.facebook')}}">Sign In with Facebook </a></button>
                                    <button class="sign-g-btn shadow-sm" type="submit"><a  style="color:#fff" href="{{route('login.google')}}">SIgn Up with Google </a></button>
                                    <div class="row fb-g-section">
                                       
                                        <div class="col-lg-12 col-12">
                                            <div class="sign-in-txt  ">

                                                <span>New to Vozonroshik?</span>
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
        
                <div id="review_modal" class="modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content" style="height:650px;">
                            <div class="modal-header">
                              <h5 class="modal-title">Write A Review</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                <span class="review-title">Share Your Experience</span>
                                <div class="row">
                                    <div class="col-8 text-left">
                                       
                                        <h4 class=" mb-0">
                                      
                                          <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                                          <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                                          <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                                          <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                                          <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                                        </h4>
                                    </div>
                                    <div class="col-2">
                                        <span>Good</span>
                                      
                                    </div>
                                    <div class="col-2">
                                        <span class="active">clear</span>
                                      
                                    </div>
                                </div>
                                <span>What did you like ?</span>
                                <div class="row">
                                    <div class="col-12 text-left">
                                       
                                        <h4 class=" mb-0">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                <span class="form-check-label" for="inlineCheckbox1">Food</span>
                                              </div>
                                              <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                <span class="form-check-label" for="inlineCheckbox2">Service</span>
                                              </div>
                                              <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                <span class="form-check-label" for="inlineCheckbox2">Ambiance</span>
                                              </div>
                                              <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                <span class="form-check-label" for="inlineCheckbox2">Value</span>
                                              </div>
                                              <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                <span class="form-check-label" for="inlineCheckbox2">Interior</span>
                                              </div>
                                              
                                        </h4>
                                    </div>
      
                                </div>
                             
                              <div class="form-group">
                                  <input type="text" name="user_name" id="user_name" class="form-control2" placeholder="Search tag or select from below" />
                              </div>



                              <div class="frame p-y-1">
                                <div class=" m-b-1 ">
                                    <h3>Add Photos</h3>
                                    <div class="col-11 offset-sm-3 file-bodar">
                                        <h4>Drag Here or Browse</h4>
                                        <div class="form-group inputDnD  ">
                                        <span><i class="fas fa-image"></i></span>
                                        <div class="form-group ">
                                            <input type="file" class="form-control-file  font-weight-bold" id="inputFile" accept="image/*" onchange="readUrl(this)" data-title="">
                                        </div>
                                    
                                        </div>
                                    </div>
                                </div>
                             </div>


                             <div class=" row review-form">
                                <div class="col-2"> 
                                 <img width="50" height="45" src="{{ asset('assets') }}/images/client_1.png " alt=" ">
                                </div> 
                                
                              <div class=" col-10" id="review-form">
                                  <textarea name="user_review" id="user_review" class=""  placeholder="Write Your Review "></textarea>
                              </div>
                              
                             </div>
                             <span class="text-right" id="review-form-txt">Maximum 150 characters<span>
                             <div id="add-review-btn">
                                
                                <div class="form-group  mt-3 text-right">
                                    <button type="button" class="btn btn-primary" id="save_review">Add Review</button>
                                </div>
                             </div>
                            
                            </div>
                      </div>
                    </div>
                </div>

                <div class="singleinfos">
                    <div class="row container-fluid ">
                        <nav class="navbar navbar-expand-lg navbar-lightcol-10 col-md-12 col-lg-11 col-xl-10 mt-4 navbar-expand-lg navbar-light  shadow navbar-expand-lg bg-white bg-light rounded">
                         
                      <div class="singleinfostabs" id="menu"  >
                        <ul id="menu_item" class="nav nav-pills nav-justified menu" >
                          <li class="nav-menu active"><a data-toggle="pill"  href="#review" style=" text-decoration: none !important;">REVIEWS</a></li>
                          <li class="nav-menu  "><a data-toggle="pill"  href="#menu1" style=" text-decoration: none !important;">GOOGLE REVIEWS</a></li>
                          <li class="nav-menu  "><a data-toggle="pill"  href="#menu2" style=" text-decoration: none !important;">FACEBOOK REVIEWS</a></li>
                          <li class="nav-menu "><a data-toggle="pill"  href="#menu3" style=" text-decoration: none !important;">YOUTUBE REVIEWS</a></li>
                        </ul>
                      </div>
                    </nav>
                 
                    </div>
                </div>



                <div class="tab-content">
                 <div id="review" class="tab-pane fade show active ">
                               
                        @php
                        $l=0;
                        // $review_count=count($Rest_reviews);
                        @endphp
                    @foreach($Rest_reviews as $Rest_review)
                            
                        @if($Rest_review->rest_id==$restaurant->id)
                        @php
                        $l=0;
                        $review_count=count((array)$Rest_review);
                        @endphp
                       
                      
                            <div class="cotainer menu_container">
                                    <div class="row ">

                                        <div class="col-lg-1 ">
                                            <div>
                                                <img width="50" height="45" src="{{ asset('assets') }}/images/client_1.png " alt=" ">
                                                <div class="review-name">

                                                    <span class="pr-5">{{$Rest_review->first_name}} &nbsp;{{$Rest_review->last_name}}</span><br>
                                                    
                                            
                                                    @foreach($user_counts as $user_count)
                                                    @if($Rest_review->user_id==$user_count->user_id)
                                                    <span>({{$user_count->total}} Review)</span>
                                                    @endif
                                                    @endforeach
                                                </div>

                                            </div>
                                        </div>
                                    
                                        @foreach ($reviews as $review)
                                        @if($Rest_review->id==$review->id)
                                        <div class="col-lg-8 col-md-12 col-11 pr-lg-4 ">

                                            <div class="review-discription  pl-md-3">
                                                <span><i class="fa fa-star checked_2"></i>&nbsp;<i class="fa fa-star checked_2"></i>&nbsp;<i class="fa fa-star checked_2"></i>&nbsp;<i class="far fa-star"></i>&nbsp;<i class="far fa-star"></i>&nbsp;</span>
                                                <span class="date pl-sm-3">{{ $review->created_at->format('M d , Y ')}}
                                                        </span>

                                                <div class="category pt-2">
                                                    @if($Rest_review->food==1)
                                                    <span>Food &nbsp; </span>
                                                    @endif
                                                    @if($Rest_review->service==1)
                                                    <span>Service &nbsp;</span> 
                                                    @endif
                                                    @if($Rest_review->ambiance==1)
                                                    <span>Ambiance &nbsp;</span> 
                                                    @endif
                                                    @if($Rest_review->value==1)
                                                    <span>Value &nbsp;</span> 
                                                    @endif
                                                    @if($Rest_review->Interior==1)
                                                    <span>Interior &nbsp;</span> 
                                                    @endif
                                                    
                                                </div>
                                                <div class="text pt-sm-2">
                                                    {{$Rest_review->review_content}}
                                                </div>

                                                <div class="icon ">
                                                    
                                                    <span class="like-btn" data-id="{{$Rest_review->id}}"><i id="like-icon-{{$Rest_review->id}}" class="fas fa-thumbs-up"></i>&nbsp; </span>
                                                    
                                                
                                                    
                                                        <?php 
                                                        $instances=[];
                                                        array_push($instances,$review->likes);
                                                        foreach ($instances as $instance){
                        
                                                        $like_count=count((array)$instance);
                                                        }
                                                    
                                                        ?>
                                                        <?php 
                                                        $instances_dislike=[];
                                                        array_push($instances_dislike,$review->dislikes);
                                                        foreach ($instances_dislike as $instance){
                        
                                                        $dislike_count=count((array)$instance);
                                                        }
                                                    
                                                        ?>
                                                        
                                                    <span id="like-count-{{$Rest_review->id}}">{{$like_count}}</span>
                                                    
                                                

                                                    <span class="dislike-btn" data-id="{{$Rest_review->id}}"> <i id="dislike-icon-{{$Rest_review->id}}" class="fas fa-thumbs-down pl-5" style="color:red;" ></i>&nbsp;</span>
                                                    
                                                    <span id="dislike-count-{{$Rest_review->id}}">{{$dislike_count}}</span><span><i class="far fa-comment-alt pl-5"></i>&nbsp; </span><span>38</span></span>
                                                
                                                </div>

                                            </div>
                                        </div>

                                    
                                        <div class="col-xl-10 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12  ml-xl-5">

                                        
                                                    
                                        
                                            <div id="first_review_{{$l++}}" class="carousel slide" data-ride="carousel">
                                                <!-- Indicators -->

                                                <!-- The slideshow -->
                                                <div class="carousel-inner">
                                            
                                                    <?php
                                
                                                    $active="active";
                                                    for($i = 0; $i <count((array)$review->images);) {
                                
                                                        if($i>4){$active=" ";}
                                                    ?>

                                                    <div class="carousel-item {{$active}}">
                                                        <div class="">

                                                            <div class="row mt-lg-2 mt-4  ">

                                                                <div class="col-xl-1 col-lg-1 col-md-2 col-sm-2 col-2 pt-lg-3 pt-2">
                                                                    <div class="text-center ">
                                                                        <a class="left carousel-control" href="#first_review_{{$l-1}}" data-slide="prev"><span class="glyphicon glyphicon-chevron-left" ><i class="fas fa-arrow-left "></i></span></a>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                                $j = min($i + 5,count((array)$review->images));
                                                                
                                                                for(; $i < $j; $i++) { 

                                                                    // $obj = json_decode($review->images,true);
                                                                   
                                                                ?>
                                                                {{-- @foreach((array)$review->comments as $comment)  --}}
                                                                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 col-3 pb-4">
                                                                    <div class="property-main ">
                                                                        <div class="property-wrap ">
                                                                            <div class="property-item ">
                                                                                <div class="item-thumb ">
                                                                                    <a class="hover-effect " href="# ">

                                                                                    
                                                                                        <img width="80" height="80" class="img-fluid rounded" src="{{ asset('assets') }}/{{$review->images[$i]}}" alt=" ">
                                                                                    
                                                                                    </a>

                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                {{-- @endforeach --}}
                                                                <?php
                                                                    }
                                                                ?>
                                                                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1 pt-lg-4 pt-2">
                                                                    <div class="text-center ">

                                                                        <a class="right carousel-control" href="#first_review_{{$l-1}}" data-slide="next"><span class="glyphicon glyphicon-chevron-right" ><i class="fas fa-arrow-right"></i></span></a>
                                                                        </a>
                                                                    </div>
                                                                </div>



                                                            </div>

                                                        </div>

                                                    </div>


                                                    
                                                    <?php
                                                }
                                                ?>


                                                </div>

                                            </div>



                                        </div>

                                        @endif
                                        @endforeach
                                    </div>

                                </div>
                                
                                <div class="col-11  ml-2 ">
                                    <div class="r_sm-bar "></div>
                                </div>
                              
                        @endif     
                      @endforeach              
                                


                                <div class=" text-center review-btn review-big-btn ">

                                    <a type="button " class="btn  px-btn px-btn-theme text-light">View More Reviews</a>

                                </div>
                 </div>
                 <div id="menu2" class="tab-pane fade  ">
                            <div class="cotainer menu_container">
                                    <div class="row mt-4">

                                        <div class="col-12 ">
                                            <div>
                                                <iframe width="500" src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fweb.facebook.com%2Fjahin.afsan%2Fposts%2F1773184476172735&show_text=true&width=500" width="500" height="207" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe> 
                                            </div>
                                        </div>
                                    
                                     

                                    
                                    </div>

                                </div>
                                
                                <div class="col-11 pt-lg-4 ml-2 ">
                                    {{-- <div class="r_sm-bar "></div> --}}
                                </div>
                 </div>

                <div id="menu3" class="tab-pane fade  ">
                            <div class="cotainer menu_container">
                                    <div class="row mt-4">
                                     @foreach($youtubes_review as $youtube_review)  
                                        <div class="col-5">
                                            <div>


                                         <iframe width="300" height="200" src="{{$youtube_review->video_link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>     

                                            </div>
                                            <h6 class="col-9 text-center">{{$youtube_review->youtube_title}}</h6>
                                        </div>
                                        
                                      @endforeach  
                                    
                                    

                                    
                                    </div>

                                </div>
                                
                                <div class="col-11 pt-lg-4 ml-2 ">
                                    <div class="r_sm-bar "></div>
                                </div>



                </div>

                </div>             
                  
            
      
            </div>

        </div>



      </div>
  

</section>

@endsection
@endforeach

@section('footer')
<!-- Site footer -->
    @include('frontend.auth.footer.footer')

<script>
    let menus = @json($menus);

</script>


<script src="{{ asset('assets') }}/js/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="{{ asset('assets') }}/js/bootstrap.min.js"></script>



<script>

    $(".save-btn").click(function(){
         let rest_id =$(this).attr("data-id");
         $.get("/save-restaurant/"+rest_id, function(data, status){
            // $("#dislike-count-"+rest_id).text(data.dislike_count);
            // $("#like-count-"+rest_id).text(data.like_count);
    
         
            if(data.is_logged_in == false){
                alert("You need to log in to perform this action");
            }
            // if(data.is_disliked == true){
            //     $("#dislike-icon-"+rest_id).addClass("fa-thumbs-up")
            // }else{
            //     $("#dislike-icon-"+rest_id).addClass("fas fa-camera")
            // }
                
           
         });
        // console.log($(this).attr("data-id"));
        });
</script>

<!-- Latest compiled and minified JavaScript -->

<script>
    // Add active class to the current button (highlight it)
   
    $(".like-btn").click(function(){
        let rest_id =$(this).attr("data-id");

     $.get("/review-comment-like/"+rest_id, function(data, status){
        $("#like-count-"+rest_id).text(data.like_count);
        $("#dislike-count-"+rest_id).text(data.dislike_count);
     
        if(data.is_logged_in == false){
            alert("You need to log in to perform this action");
        }
        if(data.is_liked == true){
            $("#like-icon-"+rest_id).addClass("fa-thumbs-up")
        }else{
            $("#like-icon-"+rest_id).addClass("fa-thumbs-up")
        }
            
       
     });
    // console.log($(this).attr("data-id"));
    });

    $(".dislike-btn").click(function(){
     let rest_id =$(this).attr("data-id");
     $.get("/review-comment-dislike/"+rest_id, function(data, status){
        $("#dislike-count-"+rest_id).text(data.dislike_count);
        $("#like-count-"+rest_id).text(data.like_count);

     
        if(data.is_logged_in == false){
            alert("You need to log in to perform this action");
        }
        // if(data.is_disliked == true){
        //     $("#dislike-icon-"+rest_id).addClass("fa-thumbs-up")
        // }else{
        //     $("#dislike-icon-"+rest_id).addClass("fas fa-camera")
        // }
            
       
     });
    // console.log($(this).attr("data-id"));
    });

</script>





<script type="text/javascript">
    $(document).ready(function(){  
      $('#food_search').on('keyup',function(){
          var search = $('#food_search').val();
        //   console.log(search);
        
          $.ajax({
  
              type:"GET",
              url: '/search-by-food',
              data: {text: $('#food_search').val()},
              success: function(data,$data_1) {                
                  console.log(data);
  
                  $('#menu_container').html(data);
                  $('#menu_item').html(data_1);
              
              }
  
  
  
          });
              });
  
          });
  </script>


<script>
//Click event handler for nav-items
$('.nav-menu').on('click',function(){

//Remove any previous active classes
$('.nav-menu').removeClass('active');

//Add active class to the clicked item
$(this).addClass('active');
});
</script>




 
<script type="text/javascript">

    //review  ajax code

    
    var rating_data = 0;
    
    $('#add_review').click(function(){
    
        $('#review_modal').modal('show');
    
    });
    
    $(document).on('mouseenter', '.submit_star', function(){
    
        var rating = $(this).data('rating');
    
        reset_background();
    
        for(var count = 1; count <= rating; count++)
        {
    
            $('#submit_star_'+count).addClass('text-warning');
    
        }
    
    });
    
    function reset_background()
    {
        for(var count = 1; count <= 5; count++)
        {
    
            $('#submit_star_'+count).addClass('star-light');
    
            $('#submit_star_'+count).removeClass('text-warning');
    
        }
    }
    
    $(document).on('mouseleave', '.submit_star', function(){
    
        reset_background();
    
        for(var count = 1; count <= rating_data; count++)
        {
    
            $('#submit_star_'+count).removeClass('star-light');
    
            $('#submit_star_'+count).addClass('text-warning');
        }
    
    });
    
    $(document).on('click', '.submit_star', function(){
    
        rating_data = $(this).data('rating');
    
    });
    
    $('#save_review').click(function(){
    
        var user_name = $('#user_name').val();
    
        var user_review = $('#user_review').val();
    
        if(user_name == '' || user_review == '')
        {
            alert("Please Fill Both Field");
            return false;
        }
        else
        {
            $.ajax({
                url:"submit_rating.php",
                method:"POST",
                data:{rating_data:rating_data, user_name:user_name, user_review:user_review},
                success:function(data)
                {
                    $('#review_modal').modal('hide');
    
                    load_rating_data();
    
                    alert(data);
                }
            })
        }
    
    });
    </script>



<script>
    
function readUrl(input) {

if (input.files && input.files[0]) {
let reader = new FileReader();
reader.onload = (e) => {
let imgData = e.target.result;
let imgName = input.files[0].name;
input.setAttribute("data-title", imgName);
console.log(e.target.result);
}
reader.readAsDataURL(input.files[0]);
}

}
</script>

@endsection