
@extends('frontend.master')

@section('title')
 VozonRoshik |  Sub Category
@endsection


@section('header')



  <!--  Header section -->
  <section class="sub-category-header">
    <div class="container-fluid ">
        <nav class="navbar navbar-expand-lg navbar-dark  static-top header-section">
            <div class="container-fluid ">
                <a class="navbar-brand  " href="/">
                    <img src="{{ asset('assets') }}/images/logo.png">
                </a>

                 @if (Auth::guest())
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  
               
              <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav  nav-pills  ml-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="/register">Create Account</a>
                      </li>
                  
                  <li class="nav-item" data-toggle="pill" >   
                    <a class="nav-link  sign-in-link"   data-toggle="modal" data-target="#exampleModal" href="#" data-toggle="modal" data-target="#exampleModal">Sign In</a>
                  </li>
                 
                </ul>
              

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
            </div>
          </nav>
        <!-- sign in section -->
        @include('frontend.auth.login')

        <div class="container cateory-search ">
            <br/>

            <form  action="/restaurant-search" method="get" >
             
            <div class="wrapper">
                <input style="border:none"  type="text" class="input" name="search"
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

   <!--  SINGLE PAGE  RESTAURANTS IN DHAKA CITY SECTION START -->
   <section >
    <div class="sub-category-body">
        <div class="row">
            <div class="col-xl-2  col-lg-2 col-md-2  order-xs-12 mt-lg-5 order-md-2 order-lg-2 pt-5">

                <div class="property-main " >
                    <div class="property-wrap" id="sidebar-body">
                        <div class="sidebar" >
                            <div class="card  home-box1 "  >
                          
                                <h6>Find Restaurants Near You </h6>
                                <div class="card-body card-border ">
                                    <div class="form-group has-search search-area ">
                                        <input type="text"  id="search" class="form-control2 " placeholder="Enter Your Area ">
                                    </div>
    
                                    {{-- <iframe class="mt-3 " width="270 " height="260 " frameborder="0 " scrolling="no " marginheight="0 " marginwidth="0 " id="gmap_canvas " src="https://maps.google.com/maps?width=250&amp;height=250&amp;hl=en&amp;q=%20+()&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed "></iframe> --}}
    
                                </div>
                            </div>
    
             
                            <div class="card  home-box2 ">
                                <h6>Top Restaurants </h6>
                                <div class="card-body card-border ">

                                     <div class="d-flex flex-row bd-highlight ">
                                        <div class="p-2 ">  <img width="50" height="50"src="{{ asset('assets') }}/images/single/logo.jpg" alt="..." class="img-thumbnail"></div>
                                        <div class="p-2 "> <p class="top-rest-txt">Kebab Factory (Uttara, Dhaka)</p> </div>
                                        <div class="p-2 "> <p class="top-rest-txt"> Uttara, Dhaka</p></div>
                                       
                                      </div>
                                     <div class="d-flex flex-row bd-highlight">
                                        <div class="p-2 ">  <img width="50" height="50"src="{{ asset('assets') }}/images/single/logo.jpg" alt="..." class="img-thumbnail"></div>
                                        <div class="p-2 "> <p class="top-rest-txt">Sultans’ Dine (Jhigatola)</p> </div>
                                        <div class="p-2 "> <p class="top-rest-txt"> Uttara, Dhaka</p></div>
                                       
                                      </div>
                                     <div class="d-flex flex-row bd-highlight">
                                        <div class="p-2 ">  <img width="50" height="50"src="{{ asset('assets') }}/images/single/logo.jpg" alt="..." class="img-thumbnail"></div>
                                        <div class="p-2 "> <p class="top-rest-txt">Kacchi Bhai (Mirpur-10)</p> </div>
                                        <div class="p-2 "> <p class="top-rest-txt"> Uttara, Dhaka</p></div>
                                       
                                      </div>
                                 
    
                                </div>
                            </div>
                            <div class="card  home-box3 ">
                                <h6>Trending </h6>
                                <div class="card-body card-border ">

                                     <div class="d-flex flex-row bd-highlight mb-3">
                                        <div class="p-2 ">  <img width="50" height="50"src="{{ asset('assets') }}/images/single/logo.jpg" alt="..." class="img-thumbnail"></div>
                                        <div class="p-2 "> <p class="top-rest-txt">Kebab Factory (Uttara, Dhaka)</p> </div>
                                        <div class="p-2 "> <p class="top-rest-txt"> Uttara, Dhaka</p></div>
                                       
                                      </div>
                                 
    
                                </div>
                            </div>
                      
                            <div class="card home-box3 mt-3 ">

                                <div class=" card-body card-border pt-lg-4 ">
                         
    
                                      
                                 
                                            <div class=" d-flex justify-content-center mb-3">
                                               
                                                <div class="grid">
                                                  @foreach($food_types as $food_type)
                                                    <div class="cell">{{$food_type->name}}</div>
                                                   
                                                    @endforeach 
                                                  </div>
                                                
                                              </div>
                                                
                                               
                                               
                                           
                                          
                                        
    
    
                                </div>
                            </div>
                      
                        </div>
                            
                         

                   
                   
                   


                      

                    </div>
                </div>


            </div>
          

            <div class="col-xl-8 col-lg-7 col-md-6 col-xs-12 ml-lg-4 order-lg-1 ">

                <!-- Sub-Category section -->
                <div class="container gallery_container ">
                    <div  class="cotainer menu_container   ">
                        {{-- <div id="search_result"></div> --}}
                        <?php 
                        $line = false;
                        ?>
                        @foreach($restaurants as $restaurant)
                        <div class="load">
                       <div id="menu_container"  class="row mt-lg-4 pb-lg-2  ">
                    
                          <?php 
                          if ($line){ 
                         
                           echo '<div class="col-12 pt-lg-4 mr-lg-5 mr-0 pb-5 ">
                            <div class="sub-category-bar  pt-3 "></div>
                           </div>'; 
                          }else{?>
                          
                          <?php echo '';} ?>
                        
                           <?php $line=true; ?> 
                       
                      
                            <div class="col-lg-4 col-md-6 col-xs-6 restaurent_body sub-cat-img">
                                <div class="property-main ">
                                    <div class="property-wrap ">
                                        <div class="property-item ">
                                            <div class="item-thumb ">
                                                <a class="hover-effect shadow " href="/restaurant/{{$restaurant->route_url}}">
                                                    <img class="shadow"width="260" height="260" src="{{ asset('assets') }}{{$restaurant->rest_image}}" alt=" ">
                                                </a>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-5 col-md-10 col-10 col-xs-8 pl-4 pt-md-4 ">

                                <div class="discription-category ">
                                    <div class="discription-menu-title pb-lg-3 ">
                                        <h3>{{$restaurant->rest_name}}
                                        </h3>
                                    </div>
                                    <span><i class="fa fa-star checked_2 "></i>&nbsp;<i class="fa fa-star checked_2 "></i>&nbsp;<i class="fa fa-star checked_2 "></i>&nbsp;<i class="fa fa-star checked_2 "></i>&nbsp;<i class="fas fa-star-half "></i>&nbsp;</span>
                                    </span>
                                    <div class="discription-category-text mt-lg-3 mb-lg-3 ">
                                        <p>{{$restaurant->rest_description}}</p>
                                    </div>

                                    <div class="mb-lg-3 " style="font-style: italic;">

                                        <table>
                                            @foreach($services as $service)
                                              @if($service->rest_id==$restaurant->id)

  
                                            <tr >
                                                <tr ><?php echo $service->name; ?>  &nbsp; </tr>
                                            </tr>
                                            @endif
                                            @endforeach
                                        </table>
                                    
                                    </div>
                                    <a class="view-details" href="/restaurant/{{$restaurant->route_url}}"><button type="button " class="btn btn-link "> View Details</button></a>

                                </div>
                            </div>

                   
                        
                            
                     
                          </div>
                          @endforeach

                        </div>
                       

                    </div>
                   
                </div>
               



                <div class="container gallery_container ">

                    <div class=" text-center sub-review-btn  category-btn ">

                        <button type="button " class="btn px-btn px-btn-theme text-light  loadmore">View More Restaurants</button>


                    </div>




                </div>

            </div>

        </div>
    </div>



