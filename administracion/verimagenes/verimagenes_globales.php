
<?php
	$aticulo_ver=$_GET['article'];
	$genero=$_GET['genero'];

	// conectar tabla sql
	$noms_imgs=[];
	$n_imgs=[];
	$carpetas_separados;
	$ss2 =mysqli_query($conexion, "SELECT * FROM lulo 
	WHERE NOMBRE='$aticulo_ver' ");
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
	
	<div id="post_<?php echo $rr2['NOMBRE'] ;?>" class="padre_global" >	
		<div id="img_<?php echo $rr2['NOMBRE'] ;?>" class="hijo1">
			<button id="atras" class="atras"onclick="slider()" >
                <img src="">
            </button>
			<?php 
				foreach($carpeta1 as $archivo){
					$acumulador += 1;
					echo '<img id="'.$rr2['NOMBRE'].'_'.$acumulador.'" class="'.$rr2['NOMBRE'].'" src="'.$archivo.'" style="display:none; width:100%; height: 340px;">';          
				}
			?>
			<button id="adelante" class="adelante" onclick="slider()">
                <img src="">
            </button>
		</div>
		<div id="descriptions_<?php echo $rr2['NOMBRE'] ;?>" class="hijo2" style="word-wrap: break-word; padding:0% 2%;">
            <div id="ver_productos" class="ver_productos"></div> 
			<b><center><?php echo $nombre_imagen_n ;?></center></b>
			<p><center><?php echo $rr2['DESCRIPCION'] ;?></center></p>
			<p><center><?php echo $rr2['PRECIO'] ;?></center></p>
			<center><button onclick="add_cart('<?php echo $rr2['NOMBRE'] ;?>','<?php echo $rr2['PRECIO'] ;?>')">add cart</button></center>
		</div>
    </div><br>

<?php
$acumulador=0;
}
$pagina= $genero;
$stn= '.php';
$ir_pg= $pagina.$stn;
echo '<input class="volver" type="button"'.'onclick="location.href='."'".$ir_pg."'".'"value="ir a '.$genero.'" />';
	//print_r($carpetas_separados);
echo '<script> 
	var todas_carpetas='.json_encode($carpetas_separados).' 
</script>'
?>