<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />


        <title>Conectat-Verificacion  </title>
        <link href="{{ asset('css/userStyles.css') }}" rel="stylesheet">

       

        <!-- Font Awesome icons (free version)-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
       

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
                        <li class="nav-item"><a class="nav-link" href="{{ url('/user') }}" >Inicio</a></li>                        
                        <li class="nav-item"><a class="nav-link" href="#about">Acerda de</a></li>                       
                        <li class="nav-item"><a class="nav-link" href="#contact">Contactanos</a></li>
                    </ul>
                </div>
            </div>
        </nav>

       
        <section class="container-code">

                <h2 class="text-center">Verificación de Código</h2>
                <form action="{{ route('verificarCodigo') }}" method="POST">
                @csrf <!-- Protección CSRF en Laravel -->

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="codigo" class="form-label">Ingrese el código que recibió en su correo</label>
                        <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Código de verificación" required>
                    </div>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-primary">Verificar</button>
                </div>
            </form>
        </section>
 <!-- footer********************************************************************************-->

        <footer>
            <div class="footer1">
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
        <!--Aqui llega los componentes que se usa en el css-codigoverificacion.css-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
       
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>    </body>
    </body>

</html>
