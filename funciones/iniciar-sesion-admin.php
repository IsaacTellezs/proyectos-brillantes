<?php
require 'conex.php';
require 'funciones.php';

session_start(); 

$usuario = $_POST['txt-email'];
$clave = $_POST['txt-clave'];

conectar();
global $conexion;

$sql = "SELECT correo, contraseña, tipo_admin FROM admin WHERE correo = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    $hashGuardado = $row['contraseña'];
    $tipoAdmin = $row['tipo_admin'];

    if (password_verify($clave, $hashGuardado)) {
        

        $_SESSION['Correo'] = $usuario;
        $_SESSION['TipoAdmin'] = $tipoAdmin;

        if ($tipoAdmin == 1) {
            header('Location: ../superadmin/registro-admin.php');
            exit();
        } elseif ($tipoAdmin == 0) {
            header('Location: ../admin/data-info.php');
            exit();
        } else {
           
            $errorMensaje = "Tipo de administrador no válido.";
            header('Location: ../login-admin.php?error=' . urlencode($errorMensaje));
            exit();
        }
    } else {
        
        $errorMensaje = "La contraseña es incorrecta. Por favor, intenta nuevamente.";
        header('Location: ../login-admin.php?error=' . urlencode($errorMensaje));
        exit();
    }
} else {
    
    $errorMensaje = "Usuario no encontrado.";
    header('Location: ../login-admin.php?error=' . urlencode($errorMensaje));
    exit();
}
?>
