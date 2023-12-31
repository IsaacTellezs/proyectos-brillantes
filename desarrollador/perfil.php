<?php
include '../funciones/conex.php';
include '../funciones/funciones.php';
conectar();       
session_start();
headerDinamico($conexion);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nom_usuario'], $_POST['correo'], $_POST['telefono'], $_POST['experiencia'])) {
        // Obtener datos del formulario
        $nom_usuario = $_POST['nom_usuario'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $experiencia = $_POST['experiencia'];
        
    }
}
// Obtener la información del usuario desde la base de datos para prellenar el formulario
$user = $_SESSION['Correo'];
$select_sql = "SELECT nom_usuario, correo, telefono, experiencia, foto, facebook, instagram FROM usuarios WHERE correo = ?";
$stmt = $conexion->prepare($select_sql);
$stmt->bind_param("s", $user);
$stmt->execute();
$stmt->bind_result($nom_usuario, $correo, $telefono, $experiencia, $foto, $facebook, $instagram); // Agregado $facebook y $instagram
$stmt->fetch();
$stmt->close();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>CFMX</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap-icons.css" rel="stylesheet">
    <link href="../css/owl.carousel.min.css" rel="stylesheet">
    <link href="../css/owl.theme.default.min.css" rel="stylesheet">
    <link href="../css/tooplate-gotto-job.css" rel="stylesheet">
    <link href="../css/index.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<header class="site-header py-5">
    <div class="section-overlay"></div>

    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="text-white">Mi perfil.</h1>
            </div>
        </div>
    </div>
</header>
<br>
<br>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-12">
            <img src="../uploads/<?php echo $foto; ?>" alt="Foto de perfil" width="350" height="350">
        </div>
        <div class="col-lg-6 col-12">
            <div class="project-description">
                <h3 style="font-size: 40px;">Datos del usuario.</h3>
                <p style="font-size: 30px;">Nombre de usuario: <?php echo $nom_usuario; ?></p>
                <p style="font-size: 30px;">Correo: <?php echo $correo; ?></p>
                <p style="font-size: 30px;">Telefono: <?php echo $telefono; ?></p>
                <p style="font-size: 30px;">Experiencia: <?php echo $experiencia; ?></p>
                <div class="col-12">
                    <a href="../desarrollador/editar-perfil-usuario.php" class="btn btn-secondary btn-lg rounded-circle">
                        Editar perfil
                    </a>
                </div>
                <div class="col-12 text-right">
                    <a href="<?php echo $facebook; ?>" target="_blank" class="btn btn-primary btn-lg rounded-circle">
                        <i class="fab fa-facebook-f"></i> <!-- Icono de Facebook -->
                    </a>
                    <a href="<?php echo $instagram; ?>" target="_blank" class="btn btn-primary btn-lg rounded-circle">
                        <i class="fab fa-instagram"></i> <!-- Icono de Instagram -->
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

        <?php
        include '../footer.php';
        ?>

    <!-- JAVASCRIPT FILES -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/counter.js"></script>
    <script src="../js/custom.js"></script>
</body>
</html>