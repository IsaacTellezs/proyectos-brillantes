<?php
   session_start();
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
    
       <!-- Header -->
       <?php
   
    // Comprueba si el usuario ha iniciado sesión
    if (isset($_SESSION['Correo'])) {
        // Header para usuarios que han iniciado sesión
        include 'header-usuario.php';
    } else {
        // Header para usuarios que aún no han iniciado sesión
        include 'header.php';
    }
    ?>

    <body>

    <main>

<header class="site-header">
    <div class="section-overlay"></div>

    <div class="container">
        <div class="row">
            
            <div class="col-lg-12 col-12 text-center">
                <h1 class="text-white">Ponte en contacto</h1>

             
            </div>

        </div>
    </div>
</header>

<section class="contact-section section-padding">
    <div class="container">
        <div class="row justify-content-center">

           

         
        
            <div class="col-lg-8 col-12 mx-auto">
                <form class="custom-form contact-form" action="funciones/confirmacion.php" method="post" role="form">
                    <h2 class="text-center mb-4">¿Tienes un proyecto en mente o duda? Ponte en contacto con nosotros</h2>

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <label for="first-name">Nombre completo</label>

                            <input type="text" name="full-name" id="full-name" class="form-control" placeholder="Escribe tu nombre" required>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <label for="email">Email</label>

                             <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Escribe tu correo electronico" required>
                        </div>

                        <div class="col-lg-12 col-12">
                            <label for="message">Mensaje</label>

                            <textarea name="message" rows="6" class="form-control" id="message" placeholder="¿En que puedo ayudarte?"></textarea>
                        </div>

                        <div class="col-lg-4 col-md-4 col-6 mx-auto">
                            <button type="submit" class="form-control">Enviar mensaje</button>
                            <a href="#">
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>
<br><br><br>

<section class="cta-section">
    <div class="section-overlay"></div>

    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-10">
                <h2 class="text-white mb-2">Donde las Ideas se Hacen Realidad</h2>

                <p class="text-white">¡Únete a nuestra comunidad de apasionados por la innovación! En "Proyectos Brillantes", estamos comprometidos en impulsar el potencial de mentes creativas y emprendedoras. Ayúdanos a convertir ideas en realidad.</p>
            </div>

            <div class="col-lg-4 col-12 ms-auto">
                <div class="custom-border-btn-wrap d-flex align-items-center mt-lg-4 mt-2">
                    <a href="#" class="custom-btn custom-border-btn btn me-4">Crea una cuenta</a>

                    <a href="#" class="custom-link">Contacto</a>
                </div>
            </div>

        </div>
    </div>
</section>
</main>
            
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
