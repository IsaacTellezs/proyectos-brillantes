<?php
// Verifica la sesión y la conexión a la base de datos
session_start();
require 'funciones/conex.php';
conectar();

if (isset($_GET['id_proyecto'])) {
    $id_proyecto = $_GET['id_proyecto'];

    // Consulta SQL para obtener detalles del proyecto
    $query = "SELECT nom_proyecto, descripcion, imagen, categoria FROM proyectos WHERE id_proyecto = $id_proyecto"; // Ajusta la consulta según tu base de datos

    // Ejecuta la consulta
    $result = mysqli_query($conexion, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $Proyecto = $row['nom_proyecto'];
            $Descripcion = $row['descripcion'];
            $Imagen = $row['imagen'];
            $Categoria = $row['categoria'];

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
                    <h1 class="text-white">Detalles del Proyecto</h1>
                </div>
            </div>
        </div>
    </header>
    <section class="job-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="project-details">
                    <div class="project-image">
                        <div class="job-thumb job-thumb-box">
                            <div class="job-image-box-wrap">
                                <img src="<?php echo $Imagen; ?>" class="job-image img-fluid" alt="Imagen del Proyecto" style="max-width: 100%; max-height: 100vh;">
                            </div>
                        </div>
                    </div>
                    <div class="project-description">
                        <h3>Proyecto: <?php echo $Proyecto; ?></h3>
                        <p>Descripción: <?php echo $Descripcion; ?></p>
                        <p>Categoría: <?php echo $Categoria; ?></p>
                        <div class="col-lg-12 col-12">
                        <p></p>
                        <p></p>
                        <p></p>
                        <p></p>
                        <p></p>
    <div class="btn-group" role="group">
    <div id="donate-button-container">
<div id="donate-button"></div>
<script src="https://www.paypalobjects.com/donate/sdk/donate-sdk.js" charset="UTF-8"></script>
<script>
PayPal.Donation.Button({
env:'production',
hosted_button_id:'YYDCTHG6SCJB8',
image: {
src:'https://pics.paypal.com/00/s/NjdmZDFiN2EtYWM1MC00ZWQ2LWFjMDYtYjg2OWE5NWZhZWM0/file.PNG',
alt:'Donar con el botón PayPal',
title:'PayPal - The safer, easier way to pay online!',
}
}).render('#donate-button');
</script>
</div>
<div id="donate-button-container">
<div id="donate-button"></div>
<script src="https://www.paypalobjects.com/donate/sdk/donate-sdk.js" charset="UTF-8"></script>
<script>
PayPal.Donation.Button({
env:'production',
hosted_button_id:'F7GJXF9T5MLY2',
image: {
src:'https://pics.paypal.com/00/s/ZmY3M2RjNmUtMmExYy00YjE4LWIwMzgtMmZkZDdiNGFhODk1/file.PNG',
alt:'Donar con el botón PayPal',
title:'PayPal - The safer, easier way to pay online!',
}
}).render('#donate-button');
</script>
</div>
    </div>
</div>
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