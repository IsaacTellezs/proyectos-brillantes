<?php
require 'conex.php';
require 'funciones.php';

$usuario = $_POST['txt-email'];
$clave = $_POST['txt-clave'];

//$password=password_hash($_POST['password'],PASSWORD_DEFAULT);
conectar();
$_SESSION['correo'] = $usuario;

global $conexion;
// Realiza una consulta para buscar al usuario por correo
$sql = "SELECT correo, contraseña, tipo_usuario FROM usuarios WHERE correo = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    // Si se encuentra un usuario con el correo proporcionado
    $row = $result->fetch_assoc();
    $hashGuardado = $row['contraseña'];
    $tipoUsuario = $row['tipo_usuario'];

    // Verifica la contraseña proporcionada con el hash almacenado
    if (password_verify($clave, $hashGuardado)) {
        // Verifica si el usuario es un inversionista
        if ($tipoUsuario == "inversionista") {
            session_start();
            $_SESSION['Correo'] = $usuario;

            header('Location: ../index.php');
            exit(); 

        } else {
            // Si no es un inversionista, devuelve false
            $errorMensaje = "Usted no es inversionista.";
            header('Location: ../login-inversionista.php?error=' . urlencode($errorMensaje));
            exit(); 
        }
    } else {
        // Contraseña incorrecta
        $errorMensaje = "La contraseña es incorrecta. Por favor, intenta nuevamente.";
        header('Location: ../login-inversionista.php?error=' . urlencode($errorMensaje));
        exit(); 
    }
} else {
    // Usuario no encontrado
    $errorMensaje = "Usuario no encontrado.";
    header('Location: ../login-inversionista.php?error=' . urlencode($errorMensaje));
    exit(); 
}

?>