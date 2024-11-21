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
                    <img src="{{ asset ('images/hader.jpg') }}" class="d-none d-sm-block w-100"  alt="Internet Rápido">
                    <img src="{{ asset('images/movil1.png') }}" class="d-block d-sm-none w-100" alt="Cobertura Nacional">
                    <div class="carousel-caption d-md-block">
                        <a href="#contratanos" class="btn btn-primary">Contrátanos</a>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item">
                    <!-- Imagen para dispositivos grandes -->
                    <img src="{{ asset('images/header2.jpg') }}" class="d-none d-sm-block w-100" alt="Cobertura Nacional">
                    <!-- Imagen para dispositivos pequeños -->
                    <img src="{{ asset('images/movil2.png') }}" class="d-block d-sm-none w-100" alt="Cobertura Nacional">
                   
                    <div class="carousel-caption d-md-block">
                        <a href="#cobertura" class="btn btn-primary">Ver Cobertura</a>
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
            <div id="paqueteSlider" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach($paquetes->chunk(1) as $index => $paqueteChunk)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <div class="d-flex justify-content-center flex-wrap">
                                @foreach($paqueteChunk as $paquete)
                                    <div class="card2 mx-2 shadow-lg" style="width: 18rem; border-radius: 15px; overflow: hidden;">                                        <div class="card2-body p-4 text-center">
                                            <h5 class="card2-title text-primary fw-bold">{{ $paquete->nombre_paquete }}</h5>
                                            <p class="card2-text text-muted mb-3">{{ $paquete->descripcion }}</p>
                                            <p class="fw-bold fs-4 text-success">Precio: ${{ $paquete->precio }}</p>
                                            <ul class="fa-ul text-start">
                                                <li><span class="fa-li"><i class="fas fa-check text-success"></i></span>Usuario único</li>
                                                <li><span class="fa-li"><i class="fas fa-check text-success"></i></span>5GB de almacenamiento</li>
                                                <li><span class="fa-li"><i class="fas fa-check text-success"></i></span>Proyectos públicos ilimitados</li>
                                                <li><span class="fa-li"><i class="fas fa-check text-success"></i></span>Acceso a la comunidad</li>
                                                <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Proyectos privados ilimitados</li>
                                                <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Soporte telefónico dedicado</li>
                                            </ul>
                                            <a href="{{ route('seleccionarPaquete', ['id_nombre_paquete' => $paquete->id_nombre_paquete]) }}" class="btn btn-primary rounded-pill px-4 mt-3 shadow">Contrátanos</a>
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
