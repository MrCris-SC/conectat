<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />


        <title>Contacto</title>
        <link href="{{ asset('css/userStyles.css') }}" rel="stylesheet">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
       

        <!-- Font Awesome icons (free version)-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <style>
            .contact-section {
                padding: 40px 20px;
                background-color: #f9f9f9;
            }

            .section-title {
                text-align: center;
                font-size: 2.5em;
                color: #333;
                margin-bottom: 30px;
            }

            .container {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
                gap: 20px;
            }

            .contact-info, .contact-form, .map-container {
                flex: 1;
                min-width: 300px;
                background-color: #ffffff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }

            .contact-info h2, .contact-form h2, .map-container h2 {
                color: #007bff;
                font-size: 1.8em;
                margin-bottom: 15px;
            }

            .contact-info p {
                font-size: 1.1em;
                color: #666;
            }

            .contact-form form {
                display: flex;
                flex-direction: column;
            }

            .form-group {
                margin-bottom: 15px;
            }

            .form-group label {
                font-weight: bold;
                color: #333;
            }

            .form-group input, .form-group textarea {
                width: 100%;
                padding: 10px;
                font-size: 1em;
                border: 1px solid #ccc;
                border-radius: 5px;
                margin-top: 5px;
            }

            .btn-submit {
                background-color: #007bff;
                color: #ffffff;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                font-size: 1.1em;
                cursor: pointer;
                transition: background-color 0.3s;
            }

            .btn-submit:hover {
                background-color: #0056b3;
            }

            .map-container iframe {
                border-radius: 8px;
                width: 100%;
                height: 300px;
            }

            /* Responsivo: Teléfonos y pantallas pequeñas */
            @media (max-width: 768px) {
                .container {
                    flex-direction: column;
                }

                .contact-info, .contact-form, .map-container {
                    min-width: 100%;
                    margin-bottom: 20px;
                }

                .section-title {
                    font-size: 2em;
                }
            }

            /* Responsivo: Teléfonos pequeños */
            @media (max-width: 480px) {
                .section-title {
                    font-size: 1.8em;
                }

                .contact-info h2, .contact-form h2, .map-container h2 {
                    font-size: 1.5em;
                }

                .form-group input, .form-group textarea {
                    font-size: 0.9em;
                    padding: 8px;
                }

                .btn-submit {
                    font-size: 1em;
                    padding: 8px 15px;
                }

                .map-container iframe {
                    height: 200px;
                }
            }
        </style>


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
                        <li class="nav-item"><a class="nav-link" href="{{ url('/user/#servicios') }}">Servicios</a></li>                       
                        <li class="nav-item"><a class="nav-link" href="{{url('/user/#paquetes')}}">Paquetes</a></li>  
                        <li class="nav-item"><a class="nav-link" href="{{ url('/acercaNosotros')}}">Acerca de</a></li>                       
                        <li class="nav-item"><a class="nav-link" href="{{ url('/contacto')}}">Contactanos</a></li>
                    </ul>
                </div>
            </div>
    </nav>

        <section class="contact-section">
            <div class="container">
                
                <!-- Información de la Empresa -->
                <div class="contact-info">
                    <h2>Información de Contacto</h2>
                    <p><strong>Dirección:</strong> Calle Principal #123, Ciudad</p>
                    <p><strong>Teléfono:</strong> +52 (123) 456-7890</p>
                    <p><strong>Correo Electrónico:</strong> contacto@empresa.com</p>
                    <p><strong>Horario de Atención:</strong> Lunes a Viernes, 9:00 AM - 6:00 PM</p>
                </div>

                <!-- Formulario de Contacto -->
                <div class="contact-form">
                    <h2>Envíanos un Mensaje</h2>
                    <form action="{{ route('enviar-mensaje') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" id="nombre" name="nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="correo">Correo Electrónico</label>
                            <input type="email" id="correo" name="correo" required>
                        </div>
                        <div class="form-group">
                            <label for="mensaje">Mensaje</label>
                            <textarea id="mensaje" name="mensaje" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn-submit">Enviar</button>
                    </form>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>


                <!-- Mapa de Ubicación -->
                <div class="map-container">
                    <h2>Nuestra Ubicación</h2>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d686.9086738164881!2d-89.39027584801022!3d20.289264380083996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f57007b6bfa3563%3A0x30c4791f9217807e!2sInstituto%20Tecnol%C3%B3gico%20Superior%20del%20Sur%20de%20Yucat%C3%A1n!5e0!3m2!1ses-419!2smx!4v1730313326087!5m2!1ses-419!2smx" width="600" height="450" 
                        style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

</html>
