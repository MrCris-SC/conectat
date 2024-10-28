<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    #Obtener datos del formulario
    $nombre_usuario = $_POST['nombre'];
    $correo_usuario = $_POST['correo'];

    $direccion_itssy = "Carretera Muna-Felipe Carrillo Puerto, Tramo Oxkutzcab-Akil, Km. 41+400, C.P. 97880 Oxkutzcab, Yucatán";

    $asunto = "Confirmación de Precontrato";
    $mensaje = "Hola $nombre_usuario,\n\nGracias por realizar tu precontrato. Te esperamos en el siguiente local:\n\n$direccion_itssy\n\nSaludos,\nEquipo de ITSSY.";

    $headers = "From: no-reply@itssy.edu.mx";

    #Envío del correo
    if (mail($correo_usuario, $asunto, $mensaje, $headers)) {
        echo "Correo enviado correctamente a $correo_usuario";
    } else {
        echo "Error al enviar el correo.";
    }
}
