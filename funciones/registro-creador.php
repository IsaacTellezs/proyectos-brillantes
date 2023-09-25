<?php
require 'conex.php';
require 'funciones.php';

conectar();



// Recuperar datos del formulario
$nombre = $_POST['nombre'];
$A_paterno = $_POST['A_paterno'];
$A_materno = $_POST['A_materno'];
$Nom_usuario = $_POST['Nom_usuario'];
$Correo = $_POST['Correo'];
$Tel = $_POST['Tel'];
$Contraseña = password_hash($_POST['txt-clave'], PASSWORD_DEFAULT); //  Almacenamiento de contraseñas de forma segura
$Experiencia = $_POST['Experiencia'];   

// Insertar datos en la base de datos

    $sql = "INSERT INTO desarrolladores (Nombre, A_paterno, A_materno, Nom_Usuario, Contraseña,  Correo, Tel, Experiencia ) VALUES (?,?,?,?,?,?,?,?)";
// Preparar la sentencia
    $stmt = $conexion->prepare($sql);

    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conexion->error);
    }
    
    // Vincular parámetros y ejecutar la consulta
    $stmt->bind_param("ssssssis", $nombre, $A_paterno, $A_materno, $Nom_usuario,  $Contraseña, $Correo, $Tel, $Experiencia);
    
    if ($stmt->execute()) {
        
        header('Location: ../login.php');
        exit(); 
    } else {
       
        $errorRegistro = "Error en el registro, intenta de nuevo.";
    header('Location: ../login.php?error=' . urlencode($errorMensaje));
    exit(); 
    }
    
    // Cerrar la conexión
    $stmt->close();
    $conexion->close();

?>