<?php
// Inicia la sesión (si aún no está iniciada)
session_start();
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

    <body class="about-page">

       
    <main>

<section class="about-section">
    <div class="container">
        <div class="row justify-content-center align-items-center">

            <div class="col-lg-5 col-12">
                <div class="about-info-text">
                    <h2 class="mb-0">En "Proyectos Brillantes"</h2>

                    <h4 class="mb-2">Somos una plataforma de financiación colectiva apasionada por impulsar la innovación y hacer realidad las ideas más brillantes.</h4>

                    <p>Nuestra misión es conectar a personas con grandes ideas con una comunidad comprometida que comparte su entusiasmo por el cambio y la creatividad.</p>

                    <div class="d-flex align-items-center mt-4">
                        <a href="#services-section" class="custom-btn custom-border-btn btn me-4">Explorar proyectos</a>

                        <a href="contact.html" class="custom-link smoothscroll">Contacto</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 col-12 mt-5 mt-lg-0">
                <div class="about-image-wrap">
                    <img src="images/about1.png" class="about-image about-image-border-radius img-fluid" alt="">

                    <div class="about-info d-flex">
                        

                        <p class="text-white mb-0">Trabajando juntos</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<section class="services-section section-padding" id="services-section">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12 text-center">
                <h2 class="mb-5">Nuestra Plataforma de Financiación Colectiva</h2>
            </div>

            <div class="services-block-wrap col-lg-4 col-md-6 col-12">
                <div class="services-block">
                    <div class="services-block-title-wrap">
                        <i class="services-block-icon  bi bi-suit-heart-fill"></i>
                    
                        <h4 class="services-block-title">Lo que Nos Impulsa</h4>
                    </div>

                    <div class="services-block-body">
                        <p>En "Proyectos Brillantes", estamos impulsados por la creencia de que las ideas pueden cambiar el mundo.</p>
                    </div>
                </div>
            </div>

            <div class="services-block-wrap col-lg-4 col-md-6 col-12 my-4 my-lg-0 my-md-0">
                <div class="services-block">
                    <div class="services-block-title-wrap">
                        <i class="services-block-icon bi bi-globe2"></i>
                    
                        <h4 class="services-block-title">Comunidad</h4>
                    </div>

                    <div class="services-block-body">
                        <p>Únete a "Proyectos Brillantes" y sé parte de una comunidad que valora la innovación, la pasión y el apoyo mutuo.</p>
                    </div>
                </div>
            </div>

            <div class="services-block-wrap col-lg-4 col-md-6 col-12">
                <div class="services-block">
                    <div class="services-block-title-wrap">
                        <i class="services-block-icon bi bi-emoji-laughing-fill"></i>
                    
                        <h4 class="services-block-title">Audacia</h4>
                    </div>

                    <div class="services-block-body">
                        <p>Creemos en la audacia de pensar de manera diferente y en la importancia de dar a las personas la oportunidad de convertir sus conceptos en realidad. Nos enorgullece ser un motor de la creatividad y el cambio.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<section class="about-section">
    <div class="container">
        <div class="row justify-content-center align-items-center">

            <div class="col-lg-5 col-12">
                <div class="about-info-text">
                    <h2 class="mb-0">Creadores</h2>

                   

                    <p>Los creadores dentro de "Proyectos Brillantes" tienen la oportunidad de ser seleccionados para poder realizar un proyecto propuesto por ellos
    mismos con el proposito de crear un impacto innovador, dicha difucultad o area en la cual desenvolver dicho proyecto sera establecido por el mismo.

Los creadores tendran dos propositos:</p>
<p>🟠 Finalizar y poner en marcha dicho proyecto</p>    
<p>🟠 Su donante/inversionita obtendra un beneficio establecido por un acuerdo mutuo entre ambas partes como: ser mencionado en el proyecto, servicio o producto gratis.</p>     

                 
                </div>
            </div>

            <div class="col-lg-5 col-12 mt-5 mt-lg-0">
                <div class="about-image-wrap">
                    <img src="images/creador.png" class="about-image about-image-border-radius img-fluid" alt="">

             
                </div>
            </div>

        </div>
    </div>
</section>
<br>

<section class="about-section">
    <div class="container">
        <div class="row justify-content-center align-items-center">

            <div class="col-lg-5 col-12">
                <div class="about-info-text">
                    <h2 class="mb-0">Inversionistas</h2>

                   

                    <p>Los Inversionistas dentro de "Proyectos Brillantes" tendran la oportunidad de apoyar el talento 
                        y la motivacion de los creadores ayudandolos mediante:</p>
<p>🟠 Donaciones: donde no se esperara nada a cambio</p>    
<p>🟠 Inversiones: donde obtendra una recompensa por el dinero invertido segun el acuerdo establecido entre ambas partes</p>     

                 
                </div>
            </div>

            <div class="col-lg-5 col-12 mt-5 mt-lg-0">
                <div class="about-image-wrap">
                    <img src="images/inversionista.png" class="about-image about-image-border-radius img-fluid" alt="">

             
                </div>
            </div>

        </div>
    </div>
</section>
<br><br><br>

