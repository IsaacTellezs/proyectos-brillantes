<?php
// Verifica la sesión y la conexión a la base de datos
session_start();
require 'funciones/conex.php';
conectar();

// Verifica si la sesión está activa
if (isset($_SESSION['Correo'])) {
    include 'header-inversor.php';
} else {
    include 'header.php';
}

?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Salud</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-icons.css" rel="stylesheet">
        <link href="css/owl.carousel.min.css" rel="stylesheet">
        <link href="css/owl.theme.default.min.css" rel="stylesheet">
        <link href="css/tooplate-gotto-job.css" rel="stylesheet">
    </head>

    <body class="Creador-y-desarrollador-page" id="top">
        <main>
            <header class="site-header py-5">
                <div class="section-overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h1 class="text-white">Inversiones.</h1>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Resultados de la consulta -->
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Resultados de la consulta:</h2>
                        <?php
                        if ($conexion) {
                            $consulta = "SELECT * FROM pago WHERE tipo_pago = 'inversion'";
                            $resultado = mysqli_query($conexion, $consulta);

                            if ($resultado) {
                                while ($fila = mysqli_fetch_assoc($resultado)) {
                                    // Accede a los datos de cada fila
                                    $id_pago = $fila['id_pago'];
                                    $cantidad = $fila['cantidad'];
                                    $id_proyect = $fila['id_proyect'];
                                    $id_usuarios = $fila['id_usuarios'];
                                    $fecha_contribucion = $fila['fecha_contribucion'];
                                    $nivel_pago = $fila['nivel_pago'];
                                    $tipo_pago = $fila['tipo_pago'];

                                    // Muestra los datos recuperados
                                    echo "ID de Pago: $id_pago<br>";
                                    echo "Cantidad: $cantidad<br>";
                                    echo "ID del Proyecto: $id_proyect<br>";
                                    // Continúa con el resto de los campos de la tabla

                                    echo "<br>";
                                }

                                // Libera el resultado
                                mysqli_free_result($resultado);
                            } else {
                                echo "Error al ejecutar la consulta: " . mysqli_error($conexion);
                            }

                            // Cierra la conexión a la base de datos
                            mysqli_close($conexion);
                        }
                        ?>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <?php
            include 'footer.php';
            ?>

            <!-- JAVASCRIPT FILES -->
            <script src="js/jquery.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/owl.carousel.min.js"></script>
            <script src="js/counter.js"></script>
            <script src="js/custom.js"></script>
        </main>
    </body>
</html>