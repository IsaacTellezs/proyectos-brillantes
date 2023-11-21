<?php
require 'funciones/conex.php';
require 'funciones/funciones.php';

conectar();

// Verificar si se ha enviado un archivo
if (isset($_FILES['Imagen'])) {
    // Ruta de destino para guardar la imagen
    $rutaDestino = 'uploads/' . $_FILES['Imagen']['name'];

    // Mover el archivo al directorio de destino
    if (move_uploaded_file($_FILES['Imagen']['tmp_name'], $rutaDestino)) {
        // La imagen se ha cargado correctamente

        // Recuperar datos del formulario
        $Nombre_proyecto = $_POST['Nombre_proyecto'];
        $Categorias = $_POST['Categorias'];
        $Tipo_inversion = $_POST['Tipo_inversion'];
        $Descripcion = $_POST['Descripcion'];

        // Insertar datos en la base de datos
        $sql = "INSERT INTO proyectos (Nombre_proyecto, Categorias, Tipo_inversion, Descripcion, Imagen) VALUES (?,?,?,?,?)";

        // Preparar la sentencia
        $stmt = $conexion->prepare($sql);

        if (!$stmt) {
            die("Error en la preparación de la consulta: " . $conexion->error);
        }

        // Vincular parámetros y ejecutar la consulta
        $stmt->bind_param("sssss", $Nombre_proyecto, $Categorias, $Tipo_inversion, $Descripcion, $rutaDestino);

        if ($stmt->execute()) {
            // Éxito: los datos se han insertado correctamente en la base de datos
        
            // Guarda los datos en una sesión
            $_SESSION['NuevoProyecto'] = $_POST;
        
            header('Location: ../desarrollador/aceptacion-proyecto.php');
        
            exit();
        } else {
            // Error
            $errorRegistro = "Error en el registro, intenta de nuevo.";
            header('Location: perfil.php?error=' . urlencode($errorRegistro));
            exit();
        }

    } else {
        // Si no se pudo mover la imagen, muestra un mensaje de error
        $errorRegistro = "Error al subir la imagen.";
        header('Location: perfil.php?error=' . urlencode($errorRegistro));
        exit();
    }
} else {
    // Si no se ha enviado un archivo, muestra un mensaje de error
    $errorRegistro = "Debes seleccionar una imagen.";
    header('Location: perfil.php?error=' . urlencode($errorRegistro));
    exit();
}

// Cerrar la conexión
$stmt->close();
$conexion->close();
?>
