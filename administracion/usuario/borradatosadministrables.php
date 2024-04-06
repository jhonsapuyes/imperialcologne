<?php
	// borrar imagen base de datos
if(!empty($_POST["borrar"])){
	$id_maximo=$_POST["borrar"];

	$ss2 =mysqli_query($conexion, "SELECT * 
	FROM lulo WHERE ID=$_POST[borrar]");

	while($rr2 = mysqli_fetch_array($ss2)){
		$nombre_imagen = "$rr2[NOMBRE]";

		//Recorremos todos los archivos que estan dentro de la primera carpeta
		$carpeta1 = glob('imagenes/'.$nombre_imagen.'/*'); //Definimos la primera ruta
		foreach($carpeta1 as $archivo){
			if(is_file($archivo)) 
			unlink($archivo);          
		}

		// eliminar carpeta
		if(is_dir("imagenes/".$nombre_imagen)){
			rmdir("imagenes/".$nombre_imagen);	
		}

		// eliminar daots de base de datos
		$A=mysqli_query($conexion,"DELETE FROM lulo
		WHERE ID=$_POST[borrar]");

	}

	$imageneliminada="IMAGEN ELIMINADA";
}
// else{echo"error";}

?>