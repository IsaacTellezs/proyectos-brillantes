<?php
require 'funciones/conex.php';
require 'funciones/funciones.php';

conectar();

// Recuperar datos del formulario
$Nombre_proyecto = $_POST['Nombre_proyecto'];
$Categorias = $_POST['Categorias'];

$Tipo_inversion = $_POST['Tipo_inversion'];
$Descripcion = $_POST['Descripcion'];

// Insertar datos en la base de datos
$sql = "INSERT INTO proyectos (Nombre_proyecto, Categorias, Tipo_inversion, Descripcion) VALUES (?,?,?,?)";

// Preparar la sentencia
$stmt = $conexion->prepare($sql);

if (!$stmt) {
    die("Error en la preparación de la consulta: " . $conexion->error);
}

// Vincular parámetros y ejecutar la consulta
$stmt->bind_param("ssss", $Nombre_proyecto, $Categorias, $Tipo_inversion, $Descripcion);

if ($stmt->execute()) {
    // Éxito: los datos se han insertado correctamente en la base de datos

    // Obtén la categoría seleccionada
    $categoria = $_POST['Categorias'];

    // Redirige al usuario a la página de categoría correspondiente
    if ($categoria === 'Educación') {
        header('Location: educacion.php');
    } elseif ($categoria === 'Negocios y emprendimiento') {
        header('Location: NegociosyEmprendimiento.php');
    } elseif ($categoria === 'Gobierno y servicios públicos') {
        header('Location: GobiernoyServicios.php');
    } elseif ($categoria === 'Social y sin fines de lucro') {
        header('Location: SocialySinFines.php');
    } elseif ($categoria === 'Salud') {
        header('Location: Salud.php');
    } // Agrega más categorías según sea necesario

    exit();
} else {
    // Error
    $errorRegistro = "Error en el registro, intenta de nuevo.";
    header('Location: perfil.php?error=' . urlencode($errorRegistro));
    exit();
}

// Cerrar la conexión
$stmt->close();
$conexion->close();
?>
