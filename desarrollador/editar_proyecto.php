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

// Procesar el formulario cuando se envía
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Validar proyecto en base a las palabras clave
    $nombreProyecto = $_POST['nom_proyecto'];
    $descripcion = $_POST['descripcion'];

    if (!validarPalabrasClave($nombreProyecto, $descripcion)) {
        
        $_SESSION['errorRegistro'] = "Basandanos en la descripción proporcionada del proyecto, no podemos garantizar su viabilidad
        en este momento. Es posible que falten detalles criticos o que existan riesgos no mencionados. Te recomendamos proporcionar
        información adicional para una evaluaciòn mas precisa de la viabilidad del proyecto.";

        
        header('Location: registro-proyectos.php');
        exit();
    }

    // Verifica si se ha enviado una nueva imagen
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        // Ruta donde se guardará la imagen (carpeta 'uploads' + nombre del archivo)
        $imagenPath = '../uploads/' . basename($_FILES['imagen']['name']);

        // Mueve la imagen a la carpeta 'uploads'
        move_uploaded_file($_FILES['imagen']['tmp_name'], $imagenPath);

        // Actualiza la variable $Imagen con la ruta de la imagen guardada
        $Imagen = $imagenPath;
    }

    // Otros campos del formulario
    $Proyecto = mysqli_real_escape_string($conexion, $_POST['nom_proyecto']);
    $Descripcion = mysqli_real_escape_string($conexion, $_POST['descripcion']);
    $Categoria = mysqli_real_escape_string($conexion, $_POST['categoria']);
    $meta_financiacion = mysqli_real_escape_string($conexion, $_POST['meta_financiacion']);

    // Consulta SQL para actualizar datos en la tabla proyectos
    $updateQuery = "UPDATE proyectos SET nom_proyecto = ?, descripcion = ?, categoria = ?, meta_financiacion = ?, fecha_inicio = ?, fecha_termino = ?";

    // Si se ha subido una nueva imagen, también actualiza el campo imagen
    if (isset($Imagen)) {
        $updateQuery .= ", imagen = ?";
    }

    $updateQuery .= " WHERE id_proyecto = ?";

    // Prepara la consulta de actualización
    $stmt = mysqli_prepare($conexion, $updateQuery);

    // Si hay una nueva imagen, vincula el parámetro de la consulta preparada
    if (isset($Imagen)) {
        mysqli_stmt_bind_param($stmt, 'sssssssi', $Proyecto, $Descripcion, $Categoria, $MetaFinanciacion, $FechaInicio, $FechaTermino, $Imagen, $id_proyecto);
    } else {
        mysqli_stmt_bind_param($stmt, 'sssssi', $Proyecto, $Descripcion, $Categoria, $MetaFinanciacion, $FechaInicio, $FechaTermino, $id_proyecto);
    }

    // Ejecuta la consulta de actualización
    $updateResult = mysqli_stmt_execute($stmt);

    // Cierra la consulta preparada
    mysqli_stmt_close($stmt);

    // Cierra la conexión a la base de datos
    mysqli_close($conexion);

    // Mensajes de éxito o error utilizando JavaScript
    echo '<script>';
    echo '    window.onload = function() {';
    echo '        var messageDiv = document.createElement("div");';
    echo '        messageDiv.style.position = "fixed";';
    echo '        messageDiv.style.top = "50%";';
    echo '        messageDiv.style.left = "50%";';
    echo '        messageDiv.style.transform = "translate(-50%, -50%)";';
    echo '        messageDiv.style.backgroundColor = "' . ($updateResult ? '#4CAF50' : '#F44336') . '";';  // Color verde para éxito, rojo para error
    echo '        messageDiv.style.color = "#fff";';
    echo '        messageDiv.style.padding = "20px";';
    echo '        messageDiv.style.zIndex = "1000";';
    echo '        messageDiv.innerText = "' . ($updateResult ? 'Los datos se han actualizado correctamente.' : 'Hubo un problema al actualizar los datos.') . '";';
    echo '        document.body.appendChild(messageDiv);';
    echo '    }';
    echo '</script>';
}
// Función de validación de palabras clave/
function validarPalabrasClave($nombreProyecto, $descripcion) {
    $palabrasClave = array('ilegal ','discriminacion','homofobia','machismo','alcohol','cigarros','ilicito','prohibido',
    'odio','violencia','negro','humillacion','pendejo','cigarros','menores','mal uso','sexo','coito',
    'destructor','riesgo','corrupcion','corruptos','solo hombres','deshonesto','evasion','patriotas','spam','caliente',
    'desnudo','desnudas','desnuda','desnudos','agrandamiento','hot','caliente','viagra','putas','puta','puto','tráfico','blancas',
    'factura','gente de color','personas de color','nigga',); // Reemplaza con tus palabras clave
    foreach ($palabrasClave as $palabra) {
        // Verifica si la palabra clave está presente en la descripción
        if (stripos($nombreProyecto, $palabra) !== false || stripos($descripcion, $palabra) !== false) {
            return false; // Proyecto no válido
        }
    }
    return true;
}
// Termina Función de validación de palabras clave/
    // Initialize $errorRegistro variable
