<?php
include '../funciones/conex.php';
include '../funciones/funciones.php';
conectar();       
session_start(); 

headerDinamico($conexion);

// Variables para almacenar los valores iniciales del proyecto
$id_proyecto = $Proyecto = $Descripcion = $Imagen = $Categoria = $MetaFinanciacion = $FechaInicio = $FechaTermino = "";

if (isset($_GET['id_proyecto'])) {
    $id_proyecto = $_GET['id_proyecto'];

    // Consulta SQL para obtener detalles del proyecto
    $query = "SELECT nom_proyecto, descripcion, imagen, categoria, meta_financiacion, fecha_inicio, fecha_termino FROM proyectos WHERE id_proyecto = $id_proyecto";

    // Ejecuta la consulta
    $result = mysqli_query($conexion, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $Proyecto = $row['nom_proyecto'];
            $Descripcion = $row['descripcion'];
            $Imagen = $row['imagen'];
            $Categoria = $row['categoria'];  
            $MetaFinanciacion = $row['meta_financiacion'];  
            $FechaInicio = $row['fecha_inicio'];  
            $FechaTermino = $row['fecha_termino'];  
        } else {
            echo 'No se encontraron detalles para el proyecto.';
        }

        mysqli_free_result($result);
    }
}

// Procesamiento del formulario de edición
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $nuevoProyecto = $_POST['nuevoProyecto'];
    $nuevaDescripcion = $_POST['nuevaDescripcion'];
    $categoria = $_POST['categoria'];
    $meta_financiacion = $_POST['meta_financiacion'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_termino = $_POST['fecha_termino'];

    // Actualizar los datos en la base de datos
    $queryUpdate = "UPDATE proyectos SET nom_proyecto = '$nuevoProyecto', descripcion = '$nuevaDescripcion', categoria = '$categoria', meta_financiacion = $meta_financiacion, fecha_inicio = '$fecha_inicio', fecha_termino = '$fecha_termino' WHERE id_proyecto = $id_proyecto";
    $resultUpdate = mysqli_query($conexion, $queryUpdate);

    if ($resultUpdate) {
        // Éxito: los datos se han actualizado correctamente en la base de datos

        // Verificar si se ha cargado una nueva foto
        if (isset($_FILES['project_photo']) && $_FILES['project_photo']['error'] === UPLOAD_ERR_OK) {
            // Directorio de destino para la nueva foto
            $upload_directory = '../uploads/';
            // Nombre del archivo
            $file_name = basename($_FILES['project_photo']['name']);
            // Ruta completa del archivo en el servidor
            $target_path = $upload_directory . $file_name;

            // Mover la nueva foto al directorio de carga
            if (move_uploaded_file($_FILES['project_photo']['tmp_name'], $target_path)) {
                // La nueva foto se cargó con éxito

                // Actualizar el campo de imagen en la base de datos
                $queryUpdateImage = "UPDATE proyectos SET imagen = '$file_name' WHERE id_proyecto = $id_proyecto";
                $resultUpdateImage = mysqli_query($conexion, $queryUpdateImage);

                if (!$resultUpdateImage) {
                    echo 'Error al actualizar la nueva foto en la base de datos.';
                }
            } else {
                echo "Error al cargar la nueva foto.";
            }
        }

        echo 'Datos actualizados correctamente.';
        // Puedes redirigir al usuario o realizar otras acciones después de la actualización
    } else {
        // Error
        echo 'Error al actualizar los datos.';
    }
}

// Cierra la conexión a la base de datos al final, fuera del bloque de procesamiento del formulario
mysqli_close($conexion);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Detalles del Proyecto</title>
    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap-icons.css" rel="stylesheet">
    <link href="../css/owl.carousel.min.css" rel="stylesheet">
    <link href="../css/owl.theme.default.min.css" rel="stylesheet">
    <link href="../css/tooplate-gotto-job.css" rel="stylesheet">
    <style>
        .project-details {
            display: flex;
            align-items: center;
        }

        .project-description {
            flex: 1;
            padding: 20px;
        }

        .project-image {
            flex: 1;
            padding: 20px;
        }
    </style>
</head>
<body class="Creador-y-desarrollador-page" id="top">
    <main>
        <header class="site-header py-5">
            <div class="section-overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1 class="text-white">Detalles del Proyecto</h1>
                    </div>
                </div>
            </div>
        </header>
        <section class="job-section section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="project-details">
                            <div class="project-image">
                                <div class="job-thumb job-thumb-box">
                                    <div class="job-image-box-wrap">
                                        <img src="<?php echo $Imagen; ?>" class="job-image img-fluid" alt="Imagen del Proyecto" style="max-width: 100%; max-height: 100vh;">
                                    </div>
                                </div>
                            </div>
                            <div class="project-description">
                                <h3>Proyecto: <?php echo $Proyecto; ?></h3>
                                <!-- Agregar el formulario de edición -->
                                
                                <main>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-12 col-md-10 col-12">
                <form class="custom-form hero-form" method="post" action="editar_proyecto.php?id_proyecto=<?php echo $id_proyecto; ?>" role="form">
                    <h3 class="text-white mb-3 d-flex justify-content-center">Editar Proyecto</h3>

                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="bi-person custom-icon"></i></span>
                                <input type="text" name="nuevoProyecto" id="nuevoProyecto" class="form-control" placeholder="Nuevo Nombre del Proyecto" value="<?php echo $Proyecto; ?>" required>
                            </div>
                        </div>

                        <div class="col-lg-12 col-12">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="bi-person custom-icon"></i></span>
                                <input type="text" name="nuevaDescripcion" id="nuevaDescripcion" class="form-control" placeholder="Nueva Descripción" value="<?php echo $Descripcion; ?>" required>
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

                                <!-- Campo para cargar la nueva foto -->
                                <div class="col-lg-12 col-12">
                                    <div class="input-group">
                                        <label for="project_photo" class="form-label"></label>
                                        <input type="file" class="form-control" id="project_photo" name="project_photo" accept="image/*">
                                    </div>
                                </div>

                        <div class="col-lg-12 col-12">
                            <button type="submit" class="form-control">
                                Guardar Cambios
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php include '../footer.php'; ?>
    <!-- JAVASCRIPT FILES -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/counter.js"></script>
    <script src="../js/custom.js"></script>
</body>
</html>