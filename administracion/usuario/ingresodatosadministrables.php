<?php
include"conexiones/conexion.php";
// echo"$_IDUSUARIO";
// echo"$_USUARIONOMBRE";

$marca= $_POST['marca'];
$nombre_in= $_POST['nombre'];
$descripcion= $_POST['descripcion'];
$precio= $_POST['precio'];
$genero_in= $_POST['genero'];
$num_r_img=strval(rand(0,10000));

$nombre = str_replace(" ", "_", $nombre_in);
$genero= strtolower($genero_in);

if(!empty($_POST['nombre'])){
	// insertar datos
	// verifica si existe el archivo
	$sql=mysqli_query($conexion, "SELECT ID from lulo 
	WHERE NOMBRE = '$nombre'");
	if($row = mysqli_fetch_array($sql)){
		$imagenduplicada="NOMBRE IMAGEN DUPLICADO";
	}

	if($imagenduplicada){
		echo"$imagenduplicada";
	}
	else{
		if(!empty($_POST['marca']) && 
            !empty($_POST['nombre']) && 
			!empty($_POST['descripcion']) && 
			!empty($_POST['precio']) &&
			!empty($_POST['genero']) ){	
			// inserta contenido en la base datos	
			mysqli_query($conexion,"INSERT INTO lulo (CASA, NOMBRE, DESCRIPCION, PRECIO, GENERO) 
			VALUE ('$marca','$nombre','$descripcion','$precio','$genero')");
			// saca id maximo
			$ss = mysqli_query($conexion," SELECT MAX(ID) as id_maximo
			FROM lulo");
			if($rr=mysqli_fetch_array($ss)){
				$id_maximo = $rr['id_maximo'];
				echo"DATOS GUARDADOS CON EXITO";
			}	
		}
	}

	// verificar si existe carpeta y crear carpeta
	// CREA CARPETA EN SERVIDOR LOCAL
	// $carpeta = 'c:/appServ/www/ejemplo-php/imagenes';

	// CREA CARPETA EN INFINITY FREE
	$carpeta = 'imagenes/';
	if (!file_exists($carpeta)) {
    	mkdir($carpeta, 0777, true);
	}
	// enviar imagen a carpeta del servidor

	//if(!$row){	
	//	// ingresa imagen 
	//	$nameimagen = $_FILES['imagenarchivo']['name'];
	//	$tmpimagen = $_FILES['imagenarchivo']['tmp_name'];
	//	$urlnueva = "imagenes/usuario_"."_imagen_".$id_maximo.".jpg";
	//	if(is_uploaded_file($tmpimagen)){
	//		copy($tmpimagen,$urlnueva);
	//		$imagenguardada="IMAGEN GUARDADA";}
	//		// else{echo"error1";}
	//	}	

	$carpeta_p = 'imagenes/';
	if (!file_exists($carpeta_p)) {
		mkdir($carpeta_p, 0777, true);
	}
	$carpeta_sub = $carpeta_p.$nombre;
	if (!file_exists($carpeta_sub)) {
		mkdir($carpeta_sub, 0777, true);
	}
	// enviar imagen a carpeta del servidor
	
	if(!$row){
		$num_img=0;
		foreach($_FILES['imagenarchivo']['tmp_name'] as $key => $tmp_name){
		$num_img+=1;
		$nameimagen = $_FILES['imagenarchivo']['name'][$key];
		$tmpimagen = $_FILES['imagenarchivo']['tmp_name'][$key];
		$urlnueva = $carpeta_sub."/".$nombre."_".$num_img.".jpg";
		if(is_uploaded_file($tmpimagen)){
			copy($tmpimagen,$urlnueva);
			$imagenguardada="IMAGEN GUARDADA";
		}
		// else{echo"error1";}
		}
	}
	
	
	}
	
?>