<!-- 
            <section class="reviews-section section-padding">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12 col-12">
                            <h2 class="text-center mb-5">Happy customers</h2>

                            <div class="owl-carousel owl-theme reviews-carousel">
                                <div class="reviews-thumb">
                                
                                    <div class="reviews-info d-flex align-items-center">
                                        <img src="images/avatar/portrait-charming-middle-aged-attractive-woman-with-blonde-hair.jpg" class="avatar-image img-fluid" alt="">

                                        <div class="d-flex align-items-center justify-content-between flex-wrap w-100 ms-3">
                                            <p class="mb-0">
                                                <strong>Susan L</strong>
                                                <small>Product Manager</small>
                                            </p>

                                            <div class="reviews-icons">
                                                <i class="bi-star-fill"></i>
                                                <i class="bi-star-fill"></i>
                                                <i class="bi-star-fill"></i>
                                                <i class="bi-star-fill"></i>
                                                <i class="bi-star-fill"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="reviews-body">
                                        <img src="images/left-quote.png" class="quote-icon img-fluid" alt="">

                                        <h4 class="reviews-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</h4>
                                    </div>
                                </div>

                                <div class="reviews-thumb">
                                    <div class="reviews-info d-flex align-items-center">
                                        <img src="images/avatar/medium-shot-smiley-senior-man.jpg" class="avatar-image img-fluid" alt="">

                                        <div class="d-flex align-items-center justify-content-between flex-wrap w-100 ms-3">
                                            <p class="mb-0">
                                                <strong>Jack</strong>
                                                <small>Technical Lead</small>
                                            </p>

                                            <div class="reviews-icons">
                                                <i class="bi-star-fill"></i>
                                                <i class="bi-star-fill"></i>
                                                <i class="bi-star-fill"></i>
                                                <i class="bi-star"></i>
                                                <i class="bi-star"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="reviews-body">
                                        <img src="images/left-quote.png" class="quote-icon img-fluid" alt="">

                                        <h4 class="reviews-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</h4>
                                    </div>
                                </div>

                                <div class="reviews-thumb">

                                    <div class="reviews-info d-flex align-items-center">
                                        <img src="images/avatar/portrait-beautiful-young-woman-studying-table-with-laptop-computer-notebook-home-studying-online-e-learning-system.jpg" class="avatar-image img-fluid" alt="">

                                        <div class="d-flex align-items-center justify-content-between flex-wrap w-100 ms-3">
                                            <p class="mb-0">
                                                <strong>Haley</strong>
                                                <small>Sales & Marketing</small>
                                            </p>

                                            <div class="reviews-icons">
                                                <i class="bi-star-fill"></i>
                                                <i class="bi-star-fill"></i>
                                                <i class="bi-star-fill"></i>
                                                <i class="bi-star-fill"></i>
                                                <i class="bi-star-fill"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="reviews-body">
                                        <img src="images/left-quote.png" class="quote-icon img-fluid" alt="">

                                        <h4 class="reviews-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</h4>
                                    </div>
                                </div>

                                <div class="reviews-thumb">
                                    <div class="reviews-info d-flex align-items-center">
                                        <img src="images/avatar/blond-man-happy-expression.jpg" class="avatar-image img-fluid" alt="">

                                        <div class="d-flex align-items-center justify-content-between flex-wrap w-100 ms-3">
                                            <p class="mb-0">
                                                <strong>Jackson</strong>
                                                <small>Dev Ops</small>
                                            </p>

                                            <div class="reviews-icons">
                                                <i class="bi-star-fill"></i>
                                                <i class="bi-star-fill"></i>
                                                <i class="bi-star-fill"></i>
                                                <i class="bi-star"></i>
                                                <i class="bi-star"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="reviews-body">
                                        <img src="images/left-quote.png" class="quote-icon img-fluid" alt="">

                                        <h4 class="reviews-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</h4>
                                    </div>
                                </div>

                                <div class="reviews-thumb">
                                    <div class="reviews-info d-flex align-items-center">
                                        <img src="images/avatar/university-study-abroad-lifestyle-concept-satisfied-happy-asian-male-student-glasses-shirt-showing-thumbs-up-approval-likes-studying-college-holding-laptop-backpack.jpg" class="avatar-image img-fluid" alt="">

                                        <div class="d-flex align-items-center justify-content-between flex-wrap w-100 ms-3">
                                            <p class="mb-0">
                                                <strong>Kevin</strong>
                                                <small>Internship</small>
                                            </p>

                                            <div class="reviews-icons">
                                                <i class="bi-star-fill"></i>
                                                <i class="bi-star-fill"></i>
                                                <i class="bi-star-fill"></i>
                                                <i class="bi-star-fill"></i>
                                                <i class="bi-star-fill"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="reviews-body">
                                        <img src="images/left-quote.png" class="quote-icon img-fluid" alt="">

                                        <h4 class="reviews-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
-->


<section class="cta-section">
    <div class="section-overlay"></div>

    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-10">
                <h2 class="text-white mb-2">Donde las Ideas se Hacen Realidad</h2>

                <p class="text-white">Tienes dudas a cerca de nuestras normas y políticas, consultalas.
                    Tambien, puedes leer nuestro aviso de privacidad y como protegemos tus datos personales.
                </p>
            </div>

            <div class="col-lg-4 col-12 ms-auto">
                <div class="custom-border-btn-wrap d-flex align-items-center mt-lg-4 mt-2">
                    <a href="aviso de privacidad.php" class="custom-btn custom-border-btn btn me-4">Aviso de Privacidad</a>

                    <a href="normas y politicas.php" class="custom-link">Normas y Políticas</a>
                </div>
            </div>

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
