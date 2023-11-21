<?php
require 'php/conexion.php';

$nombre_completo  = $_POST['nombre_completo'];

$motivo = $_POST['motivo'];

$correo_electronico= $_POST['correo_electronico'];


$insertar = "INSERT INTO contacto VALUES ('$nombre_completo ','$motivo','$correo_electronico') ";

$query = mysqli_query($conectar, $insertar);

if($query){

echo "<script> alert('correcto');
location.href = 'confirmacion-contacto.php';
</script>";

}else{
echo "<script> alert('incorrecto');
location.href = 'contact.php';
</script>";
}