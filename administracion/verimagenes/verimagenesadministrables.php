
<?php

// conectar tabla sql
	$ss2 =mysqli_query($conexion, "SELECT * 
	FROM lulo ");
	while($rr2 = mysqli_fetch_array($ss2)){
		$nombre_imagen= "$rr2[NOMBRE]";
		$carpeta1 = glob('imagenes/'.$nombre_imagen.'/*');
?>	
	<div style="width:30%; margin:0% 2%;">
		<div id="post_<?php echo $rr2['NOMBRE'] ;?>" class="padre" style="display:inline-block; width:100%; border:solid green; margin:0% 1% 0% 1%;">	
			<div id="img_<?php echo $rr2['NOMBRE'] ;?>" class="hijo1">
				<?php 
					foreach($carpeta1 as $archivo){
						echo '<img src="'.$archivo.'" style="display:inline-block; width:100%; margin:0% 1% 0% 1%;">';          
					}
				?>
			</div>
			<div id="descriptions_<?php echo $rr2['NOMBRE'] ;?>" class="hijo2" style="word-wrap: break-word; padding:0% 2%;"> 
				<p><center><?php echo $rr2['NOMBRE'] ;?></center></p>
				<p><?php echo $rr2['DESCRIPCION'] ;?></p>
				<p><center><?php echo $rr2['PRECIO'] ;?></center></p>
			</div>
    	</div><br>
	
		<div style="display:inline-block; width:30%; margin-left:15%;">
			ACTUALIZAR	
			<form class="formu" name="formu" action="" method="post" 
				enctype="multipart/form-data" >
				<input type= "hidden" name="idactualizar" value="<?php echo $rr2[0];?>">
				<input type="file" name="actualizarimagen" id="imagen"><br>
                <input type="text" name="actualizarmarca" autocomplete="off" value="<?php echo $rr2['CASA'];?>"><br>
				<input type="text" name="actualizarnombre" autocomplete="off" value="<?php echo $rr2['NOMBRE'];?>"><br>
				<input type="text" name="actualizarcomentario"  autocomplete="off"   value="<?php echo $rr2['DESCRIPCION'];?>"><br>
				<input type="text" name="actualizarprecio"  autocomplete="off"   value="<?php echo $rr2['PRECIO'];?>"><br>
				<input type="text" name="actualizargenero"  autocomplete="off"   value="<?php echo $rr2['GENERO'];?>"><br>

				<button type="submit" >actualizar</button>
			</form>
		</div>

		<div style="display:block; width:30%; margin-left:15%;">
			ELIMINAR CONTENIDO
			<form name="formu" action="" method="post">
				<input type= "hidden" name="borrar" value="<?php echo $rr2[0];?>">
				<button type="submit" >eliminar</button>
			</form>
		</div>
	</div>	
<?php
}
?>