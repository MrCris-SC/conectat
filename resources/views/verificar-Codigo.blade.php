<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Agency - Start Bootstrap Theme</title>
        <link href="{{ asset('css/datos.css') }}" rel="stylesheet">
        <!-- Font Awesome icons (free version)-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        
    </head>
    <body id="page-top">
        
    <header class="header-realista">
        <div class="logo">
            <img src="{{ asset('images/icon.png') }}" alt="Logo" class="logo-img">
        </div>
        <nav>
            <ul>
                <li><a href="#inicio">Inicio</a></li>
                <li><a href="#planes">Planes de Internet</a></li>
                <li><a href="#contacto">Contacto</a></li>
                <li><a href="#soporte">Soporte</a></li>
            </ul>
        </nav>
    </header>

       
    <section class="container mt-5">
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

       
       
      
    
      
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>    </body>
</html>