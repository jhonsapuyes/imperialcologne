<?php
 $sql = "SELECT COUNT(*) as contar FROM usuarios 
 WHERE NOMBRE ='$_POST[usuario]' && PASSWORD ='$_POST[password]'";
 $result = mysqli_query($conexion, $sql);
 if($result >0){
 $array = mysqli_fetch_array($result);
 }

 if($array['contar']==1){
 
 $sql1 = "SELECT ID FROM usuarios 
 WHERE NOMBRE='$_POST[usuario]'";
$result1 = mysqli_query($conexion, $sql1);

if (mysqli_num_rows($result1) ==1) {
  while($row = mysqli_fetch_assoc($result1)) {
    //echo "id: " . $row["ID"];
  $id=$row["ID"];	
 }	 
} 	 	 
	$_SESSION['username']=$id;
	// echo"$_SESSION[username]";
	header("location:usuarioingresado.php");
	}
 else if(empty($id)){
	 
	if(!empty($_POST['usuario']) && 
	!empty($_POST['password'])){
$datosincorretos="EL USUARIO O CONTRASEÑA NO SON CORRECTOS";
}	
}
 //mysqli_close($conexionuser);
 ?>