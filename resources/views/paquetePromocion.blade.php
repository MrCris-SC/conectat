<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Paquetes-Promociones</title>
    <link href="{{ asset('css/userStyles.css') }}" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body id="page-top">

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
              <!-- Logo a la izquierda -->
              <a class="navbar-brand" href="#">
                <img src="{{ asset('images/logonuevo.png') }}" class="logo" alt="Logo">
             </a>


            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/user') }}">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/planesInternet') }}">Planes de Internet</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/promociones') }}">Promociones</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">Acerca de</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contáctanos</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <section>
        <div class="container my-5">
            <div class="row">
                <div class="col-md-6">
                    <div id="paqueteCarousel1" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($paquetes as $index => $paquete)
                                <div class="carousel-item @if ($index == 0) active @endif">
                                    <div class="card">
                                        @if ($paquete->promocion)
                                            <div class="new-tag">{{ $paquete->nombre_paquete }}</div>
                                        @endif
                                        <div class="megabytes">{{ $paquete->velocidad_paquete }}<span></span></div>
                                        <div class="price">${{ $paquete->precio }}<span>/mes</span></div>
                                        <div class="includes">
                                            <p>Incluye:</p>
                                            <div class="item">
                                                <img src="images/icon.png" alt="icon">
                                                <div class="item-title">{{ $paquete->caracteristicas_paquete }}</div>
                                            </div>
                                        </div>
                                        <a class="button" href="{{ route('seleccionarPaquete', ['id_nombre_paquete' => $paquete->id_nombre_paquete]) }}">Contratar</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#paqueteCarousel1" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#paqueteCarousel1" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div id="paqueteCarousel2" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($paquetes as $index => $paquete)
                                <div class="carousel-item @if ($index == 0) active @endif">
                                    <div class="card">
                                        @if ($paquete->promocion)
                                            <div class="new-tag">{{ $paquete->nombre_paquete }}</div>
                                        @endif
                                        <div class="megabytes">{{ $paquete->velocidad_paquete }}<span></span></div>
                                        <div class="price">${{ $paquete->precio }}<span>/mes</span></div>
                                        <div class="includes">
                                            <p>Incluye:</p>
                                            <div class="item">
                                                <img src="images/icon.png" alt="icon">
                                                <div class="item-title">{{ $paquete->caracteristicas_paquete }}</div>
                                            </div>
                                        </div>
                                        <a class="button" href="{{ route('seleccionarPaquete', ['id_nombre_paquete' => $paquete->id_nombre_paquete]) }}">Contratar</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#paqueteCarousel2" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#paqueteCarousel2" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
