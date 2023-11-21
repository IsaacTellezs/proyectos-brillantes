<?php
include 'funciones/conex.php';
include 'funciones/funciones.php';
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

        <title>Acerca de Proyectos brillantes</title>

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

<style>
     .video-container {
            text-align: center;
        }

     
</style>
    <body>
        <br><br>
    <div class="video-container">
        <h2> Mensaje enviado correctamente </h2>
        <br>
        <video width="1090" height="" controls  autoplay>
            <source src="images/video-contacto.mp4" type="video/mp4">
            Tu navegador no admite la reproducción de videos.
        </video>
    </div>

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