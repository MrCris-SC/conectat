<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Contrato de Servicio - Definiciones</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0.5cm;
            font-size: 9.5px;
            display: flex;
            justify-content: center;
        }

        .header {
            display: flex;
            align-items: center;
        }

        .header img {
            height: 80px; /* Tamaño del logo */
            margin-right: 0; /* espacio entre el logo y el titulo */
        }

        .header h1 {
            font-size: 20px;/* tamaño del titulo */
            margin: 0;
            flex: 1;
            text-align: center; /* Centra el título horizontalmente */
            text-transform: uppercase; /* Texto en mayúsculas */
        }

        .contenedor {
            max-width: 600px;
            line-height: 1;
            margin: auto;
            text-align: justify;
        }

        h2 {
            font-size: 11px;/* tamaño sub titulo */
            text-align: center;
            font-weight: bold;
            margin-top: 1em;
            background-color: #424949;
            color: white;
            padding: 10px; /* Ajusta el valor según sea necesario */
        }

        p {
            margin: 0.5em 0;
        }

        ul {
            margin-left: 1em;
        }

        ul li {
            margin-bottom: 0.5em;
        }



        /*diseño de la tabla */

        .contract-section {
            max-width: 600px; /* Ancho máximo */
            min-height: 600px; /* Altura mínima */
            margin: 0 auto; /* Centra el contenedor */
            padding: 20px; /* Espaciado interno */
            /*border: 1px solid #000; /* Borde */
            overflow: auto; /* Desplazamiento si el contenido excede */
        }

            /* Media query para pantallas más pequeñas */
            @media (max-width: 600px) {
        .contract-section {
            width: 90%; /* Ocupar el 90% del ancho disponible */
            min-height: 400px; /* Ajustar altura mínima para dispositivos móviles */
            }
        }
        .header2 {
          text-align: center;
            margin-bottom: 20px; 

        }
        .header2 img {
            height: 80px; /* Tamaño del logo */
            margin-right: 0; /* espacio entre el logo y el titulo */
        }

        p {
            margin: 0.5em 0;
        }
        .main-table {
            /* margin-top: 25px; */
            width: 100%;
            border: 1px solid #000;
            border-collapse: collapse;
        }
        .section-table {
            width: 100%;
            border-collapse: collapse;
        }

        .section-table td {
            padding: 8px;
        }
    
        .header2-cell {       
            text-align: center;        
            font-weight: bold;        
            padding: 10px;/* Espaciado interno para el encabezado */
            background-color: #f0f0f0;/* Color de fondo para las celdas de encabezado */
        }

        td, th {
            border: 1px solid #000;
            padding: 10px; 
            vertical-align: top;
        }
        
    /* disño de la firma cliente */
    .signature {
        text-align: center;
        margin-top: 150px;
    }
    .signature-line {
        border-top: 1px solid #000;
        width: 300px;
        margin: 0 auto;
        padding-top: 5px;
    }
    .client-name {
        margin-top: 5px;
        font-weight: bold;
        text-transform: uppercase; /* Texto en mayúsculas */
    }

</style>
</head>

