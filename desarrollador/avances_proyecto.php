<?php
include '../funciones/conex.php';
include '../funciones/funciones.php';
conectar();       
session_start(); 

headerDinamico($conexion);

if (isset($_GET['id_proyecto'])) {
    $id_proyecto = $_GET['id_proyecto'];

    // Utilizar declaración preparada para prevenir la inyección SQL
    $query = "SELECT av.descripcion_avance, av.fecha_avance, p.imagen 
              FROM avances_proyectos av 
              JOIN proyectos p ON av.id_proyecto = p.id_proyecto
              WHERE av.id_proyecto = ?";

    // Preparar la declaración
    $stmt = mysqli_prepare($conexion, $query);

    // Vincular el parámetro
    mysqli_stmt_bind_param($stmt, "i", $id_proyecto);

    // Ejecutar la declaración
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        // Obtener el resultado
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $descripcion_avance = $row['descripcion_avance'];
            $fecha_avance = $row['fecha_avance'];
            $Imagen = $row['imagen'];

            // Resto de tu código HTML
        } else {
            echo 'No se encontraron detalles para el proyecto.';
        }

        mysqli_free_result($result);
    }

    // Cerrar la declaración
    mysqli_stmt_close($stmt);
}

// Cerrar la conexión a la base de datos al final
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
                    <h1 class="text-white">Avances del proyecto.</h1>
                </div>
            </div>
        </div>
    </header>

    <section class="search-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12">
                <form class="custom-form search-form" action="../categorias/busqueda.php" method="get" role="form" id="searchForm">
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon2"><i class="bi-search custom-icon"></i></span>
                        <input type="text" name="q" class="form-control" placeholder="Buscar proyectos..." required>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    document.getElementById('searchForm').addEventListener('submit', function (e) {
        // Evita que el formulario se envíe normalmente
        e.preventDefault();

        // Acciones adicionales si es necesario

        // Envía el formulario programáticamente
        this.submit();
    });

    // Agrega un listener al campo de entrada para realizar la búsqueda al presionar Enter
    document.querySelector('.search-form input').addEventListener('keyup', function (e) {
        if (e.key === 'Enter') {
            // Realiza la búsqueda al presionar Enter
            document.getElementById('searchForm').submit();
        }
    });
</script>

    <section class="job-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="project-details">
                    <div class="project-image">
                        <div class="job-thumb job-thumb-box">
                            <div class="job-image-box-wrap">
                                <img src="<?php echo $Imagen; ?>" class="job-image img-fluid" alt="Imagen del Proyecto" style="max-width: 50%; max-height: 50vh;">
                            </div>
                        </div>
                    </div>
                    <div class="project-description">
                    <p>Fecha del avance: <?php echo $fecha_avance; ?></p>
    <p>Descripcion del avance: <?php echo $descripcion_avance; ?></p>
    <div class="col-12">
    <a href="../desarrollador/editar_avances_proyecto.php?id_proyecto=<?php echo $id_proyecto; ?>" class="btn btn-secondary btn-lg rounded-circle">
    Añadir avance.
</a>
                </div>
                        <p></p>
                        <p></p>
                        <p></p>
                        <p></p>
                        <p></p>
</div>
    </div>
</div>
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