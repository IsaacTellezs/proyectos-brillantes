<?php
require 'conex.php';
require 'funciones.php';

conectar();

// Recuperar datos del formulario
$nombre = $_POST['nombre'];
$A_paterno = $_POST['paterno'];
$A_materno = $_POST['materno'];
$Nom_usuario = $_POST['nom_usuario'];
$Correo = $_POST['correo'];
$Tel = $_POST['telefono'];
$Contraseña = password_hash($_POST['txt-clave'], PASSWORD_DEFAULT); //  Almacenamiento de contraseñas de forma segura
$Empresa = $_POST['empresa'];
$tipo = $_POST['tipo_usuario'];
$nivel = $_POST['nivel_usuario'];

// Insertar datos en la base de datos

    $sql = "INSERT INTO usuarios (nombre, paterno, materno, nom_usuario, contraseña,  correo, telefono, empresa, tipo_usuario, nivel_usuario ) VALUES (?,?,?,?,?,?,?,?,?,?)";
// Preparar la sentencia
    $stmt = $conexion->prepare($sql);

    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conexion->error);
    }
    
    // Vincular parámetros y ejecutar la consulta
    $stmt->bind_param("ssssssissi", $nombre, $A_paterno, $A_materno, $Nom_usuario,  $Contraseña, $Correo, $Tel, $Empresa, $tipo, $nivel);
    
    if ($stmt->execute()) {
        
        header('Location: ../login-inversionista.php');
        exit(); 
    } else {
       
        $errorRegistro = "Error en el registro, intenta de nuevo.";
    header('Location: ../login-inversionista.php?error=' . urlencode($errorMensaje));
    exit(); 
    }
    
    // Cerrar la conexión
    $stmt->close();
    $conexion->close();

?>