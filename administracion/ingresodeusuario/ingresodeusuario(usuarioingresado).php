<?php
include"conexiones/conexion.php";
$idusuario = $_SESSION['username'];
// echo"$idusuario";
$_IDUSUARIO=$idusuario;
// echo"$_IDUSUARIO";

if(!isset($idusuario)){
    header("location:index.php");
}

if(isset($idusuario)){
	// buscar nombre de usuario
	 $sql = "SELECT NOMBRE FROM usuarios WHERE
ID='$idusuario'";
$result = mysqli_query($conexion, $sql);

if (mysqli_num_rows($result) == 1) {
  while($row = mysqli_fetch_assoc($result)) {
    // echo "nombre: " . $row["NOMBRE"];
  $usuarionombre=$row["NOMBRE"];
  // echo"$usuarionombre";
  $_USUARIONOMBRE= $usuarionombre;
  // echo"$_USUARIONOMBRE";
}	 
} 		
}
 ?>