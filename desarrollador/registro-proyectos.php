<?php
session_start(); 
include '../funciones/conex.php';
include '../funciones/funciones.php';
conectar();       

headerDinamico($conexion);

// Verifica si el usuario está autenticado
if (!isset($_SESSION['Correo'])) {
    // Redirige al usuario al formulario de inicio de sesión si no está autenticado
    header('Location: ../login.php');
    exit();
}

// Obtén el id_usuario asociado al correo electrónico de la sesión
$correoUsuario = $_SESSION['Correo'];
$query = "SELECT id_usuario FROM usuarios WHERE correo = ?";
$stmt = $conexion->prepare($query);

if (!$stmt) {
    die("Error en la preparación de la consulta: " . $conexion->error);
}

$stmt->bind_param("s", $correoUsuario);
$stmt->execute();
$stmt->bind_result($id_usuario);

// Comprueba si se encontró un usuario con el correo electrónico proporcionado
if ($stmt->fetch()) {
    // El usuario fue encontrado, guarda el id_usuario en la sesión
    $_SESSION['id_usuario'] = $id_usuario;
} else {
    // No se encontró un usuario con el correo electrónico proporcionado
    // Redirige al usuario al formulario de inicio de sesión
    header('Location: ../login.php');
    exit();
}

// Cierra la declaración
$stmt->close();

// Procesamiento del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se ha enviado un archivo
    if (isset($_FILES['imagen'])) {
        // Ruta de destino para guardar la imagen
        $rutaDestino = '../uploads/' . $_FILES['imagen']['name'];

        // Mover el archivo al directorio de destino
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino)) {
            // La imagen se ha cargado correctamente

            // Recuperar datos del formulario
            $Nombre_proyecto = $_POST['nom_proyecto'];
            $Categorias = $_POST['categoria'];
            $meta_financiacion = $_POST['meta_financiacion'];
            $Descripcion = $_POST['descripcion'];
            $fecha_inicio = $_POST['fecha_inicio'];
            $fecha_termino = $_POST['fecha_termino'];

            // Obtener el ID del usuario de la sesión
$id_usuario = $_SESSION['id_usuario'];

// Insertar datos en la base de datos con el ID del usuario
$sql = "INSERT INTO proyectos (id_user, nom_proyecto, categoria, meta_financiacion, descripcion, fecha_inicio, fecha_termino, imagen) VALUES (?,?,?,?,?,?,?,?)";

// Preparar la sentencia
$stmt = $conexion->prepare($sql);

if (!$stmt) {
    die("Error en la preparación de la consulta: " . $conexion->error);
}

// Vincular parámetros y ejecutar la consulta
$stmt->bind_param("isssssss", $id_usuario, $Nombre_proyecto, $Categorias, $meta_financiacion, $Descripcion, $fecha_inicio, $fecha_termino, $rutaDestino);

if ($stmt->execute()) {
    // Éxito: los datos se han insertado correctamente en la base de datos

    // Guarda los datos en una sesión
    $_SESSION['NuevoProyecto'] = $_POST;
    $_SESSION['NuevoProyecto']['imagen'] = $rutaDestino;

    // Redirige al usuario a la página de categoría correspondiente
    if ($Categorias === 'Educación') {
        header('Location: ../categorias/educacion.php');
    } elseif ($Categorias === 'Negocios y emprendimiento') {
        header('Location: ../categorias/NegociosyEmprendimiento.php');
    } elseif ($Categorias === 'Gobierno y servicios públicos') {
        header('Location: ../categorias/GobiernoyServicios.php');
    } elseif ($Categorias === 'Social y sin fines de lucro') {
        header('Location: ../categorias/SocialySinFines.php');
    } elseif ($Categorias === 'Salud') {
        header('Location: ../categorias/Salud.php');
    } // Agrega más categorías según sea necesario

    exit();
} else {
    // Error
    $errorRegistro = "Error en el registro, intenta de nuevo.";
    header('Location: perfil.php?error=' . urlencode($errorRegistro));
    exit();
}
        } else {
            // Si no se pudo mover la imagen, muestra un mensaje de error
            $errorRegistro = "Error al subir la imagen.";
            header('Location: perfil.php?error=' . urlencode($errorRegistro));
            exit();
        }
    } else {
        // Si no se ha enviado un archivo, muestra un mensaje de error
        $errorRegistro = "Debes seleccionar una imagen.";
        header('Location: perfil.php?error=' . urlencode($errorRegistro));
        exit();
    }

    // Cerrar la conexión
    $stmt->close();
    $conexion->close();
}
?>

<!DOCTYPE html>
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
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap-icons.css" rel="stylesheet">
    <link href="../css/owl.carousel.min.css" rel="stylesheet">
    <link href="../css/owl.theme.default.min.css" rel="stylesheet">
    <link href="../css/tooplate-gotto-job.css" rel="stylesheet">
    <link href="../css/index.css" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body>

    <main>

        <section class="hero-section d-flex justify-content-center align-items-center">
            <div class="section-overlay"></div>

            <div class="container">
                <div class="row d-flex justify-content-center">

                    <div class="col-lg-6 col-12">
                        <form class="custom-form hero-form" action="registro-proyectos.php" method="POST" role="form" enctype="multipart/form-data">
                            <h3 class="text-white mb-3 d-flex justify-content-center">Proyecto</h3>

                            <div class="row">
                                <div class="col-lg-12 col-12">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi-person custom-icon"></i></span>
                                        <input type="text" name="nom_proyecto" id="nom_proyecto" class="form-control" placeholder="Nombre proyecto" required>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-12">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi-person custom-icon"></i></span>
                                        <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Descripcion" required>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi-person custom-icon"></i></span>
                                        <select class="form-select" id="categoria" name="categoria" required>
                                            <option value="Educación">Educacion</option>
                                            <option value="Negocios y emprendimiento">Negocios y emprendimiento</option>
                                            <option value="Gobierno y servicios públicos">Gobierno y servicios publicos</option>
                                            <option value="Social y sin fines de lucro">Social y sin fines de lucro</option>
                                            <option value="Salud">Salud</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi-person custom-icon"></i></span>
                                        <input type="number" name="meta_financiacion" id="meta_financiacion" class="form-control" placeholder="Meta de financiacion" required pattern="[0-9]+" title="Ingrese solo números">
                                    </div>
                                </div>

                                <!-- Campo fecha_inicio -->
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi-person custom-icon"></i></span>
                                        <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" placeholder="Fecha de inicio" required>
                                    </div>
                                </div>

                                <!-- Campo fecha_termino -->
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi-person custom-icon"></i></span>
                                        <input type="date" name="fecha_termino" id="fecha_termino" class="form-control" placeholder="Fecha de término" required>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-12">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi-image custom-icon"></i></span>
                                        <input type="file" name="imagen" id="imagen" accept="image/*" required>
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

         <!-- Agrega el script para inicializar el Datepicker -->
         <script>
            $(function () {
                $("#fecha_inicio").datepicker();
                $("#fecha_termino").datepicker();
            });
        </script>

    </main>

    <!--
Footer
-->
    <?php
    include '../footer.php';
    ?>

        <!-- JAVASCRIPT FILES -->
        <script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/owl.carousel.min.js"></script>
        <script src="../js/counter.js"></script>
        <script src="../js/custom.js"></script>
        <script src="../js/scripteye.js"></script>

    </body>
</html>
