<?php
session_start();
require 'funciones/conex.php';
conectar();

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

        <title>Registro</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-icons.css" rel="stylesheet">
        <link href="css/owl.carousel.min.css" rel="stylesheet">
        <link href="css/owl.theme.default.min.css" rel="stylesheet">
        <link href="css/tooplate-gotto-job.css" rel="stylesheet">
        <link href="css/index.css" rel="stylesheet">

    </head>
    <!--
Header
-->

    <body>


        <main>

            <section class="hero-section d-flex justify-content-center align-items-center">
                <div class="section-overlay"></div>

                <div class="container">
                    <div class="row d-flex justify-content-center">

                       

                        <div class="col-lg-6 col-12">
                        <form class="custom-form hero-form" action="registro-creador-proyecto.php" method="POST" role="form" enctype="multipart/form-data">
                                <h3 class="text-white mb-3 d-flex justify-content-center">Proyecto</h3>

                                <div class="row">
                                    <div class="col-lg-12 col-12">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1"><i class="bi-person custom-icon"></i></span>

                                            <input type="text" name="Nombre_proyecto" id="Nombre_proyecto" class="form-control" placeholder="Nombre_proyecto" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-12">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1"><i class="bi-person custom-icon"></i></span>

                                            <input type="text" name="Descripcion" id="Descripcion" class="form-control" placeholder="Descripcion" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                             <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="bi-person custom-icon"></i></span>
        <select class="form-select" id="Categorias" name="Categorias" required>
            <option value="Educación">Educación</option>
            <option value="Negocios y emprendimiento">Negocios y emprendimiento</option>
            <option value="Gobierno y servicios públicos">Gobierno y servicios públicos</option>
            <option value="Social y sin fines de lucro">Social y sin fines de lucro</option>
            <option value="Salud">Salud</option>
        </select>
    </div>
</div>

<div class="col-lg-6 col-md-6 col-12">
                             <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="bi-person custom-icon"></i></span>
        <select class="form-select" id="Tipo_inversion" name="Tipo_inversion" required>
            <option value="Donacion">Donacion</option>
            <option value="Prestamo">Prestamo</option>
        </select>
    </div>
</div>

<div class="col-lg-12 col-12">
    <div class="input-group">
        <span class="input-group-text" id="basic-addon1"><i class="bi-image custom-icon"></i></span>
        <input type="file" name="Imagen" id="Imagen" accept="image/*" required>
    </div>
</div>
                                    <div class="col-lg-12 col-12">
                                        <button type="submit" class="form-control">
                                            Subir proyecto
                                        </button>
                                    </div>

                                    
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </section>

    <!--
Footer
-->
    <?php
    include 'footer.php';
    ?>

        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/counter.js"></script>
        <script src="js/custom.js"></script>
        <script src="js/scripteye.js"></script>

    </body>
</html>
