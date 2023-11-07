<?php
// Verifica la sesión y la conexión a la base de datos
session_start();
require 'funciones/conex.php';
conectar();

// Verifica si la sesión está activa
if (isset($_SESSION['Correo'])) {
    include 'header-inversor.php';
} else {
    include 'header.php';
}
if (isset($_GET['id_proyecto'])) {
    $id_proyecto = $_GET['id_proyecto'];

    // Consulta SQL para obtener detalles del proyecto
    $query = "SELECT Nombre_proyecto, Descripcion, Imagen, Categorias FROM proyectos WHERE id_proyecto = $id_proyecto"; // Ajusta la consulta según tu base de datos

    // Ejecuta la consulta
    $result = mysqli_query($conexion, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $Proyecto = $row['Nombre_proyecto'];
            $Descripcion = $row['Descripcion'];
            $Imagen = $row['Imagen'];
            $Categoria = $row['Categorias'];

            // Ahora puedes mostrar los detalles del proyecto
            // (por ejemplo, título, imagen, descripción, categoría, etc.)
        } else {
            echo 'No se encontraron detalles para el proyecto.';
        }

        mysqli_free_result($result);
    }
}

// Cierra la conexión a la base de datos al final
mysqli_close($conexion);
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Detalles del Proyecto</title>
        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-icons.css" rel="stylesheet">
        <link href="css/owl.carousel.min.css" rel="stylesheet">
        <link href="css/owl.theme.default.min.css" rel="stylesheet">
        <link href="css/tooplate-gotto-job.css" rel="stylesheet">
    </head>
    <body class="Creador-y-desarrollador-page" id="top">
        <main>
            <header class="site-header py-5">
                <div class="section-overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h1 class="text-white">Detalles del Proyecto</h1>
                        </div>
                    </div>
                </div>
            </header>
            <section class="job-section section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <h3>Proyecto: <?php echo $Proyecto; ?></h3>
                            <p>Descripción: <?php echo $Descripcion; ?></p>
                            <p>Categoría: <?php echo $Categoria; ?></p>
                            <div class="job-thumb job-thumb-box">
                                <div class="job-image-box-wrap">
                                    <img src="<?php echo $Imagen; ?>" class="job-image img-fluid" alt="Imagen del Proyecto">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <?php include 'footer.php'; ?>
        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/counter.js"></script>
        <script src="js/custom.js"></script>
    </body>
</html>