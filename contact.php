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

        <title>Proyectos brillantes Contacto</title>

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

    <body>

    <main>

    <header class="site-header py-5">
    <div class="section-overlay"></div>

    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="text-white">Ponte en contacto.</h1>
            </div>
        </div>
    </div>
</header>

<section class="contact-section section-padding">
    <div class="container">
        <div class="row justify-content-center">

           

         
        
            <div class="col-lg-8 col-12 mx-auto">
        
                <form method="POST" class="custom-form contact-form" action="contacto-guardar.php" >
                    <h2 class="text-center mb-4">¿Tienes un proyecto en mente o duda? Ponte en contacto con nosotros</h2>

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <label for="first-name">Nombre completo</label>

                            <input type="text" name="nombre_completo" id="nombre_completo" class="form-control" placeholder="Escribe tu nombre" required>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <label for="email">Email</label>

                             <input type="email" name="correo_electronico" id="correo_electronico" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Escribe tu correo electronico" required>
                        </div>

                        <div class="col-lg-12 col-12">
                            <label for="motivo">Mensaje</label>

                            <textarea name="motivo" rows="6" class="form-control" id="motivo" placeholder="¿En que puedo ayudarte?"></textarea>
                        </div>

                        <div class="col-lg-4 col-md-4 col-6 mx-auto">
                            <button type="submit" class="form-control">Enviar mensaje</button>
                            <a href="confirmacion-contacto.php">
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>
<br><br><br>



              <!-- footer -->
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

