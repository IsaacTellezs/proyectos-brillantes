<?php
include '../funciones/conex.php';
include '../funciones/funciones.php';
session_start(); 
conectar();       
headerDinamico($conexion);
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Mis proyectos</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" rel="stylesheet">
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/bootstrap-icons.css" rel="stylesheet">
        <link href="../css/owl.carousel.min.css" rel="stylesheet">
        <link href="../css/owl.theme.default.min.css" rel="stylesheet">
        <link href="../css/tooplate-gotto-job.css" rel="stylesheet">
        


    </head>
    
    <body class="about-page" id="top">

       

        <main>

        <header class="site-header py-5">
    <div class="section-overlay"></div>

    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="text-white">Mis proyectos</h1>
            </div>
        </div>
    </div>
</header>

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

<script>
    document.getElementById('searchForm').addEventListener('submit', function (e) {
        // Evita que el formulario se envíe normalmente
        e.preventDefault();

        // Acciones adicionales si es necesario

        // Envía el formulario programáticamente
        this.submit();
    });

    // Agrega un listener al campo de entrada para realizar la búsqueda al presionar Enter
    document.querySelector('.search-form input').addEventListener('keyup', function (e) {
        if (e.key === 'Enter') {
            // Realiza la búsqueda al presionar Enter
            document.getElementById('searchForm').submit();
        }
    });
</script>

            <section class="job-section recent-jobs-section section-padding">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-lg-6 col-12 mb-4">
                            <h2>Proyectos</h2>
                        </div>

                        <div class="clearfix"></div>
                        <?php
if (isset($_SESSION['id'])) {
    $id_usuario = $_SESSION['id'];

    // Consulta para obtener proyectos del usuario actual
    $sql = "SELECT * FROM proyectos WHERE id_user = '$id_usuario'";
    $result = mysqli_query($conexion, $sql);

    // Verificar si hay resultados
    if (mysqli_num_rows($result) > 0) {
        // Recorrer los resultados y mostrar cada proyecto en la plantilla HTML
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="col-lg-4 col-md-6 col-12">';
            echo '<div class="job-thumb job-thumb-box">';
            echo '<div class="job-image-box-wrap">';
            echo '<a href="../desarrollador/editar_proyecto.php?id_proyecto=' . $row['id_proyecto'] . '">';
            // Puedes usar la imagen almacenada en la base de datos o proporcionar una ruta estática
            echo '<img src="' . $row['imagen'] . '" class="job-image img-fluid" alt="">';
            echo '</a>';
            echo '<div class="job-image-box-wrap-info d-flex align-items-center">';
            echo '<p class="mb-0">';
            echo '<a  class="badge badge-level">' . $row['categoria'] . '</a>';
            echo '</p>';
            echo '</div>';
            echo '</div>';
            echo '<div class="job-body">';
            echo '<h4 class="job-title">';
            echo '<a href="../desarrollador/editar_proyecto.php?id_proyecto=' . $row['id_proyecto'] . '" class="job-title-link">' . $row['nom_proyecto'] . '</a>';
            echo '</h4>';
            echo '<div class="d-flex align-items-center">';
            echo '<div class="job-image-wrap d-flex align-items-center">';
            // Puedes agregar más elementos aquí si es necesario
            echo '</div>';
            echo '<a href="#" class="bi-bookmark ms-auto me-2"></a>';
            echo '<a href="#" class="bi-heart"></a>';
            echo '</div>';
            echo '<div class="d-flex align-items-center">';
            // Puedes mostrar la descripción del proyecto
            echo $row['descripcion'];
            echo '</div>';
            echo '<div class="d-flex align-items-center border-top pt-3">';
            // Agrega el enlace con el ID del proyecto
            echo '<a href="../desarrollador/editar_proyecto.php?id_proyecto=' . $row['id_proyecto'] . '" class="custom-btn btn ms-auto">Editar proyecto</a>';
            echo '<a href="../desarrollador/avances_proyecto.php?id_proyecto=' . $row['id_proyecto'] . '" class="custom-btn btn ms-auto">Avances proyecto</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        // Si el usuario actual no tiene proyectos en la base de datos
        echo 'No hay proyectos para este usuario.';
    }
} else {
    // Si la variable de sesión no está establecida
    echo 'Debe iniciar sesión para ver proyectos.';
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>

                      

                    </div>
                </div>
            </section>


           
        </main>

        <?php
        include '../footer.php';
        ?>

        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/counter.js"></script>
        <script src="js/custom.js"></script>

    </body>
</html>