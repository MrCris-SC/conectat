<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />


        <title>Catalogo-Paquetes</title>

        <link href="{{ asset('css/userStyles2.css') }}" rel="stylesheet">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
       

        <!-- Font Awesome icons (free version)-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        


    </head>
    <body id="page-top">
    <nav class="navbar navbar-expand-lg mb-4 top-bar navbar-static-top sps sps--abv">
        <div class="container">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse1" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand mx-auto" href="#">Gra<span>freez</span></a>
      <div class="collapse navbar-collapse" id="navbarCollapse1">
        <ul class="navbar-nav ml-auto">
         <li class="nav-item active"> <a class="nav-link" href="#myCarousel">Home <span class="sr-only">(current)</span></a> </li>
        <li class="nav-item"> <a class="nav-link" href="#benefits">Benefits</a> </li>
        <li class="nav-item"> <a class="nav-link" href="#about">About</a> </li>
        <li class="nav-item"> <a class="nav-link" href="#blog">Blog</a> </li>
        <li class="nav-item"> <a class="nav-link" href="#gallery">Image Gallery</a> </li>
        <li class="nav-item"> <a class="nav-link" href="#contact">Contact</a> </li>
        </ul>
      </div>
            </div>
    </nav>

<!-- Swiper Silder
    ================================================== --> 
<!-- Slider main container -->
<div class="swiper-container main-slider" id="myCarousel">
  <div class="swiper-wrapper">
    <div class="swiper-slide slider-bg-position" style="background:url('https://cdn.pixabay.com/photo/2017/08/06/00/27/yoga-2587066_960_720.jpg')" data-hash="slide1">
      <h2>It is health that is real wealth and not pieces of gold and silver</h2>
    </div>
    <div class="swiper-slide slider-bg-position" style="background:url('https://cdn.pixabay.com/photo/2017/08/07/14/02/people-2604149_960_720.jpg')" data-hash="slide2">
      <h2>Happiness is nothing more than good health and a bad memory</h2>
    </div>
  </div>
  <!-- Add Pagination -->
  <div class="swiper-pagination"></div>
  <!-- Add Navigation -->
  <div class="swiper-button-prev"><i class="fa fa-chevron-left"></i></div>
  <div class="swiper-button-next"><i class="fa fa-chevron-right"></i></div>
</div>
          
       
<script src="{{ asset('js/carousel.js') }}"></script>
    
    
        
    </body>

</html>
