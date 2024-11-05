<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <title>Pre-Contrato</title>
        <link href="{{ asset('css/userStyles.css') }}" rel="stylesheet">

        <title>Agency - Start Bootstrap Theme</title>


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
                        <li class="nav-item"><a class="nav-link" href="{{ url('/user') }}"onclick="verificarDatos(event, '{{ url('/user') }}', 'Inicio')" >Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/user') }}" onclick="verificarDatos(event, '{{ url('/user') }}', 'Paquetes')">Planes de Internet</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/paquetePromocion') }}" onclick="verificarDatos(event, '{{ url('/paquetePromocion') }}', 'Promociones')">Promociones</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/acercaNosotros')}}" onclick="verificarDatos(event, '{{ url('/acercaNosotros') }}', 'Acerca de Nosotros')">Acerca</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/contacto')}}" onclick="verificarDatos(event, '{{ url('/contacto')}}', 'Contacto')">Contáctanos</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <!--Contenedor de registro de datos que esta vinculado con el css-precontrato-->
    <section class="container-mt-5">
        <h2 class="text-center">Datos de Pre-contrato</h2>
        <form action="{{ route('enviarCodigo') }}" method="POST">
            @csrf <!-- Protección CSRF en Laravel -->
           
                
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="codigoPostal" class="form-label">Nombre completo</label>
                    <input type="text" class="form-control" id="nombre_completo" name="nombre_completo" placeholder="Nombre completo" value="{{ old('nombre_completo') }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="calle" class="form-label">Codigo Postal</label>
                    <input type="text" class="form-control" id="cp" name="cp" placeholder="Codigo Postal" value="{{ old('cp') }}" oninput="buscarCiudad()" required>
                    
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="noExterior" class="form-label">Municipio</label>
                    <input type="text" class="form-control" id="municipio" name="municipio" readonly placeholder="Municipio">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="noInterior" class="form-label">Direccion</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" value="{{ old('direccion') }}" placeholder="Direccion">
                </div>
            </div>

            <div class="row">
            <div class="col-md-6 mb-3">
                <label for="ciudad" class="form-label">Correo</label>
                <input type="email" class="form-control @error('correo_electronico') is-invalid @enderror" id="correo_electronico" name="correo_electronico" placeholder="Correo" value="{{ old('correo') }}" required>
                <!-- Mostrar mensaje de error si el correo ya está registrado -->
                @error('correo')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
                <div class="col-md-6 mb-3">
                    <label for="alcaldia" class="form-label">Telefono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono" value="{{ old('telefono') }}" maxlength="10" pattern="\d{10}" title="Debe ingresar exactamente 10 dígitos numéricos" required>
                </div>

                
                
                <div class="col-md-6 mb-3">
                    <label for="alcaldia" class="form-label">Referencia de Domicilio</label>
                    <textarea type="text" class="form-control" id="referencia_domicilio" name="referencia_domicilio" placeholder="Referencia de Domicilio" value="{{ old('referencia_domicilio') }}" required></textarea>
                    
                </div>
                

            </div>

            @if(session()->has('id_nombre_paquete'))
                <input type="hidden" name="id_nombre_paquete" value="{{ session('id_nombre_paquete') }}">
            @else
                <p>No se ha seleccionado un paquete. Por favor, selecciona uno.</p>
            @endif

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-primary">Continuar</button>
            </div>
            
                <div class="invalid-feedback">
                    Este correo ya está registrado.
                </div>
        </form>
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
    
  
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->

            <!--Js para verificar los datos si estan llenos y mostrar el mensaje-->
        <script>
        function verificarDatos(event, url, nombrePagina) {
            event.preventDefault(); // Prevenir la acción por defecto del enlace
        
            // Obtener los valores de los campos del formulario
            var nombre = document.getElementById('nombre_completo').value;
            var cp = document.getElementById('cp').value;
            var municipio = document.getElementById('municipio').value;
            var correo = document.getElementById('correo_electronico').value;
            var telefono = document.getElementById('telefono').value;
            var referencia = document.getElementById('referencia_domicilio').value;
        
            // Contador para campos llenos
            var camposLlenos = 0;
        
            // Verificar si cada campo está lleno y contar
            if (nombre) camposLlenos++;
            if (cp) camposLlenos++;
            if (municipio) camposLlenos++;
            if (correo) camposLlenos++;
            if (telefono) camposLlenos++;
      
            if (referencia) camposLlenos++;
        
            var mensajeModal = document.getElementById('mensajeModal');
            var modal = document.getElementById('miModal');
        
            // Si todos los campos están llenos
            if (camposLlenos === 7) {
                mensajeModal.innerText = `¿Estas seguro de cambiar a la página de ${nombrePagina}? se perderá todo los datos ingresados `;
                modal.style.display = "block";
            }
            // Si se ingresaron algunos, pero no todos
            else if (camposLlenos > 0) {
                mensajeModal.innerText = `¿Estas seguro de cambiar a la página de ${nombrePagina}? se perderá todo los datos ingresados `;
                modal.style.display = "block";
            }
            // Si no se ingresó ningún dato
            else {
                // Redirigir al usuario al índice principal si no hay datos ingresados
                window.location.href = url; 
            }
            // Cerrar el modal cuando se hace clic en el botón de cerrar
            document.getElementById('aceptarBtn').onclick = function() {
                modal.style.display = "none";
                 window.location.href = url;
            }
            document.getElementById('cancelarBtn').onclick = function() {
            var modal = document.getElementById('miModal');
            modal.style.display = "none"; // Solo cierra el modal
            }
        }
        const codigosPostales = {
            '97825': 'Abalá', '97826': 'Abalá', '97827': 'Abalá',
    '97380': 'Acanceh', '97382': 'Acanceh', '97383': 'Acanceh',
    '97990': 'Akil',
    '97450': 'Baca', '97452': 'Baca', '97453': 'Baca',
    '97466': 'Bokobá',
    '97620': 'Buctzotz', '97623': 'Buctzotz', '97624': 'Buctzotz', '97625': 'Buctzotz', '97626': 'Buctzotz', '97627': 'Buctzotz',
    '97460': 'Cacalchén',
    '97745': 'Calotmul', '97746': 'Calotmul', '97747': 'Calotmul', '97748': 'Calotmul',
    '97410': 'Cansahcab', '97414': 'Cansahcab', '97415': 'Cansahcab', '97417': 'Cansahcab',
    '97915': 'Cantamayec', '97917': 'Cantamayec', '97918': 'Cantamayec',
    '97367': 'Celestún',
    '97640': 'Cenotillo', '97645': 'Cenotillo',
    '97955': 'Chacsinkín', '97956': 'Chacsinkín', '97957': 'Chacsinkín',
    '97758': 'Chankom', '97759': 'Chankom',
    '97857': 'Chapab', '97858': 'Chapab',
    '97770': 'Chemax', '97773': 'Chemax', '97774': 'Chemax', '97775': 'Chemax', '97776': 'Chemax', '97777': 'Chemax',
    '97760': 'Chichimilá', '97761': 'Chichimilá',
    '97340': 'Chicxulub Pueblo', '97342': 'Chicxulub Pueblo',
    '97940': 'Chikindzonot', '97943': 'Chikindzonot', '97944': 'Chikindzonot',
    '97816': 'Chocholá',
    '97904': 'Chumayel',
    '97345': 'Conkal', '97346': 'Conkal', '97347': 'Conkal',
    '97766': 'Cuncunul', '97767': 'Cuncunul',
    '97577': 'Cuzamá', '97578': 'Cuzamá', '97579': 'Cuzamá',
    '97404': 'Dzemul', '97405': 'Dzemul', '97406': 'Dzemul',
    '97500': 'Dzidzantún', '97504': 'Dzidzantún', '97506': 'Dzidzantún',
    '97600': 'Dzilam González', '97604': 'Dzilam González',
    '97606': 'Dzilam de Bravo', '97608': 'Dzilam de Bravo', '97609': 'Dzilam de Bravo',
    '97660': 'Dzitás', '97666': 'Dzitás',
    '97646': 'Dzoncauich', '97647': 'Dzoncauich',
    '97854': 'Dzán',
    '97730': 'Espita', '97733': 'Espita', '97734': 'Espita', '97739': 'Espita',
    '97830': 'Halachó', '97833': 'Halachó', '97835': 'Halachó', '97836': 'Halachó', '97837': 'Halachó',
    '97560': 'Hocabá', '97563': 'Hocabá', '97564': 'Hocabá',
    '97480': 'Hoctún', '97483': 'Hoctún', '97486': 'Hoctún',
    '97580': 'Homún', '97582': 'Homún', '97583': 'Homún', '97585': 'Homún', '97586': 'Homún',
    '97590': 'Huhí', '97596': 'Huhí',
    '97350': 'Hunucmá', '97353': 'Hunucmá', '97356': 'Hunucmá',
    '97343': 'Ixil',
    '97540': 'Izamal', '97542': 'Izamal', '97545': 'Izamal', '97550': 'Izamal', 
    '97553': 'Izamal', '97555': 'Izamal', '97556': 'Izamal', '97557': 'Izamal',
    '97373': 'Kanasín', '97374': 'Kanasín', '97376': 'Kanasín',
    '97670': 'Kantunil', '97675': 'Kantunil',
    '97764': 'Kaua', '97765': 'Kaua',
    '97360': 'Kinchil', '97362': 'Kinchil',
    '97818': 'Kopomá',
    '97900': 'Mama',
    '97850': 'Maní', '97851': 'Maní',
    '97800': 'Maxcanú', '97803': 'Maxcanú', '97804': 'Maxcanú', '97805': 'Maxcanú', '97806': 'Maxcanú', '97807': 'Maxcanú',
    '97908': 'Mayapán',
    '97454': 'Mocochá', '97455': 'Mocochá', '97456': 'Mocochá',
    '97436': 'Motul', '97437': 'Motul', '97440': 'Motul', '97443': 'Motul', '97444': 'Motul', '97445': 'Motul', '97446': 'Motul',
    '97430': 'Motul de Carrillo Puerto', '97432': 'Motul de Carrillo Puerto', '97433': 'Motul de Carrillo Puerto', '97434': 'Motul de Carrillo Puerto',
    '97840': 'Muna', '97843': 'Muna', '97844': 'Muna',
    '97457': 'Muxupip', '97458': 'Muxupip',
    '97300': 'Mérida', '97302': 'Mérida', '97303': 'Mérida', '97304': 'Mérida', '97305': 'Mérida', 
    '97307': 'Mérida', '97308': 'Mérida', '97309': 'Mérida', '97310': 'Mérida', '97312': 'Mérida', 
    '97314': 'Mérida', '97315': 'Mérida', '97316': 'Mérida',
    '97813': 'Opichén', '97814': 'Opichén',
    '97880': 'Oxkutzcab', '97882': 'Oxkutzcab', '97883': 'Oxkutzcab', '97884': 'Oxkutzcab', '97885': 'Oxkutzcab', '97886': 'Oxkutzcab', '97887': 'Oxkutzcab',
    '97610': 'Panabá', '97614': 'Panabá', '97615': 'Panabá',
    '97930': 'Peto', '97932': 'Peto', '97933': 'Peto', '97934': 'Peto', '97935': 'Peto', '97936': 'Peto', '97937': 'Peto',
    '97320': 'Progreso', '97324': 'Progreso', '97330': 'Progreso', '97334': 'Progreso', '97336': 'Progreso', '97337': 'Progreso',
    '97655': 'Quintana Roo',
    '97720': 'Río Lagartos', '97723': 'Río Lagartos', '97726': 'Río Lagartos',
    '97845': 'Sacalum', '97847': 'Sacalum', '97848': 'Sacalum',
    '97810': 'Samahil', '97812': 'Samahil',
    '97616': 'San Felipe',
    '97587': 'Sanahcat',
    '97890': 'Santa Elena', '97893': 'Santa Elena', '97894': 'Santa Elena', '97895': 'Santa Elena', '97899': 'Santa Elena',
    '97570': 'Seyé', '97573': 'Seyé', '97574': 'Seyé', '97575': 'Seyé',
    '97420': 'Sinanché', '97424': 'Sinanché',
    '97690': 'Sotuta', '97694': 'Sotuta', '97695': 'Sotuta', '97697': 'Sotuta',
    '97630': 'Sucilá', '97634': 'Sucilá', '97636': 'Sucilá',
    '97676': 'Sudzal', '97677': 'Sudzal', '97678': 'Sudzal',
    '97527': 'Suma',
    '97945': 'Tahdziú', '97947': 'Tahdziú', '97948': 'Tahdziú',
    '97490': 'Tahmek',
    '97910': 'Teabo',
    '97820': 'Tecoh', '97822': 'Tecoh', '97823': 'Tecoh', '97824': 'Tecoh',
    '97535': 'Tekal de Venegas', '97536': 'Tekal de Venegas',
    '97520': 'Tekantó', '97522': 'Tekantó', '97523': 'Tekantó',
    '97970': 'Tekax', '97973': 'Tekax', '97974': 'Tekax', '97975': 'Tekax', '97977': 'Tekax', 
    '97979': 'Tekax', '97980': 'Tekax', '97983': 'Tekax', '97984': 'Tekax', '97985': 'Tekax', 
    '97986': 'Tekax', '97987': 'Tekax', '97989': 'Tekax',
    '97680': 'Tekit', '97684': 'Tekit', '97686': 'Tekit',
    '97768': 'Tekom', '97769': 'Tekom',
    '97400': 'Telchac Pueblo',
    '97407': 'Telchac Puerto',
    '97510': 'Temax', '97513': 'Temax', '97515': 'Temax', '97516': 'Temax',
    '97740': 'Temozón', '97743': 'Temozón', '97744': 'Temozón',
    '97530': 'Tepakán', '97532': 'Tepakán',
    '97364': 'Tetiz', '97365': 'Tetiz',
    '97524': 'Teya',
    '97870': 'Ticul', '97873': 'Ticul',
    '97377': 'Timucuy', '97378': 'Timucuy',
    '97750': 'Tinum', '97751': 'Tinum', '97753': 'Tinum', '97754': 'Tinum', '97755': 'Tinum', '97756': 'Tinum', '97757': 'Tinum',
    '97762': 'Tixcacalcupul', '97763': 'Tixcacalcupul',
    '97470': 'Tixkokob', '97473': 'Tixkokob', '97474': 'Tixkokob', '97475': 'Tixkokob', '97476': 'Tixkokob', '97477': 'Tixkokob',
    '97950': 'Tixmehuac', '97953': 'Tixmehuac', '97954': 'Tixmehuac',
    '97386': 'Tixpéhual', '97387': 'Tixpéhual', '97388': 'Tixpéhual', '97389': 'Tixpéhual',
    '97705': 'Tizimín', '97706': 'Tizimín', '97707': 'Tizimín', '97710': 'Tizimín', 
    '97712': 'Tizimín', '97713': 'Tizimín', '97714': 'Tizimín', '97715': 'Tizimín', 
    '97716': 'Tizimín', '97717': 'Tizimín',
    '97650': 'Tunkás', '97653': 'Tunkás', '97654': 'Tunkás',
    '97960': 'Tzucacab', '97963': 'Tzucacab', '97964': 'Tzucacab', 
    '97965': 'Tzucacab', '97966': 'Tzucacab', '97967': 'Tzucacab', '97969': 'Tzucacab',
    '97796': 'Uayma', '97798': 'Uayma', '97799': 'Uayma',
    '97357': 'Ucú',
    '97390': 'Umán', '97392': 'Umán', '97393': 'Umán', '97394': 'Umán', '97395': 'Umán', 
    '97396': 'Umán', '97397': 'Umán',
    '97785': 'Valladolid', '97786': 'Valladolid', '97787': 'Valladolid', '97790': 'Valladolid', 
    '97793': 'Valladolid', '97794': 'Valladolid', '97795': 'Valladolid',
    '97566': 'Xocchel',
    '97920': 'Yaxcabá', '97922': 'Yaxcabá', '97923': 'Yaxcabá', '97924': 'Yaxcabá', 
    '97925': 'Yaxcabá', '97926': 'Yaxcabá', '97927': 'Yaxcabá', '97929': 'Yaxcabá',
    '97348': 'Yaxkukul',
    '97425': 'Yobaín', '97426': 'Yobaín'
    
        };

    function buscarCiudad() {
    let codigoPostal = document.getElementById("cp").value;

    // Verifica si el código postal ingresado está en el objeto
    if (codigosPostales[codigoPostal]) {
        document.getElementById("municipio").value = codigosPostales[codigoPostal];
    } else {
        document.getElementById("municipio").value = "Municipio no encontrada";
    }
    }

        
        </script>

        <!--Mensaje de advertencia-->
        <div id="miModal" class="modal">
            <div class="modal-content">
                <img id="icono" src="{{ asset('images/falla.png') }}" alt="Icono">
                <p id="mensajeModal"></p>
                <div class="buttonnn">
                    <button id="aceptarBtn" class="aceptar-btn">Aceptar</button>
                    <button id="cancelarBtn" class="cancelar-btn">Cancelar</button>
                </div>
            </div>
        </div>
        {{-- ACA TERMINA LA FUNCION DE VENTANA EMERGENTE -----------------------------------------------------------------}}
        
        
        
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>    
    </body>

</html>
