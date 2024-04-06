

<?php
	session_start();
	include"ingresodeusuario/ingresodeusuario(usuarioingresado).php";
?>

<html lang="es">
	<head>
	 	<meta charset="UTF-8"> 
	 	<meta name="description" content="descripcion de la pagina web">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>WEB ADMINISTRABLE</title>
	</head>

	<body id="body" class="body"> 

		<section id="section" class="sectionusuarios">

			<article id="article" class="article">

				<div class="perfil">
					<center>	
						<a class="botonsalida" href="usuario/salidausuario.php">CERRAR SESION</a>
					</center>
				</div>

				<div class="usar">
					<?php include"usuario/ingresodatosadministrables.php";?>
					<?php include"usuario/actualizadatosadministrables.php";?>
					<?php include"usuario/borradatosadministrables.php";?>
					 <p >INGRESO DE PRODUCTO</p>
					<form class="" name="formu" method="post" 
						enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						
						<input type="file" name="imagenarchivo[]" id="imagen" multiple="" required><br>

                        MARCA: <input type="text" name="marca" autocomplete="off" required value=""><br>

						NOMBRE: <input type="text" name="nombre" autocomplete="off" required value=""><br>

						DESCRIPCION: <input type="text" name="descripcion" autocomplete="off" required value=""><br>

						PRECIO: <input type="numbre" name="precio"  autocomplete="off"  required value=""><br>

						GENERO: <input type="text" name="genero"  autocomplete="off"  required value=""><br>

						<button type="submit" >INGRESAR</button>
					</form>
				</div>

				<div class="datosingreso"></div>

				<div  style="display: inline-flex; padding-left: 3%; margin-top:3%;">
					<?php include"verimagenes/verimagenesadministrables.php";?>
				</div>
			</article>

			<footer id="footer" class="footer" >

			</footer>
			
		</section>

	</body>

</html>