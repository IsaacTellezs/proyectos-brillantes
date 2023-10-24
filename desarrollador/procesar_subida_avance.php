<?php
// Verificamos si el formulario se envió
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Recibimos los datos del formulario
         
    $id_proyecto = $_POST["id_proyecto"];      
    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];
    $fecha_carga = date("Y-m-d H:i:s");  // Obtenemos la fecha y hora actual

    // Procesamos la subida del archivo
    $carpeta_destino = "uploads/";  // Directorio donde se almacenarán los archivos
    $nombre_archivo = $_FILES["archivo"]["name"];
    $ruta_archivo = $carpeta_destino . $nombre_archivo;

    // Movemos el archivo al directorio de destino
    if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $ruta_archivo)) {

        // Conectamos a la base de datos (ajusta las credenciales según tu configuración)
        $conexion = new mysqli("127.0.0.1", "root", " ", "prueba-crowd-1");

        // Verificamos la conexión
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        // Insertamos los datos en la tabla de evidencias
        $sql = "INSERT INTO evidencias (id_proyecto, titulo, descripcion, archivo, fecha_carga) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("issss", $id_proyecto, $titulo, $descripcion, $ruta_archivo, $fecha_carga);

        if ($stmt->execute()) {
            echo "Avance subido exitosamente.";
        } else {
            echo "Error al subir el avance: " . $stmt->error;
        }

        // Cerramos la conexión y liberamos recursos
        $stmt->close();
        $conexion->close();
    } else {
        echo "Error al subir el archivo.";
    }
}
?>
