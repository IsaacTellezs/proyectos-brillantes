<?php
include '../funciones/conex.php';
include '../funciones/funciones.php';
conectar();       
session_start(); 

headerDinamico($conexion);

$fecha_avance = ""; // Inicializa las variables
$descripcion_avance = "";
$ImagenMostrada = false; // Variable para controlar si la imagen ya se mostró
?>

<!DOCTYPE html>
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
    </style>
</head>

<body class="Creador-y-desarrollador-page" id="top">
    <main>
        <header class="site-header py-5">
            <div class="section-overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1 class="text-white">Avances del proyecto.</h1>
                    </div>
                </div>
            </div>
        </header>
        <!-- Sección de imagen y avances después del encabezado -->
        <section class="search-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <form class="custom-form search-form" action="../categorias/busqueda.php" method="get" role="form" id="searchForm">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon2"><i class="bi-search custom-icon"></i></span>
                                <input type="text" name="q" class="form-control" placeholder="Buscar proyectos..." required>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php
$ImagenMostrada = false;

if (isset($_GET['id_proyecto'])) {
    $id_proyecto = $_GET['id_proyecto'];

    // Obtener la imagen del proyecto
    $query_imagen = "SELECT p.imagen FROM proyectos p WHERE p.id_proyecto = ?";
    $stmt_imagen = mysqli_prepare($conexion, $query_imagen);
    mysqli_stmt_bind_param($stmt_imagen, "i", $id_proyecto);
    $result_imagen = mysqli_stmt_execute($stmt_imagen);

    if ($result_imagen) {
        $result_imagen = mysqli_stmt_get_result($stmt_imagen);

        if (mysqli_num_rows($result_imagen) > 0) {
            echo "<div class='container'>";
            echo "<div class='row'>";

            while ($row_imagen = mysqli_fetch_assoc($result_imagen)) {
                $Imagen = $row_imagen['imagen'];

                if (!$ImagenMostrada) {
                    echo "<div class='col-md-6'>";
                    echo "<div class='job-thumb job-thumb-box mx-auto text-center' style='max-width: 60%; margin-bottom: 0px;'>";
                    echo "<div class='job-image-box-wrap'>";
                    echo "<img src='$Imagen' class='job-image img-fluid' alt='Imagen del Proyecto' style='max-width: 100%; max-height: 60vh;'>";
                    echo "</div>";
                    echo "</div>";

                    echo "<div class='col-md-12 text-center mt-3'>";
                    echo "<a href='editar_avances_proyecto.php?id_proyecto=$id_proyecto' class='btn btn-primary'>Agregar Avance</a>";
                    echo "</div>";

                    echo "</div>";
                    $ImagenMostrada = true;
                }
            }

            // Obtener y mostrar los avances del proyecto
echo "<div class='col-md-6'>";

$query_avances = "SELECT av.descripcion_avance, av.fecha_avance FROM avances_proyectos av WHERE av.id_proyecto = ?";
$stmt_avances = mysqli_prepare($conexion, $query_avances);
mysqli_stmt_bind_param($stmt_avances, "i", $id_proyecto);
$result_avances = mysqli_stmt_execute($stmt_avances);

if ($result_avances) {
    $result_avances = mysqli_stmt_get_result($stmt_avances);

    if (mysqli_num_rows($result_avances) > 0) {
        while ($row_avance = mysqli_fetch_assoc($result_avances)) {
            $descripcion_avance = $row_avance['descripcion_avance'];
            $fecha_avance = $row_avance['fecha_avance'];

            echo "<div class='mx-auto text-center' style='max-width: 100%;'>";
            echo "<p>Fecha del avance: $fecha_avance</p>";
            echo "<p>Descripción del avance: $descripcion_avance</p>";
            echo "<hr>";  // Separador entre avances
            echo "</div>";
        }
    } else {
        echo 'No se encontraron detalles para el proyecto.';
    }

    mysqli_stmt_close($stmt_avances);
}

echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        } else {
            echo 'No se encontraron detalles para el proyecto.';
        }

        mysqli_free_result($result_imagen);
    }

    mysqli_stmt_close($stmt_imagen);
}
?>



<!-- Espacio en blanco visual entre bloques PHP -->
<br>
<br>

<?php include '../footer.php'; ?>

    <!-- JAVASCRIPT FILES -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/counter.js"></script>
    <script src="../js/custom.js"></script>
</body>

</html>