$errorRegistro = "";

// Verifica si hay un mensaje de error en la sesión
if (isset($_SESSION['errorRegistro'])) {
    $errorRegistro = $_SESSION['errorRegistro'];
    // Limpia el mensaje de error en la sesión
    unset($_SESSION['errorRegistro']);
}

    // Termina funcion de validacion
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Detalles del Proyecto.</title>
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
                        <h1 class="text-white">Detalles del Proyecto.</h1>
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
                <form class="custom-form hero-form" method="post" action="editar_proyecto.php?id_proyecto=<?php echo $id_proyecto; ?>" role="form" enctype="multipart/form-data">
                        <h3 class="text-white mb-3 d-flex justify-content-center">Editar Proyecto.</h3>
                        <div class="row">
                                    <div class="col-lg-12 col-12">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1"><i class="bi-pencil-fill custom-icon"></i></span>
                                            <input type="text" name="nom_proyecto" id="nom_proyecto" class="form-control" placeholder="Nombre proyecto" value="<?php echo $Proyecto; ?>" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-12">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1"><i class="bi-card-text custom-icon"></i></span>
                                            <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Descripcion" value="<?php echo $Descripcion; ?>" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1"><i class="bi-list custom-icon"></i></span>
                                            <select class="form-select" id="categoria" name="categoria" required>
                                        <option value="Educación" <?php echo ($Categoria === 'Educación') ? 'selected' : ''; ?>>Educación</option>
                                        <option value="Negocios y emprendimiento" <?php echo ($Categoria === 'Negocios y emprendimiento') ? 'selected' : ''; ?>>Negocios y emprendimiento</option>
                                        <option value="Gobierno y servicios públicos" <?php echo ($Categoria === 'Gobierno y servicios públicos') ? 'selected' : ''; ?>>Gobierno y servicios publicos</option>
                                        <option value="Social y sin fines de lucro" <?php echo ($Categoria === 'Social y sin fines de lucro') ? 'selected' : ''; ?>>Social y sin fines de lucro</option>
                                        <option value="Salud" <?php echo ($Categoria === 'Salud') ? 'selected' : ''; ?>>Salud</option>
                                    </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1"><i class="bi-cash-coin custom-icon"></i></span>
                                            <input type="number" name="meta_financiacion" id="meta_financiacion" class="form-control" placeholder="Meta de financiacion" value="<?php echo $MetaFinanciacion; ?>" required pattern="[0-9]+" title="Ingrese solo números">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-12">
                                        <div class="input-group">
                                            <span class="input-group-text" id="inputGroup-sizing-sm"><i class="bi-image custom-icon"></i></span>
                                            <input type="file" class="form-control" name="imagen" id="imagen" accept="image/*">
                                        </div>
                                    </div>

                            <div class="col-lg-12 col-12">
                                <button type="submit" class="form-control">Guardar cambios.</button>
                                </div>
                            </form>
                </div>
            </div>
        </div>
</main>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var nombreProyectoInput = document.getElementById('nom_proyecto');
        var descripcionInput = document.getElementById('descripcion');

        // Función para autocorregir acentos
        function autocorrectAccents(str) {
            var map = {
                'á': 'á', 'é': 'é', 'í': 'í', 'ó': 'ó', 'ú': 'ú',
                'Á': 'Á', 'É': 'É', 'Í': 'Í', 'Ó': 'Ó', 'Ú': 'Ú'
            };
            return str.replace(/[áéíóúÁÉÍÓÚ]/g, function(match) {
                return map[match];
            });
        }

        // Función para capitalizar la primera letra de la primera palabra
        function capitalizeFirstLetter(str) {
            return str.charAt(0).toUpperCase() + str.slice(1);
        }

        // Agrega eventos oninput a los campos
        nombreProyectoInput.addEventListener('input', function() {
            this.value = autocorrectAccents(this.value);
            this.value = capitalizeFirstLetter(this.value);
        });

        descripcionInput.addEventListener('input', function() {
            this.value = autocorrectAccents(this.value);
            this.value = capitalizeFirstLetter(this.value);
        });
    });
</script>



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