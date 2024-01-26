<?php
require 'php/conexion.php';

// Suponiendo que tu conexión ya está establecida en $conectar

$nombre_completo = $_POST['nombre_completo'];
$motivo = $_POST['motivo'];
$correo_electronico = $_POST['correo_electronico'];

// Utilizar declaraciones preparadas para evitar inyecciones SQL
$insertar = $conectar->prepare("INSERT INTO contacto (nombre_completo, motivo, correo_electronico) VALUES (?, ?, ?)");
$insertar->bind_param("sss", $nombre_completo, $motivo, $correo_electronico);

if ($insertar->execute()) {
    echo "<script> alert('correcto'); location.href = 'confirmacion-contacto.php'; </script>";
} else {
    echo "<script> alert('incorrecto'); location.href = 'contact.php'; </script>";
}

$insertar->close();
$conectar->close();
?>
