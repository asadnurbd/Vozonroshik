
@extends('frontend.master')

@section('title')
 VozonRoshik | Category
@endsection


@section('header')
  <!--  Header section -->
  <section class="category-header">

    <div class="container-fluid  ">
      
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
                        <li class="nav-item" >
                            <a class="nav-link active" href="/register"><span> <img class="sign-up-logo"src="{{ asset('assets') }}/images/sign_up.png"> Register<span></a>
                          </li>
                          <li class="nav-item">   
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



        <div class="container sub-search ">
            <br/>

            <form  action="/restaurant-search" method="get" >
                @csrf
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
 <!--  Round gallery section start -->
 <section >
        <div class="roundgallery">
        <div class="container-fluid " >
            
            <div id="gallery" class="carousel slide " data-ride="carousel" >
                <!-- Indicators -->
                <!-- The slideshow -->
                <?php
                   
                $carousel_inner=" ";
                for($l = 0; $l < count($all_food_type);$l++){

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
                    for($i = 0; $i < count($all_food_type);) {
    
                        if($i>5){$active=" ";}
                        
                     ?>
                     
                    
                        <div class="carousel-item {{$active}}">
                        
                        <div class="row"  >
                            
                            <?php
                             for($j=min($i+5,count($all_food_type));$i<$j;$i++){
                           
                             ?>    <div  style="align-items: center;margin:auto;">                     
                                    <div class=" item text-center"   >
                                        <a class="hover-effect " href="/category/item/{{$all_food_type[$i]->permalink}}">

                                            <img  width="230" height="230" src="{{ asset('assets') }}{{$all_food_type[$i]->image}}" alt=" ">
                                        </a>
                                        <p class="pizza_name  ">{{$all_food_type[$i]->name}}</p>
                                     
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


    </section>

 




    <!--  BANGLA RESTAURANTS IN DHAKA CITY SECTION START -->
    <section class="category_section">
       
        
        @php
        $k=1;
        @endphp

        <?php 
        $line = false;
        ?>
     @foreach($food_types as $food_type ) 
    
       
     <div class="col-12 pt-lg-4 pb-5">
        <div class="bar "></div>
     </div> 
        
      <div class="loaddata pt-2">
        <div class="delivery_restaurent">  
            <div id="bangla_restaurent{{$k++}} " class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <!-- The slideshow -->
                <div class="carousel-inner categoy">
                    
                    <div class="row header_title ">
                        <div class="col-md-7 col-lg-7 col-xl-7 col-6 title ">
                            <div class="section-title-header text-center ">

                                <h4 class="section-title ">{{ strtoupper($food_type['name'])}} </h4>
                            </div>


                        </div>
                       

                    </div>

                    

                <?php
                $active="active";
                $p = 0;
                for($i = 0; $i < count($data);) {
                    if($p>2){$active=" ";}
                 ?>

                
                <div class="carousel-item {{$active}}">

                <div class="row ">
            
                    <?php
                    
                    $j = $p;
                    for(; $p < ($j + 3) && $i < count($data); $i++) {
                    ?>  

                    
                    
                    @if($data[$i]->food_type_id== $food_type['id'])
                        <?php
                        $p++;
                        ?>     
  
                        <div class="col-lg-4 col-md-6 col-12 col-sm-6 restaurent_body">
                            <div class="property-main ">
                                <div class="property-wrap ">
                                    <div class="property-item ">
                                        <a class="hover-effect" href="/restaurant/{{$data[$i]->route_url}}">
                                            <div class="dark-image">
                                                <img class="img-fluid image " src="{{ asset('assets') }}{{$data[$i]->rest_image}}" alt=" ">
                                    
                                                <div class="image__overlay image__overlay--primary">
                                                    
                                                    <p class="image__description">
                                                        Opens at 4.40 pm
                                                    </p>
                                                </div>
                                            </div>

                                    
                                        </a>
                                    

                                        <div class="col-6">
                                            
                                        </div>
                                        <div class="item-body">

                                        
                                            @foreach($avg_reviews as $avg_review)
                                            @if($avg_review->rest_id==$data[$i]->id)
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
                                        
                                            <h6 class="featured-title ">{{$data[$i]->rest_name}}</h6>

                                            <div class="pricin-list  ">
                                                <div class="property-price service_name" >
                                                    <table>
                                                        <?php 
                                                        $hasComma = false;

                                                        ?>
                                                        @foreach($services as  $service)
                                                        
                            
                                                        @if($service->rest_id==$data[$i]->id)
                                                    
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
                                    @if($specification->rest_id==$data[$i]->id)
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

                  
                <?php }  ?>

               

                </div>
                
                
                <div class="col-12 mt-lg-4 ">
                    <div class="text-center c_view ">
                        <a class="left carousel-control" href="#bangla_restaurent{{$k-1}} " data-slide="prev"><span class="glyphicon glyphicon-chevron-left" ><i class="fas fa-arrow-left "></i></span></a>
    
                          <a class="right carousel-control" href="#bangla_restaurent{{$k-1}} " data-slide="next"><span class="glyphicon glyphicon-chevron-right"><i class="fas fa-arrow-right "></i></span><span class="view_btn ">
                               
                            <?php for($i = 0; $i < count($data);$i++) { ?>
                                @if($data[$i]->food_type_id== $food_type['id'])
                              <a href="/category/item/{{$data[$i]->permalink}}">View All Restaurants</a> 
                                @break;
                                @endif
                            <?php }?>
                            
                            </span>
                        </a>
                        
                    </div>
                </div>
               
            </div>
           
        </div>
      
        <?php 
        if ($line){ 
         
        // echo '" <div class="col-12 pt-lg-4 pb-5">
        //     <div class="bar "></div>
        // </div>"'; 
        }else{?>
          
        <?php echo '';} ?>
        
    
       <?php $line=true; ?> 

      </div>
  
    @endforeach 

    





        <div class="  text-center big-btn  category-btn ">

            <button type="button " class="btn px-btn px-btn-theme text-light  loadmorebtn">View More Cuisine</button>


        </div>

    </section>




@endsection


@section('footer')

    <!-- Site footer -->
    @include('frontend.auth.footer.footer')
  
    <script src="{{ asset('assets') }}/js/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <script>
        $(".loaddata").slice(0,2).show();
        $(".loadmorebtn").on("click",function(){
          $(".loaddata:hidden").slice(0,4).show();
          if($(".loaddata:hidden").length==0) {
              $(".loadmorebtn").fadeOut();
          } 
        })
    </script>
@endsection