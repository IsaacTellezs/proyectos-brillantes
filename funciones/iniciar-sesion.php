<?php
require 'conex.php';
require 'funciones.php';

$usuario = $_POST['txt-email'];
$clave = $_POST['txt-clave'];

conectar();
$_SESSION['Correo'] = $usuario;

global $conexion;

// Realiza una consulta para buscar al usuario por correo
$sql = "SELECT id_usuario, correo, contraseña, tipo_usuario FROM usuarios WHERE correo = ?";
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
        // Agrega el id_usuario a la variable de sesión
        session_start();
        $_SESSION['id'] = $row['id_usuario'];
        $_SESSION['Correo'] = $usuario;

        // Verifica si el usuario es un desarrollador
        if ($tipoUsuario == "desarrollador") {
            header('Location: ../index.php');
            exit();
        } else {
            // Si no es un desarrollador, devuelve false
            $errorMensaje = "Usted no es desarrollador.";
            header('Location: ../login.php?error=' . urlencode($errorMensaje));
            exit();
        }
    } else {
        // Contraseña incorrecta
        $errorMensaje = "La contraseña es incorrecta. Por favor, intenta nuevamente.";
        header('Location: ../login.php?error=' . urlencode($errorMensaje));
        exit();
    }
} else {
    // Usuario no encontrado
    $errorMensaje = "Usuario no encontrado.";
    header('Location: ../login.php?error=' . urlencode($errorMensaje));
    exit();
}
?>