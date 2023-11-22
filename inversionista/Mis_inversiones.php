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

        <title>Salud</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" rel="stylesheet">
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/bootstrap-icons.css" rel="stylesheet">
        <link href="../css/owl.carousel.min.css" rel="stylesheet">
        <link href="../css/owl.theme.default.min.css" rel="stylesheet">
        <link href="../css/tooplate-gotto-job.css" rel="stylesheet">
        
<!--

Tooplate 2134 Gotto Job

https://www.tooplate.com/view/2134-gotto-job

Bootstrap 5 HTML CSS Template

-->
</head>

    <body class="Creador-y-desarrollador-page" id="top">
    <main>

        <header class="site-header py-5">
    <div class="section-overlay"></div>

    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="text-white">Mis inversiones.</h1>
            </div>
        </div>
    </div>
</header>


<section class="job-section recent-jobs-section section-padding">
<section class="job-section recent-jobs-section section-padding">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-12 mb-4">
                        <h2>Proyectos</h2>
                    </div>
                    <div class="clearfix"></div>

                    <?php
                        // Verificar si la variable de sesión 'Correo' está establecida y no está vacía
                        if (isset($_SESSION['Correo']) && !empty($_SESSION['Correo'])) {
                            $correo_usuario = $_SESSION['Correo'];
                        
                            // Modificamos la consulta para unir las tablas usuarios y pago
                            $sql = "SELECT DISTINCT p.*
                                    FROM proyectos p
                                    INNER JOIN pago pa ON p.id_proyecto = pa.id_proyect
                                    INNER JOIN usuarios u ON u.id_usuario = pa.id_usuarios
                                    WHERE u.correo = '$correo_usuario'";  
                        
                            $result = mysqli_query($conexion, $sql);
                        
                            if ($result) {
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="col-lg-4 col-md-6 col-12">';
            echo '<div class="job-thumb job-thumb-box">';
            echo '<div class="job-image-box-wrap">';
            echo '<a href="\crowd\inversionista\Datos_inversion.php?id_proyecto=' . $row['id_proyecto'] . '">';
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
            echo '<a href="\crowd\inversionista\Datos_inversion.php?id_proyecto=' . $row['id_proyecto'] . '" class="job-title-link">' . $row['nom_proyecto'] . '</a>';
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
            echo '<a href="../inversionista\Datos_inversion.php?id_proyecto=' . $row['id_proyecto'] . '" class="custom-btn btn ms-auto">Ver mi inversion.</a>';
            
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo 'No hay proyectos en los que haya invertido este usuario.';
    }
} else {
    echo 'Error en la consulta: ' . mysqli_error($conexion);
}
} else {
echo 'Debe iniciar sesión para ver proyectos.';
}

mysqli_close($conexion);
?>

</div>
</div>
</section>
                    </div>
                </div>
            </section>
        </main>

              <!-- Footer -->
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