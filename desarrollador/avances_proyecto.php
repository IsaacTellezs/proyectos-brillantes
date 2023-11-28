<?php
include '../funciones/conex.php';
include '../funciones/funciones.php';
conectar();
session_start();

headerDinamico($conexion);

// Función de validación de palabras clave
function validarPalabrasClave($descripcion_avance, $fecha_avance) {
    $palabrasClave = array('ilegal ','discriminacion','homofobia','machismo','alcohol','cigarros','ilicito','prohibido',
    'odio','violencia','negro','humillacion','pendejo','cigarros','menores','mal uso','sexo','coito',
    'destructor','riesgo','corrupcion','corruptos','solo hombres','deshonesto','evasion','patriotas','spam','caliente',
    'desnudo','desnudas','desnuda','desnudos','agrandamiento','hot','caliente','viagra','putas','puta','puto','tráfico','blancas',
    'factura','gente de color','personas de color','nigga',); // Reemplaza con tus palabras clave
    foreach ($palabrasClave as $palabra) {
        // Verifica si la palabra clave está presente en la descripción
        if (stripos($descripcion_avance, $palabra) !== false || stripos($fecha_avance, $palabra) !== false) {
            return false; // Proyecto no válido
        }
    }
    return true;
}

// Inicializar las variables para evitar el aviso de "Variable indefinida"
$id_proyecto = isset($_GET['id_proyecto']) ? $_GET['id_proyecto'] : '';
$descripcion_avance = '';
$fecha_avance = '';

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Recuperar datos del formulario
    $descripcion_avance = isset($_POST['descripcion_avance']) ? $_POST['descripcion_avance'] : '';
    $fecha_avance = isset($_POST['fecha_avance']) ? $_POST['fecha_avance'] : '';

    // Validar palabras clave
    if (!validarPalabrasClave($descripcion_avance, $fecha_avance)) {
        // La descripción o la fecha contienen palabras clave no permitidas
        // Puedes redirigir a una página de error o hacer algo más aquí
        echo "Error: Descripción o fecha contiene palabras clave no permitidas.";
        exit;
    }

    // Insertar datos en la base de datos
    $query = "INSERT INTO avances_proyectos (id_proyecto, descripcion_avance, fecha_avance) VALUES ('$id_proyecto', '$descripcion_avance', '$fecha_avance')";
    $result = mysqli_query($conexion, $query);

    if ($result) {
        // Éxito al insertar en la base de datos
        echo "Datos insertados correctamente.";
    } else {
        // Error al insertar en la base de datos
        echo "Error al insertar datos: " . mysqli_error($conexion);
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
        <p></p>
                        <p></p>
                        <p></p>
                        <p></p>
                        <p></p>
                        <p></p>
                        
        <div class="container">
                       <div class="row d-flex justify-content-center">
                <div class="col-lg-12 col-md-10 col-12">
                    <form class="custom-form hero-form" method="post" action="avances_proyecto.php?id_proyecto=<?php echo $id_proyecto; ?>" role="form" enctype="multipart/form-data">
                        <h3 class="text-white mb-3 d-flex justify-content-center">Avance Proyecto</h3>
                        <div class="row">
                                    <div class="col-lg-12 col-12">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1"><i class="bi-pencil-fill custom-icon"></i></span>
                                            <input type="text" name="descripcion_avance" id="descripcion_avance" class="form-control" placeholder="Descripcion avance" value="<?php echo $descripcion_avance; ?>" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1"><i class="bi-calendar2 custom-icon"></i></span>
                                            <input type="date" name="fecha_avance" id="fecha_avance" class="form-control" value="<?php echo $fecha_avance; ?>" required>
                                        </div>
                                    </div>

                            <div class="col-lg-12 col-12">
                                <button type="submit" class="form-control">Guardar Cambios</button>
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