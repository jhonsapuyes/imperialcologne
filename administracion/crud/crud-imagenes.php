<?php
						// CRUD
			// CREAR ESCRIBIR ACTUALIZAR BORRAR
			
				// CREAR TABLA EN BASE DE DATOS
// verificar si existe tabla sql  
$result  = mysqli_query($conexion,"SELECT * from lulo");
// crear tabla sql
if($result==0){		
$sql = "CREATE TABLE lulo (
ID INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
NOMBRE VARCHAR(500) NOT NULL,
DESCRIPCION VARCHAR(500) NOT NULL,
PRECIO VARCHAR(500) NOT NULL,
GENERO VARCHAR(500) NOT NULL

)";
if (mysqli_query($conexion, $sql)) {
  echo "tabla lulo creada";
} else {
  echo "Error creating table: " . mysqli_error($conexion);
}
}			