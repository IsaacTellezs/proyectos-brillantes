<?php 

function determinarTipoUsuario($correo, $conexion) {

    $query = "SELECT tipo_usuario FROM usuarios WHERE correo = '$correo'";
    $resultado = $conexion->query($query);

    if ($resultado) {
        // Verificar si se obtuvo al menos una fila
        if ($resultado->num_rows > 0) {
            // Obtener el tipo de usuario de la primera fila
            $fila = $resultado->fetch_assoc();
            return $fila['tipo_usuario'];
        }
    }

    // Si no se encontró el usuario o hubo un error, puedes manejarlo como desees
    return "Usuario no encontrado";
}


//Funcion para heaader segun el tipo de usuario

function headerDinamico($conexion) {

    if (isset($_SESSION['Correo'])) {
        $tipoUsuario = determinarTipoUsuario($_SESSION['Correo'], $conexion);

        switch ($tipoUsuario) {
            case 'desarrollador':
                $rutaCompleta = $_SESSION['currentDir'] . '/header-usuario.php';    
                include $rutaCompleta;
                break;

            case 'inversionista':
                $rutaCompleta = $_SESSION['currentDir'] . '/header-inversor.php';    
                include $rutaCompleta;
                break;
        }
    } else {
        $rutaCompleta = $_SESSION['currentDir'] . '/header.php';    
        include $rutaCompleta;
    }
}

    ?>