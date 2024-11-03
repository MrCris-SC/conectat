<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />


        <title>Catalogo-Paquetes</title>
        <link href="{{ asset('css/userStyles.css') }}" rel="stylesheet">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
       

        <!-- Font Awesome icons (free version)-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        
    </head>
    <body id="page-top">
        
       
        
        <header>

            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                <div class="carousel-item active" style="background-image: url('https://th.bing.com/th/id/OIP.ly8kVsydNS1RFCnQ_ogANAHaDt?rs=1&pid=ImgDetMain')">
                    <div class="carousel-caption">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item" style="background-image: url('https://source.unsplash.com/wfh8dDlNFOk/1920x1080')">
                    <div class="carousel-caption">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>
                <div class="carousel-item" style="background-image: url('https://source.unsplash.com/lHGeqh3XhRY/1920x1080')">
                    <div class="carousel-caption">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                    </div>
                </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
                </button>
            </div>
        </header>
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="{{ url('/user') }}" >Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/user') }}">Planes de Internet</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/paquetePromocion') }}">Promociones</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/acercaNosotros')}}">Acerca de</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/contacto')}}">Contáctanos</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <section>
            <div class="diseñopaquetes">
                <div class="carousel-container">
                    <div class="carousel">
                        @foreach ($paquetes as $paquete)
                            <div class="card">
                                @if ($paquete->promocion)
                                    <div class="new-tag">{{ $paquete->nombre_paquete }}</div>
                                @endif
                                <div class="megabytes">{{ $paquete->velocidad_paquete }}<span></span></div>
                                <div class="price">${{ $paquete->precio }}<span>/month</span></div>
                                <div class="includes">
                                    <p>Includes:</p>
                                    <div class="item">
                                        <img src="images/icon.png" alt="icon" style="width: 20px; vertical-align: middle;">
                                        <div class="item-title">{{ $paquete->caracteristicas_paquete }}</div>
                                    </div>
                                </div>
                                <a class="button" href="{{ route('seleccionarPaquete', ['id_nombre_paquete' => $paquete->id_nombre_paquete]) }}">Contratar</a>
                            </div>
                        @endforeach
                    </div>
        
                    <!-- Botones de navegación -->
                    <button class="carousel-button left" onclick="prevSlide()">&#10094;</button>
                    <button class="carousel-button right" onclick="nextSlide()">&#10095;</button>
                </div>
            </div>
        </section>
       
        {{-- ***********************************************************************************footer --}}
        <footer>
            <div class="footer-container">
                <p>&copy; 2024 Tu Nombre. Todos los derechos reservados.</p>
                <ul class="footer-links">
                    <li><a href="#">Política de Privacidad</a></li>
                    <li><a href="#">Términos de Servicio</a></li>
                    <li><a href="#">Contacto</a></li>
                </ul>
                <div class="support">
                    <p>Soporte: <a href="tel:+1234567890">+1 234 567 890</a></p>
                </div>
                <div class="social-media">
                    <a href="#" class="social-icon">Facebook</a>
                    <a href="#" class="social-icon">Twitter</a>
                    <a href="#" class="social-icon">Instagram</a>
                </div>
            </div>
        </footer>
          
       
      
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    
        
    </body>

</html>
