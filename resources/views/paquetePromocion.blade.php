<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Paquetes-Promociones</title>
    <link href="{{ asset('css/userStyles2.css') }}" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   
</head>
<body id="page-top">

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
              <a class="navbar-brand" href="#">
                <img src="{{ asset('images/logonuevo.png') }}" class="logo" alt="Logo">
             </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/paquetePromocion') }}">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/user') }}">Planes de Internet</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/paquetePromocion') }}">Promociones</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/acercaNosotros')}}">Acerca de</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/contacto')}}">Contáctanos</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <br><br><br><br>
    <section>
    <div class="offer-section">
    <h1 class="offer-title">¡🔥Descubre la Conectividad que Mereces🔥!</h1>
    <h2 class="offer-subtitle">¡La conexión que mereces te espera📶!</h2>
    <p class="offer-highlight">✨ <strong>Navega más rápido</strong> con nuestros planes diseñados para ti, que combinan <strong>velocidades increíbles</strong> y <strong>precios imbatibles</strong>.</p>
    <p class="offer-highlight">🔒 <strong>Confiabilidad y soporte</strong> al alcance de tu mano, porque no solo queremos que estés conectado, ¡queremos que estés feliz!</p>
    <p class="offer-cta"><strong>No dejes pasar estas promociones exclusivas.</strong> Da el paso hoy mismo y contrata el paquete que se adapte a tus necesidades. </p>
     </div>


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
                                        <span>
                                            <p></p>
                                        </span>
                                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#infoModal{{ $index }}">
                                            Más información
                                        </button>
                                    </div>
                                </div>
                                <div class="modal fade" id="infoModal{{ $index }}" tabindex="-1" aria-labelledby="infoModalLabel{{ $index }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="infoModalLabel{{ $index }}">{{ $paquete->nombre_paquete }}</h5>
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
            </div>
        </div>
    </section>

    
  <!-- Sección de paquetes -->
  <section>
    <h1 style="text-align: center; color:#0050aa">🚨Lista de Paquetes en oferta🚨 </h1>
    <br>
    <div class="diseñopaquetes">
      <div class="section">
        <div class="container containerpacks">
          @foreach ($paquetes as $paquete)
          <div class="card">
            @if ($paquete->promocion)
            <div class="new-tag">{{ $paquete->nombre_paquete }}</div>
            @endif
            <div class="megabytes">{{ $paquete->velocidad_paquete }}<span></span></div>
            <div class="price">${{ $paquete->precio }}<span>/month</span></div>
            <div class="includes">
              <p>Incluye:</p>
              <div class="item">
                <img src="images/icon.png" alt="icon">
                <div class="item-title">{{ $paquete->caracteristicas_paquete }}</div>
              </div>
            </div>
            <a class="button" href="{{ route('seleccionarPaquete', ['id_nombre_paquete' => $paquete->id_nombre_paquete]) }}">Contratar</a>
          </div>
          @endforeach
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