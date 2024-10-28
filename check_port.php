<?php
$server = 'smtp.gmail.com';
$port = 587;

$connection = fsockopen($server, $port, $errno, $errstr, 10); // Timeout de 10 segundos

if (!$connection) {
    echo "No se pudo conectar a $server en el puerto $port. Error: $errstr ($errno)";
} else {
    echo "Conexión exitosa a $server en el puerto $port";
    fclose($connection);
}
?>
