
@extends('frontend.master')

@section('title')
 VozonRoshik | Home
@endsection


@section('header')
<section class="header">
    <div class=" imgBackground ">
        <nav class="navbar navbar-expand-lg navbar-dark  static-top header-section">
            <div class="container-fluid ">
                <a class="navbar-brand " href="/">
                    <img  src="{{ asset('assets') }}/images/logo.png">
                </a>

                 @if (Auth::guest())
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>

                 <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="nav list-inline ml-auto">
                        <li class="nav-item" id="menu-item">
                            <a class="nav-link active" href="/register"><span> <img class="sign-up-logo"src="{{ asset('assets') }}/images/sign_up.png"> Register<span></a>
                          </li>
                          <li class="nav-item" id="menu-item">   
                            <a class="nav-link  sign-in-link"   data-toggle="modal" data-target="#exampleModal" href="#" data-toggle="modal" data-target="#exampleModal"><span> <img class="sign-in-logo" src="{{ asset('assets') }}/images/sign_in.png"> Log In<span></a>
                          </li>
                      </ul>
                 </div>
               
           

              @else
              <ul class="nav nav-pills ml-auto" >
                  <li class="nav-item"data-toggle="pill"  >
                    <a class="nav-link active" href="/register" data-toggle="modal" data-target="#">{{Auth::user()->first_name}}&nbsp;{{Auth::user()->last_name}}</a>
                  </li>
                  
                  <li class="nav-item"  >
                    <a class="nav-link active" href="/logout">Logout</a>
                  </li>
                </ul>

             @endif
            </div>
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




    <!--  Round gallery section start -->
    <section >
        <div class="roundgallery">
        <div class="container-fluid " >
            
            <div id="gallery" class="carousel slide " data-ride="carousel" >
                <!-- Indicators -->
                <!-- The slideshow -->
                <?php
                   
                $carousel_inner=" ";
                for($l = 0; $l < count($food_types);$l++){

                    if($l<2){
                        $carousel_inner="carousel-inner2";
                    }
                    if($l>2){
                        $carousel_inner="carousel-inner3";
                    }
                    if($l>=3){
                        $carousel_inner="carousel-inner4";
                    }
                }
                 ?>
               
                <div class="carousel-inner {{$carousel_inner}} " >
                    <?php
                   
                    $active="active";
                    for($i = 0; $i < count($food_types);) {
    
                        if($i>5){$active=" ";}
                        
                     ?>
                     
                    
                        <div class="carousel-item {{$active}}">
                        
                        <div class="row"  >
                            <?php
                            $j = min($i + 6, count($food_types)) ;
                            for(; $i < $j; $i++) { 
                             ?>    <div  style="align-items: center;margin:auto;">                     
                                    <div class=" item text-center"   >
                                        <a class="hover-effect " href="/category/{{$food_types[$i]->name}}">

                                            <img  width="230" height="230" src="{{ asset('assets') }}{{$food_types[$i]->image}} " alt=" ">
                                        </a>
                                        <p class="pizza_name  ">{{$food_types[$i]->name}}</p>
                                     
                                    </div>
                                  </div>
                                        
                         
                            <?php }  ?>
                           
                        </div>
                    </div>
                   
                    <?php
                    }
                    ?>


                </div>
              
            
            </div>

            <div class="col-12   ml-lg-4 pl-lg-4 pb-lg-3 col-md-12">
                <div class="text-center view_all ">
                    <a class="left carousel-control" href="#gallery" data-slide="prev"><span class="glyphicon glyphicon-chevron-left" ><i class="fas fa-arrow-left "></i></span></a>
                    <a class="right carousel-control" href="#gallery" data-slide="next"><span class="glyphicon glyphicon-chevron-right"><i class="fas fa-arrow-right "></i></span></a>
                 <span class="view_btn "> <a href="/category">view All</a> </span>
                </div>
            </div>
        </div>
       </div>


        <div class="col-12">
            <div class="bar pt-lg-4  "></div>
        </div>
    </section>


    <!--  TOP RESTAURANTS IN DHAKA CITY SECTION START -->
    <section>
      
            <div  class="delivery_restaurent " id="top_restaurent" class="carousel slide " data-ride="carousel ">
                <!-- Indicators -->

                <!-- The slideshow -->
                <div class="carousel-inner ">
                    
                    
                  
                    <div  id="wrap">

                        <div class="float-container">

                            <div class="float-child1">
                               
                            </div>
                            <div class="float-child2">
                                <div class="section-title-header ">
                                    <h4 class="section-title ">TOP RESTAURANTS IN DHAKA CITY</h4>
                                 </div>
                            </div>
                            
                            <div class="float-child3">
                                <div class=" text-right ">
                                    <a class="left carousel-control text-center " href="#top_restaurent" data-slide="prev"><span class="glyphicon glyphicon-chevron-left" ><i class="fas fa-arrow-left "></i></span></a>
                                    <a class="right carousel-control text-center " href="#top_restaurent" data-slide="next"><span class="glyphicon glyphicon-chevron-right"><i class="fas fa-arrow-right "></i></span>
    
                                    </a>
                                </div>
                            </div>
                            
                          </div>
                         <div id="main1">
                           
                          </div>
                       
                    </div>


               

                    <div class="carousel-item active ">

                        
                        
                        <div class="row ">

                            <div class="col-lg-4 col-md-6 col-12 col-sm-6 restaurent_body">
                                <div class="property-main ">
                                    <div class="property-wrap ">
                                        <div class="property-item ">
                                            <a class="hover-effect "href="">
                                                <div class="dark-image">
                                                    <img class="img-fluid image " src="{{ asset('assets') }}/images/restaurent_1.jpg " alt=" ">
                                        
                                                    <div class="image__overlay image__overlay--primary">
                                                        
                                                        <p class="image__description">
                                                            Currently Unavailable
                                                        </p>
                                                    </div>
                                                </div>

                                         
                                              </a>


                                      

                                            <div class="col-6">
                                                
                                            </div>
                                            <div class="item-body">

                                                @foreach($avg_reviews as $avg_review)
                                                @if($avg_review->rest_id==$restaurants[$i]->id)
                                                <?php
                                                $avg=$avg_review->single_rating_sum/$avg_review->single_rating_count;
                                                 if($avg>=4.5){
                                                ?>
                                               <div id="active_level" class="float-right review-rate pt-1 ">
                                                  
                                                   <span>{{  number_format((float)$avg, 1, '.', ''); }} </span>
                                               </div>
                                               <?php }else{?>

                                                <div class="float-right review-rate pt-1 ">
                                                    <span>{{  number_format((float)$avg, 1, '.', ''); }} </span>
                                                </div>

                    
                                               <?php }?>
                                               @endif
                                               @endforeach
                                                {{-- <div id="active_level" class="float-right review-rate pt-1 ">
                                                    <span>4.5</span>
                                                </div> --}}
                                            
                                                <h6 class="featured-title ">{{$restaurants[$i]->rest_name}}</h6>

                                                <div class="pricin-list  ">
                                                    <div class="property-price service_name" >
                                                        <table>
                                                            <?php 
                                                            $hasComma = false;

                                                            ?>
                                                            @foreach($services as  $service)
                                                            
                                
                                                            @if($service->rest_id==$restaurants[$i]->id)
                                                          
                                                                <?php 
                                                                if ($hasComma){ 
                                                                echo ","; 
                                                                }?>
                                                           
                                                            <?php  echo '<tr class="service_name">'.ucfirst($service->name).'</tr>'; ?>
                                                                
                                                            
                                                            <?php $hasComma=true; ?> 
                                                        
                                                                @endif
                                                            @endforeach
                                                        </table>
                                                            
                                                
                                                    </div>

                                                </div>
                                                
                                            

                                            </div>



                                        </div>

                                        
                                    </div>
                                </div>



                                <div class="pricin-list ">
                                    <div class="bottom-title  ml-2 pb-3">
                                        <?php 
                                        $hasComma = false;
                                        ?>
                                        @foreach($specifications as $specification)
                                        @if($specification->rest_id==$restaurants[$i]->id)
                                        <?php 
                                        if ($hasComma){ 
                                            echo '<sub class="comma">'.",".'</sub>'; 
                                        }?>

                                        <?php  echo '<tr   > <span id="new-specification">' .ucfirst($specification->specifications_name).'</span></tr>'; ?>
                                                                                            
                                                                                        
                                            <?php $hasComma=true; ?> 
                                            
                                            @endif
                                            @endforeach
                                    </div>

                                </div>
                            
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 col-sm-6 restaurent_body">
                                <div class="property-main ">
                                    <div class="property-wrap ">
                                        <div class="property-item ">
                                            <a class="hover-effect "href="">
                                                <div class="dark-image">
                                                    <img class="img-fluid image " src="{{ asset('assets') }}/images/restaurent_2.jpg " alt=" ">
                                        
                                                    <div class="image__overlay image__overlay--primary">
                                                        
                                                        <p class="image__description">
                                                            Currently Unavailable
                                                        </p>
                                                    </div>
                                                </div>

                                         
                                              </a>


                                      

                                            <div class="col-6">
                                                
                                            </div>
                                            <div class="item-body">

                                                @foreach($avg_reviews as $avg_review)
                                                @if($avg_review->rest_id==$restaurants[$i]->id)
                                                <?php
                                                $avg=$avg_review->single_rating_sum/$avg_review->single_rating_count;
                                                 if($avg>=4.5){
                                                ?>
                                               <div id="active_level" class="float-right review-rate pt-1 ">
                                                  
                                                   <span>{{  number_format((float)$avg, 1, '.', ''); }} </span>
                                               </div>
                                               <?php }else{?>

                                                <div class="float-right review-rate pt-1 ">
                                                    <span>{{  number_format((float)$avg, 1, '.', ''); }} </span>
                                                </div>

                    
                                               <?php }?>
                                               @endif
                                               @endforeach
                                                {{-- <div id="active_level" class="float-right review-rate pt-1 ">
                                                    <span>4.5</span>
                                                </div> --}}
                                            
                                                <h6 class="featured-title ">{{$restaurants[$i]->rest_name}}</h6>

                                                <div class="pricin-list  ">
                                                    <div class="property-price service_name" >
                                                        <table>
                                                            <?php 
                                                            $hasComma = false;

                                                            ?>
                                                            @foreach($services as  $service)
                                                            
                                
                                                            @if($service->rest_id==$restaurants[$i]->id)
                                                          
                                                                <?php 
                                                                if ($hasComma){ 
                                                                echo ","; 
                                                                }?>
                                                           
                                                            <?php  echo '<tr class="service_name">'.ucfirst($service->name).'</tr>'; ?>
                                                                
                                                            
                                                            <?php $hasComma=true; ?> 
                                                        
                                                                @endif
                                                            @endforeach
                                                        </table>
                                                            
                                                
                                                    </div>

                                                </div>
                                                
                                            

                                            </div>



                                        </div>

                                        
                                    </div>
                                </div>



                                <div class="pricin-list ">
                                    <div class="bottom-title  ml-2 pb-3">
                                        <?php 
                                        $hasComma = false;
                                        ?>
                                        @foreach($specifications as $specification)
                                        @if($specification->rest_id==$restaurants[$i]->id)
                                        <?php 
                                        if ($hasComma){ 
                                            echo '<sub class="comma">'.",".'</sub>'; 
                                        }?>

                                        <?php  echo '<tr   > <span id="new-specification">' .ucfirst($specification->specifications_name).'</span></tr>'; ?>
                                                                                            
                                                                                        
                                            <?php $hasComma=true; ?> 
                                            
                                            @endif
                                            @endforeach
                                    </div>

                                </div>
                            
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 col-sm-6 restaurent_body">
                                <div class="property-main ">
                                    <div class="property-wrap ">
                                        <div class="property-item ">
                                            <a class="hover-effect "href="">
                                                <div class="dark-image">
                                                    <img class="img-fluid image " src="{{ asset('assets') }}/images/restaurent_3.jpg " alt=" ">
                                        
                                                    <div class="image__overlay image__overlay--primary">
                                                        
                                                        <p class="image__description">
                                                            Currently Unavailable
                                                        </p>
                                                    </div>
                                                </div>

                                         
                                              </a>


                                      

                                            <div class="col-6">
                                                
                                            </div>
                                            <div class="item-body">

                                                @foreach($avg_reviews as $avg_review)
                                                @if($avg_review->rest_id==$restaurants[$i]->id)
                                                <?php
                                                $avg=$avg_review->single_rating_sum/$avg_review->single_rating_count;
                                                 if($avg>=4.5){
                                                ?>
                                               <div id="active_level" class="float-right review-rate pt-1 ">
                                                  
                                                   <span>{{  number_format((float)$avg, 1, '.', ''); }} </span>
                                               </div>
                                               <?php }else{?>

                                                <div class="float-right review-rate pt-1 ">
                                                    <span>{{  number_format((float)$avg, 1, '.', ''); }} </span>
                                                </div>

                    
                                               <?php }?>
                                               @endif
                                               @endforeach
                                                {{-- <div id="active_level" class="float-right review-rate pt-1 ">
                                                    <span>4.5</span>
                                                </div> --}}
                                            
                                                <h6 class="featured-title ">{{$restaurants[$i]->rest_name}}</h6>

                                                <div class="pricin-list  ">
                                                    <div class="property-price service_name" >
                                                        <table>
                                                            <?php 
                                                            $hasComma = false;

                                                            ?>
                                                            @foreach($services as  $service)
                                                            
                                
                                                            @if($service->rest_id==$restaurants[$i]->id)
                                                          
                                                                <?php 
                                                                if ($hasComma){ 
                                                                echo ","; 
                                                                }?>
                                                           
                                                            <?php  echo '<tr class="service_name">'.ucfirst($service->name).'</tr>'; ?>
                                                                
                                                            
                                                            <?php $hasComma=true; ?> 
                                                        
                                                                @endif
                                                            @endforeach
                                                        </table>
                                                            
                                                
                                                    </div>

                                                </div>
                                                
                                            

                                            </div>



                                        </div>

                                        
                                    </div>
                                </div>



                                <div class="pricin-list ">
                                    <div class="bottom-title  ml-2 pb-3">
                                        <?php 
                                        $hasComma = false;
                                        ?>
                                        @foreach($specifications as $specification)
                                        @if($specification->rest_id==$restaurants[$i]->id)
                                        <?php 
                                        if ($hasComma){ 
                                            echo '<sub class="comma">'.",".'</sub>'; 
                                        }?>

                                        <?php  echo '<tr   > <span id="new-specification">' .ucfirst($specification->specifications_name).'</span></tr>'; ?>
                                                                                            
                                                                                        
                                            <?php $hasComma=true; ?> 
                                            
                                            @endif
                                            @endforeach
                                    </div>

                                </div>
                            
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 col-sm-6 restaurent_body">
                                <div class="property-main ">
                                    <div class="property-wrap ">
                                        <div class="property-item ">
                                            <a class="hover-effect "href="">
                                                <div class="dark-image">
                                                    <img class="img-fluid image " src="{{ asset('assets') }}/images/restaurent_1.jpg " alt=" ">
                                        
                                                    <div class="image__overlay image__overlay--primary">
                                                        
                                                        <p class="image__description">
                                                            Currently Unavailable
                                                        </p>
                                                    </div>
                                                </div>

                                         
                                              </a>


                                      

                                            <div class="col-6">
                                                
                                            </div>
                                            <div class="item-body">

                                                @foreach($avg_reviews as $avg_review)
                                                @if($avg_review->rest_id==$restaurants[$i]->id)
                                                <?php
                                                $avg=$avg_review->single_rating_sum/$avg_review->single_rating_count;
                                                 if($avg>=4.5){
                                                ?>
                                               <div id="active_level" class="float-right review-rate pt-1 ">
                                                  
                                                   <span>{{  number_format((float)$avg, 1, '.', ''); }} </span>
                                               </div>
                                               <?php }else{?>

                                                <div class="float-right review-rate pt-1 ">
                                                    <span>{{  number_format((float)$avg, 1, '.', ''); }} </span>
                                                </div>

                    
                                               <?php }?>
                                               @endif
                                               @endforeach
                                                {{-- <div id="active_level" class="float-right review-rate pt-1 ">
                                                    <span>4.5</span>
                                                </div> --}}
                                            
                                                <h6 class="featured-title ">{{$restaurants[$i]->rest_name}}</h6>

                                                <div class="pricin-list  ">
                                                    <div class="property-price service_name" >
                                                        <table>
                                                            <?php 
                                                            $hasComma = false;

                                                            ?>
                                                            @foreach($services as  $service)
                                                            
                                
                                                            @if($service->rest_id==$restaurants[$i]->id)
                                                          
                                                                <?php 
                                                                if ($hasComma){ 
                                                                echo ","; 
                                                                }?>
                                                           
                                                            <?php  echo '<tr class="service_name">'.ucfirst($service->name).'</tr>'; ?>
                                                                
                                                            
                                                            <?php $hasComma=true; ?> 
                                                        
                                                                @endif
                                                            @endforeach
                                                        </table>
                                                            
                                                
                                                    </div>

                                                </div>
                                                
                                            

                                            </div>



                                        </div>

                                        
                                    </div>
                                </div>



                                <div class="pricin-list ">
                                    <div class="bottom-title  ml-2 pb-3">
                                        <?php 
                                        $hasComma = false;
                                        ?>
                                        @foreach($specifications as $specification)
                                        @if($specification->rest_id==$restaurants[$i]->id)
                                        <?php 
                                        if ($hasComma){ 
                                            echo '<sub class="comma">'.",".'</sub>'; 
                                        }?>

                                        <?php  echo '<tr   > <span id="new-specification">' .ucfirst($specification->specifications_name).'</span></tr>'; ?>
                                                                                            
                                                                                        
                                            <?php $hasComma=true; ?> 
                                            
                                            @endif
                                            @endforeach
                                    </div>

                                </div>
                            
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 col-sm-6 restaurent_body">
                                <div class="property-main ">
                                    <div class="property-wrap ">
                                        <div class="property-item ">
                                            <a class="hover-effect "href="">
                                                <div class="dark-image">
                                                    <img class="img-fluid image " src="{{ asset('assets') }}/images/restaurent_2.jpg " alt=" ">
                                        
                                                    <div class="image__overlay image__overlay--primary">
                                                        
                                                        <p class="image__description">
                                                            Currently Unavailable
                                                        </p>
                                                    </div>
                                                </div>

                                         
                                              </a>


                                      

                                            <div class="col-6">
                                                
                                            </div>
                                            <div class="item-body">

                                                @foreach($avg_reviews as $avg_review)
                                                @if($avg_review->rest_id==$restaurants[$i]->id)
                                                <?php
                                                $avg=$avg_review->single_rating_sum/$avg_review->single_rating_count;
                                                 if($avg>=4.5){
                                                ?>
                                               <div id="active_level" class="float-right review-rate pt-1 ">
                                                  
                                                   <span>{{  number_format((float)$avg, 1, '.', ''); }} </span>
                                               </div>
                                               <?php }else{?>

                                                <div class="float-right review-rate pt-1 ">
                                                    <span>{{  number_format((float)$avg, 1, '.', ''); }} </span>
                                                </div>

                    
                                               <?php }?>
                                               @endif
                                               @endforeach
                                                {{-- <div id="active_level" class="float-right review-rate pt-1 ">
                                                    <span>4.5</span>
                                                </div> --}}
                                            
                                                <h6 class="featured-title ">{{$restaurants[$i]->rest_name}}</h6>

                                                <div class="pricin-list  ">
                                                    <div class="property-price service_name" >
                                                        <table>
                                                            <?php 
                                                            $hasComma = false;

                                                            ?>
                                                            @foreach($services as  $service)
                                                            
                                
                                                            @if($service->rest_id==$restaurants[$i]->id)
                                                          
                                                                <?php 
                                                                if ($hasComma){ 
                                                                echo ","; 
                                                                }?>
                                                           
                                                            <?php  echo '<tr class="service_name">'.ucfirst($service->name).'</tr>'; ?>
                                                                
                                                            
                                                            <?php $hasComma=true; ?> 
                                                        
                                                                @endif
                                                            @endforeach
                                                        </table>
                                                            
                                                
                                                    </div>

                                                </div>
                                                
                                            

                                            </div>



                                        </div>

                                        
                                    </div>
                                </div>



                                <div class="pricin-list ">
                                    <div class="bottom-title  ml-2 pb-3">
                                        <?php 
                                        $hasComma = false;
                                        ?>
                                        @foreach($specifications as $specification)
                                        @if($specification->rest_id==$restaurants[$i]->id)
                                        <?php 
                                        if ($hasComma){ 
                                            echo '<sub class="comma">'.",".'</sub>'; 
                                        }?>

                                        <?php  echo '<tr   > <span id="new-specification">' .ucfirst($specification->specifications_name).'</span></tr>'; ?>
                                                                                            
                                                                                        
                                            <?php $hasComma=true; ?> 
                                            
                                            @endif
                                            @endforeach
                                    </div>

                                </div>
                            
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 col-sm-6 restaurent_body">
                                <div class="property-main ">
                                    <div class="property-wrap ">
                                        <div class="property-item ">
                                            <a class="hover-effect "href="">
                                                <div class="dark-image">
                                                    <img class="img-fluid image " src="{{ asset('assets') }}/images/restaurent_3.jpg " alt=" ">
                                        
                                                    <div class="image__overlay image__overlay--primary">
                                                        
                                                        <p class="image__description">
                                                            Currently Unavailable
                                                        </p>
                                                    </div>
                                                </div>

                                         
                                              </a>


                                      

                                            <div class="col-6">
                                                
                                            </div>
                                            <div class="item-body">

                                                @foreach($avg_reviews as $avg_review)
                                                @if($avg_review->rest_id==$restaurants[$i]->id)
                                                <?php
                                                $avg=$avg_review->single_rating_sum/$avg_review->single_rating_count;
                                                 if($avg>=4.5){
                                                ?>
                                               <div id="active_level" class="float-right review-rate pt-1 ">
                                                  
                                                   <span>{{  number_format((float)$avg, 1, '.', ''); }} </span>
                                               </div>
                                               <?php }else{?>

                                                <div class="float-right review-rate pt-1 ">
                                                    <span>{{  number_format((float)$avg, 1, '.', ''); }} </span>
                                                </div>

                    
                                               <?php }?>
                                               @endif
                                               @endforeach
                                                {{-- <div id="active_level" class="float-right review-rate pt-1 ">
                                                    <span>4.5</span>
                                                </div> --}}
                                            
                                                <h6 class="featured-title ">{{$restaurants[$i]->rest_name}}</h6>

                                                <div class="pricin-list  ">
                                                    <div class="property-price service_name" >
                                                        <table>
                                                            <?php 
                                                            $hasComma = false;

                                                            ?>
                                                            @foreach($services as  $service)
                                                            
                                
                                                            @if($service->rest_id==$restaurants[$i]->id)
                                                          
                                                                <?php 
                                                                if ($hasComma){ 
                                                                echo ","; 
                                                                }?>
                                                           
                                                            <?php  echo '<tr class="service_name">'.ucfirst($service->name).'</tr>'; ?>
                                                                
                                                            
                                                            <?php $hasComma=true; ?> 
                                                        
                                                                @endif
                                                            @endforeach
                                                        </table>
                                                            
                                                
                                                    </div>

                                                </div>
                                                
                                            

                                            </div>



                                        </div>

                                        
                                    </div>
                                </div>



                                <div class="pricin-list ">
                                    <div class="bottom-title  ml-2 pb-3">
                                        <?php 
                                        $hasComma = false;
                                        ?>
                                        @foreach($specifications as $specification)
                                        @if($specification->rest_id==$restaurants[$i]->id)
                                        <?php 
                                        if ($hasComma){ 
                                            echo '<sub class="comma">'.",".'</sub>'; 
                                        }?>

                                        <?php  echo '<tr   > <span id="new-specification">' .ucfirst($specification->specifications_name).'</span></tr>'; ?>
                                                                                            
                                                                                        
                                            <?php $hasComma=true; ?> 
                                            
                                            @endif
                                            @endforeach
                                    </div>

                                </div>
                            
                            </div>
                            
                           

                       

                            
                        </div>
                    </div>
                   
                 



                </div>

            </div>


    
        <div class="col-12 pt-lg-2 ">
            <div class="bar "></div>
        </div>
    </section>

    <!--  TOP RESTAURANTS IN DHAKA CITY SECTION END -->

    <!--    NEW & FEATURED RESTAURANTS SECTION START-->

    <section >
        <div class="new_restaurent">
          <?php $l=0?>
            <div id="new_rest{{$l++}}" class="carousel slide " data-ride="carousel ">
                <!-- Indicators -->
                <!-- The slideshow -->
                <div class="carousel-inner ">

                 
                    <div  id="wrap">


                        <div class="float-container">

                            <div class="float-child1">
                                
                            </div>
                            <div class="float-child2">
                                <div class="section-title-header ">
                                    <h4 class="section-title ">NEW & FEATURED RESTAURANTS</h4>
                                 </div>
                            </div>
                            
                            <div class="float-child3">
                                <div class=" text-right ">
                                    <a class="left carousel-control text-center " href="#new_rest{{$l-1}}" data-slide="prev"><span class="glyphicon glyphicon-chevron-left" ><i class="fas fa-arrow-left "></i></span></a>
                                    <a class="right carousel-control text-center " href="#new_rest{{$l-1}}" data-slide="next"><span class="glyphicon glyphicon-chevron-right"><i class="fas fa-arrow-right "></i></span>
    
                                    </a>
                                </div>
                            </div>
                            
                          </div>
                          
                           <div id="main1">
                           
                           
                          </div>
                        
                       
                    </div>

                   
                    <?php
                   
                    $active="active";
                    for($i = 0; $i < count($new_restaurents);) {

                        if($i>2){$active=" ";}
                     ?>

                    <div class="carousel-item {{$active}} ">
                        
                        <div class="row ">
                            <?php
                            $j = min($i + 3, count($new_restaurents)) ;
                            for(; $i < $j; $i++) { 
                             ?>


                            <div class="col-lg-4 col-md-6 col-12 col-sm-6 restaurent_body">
                                <div class="property-main ">
                                    <div class="property-wrap ">
                                        <div class="property-item ">

                                            <a href="/restaurant/{{$new_restaurents[$i]->route_url}}">
                                            <div class="item-thumb ">
                                                @if($restaurants[$i]->delivery_status==1)
                                                <div class="text-block ">
                                                   
                                                    <p>Free Delivery</p>
                                                 
                                                </div>
                                                @endif
                                                <img  class="free-delivery img-fluid image " src="{{ asset('assets') }}{{$new_restaurents[$i]->rest_image}} " alt=" ">
                                            </div>
                                           </a>

                                          
                                            <div class="item-body ">
                                                @foreach($avg_reviews as $avg_review)
                                                 @if($avg_review->rest_id==$new_restaurents[$i]->id)
                                                 <?php
                                                 $avg=$avg_review->single_rating_sum/$avg_review->single_rating_count;
                                                  if($avg>=4.5){
                                                 ?>
                                                <div id="active_level" class="float-right review-rate pt-1 ">
                                                   
                                                    <span>{{  number_format((float)$avg, 1, '.', ''); }} </span>
                                                </div>
                                                <?php }else{?>

                                                 <div class="float-right review-rate pt-1 ">
                                                     <span>{{  number_format((float)$avg, 1, '.', ''); }} </span>
                                                 </div>

                     
                                                <?php }?>
                                                @endif
                                                @endforeach
                                                <h6 class="featured-title ">{{$new_restaurents[$i]->rest_name}}</h6>

                                                <div class="pricin-list  ">
                                                    <div class="property-price service_name" >
                                                        <table>
                                                            <?php 
                                                             $hasComma = false;
                                                            ?>
                                                            @foreach($services as  $service)
                                                              @if($service->rest_id==$new_restaurents[$i]->id)
                                                                <?php 
                                                                if ($hasComma){ 
                                                                   echo ","; 
                                                                }?>
                                                               <?php  echo '<tr class="service_name">'.ucfirst($service->name).'</tr>'; ?>
                                                                 
                                                               
                                                              <?php $hasComma=true; ?> 
                                                          
                                                                @endif
                                                            @endforeach
                                                        </table>
                                                            
                                                
                                                    </div>

                                                </div>
                                                   
                                              

                                            </div>



                                        </div>
                                    </div>
                                </div>

                                
                            
                                <div class="pricin-list ">
                                    <div class="bottom-title  ml-2 pb-3 ">
                                        <?php 
                                        $hasComma = false;
                                        ?>
                                        @foreach($specifications as $specification)
                                          @if($specification->rest_id==$new_restaurents[$i]->id)
                                          <?php 
                                          if ($hasComma){ 
                                             echo ","; 
                                          }?>
                           
                                        <?php  echo '<tr   > <span id="new-specification">' .ucfirst($specification->specifications_name).'</span></tr>'; ?>
                                                                                            
                                                                                        
                                         <?php $hasComma=true; ?> 
                                               
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

        <div class="col-12  pt-lg-4 ">
            <div class="bar "></div>
        </div>
    </section>
    <!--    NEW & FEATURED RESTAURANTS SECTION END-->

    <!--  WHAT REVIEWS ARE SAYING SECTION START  -->

    <section>
        <div class="restaurent_review">
            <?php $k=0?>
            <div id="review{{$k++}}" class="carousel slide " data-ride="carousel ">
                <!-- Indicators -->
                <!-- The slideshow -->
                <div class="carousel-inner">
                    
                    
                    <div  id="wrap">

                        <div class="float-container">

                            <div class="float-child1">
                                
                            </div>
                            <div class="float-child2">
                                <div class="section-title-header ">
                                    <h4 class="section-title ">WHAT REVIEWS ARE SAYING</h4>
                                 </div>
                            </div>
                            
                            <div class="float-child3">
                                <div class=" text-right ">
                                    
                                    <a class="left carousel-control text-center" href="#review{{$k-1}}" data-slide="prev"><span class="glyphicon glyphicon-chevron-left" ><i class="fas fa-arrow-left "></i></span></a>
                                    <a class="right carousel-control text-center" href="#review{{$k-1}}" data-slide="next"><span class="glyphicon glyphicon-chevron-right"><i class="fas fa-arrow-right "></i></span>
    
                                    </a>
                                </div>
                            </div>
                            
                          </div>
                          <div id="main1">
                          
                          </div>
                       
                    </div>

                

                   

                    <?php $outer_index = 0;?>
                    <?php
                   
                    $active="active";
                    for($i = 0; $i < count($reviews);) {

                        if($i>2){$active=" ";}
                     ?>

                    <?php 
                                                
                                            
                    $reviews_id = $arrays[$outer_index]['review_id'];


                    ?>
                    @foreach((array)$reviews_id as $review_id)
                    <div class="carousel-item {{$active}} ">           
                            <div class="row pb-lg-3 ">
                                <?php
                                $j = min($i + 3, count($reviews)) ;
                                for(; $i < $j; $i++) { 
                                 ?>

                              
                               
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4 ">

                                    <div class="bg-review ">
                                        <div class="row ">
                                         
                                            <?php 
                                            $index=0;
                                            $images = $arrays[$outer_index]['images'];
                    
                                            ?>
                                            @foreach((array)$images as $image)
                                            <?php  if ($index == 0){?>
                                      
                                             {{-- @if($review_id==$reviews[$i]->id) --}}
                                            <div class="item-thumb col-lg-7 pr-2 restaurent_body">
                                                <a class="hover-effect " href="">
                                                    <img class="review-img-fluid  img-fluid" src="{{ asset('assets') }}/{{$image}}" alt=" ">
                                                </a>
                                                {{-- {{$review_id}}{{$reviews[$i]->id}} --}}
                                            </div>
                                            {{-- @endif --}}
                                           
                                            <?php
                                                }
                                                 $index++;
                                                ?>
                                            @endforeach

                                            <div class="pricin-list col-md-12 col-lg-12 col-xl-4 ">
                                                <div class="review-address  ">
                                                    <h6 class="name2">{{$reviews[$i]->rest_name}}</h6>

                                                    <?php 
                                                    $hasComma = false;
                                                    ?>
                                                    @foreach($specifications as $specification)
                                                      @if($specification->rest_id==$reviews[$i]->rest_id)
                                                      <?php 
                                                      if ($hasComma){ 
                                                         echo ","; 
                                                     }?>
                                       
                                                    <?php  echo '<span>' .ucfirst($specification->specifications_name).'</span>'; ?>
                                                                                                        
                                                                                                    
                                                        <?php $hasComma=true;?> 
                                                           
                                                       @endif
                                                    @endforeach
                                                    
                                                </div>

                                            </div>
                                        </div>

                                        <div class="item ">
                                            <div class="pricin-list pb-2 ">
                                                <div class="description container">
                                                    <p>
                                                        {{$reviews[$i]->review_content}}... <span>more</span>
                                                    </p>
                                                </div>

                                            </div>
                                        </div>


                                        <div class="container pb-4 ">
                                            <div class="d-flex  ">
                                                <div class="p-2 bd-highlight"><div >
                                                    <img width="50 " height="45 " src="{{ asset('assets') }}/images/client_1.png " alt=" ">
                                                </div></div>
                                                <div class="p-2 bd-highlight">
                                                    @foreach($users as $user)
                                                     @if($user->id == $reviews[$i]->user_id)
                                                    <span><p class="name "><span class="u-name">{{$user->first_name}}  {{$user->last_name}}</span> </span><br>
                                                        <span><i class="fa fa-star checked "></i>&nbsp<i class="fa fa-star checked "></i>&nbsp<i class="fa fa-star checked "></i>&nbsp<i class="fa fa-star checked
                                                    "></i>&nbsp<i class="fa fa-star checked "></i> </p></span>
                                                    @endif
                                                    @endforeach
                                                </div>
                                               
                                              </div>
                    
                                        </div>



                                    </div>


                                </div>
                            
                                <?php }  ?>





                            </div>
                    
                       
                      
                        
                      
                     
                    </div>
                    @endforeach
                    <?php $outer_index++;?>
                    <?php }  ?>
                
                 
                  
                 
               
                </div>
             
           
            </div>

            
           

        </div>


        <div class="col-12 ">
            <div class="bar "></div>
        </div>
    </section>

    <!--  WHAT REVIEWS ARE SAYING SECTION END -->



    <!--  ALL RESTAURANTS  CATEGORY AREA SECTION START -->

    <section >

        @php
        $k=1;
        @endphp
        @foreach($food_types as $food_type ) 
        @foreach($restaurants as $restaurant ) 
        @if($food_type->id==$restaurant->food_type_id )
          <div class="delivery_restaurent">

            <div id="delivery{{$k++}}" class="carousel slide " data-ride="carousel ">
                <!-- Indicators -->
                <!-- The slideshow -->
                <div class="carousel-inner">
                 



                    <div  id="wrap">
                        <div class="float-container">

                            <div class="float-child1">
                               
                            </div>
                            <div class="float-child2">
                                <div class="section-title-header ">
                                    <h4 class="section-title ">{{ strtoupper($food_type['name'])}}  DELIVERY IN DHAKA CITY AREA</h4>
                                 </div>
                            </div>
                            
                            <div class="float-child3">
                                <div class=" text-right ">
                                    <a class="left carousel-control text-center " href="#delivery{{$k-1}}" data-slide="prev"><span class="glyphicon glyphicon-chevron-left" ><i class="fas fa-arrow-left "></i></span></a>
                                    <a class="right carousel-control text-center " href="#delivery{{$k-1}}" data-slide="next"><span class="glyphicon glyphicon-chevron-right"><i class="fas fa-arrow-right "></i></span>
    
                                    </a>
                                </div>
                            </div>
                            
                          </div>
                        <div id="main1">
                           
                          </div>
                       
                    </div>

                   

                    
               


                    <?php
                    $active="active";
                    $p = 0;
                    for($i = 0; $i < count($restaurants);) {
                        if($p>2){$active=" ";}
                     ?>
                    <div class="carousel-item {{$active}} ">
                        <div class="row ">

                            <?php
                            // $j = min($p + 3, count($data)) ;
                            $j = $p;
                            for(; $p < ($j + 3) && $i < count($restaurants); $i++) {
                            ?>  

                               
                            @if($restaurants[$i]->food_type_id== $food_type['id'])
                            <?php
                            $p++;
                            ?>  
                            
                            
                                <div class="col-lg-4 col-md-6 col-12 col-sm-6 restaurent_body">
                                    <div class="property-main ">
                                        <div class="property-wrap ">
                                            <div class="property-item ">
                                               @if($restaurants[$i]->status==0) 
                                               <a href="/restaurant/{{$restaurants[$i]->route_url}}">
                                                <div class="item-thumb ">
                                                    @if($restaurants[$i]->delivery_status==1)
                                                    <div class="text-block ">
                                                       
                                                        <p>Free Delivery</p>
                                                     
                                                    </div>
                                                    @endif
                                                    <div class="images">
                                                        <img  class="free-delivery" src="{{ asset('assets') }}{{$restaurants[$i]->rest_image}} " alt=" ">

                                                    </div>
                                                </div>
                                                </a>
                                                @elseif($restaurants[$i]->status==2)
   
                                                <a class="hover-effect "href="/restaurant/{{$restaurants[$i]->route_url}}">
                                                    <div class="dark-image">
                                                        <img class="img-fluid image " src="{{ asset('assets') }}{{$restaurants[$i]->rest_image}} " alt=" ">
                                            
                                                        <div class="image__overlay image__overlay--primary">
                                                            
                                                            <p class="image__description">
                                                                Currently Unavailable
                                                            </p>
                                                        </div>
                                                    </div>

                                             
                                                  </a>

                                                  @elseif($restaurants[$i]->status==2)

                                                 <a class="hover-effect " href="/restaurant/{{$restaurants[$i]->route_url}}">
                                                    <div class="dark-image">
                                                        <img class="img-fluid image " src="{{ asset('assets') }}{{$restaurants[$i]->rest_image}} " alt=" ">
                                            
                                                        <div class="image__overlay image__overlay--primary">
                                                            
                                                            <p class="image__description">
                                                                Opens at 4.40 pm
                                                            </p>
                                                        </div>
                                                    </div>

                                             
                                                   </a>
                                                   @endif

                                                <div class="col-6">
                                                    
                                                </div>
                                                <div class="item-body">

                                                    @foreach($avg_reviews as $avg_review)
                                                    @if($avg_review->rest_id==$restaurants[$i]->id)
                                                    <?php
                                                    $avg=$avg_review->single_rating_sum/$avg_review->single_rating_count;
                                                     if($avg>=4.5){
                                                    ?>
                                                   <div id="active_level" class="float-right review-rate pt-1 ">
                                                      
                                                       <span>{{  number_format((float)$avg, 1, '.', ''); }} </span>
                                                   </div>
                                                   <?php }else{?>

                                                    <div class="float-right review-rate pt-1 ">
                                                        <span>{{  number_format((float)$avg, 1, '.', ''); }} </span>
                                                    </div>

                        
                                                   <?php }?>
                                                   @endif
                                                   @endforeach
                                                    {{-- <div id="active_level" class="float-right review-rate pt-1 ">
                                                        <span>4.5</span>
                                                    </div> --}}
                                                
                                                    <h6 class="featured-title ">{{$restaurants[$i]->rest_name}}</h6>

                                                    <div class="pricin-list  ">
                                                        <div class="property-price service_name" >
                                                            <table>
                                                                <?php 
                                                                $hasComma = false;

                                                                ?>
                                                                @foreach($services as  $service)
                                                                
                                    
                                                                @if($service->rest_id==$restaurants[$i]->id)
                                                              
                                                                    <?php 
                                                                    if ($hasComma){ 
                                                                    echo ","; 
                                                                    }?>
                                                               
                                                                <?php  echo '<tr class="service_name">'.ucfirst($service->name).'</tr>'; ?>
                                                                    
                                                                
                                                                <?php $hasComma=true; ?> 
                                                            
                                                                    @endif
                                                                @endforeach
                                                            </table>
                                                                
                                                    
                                                        </div>

                                                    </div>
                                                    
                                                

                                                </div>



                                            </div>

                                            
                                        </div>
                                    </div>

  

                                    <div class="pricin-list ">
                                        <div class="bottom-title  ml-2 pb-3">
                                            <?php 
                                            $hasComma = false;
                                            ?>
                                            @foreach($specifications as $specification)
                                            @if($specification->rest_id==$restaurants[$i]->id)
                                            <?php 
                                            if ($hasComma){ 
                                                echo '<sub class="comma">'.",".'</sub>'; 
                                            }?>

                                            <?php  echo '<tr   > <span id="new-specification">' .ucfirst($specification->specifications_name).'</span></tr>'; ?>
                                                                                                
                                                                                            
                                                <?php $hasComma=true; ?> 
                                                
                                                @endif
                                                @endforeach
                                        </div>

                                    </div>
                                
                                </div>

                        
                            @endif 

                            <?php }   ?>
                      
                           

                        </div>
                    </div>
                 
                   
                    <?php }   ?>

                </div>

            </div>
         </div>
         <div class="col-12 ">
            <div class="bar "></div>
         </div>
         @break
        @endif
        @endforeach
        @endforeach
    </section>

<!--  ALL RESTAURANTS  CATEGORY AREA SECTION END -->





@endsection


@section('footer')
  <!-- Site footer -->
@include('frontend.auth.footer.footer')

<script src="{{ asset('assets') }}/js/jquery-3.6.0.min.js"></script>
<script src="{{ asset('assets') }}/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>




@endsection