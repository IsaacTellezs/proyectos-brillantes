<?php
function conectar()
{
    global $conexion;
    $conexion = mysqli_connect('127.0.0.1', 'root', '', 'proyectos-brillantes') or die('No se pudo conectar la base de datos' . mysqli_error($conexion));

    mysqli_set_charset($conexion, 'utf8');
}

?>