
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Usuarios contacto</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" rel="stylesheet">
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/bootstrap-icons.css" rel="stylesheet">
        <link href="../css/owl.carousel.min.css" rel="stylesheet">
        <link href="../css/owl.theme.default.min.css" rel="stylesheet">
        <link href="../css/tooplate-gotto-job.css" rel="stylesheet">
         <!-- Theme included stylesheets -->
         <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
        <link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">

       
        


    </head>
    
         
    <?php
        include '../header-admin.php';
    ?>


    <body>
        <main>

        <div class="container mt-5">
    <h2>Datos de Contacto</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Nombre Completo</th>
                <th>Motivo</th>
                <th>Correo Electrónico</th>
            </tr>
        </thead>
        <tbody>

        <?php
        include '../funciones/conex.php';
        include '../funciones/funciones.php';
        conectar();       
        session_start();
        
       
        if ($conexion->connect_error) {
            die("Conexión fallida: " . $conexion->connect_error);
        }

       
        $sql = "SELECT * FROM contacto";
        $result = $conexion->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['nombre_completo']}</td>
                        <td>{$row['motivo']}</td>
                        <td>{$row['correo_electronico']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No hay datos en la tabla contacto.</td></tr>";
        }

        // Cierra la conexión
        $conexion->close();
        ?>

        </tbody>
    </table>
</div>

        </main>

         

       

           <!-- Header -->
    <?php
    include '../footer.php';
    ?>

        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/counter.js"></script>
        <script src="js/custom.js"></script>
        <script src="js/scripteye.js"></script>

    </body>
</html>

