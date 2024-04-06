
<?php

    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
    //header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    //header("Allow: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Methods: GET");
    header("Allow: GET");
    $method = $_SERVER['REQUEST_METHOD'];
    if($method == "OPTIONS") {
        die();
    }
    else{
        include"administracion/conexiones/conexion.php";

	    $carpetas_separados=[];
	    $ss2 =mysqli_query($conexion, "SELECT * FROM lulo");
	    while($rr2 = mysqli_fetch_array($ss2)){
	    	$nombre_imagen= "$rr2[NOMBRE]";
		    $casa_imagen= "$rr2[CASA]";
		    $descripcion_imagen= "$rr2[DESCRIPCION]";
		    $precio_imagen= "$rr2[PRECIO]";
		    $genero_imagen= "$rr2[GENERO]";

            $sub_array=[];
	        array_push($sub_array,$nombre_imagen);
	        array_push($sub_array,$casa_imagen);
	        array_push($sub_array,$descripcion_imagen);
	        array_push($sub_array,$precio_imagen);
	        array_push($sub_array,$genero_imagen);

	        array_push($carpetas_separados,$sub_array);

        }
        //var_dump($carpetas_separados);
        $res_search= json_encode($carpetas_separados, JSON_INVALID_UTF8_SUBSTITUTE);
        echo $res_search;


    }

?>