</section>


@endsection


@section('footer')
 <!-- Site footer -->
 @include('frontend.auth.footer.footer')


<script src="{{ asset('assets') }}/js/jquery-3.6.0.min.js"></script>
<script src="{{ asset('assets') }}/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script type="text/javascript">
  $(document).ready(function(){  
    $('#search').on('keyup',function(){
        var search = $('#search').val();
      
        $.ajax({

            type:"GET",
            url: '/search-by-location',
            data: {text: $('#search').val()},
            success: function(data) {                
                

                $('#menu_container').html(data);
                console.log(data);

            }



        });
            });

        });
</script>


<script>
  $(".load").slice(0,2).show();
  $(".loadmore").on("click",function(){
    $(".load:hidden").slice(0,2).show();
    if($(".load:hidden").length==0) {
        $(".loadmore").fadeOut();
    } 
  })
</script>


<script type="text/javascript">
var socialFloat = document.querySelector('#social-float');
var footer = document.querySelector('#footer');

function checkOffset() {
  function getRectTop(el){
    var rect = el.getBoundingClientRect();
    return rect.top;
  }
  
  if((getRectTop(socialFloat) + document.body.scrollTop) + socialFloat.offsetHeight >= (getRectTop(footer) + document.body.scrollTop) - 10)
    socialFloat.style.position = 'absolute';
  if(document.body.scrollTop + window.innerHeight < (getRectTop(footer) + document.body.scrollTop))
    socialFloat.style.position = 'fixed'; // restore when you scroll up
  
  socialFloat.innerHTML = document.body.scrollTop + window.innerHeight;
}

document.addEventListener("scroll", function(){
  checkOffset();
});
  
</script>

@endsection