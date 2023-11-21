<?php
 require 'php/conexion.php';
  
 
 $nombre  = $_POST['nombre'];

 $motivo = $_POST['motivo'];

 $email= $_POST['email'];


$insertar = "INSERT INTO contacto VALUES ('','$nombre','$motivo','$email') ";

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

