<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
         
    <link href="css/pequeño.css" rel="stylesheet" type="text/css"/> 
    <link href="css/mediano_1.css" rel="stylesheet" type="text/css"/> 
    <link href="css/mediano_2.css" rel="stylesheet" type="text/css"/> 
    <link href="css/grande.css" rel="stylesheet" type="text/css"/> 
    <style>
    .marcas{
        width:20%;
        display: inline-block;
    }
    </style>

    <title>IMPERIAL COLOGNE</title>
</head>
<body>

    <header id="header" class="header">
        <div class="logo" >
            <img src="imagenes_predeterminadas/logo_2.png" style="width: 100%; height: 182px;">
        </div>
    </header>

    <article class="article_p" style="width: 100%;display:block;text-align: center;">
        <div id="t_marcas" style=""> 
            <?php 
                include"administracion/conexiones/conexion.php";
        	    include"administracion/homes.php";
            ?>
        </div>
    </article>

    <aside id="aside" class="aside" >
        <div id="aside_movil" class="aside_movil" >
            <a href="https://api.whatsapp.com/send?phone=573237033255
            &text=buenas%20en%20que%20podria%20ayudarte%20 ">
            <div id="whatsaap" class="rs" style="background: url(imagenes_predeterminadas/whatsapp.png);background-size: 100% 100%;width: 100%;height: 45px;"></div>

            </a>  
        </div> 

        <!--<div id="aside_pc" class="aside_pc" >
            <div id="instagram" class="instagram">
                <a href="https://www.instagram.com/imperial__cologne" target="_blank" style="text-decoration: none;">
                    <div id="twiter" class="rs" style="background: url(imagenes_predeterminadas/logo_instagram.png);background-size: 100% 100%;width: 100%;height:                          45px;"></div>
                </a>
            </div>
        </div>  
    </aside> -->
</body>

</html>