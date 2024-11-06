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
        <br><br>

        <section>
        <div class="container my-5">
            <div class="row">
                <div class="col-md-12">
                    <div id="paqueteCarousel1" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($paquetes->chunk(2) as $index => $paqueteChunk)
                                <div class="carousel-item @if ($index == 0) active @endif">
                                    <div class="row">
                                        @foreach ($paqueteChunk as $paquete)
                                            <div class="col-md-6">
                                                <div class="card">
                                                    @if ($paquete->promocion)
                                                        <div class="new-tag">{{ $paquete->nombre_paquete }}</div>
                                                    @endif
                                                    <div class="megabytes">{{ $paquete->velocidad_paquete }}<span> Mbps</span></div>
                                                    <div class="price">${{ $paquete->precio }}<span>/mes</span></div>
                                                    <div class="includes">
                                                        <p>Incluye:</p>
                                                        <div class="item">
                                                            <img src="images/icon.png" alt="icon">
                                                            <div class="item-title">{{ $paquete->caracteristicas_paquete }}</div>
                                                        </div>
                                                    </div>
                                                    <a class="button" href="{{ route('seleccionarPaquete', ['id_nombre_paquete' => $paquete->id_nombre_paquete]) }}">Contratar</a>
                                                    <p></p>
                                                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#infoModal{{ $loop->parent->index }}{{ $loop->index }}">
                                                        Más información
                                                    </button>
                                                </div>
                                            </div>


            <!-- Slides -->
            <div class="carousel-inner">
                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <img src="https://via.placeholder.com/1600x600" class="d-block w-100" alt="Internet Rápido">
                    <div class="carousel-caption d-md-block">
                        <h3>Conectat - Internet a Velocidad Máxima</h3>
                        <p>Disfruta de conexión estable y rápida para todas tus necesidades.</p>
                        <a href="#contratanos" class="btn btn-primary">Contrátanos</a>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item">
                    <img src="https://via.placeholder.com/1600x600" class="d-block w-100" alt="Cobertura Nacional">
                    <div class="carousel-caption d-md-block">
                        <h3>Conectat - Cobertura en Todo el País</h3>
                        <p>Siempre conectados, sin importar dónde te encuentres.</p>
                        <a href="#cobertura" class="btn btn-primary">Ver Cobertura</a>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-item">
                    <img src="https://via.placeholder.com/1600x600" class="d-block w-100" alt="Soporte 24/7">
                    <div class="carousel-caption d-md-block">
                        <h3>Soporte 24/7</h3>
                        <p>En Conectat, estamos aquí para ayudarte en todo momento.</p>
                        <a href="#soporte" class="btn btn-primary">Contáctanos</a>
                    </div>
                </div>
            </div>

            <!-- Controles -->
            <button class="carousel-control-prev" type="button" data-bs-target="#conectatSlider" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#conectatSlider" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Siguiente</span>
                </button>
        </div>

        <!-- Services-->
        <section id="paquetes_section" class="paquete-slider-section">
        <div class="text-center">
                    <h2 class="section-heading text-uppercase">Services</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
            <div class="container">
                
                <div class="row text-center">
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">E-Commerce</h4>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Responsive Design</h4>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Web Security</h4>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                    </div>
                </div>
            </div>
        </section>

        
        <section class="pricing py-5">
    <div id="paqueteSlider" class="carousel slide">
        <div class="carousel-inner">
            @foreach($paquetes->chunk(3) as $index => $paqueteChunk)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <div class="d-flex justify-content-center">
                        @foreach($paqueteChunk as $paquete)
                            <div class="card mx-2">
                                <img src="{{ $paquete->imagen }}" class="card-img-top" alt="{{ $paquete->nombre }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $paquete->nombre_paquete }}</h5>
                                    <p class="card-text">{{ $paquete->descripcion }}</p>
                                    <p>Precio: ${{ $paquete->precio }}</p>
                                    <ul class="fa-ul">
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span>Single User</li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span>5GB Storage</li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Public Projects</li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span>Community Access</li>
                                        <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Unlimited Private Projects</li>
                                        <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Dedicated Phone Support</li>
                                        <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Free Subdomain</li>
                                        <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Monthly Status Reports</li>
                                    </ul>
                                    <a href="#" class="btn btn-primary">Contrátanos</a>

                                            <!-- Modal para más información -->
                                            <div class="modal fade" id="infoModal{{ $loop->parent->index }}{{ $loop->index }}" tabindex="-1" aria-labelledby="infoModalLabel{{ $loop->parent->index }}{{ $loop->index }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="infoModalLabel{{ $loop->parent->index }}{{ $loop->index }}">{{ $paquete->nombre_paquete }}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p><strong>Velocidad:</strong> {{ $paquete->velocidad_paquete }} Mbps</p>
                                                            <p><strong>Precio:</strong> ${{ $paquete->precio }}/mes</p>
                                                            <p><strong>Características:</strong> {{ $paquete->caracteristicas_paquete }}</p>
                                                            @if($paquete->promocion)
                                                                <p><strong>Promoción:</strong> {{ $paquete->promocion->promocion }}%</p>
                                                            @endif
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                            @endforeach
                        </div>

                        <!-- Controles del carrusel -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#paqueteCarousel1" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Anterior</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#paqueteCarousel1" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Siguiente</span>
                        </button>
                    </div>
                </div>
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
          
       
      
        <script src="{{ asset('js/user.js') }}"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>


        <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</html>
