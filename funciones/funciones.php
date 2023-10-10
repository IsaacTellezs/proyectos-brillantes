<?php 
	function validarLogin($usuario, $clave)
	{
		global $conexion;
		// Realiza una consulta para buscar al usuario por correo
$sql = "SELECT  Correo, Contraseña FROM desarrolladores WHERE Correo = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    // Si se encuentra un usuario con el correo proporcionado
    $row = $result->fetch_assoc();
    $hashGuardado = $row['Contraseña'];
    
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

	function validarLoginInversionista($usuario, $clave)
	{
		global $conexion;
		// Realiza una consulta para buscar al usuario por correo
$sql = "SELECT  Correo, Contraseña FROM inversionistas WHERE Correo = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    // Si se encuentra un usuario con el correo proporcionado
    $row = $result->fetch_assoc();
    $hashGuardado = $row['Contraseña'];
    
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

    $consultaUsuarios = "SELECT * FROM desarrolladores WHERE Correo = '$correo'";
    $resultadoUsuarios = mysqli_query($conexion, $consultaUsuarios);

    if (mysqli_num_rows($resultadoUsuarios) > 0) {
        $tipoUsuario = 'usuario';
    } else {
        $consultaInversores = "SELECT * FROM inversionistas WHERE Correo = '$correo'";
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

function obtenerIdDesarrollador($usuario) {
    global $conexion;

    $nombre_de_usuario = mysqli_real_escape_string($conexion, $usuario);

    $query = "SELECT id_desarrollador FROM desarrolladores WHERE Correo = '$nombre_de_usuario'";
    $result = $conexion->query($query);

    // Verifica si la consulta fue exitosa
    if (!$result) {
        die("Error en la consulta: " . $conexion->error);
    }

    // Imprime la consulta para depuración
    

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        return $row['id_desarrollador'];
    } else {
        // Si no se encontró el desarrollador, puedes manejar el caso según tus necesidades.
        // Por ejemplo, podrías retornar un valor predeterminado o lanzar una excepción.
        return null;
    }
}


    ?>