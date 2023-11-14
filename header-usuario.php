
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="icon" href="images/logo simple.svg" type="image/svg">
    </head>
<body>
    <header id="top">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="/crowd/index.php">
            <img src="/crowd/images/Logo%20simple.svg" class="img-fluid logo-image">
                <div class="d-flex flex-column">
                    <strong class="logo-text">Proyectos </strong>
                    <small class="logo-slogan">brillantes</small>
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav align-items-center ms-lg-5">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Pagina Principal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">Quienes Somos</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categorias</a>
                        <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                            <li><a class="dropdown-item" href="./categorias/educacion.php">Educación</a></li>
                            <li><a class="dropdown-item" href="NegociosyEmprendimiento.php">Negocios y Emprendimiento</a></li>
                            <li><a class="dropdown-item" href="GobiernoyServicios.php">Gobierno y Servicios Publicos</a></li>
                            <li><a class="dropdown-item" href="SocialySinFines.php">Social y sin fines de Lucro</a></li>
                            <li><a class="dropdown-item" href="Salud.php">Salud</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./desarrollador/registro-proyectos.php">Subir proyecto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./desarrollador/index.php">Centro de control</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle custom-btn btn" href="#">Inicio</a>
                        <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                            <li><a class="dropdown-item" href="index.php">Inicio</a></li>
                            <li><a class="dropdown-item" href="perfil.php">Mi perfil</a></li>
                            <li><a class="dropdown-item" href="desarrollador/misProyectos.php">Mis proyectos</a></li>
                            <li><a class="dropdown-item" href="funciones/logout.php">Cerrar sesión</a></li>
                        </ul>
                    </li>
            </div>
        </nav>
    </header>
</body>
</html>