<?php
session_start();
require 'funciones/conex.php';
conectar();

// Verifica si el usuario ha iniciado sesión
if (isset($_SESSION['id_desarrollador'])) {
    include 'header-usuario.php';
} else {
    include 'header.php';
}

// Si el formulario se ha enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['Nombre_proyecto'], $_POST['Descripcion'])) {
        // Obtener los valores del formulario
        $Nombre_proyecto = $_POST['Nombre_proyecto'];
        $Descripcion = $_POST['Descripcion'];

        // Actualizar los datos en MySQL con una sentencia preparada
        $user = $_SESSION['id_desarrollador'];
        $update_sql = "UPDATE desarrolladores SET Nombre_proyecto = ?, Descripcion = ? WHERE id_desarrollador = ?";
        $stmt = $conexion->prepare($update_sql);
        $stmt->bind_param("sss", $Nombre_proyecto, $Descripcion, $user);

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
$user = $_SESSION['id_desarrollador'];
$select_sql = "SELECT Nombre_proyecto, Descripcion FROM proyectos WHERE id_desarrollador = ?";
$stmt = $conexion->prepare($select_sql);
$stmt->bind_param("s", $user);
$stmt->execute();
$stmt->bind_result($Nombre_proyecto, $Descripcion);
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

        <title>Proyectos</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" rel="stylesheet">

        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link href="css/owl.carousel.min.css" rel="stylesheet">

        <link href="css/owl.theme.default.min.css" rel="stylesheet">

        <link href="css/tooplate-gotto-job.css" rel="stylesheet">
        
        <link href="css/estilos.css" rel="stylesheet">

    </head>
    
    <header class="site-header py-5">
    <div class="section-overlay"></div>

    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="text-white">Subir un proyecto</h1>
            </div>
        </div>
    </div>
</header>

<body>

<main>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form class="custom-form hero-form" action="perfil-desarrollador-proyectos.php" method="post" role="form">
                    <h2 class="text-center text-white mb-4">Datos del proyecto</h2>

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <label for="Nombre_proyecto" class="form-label" style="font-size: 24px;">
                                <strong>Nombre del proyecto.</strong>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="bi-person custom-icon"></i></span>
                                <input type="text" class="form-control" id="Nombre_proyecto" placeholder="Tu nombre" name="Nombre_proyecto" required value="<?php echo $Nombre_proyecto; ?>">
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <label for="bio" class="form-label" style="font-size: 24px;">
                                <strong>Descripción del proyecto</strong>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="bi-person custom-icon"></i></span>
                                <textarea class="form-control" id="bio"  placeholder="Cuéntanos algo sobre ti" name="Descripcion" required><?php echo $Descripcion; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Subir proyecto</button>
                </form>
            </div>
        </div>
    </div>
</main>


            <?php
    include 'footer.php';
    ?>

</body>






 
       <!-- JAVASCRIPT FILES -->
       <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/counter.js"></script>
        <script src="js/custom.js"></script>
    </body>
</html>