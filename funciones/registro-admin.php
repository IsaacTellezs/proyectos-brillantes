<?php
require 'conex.php';
require 'funciones.php';

conectar();


$Correo = $_POST['correo'];
$Contraseña = password_hash($_POST['txt-clave'], PASSWORD_DEFAULT); 


$consulta = "SELECT * FROM admin WHERE  correo = ?";
$stmt_verificacion = $conexion->prepare($consulta);
$stmt_verificacion->bind_param("s",  $Correo);
$stmt_verificacion->execute();
$resultado_verificacion = $stmt_verificacion->get_result();

if ($resultado_verificacion->num_rows > 0) {
    $errorRegistro = "El correo ya están registrados. Intenta con otro.";
    header('Location: ../registroInversionista.php?error=' . urlencode($errorRegistro));
    exit();
}


    $sql = "INSERT INTO admin ( contraseña,  correo ) VALUES (?,?)";

    $stmt = $conexion->prepare($sql);

    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conexion->error);
    }
    
   
    $stmt->bind_param("ss", $Contraseña, $Correo);
    
    if ($stmt->execute()) {
        
        header('Location: ../login-admin.php');
        exit(); 
    } else {
       
        $errorRegistro = "Error en el registro, intenta de nuevo.";
    header('Location: ../login-admin.php?error=' . urlencode($errorMensaje));
    exit(); 
    }
    
    
    $stmt->close();
    $conexion->close();

?>