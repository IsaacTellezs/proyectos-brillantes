
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Proyectos</title>

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
        include '../header-superadmin.php';
    ?>


    <body>
        <main>

        <div class="container mt-5">
    <h2>Datos de Contacto</h2>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Fecha de termino</th>
                <th>Meta de financiación</th>
                <th>Usuario</th>
                <th>Eliminar</th>
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

       
        $sql = "SELECT * FROM proyectos";
        $result = $conexion->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id_proyecto']}</td>
                        <td>{$row['nom_proyecto']}</td>
                        <td>{$row['fecha_termino']}</td>
                        <td>{$row['meta_financiacion']}</td>
                        <td>{$row['id_user']}</td>
                        <td><button class='btn btn-danger btn-sm' onclick='eliminarProyecto({$row['id_proyecto']})'>Eliminar</button></td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No hay datos en la tabla contacto.</td></tr>";
        }
        
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

    <script>
    function eliminarProyecto(idProyecto) {
        if (confirm("¿Seguro que quieres eliminar este proyecto?")) {
          
            window.location.href = "../funciones/eliminar_proyecto.php?id=" + idProyecto;
        }
    }
    </script>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/counter.js"></script>
        <script src="js/custom.js"></script>
        <script src="js/scripteye.js"></script>

    </body>
</html>

