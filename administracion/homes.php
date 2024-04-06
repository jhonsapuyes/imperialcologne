
<?php
	$genero=$_GET['genero'];
    //$genero="hombre";
	// conectar tabla sql
	$all_homes=[];
	$ss2 =mysqli_query($conexion, "SELECT * FROM lulo 
	WHERE GENERO='$genero' ");
	$acumulador=0;
	while($rr2 = mysqli_fetch_array($ss2)){
		$homes= "$rr2[CASA]";
        if (in_array($homes, $all_homes)) {
            $search_word="true";
        }
        else{
            $search_word="false";
        }
        if($search_word == "false"){
		    array_push($all_homes,$homes);
        }
    }

    for ($i=0; $i < count($all_homes); $i++) { 
        echo "<a href='".$genero.".php?product=".$all_homes[$i]."&genero=".$genero."' style='display: inline-block; width: 20%;'>
        <img alt='".$all_homes[$i]."' src='imagenes_predeterminadas/marcas/".$all_homes[$i].".jpg' style='display: inline-block; width: 100%; height: 80px'>
        </a>";
    }
?>