<?php
session_start();
require 'funciones/conex.php';

conectar(); // Llama a la función para establecer la conexión

if (isset($_SESSION['Correo'])) {
    include 'header-usuario.php';
} else {
    include 'header.php';
}

if (isset($_GET['q'])) {
    $search = mysqli_real_escape_string($conexion, $_GET['q']);
    
    // Realiza la consulta en la base de datos
    $query = "SELECT * FROM proyectos WHERE Categorias LIKE '%$search%'";
    $result = mysqli_query($conexion, $query);

    // Muestra los resultados
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            // Muestra los resultados de la búsqueda aquí
            echo '<p>' . $row['Categorias'] . '</p>'; 
        }
    } else {
        echo "No se encontraron resultados.";
    }
}

include 'footer.php';
?>
