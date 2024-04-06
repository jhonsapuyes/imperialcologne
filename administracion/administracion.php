<?php

 	session_start();

	include"conexiones/conexion.php";

 	include"ingresodeusuario/ingresodeusuario(index).php";
 	include"crud/crud-usuarios.php";
 	include"crud/crud-imagenes.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form  class="datosingreso" name="formu" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<input type="text" name="usuario" autocomplete="off" required value=""><br>
		<input type="text" name="password"  autocomplete="off"  required value=""><br>
		<button type="submit" >enviar</button>
	</form>
</body>
</html>