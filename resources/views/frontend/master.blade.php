<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @yield('title') </title>

    @include('frontend.include.assets')
    <style>

.w3-col.w3-container.w3-green {
  display: flex;
  align-items: center;
  margin: auto;
}
.w3-row {
  border: 1px solid #aaa;
}
    </style>
</head>



<body>

    <!--  Header section -->
    @yield('header')
    <!--  Header section end -->

    {{-- main  content section start --}}
    @yield('main_container')

    {{-- main  content section end --}}


    <!-- Site footer -->
    @yield('footer')

 

 
    

    
</body>

</html>