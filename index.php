

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

    <title>IMPERIAL COLOGNE</title>
</head>
<body>
    <header id="header" class="header">
        <div class="logo">
             <img src="imagenes_predeterminadas/logo_2.png" style="width: 100%; height: 185px;"> 
        </div>
    </header>

    <article id="article" class="article" >
        <div class="men" >
            <a id="img_hombre" href="marcas.php?genero=hombre" target="_blank" >
                <img src="imagenes_predeterminadas/hombre_2.png" style="width: 100%; height: 182px;"> 
            </a>
        </div>
    
        <div class="woman" >
            <a id="img_mujer" href="marcas.php?genero=mujer" target="_blank">
                    <!-- <img src="imagenes_predeterminadas/mujer_2.png" style="width: 100%; height: 182px;"> -->
                <img src="imagenes_predeterminadas/mujer_2.png" style="width: 100%; height: 182px;">
            </a>
        </div>
    
    </article>
<br>
    <aside id="aside" class="aside" style="position: unset;">
        <div id="aside_movil" class="aside_movil" style="display: inline-block; width: 11%; position: relative; left: 25%;">
            <a href="https://api.whatsapp.com/send?phone= 
            &text=HOLA,%20DESEO%20ASESORIA ">
            
            <!--<img src="imagenes_predeterminadas/whatsapp.jpeg"  > -->
            <div id="whatsaap" class="rs" style="background: url(imagenes_predeterminadas/whatsapp.png);background-size: 100% 100%;width: 50%;height: 40px;"></div>
            </a>  
        </div>  
        <div id="aside_pc" class="aside_pc" style="display: inline-block; width: 11%; position: relative; left: 55%; top: 1px;">
            <div id="instagram" class="instagram">
                <a href=" " target="_blank" style="text-decoration: none;">
                    <div id="twiter" class="rs" style="background: url(imagenes_predeterminadas/logo_instagram.png);background-size: 100% 100%;width: 50%;height:40px;"></div>
                </a>
            </div>
        </div>  
        
        <div id="aside_tick" class="aside_tick" style="display: inline-block; width: 11%; position: relative; left: 22%; top: 1px;">
            <div id="instagram" class="instagram">
                <a href=" " target="_blank" style="text-decoration: none;">
                    <div id="twiter" class="rs" style="background: url(imagenes_predeterminadas/tikc.png);background-size: 100% 100%;width: 50%;height:40px;"></div>
                </a>
            </div>
        </div>  
    </aside>

    <footer id="footer" class="footer">
    </footer>
</body>
    <script>
        let a= screen.width
        if(a >319 || a < 426){
            document.querySelector(".aside").style.width="100%"
        }

    </script>
</html>