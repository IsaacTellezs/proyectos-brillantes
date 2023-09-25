
<?php
 require 'php/conexion.php';
  
 
 $nombrecompleto  = $_POST['nombrecompleto'];
 $mensaje  = $_POST['mensaje'];
 $email = $_POST['email'];


$insertar = "INSERT INTO contacto VALUES ('','$nombrecompleto','$mensaje') ";

$query = mysqli_query($conectar, $insertar);

if($query){

   echo "<script> alert('correcto');
    location.href = '#';
   </script>";

}else{
    echo "<script> alert('incorrecto');
    location.href = 'contact.php';
    </script>";
}
