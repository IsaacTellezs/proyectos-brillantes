<?php
include '../funciones/conex.php';
conectar();

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $idProyecto = $_GET['id'];

   
    $sql = "DELETE FROM proyectos WHERE id_proyecto = $idProyecto";
    $resultado = $conexion->query($sql);

    if ($resultado) {
        header('Location: ../superadmin/proyectos.php');
        exit();
    } else {
        header('Location: ../superadmin/proyectos.php=?error');
        exit();
    }
} else {
    echo "ID de proyecto no válido.";
}

$conexion->close();
?>
