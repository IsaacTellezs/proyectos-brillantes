<?php
include './funciones/conex.php';
include './funciones/funciones.php';
conectar();       
session_start(); 

headerDinamico($conexion);
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
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/bootstrap-icons.css" rel="stylesheet">
    <link href="./css/owl.carousel.min.css" rel="stylesheet">
    <link href="./css/owl.theme.default.min.css" rel="stylesheet">
    <link href="./css/tooplate-gotto-job.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="alert alert-success text-center" role="alert" style="font-size: 24px;">
            <h4 class="alert-heading" style="font-size: 60px;">¡¡Gracias por la inversión!!</h4>
            <p class="mb-0" style="font-size: 24px;">Tu generosidad nos ayuda a seguir adelante.</p>
        </div>

        <?php include './footer.php'; ?>
    </div>

    <!-- JAVASCRIPT FILES -->
    <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/owl.carousel.min.js"></script>
    <script src="./js/counter.js"></script>
    <script src="./js/custom.js"></script>
</body>

</html>
