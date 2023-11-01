<?php

require_once('conex.php');
conectar();
$usuario = $_POST['nom_usuario'];
$pass = $_POST['new_password'];

// Generar un hash seguro de la contraseña
$hashed_password = password_hash($pass, PASSWORD_DEFAULT);
$query = "UPDATE `datos_personales` SET `contraseña` = '$hashed_password' WHERE `nom_usuario` = '$usuario'";

//$query = "UPDATE usuarios SET New.clave = ‘$pass’ AES_ENCRYPT(NEW.clave, '061219') WHERE usuario = '$usuario'";

if ($conexion->query($query) === TRUE) {
    // La consulta se ejecutó correctamente
    header("Location: ../index.php?message=success_password");
} else {
    // Hubo un error en la consulta
    echo "Error al actualizar la contraseña: " . $conexion->error;
   
}

$conexion->close();
?>