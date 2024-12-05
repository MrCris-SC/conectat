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
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="{{ url('/user') }}"onclick="verificarDatos(event)" >Inicio</a></li>                        
                        <li class="nav-item"><a class="nav-link" href="#servicios">Servicios</a></li>                       
                        <li class="nav-item"><a class="nav-link" href="#paquetes">Paquetes</a></li>
                        <li class="nav-item"><a class="nav-link" href="#dudas">Ayuda</a></li>   
                        <li class="nav-item"><a class="nav-link" href="{{ url('/acercaNosotros')}}">Acerca de</a></li>                       
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
        <section id="servicios" class="paquete-slider-section">
            <div class="text-center">
                    <h2 class="section-heading text-uppercase">Servicios</h2>
                    <h3 class="section-subheading text-muted">Conect@t: Internet de alta velocidad.</h3>
            </div>
            
            <div class="container">
                
                <div class="row text-center">
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-wifi fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Velocidades de Internet Garantizadas y Flexibles</h4>
                        <p class="text-muted">Disfruta de hasta 500 Mbps reales para streaming, gaming y videollamadas sin interrupciones.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Soporte Técnico 24/7 Personalizado</h4>
                        <p class="text-muted">¿Problemas con tu conexión? Estamos disponibles las 24 horas, los 7 días de la semana.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-star fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Beneficios Exclusivos para Clientes:</h4>
                        <p class="text-muted">Ahorra hasta un 20% en tu primer año de servicio o al combinar con servicios adicionales.</p>
                    </div>
                </div>
            </div>
        </section>

        
        
                   
        <section id= "paquetes" class="pricing py-5">
            <br><br>    
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Nuestros paquetes</h2>        
            </div>
            <br>
            
            <div id="paqueteSlider" class="slider-container">
                <div class="slider-wrapper">
                    @foreach($paquetes as $paquete)
                        <div class="slider-item">
                            <div class="card mx-auto shadow-lg" style="border-radius: 15px; overflow: hidden;">
                                <div class="card-body p-4 text-center">
                                    <h5 class="card-title text-primary fw-bold">{{ $paquete->nombre_paquete }}</h5>
                                    <p class="card-text text-muted mb-3">{{ $paquete->descripcion }}</p>
                                    <p class="fw-bold fs-4 text-success">Precio: ${{ $paquete->precio }}</p>
                                    <ul class="fa-ul text-start">
                                        <li><span class="fa-li"><i class="fas fa-check text-success"></i></span>Dispositivos ilimitados</li>
                                        <li><span class="fa-li"><i class="fas fa-check text-success"></i></span>Internet ilimitado</li>
                                        <li><span class="fa-li"><i class="fas fa-check text-success"></i></span>{{ $paquete->velocidad_paquete }} de velocidad</li>
                                        <li><span class="fa-li"><i class="fas fa-check text-success"></i></span>Soporte técnico gratis</li>
                                        <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Proyectos privados ilimitados</li>
                                        <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Soporte telefónico dedicado</li>
                                    </ul>
                                    <a href="{{ route('seleccionarPaquete', ['id_nombre_paquete' => $paquete->id_nombre_paquete]) }}" class="btn btn-primary rounded-pill px-4 mt-3 shadow">Contrátanos</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="slider-control prev" id="prevSlide"><i class="fas fa-chevron-left"></i></button>
                <button class="slider-control next" id="nextSlide"><i class="fas fa-chevron-right"></i></button>
            </div>

        
                
        </section>
        <section id="dudas" class="mt-0 pt-0">
            <div class="container mt-6">
                <section class="row align-items-start">
                <!-- Título a la izquierda -->
                <div class="col-md-4">
                    <h2 class="fw-bold">Preguntas Frecuentes</h2>
                </div>
                <!-- Preguntas a la derecha -->
                <div class="col-md-8">
                    <div class="accordion" id="faqAccordion"> @foreach($preguntas as $pregunta) <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{ $loop->index }}">
                            <button class="accordion-button{{ $loop->first ? '' : ' collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $loop->index }}" aria-expanded="{{ $loop->first ? 'true' : 'false' }}" aria-controls="collapse{{ $loop->index }}">
                                <strong>{{ $pregunta->pregunta }}</strong>
                            </button>
                            </h2>
                            <div id="collapse{{ $loop->index }}" class="accordion-collapse collapse{{ $loop->first ? ' show' : '' }}" aria-labelledby="heading{{ $loop->index }}" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <p>{{ $pregunta->respuesta_pregunta }}</p>
                            </div>
                            </div>
                        </div> @endforeach </div>
                </div>
                </section>
            </div>
        </section>

        <div class="toast-container position-fixed top-0 end-0 p-3">
            <div id="toastMessage" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto">Notificación</strong>
                    <small>Justo ahora</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body" id="toastBody">
                    <!-- El mensaje se inserta aquí -->
                </div>
            </div>
        </div>

            
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
       

    <script>
       document.addEventListener("DOMContentLoaded", function () {
  const sliderWrapper = document.querySelector(".slider-wrapper");
  const prevButton = document.getElementById("prevSlide");
  const nextButton = document.getElementById("nextSlide");
  const sliderItems = document.querySelectorAll(".slider-item");
  const totalItems = sliderItems.length;

  const cloneItems = () => {
    // Creamos clones de todos los elementos
    const clonedItems = [];
    sliderItems.forEach(item => {
      clonedItems.push(item.cloneNode(true)); // Clonamos cada elemento
    });

    // Insertamos los clones al principio y al final
    clonedItems.forEach(item => {
      sliderWrapper.appendChild(item);  // Insertamos clones al final
    });

    // Insertamos los clones al principio
    clonedItems.reverse().forEach(item => {
      sliderWrapper.insertBefore(item, sliderWrapper.firstChild);  // Insertamos clones al principio
    });
  };

  cloneItems();// Duplicamos los elementos una vez cargado el slider

  let currentIndex = 1;  // Comenzamos en el segundo elemento (para que no se vea el clone al inicio)
  let itemWidth = sliderItems[0].offsetWidth; // Obtenemos el ancho de las tarjetas

  // Función para mover el slider
  function goToSlide(index) {
    // Si llegamos al primer o último elemento (duplicado), ajustamos la transición
    if (index < 0) {
      currentIndex = totalItems;  // Mover a la última posición
      sliderWrapper.style.transition = "none"; // Desactiva la transición para el "wrap-around"
      sliderWrapper.style.transform = `translateX(${ -currentIndex * itemWidth }px)`; // Mover inmediatamente
      setTimeout(() => {
        sliderWrapper.style.transition = "transform 0.5s ease-in-out"; // Reactivamos la transición
      }, 50); // Retraso para que se active la transición después

    } else if (index >= totalItems + 1) {
      currentIndex = 1;  // Mover al primer elemento
      sliderWrapper.style.transition = "none"; // Desactiva la transición para el "wrap-around"
      sliderWrapper.style.transform = `translateX(${ -currentIndex * itemWidth }px)`; // Mover inmediatamente
      setTimeout(() => {
        sliderWrapper.style.transition = "transform 0.5s ease-in-out"; // Reactivamos la transición
      }, 50); // Retraso para que se active la transición después

    } else {
      currentIndex = index;  // Avanzamos al siguiente índice
    }

    const offset = -currentIndex * itemWidth;
    sliderWrapper.style.transform = `translateX(${offset}px)`;
  }

  prevButton.addEventListener("click", function () {
    goToSlide(currentIndex - 1);
  });

  nextButton.addEventListener("click", function () {
    goToSlide(currentIndex + 1);
  });

  // Inicializamos el slider con la primera posición
  goToSlide(currentIndex);

  // Actualizamos el ancho de las tarjetas al redimensionar
  window.addEventListener("resize", function () {
    itemWidth = sliderItems[0].offsetWidth;  // Actualizamos el ancho de las tarjetas
    goToSlide(currentIndex);  // Reajustamos el slider
  });
});


    </script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    @if(session('success'))
        var toast = new bootstrap.Toast(document.getElementById('toastMessage'));
        document.getElementById('toastBody').textContent = "{{ session('success') }}";
        toast.show();
    @elseif(session('error'))
        var toast = new bootstrap.Toast(document.getElementById('toastMessage'));
        document.getElementById('toastBody').textContent = "{{ session('error') }}";
        toast.show();
    @endif
});
</script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Bootstrap core JS-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>


    </body>

</html>
