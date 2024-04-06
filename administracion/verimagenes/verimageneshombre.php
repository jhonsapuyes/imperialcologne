
<?php
	// conectar tabla sql

    $casa=$_GET['product'];
    $genero_g=$_GET['genero'];

	$noms_imgs=[];
	$n_imgs=[];
	$carpetas_separados;

	//$ss2 =mysqli_query($conexion, "SELECT * FROM lulo WHERE GENERO='hombre' ");
    $ss2 =mysqli_query($conexion, "SELECT * FROM lulo WHERE CASA='$casa' and GENERO='$genero_g' ");

	$acumulador=0;
	while($rr2 = mysqli_fetch_array($ss2)){
		$nombre_imagen= "$rr2[NOMBRE]";
		$nombre_imagen_n = str_replace("_", " ", $nombre_imagen);

		$carpeta1 = glob('administracion/imagenes/'.$nombre_imagen.'/*');
		$cant_imgs=count($carpeta1);
		foreach($carpeta1 as $archivo){
			array_push($noms_imgs,$archivo);
		}
		array_push($n_imgs,$cant_imgs);
		$carpetas_separados = array_chunk($noms_imgs, $n_imgs[0]);
?>		
	
	<div id="post_<?php echo $rr2['NOMBRE'] ;?>" class="padre">	
		<a href="global_articulos.php?article=<?php echo $rr2['NOMBRE'] ;?>&genero=<?php echo $rr2['GENERO'] ;?>">
			<div id="img_<?php echo $rr2['NOMBRE'] ;?>" class="hijo1">
				<?php 
					foreach($carpeta1 as $archivo){
						$acumulador += 1;
						echo '<img id="'.$rr2['NOMBRE'].'_'.$acumulador.'" class="'.$rr2['NOMBRE'].'" src="'.$archivo.'" style="display:none; width:100%; margin:0% 1% 0% 1%;">';          
                        if($acumulador == 1){
							break;
						}
					}
				?>
			</div>
		</a>
		<div id="descriptions_<?php echo $rr2['NOMBRE'] ;?>" class="hijo2" style="word-wrap: break-word; padding:1% 2%;"> 
			<b><center><?php echo $nombre_imagen_n ;?></center></b>
			<p><center><?php echo $rr2['DESCRIPCION'] ;?></center></p>
			<p><center><?php echo $rr2['PRECIO'] ;?></center></p>
		</div>
    </div><br>

<?php
$acumulador=0;

}
	//print_r($carpetas_separados);
echo '<script> 
	var todas_carpetas='.json_encode($carpetas_separados).' 
</script>'
?>