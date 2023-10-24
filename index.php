<?php
include 'funciones/conex.php';
include 'funciones/funciones.php';
conectar();       
session_start(); 

if (isset($_SESSION['Correo'])) {
    $correo = $_SESSION['Correo'];
    $_SESSION['TipoUsuario'] = determinarTipoUsuario($correo, $conexion);
 }

?>



<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Proyectos brillantes</title>

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

        <link rel="shortcut icon" href=" images/logo simple.svg" />

    </head>
    <?php
    
    headerDinamico();
    ?>
    <body >

        

        <main>

            <section class="hero-section d-flex justify-content-center align-items-center">
                <div class="section-overlay"></div>

                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                            <div class="hero-section-text mt-5">
                                <h6 class="text-white">Eres innovador o te interesa apoyar algun proyecto?</h6>

                                <h1 class="hero-title text-white mt-4 mb-4">Plataforma de<br> financiacion colectiva</h1>

                                <a href="#categories-section" class="custom-btn custom-border-btn btn">Ver proyectos</a>
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
    <form class="custom-form hero-form" action="busqueda.php" method="get" role="form">
        <h3 class="text-white mb-3">¿Buscas algún proyecto en específico?</h3>

        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="bi-person custom-icon"></i></span>
                    <input type="text" name="q" id="job-title" class="form-control" placeholder="Buscar por categoría" required>
                </div>
            </div>

            <div class="col-lg-12 col-12">
                <button type="submit" class="form-control">Buscar</button>
            </div>
        </div>
        <div class="col-12">
                                        <div class="d-flex flex-wrap align-items-center mt-4 mt-lg-0">
                                            <span class="text-white mb-lg-0 mb-md-0 me-2">Búsquedas populares:</span>

                                            <div>
                                                <a href="educacion.php" class="badge">Educación</a>

                                                <a href="NegociosyEmprendimiento.php" class="badge">Negocios</a>

                                                <a href="GobiernoyServicios.php" class="badge">Gobierno</a>
                                                
                                                <a href="SocialySinFines.php" class="badge">Social</a>

                                                <a href="NegociosyEmprendimiento.php" class="badge">Emprendimiento</a>

                                                <a href="Salud.php" class="badge">Salud</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
    </form>
                            
                        </div>

                    </div>
                </div>
            </section>


            <section class="categories-section section-padding" id="categories-section">
                <div class="container">
                    <div class="row justify-content-center align-items-center">

                        <div class="col-lg-12 col-12 text-center">
                            <h2 class="mb-5">Ver <span>Categorias</span></h2>
                        </div>

                        <div class="col-lg-2 col-md-4 col-6">
                            <div class="categories-block">
                                <a href="#" class="d-flex flex-column justify-content-center align-items-center h-100">
                                    <i class="categories-icon bi-book"></i>
                                
                                    <small class="categories-block-title">Educacion</small>

                                   
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-4 col-6">
                            <div class="categories-block">
                                <a href="#" class="d-flex flex-column justify-content-center align-items-center h-100">
                                    <i class="categories-icon bi-bag-fill "></i>
                                
                                    <small class="categories-block-title">Negocios y Emprendimiento</small>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-4 col-6">
                            <div class="categories-block">
                                <a href="#" class="d-flex flex-column justify-content-center align-items-center h-100">
                                    <i class="categories-icon bi-bank"></i>
                                
                                    <small class="categories-block-title">Gobiero y Servicios Publicos</small>

                                    
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-4 col-6">
                            <div class="categories-block">
                                <a href="#" class="d-flex flex-column justify-content-center align-items-center h-100">
                                    <i class="categories-icon bi-chat-square-text"></i>
                                
                                    <small class="categories-block-title">Social y sin fines de Lucro</small>

                                    
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-4 col-6">
                            <div class="categories-block">
                                <a href="#" class="d-flex flex-column justify-content-center align-items-center h-100">
                                    <i class="categories-icon bi-bag-plus"></i>
                                
                                    <small class="categories-block-title">Salud</small>

                                    
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </section>


            <section class="about-section">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-3 col-12">
                            <div class="about-image-wrap custom-border-radius-start">
                                <img src="images/1.png" class="about-image custom-border-radius-start img-fluid" alt="">

                               
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="custom-text-block">
                                <h2 class="text-white mb-2">¿Que es CROWDFUNDING?</h2>

                                <p class="text-white">Es un sitio en linea donde emprendedores podran recolectar fondos a traves de inversionistas o donadores para financiar sus proyectos, y mediante un trato se llevaran beneficios ambas partes</p>

                           
                            </div>
                        </div>

                        <div class="col-lg-3 col-12">
                            <div class="instagram-block">
                                <img src="images/2.png" class="about-image custom-border-radius-end img-fluid" alt="">

                                <div class="instagram-block-text">
                                    <a href="https://instagram.com/" class="custom-btn btn">
                                        <i class="bi-instagram"></i>
                                        @CRDMX
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>


   <!-----       <section class="job-section job-featured-section section-padding" id="job-section">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-12 text-center mx-auto mb-4">
                            <h2>Featured Jobs</h2>

                            <p><strong>Over 10k opening jobs</strong> Feel free to download and use our free HTML templates from Tooplate website.</p>
                        </div>

                        <div class="col-lg-12 col-12">
                            <div class="job-thumb d-flex">
                                <div class="job-image-wrap bg-white shadow-lg">
                                    <img src="images/logos/google.png" class="job-image img-fluid" alt="">
                                </div>

                                <div class="job-body d-flex flex-wrap flex-auto align-items-center ms-4">
                                    <div class="mb-3">
                                        <h4 class="job-title mb-lg-0">
                                            <a href="job-details.html" class="job-title-link">Technical Lead</a>
                                        </h4>

                                        <div class="d-flex flex-wrap align-items-center">
                                            <p class="job-location mb-0">
                                                <i class="custom-icon bi-geo-alt me-1"></i>
                                                Kuala, Malaysia
                                            </p>

                                            <p class="job-date mb-0">
                                                <i class="custom-icon bi-clock me-1"></i>
                                                10 hours ago
                                            </p>

                                            <p class="job-price mb-0">
                                                <i class="custom-icon bi-cash me-1"></i>
                                                $20k
                                            </p>

                                            <div class="d-flex">
                                                <p class="mb-0">
                                                    <a href="job-listings.html" class="badge badge-level">Internship</a>
                                                </p>

                                                <p class="mb-0">
                                                    <a href="job-listings.html" class="badge">Freelance</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="job-section-btn-wrap">
                                        <a href="job-details.html" class="custom-btn btn">Apply now</a>
                                    </div>
                                </div>
                            </div>

                            <div class="job-thumb d-flex">
                                <div class="job-image-wrap bg-white shadow-lg">
                                    <img src="images/logos/apple.png" class="job-image img-fluid" alt="">
                                </div>

                                <div class="job-body d-flex flex-wrap flex-auto align-items-center ms-4">
                                    <div class="mb-3">
                                        <h4 class="job-title mb-lg-0">
                                            <a href="job-details.html" class="job-title-link">Business Director</a>
                                        </h4>

                                        <div class="d-flex flex-wrap align-items-center">
                                            <p class="job-location mb-0">
                                                <i class="custom-icon bi-geo-alt me-1"></i>
                                                California, USA
                                            </p>

                                            <p class="job-date mb-0">
                                                <i class="custom-icon bi-clock me-1"></i>
                                                1 day ago
                                            </p>

                                            <p class="job-price mb-0">
                                                <i class="custom-icon bi-cash me-1"></i>
                                                $90k
                                            </p>

                                            <div class="d-flex">
                                                <p class="mb-0">
                                                    <a href="job-listings.html" class="badge badge-level">Senior</a href="job-listings.html">
                                                </p>

                                                <p class="mb-0">
                                                    <a href="job-listings.html" class="badge">Full Time</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="job-section-btn-wrap">
                                        <a href="job-details.html" class="custom-btn btn">Apply now</a>
                                    </div>
                                </div>
                            </div>

                            <div class="job-thumb d-flex">
                                <div class="job-image-wrap bg-white shadow-lg">
                                    <img src="images/logos/meta.png" class="job-image img-fluid" alt="">
                                </div>

                                <div class="job-body d-flex flex-wrap flex-auto align-items-center ms-4">
                                    <div class="mb-3">
                                        <h4 class="job-title mb-lg-0">
                                            <a href="job-details.html" class="job-title-link">HR Manager</a>
                                        </h4>

                                        <div class="d-flex flex-wrap align-items-center">
                                            <p class="job-location mb-0">
                                                <i class="custom-icon bi-geo-alt me-1"></i>
                                                Tower, Paris
                                            </p>

                                            <p class="job-date mb-0">
                                                <i class="custom-icon bi-clock me-1"></i>
                                                22 hours ago
                                            </p>

                                            <p class="job-price mb-0">
                                                <i class="custom-icon bi-cash me-1"></i>
                                                $50k
                                            </p>

                                            <div class="d-flex">
                                                <p class="mb-0">
                                                    <a href="job-listings.html" class="badge badge-level">Junior</a>
                                                </p>

                                                <p class="mb-0">
                                                    <a href="job-listings.html" class="badge">Contract</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="job-section-btn-wrap">
                                        <a href="job-details.html" class="custom-btn btn">Apply now</a>
                                    </div>
                                </div>
                            </div>

                            <div class="job-thumb d-flex">
                                <div class="job-image-wrap bg-white shadow-lg">
                                    <img src="images/logos/slack.png" class="job-image img-fluid" alt="">
                                </div>

                                <div class="job-body d-flex flex-wrap flex-auto align-items-center ms-4">
                                    <div class="mb-3">
                                        <h4 class="job-title mb-lg-0">
                                            <a href="job-details.html" class="job-title-link">Dev Ops</a>
                                        </h4>

                                        <div class="d-flex flex-wrap align-items-center">
                                            <p class="job-location mb-0">
                                                <i class="custom-icon bi-geo-alt me-1"></i>
                                                Bangkok, Thailand
                                            </p>

                                            <p class="job-date mb-0">
                                                <i class="custom-icon bi-clock me-1"></i>
                                                40 minutes ago
                                            </p>

                                            <p class="job-price mb-0">
                                                <i class="custom-icon bi-cash me-1"></i>
                                                $75k - 80k
                                            </p>

                                            <div class="d-flex">
                                                <p class="mb-0">
                                                    <a href="job-listings.html" class="badge badge-level">Senior</a>
                                                </p>

                                                <p class="mb-0">
                                                    <a href="job-listings.html" class="badge">Part Time</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="job-section-btn-wrap">
                                        <a href="job-details.html" class="custom-btn btn">Apply now</a>
                                    </div>
                                </div>
                            </div>

                            <div class="job-thumb d-flex">
                                <div class="job-image-wrap bg-white shadow-lg">
                                    <img src="images/logos/creative-market.png" class="job-image img-fluid" alt="">
                                </div>

                                <div class="job-body d-flex flex-wrap flex-auto align-items-center ms-4">
                                    <div class="mb-3">
                                        <h4 class="job-title mb-lg-0">
                                            <a href="job-details.html" class="job-title-link">UX Designer</a>
                                        </h4>

                                        <div class="d-flex flex-wrap align-items-center">
                                            <p class="job-location mb-0">
                                                <i class="custom-icon bi-geo-alt me-1"></i>
                                                Bangkok, Thailand
                                            </p>

                                            <p class="job-date mb-0">
                                                <i class="custom-icon bi-clock me-1"></i>
                                                2 hours ago
                                            </p>

                                            <p class="job-price mb-0">
                                                <i class="custom-icon bi-cash me-1"></i>
                                                $100k
                                            </p>

                                            <div class="d-flex">
                                                <p class="mb-0">
                                                    <a href="job-listings.html" class="badge badge-level">Entry</a>
                                                </p>

                                                <p class="mb-0">
                                                    <a href="job-listings.html" class="badge">Remote</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="job-section-btn-wrap">
                                        <a href="job-details.html" class="custom-btn btn">Apply now</a>
                                    </div>
                                </div>
                            </div>

                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center mt-5">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">Prev</span>
                                        </a>
                                    </li>

                                    <li class="page-item active" aria-current="page">
                                        <a class="page-link" href="#">1</a>
                                    </li>
                                    
                                    <li class="page-item">
                                        <a class="page-link" href="#">2</a>
                                    </li>
                                    
                                    <li class="page-item">
                                        <a class="page-link" href="#">3</a>
                                    </li>

                                    <li class="page-item">
                                        <a class="page-link" href="#">4</a>
                                    </li>

                                    <li class="page-item">
                                        <a class="page-link" href="#">5</a>
                                    </li>
                                    
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>

                    </div>
                </div>
            </section>


            <section>
                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-12">
                            <div class="custom-text-block custom-border-radius-start">
                                <h2 class="text-white mb-3">Gotto helps you an easier way to get new job</h2>

                                <p class="text-white">You are not allowed to redistribute the template ZIP file on any other template collection website. Please contact us for more info. Thank you.</p>

                                <div class="d-flex mt-4">
                                    <div class="counter-thumb"> 
                                        <div class="d-flex">
                                            <span class="counter-number" data-from="1" data-to="12" data-speed="1000"></span>
                                            <span class="counter-number-text">M</span>
                                        </div>

                                        <span class="counter-text">Daily active users</span>
                                    </div> 

                                    <div class="counter-thumb">    
                                        <div class="d-flex">
                                            <span class="counter-number" data-from="1" data-to="450" data-speed="1000"></span>
                                            <span class="counter-number-text">k</span>
                                        </div>

                                        <span class="counter-text">Opening jobs</span>
                                    </div> 
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="video-thumb">
                                <img src="images/people-working-as-team-company.jpg" class="about-image custom-border-radius-end img-fluid" alt="">

                                <div class="video-info">
                                    <a href="https://www.youtube.com/tooplate" class="youtube-icon bi-youtube"></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section> ---> 


            <section class="job-section recent-jobs-section section-padding">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-lg-6 col-12 mb-4">
                            <h2>Proyectos Recientes</h2>
                        </div>

                        <div class="clearfix"></div>

                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="job-thumb job-thumb-box">
                                <div class="job-image-box-wrap">
                                    <a href="job-details.html">
                                        <img src="images/jobs/it-professional-works-startup-project.jpg" class="job-image img-fluid" alt="">
                                    </a>

                                    <div class="job-image-box-wrap-info d-flex align-items-center">
                                        <p class="mb-0">
                                            <a href="job-listings.html" class="badge badge-level">Categoria</a>
                                        </p>
                                    </div>
                                </div>

                                <div class="job-body">
                                    <h4 class="job-title">
                                        <a href="job-details.html" class="job-title-link">Software para control de Tickets</a>
                                    </h4>

                                    <div class="d-flex align-items-center">
                                        <div class="job-image-wrap d-flex align-items-center "">
                                      
                                        </div>

                                        <a href="#" class="bi-bookmark ms-auto me-2">
                                        </a>

                                        <a href="#" class="bi-heart">
                                        </a>
                                    </div>

                                    <div class="d-flex align-items-center">
                                       
                                            DESCRIPCION DEL PROYECTO
                                        
                                    </div>

                                    <div class="d-flex align-items-center border-top pt-3">
                                    
                                        <a href="job-details.html" class="custom-btn btn ms-auto">Ver mas</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                      
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="job-thumb job-thumb-box">
                                <div class="job-image-box-wrap">
                                    <a href="job-details.html">
                                        <img src="images/jobs/it-professional-works-startup-project.jpg" class="job-image img-fluid" alt="">
                                    </a>

                                    <div class="job-image-box-wrap-info d-flex align-items-center">
                                        <p class="mb-0">
                                            <a href="job-listings.html" class="badge badge-level">Categoria</a>
                                        </p>
                                    </div>
                                </div>

                                <div class="job-body">
                                    <h4 class="job-title">
                                        <a href="job-details.html" class="job-title-link">Software para control de Tickets</a>
                                    </h4>

                                    <div class="d-flex align-items-center">
                                        <div class="job-image-wrap d-flex align-items-center "">
                                      
                                        </div>

                                        <a href="#" class="bi-bookmark ms-auto me-2">
                                        </a>

                                        <a href="#" class="bi-heart">
                                        </a>
                                    </div>

                                    <div class="d-flex align-items-center">
                                       
                                            DESCRIPCION DEL PROYECTO
                                        
                                    </div>

                                    <div class="d-flex align-items-center border-top pt-3">
                                    
                                        <a href="job-details.html" class="custom-btn btn ms-auto">Ver mas</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                      
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="job-thumb job-thumb-box">
                                <div class="job-image-box-wrap">
                                    <a href="job-details.html">
                                        <img src="images/jobs/it-professional-works-startup-project.jpg" class="job-image img-fluid" alt="">
                                    </a>

                                    <div class="job-image-box-wrap-info d-flex align-items-center">
                                        <p class="mb-0">
                                            <a href="job-listings.html" class="badge badge-level">Categoria</a>
                                        </p>
                                    </div>
                                </div>

                                <div class="job-body">
                                    <h4 class="job-title">
                                        <a href="job-details.html" class="job-title-link">Software para control de Tickets</a>
                                    </h4>

                                    <div class="d-flex align-items-center">
                                        <div class="job-image-wrap d-flex align-items-center "">
                                      
                                        </div>

                                        <a href="#" class="bi-bookmark ms-auto me-2">
                                        </a>

                                        <a href="#" class="bi-heart">
                                        </a>
                                    </div>

                                    <div class="d-flex align-items-center">
                                       
                                            DESCRIPCION DEL PROYECTO
                                        
                                    </div>

                                    <div class="d-flex align-items-center border-top pt-3">
                                    
                                        <a href="job-details.html" class="custom-btn btn ms-auto">Ver mas</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                     
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="job-thumb job-thumb-box">
                                <div class="job-image-box-wrap">
                                    <a href="job-details.html">
                                        <img src="images/jobs/it-professional-works-startup-project.jpg" class="job-image img-fluid" alt="">
                                    </a>

                                    <div class="job-image-box-wrap-info d-flex align-items-center">
                                        <p class="mb-0">
                                            <a href="job-listings.html" class="badge badge-level">Categoria</a>
                                        </p>
                                    </div>
                                </div>

                                <div class="job-body">
                                    <h4 class="job-title">
                                        <a href="job-details.html" class="job-title-link">Software para control de Tickets</a>
                                    </h4>

                                    <div class="d-flex align-items-center">
                                        <div class="job-image-wrap d-flex align-items-center "">
                                      
                                        </div>

                                        <a href="#" class="bi-bookmark ms-auto me-2">
                                        </a>

                                        <a href="#" class="bi-heart">
                                        </a>
                                    </div>

                                    <div class="d-flex align-items-center">
                                       
                                            DESCRIPCION DEL PROYECTO
                                        
                                    </div>

                                    <div class="d-flex align-items-center border-top pt-3">
                                    
                                        <a href="job-details.html" class="custom-btn btn ms-auto">Ver mas</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                     
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="job-thumb job-thumb-box">
                                <div class="job-image-box-wrap">
                                    <a href="job-details.html">
                                        <img src="images/jobs/it-professional-works-startup-project.jpg" class="job-image img-fluid" alt="">
                                    </a>

                                    <div class="job-image-box-wrap-info d-flex align-items-center">
                                        <p class="mb-0">
                                            <a href="job-listings.html" class="badge badge-level">Categoria</a>
                                        </p>
                                    </div>
                                </div>

                                <div class="job-body">
                                    <h4 class="job-title">
                                        <a href="job-details.html" class="job-title-link">Software para control de Tickets</a>
                                    </h4>

                                    <div class="d-flex align-items-center">
                                        <div class="job-image-wrap d-flex align-items-center "">
                                      
                                        </div>

                                        <a href="#" class="bi-bookmark ms-auto me-2">
                                        </a>

                                        <a href="#" class="bi-heart">
                                        </a>
                                    </div>

                                    <div class="d-flex align-items-center">
                                       
                                            DESCRIPCION DEL PROYECTO
                                        
                                    </div>

                                    <div class="d-flex align-items-center border-top pt-3">
                                    
                                        <a href="job-details.html" class="custom-btn btn ms-auto">Ver mas</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                      
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="job-thumb job-thumb-box">
                                <div class="job-image-box-wrap">
                                    <a href="job-details.html">
                                        <img src="images/jobs/it-professional-works-startup-project.jpg" class="job-image img-fluid" alt="">
                                    </a>

                                    <div class="job-image-box-wrap-info d-flex align-items-center">
                                        <p class="mb-0">
                                            <a href="job-listings.html" class="badge badge-level">Categoria</a>
                                        </p>
                                    </div>
                                </div>

                                <div class="job-body">
                                    <h4 class="job-title">
                                        <a href="job-details.html" class="job-title-link">Software para control de Tickets</a>
                                    </h4>

                                    <div class="d-flex align-items-center">
                                        <div class="job-image-wrap d-flex align-items-center ">
                                      
                                        </div>

                                        <a href="#" class="bi-bookmark ms-auto me-2">
                                        </a>

                                        <a href="#" class="bi-heart">
                                        </a>
                                    </div>

                                    <div class="d-flex align-items-center">
                                       
                                            DESCRIPCION DEL PROYECTO
                                        
                                    </div>

                                    <div class="d-flex align-items-center border-top pt-3">
                                    
                                        <a href="detallesProyecto.php" class="custom-btn btn ms-auto">Ver mas</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-12 recent-jobs-bottom d-flex ms-auto my-4">
                            <a href="listaProyectos.php" class="custom-btn btn ms-lg-auto">Ver mas proyectos</a>
                        </div>

                    </div>
                </div>
            </section>

<!--------APARTADO DE COMENTARIOS   ----->
<!--------
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
                                        <img src="images/avatar/portrait-beautiful-young-woman.jpg" class="avatar-image img-fluid" alt="">

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
                                        <img src="images/avatar/university-study-abroad-lifestyle-concept.jpg" class="avatar-image img-fluid" alt="">

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
            </section> ----->


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