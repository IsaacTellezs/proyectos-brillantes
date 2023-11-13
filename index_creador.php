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

        <!-- Agrega el bloque de script aquí -->
        <script>
    // Función para realizar la búsqueda en tiempo real
    function searchProjects() {
        const searchInput = document.getElementById('job-title');
        const searchResults = document.getElementById('search-results');
        const searchValue = searchInput.value;

        if (searchValue.length >= 3) { // Realiza la búsqueda después de escribir al menos 3 caracteres
            // Realiza una solicitud AJAX
            const xhr = new XMLHttpRequest();
            xhr.open('GET', `search.php?q=${searchValue}`, true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Actualiza el contenido de los resultados
                    searchResults.innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        } else {
            // Borra los resultados si el campo de búsqueda está vacío
            searchResults.innerHTML = '';
        }
    }

    // Agrega un listener al campo de búsqueda para llamar a la función searchProjects cuando se escriba
    document.getElementById('job-title').addEventListener('input', searchProjects);
</script>
        <!-- Fin del bloque de script -->
        
    </head>
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

                                <a href="perfil-inversionista-proyectos.php" class="custom-btn custom-border-btn btn">Ver proyectos</a>
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
    <form class="custom-form hero-form" action="busqueda-inversionista.php" method="get" role="form">
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
                                <a href="Negocios" class="d-flex flex-column justify-content-center align-items-center h-100">
                                    <i class="categories-icon bi-bag-fill "></i>
                                
                                    <small class="categories-block-title">Negocios y Emprendimiento</small>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-4 col-6">
                            <div class="categories-block">
                                <a href="GobiernoyServicios.php" class="d-flex flex-column justify-content-center align-items-center h-100">
                                    <i class="categories-icon bi-bank"></i>
                                
                                    <small class="categories-block-title">Gobiero y Servicios Publicos</small>

                                    
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-4 col-6">
                            <div class="categories-block">
                                <a href="SocialySinFines.php" class="d-flex flex-column justify-content-center align-items-center h-100">
                                    <i class="categories-icon bi-chat-square-text"></i>
                                
                                    <small class="categories-block-title">Social y sin fines de Lucro</small>

                                    
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-4 col-6">
                            <div class="categories-block">
                                <a href="Salud.php" class="d-flex flex-column justify-content-center align-items-center h-100">
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

                                <a href="contac.php" class="custom-link">Contacto</a>
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