<?php 
	function validarLogin($usuario, $clave)
	{
		global $conexion;
		// Realiza una consulta para buscar al usuario por correo
$sql = "SELECT  correo, contraseña FROM datos_personales WHERE correo = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    // Si se encuentra un usuario con el correo proporcionado
    $row = $result->fetch_assoc();
    $hashGuardado = $row['contraseña'];
    
    // Verifica la contraseña proporcionada con el hash almacenado
    if (password_verify($clave, $hashGuardado)) {
		session_start();
		$_SESSION['correo'] = $usuario;
		return true;

    } else {
       return false;
    }
} else {
    // Usuario no encontrado
    $errorMensaje = "No se encontró ningún usuario con ese correo electrónico.";
}
	}

	function validarLoginInversionista($usuario, $clave)
	{
		global $conexion;
		// Realiza una consulta para buscar al usuario por correo
$sql = "SELECT  correo, contraseña FROM usuarios WHERE correo = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    // Si se encuentra un usuario con el correo proporcionado
    $row = $result->fetch_assoc();
    $hashGuardado = $row['contraseña'];
    
    // Verifica la contraseña proporcionada con el hash almacenado
    if (password_verify($clave, $hashGuardado)) {
		session_start();
		$_SESSION['Correo'] = $usuario;
		return true;

    } else {
       return false;
    }
} else {
    // Usuario no encontrado
    $errorMensaje = "No se encontró ningún usuario con ese correo electrónico.";
}
	}


   

   
function determinarTipoUsuario($correo, $conexion) {
    $tipoUsuario = 'otro'; // Valor predeterminado

    $consultaUsuarios = "SELECT * FROM datos_personales WHERE correo = '$correo'";
    $resultadoUsuarios = mysqli_query($conexion, $consultaUsuarios);

    if (mysqli_num_rows($resultadoUsuarios) > 0) {
        $tipoUsuario = 'usuario';
    } else {
        $consultaInversores = "SELECT * FROM datos_personales WHERE correo = '$correo'";
        $resultadoInversores = mysqli_query($conexion, $consultaInversores);

        if (mysqli_num_rows($resultadoInversores) > 0) {
            $tipoUsuario = 'inversor';
        }
    }

    return $tipoUsuario;
}


//Funcion para heaader segun el tipo de usuario

function headerDinamico() {
    // Comprueba si el usuario ha iniciado sesión
    if (isset($_SESSION['Correo'])) {
        // Verifica el tipo de usuario
        if ($_SESSION['TipoUsuario'] == 'usuario') {
            // Header para usuarios normales
            include 'header-usuario.php';
        } elseif ($_SESSION['TipoUsuario'] == 'inversor') {
            // Header para inversores
            include 'header-inversor.php';
        } else {
            // Header por defecto para otros tipos de usuarios
            include 'header.php';
        }
    } else {
        // Header para usuarios que aún no han iniciado sesión
        include 'header.php';
    }
}

function obtenerIdDesarrollador($usuario)
{
    // Realiza una consulta SQL para obtener el ID del desarrollador
    $query = "SELECT id_desarrollador FROM desarrolladores WHERE Nombre = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();

    // Obtiene el resultado de la consulta
    $resultado = $stmt->get_result();

    // Verifica si hay resultados
    if ($resultado->num_rows > 0) {
        // Obtiene la primera fila de resultados
        $row = $resultado->fetch_assoc();

        // Devuelve el ID del desarrollador
        return $row['id_desarrollador'];
    } else {
        // Devuelve null si no se encuentra el desarrollador
        return null;
    }
}


    ?>