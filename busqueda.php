<?php
include './funciones/conex.php';
include './funciones/funciones.php';
conectar();       
session_start(); 


headerDinamico($conexion);

if (isset($_GET['q'])) {
    $search = mysqli_real_escape_string($conexion, $_GET['q']);

    // Verifica si la búsqueda corresponde a categorías específicas y redirige si es el caso
    if ($search === "salud") {
        header("Location: ../categorias/salud.php");
        exit;
    } elseif ($search === "educacion") {
        header("Location: ../categorias/educacion.php");
        exit;
    } elseif ($search === "gobierno") {
        header("Location: ../categorias/GobiernoyServicios.php");
        exit;
    } elseif ($search === "servicios") {
        header("Location: ../categorias/GobiernoyServicios.php");
        exit;
    } elseif ($search === "negocios") {
        header("Location: ../categorias/NegociosyEmprendimiento.php");
        exit;
    } elseif ($search === "emprendimiento") {
        header("Location: ../categorias/NegociosyEmprendimiento.php");
        exit;
    } elseif ($search === "social") {
        header("Location: ../categorias/SocialySinFines.php");
        exit;
    } elseif ($search === "fines") {
        header("Location: ../categorias/SocialySinFines.php");
        exit;
    }

    // Realiza la consulta en la base de datos
    $query = "SELECT * FROM proyectos WHERE nom_proyecto LIKE '$search%'";
    $result = mysqli_query($conexion, $query);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['resultados_busqueda'] = array();

        while ($row = mysqli_fetch_assoc($result)) {
            // Almacena los resultados en una sesión
            $_SESSION['resultados_busqueda'][] = $row['nom_proyecto'];
        }

        header("Location: ./resultado-busqueda.php");
        exit;
    } else {
        $_SESSION['mensaje_busqueda'] = "No se encontraron resultados.";
        header("Location: ./resultado-busqueda.php");
        exit;
    }
}
?>