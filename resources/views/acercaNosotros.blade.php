<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />


        <title>Acerca-Nosotros</title>
        <link href="{{ asset('css/userStyles.css') }}" rel="stylesheet">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
       

        <!-- Font Awesome icons (free version)-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <style>
        .diseñopaquetes {
        padding: 40px 20px;
        background-color: #f9f9f9;
        }

            .about-section {
                max-width: 1200px;
                margin: auto;
            }

            .about-section h1 {
                font-size: 2.5em;
                margin-bottom: 30px;
                text-align: center;
                color: #333;
            }

            .content-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                gap: 20px;
            }

            .mission-vision, .history, .values, .team, .commitment {
                background: #ffffff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }

            .about-section h2 {
                font-size: 1.8em;
                color: #007bff;
                margin-bottom: 15px;
            }

            .about-section p, .about-section ul {
                font-size: 1em;
                line-height: 1.6;
                color: #666;
                margin-bottom: 15px;
            }

            .values ul {
                list-style-type: none;
                padding: 0;
            }

            .values ul li {
                margin-bottom: 10px;
            }

            .values ul li strong {
                color: #333;
                font-weight: 600;
            }

            @media (max-width: 768px) {
                .content-grid {
                    grid-template-columns: 1fr;
                }

                .about-section h1 {
                    font-size: 2em;
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
                        <li class="nav-item"><a class="nav-link" href="{{ url('/user') }}" >Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/user') }}">Planes de Internet</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/paquetePromocion') }}">Promociones</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/acercaNosotros')}}">Acerda de</a></li>                       
                        <li class="nav-item"><a class="nav-link" href="{{ url('/contacto')}}">Contactanos</a></li>
                    </ul>
                </div>
            </div>
        </nav>
       
        <section class="diseñopaquetes">
            <div class="container containerpacks">
                <div class="about-section">
                    <h1 class="text-center">Acerca de Nosotros</h1>
                    <div class="content-grid">
                        <section class="mission-vision">
                            <h2>Misión</h2>
                            <p>Proveer servicios de internet de alta calidad, accesibles y confiables, para conectar a las personas y mejorar su experiencia en línea.</p>

                            <h2>Visión</h2>
                            <p>Convertirnos en la plataforma líder en el mercado de servicios de internet, brindando la mejor experiencia y conectividad.</p>
                        </section>

                        <section class="history">
                            <h2>Nuestra Historia</h2>
                            <p>Nuestra empresa fue fundada en [Año], con la misión de ofrecer soluciones de conectividad que cumplan con las necesidades de nuestros clientes.</p>
                        </section>

                        <section class="values">
                            <h2>Valores</h2>
                            <ul>
                                <li><strong>Confiabilidad:</strong> Nos aseguramos de brindar un servicio estable y seguro.</li>
                                <li><strong>Atención al Cliente:</strong> Estamos comprometidos en atender a nuestros usuarios de manera rápida y eficaz.</li>
                                <li><strong>Innovación:</strong> Buscamos mejorar continuamente nuestros servicios y tecnologías.</li>
                            </ul>
                        </section>

                        <section class="team">
                            <h2>Nuestro Equipo</h2>
                            <p>Contamos con un equipo de expertos apasionados por la tecnología y la conectividad.</p>
                        </section>

                        <section class="commitment">
                            <h2>Compromiso con el Cliente</h2>
                            <p>Nos enfocamos en la satisfacción de nuestros clientes, proporcionando soporte confiable y asistencia en todo momento.</p>
                        </section>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

</html>
