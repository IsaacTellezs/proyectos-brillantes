<?php
require 'conex.php';
require 'funciones.php';

$usuario = $_POST['txt-email'];
$clave = $_POST['txt-clave'];

//$password=password_hash($_POST['password'],PASSWORD_DEFAULT);
conectar();
$_SESSION['Correo'] = $usuario;

if( validarLoginInversionista($usuario, $clave) ) {
echo "valida";
// Accedemos al sistema
header('Location: ../index.php');
exit(); 
} 

else {
    $errorMensaje = "Las credenciales son incorrectas. Por favor, intenta nuevamente.";
    header('Location: ../login-inversionista.php?error=' . urlencode($errorMensaje));
    exit(); 
?>
<?php
desconectar();
}


?>