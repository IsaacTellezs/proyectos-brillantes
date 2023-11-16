<?php
include '../funciones/conex.php';
include '../funciones/funciones.php';
conectar();       
session_start();
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
                    <h1 class="text-white">Datos donacion y inversion.</h1>
                </div>
            </div>
        </div>
    </header>

    
    <div class="container">
    <div class="row text-center">
        <div class="col-2 mx-auto">
            <img src="../images/jobs/inversion.png" alt="Imagen 1" style="width: 200px; margin-bottom: 10px;">
            <br>
            <button class="btn btn-primary" onclick="window.location.href = 'inversion.php'">Inversiones</button>
        </div>
        <div class="col-8">
            <img src="../images/jobs/Donacion.jpg" alt="Imagen 2" style="width: 200px; margin-bottom: 10px;">
            <br>
            <button class="btn btn-success" onclick="window.location.href = 'Donaciones.php'">Donaciones</button>
        </div>
    </div>
</div>


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