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

<head>
    <title>Formulario de Inversión en Proyecto</title>
</head>
<body>
    <h1>Formulario de Inversión en Proyecto</h1>
    <p>Complete este formulario para expresar su interés en invertir en nuestro proyecto.</p>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Procesar los datos del formulario aquí, como almacenarlos en una base de datos
        // y enviar notificaciones a las partes interesadas.
        // Recuerda que es importante validar y asegurar los datos del formulario adecuadamente.
        // También es recomendable usar medidas de seguridad adicionales.
        // Consulta a un profesional para obtener asesoramiento financiero y legal.
        echo "<p>Gracias por expresar su interés en invertir en nuestro proyecto.</p>";
    }
    ?>

<section class="hero-section d-flex justify-content-center align-items-center">
    <div class="section-overlay"></div>
    
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-12">
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" required><br>

                    <label for="correo">Correo Electrónico:</label>
                    <input type="email" name="correo" required><br>

                    <label for="monto">Monto de Inversión Deseado:</label>
                    <input type="number" name="monto" required><br>

                    <label for="mensaje">Mensaje Adicional:</label>
                    <textarea name="mensaje" rows="4"></textarea><br>

                    <input type="submit" value="Enviar">
                </form>
            </div>
        </div>
    </div>
</section>

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