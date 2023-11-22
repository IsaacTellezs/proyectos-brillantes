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

// Verificar si el usuario o el correo ya existen
$consulta = "SELECT * FROM usuarios WHERE nom_usuario = ? OR correo = ?";
$stmt_verificacion = $conexion->prepare($consulta);
$stmt_verificacion->bind_param("ss", $Nom_usuario, $Correo);
$stmt_verificacion->execute();
$resultado_verificacion = $stmt_verificacion->get_result();

if ($resultado_verificacion->num_rows > 0) {
    $errorRegistro = "El nombre de usuario o el correo ya están registrados. Intenta con otro.";
    header('Location: ../registroInversionista.php?error=' . urlencode($errorRegistro));
    exit();
}

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