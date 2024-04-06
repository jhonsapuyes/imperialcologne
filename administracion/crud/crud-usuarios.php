<?php
						// CRUD
			// CREAR ESCRIBIR ACTUALIZAR BORRAR

				// CREAR TABLA EN BASE DE DATOS
// verificar si existe tabla sql  
$result  = mysqli_query($conexion,"SELECT * from usuarios");
// crear tabla sql
if($result==0){		
$sql = "CREATE TABLE usuarios (
ID INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
NOMBRE VARCHAR(50) NOT NULL,
PASSWORD VARCHAR(500) NOT NULL


)";
if (mysqli_query($conexion, $sql)) {
  echo "tabla usuarios creada";
} else {
  echo "Error creating table: ";
}
}
				// FIN CREAR TABLA EN BASE DE DATOS
// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&