<?php
session_start();
require 'funciones/conex.php';
conectar();

if (isset($_SESSION['Correo'])) {
    include 'header-inversor.php';
} else {
    include 'header.php';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nom_usuario'], $_POST['correo'], $_POST['telefono'], $_POST['empresa'])) {
        // Obtener los valores del formulario
        $nom_usuario = $_POST['nom_usuario'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono']; // Agregar el número de teléfono
        $empresa = $_POST['empresa'];

        // Actualizar los datos en MySQL con una sentencia preparada
        $user = $_SESSION['Correo'];
        $update_sql = "UPDATE datos_personales SET nom_usuario = ?, correo = ?, telefono = ?, empresa = ? WHERE correo = ?";
        $stmt = $conexion->prepare($update_sql);
        $stmt->bind_param("sssss", $nom_usuario, $correo, $telefono, $empresa, $user);

        if ($stmt->execute()) {
            // Los datos se han actualizado correctamente
            // Puedes redirigir al usuario o mostrar un mensaje de éxito
            header('Location: perfil_inversionista.php');
            exit;
        } else {
            echo "Error al actualizar los datos: " . $conexion->error;
        }
    }
}

// Obtener la información del usuario desde la base de datos para prellenar el formulario
$user = $_SESSION['Correo'];
$select_sql = "SELECT nom_usuario, correo, telefono, empresa FROM datos_personales WHERE correo = ?";
$stmt = $conexion->prepare($select_sql);
$stmt->bind_param("s", $user);
$stmt->execute();
$stmt->bind_result($nom_usuario, $correo, $telefono, $empresa);
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
                <form class="custom-form hero-form" action="perfil_inversionista.php" method="post" role="form">
                    <h2 class="text-center text-white mb-4">Datos del inversionista</h2>

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label for="nom_usuario" style="font-size: 24px;"><strong>Nombre</strong></label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi-person custom-icon"></i></span>
                                    <input type="text" class="form-control" id="nom_usuario" placeholder="Tu nombre" name="nom_usuario" required value="<?php echo $nom_usuario; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label for="email" style="font-size: 24px;"><strong>Correo Electrónico</strong></label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi-envelope custom-icon"></i></span>
                                    <input type="email" class="form-control" id="email" placeholder="tucorreo@example.com" name="correo" required value="<?php echo $correo; ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label for="numero" style="font-size: 24px;"><strong>Número de teléfono</strong></label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi-telephone custom-icon"></i></span>
                                    <input type="text" class="form-control" id="numero" placeholder="Tu número" name="telefono" required value="<?php echo $telefono; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label for="empresa" style="font-size: 24px;"><strong>Empresa</strong></label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-briefcase custom-icon"></i></span>
                                    <input type="text" class="form-control" id="empresa" placeholder="Tu empresa" name="empresa" required value="<?php echo $empresa; ?>">
                                </div>
                            </div>
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