<?php
// Verifica la sesión y la conexión a la base de datos
session_start();
require 'funciones/conex.php';
conectar();

// Verifica si la sesión está activa
if (isset($_SESSION['Correo'])) {
    include 'header-usuario.php';
} else {
    include 'header.php';
}
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

    <body class="Creador-y-desarrollador-page" id="top">

    <main>

<header class="site-header py-5">
    <div class="section-overlay"></div>

    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="text-white">Proyectos de gobierno y servicios publicos</h1>
            </div>
        </div>
    </div>
</header>

<section class="job-section section-padding">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-6 col-12 mb-lg-4">
                <h3>Proyectos.</h3>
            </div>

            <div class="col-lg-4 col-12 d-flex align-items-center ms-auto mb-5 mb-lg-4">
                <p class="mb-0 ms-lg-auto">Sort by:</p>

                <div class="dropdown dropdown-sorting ms-3 me-4">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownSortingButton" data-bs-toggle="dropdown" aria-expanded="false">
                        Newest Jobs
                    </button>

                    <ul class="dropdown-menu" aria-labelledby="dropdownSortingButton">
                        <li><a class="dropdown-item" href="#">Lastest Jobs</a></li>

                        <li><a class="dropdown-item" href="#">Highed Salary Jobs</a></li>

                        <li><a class="dropdown-item" href="#">Internship Jobs</a></li>
                    </ul>
                </div>

                <div class="d-flex">
                    <a href="#" class="sorting-icon active bi-list me-2"></a>

                    <a href="#" class="sorting-icon bi-grid"></a>
                </div>
            </div>

            <?php
            
// Consulta SQL para obtener proyectos
$query = "SELECT Nombre_proyecto, Imagen, Categorias  FROM proyectos WHERE Categorias = 'Gobierno y servicios publicos'";

// Ejecuta la consulta
$result = mysqli_query($conexion, $query);

if ($result) {
    // Comprueba si hay filas de resultados
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            // Recupera los datos de la base de datos
            $Proyecto = $row['Nombre_proyecto'];
            $Imagen = $row['Imagen'];
            $Categoria = $row['Categorias'];

            // Ahora puedes mostrar los datos en la sección
            echo '<div class="col-lg-4 col-md-6 col-12">';
            echo '    <div class="job-thumb job-thumb-box">';
            echo '        <div class="job-image-box-wrap">';
            echo '            <a href="job-details.html">';
            echo '                <img src="' . $Imagen . '" class="job-image img-fluid" alt="" style="width: 300px; height: 300px;">'; // Ajusta el ancho y alto a tus preferencias
            echo '            </a>';
            echo '            <div class="job-image-box-wrap-info d-flex align-items-center">';
            echo '            </div>';
            echo '        </div>';
            echo '        <div class="job-body">';
            echo '            <h4 class="job-title">';
            echo '                <a href="job-details.html" class="job-title-link">' . $Proyecto . '</a>';
            echo '            </h4>';
            // Muestra la categoría
            echo '            <p class="job-category">Categoría: ' . $Categoria . '</p>';
            echo '            <div class="d-flex align-items-center">';
            echo '                <div class="job-image-wrap d-flex align-items-center bg-white shadow-lg mt-2 mb-4">';
            echo '                </div>';
            echo '                <a href="#" class="bi-bookmark ms-auto me-2">';
            echo '                </a>';
            echo '                <a href="#" class="bi-heart">';
            echo '                </a>';
            echo '            </div>';
            echo '            <div class="d-flex align-items-center">';
            echo '            </div>';
            echo '            <div class="d-flex align-items-center border-top pt-3">';
            echo '                <a href="job-details.html" class="custom-btn btn ms-auto">Mirar proyectos.</a>';
            echo '            </div>';
            echo '        </div>';
            echo '    </div>';
            echo '</div>';
        }
    } else {
        // Si no hay proyectos en la base de datos, puedes mostrar un mensaje o manejarlo de otra manera
        echo 'No se encontraron proyectos.';
    }

    // Libera el resultado
    mysqli_free_result($result);
}

// Cierra la conexión a la base de datos al final
mysqli_close($conexion);
            ?>
        </div>
    </div>
</section>
</main>

              <!-- Footer -->
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