<?php
include '../funciones/conex.php';
include '../funciones/funciones.php';
conectar();       
session_start(); 

headerDinamico($conexion);

// Variables para almacenar los valores iniciales del proyecto
$id_proyecto = $Proyecto = $Descripcion = $Imagen = $Categoria = "";

if (isset($_GET['id_proyecto'])) {
    $id_proyecto = $_GET['id_proyecto'];

    // Consulta SQL para obtener detalles del proyecto
    $query = "SELECT nom_proyecto, descripcion, imagen, categoria FROM proyectos WHERE id_proyecto = $id_proyecto"; // Ajusta la consulta según tu base de datos

    // Ejecuta la consulta
    $result = mysqli_query($conexion, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $Proyecto = $row['nom_proyecto'];
            $Descripcion = $row['descripcion'];
            $Imagen = $row['imagen'];
            $Categoria = $row['categoria'];
        } else {
            echo 'No se encontraron detalles para el proyecto.';
        }

        mysqli_free_result($result);
    }
}

// Cierra la conexión a la base de datos al final
mysqli_close($conexion);

// Procesamiento del formulario de edición
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $nuevoProyecto = $_POST['nuevoProyecto'];
    $nuevaDescripcion = $_POST['nuevaDescripcion'];
    $nuevaCategoria = $_POST['nuevaCategoria'];

    // Actualizar los datos en la base de datos
    $queryUpdate = "UPDATE proyectos SET nom_proyecto = '$nuevoProyecto', descripcion = '$nuevaDescripcion', categoria = '$nuevaCategoria' WHERE id_proyecto = $id_proyecto";
    $resultUpdate = mysqli_query($conexion, $queryUpdate);

    if ($resultUpdate) {
        // Éxito: los datos se han actualizado correctamente en la base de datos
        echo 'Datos actualizados correctamente.';
        // Puedes redirigir al usuario o realizar otras acciones después de la actualización
    } else {
        // Error
        echo 'Error al actualizar los datos.';
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
            <div class="col-lg-10 col-md-10 col-12">
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
                                <input type="text" name="nuevaCategoria" id="nuevaCategoria" class="form-control" placeholder="Nueva Categoría" value="<?php echo $Categoria; ?>" required>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <!-- Puedes agregar más campos según sea necesario -->
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
