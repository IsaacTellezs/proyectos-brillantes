<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../phpmailer/Exception.php';
require '../phpmailer/PHPMailer.php';
require '../phpmailer/SMTP.php';

require_once('conex.php');
conectar();

$email = $_POST['txt-email'];
$query = "SELECT * FROM usuarios where correo = '$email'";
$result = $conexion->query($query);
$row = $result->fetch_assoc();

if($result->num_rows > 0){
  $mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp-mail.outlook.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'proyectosbrillantes@outlook.com';
    $mail->Password   = 'proyectobrillantes.,';
    $mail->Port       = 587;

    $mail->setFrom('proyectosbrillantes@outlook.com', 'Proyectos Brillantes');
    $mail->addAddress($email, 'Recuperacion de password');
    $mail->isHTML(true);
    $mail->Subject = 'Recuperacion de contrasena';
    $mail->Body    = 'Hola, este es un correo generado para solicitar tu recuperacion de contraseña, por favor, visita la página de <a href="http://localhost/crowd/change_password.php?nom_usuario='.$row['nom_usuario'].'">Recuperación de contraseña</a>';

    $mail->send();
    header("Location: ../login.php?message=ok");
} catch (Exception $e) {
  header("Location: ../login.php?message=error");
}

}else{
  header("Location: ../login.php?message=not_found");
}

?>
