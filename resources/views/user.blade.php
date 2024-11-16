<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />


        <title>Catalogo-Paquetes</title>

        <link href="{{ asset('css/userStyles2.css') }}" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
    </head>
    <body id="page-top">
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="{{ url('/user') }}"onclick="verificarDatos(event)" >Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/paquetePromocion') }}" >Planes de Internet</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/paquetePromocion') }}">Promociones</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/acercaNosotros')}}">Acerda de</a></li>                       
                        <li class="nav-item"><a class="nav-link" href="{{ url('/contacto')}}">Contactanos</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <br><br><br><br>

        <div id="conectatSlider" class="carousel slide" data-bs-ride="carousel">
            <!-- Indicadores -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#conectatSlider" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#conectatSlider" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#conectatSlider" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>

            <!-- Slides -->
            <div class="carousel-inner">
                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <img src="{{ asset ('images/hader.jpg') }}" class="d-block w-100" alt="Internet Rápido">
                    <div class="carousel-caption d-md-block">
                        <h3>Conectat - Internet a Velocidad Máxima</h3>
                        <p>Disfruta de conexión estable y rápida para todas tus necesidades.</p>
                        <a href="#contratanos" class="btn btn-primary">Contrátanos</a>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item">
                    <img src="{{ asset ('images/header2.jpg') }}" class="d-block w-100" alt="Cobertura Nacional">
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
            <div id="paqueteSlider" class="carousel slide" >
            <div class="carousel-inner">
            @foreach($paquetes->chunk(3) as $index => $paqueteChunk)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <div class="d-flex justify-content-center">
                        @foreach($paqueteChunk as $paquete)
                            <div class="card mx-2">
                                <img src="{{ $paquete->imagen }}" class="card-img-top" alt="{{ $paquete->nombre }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $paquete->nombres_paquetes }}</h5>
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
                                    <a href="{{ route('seleccionarPaquete', ['id_nombre_paquete' => $paquete->id_nombre_paquete]) }}" class="btn btn-primary">Contrátanos</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
            
                <!-- Controles manuales -->
                <button class="carousel-control-prev" type="button" data-bs-target="#paqueteSlider" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
            
                <button class="carousel-control-next" type="button" data-bs-target="#paqueteSlider" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Siguiente</span>
                </button>
            </div>            
        </section>



            
    <footer>

        <!--Pie de pagina donde se encuentra el footer css-precontrato-->
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
       

    

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Bootstrap core JS-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>


    </body>

</html>
