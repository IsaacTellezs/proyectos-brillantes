<?php
session_start();
require 'funciones/conex.php';
conectar();

if (isset($_SESSION['Correo'])) {
    include 'header-usuario.php';
} else {
    include 'header.php';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['Nombre'], $_POST['Correo'], $_POST['Tel'], $_POST['Experiencia'])) {
        // Obtener los valores del formulario
        $Nom_usuario = $_POST['Nombre'];
        $Correo = $_POST['Correo'];
        $Tel = $_POST['Tel'];
        $Experiencia = $_POST['Experiencia'];

        // Actualizar los datos en MySQL con una sentencia preparada
        $user = $_SESSION['Correo'];
        $update_sql = "UPDATE desarrolladores SET Nombre = ?, Correo = ?, Tel = ?, Experiencia = ? WHERE Correo = ?";
        $stmt = $conexion->prepare($update_sql);
        $stmt->bind_param("sssss", $Nom_usuario, $Correo, $Tel, $Experiencia, $user);

        if ($stmt->execute()) {
            // Los datos se han actualizado correctamente
            // Puedes redirigir al usuario o mostrar un mensaje de éxito
            header('Location: perfil.php');
            exit;
        } else {
            echo "Error al actualizar los datos: " . $conexion->error;
        }
    }
}
?>

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

    <main>
        <section class="hero-section d-flex justify-content-center align-items-center">
            <div class="section-overlay"></div>

            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12">
                    <form class="custom-form hero-form" action="perfil.php" method="post" role="form" enctype="multipart/form-data">
                            <h2 class="text-center text-white mb-4">Perfil de Usuario</h2>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi-person custom-icon"></i></span>
                                        <input type="text" class="form-control" id="nombre" placeholder="Tu nombre" name="Nombre" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="email" class="form-label">Correo Electrónico</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi-envelope custom-icon"></i></span>
                                        <input type="email" class="form-control" id="email" placeholder="tucorreo@example.com" name="Correo" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="numero" class="form-label">Número de teléfono</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi-telephone custom-icon"></i></span>
                                        <input type="text" class="form-control" id="numero" placeholder="Tu número" name="Tel" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="bio" class="form-label">Experiencia</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi-person custom-icon"></i></span>
                                        <textarea class="form-control" id="bio" rows="4" placeholder="Cuéntanos algo sobre ti" name="Experiencia" required></textarea>
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