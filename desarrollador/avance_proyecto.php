<?php
  $_SESSION['user_id'] = $user_id;

  $sql = "SELECT proyectos.*
          FROM proyectos
          INNER JOIN desarrolladores ON proyectos.id_desarrollador = desarrolladores.id_desarrollador
          WHERE desarrolladores.id_desarrollador = ?";
  
  $stmt = $conexion->prepare($sql);
  $stmt->bind_param("i", $user_id);
  $stmt->execute();
  
  $resultado = $stmt->get_result();
  
  // Ahora puedes iterar sobre los proyectos y mostrarlos
  while ($row = $resultado->fetch_assoc()) {
    $html_resultado .= "<p>Proyecto: " . $row['Nombre_proyecto'] . "</p>";
  }
?>
