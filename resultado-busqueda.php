<?php
include 'funciones/conex.php';
include 'funciones/funciones.php';
conectar();       
session_start(); 

headerDinamicoGlobal($conexion);


?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Salud</title>

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

    <header class="site-header py-5">
    <div class="section-overlay"></div>

    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="text-white">Resultado de busqueda</h1>
            </div>
        </div>
    </div>
</header>

    <section class="job-section section-padding">
    <div class="container">
        <div class="row align-items-center">

        <?php
if (isset($_SESSION['resultados_busqueda'])) {
    $resultados = $_SESSION['resultados_busqueda'];

    if (count($resultados) > 0) {
        echo '<div class="row">';

        foreach ($resultados as $nombre_proyecto) {
            // Escapa el nombre del proyecto para evitar SQL injection
            $nombre_proyecto = mysqli_real_escape_string($conexion, $nombre_proyecto);

            // Consulta SQL para buscar por nombre de proyecto
            $query = "SELECT nom_proyecto, imagen, categoria, id_proyecto FROM proyectos WHERE nom_proyecto = '$nombre_proyecto'";

            // Ejecuta la consulta
            $result = mysqli_query($conexion, $query);

            if ($result) {
                // Comprueba si hay filas de resultados
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        // Recupera los datos de la base de datos
                        $ProyectoID = $row['id_proyecto'];
                        $nombre_proyecto = $row['nom_proyecto'];
                        $imagen = $row['imagen'];
                        $categoria = $row['categoria'];

                        // Aquí, en lugar de mostrar el nombre del proyecto directamente, debes crear una estructura similar a la del código que proporcionaste.
                        echo '<div class="col-lg-4 col-md-6 col-12">';
                        echo '    <div class="job-thumb job-thumb-box">';
                        echo '        <div class="job-image-box-wrap">';
                        // Enlaza la imagen y el título al detalle del proyecto
                        echo '            <a href="./desarrollador/informacion-proyecto-desarrollador.php?id_proyecto=' . $ProyectoID . '">';
                        echo '                <img src="' . $imagen . '" class="job-image img-fluid" alt="' . $nombre_proyecto . '" style="width: 300px; height: 300px;">';
                        echo '            </a>';
                        echo '        </div>';
                        echo '        <div class="job-body">';
                        // Enlaza el título al detalle del proyecto
                        echo '            <h4 class="job-title">';
                        echo '                <a href="./desarrollador/informacion-proyecto-desarrollador.php?id_proyecto=' . $ProyectoID . '" class="job-title-link">' . $nombre_proyecto . '</a>';
                        echo '            </h4>';
                        // Debes recuperar la categoría del proyecto aquí y mostrarla.
                        echo '            <p class="job-category">Categoría: ' . $categoria . '</p>';
                        echo '            <div class="d-flex align-items-center">';
                        echo '                <div class "job-image-wrap d-flex align-items-center bg-white shadow-lg mt-2 mb-4">';
                        echo '                </div>';
                        echo '                <a href="#" class="bi-bookmark ms-auto me-2">';
                        echo '                </a>';
                        echo '                <a href="#" class="bi-heart">';
                        echo '                </a>';
                        echo '            </div>';
                        echo '            <div class="d-flex align-items-center">';
                        echo '            </div>';
                        echo '            <div class="d-flex align-items-center border-top pt-3">';
                        echo '                <a href="./desarrollador/informacion-proyecto-desarrollador.php?id_proyecto=' . $ProyectoID . '" class="custom-btn btn ms-auto">Mirar proyectos</a>';
                        echo '            </div>';
                        echo '        </div>';
                        echo '    </div>';
                        echo '</div>';
                    }
                }
            }
        }
        echo '</div>';
    } else {
        echo 'No se encontraron resultados.';
    }

    unset($_SESSION['resultados_busqueda']);
} elseif (isset($_SESSION['mensaje_busqueda'])) {
    echo $_SESSION['mensaje_busqueda'];
    unset($_SESSION['mensaje_busqueda']);
} else {
    echo "No se encontraron resultados.";
}
?>
</div>
    </div>
</section>

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