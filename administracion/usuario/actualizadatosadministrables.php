<?php
include"conexiones/conexion.php";

$idimagen=$_POST["idactualizar"];
$actualizarimagen=$_POST['actualizarimagen'];
$actualizarmarca=$_POST['actualizarmarca'];
$actualizarnombre_in=$_POST['actualizarnombre'];
$actualizarcomentario=$_POST['actualizarcomentario'];
$actualizarprecio=$_POST['actualizarprecio'];
$actualizargenero_in=$_POST['actualizargenero'];

$actualizarnombre = str_replace(" ", "_", $actualizarnombre_in);
$actualizargenero = strtolower($actualizargenero_in);

	// actualizar datos
if(!empty($_POST["idactualizar"])){	
	// verifica si existe el archivo
	$sql=mysqli_query($conexion, "SELECT * from lulo 
	WHERE NOMBRE = '$actualizarnombre'");

	if($row = mysqli_fetch_array($sql)){
		$imagenduplicada="NOMBRE IMAGEN DUPLICADO";
	}	
	if($imagenduplicada){
		echo"$imagenduplicada";
	}	
	else{
		$sql=mysqli_query($conexion, "SELECT * from lulo 
		WHERE ID = '$idimagen'");
			while($rr2 = mysqli_fetch_array($sql)){
				$nombre_carpeta= "$rr2[NOMBRE]";
			}	

		$carpeta1 = glob('imagenes/'.$nombre_carpeta.'/*');
		$aumento=0;
		foreach($carpeta1 as $archivo){
			$aumento +=1;
			// renombre de imagenes
			rename($archivo, 'imagenes/'.$nombre_carpeta.'/'.$actualizarnombre.'_'.$aumento.'.jpg');
		}
		// renombre de carpeta
		rename('imagenes/'.$nombre_carpeta, 'imagenes/'.$actualizarnombre);

		mysqli_query($conexion,"UPDATE lulo
		SET NOMBRE='$actualizarnombre' WHERE ID='$idimagen'");
		$imagenactualizada="DATOS ACTUALIZADOS";
		if($imagenactualizada){
			// header("location:usuarioingresado.php");
		}
	}

    	// actualiza la marca del a imagen
	if(!empty($_POST["actualizarmarca"])){	
		mysqli_query($conexion,"UPDATE lulo
		SET CASA='$actualizarmarca' WHERE ID='$idimagen'");
		$imagenactualizada="DATOS ACTUALIZADOS";
	}

	// actualiza la descripcion del a imagen
	if(!empty($_POST["actualizarcomentario"])){	
		mysqli_query($conexion,"UPDATE lulo
		SET DESCRIPCION='$actualizarcomentario' WHERE ID='$idimagen'");
		$imagenactualizada="DATOS ACTUALIZADOS";
	}

	if(!empty($_POST["actualizarprecio"])){	
		mysqli_query($conexion,"UPDATE lulo
		SET PRECIO='$actualizarprecio' WHERE ID='$idimagen'");
		$imagenactualizada="DATOS ACTUALIZADOS";
	}

	if(!empty($_POST["actualizargenero"])){	
		mysqli_query($conexion,"UPDATE lulo
		SET GENERO='$actualizargenero' WHERE ID='$idimagen'");
		$imagenactualizada="DATOS ACTUALIZADOS";
	}

	// actualiza imagen 
	$nameimagen = $_FILES['actualizarimagen']['name'];
	$tmpimagen = $_FILES['actualizarimagen']['tmp_name'];
	$urlnueva = "imagenes/usuario_".
	"_imagen_".$idimagen.".jpg";
		if(is_uploaded_file($tmpimagen)){
		copy($tmpimagen,$urlnueva);
		$imagenguardada="IMAGEN GUARDADA";}
		// else{echo"error1";}
}
?>