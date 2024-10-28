<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <!-- Este es tu CSS personalizado -->
    <link href="{{ asset('css/custom-style.css') }}" rel="stylesheet">

    <style>
   body.custom-bg {
    background-color: black; /* Color de fondo negro */
    background-size: cover;
    background-position: center;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

    /* Opcional: Ajustes para el contenedor */
    .container1 {
        background-color: black;    
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        
    }
    .contenedorSesion{
        background-color: black;
    }
</style>


</head>

<body class="bg-gradient-primary">

<div class="container1">
    <!-- Outer Row -->
    <div class="contenedorSesion">
    <div class="row justify-content-center">
        
        <div class="col-xl-10 col-lg-12 col-md-9">
            
            @if (@session('error'))
                <div class="alert alert-danger my-2">
                    {{ session('error') }}
                </div>
            @endif
           
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <!-- Imagen -->
                        <div class="col-md-8 col-lg-7 col-xl-6">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                            class="img-fluid" alt="Phone image">
                        </div>
                        <!-- Campos de Inicio de Sesión -->
                        
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Sign In</h1>
                                </div>
                                <form class="user" method="POST" action="{{ route('admin.auth') }}">
                                    @csrf
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                            </div>
                                            <input type="email" name="Correo_electronico" class="form-control form-control-user @error('Correo_electronico') is-invalid @enderror" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." required>
                                            @error('email')
                                                <span class="invalid-feeback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                            </div>
                                            <input type="password" name="Contraseña" class="form-control form-control-user @error('Contraseña') is-invalid @enderror" id="exampleInputPassword" placeholder="Password" required>
                                            @error('contraseña')
                                                <span class="invalid-feeback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck" name="remember">
                                            <label class="custom-control-label" for="customCheck">Remember Me</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                                    <hr>
                                </form>
                            </div>
                        </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
