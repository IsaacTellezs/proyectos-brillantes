<?php
function conectar()
{
    global $conexion;
    $conexion=mysqli_connect('localhost','root','','prueba_crowd') or die ('No se pudo conectar la base de datos'.mysqil_error($conexion));

    mysqli_set_charset($conexion, 'utf8');
}

?>