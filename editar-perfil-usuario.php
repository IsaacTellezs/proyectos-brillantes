<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>CFMX</title>

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
<body id="top">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="index.html">
                <!-- <img src="images/logo.png" class="img-fluid logo-image"> -->
                <div class="d-flex flex-column">
                    <strong class="logo-text">CROWD</strong>
                    <small class="logo-slogan">FUNDING MX</small>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav align-items-center ms-lg-5">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.html">Pagina Principal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">Quienes Somos</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categorias</a>
                        <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                            <li><a class="dropdown-item" href="educacion.html">Educación</a></li>
                            <li><a class="dropdown-item" href="NegociosyEmprendimiento.html">Negocios y emprendimiento</a></li>
                            <li><a class="dropdown-item" href="GobiernoyServicios.html">Gobierno y servicios públicos</a></li>
                            <li><a class="dropdown-item" href="SocialySinFines.html">Social y sin fines de lucro</a></li>
                            <li><a class="dropdown-item" href="Salud.html">Salud</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contacto</a>
                    </li>
                    <li class="nav-item ms-lg-auto">
                        <a class="nav-link" href="#">Registrate</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link custom-btn btn" href="#">Iniciar Sesion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <section class="hero-section d-flex justify-content-center align-items-center">
            <div class="section-overlay"></div>

            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12">
                        <form class="custom-form hero-form" action="perfil-usuario.php" method="post" role="form" enctype="multipart/form-data">
                            <h2 class="text-center text-white mb-4">Perfil de Usuario</h2>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi-person custom-icon"></i></span>
                                        <input type="text" class="form-control" id="nombre" placeholder="Tu nombre" name="nombre" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="email" class="form-label">Correo Electrónico</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi-envelope custom-icon"></i></span>
                                        <input type="email" class="form-control" id="email" placeholder="tucorreo@example.com" name="email" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="edad" class="form-label">Edad</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi-calendar custom-icon"></i></span>
                                        <input type="number" class="form-control" id="edad" placeholder="Tu edad" name="edad" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="numero" class="form-label">Número de teléfono</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi-telephone custom-icon"></i></span>
                                        <input type="text" class="form-control" id="numero" placeholder="Tu número" name="numero_telefonico" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="bio" class="form-label">Biografía</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi-person custom-icon"></i></span>
                                        <textarea class="form-control" id="bio" rows="4" placeholder="Cuéntanos algo sobre ti" name="biografia" required></textarea>
                                    </div>
                                </div>
                                
                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="imagen" class="form-label">Imagen de Perfil</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi-person custom-icon"></i></span>
                                        <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <!-- Aquí va el contenido del pie de página como lo tienes en tu código original -->
    </footer>

    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/counter.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>
