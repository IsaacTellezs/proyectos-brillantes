<?php
session_start();
error_reporting(0);
require 'conex.php';
require 'funciones.php';

$usuario = $_POST['txt-email'];
$clave = $_POST['txt-clave'];

conectar();
$_SESSION['Correo'] = $usuario;

if( validarLogin($usuario, $clave) ) {
echo "valida";
// Accedemos al sistema
header('Location: ../index.php');
exit(); 
} 

else {
    $errorMensaje = "Las credenciales son incorrectas. Por favor, intenta nuevamente.";
    header('Location: ../login.php?error=' . urlencode($errorMensaje));
    exit(); 

$consulta = "SELECT* FROM desarrolladores where Correo = '$usuario' and Contraseña = '$clave' ";
$resultado = mysqli_query($conexion, $consulta);

$filas=mysqli_fetch_array($resultado);

if($filas['id_desarrollador']==1){

    header("location:proyectos-brillantes-Pruebas%20-%20copia/index.php");    
} else
if($filas['id_desarrollador']==6){

    header("location:proyectos-brillantes-Pruebas%20-%20copia/index.php");
} else
if($filas['id_desarrollador']==7){

    header("location:proyectos-brillantes-Pruebas%20-%20copia/index.php");
} else
if($filas['id_desarrollador']==8){

    header("location:proyectos-brillantes-Pruebas%20-%20copia/index.php");
} else
if($filas['id_desarrollador']==9){

    header("location:proyectos-brillantes-Pruebas%20-%20copia/index.php");
} else
if($filas['id_desarrollador']==10){

    header("location:proyectos-brillantes-Pruebas%20-%20copia/index.php");
} else
if($filas['id_desarrollador']==11){

    header("location:proyectos-brillantes-Pruebas%20-%20copia/index.php");
} else {
?>
<?php
desconectar();
}
}
?>