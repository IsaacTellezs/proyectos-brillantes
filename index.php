<?php
include 'funciones/conex.php';
include 'funciones/funciones.php';
conectar();       
session_start(); 
 // Ruta absoluta para el header dinamico
$currentDir = __DIR__;
$_SESSION['currentDir'] = $currentDir;

headerDinamico($conexion);

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
        <link href="css/styles.css" rel="stylesheet">

        <link rel="shortcut icon" href=" images/logo simple.svg" />

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

                                <a href="#categories-section" class="custom-btn custom-border-btn btn">Ver proyectos</a>
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
    <form class="custom-form hero-form" action="./categorias/busqueda.php" method="get" role="form">
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
                    <a href="./categorias/educacion.php" class="badge">Educación</a>
                    <a href="./categorias/NegociosyEmprendimiento.php" class="badge">Negocios</a>
                    <a href="./categorias/GobiernoyServicios.php" class="badge">Gobierno</a>
                    <a href="./categorias/SocialySinFines.php" class="badge">Social</a>
                    <a href="./categorias/NegociosyEmprendimiento.php" class="badge">Emprendimiento</a>
                    <a href="./categorias/Salud.php" class="badge">Salud</a>
                </div>
            </div>
        </div>
    </form>
    <div id="search-results" class="search-results"></div>
</div>
                            
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
                                <a href="./categorias/educacion.php" class="d-flex flex-column justify-content-center align-items-center h-100">
                                    <i class="categories-icon bi-book"></i>
                                
                                    <small class="categories-block-title">Educacion</small>

                                </a>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-4 col-6">
                            <div class="categories-block">
                                <a href="./categorias/NegociosyEmprendimiento.php" class="d-flex flex-column justify-content-center align-items-center h-100">
                                    <i class="categories-icon bi-bag-fill "></i>
                                
                                    <small class="categories-block-title">Negocios y Emprendimiento</small>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-4 col-6">
                            <div class="categories-block">
                                <a href="./categorias/GobiernoyServicios.php" class="d-flex flex-column justify-content-center align-items-center h-100">
                                    <i class="categories-icon bi-bank"></i>
                                
                                    <small class="categories-block-title">Gobiero y Servicios Publicos</small>

                                    
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-4 col-6">
                            <div class="categories-block">
                                <a href="./categorias/SocialySinFines.php" class="d-flex flex-column justify-content-center align-items-center h-100">
                                    <i class="categories-icon bi-chat-square-text"></i>
                                
                                    <small class="categories-block-title">Social y sin fines de Lucro</small>

                                    
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-4 col-6">
                            <div class="categories-block">
                                <a href="./categorias/Salud.php" class="d-flex flex-column justify-content-center align-items-center h-100">
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
<!-----------INICIO: MUESTRA LOS PROYECTOS MAS RECIENTES-------------------->
<?php        
$sql = "SELECT * FROM proyectos ORDER BY fecha_inicio DESC LIMIT 6";
$result = mysqli_query($conexion, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $ProyectoID = $row['id_proyecto'];
        $nombre_proyecto = $row['nom_proyecto'];
        $imagen = $row['imagen'];
        $rutaImagenCompleta = 'uploads/' . $imagen; // Ruta completa a la imagen
        $categoria = $row['categoria'];

        echo '<div class="col-lg-4 col-md-6 col-12">';
        echo '    <div class="job-thumb job-thumb-box">';
        echo '        <div class="job-image-box-wrap">';
        echo '            <a href="desarrollador/informacion-proyecto-desarrollador.php?id_proyecto=' . $ProyectoID . '">';
        echo '                <img src="'  . $rutaImagenCompleta . '" class="job-image img-fluid" alt="' . $nombre_proyecto . '" style="width: 300px; height: 300px;">';
        echo '            </a>';
        echo '        </div>';
        echo '        <div class="job-body">';
        echo '            <h4 class="job-title">';
        echo '                <a href="desarrollador/informacion-proyecto-desarrollador.php?id_proyecto=' . $ProyectoID . '" class="job-title-link">' . $nombre_proyecto . '</a>';
        echo '            </h4>';
        echo '            <p class="job-category">Categoría: ' . $categoria . '</p>';
        echo '            <div class="d-flex align-items-center">';
        echo '                <a href="#" class="bi-bookmark ms-auto me-2">';
        echo '                </a>';
        echo '                <a href="#" class="bi-heart">';
        echo '                </a>';
        echo '            </div>';
        echo '            <div class="d-flex align-items-center">';
        echo '            </div>';
        echo '            <div class="d-flex align-items-center border-top pt-3">';
        echo '                <a href="desarrollador/informacion-proyecto-desarrollador.php?id_proyecto=' . $ProyectoID . '" class="custom-btn btn ms-auto"> Ver más</a>';
        echo '            </div>';
        echo '        </div>';
        echo '    </div>';
        echo '</div>';  
    }
} 
mysqli_close($conexion);
?>
                        <div class="col-lg-4 col-12 recent-jobs-bottom d-flex ms-auto my-4">
                            <a href="categorias/proyectos.php" class="custom-btn btn ms-lg-auto">Ver mas proyectos</a>
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

                                <a href="contact.php" class="custom-link">Contacto</a>
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