<body>
    <div class="header">
        <img src="images/logo1.png" alt="logo-Conect@T">
        <h1>CONDICIONES DEL SERVICIO CONECT@T NEGOCIO</h1>
    </div>
    
    <div class="contenedor">
        <!-- <h2>DEFINICIONES</h2>
        <p><strong>ACCESORIOS:</strong> Componentes o partes, tales como cables, conectores, microfiltros u otros, que se incluyen dentro del KIT DE CONEXIÓN, necesarias para llevar a cabo la conexión del EQUIPO TERMINAL con el EQUIPO DE CÓMPUTO.</p>
        <p><strong>EL CONSUMIDOR:</strong> Persona física con actividad empresarial o moral que contrata el SERVICIO a través de: (i) las Tiendas Comerciales CONECT@T; (ii) la página web; (iii) llamando al Centro de Atención y Soporte Técnico a Clientes al +52 997 179 49 94, o al Centro de Información Comercial (CEICO) al +52 997 179 49 94; o bien; (iv) cualquier canal comercial con los que CONECT@T cuente.</p>
        <p>La contratación del SERVICIO puede realizarla: (i) el titular de la LINEA CONECT@T ó (ii) cualquier persona que sin ser titular de la LINEA CONECT@T, sea la que periódicamente cubra los consumos realizados en dicha LINEA CONECT@T.</p>
        <p><strong>CORREO ELECTRÓNICO:</strong> Servicio que le permite a EL CONSUMIDOR enviar y/o recibir y/o almacenar información vía electrónica, cuyos términos y condiciones se encuentran en el sitio web:</p>
        <p><strong>CUENTA INTERNET:</strong> Cuenta de acceso al SERVICIO que permite identificar a EL CONSUMIDOR en forma personal, a través de los ELEMENTOS DE IDENTIFICACIÓN.</p>
        <p><strong>ELEMENTOS DE IDENTIFICACIÓN:</strong> Conjunto de elementos que identifican a EL CONSUMIDOR en particular, los cuales se indican a continuación:</p>
        <ul>
            <li><strong>NOMBRE DEL USUARIO (Username):</strong> Nombre seleccionado unilateralmente por EL CONSUMIDOR como identificación propia, para acceder y usar el SERVICIO. Este nombre puede ser diferente del nombre, denominación o razón social de la persona física o moral que haya contratado el SERVICIO.</li>
            <li><strong>CONTRASEÑA (Password):</strong> Conjunto de letras y/o números determinado unilateralmente por EL CONSUMIDOR, como una identificación personal para hacer uso del SERVICIO y acceder a su correo electrónico.</li>
        </ul>
        <p><strong>EQUIPO DE CÓMPUTO:</strong> Equipo de cómputo de escritorio ó portátil y/o cualquier otro dispositivo electrónico propiedad de EL CONSUMIDOR que sea compatible para el uso del SERVICIO.</p>
        <p><strong>EQUIPO TERMINAL:</strong> Dispositivo modem propiedad de CONECT@T que permitirá a EL CONSUMIDOR enviar o recibir información por Internet.</p>
        <p><strong>IP:</strong> Por sus siglas en inglés “Internet Protocol” y se considera un protocolo o normatividad técnica para enviar y recibir datos a la Internet.</p>
        <p><strong>ESTABLECIMIENTO COMERCIAL:</strong> Establecimiento comercial que ofrezca el KIT DE CONEXIÓN a EL CONSUMIDOR.</p>
        <p><strong>FORMATO DE ENTREGA:</strong> Documento en el que quedará establecido, entre otros, el EQUIPO TERMINAL elegido por EL CONSUMIDOR, el cual deberá suscribirse por éste al recibir el KIT DE CONEXIÓN cuando EL CONSUMIDOR haya contratado el SERVICIO a través de: (i) las Tiendas Comerciales CONECT@T, (ii) la página web; (iii) llamando al Centro de Atención y Soporte Técnico a Clientes al 01 800 123 22 22, o al Centro de Información Comercial (CEICO) al +52 997 179 49 94; o bien; (iv) cualquier canal que CONECT@T tenga disponible.</p>
        <p><strong>DIRECCIÓN IP DINÁMICA:</strong> Dirección IP que cambia cada vez que EL CONSUMIDOR se conecta a Internet, su asignación la realiza el proveedor de Internet.</p>
        <p><strong>DIRECCIÓN IP ESTÁTICA (FIJA):</strong> Dirección IP asignada por el proveedor de Internet, la cual nunca cambia así se reinicie el EQUIPO DE CÓMPUTO y/o EQUIPO TERMINAL. La asignación de la IP ESTÁTICA (FIJA) será a solicitud de EL CONSUMIDOR y tiene un costo mensual conforme a las tarifas vigentes.</p>
        <p><strong>KIT DE CONEXIÓN:</strong> Paquete que contiene el software de acceso (CD), ACCESORIOS y el EQUIPO TERMINAL.</p>
        <p><strong>LÍNEA CONECT@T:</strong> Línea de telefonía básica directa alámbrica, que deberá tener contratada EL CONSUMIDOR con CONECT@T, para que EL CONSUMIDOR esté en aptitud de hacer uso del SERVICIO, en el entendido que éste no será prestado en troncales analógicas o digitales, líneas directas digitales conectadas a concentradores, líneas con multiplicadores y líneas Turbo Access ó LÍNEAS CONECT@T donde EL CONSUMIDOR esté utilizando servicios no compatibles con el SERVICIO.</p>
        <p><strong>SESIÓN DE INTERNET:</strong> Solicitud de acceso que realiza EL CONSUMIDOR para intercambiar información entre el EQUIPO TERMINAL y la red mundial de Internet.</p>
        <p><strong>VOZ SOBRE IP (VoIP):</strong> Protocolo que emplea diversos medios para convertir la voz en paquetes de datos, los cuales son transportados entre dos puntos a través de redes que utilizan el protocolo IP (Protocolo de Internet).</p> -->

        <h2>DESCRIPCIÓN DE SERVICIO</h2>
        <p>SERVICIO de acceso a Internet de banda ancha prestado por CONECT@T a través de la LÍNEA CONECT@T, el cual permite a EL CONSUMIDOR navegar en Internet, de acuerdo con la modalidad del SERVICIO elegida por EL CONSUMIDOR, cuyas características se señalan en el Anexo “1” de las presentes CONDICIONES DEL SERVICIO.</p>
        <p>Para hacer uso del SERVICIO, EL CONSUMIDOR deberá ingresar los datos de la CUENTA DE INTERNET, y a partir de ese momento podrá enviar y/o recibir información vía electrónica de acuerdo con la modalidad del SERVICIO contratada. El SERVICIO será prestado con IP DINÁMICA y/o IP ESTÁTICA (FIJA) y bajo la modalidad elegida por EL CONSUMIDOR.</p>
        <p>El SERVICIO le permitirá a EL CONSUMIDOR hacer uso del servicio de telefonía básica y de Internet simultáneamente, sin que la conversación en su LÍNEA CONECT@T afecte la velocidad de acceso a Internet correspondiente a la modalidad del SERVICIO elegida.</p>
        <p>EL CONSUMIDOR reconoce y acepta que al realizar cualquier solicitud, activación, instalación, descarga, recepción, uso, aprovechamiento, acceso o pago del SERVICIO, dicho(s) acto(s) o hecho(s) constituye(n) una manifestación indubitable de su voluntad, tanto en lo que respecta a la contratación del SERVICIO, como para someterse expresamente a las presentes CONDICIONES DEL SERVICIO y las modificaciones al mismo que, en su oportunidad, le sean informadas por CONECT@T.</p>

        <!-- <h2>MODALIDADES DEL SERVICIO</h2>
        <p>La modalidad del SERVICIO elegida por EL CONSUMIDOR se contratará a través de: (i) las Tiendas Comerciales CONECT@T, (ii) la página web; (iii) llamando al Centro de Atención y Soporte Técnico a Clientes al +52 997 179 49 94, o al Centro de Información Comercial (CEICO) al +52 997 179 49 94; o bien; (iv) cualquier canal que CONECT@T tenga disponible.</p>
        <p>Cuando EL CONSUMIDOR obtenga el KIT DE CONEXIÓN, a través de un ESTABLECIMIENTO COMERCIAL, la modalidad del SERVICIO será elegida por EL CONSUMIDOR al momento de solicitar la contratación del SERVICIO llamando al Centro de Atención y Soporte Técnico a Clientes al +52 997 179 49 94.</p>
        <p>La prestación del SERVICIO en la modalidad elegida por EL CONSUMIDOR queda sujeta en todo momento a la condición de que CONECT@T cuente con la infraestructura y equipamiento necesario para prestar dicho servicio.</p>
        <p>EL CONSUMIDOR reconoce y acepta que si por razones técnicas de CONECT@T, no se pueda iniciar o continuar prestando el SERVICIO en la modalidad elegida por EL CONSUMIDOR, CONECT@T le informará a EL CONSUMIDOR tal situación, para que este último le indique: (i) si desea continuar con el SERVICIO bajo la modalidad que CONECT@T tenga disponible ó (ii) se proceda a la terminación de las presentes CONDICIONES DEL SERVICIO de acuerdo con lo señalado en la cláusula Décima Novena de éste instrumento.</p>
        <p>En caso de que EL CONSUMIDOR desee cambiar la modalidad del SERVICIO que hubiera elegido, deberá solicitar dicho cambio, llamando al Centro de Atención y Soporte Técnico a Clientes al +52 997 179 49 94, o al Centro de Información Comercial (CEICO) al +52 997 179 49 94, o bien, vía las Tiendas Comerciales CONECT@T, quien le indicará de manera inmediata la viabilidad del mismo.</p>
        <p>Para que CONECT@T pueda realizar el cambio de modalidad del SERVICIO solicitada por EL CONSUMIDOR, es necesario que: (i) se le haya facturado a EL CONSUMIDOR por lo menos un Cargo Mensual de la modalidad previamente elegida; (ii) exista la disponibilidad y facilidades técnicas para efectuar el cambio de modalidad solicitada; y (iii) EL CONSUMIDOR acepte el cargo correspondiente por concepto de cambio de modalidad, conforme a las tarifas y condiciones comerciales del SERVICIO que se encuentren vigentes. Una vez realizado el cambio de modalidad, CONECT@T ajustará el Cargo Mensual correspondiente, de conformidad con las tarifas y condiciones comerciales vigentes para dicha modalidad.</p> -->

        <h2>REQUISITOS PARA PRESTAR Y RECIBIR EL SERVICIO</h2>
        <p>Para que EL CONSUMIDOR esté en posibilidad de hacer uso del SERVICIO, es necesario que:</p>
        <ul>
            <li>La LÍNEA CONECT@T no tenga adeudos vencidos, no tenga órdenes de servicio en trámite, no esté suspendida, en proceso de baja o dada de baja; y pertenezca a una zona de cobertura donde CONECT@T cuente con la infraestructura y configuraciones necesarias para prestar el SERVICIO.</li>
            <li>Cuente con el KIT DE CONEXIÓN y el EQUIPO DE CÓMPUTO.</l>
        </ul>
        
        <!-- <h2>CANCELACIÓN PREVIA A LA ENTREGA DEL KIT DE CONEXIÓN</h2>
        <p>EL CONSUMIDOR podrá solicitar la cancelación de las presentes CONDICIONES DEL SERVICIO, en cuyo caso deberá dar aviso, llamando al Centro de Atención y Soporte Técnico a Clientes al +52 997 179 49 94 y siempre y cuando EL CONSUMIDOR no haya recibido el KIT DE CONEXIÓN, o bien, vía las Tiendas Comerciales CONECT@T.</p>
        <p>Cabe señalar que, si EL CONSUMIDOR solicita la cancelación posterior a la recepción del KIT DE CONEXIÓN, dicha solicitud será considerada como una terminación de las presentes CONDICIONES DEL SERVICIO en los términos de la cláusula Décima Novena de este instrumento.</p>
     -->
        <h2>KIT DE CONEXIÓN Y CONFIGURACIÓN DEL SERVICIO</h2>
        <p>La entrega del KIT DE CONEXIÓN y la configuración del SERVICIO se llevarán a cabo de conformidad con lo establecido en el Anexo “2” de las presentes CONDICIONES DEL SERVICIO.</p>
    
        <h2>ACTIVACIÓN DEL SERVICIO</h2>
        <p>El SERVICIO será activado en la LINEA CONECT@T en un máximo de 10 (diez) días naturales contados a partir de la fecha de contratación del mismo.</p>
        
        <h2>CAMBIO DE DOMICILIO</h2>
        <p>En caso de que EL CONSUMIDOR requiera cambiar la ubicación del domicilio en donde recibe el SERVICIO, deberá notificarlo, al Centro de Información Comercial (CEICO) al +52 997 179 49 94, o bien, vía las Tiendas Comerciales CONECT@T, con el objeto de verificar si existen en el nuevo domicilio las facilidades técnicas necesarias para la prestación del SERVICIO. La notificación antes señalada deberá efectuarse con cuando menos 30 (treinta) días naturales de anticipación a la fecha en que pretenda cambiar dicho domicilio.</p>
        <p>En el caso de que existan las facilidades técnicas necesarias para llevar a cabo el cambio de domicilio, EL CONSUMIDOR deberá pagar el cargo respectivo por cambio de domicilio conforme a las tarifas y condiciones comerciales vigentes del SERVICIO. CONECT@T realizará los cambios necesarios para prestar el SERVICIO en el nuevo domicilio de EL CONSUMIDOR, en un plazo máximo de 10 (diez) días naturales contados a partir de la fecha en que se haya comprobado que existían las facilidades técnicas referidas, quedando obligado EL CONSUMIDOR a instalar el KIT DE CONEXIÓN y configurar nuevamente el SERVICIO a través del software de acceso (CD) que se incluye dentro del KIT DE CONEXIÓN.</p>
        <p>Cabe señalar que el SERVICIO se continuará prestando bajo la misma modalidad elegida por EL CONSUMIDOR, en el entendido que dicha modalidad solo podrá ser cambiada por razones técnicas de CONECT@T que impidan conservar la misma, en cuyo caso, el cambio de modalidad no tendrá costo para EL CONSUMIDOR.</p>
        <p>En caso de que el nuevo domicilio no cumpla con las facilidades técnicas requeridas para continuar prestando el SERVICIO, CONECT@T procederá a dar por terminado el presente instrumento, de acuerdo con lo señalado en la cláusula Décima Novena de estas CONDICIONES DEL SERVICIO.</p>
    
        <h2>SOPORTE TÉCNICO</h2>
        <p>El SERVICIO contará con soporte técnico durante las 24 (veinticuatro) horas del día los 365 (trescientos sesenta y cinco) días del año, para lo cual EL CONSUMIDOR deberá comunicarse al Centro de Atención y Soporte Técnico a Clientes al +52 997 179 49 94, o bien, a cualquier otro centro de atención que se le indique, en caso de que:</p>
        <ul>
            <li>EL CONSUMIDOR requiera información para la configuración del EQUIPO TERMINAL en su EQUIPO DE CÓMPUTO; o</li>
            <li>Se presente una falla en el SERVICIO y/o EQUIPO TERMINAL (en lo sucesivo, “CASO DE FALLA”).</li>
        </ul>
        <p>EL CONSUMIDOR reconoce y acepta que en caso de que el SERVICIO no pueda ser prestado por fallas o daños imputables a EL CONSUMIDOR en los ACCESORIOS, este último deberá reemplazar dichos ACCESORIOS por su cuenta.</p>

        <!-- <h2>REEMPLAZO DEL EQUIPO TERMINAL</h2>
        <p>En caso de falla del SERVICIO, EL CONSUMIDOR deberá reportarla en forma inmediata al Centro de Atención y Soporte Técnico a Clientes al +52 997 179 49 94, o bien, a cualquier otro centro de atención que se le indique, con el objeto de que éste proceda a determinar si la falla se origina en la LÍNEA CONECT@T o en el EQUIPO TERMINAL.</p>
        <p>En caso de que la falla del SERVICIO se origine en el EQUIPO TERMINAL, se procederá de acuerdo con lo siguiente:</p>
        <ul>
            <li>(i) Si la falla del EQUIPO TERMINAL no es atribuible a EL CONSUMIDOR, CONECT@T realizará el reemplazo del mismo sin cargo alguno para EL CONSUMIDOR; y</li>
            <li>(ii) Si la falla es resultado de daño, afectación o robo del EQUIPO TERMINAL, causado por EL CONSUMIDOR, éste deberá cubrir el cargo por reemplazo de EQUIPO TERMINAL, de conformidad con la tarifa vigente, mismo que le será facturado en el Recibo Conect@T; en ambos casos, el reemplazo se efectuará de conformidad con lo establecido en el Anexo “2” de las presentes CONDICIONES DEL SERVICIO.</li>
        </ul> -->
       
        <h2>CUENTA INTERNET</h2>
        <p>EL CONSUMIDOR tendrá a través de la CUENTA INTERNET la conexión al SERVICIO de acuerdo a la modalidad del SERVICIO contratada.</p>
       
        <h2>CORREO ELECTRÓNICO</h2>
        <p>EL CONSUMIDOR es el único responsable por el uso del CORREO ELECTRÓNICO, quedando expresamente prohibida la distribución masiva de mensajes electrónicos.</p>
        <p>Es responsabilidad de EL CONSUMIDOR consultar en su CORREO ELECTRÓNICO la barra de utilización del mismo con la finalidad de identificar la capacidad que tiene disponible para seguir recibiendo mensajes electrónicos y en su caso, suprimir los mensajes almacenados en el referido CORREO ELECTRÓNICO, a fin de mantener la capacidad del mismo. Dichos mensajes electrónicos quedarán almacenados hasta alcanzar la capacidad máxima del CORREO ELECTRÓNICO. Una vez que se haya excedido esta capacidad, los nuevos mensajes electrónicos entrantes serán rechazados en forma automática, en virtud de lo cual, EL CONSUMIDOR será responsable de almacenar los mensajes electrónicos que considere necesarios en un medio propio.</p>
        <p>CONECT@T no será responsable del contenido e integridad de los mensajes electrónicos depositados en el CORREO ELECTRÓNICO de EL CONSUMIDOR y de los que él emita, en virtud de que CONECT@T no puede tener acceso a la información o contenido que se transmite a través de este medio entre los usuarios de Internet.</p>
        <p>Las políticas de uso del CORREO ELECTRÓNICO se encuentran en el sitio web, por lo que EL CONSUMIDOR será responsable de cumplir íntegramente con las mismas.</p>

        <h2>APLICACIONES</h2>
        <br>CONECT@T podr&#225; proporcionar a EL CONSUMIDOR algunas aplicaciones (programas de software) que pueden ser necesarias para el buen funcionamiento del SERVICIO, las cuales estar&#225;n dise&#241;adas para evitar cualquier conflicto al ejecutarse simult&#225;neamente con otras aplicaciones que existan en el EQUIPO DE C&#211;MPUTO de EL CONSUMIDOR y sin generar invasi&#243;n a su informaci&#243;n personal. EL CONSUMIDOR se obliga a instalar correctamente dichas aplicaciones en su EQUIPO DE C&#211;MPUTO y utilizarlas de acuerdo a las instrucciones que al efecto le indique CONECT@T, en el entendido que en caso de que EL CONSUMIDOR no las instale correctamente y/o no mantenga las mismas instaladas en su EQUIPO DE C&#211;MPUTO, CONECT@T no ser&#225; responsable por un funcionamiento incorrecto o deficiente del SERVICIO.</p>

        <!-- <h2>POL&#205;TICAS DE USO DEL SERVICIO</h2>
        <br>EL CONSUMIDOR reconoce y acepta que:<br>
        a) Conoce la naturaleza de Internet y sus limitaciones, as&#237; como sus cualidades t&#233;cnicas y los tiempos de respuesta para consultar o transferir datos e informaci&#243;n.<br>
        b) Los fen&#243;menos sociales, pol&#237;ticos, culturales, entre otros, pueden provocar en un momento dado que el uso de Internet, se incremente extraordinariamente de manera que las condiciones de operaci&#243;n &#243;ptima se vean afectadas, ocasionando una saturaci&#243;n temporal que provoque lentitud en el SERVICIO, en el entendido de que si el SERVICIO no cumple con las caracter&#237;sticas establecidas en las presentes CONDICIONES DEL SERVICIO EL CONSUMIDOR podr&#225; solicitar la terminaci&#243;n, conforme a la cl&#225;usula D&#233;cima Novena de &#233;ste instrumento.<br>
        c) Internet es una red de redes de uso p&#250;blico y compartido, y la paralizaci&#243;n o saturaci&#243;n de otra red puede mermar el comportamiento del SERVICIO.<br>
        d) Dado que la Internet es una red p&#250;blica internacional, CONECT@T no puede garantizar el tiempo de llegada de un paquete de informaci&#243;n, tiempo conocido como “Latencia”.<br>
        e) Los datos que circulan en Internet no tienen protecci&#243;n ni garant&#237;a de confidencialidad y que se pueden exponer y desviar, por lo que la difusi&#243;n de cualquier informaci&#243;n que EL CONSUMIDOR transmita o reciba a trav&#233;s de Internet ser&#225; bajo su cuenta y riesgo.<br>
        f) Los datos que circulan en Internet pueden estar sometidos a un reglamento en lo que se refiere a su uso o estar protegidas por un derecho de propiedad intelectual, por lo que EL CONSUMIDOR acepta ser el &#250;nico responsable del uso de los datos que consulte, transmita o reciba a trav&#233;s de Internet.<br>
        g) CONECT@T no ser&#225; responsable acerca de la precisi&#243;n o calidad de la informaci&#243;n que pueda ser obtenida a trav&#233;s del SERVICIO, por lo que el uso de cualquier informaci&#243;n obtenida a trav&#233;s del SERVICIO es bajo la responsabilidad y riesgo de EL CONSUMIDOR.<br>
        h) Siendo Internet una red de redes p&#250;blicas, CONECT@T no ser&#225; responsable por cualquier da&#241;o y/o perjuicio que sufra EL CONSUMIDOR por p&#233;rdida de informaci&#243;n, ocasionada por configuraci&#243;n, retardos, no entregas, entregas err&#243;neas, interrupci&#243;n del SERVICIO o descargas de programas en Internet por parte de EL CONSUMIDOR en el EQUIPO DE C&#211;MPUTO.<br>
        i) Cualquier informaci&#243;n, producto, servicio y/o aplicaci&#243;n que se encuentren disponibles a trav&#233;s de Internet y que sean diferentes de aquellas identificadas expresamente como incluidas en el SERVICIO, son proporcionadas por terceros, por lo que ser&#225; responsabilidad de esos terceros mantener y soportar su informaci&#243;n, productos, servicios y/o aplicaciones.<br>
        j) La informaci&#243;n a la que puede acceder EL CONSUMIDOR a trav&#233;s del SERVICIO, pueden incluir im&#225;genes, sonidos, textos u otros contenidos que algunas personas pueden encontrar ofensivos o no aptos para menores de edad, por lo que la protecci&#243;n del acceso a dicha informaci&#243;n es responsabilidad y riesgo de EL CONSUMIDOR.<br>
        k) La comunidad de Internet practica un c&#243;digo de conducta denominado "NETIQUETTE", mismo que podr&#225; ser consultado por EL CONSUMIDOR en el sitio web, por lo que si EL CONSUMIDOR no respeta dicho c&#243;digo puede recibir represalias masivas de esta comunidad e incluso ser excluido del acceso a Internet. En ning&#250;n caso, CONECT@T podr&#225; ser considerado como responsable de tales represalias o exclusi&#243;n.<br>
        l) Queda a su cargo adoptar las medidas necesarias para proteger la informaci&#243;n, datos y/o software de su propiedad de eventuales accesos desde Internet a su EQUIPO DE C&#211;MPUTO, o bien para evitar una posible contaminaci&#243;n por virus o ataques de usuarios que est&#233;n circulando por Internet, por lo que CONECT@T no ser&#225; responsable de cualesquiera da&#241;os y perjuicios causados a EL CONSUMIDOR por los hechos antes se&#241;alados.<br>
        m) CONECT@T podr&#225; suspender el SERVICIO por cualquiera de las causas que se se&#241;alan en las presentes CONDICIONES DEL SERVICIO.<br>
        n) Internet es un servicio p&#250;blico de car&#225;cter internacional, por lo que CONECT@T no es ni ser&#225; responsable directo o indirecto de las acciones administrativas, t&#233;cnicas o regulatorias que terceros apliquen en sus redes para proteger la integridad de su informaci&#243;n, sistemas, aplicaciones, usuarios, entre otros.<br>
        o) En la contrataci&#243;n del SERVICIO con DIRECCI&#211;N IP EST&#193;TICA (FIJA), se ofrece asistencia en problemas relacionados &#250;nicamente con la navegaci&#243;n en Internet, por lo que CONECT@T no ser&#225; responsable de brindarle alg&#250;n tipo de soporte relacionado con el EQUIPO DE C&#211;MPUTO, la red de EL CONSUMIDOR o bien aplicaciones propiedad de EL CONSUMIDOR.<br>
        p) Es de su exclusiva responsabilidad el uso que haga del SERVICIO, por lo que CONECT@T queda excluido de cualquier responsabilidad por los resultados de funcionalidad y seguridad de la informaci&#243;n que env&#237;a y/o recibe a trav&#233;s del SERVICIO.<br>
        q) Se podr&#225;n realizar los cambios de direcciones IP EST&#193;TICAS (FIJAS), en cualquier momento, previa notificaci&#243;n a EL CONSUMIDOR, cuando se considere necesario con el fin de mantener una correcta operaci&#243;n del SERVICIO, por lo que EL CONSUMIDOR ser&#225; responsable de realizar las adecuaciones y configuraciones necesarias al EQUIPO DE C&#211;MPUTO o aplicaciones de su propiedad.<br>
        r) Las direcciones IP EST&#193;TICAS (FIJAS) son &#250;nicamente para uso del SERVICIO, por lo que no podr&#225;n ser cedidas, transferidas o gravadas en forma alguna por EL CONSUMIDOR.<br>
        s) A la terminaci&#243;n o cancelaci&#243;n de las presentes CONDICIONES DEL SERVICIO, las direcciones IP EST&#193;TICAS (FIJAS) asignadas a EL CONSUMIDOR podr&#225;n ser reasignadas.<br>
        t) El SERVICIO &#250;nicamente podr&#225; ser utilizado para la navegaci&#243;n en Internet y para el uso del CORREO ELECTR&#211;NICO con el dominio seleccionado por EL CONSUMIDOR o cualquier otro dominio que CONECT@T determine, por lo que cualquier otro uso que EL CONSUMIDOR realice, quedar&#225; bajo su responsabilidad, quedando CONECT@T deslindado de brindar cualquier tipo de soporte o asistencia a EL CONSUMIDOR y pudiendo CONECT@T cancelar las presentes CONDICIONES DEL SERVICIO de conformidad con lo se&#241;alado en la cl&#225;usula Vig&#233;sima de &#233;ste instrumento.<br>
        u) CONECT@T no es responsable de: (i) la compatibilidad, confiabilidad o funcionamiento del software mediante el cual se realiza el acceso a Internet; (ii) la disponibilidad de programas para la navegaci&#243;n en Internet o de aplicaciones de la misma en el EQUIPO DE C&#211;MPUTO; y (iii) la falta de capacidad de navegaci&#243;n de EL CONSUMIDOR por problemas de configuraci&#243;n de su EQUIPO DE C&#211;MPUTO o software.</p>
         -->
        <!-- <h2>TARIFAS Y CONDICIONES DE PAGO</h2>
        <br>EL CONSUMIDOR se obliga a pagar a CONECT@T las cantidades correspondientes a los siguientes conceptos:</p>
        <p>1. Gastos de Habilitaci&#243;n: Es la contraprestaci&#243;n que EL CONSUMIDOR pagar&#225; a CONECT@T por la habilitaci&#243;n del SERVICIO, con base a las tarifas y pol&#237;ticas vigentes del SERVICIO.
        <br>Los referidos Gastos de Habilitaci&#243;n ser&#225;n facturados a EL CONSUMIDOR en el per&#237;odo de facturaci&#243;n siguiente a la fecha de contrataci&#243;n del SERVICIO.</p>
        <p>2. Cargo Mensual: Es la contraprestaci&#243;n mensual que EL CONSUMIDOR pagar&#225; a CONECT@T por concepto del SERVICIO.
            <br>El Cargo Mensual ser&#225; pagado de acuerdo a la tarifa vigente para la modalidad del SERVICIO elegida por EL CONSUMIDOR y conforme al ciclo de facturaci&#243;n que le corresponda.
            <br>El Cargo Mensual es independiente de cualquier otro cargo por otros servicios que se le presten a EL CONSUMIDOR y por ende no incluye cargos, tales como, servicio medido, larga distancia o cualquier otro servicio contratado en la L&#205;NEA CONECT@T.
            <br>La facturaci&#243;n de los cargos antes se&#241;alados, se realizar&#225; a trav&#233;s del recibo CONECT@T y deber&#225;n ser pagados en la fecha se&#241;alada en el mismo. EL CONSUMIDOR reconoce y acepta, que en caso de que los Cargos Mensuales del SERVICIO no puedan incluirse en el recibo CONECT@T o cuenta maestra de CONECT@T, como resultado de la baja o terminaci&#243;n de la L&#205;NEA CONECT@T, EL CONSUMIDOR deber&#225; pagar de manera inmediata cualquier monto adeudado conforme a las presentes CONDICIONES DEL SERVICIO, en el lugar y fecha que para tal efecto le notifique esta &#250;ltima.</p>
            <p>Si por cualquier circunstancia EL CONSUMIDOR no recibe el recibo CONECT@T en su domicilio, &#233;ste se obliga a: (i) consultar el mismo a trav&#233;s de la p&#225;gina web, o bien solicitar copia en cualquier Tienda Comercial de CONECT@T, dentro del horario de atenci&#243;n de 8:00 a 15:00 horas de lunes a viernes y (ii) efectuar el pago correspondiente.</p>
            <p>En caso de que EL CONSUMIDOR no reciba la Cuenta Maestra de CONECT@T, &#233;ste podr&#225;: (i) consultarla a trav&#233;s de la p&#225;gina web, o bien solicitar copia a su ejecutivo de cuenta y (ii) efectuar el pago correspondiente.</p>
            <p>Las PARTES acuerdan, que si el pago del SERVICIO no es cubierto por EL CONSUMIDOR dentro de la fecha l&#237;mite de pago, estipulada en el recibo CONECT@T o Cuenta Maestra, CONECT@T proceder&#225; a suspender la prestaci&#243;n del SERVICIO de conformidad con lo establecido en el Contrato Marco.</p>
             -->
            <!-- <h2>CONDICIONES PARA EL USO DEL SERVICIO</h2>
            <br>EL CONSUMIDOR deber&#225; abstenerse de acceder, alterar o destruir cualquier informaci&#243;n que no sea de su propiedad y, en general, de efectuar o permitir cualquier acto en contra de los intereses de CONECT@T y/o de cualquiera de sus clientes, que directa o indirectamente puedan repercutir en las actividades o imagen de negocios de CONECT@T o de cualesquiera de sus clientes.</p>
            <p>Estas CONDICIONES DEL SERVICIO no autorizan y por lo tanto no permiten: (i) la comercializaci&#243;n, venta o reventa del SERVICIO; (ii) la comercializaci&#243;n, venta o reventa de aplicaciones sobre la base del SERVICIO para prestar servicios de telecomunicaciones o para realizar actividades tales como transportar o re originar tr&#225;fico p&#250;blico conmutado originado en otra ciudad o pa&#237;s, as&#237; como realizar actividades de regreso de llamadas (Call-Back) y puenteo de llamadas (By-Pass); y (iii) la conexi&#243;n del SERVICIO por parte de EL CONSUMIDOR con terceros que se ubiquen fuera del domicilio de EL CONSUMIDOR a trav&#233;s de cualquier tecnolog&#237;a que le permita al tercero hacer uso del SERVICIO, en el entendido que EL CONSUMIDOR ser&#225; responsable de tomar las medidas que sean necesarias para evitar el acceso al SERVICIO a cualquier tercero que no se encuentre dentro del domicilio de EL CONSUMIDOR.</p>
            <p>Para que EL CONSUMIDOR pueda utilizar el SERVICIO como un medio de transmisi&#243;n de VOZ SOBRE IP (VoIP), la empresa que le ofrezca dicho servicio a EL CONSUMIDOR deber&#225;: (i) contar con la autorizaci&#243;n, permiso o concesi&#243;n para prestar servicios b&#225;sicos de telecomunicaciones en M&#233;xico; y (ii) prestar el servicio de acuerdo con la legislaci&#243;n Mexicana vigente.</p>
            <p>Queda bajo la responsabilidad de EL CONSUMIDOR limitar, restringir, evitar, prohibir e impedir que cualquier tercero haga mal uso, abuso o uso no autorizado del SERVICIO.</p>
            <p>En caso de contravenir lo estipulado en la presente cl&#225;usula, EL CONSUMIDOR ser&#225; responsable de los da&#241;os y perjuicios que resulten, sin perjuicio del derecho de CONECT@T de cancelar las presentes CONDICIONES DEL SERVICIO y exigir el pago de las contraprestaciones pendientes a cargo de EL CONSUMIDOR.</p>
            <p>EL CONSUMIDOR reconoce y acepta que el SERVICIO es para uso interno de su Negocio/Empresa por lo que EL CONSUMIDOR no podr&#225; comercializar, vender o revender el servicio de internet. En caso de exceder el volumen de tr&#225;fico en gigabytes contratado, EL CONSUMIDOR acepta que CONECT@T podr&#225;: (i) finalizar cualquier SESI&#211;N DE INTERNET cuando rebase su l&#237;mite contratado, (ii) suspender o limitar el volumen de datos transferidos, (iii) limitar el tiempo por per&#237;odos, de acuerdo a la modalidad del SERVICIO contratado, y (iv) cobrar el excedente por cada gigabyte adicional el cual ser&#225; facturado en el recibo Conect@T.</p> -->

            <!-- <2h>RESPONSABILIDAD</2h>
            <br>EL CONSUMIDOR deber&#225; abstenerse de hacer uso del SERVICIO para fines no autorizados conforme al presente instrumento.
            <br>El uso de la CUENTA INTERNET es responsabilidad de EL CONSUMIDOR, por lo que se considera que cualquier conexi&#243;n a Internet, as&#237; como la transmisi&#243;n de datos utilizando dicha CUENTA INTERNET, se atribuir&#225; a EL CONSUMIDOR.</p>
            <p>En virtud de que en Internet existe informaci&#243;n que puede incluir im&#225;genes, sonidos, textos u otros contenidos que algunas personas pueden encontrar ofensivos o no aptos para menores de edad, ser&#225; responsabilidad de EL CONSUMIDOR el permitir su CUENTA INTERNET a menores de edad que eventualmente pudieran acceder a este tipo de informaci&#243;n.</p>
            <p>En caso de robo o extrav&#237;o de los ELEMENTOS DE IDENTIFICACI&#211;N de EL CONSUMIDOR, &#233;ste lo deber&#225; reportar inmediatamente al Centro de Atenci&#243;n y Soporte T&#233;cnico a Clientes al +52 997 179 49 94, a fin de que sea suspendida la CUENTA INTERNET y se le asigne una nueva.</p>
            <p>EL CONSUMIDOR libera expresamente a CONECT@T de cualquier responsabilidad que se derive o se relacione con accesos no autorizados, robo, da&#241;o, destrucci&#243;n o desviaci&#243;n de la informaci&#243;n que EL CONSUMIDOR consulte, transmita o reciba a trav&#233;s del SERVICIO y en general, de cualquier reclamaci&#243;n, demanda o acci&#243;n legal que pudiera derivarse del uso del SERVICIO por parte de EL CONSUMIDOR.</p>
             -->
            <h2>VIGENCIA</h2>
            <br>La vigencia de las presentes CONDICIONES DEL SERVICIO ser&#225; por tiempo indeterminado y entrar&#225;n en vigor a partir de la fecha en que EL CONSUMIDOR contrate el SERVICIO.</p>
            
            <h2>TERMINACI&#211;N</h2>
            <br>EL CONSUMIDOR podr&#225; solicitar la terminaci&#243;n de las presentes CONDICIONES DEL SERVICIO, en cuyo caso deber&#225; dar aviso a CONECT@T, llamando al Centro de Atenci&#243;n y Soporte T&#233;cnico a Clientes al +52 997 179 49 94 o, bien, v&#237;a las Tiendas Comerciales CONECT@T, quedando obligado EL CONSUMIDOR a cumplir con las obligaciones que para este supuesto se establecen en el Anexo “2” de las presentes CONDICIONES DEL SERVICIO.
            <br>CONECT@T podr&#225; dar por terminado las presentes CONDICIONES DEL SERVICIO, sin expresi&#243;n de causa y sin responsabilidad alguna con el &#250;nico requisito de dar aviso por escrito a EL CONSUMIDOR con una anticipaci&#243;n de 3 (tres) d&#237;as, quedando obligado EL CONSUMIDOR a cumplir con las obligaciones que para este supuesto se establecen en el Anexo “2” de las presentes CONDICIONES DEL SERVICIO.</p>
            
            <h2>CANCELACI&#211;N</h2>
            <br>Las presentes CONDICIONES DEL SERVICIO se cancelaran en forma inmediata y sin necesidad de declaraci&#243;n judicial, en caso de que EL CONSUMIDOR:<br>
            a. Cambie su domicilio, sin el aviso correspondiente a CONECT@T de conformidad con lo estipulado en la cl&#225;usula Octava de este instrumento.<br>
            b. Contravenga lo estipulado en la cl&#225;usula D&#201;CIMA SEXTA de las presentes CONDICIONES DEL SERVICIO.<br>
            c. No acepte realizar las modificaciones a la configuraci&#243;n que sean necesarias realizar al EQUIPO TERMINAL de conformidad con lo establecido en el Anexo “2” de las presentes CONDICIONES DEL SERVICIO.<br>
            d. Contravenga las pol&#237;ticas de uso del CORREO ELECTR&#211;NICO que se establecen en la cl&#225;usula D&#201;CIMA SEGUNDA de las presentes CONDICIONES DEL SERVICIO.<br>
            En caso de que las presentes CONDICIONES DEL SERVICIO sean canceladas, EL CONSUMIDOR se obliga a cumplir con las obligaciones que para este supuesto se establecen en el Anexo “2” de las presentes CONDICIONES DEL SERVICIO.</p>
            
            <h2>ANEXOS</h2>
            <br>Los anexos de estas CONDICIONES DEL SERVICIO forman parte integrante de las mismas y contienen derechos y obligaciones a cargo de las mismas que son plenamente reconocidos por ellas.</p>
            
            <h2>NOTIFICACIONES</h2>
            <br>Todas las notificaciones que las PARTES deban darse conforme a las presentes CONDICIONES DEL SERVICIO, se efectuar&#225;n en los domicilios que a continuaci&#243;n se se&#241;alan:<br>
            CONECT@T:
            <br>Km. 41+400, Muna - Felipe Carrillo Puerto, 97880 Oxkutzcab, Yuc.<br>
            EL CONSUMIDOR:
            <br>Domicilio registrado en la LINEA CONECT@T en la cual se contrat&#243; el SERVICIO.
            <br>En caso de cambio de domicilio para recibir notificaciones las PARTES se obligan a dar el aviso correspondiente a la otra parte con 15 (quince) d&#237;as naturales de anticipaci&#243;n a que dicho cambio de domicilio ocurra. En tanto las PARTES no se notifiquen por escrito el cambio de domicilio, todas las notificaciones se entender&#225;n v&#225;lidamente practicadas en los domicilios indicados en las presentes CONDICIONES DEL SERVICIO.</p>
            
    </div>
        
    <div class="contract-section">
        <div class="header2">
            <img src="images/logo1.png" alt="logo de Conect@T">
            <h1>SERVICIO CONECT@T</h1>
        </div>  
            
        <table class="main-table">
            <tr>
                <td>
                    <div class="header2-cell">INFORMACIÓN DEL CLIENTE</div>
                    <table class="section-table">
                        <tr>
                            <td><strong>Nombre:</strong></td>
                            <td>{{ $cliente->nombre_completo }}</td>
                        </tr>
                            
                        <tr>
                            <td><strong>Correo Electrónico:</strong></td>
                            <td>{{ $cliente->correo_electronico }}</td>
                        </tr>
                            
                        <tr>
                            <td><strong>Teléfono:</strong></td>
                            <td>{{ $cliente->telefono }}</td>
                        </tr>
                            
                        <tr>
                            <td><strong>Dirección:</strong></td>
                            <td>{{ $cliente->direccion }}</td>
                        </tr>
                            
                        <tr>
                            <td><strong>Código Postal:</strong></td>
                            <td>{{ $cliente->cp }}</td>
                        </tr>
                           
                        <tr>
                            <td><strong>Municipio:</strong></td>
                            <td>{{ $cliente->municipio }}</td>
                        </tr>
                    </table>
                </td>
                    
                <td>
                    <div class="header2-cell">DETALLES DEL SERVICIO CONTRATADO</div>
                    <table class="section-table">
                        <tr>
                            <td><strong>Paquete Elegido:</strong></td>
                            <td>{{ $cliente->nombre_paquete->nombre_paquete }}</td>
                        </tr>
                            
                        <tr>
                            <td><strong>Características del Paquete:</strong></td>
                            <td>{{ $cliente->nombre_paquete->caracteristicas_paquete }}</td>
                        </tr>
                        
                        <tr>
                            <td><strong>Precio Mensual:</strong></td>
                            <td>${{ $cliente->nombre_paquete->precio }}</td>
                        </tr>
                        
                        <tr>
                            <td><strong>Velocidad de Conexión:</strong></td>
                            <td>{{ $cliente->nombre_paquete->velocidad_paquete }} Mbps</td>
                        </tr>
                    </table>
                </td>
            </tr>
        
        </table>
            
        <p>Le&#205;das las CONDICIONES DEL SERVICIO de Conet@T Negocio, que forman parte integral del Contrato Marco de Prestaci&#243;n de Servicios, se suscribe este documento en duplicado. Un original permanecerá en poder de CONET@T y el otro en poder del CONSUMIDOR. Ambas partes firman este contrato en la Ciudad de _________________, a los _____ d&#237;as del mes de _________________ de ________.</p>
           
        <P>El firmante declara haber leído y aceptado los términos y condiciones del servicio descritos en este contrato. Además, confirme que la información proporcionada es veraz y válida para la ejecución del servicio solicitado.</P>
            
        <p>Fecha de inicio del contrato: ___________________________</p>
            
        <div class="signature">
                <p class="signature-line">Firma del cliente</p>
                <p class="client-name">{{ $cliente->nombre_completo }}</p>
        </div>

    </div>



</body>
</html>
