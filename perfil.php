<?php
session_start();
require 'funciones/conex.php';
conectar();

if (isset($_SESSION['id_desarrollador'])) {
    include 'header-usuario.php';
} else {
    include 'header.php';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['Nom_usuario'], $_POST['Correo'], $_POST['Tel'], $_POST['Experiencia'], $_POST['Facebook'], $_POST['Instagram'])) {
        // Obtener los valores del formulario
        $Nom_usuario = $_POST['Nom_usuario'];
        $Correo = $_POST['Correo'];
        $Tel = $_POST['Tel'];
        $Experiencia = $_POST['Experiencia'];
        $Facebook = $_POST['Facebook'];
        $Instagram = $_POST['Instagram'];

        // Actualizar los datos en MySQL con una sentencia preparada
        $user = $_SESSION['Correo'];
        $update_sql = "UPDATE desarrolladores SET Nom_usuario = ?, Correo = ?, Tel = ?, Experiencia = ?, Facebook = ?, Instagram = ? WHERE Correo = ?";
        $stmt = $conexion->prepare($update_sql);
        $stmt->bind_param("sssssss", $Nom_usuario, $Correo, $Tel, $Experiencia, $Facebook, $Instagram, $user);
        

        if ($stmt->execute()) {
            // Los datos se han actualizado correctamente
            // Puedes redirigir al usuario o mostrar un mensaje de éxito
            header('Location: perfil.php');
            exit;
        } else {
            echo "Error al actualizar los datos: " . $conexion->error;
        }
    }
}

// Obtener la información del usuario desde la base de datos para prellenar el formulario
$user = $_SESSION['Correo'];
$select_sql = "SELECT Nom_usuario, Correo, Tel, Experiencia, Facebook, Instagram FROM desarrolladores WHERE Correo = ?";
$stmt = $conexion->prepare($select_sql);
$stmt->bind_param("s", $user);
$stmt->execute();
$stmt->bind_result($Nom_usuario, $Correo, $Tel, $Experiencia, $Facebook, $Instagram);
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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link href="css/owl.carousel.min.css" rel="stylesheet">
    <link href="css/owl.theme.default.min.css" rel="stylesheet">
    <link href="css/tooplate-gotto-job.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
</head>

<header class="site-header py-5">
    <div class="section-overlay"></div>

    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="text-white">Mi perfil</h1>
            </div>
        </div>
    </div>
</header>
<p>.</p>
<body>

<main>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form class="custom-form hero-form" action="perfil.php" method="post" role="form">
                    <h2 class="text-center text-white mb-4">Datos del desarrollador</h2>

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <label for="Nom_usuario" class="form-label" style="font-size: 24px;">
                                <strong>Nombre</strong>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="bi-person custom-icon"></i></span>
                                <input type="text" class="form-control" id="Nom_usuario" placeholder="Tu nombre" name="Nom_usuario" required value="<?php echo $Nom_usuario; ?>">
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <label for="email" class="form-label" style="font-size: 24px;">
                                <strong>Correo Electrónico</strong>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="bi-envelope custom-icon"></i></span>
                                <input type="email" class="form-control" id="email" placeholder="tucorreo@example.com" name="Correo" required value="<?php echo $Correo; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <label for= "numero" class="form-label" style="font-size: 24px;">
                                <strong>Número de teléfono</strong>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="bi-telephone custom-icon"></i></span>
                                <input type="text" class="form-control" id="numero" placeholder="Tu número" name= "Tel" required value="<?php echo $Tel; ?>">
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <label for="bio" class="form-label" style="font-size: 24px;">
                                <strong>Experiencia</strong>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="bi-person custom-icon"></i></span>
                                <textarea class="form-control" id="bio"  placeholder="Cuéntanos algo sobre ti" name="Experiencia" required><?php echo $Experiencia; ?></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Campos para las URLs de redes sociales -->
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <label for="facebook" class="form-label" style="font-size: 24px;">
                                <strong>Perfil de Facebook</strong>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-facebook custom-icon"></i></span>
                                <input type="text" class="form-control" id="facebook" placeholder="URL de tu perfil de Facebook" name="Facebook" value="<?php echo $Facebook; ?>">
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12" style="position: relative;">
                        <label for="instagram" class="form-label" style="font-size: 24px;">
                        <strong>Perfil de Instagram</strong>
                    </label>
                    <div class="input-group">
        <span class="input-group-text" id="basic-addon1"><i class="bi bi-instagram custom-icon"></i></span>
        <input type="text" class="form-control" id="Instagram" placeholder="URL de tu perfil de Instagram" name="Instagram" value="<?php echo $Instagram; ?>">
    </div>
    <a href="<?php echo $Instagram; ?>" class="social-button" target="_blank" style="font-size: 32px;"><i class="bi bi-instagram"></i></a>
    <a href="<?php echo $Facebook; ?>" class="social-button" target="_blank" style="font-size: 32px;"><i class="bi bi-facebook"></i></a>
</div>
                    </div>

                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </form>
            </div>
        </div>
    </div>
</main>

<?php
include 'footer.php';
?>

<!-- JAVASCRIPT FILES -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/counter.js"></script>
<script src="js/custom.js"></script>
</body>
</html>