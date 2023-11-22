<?php
include '../funciones/conex.php';
include '../funciones/funciones.php';
conectar();       
session_start(); 

headerDinamico($conexion);

// Variable para almacenar la información del proyecto y los detalles de pago
$projectDetails = '';

if (isset($_GET['id_proyecto'])) {
    $id_proyecto = $_GET['id_proyecto'];

    // Consulta SQL para obtener detalles del proyecto, incluyendo meta_financiacion, fecha_inicio y fecha_termino
    $query_proyecto = "SELECT nom_proyecto, descripcion, imagen, categoria, meta_financiacion, fecha_inicio, fecha_termino FROM proyectos WHERE id_proyecto = $id_proyecto";

    // Ejecuta la consulta para obtener detalles del proyecto
    $result_proyecto = mysqli_query($conexion, $query_proyecto);

    if ($result_proyecto) {
        if (mysqli_num_rows($result_proyecto) > 0) {
            $row_proyecto = mysqli_fetch_assoc($result_proyecto);
            $Proyecto = $row_proyecto['nom_proyecto'];
            $Descripcion = $row_proyecto['descripcion'];
            $Imagen = $row_proyecto['imagen'];
            $Categoria = $row_proyecto['categoria'];

            // Muestra los detalles del proyecto
            $projectDetails .= '<div class="project-details">';
            $projectDetails .= '<div class="project-image">';
            $projectDetails .= '<div class="job-thumb job-thumb-box">';
            $projectDetails .= '<div class="job-image-box-wrap">';
            $projectDetails .= "<img src='$Imagen' class='job-image img-fluid' alt='Imagen del Proyecto' style='max-width: 100%; max-height: 100vh;'>";
            $projectDetails .= '</div>';
            $projectDetails .= '</div>';
            $projectDetails .= '</div>';
            $projectDetails .= '<div class="project-description">';
            $projectDetails .= "<h3>Proyecto: $Proyecto</h3>";
            $projectDetails .= "<p>Descripción: $Descripcion</p>";
            $projectDetails .= "<p>Categoría: $Categoria</p>";

            // Consulta SQL para obtener detalles de pago desde la tabla "pago"
            $query_pago = "SELECT cantidad, fecha_contribucion, tipo_pago FROM pago WHERE id_proyect = $id_proyecto";

            // Ejecuta la consulta para obtener detalles de pago
            $result_pago = mysqli_query($conexion, $query_pago);

            if ($result_pago) {
                if (mysqli_num_rows($result_pago) > 0) {
                    // Muestra los detalles de pago
                    $projectDetails .= '<div class="project-payment-details">';
                    while ($row_pago = mysqli_fetch_assoc($result_pago)) {
                        $Cantidad = $row_pago['cantidad'];
                        $FechaContribucion = $row_pago['fecha_contribucion'];
                        $TipoPago = $row_pago['tipo_pago'];

                        $projectDetails .= "<p>Cantidad: $Cantidad</p>";
                        $projectDetails .= "<p>Fecha de Contribución: $FechaContribucion</p>";
                        $projectDetails .= "<p>Tipo de Pago: $TipoPago</p>";
                        $projectDetails .= "<hr>";
                    }
                    $projectDetails .= '</div>';
                } else {
                    $projectDetails .= 'No se encontraron detalles de pago para el proyecto.';
                }

                mysqli_free_result($result_pago);
            }

            $projectDetails .= '</div>';
            $projectDetails .= '</div>';

        } else {
            $projectDetails .= 'No se encontraron detalles para el proyecto.';
        }

        mysqli_free_result($result_proyecto);
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
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap-icons.css" rel="stylesheet">
    <link href="../css/owl.carousel.min.css" rel="stylesheet">
    <link href="../css/owl.theme.default.min.css" rel="stylesheet">
    <link href="../css/tooplate-gotto-job.css" rel="stylesheet">
    <style>
        .project-details {
            display: flex;
            align-items: center;
        }

        .project-description {
            flex: 1;
            padding: 20px;
        }

        .project-image {
            flex: 1;
            padding: 20px;
        }

        .project-payment-details {
            margin-top: 20px;
        }
    </style>
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
                <div class="col-12">
                    <!-- Aquí se muestra la información del proyecto y los detalles de pago -->
                    <?php echo $projectDetails; ?>
                </div>
            </div>
        </div>
    </section>
</main>
<?php include '../footer.php'; ?>
<!-- JAVASCRIPT FILES -->
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/owl.carousel.min.js"></script>
<script src="../js/counter.js"></script>
<script src="../js/custom.js"></script>
</body>
</html>