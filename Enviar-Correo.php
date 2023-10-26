<?php
require 'php/conexion.php';

$email = $_POST['correo-enviado'];


$insertar = "INSERT INTO correo (CORREO) VALUES ('$email')";
$query = mysqli_query($conectar, $insertar);

if ($query) {
    echo "<script>alert('Correcto');
    location.href = 'confirmacion-contacto.php';
    </script>";
} else {
    echo "<script>alert('Incorrecto');
    location.href = 'contact.php';
    </script>";
}
?>
