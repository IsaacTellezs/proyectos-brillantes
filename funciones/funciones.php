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


    function tipoUsuario()
	{
if (isset($_SESSION['Correo'])) {
    $correo = $_SESSION['Correo'];

    // Realiza una consulta en la tabla 'usuarios' para buscar el correo electrónico
    $consultaUsuarios = "SELECT * FROM desarrolladores WHERE Correo = '$correo'";
    // Ejecuta la consulta en la base de datos y almacena el resultado en $resultadoUsuarios
    $resultadoUsuarios = mysqli_query($conexion, $consultaUsuarios); // $conexion es la conexión a la base de datos

    // Verifica si se encontraron filas en la tabla 'usuarios'
    if (mysqli_num_rows($resultadoUsuarios) > 0) {
        // El correo electrónico se encontró en la tabla 'usuarios'
        $_SESSION['TipoUsuario'] = 'usuario';
    } else {
        // Si no se encontraron filas en la tabla 'usuarios', realiza la consulta en la tabla 'inversores'
        $consultaInversores = "SELECT * FROM inversionistas WHERE Correo = '$correo'";
        // Ejecuta la consulta en la base de datos y almacena el resultado en $resultadoInversores
        $resultadoInversores = mysqli_query($conexion, $consultaInversores);

        // Verifica si se encontraron filas en la tabla 'inversores'
        if (mysqli_num_rows($resultadoInversores) > 0) {
            // El correo electrónico se encontró en la tabla 'inversores'
            $_SESSION['TipoUsuario'] = 'inversor';
        } else {
            // El correo electrónico no se encontró en ninguna tabla (maneja esto según tus necesidades)
            $_SESSION['TipoUsuario'] = 'otro';
        }
    }
}

    }



    ?>