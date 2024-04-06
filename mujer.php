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
        <div class="logo" >
            <img src="imagenes_predeterminadas/logo_2.png" style="width: 100%; height: 182px;">
        </div>

        <button class="cart" onclick="ver_cart()" style="background:url('imagenes_predeterminadas/carrito.jpeg');background-size: 100% 100%; height:30px;"></button>
        <div id="lista_art" style="display:none;"></div>
    </header>

    <article class="article" style="display:inline-flex; padding-left: 0%">
        <?php 
        	include"administracion/conexiones/conexion.php";
            include"administracion/verimagenes/verimagenesmujer.php";
        ?>

        <script>
            let total_post= todas_carpetas.length
            let cant_img_file=[]
            for (let i = 0; i < total_post; i++) {
                const array = todas_carpetas[i];
                let nom_sub_array=""
                var nuevo_array=[]
                for (let j = 0; j < array.length; j++) {
                    const sub_array = array[j];
                    var position_letra= sub_array.lastIndexOf("/")
                    var cat_string= sub_array.length
                    var element_id= sub_array.slice(position_letra+1, cat_string-4)
                    nuevo_array.push(element_id)
                    nom_sub_array= element_id
                }
                var nom_index= nom_sub_array.slice(0, -2)
                cant_img_file[nom_index]=nuevo_array

                try{
                    document.getElementById(cant_img_file[nom_index][0]).style.display="block"
                }
                catch{
                    let compuesto= nom_index+"_1"
                    document.getElementById(compuesto).style.display="block"
                }
            }
        </script>

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
    <script>
        function ver_cart() {

            let elemento_ver= document.getElementById("lista_art").style.display
            //console.log(elemento_ver)
            switch(elemento_ver) {
                case "block":
                    elemento_ver= document.getElementById("lista_art").style.display="none"
                  break;
                case "none":
                    elemento_ver= document.getElementById("lista_art").style.display="block"
                  break;
                default:
                elemento_ver= document.getElementById("lista_art").style.display="none"
            }
         
            try {
                let store= window.localStorage.getItem('articles')
                let array_articulos = store.split(',')  
                let separar_art=[];
                let array_apoyo=[]
                let acumulador= 0
                for (let index = 0; index < array_articulos.length; index++) {
                    const e = array_articulos[index];
                    array_apoyo.push(e)
                    acumulador += 1
                    if(acumulador == 3){
                        separar_art.push(array_apoyo)
                        array_apoyo=[]
                        acumulador= 0
                    }
                }
                //console.log(separar_art)

                let contenedor_tabla= document.getElementById("lista_art")
                contenedor_tabla.innerHTML= ""
                let tabla= "<table>"
                tabla += "<tr> <th>ARTICULO</th> <th>CANTIDAD</th> <th>PRECIO</th> </tr>"
                let contador=0
                let nombre=""
                let precio=""
                let cantidad=""
                let total_compra=0
                for (let i = 0; i < separar_art.length; i++) {
                    tabla += "<tr>"
                    for (let j = 0; j < separar_art[i].length; j++) {
                        tabla += "<td> <center>"+separar_art[i][j]+"</center></td>"
                        contador += 1
                        if(contador == 1){
                            //console.log(separar_art[i][j])
                            nombre= separar_art[i][j]
                        }
                        if(contador == 2){
                            //console.log(separar_art[i][j])
                            precio= "$"+separar_art[i][j]
                        }
                        if(contador == 3){
                            //console.log(separar_art[i][j])
                            cantidad= separar_art[i][j]
                            contador=0
                        }
                    }
                    tabla += "<td> <button id='mas_"+nombre+"' onclick='sumar_restar()'>+</button> <button id='menos_"+nombre+"' onclick='sumar_restar()'>-</button> </td>"
                    tabla += "</tr>"
                    let precio_out=""
                    for(let z = 0; z < precio.length; z++) {
                        //console.log(precio[z])
                        switch(precio[z]) {
                          case "$":
                            precio_out += precio[z].replace("$", '')
                            break;
                          case ".":
                            precio_out += precio[z].replace(".", '')
                            break;
                          default:
                            precio_out += precio[z]
                        }
                    }
                    //console.log(precio_out * cantidad)
                    let suma_art= precio_out * cantidad
                    total_compra += suma_art * 1
                    //console.log(total_compra)
                }
                let total_in=total_compra.toString()
                //console.log(total_compra,total_in)
                let contdor=0
                let total_out=""
                //console.log(total_in.length)
                for(let i = total_in.length-1; i > 0-1 ; i--) {
                    //console.log(total_in[i],i)
                    contdor += 1
                    total_out +=total_in[i]
                    if(contdor == 3){
                        if(i > 0){
                        total_out += "."
                        }
                        contdor= 0
                    }
                }
                function reverseString(str) {
                    let arrStr = str.split("");
                    return arrStr.reverse().join("");
                }
                //console.log(reverseString(total_out))

                tabla += "<tr><td colspan='3'> <center> $"+reverseString(total_out)+" </center> </td></tr>"
                tabla += "<tr><td> <center> <button onclick='comprar()'>comprar</button> </center> </td> <td></td> <td> <center> <button onclick='cancelar()'>cancelar</button> </center> </td></tr>"

                tabla += "</table>"
                contenedor_tabla.innerHTML= tabla
            } catch (error) {

            }
        }

        function comprar() {
            let save_article= window.localStorage.getItem('articles');
                //console.log(save_article)
                let array_articulos = save_article.split(',')
                
                let text="";
                let precio= 0
                let cantidad= 0
                let total_compra=0
                let contador=0
                let f_compra=0
                for (let index = 0; index < array_articulos.length; index++) {
                    contador += 1
                    const e = array_articulos[index];
                    if(contador < 3){
                        if(contador == 1){
                            text += "[ARTICULO:%20"
                        }
                        if(contador == 2){
                            text += "[PRECIO:%20"
                        }
                        text += e +"]%20"
                        if(contador == 2){
                            precio= e
                        }
                    }
                    else{
                        text += "[CANTIDAD:%20"+ e +"]%0A"
                        cantidad= e
                        let precio_out=""
                        for(let z = 0; z < precio.length; z++) {
                            //console.log(precio[z])
                            switch(precio[z]) {
                              case "$":
                                precio_out += precio[z].replace("$", '')
                                break;
                              case ".":
                                precio_out += precio[z].replace(".", '')
                                break;
                              default:
                                precio_out += precio[z]
                            }
                        //console.log(precio_out)
                        }
                        //console.log(precio_out * cantidad)
                        total_compra += precio_out * cantidad
                        let total_in=total_compra.toString()
                        //console.log(total_compra,total_in)
                        let contdor=0
                        let total_out=""
                        //console.log(total_in.length)
                        for(let i = total_in.length-1; i > 0-1 ; i--) {
                            //console.log(total_in[i],i)
                            contdor += 1
                            total_out +=total_in[i]
                            if(contdor == 3){
                                if(i > 0){
                                total_out += "."
                                }
                                contdor= 0
                            }
                        }
                        function reverseString(str) {
                            let arrStr = str.split("");
                            return arrStr.reverse().join("");
                        }
                        //console.log(reverseString(total_out))
                        f_compra= reverseString(total_out)
                        contador= 0
                    }
                }
                //console.log(f_compra)
                
                text +="TOTAL COMPRA= $"+f_compra;
                //console.log(text)
                        
                var url="https://wa.me/573237033255?text="+text
                window.open(url);

                cancelar()

        }
        function cancelar() {
            window.localStorage.removeItem('articles')
            let contenedor_tabla= document.getElementById("lista_art")
            contenedor_tabla.innerHTML= ""
            document.getElementById("lista_art").style.display= "none"
        }
        function sumar_restar() {
            let element_target= window.event.target.id
            //console.log(element_target)
            let id_art = element_target.split('_')
            //console.log(id_art)

            if(window.localStorage.getItem('articles')){
                let save_article= window.localStorage.getItem('articles');
                //console.log(save_article)
                let array_articulos = save_article.split(',')
                
                let separar_art=[];
                let array_apoyo=[]
                let acumulador= 0
                for (let index = 0; index < array_articulos.length; index++) {
                    const e = array_articulos[index];
                    array_apoyo.push(e)
                    acumulador += 1
                    if(acumulador == 3){
                        separar_art.push(array_apoyo)
                        array_apoyo=[]
                        acumulador= 0
                    }
                }
                //console.log(separar_art)


                let art_estado=[]
                for (let index = 0; index < separar_art.length; index++) {
                    const element = separar_art[index];
                    //console.log(element[0],id_art[1])
                    if(element[0] == id_art[1]){
                        art_estado.push("esta")
                    }
                    else{
                        art_estado.push("no_esta")
                    }
                }
                //console.log(art_estado)


                function paloDeTruco(palabra){
                     return art_estado.indexOf(palabra);
                }
                if (paloDeTruco("esta") != -1) {
                    let total_article=[]
                    for (let index = 0; index < separar_art.length; index++) {
                        const element = separar_art[index];
                        //console.log(element[0],id_art[1])
                        if(element[0] == id_art[1]){
                            if(id_art[0] == "menos"){
                                //console.log(id_art[0])
                                if(parseInt(element[2], 10) > 0){
                                    element[2]= parseInt(element[2], 10) - 1
                                }
                                if(parseInt(element[2], 10) == 0){
                                    //console.log(separar_art,separar_art[index])
                                    delete(separar_art[index])
                                    //console.log(separar_art);
                                }
                            }
                            if(id_art[0] == "mas"){
                                //console.log(id_art[0])
                                element[2]= parseInt(element[2], 10) + 1
                            }
                        }
                        //console.log(element,separar_art)
                        if(separar_art[index] != undefined){
                            //console.log(separar_art[index]);
                            total_article.push(separar_art[index])
                        }
                    }
                    //console.log(total_article)
                    window.localStorage.setItem("articles", total_article);
                    //console.log(window.localStorage.getItem("articles", total_article))
                    document.getElementById("lista_art").style.display= "none"
                    ver_cart()
                }

            }
        }
        
        let a= screen.width
        if(a >319 || a < 426){
            document.querySelector(".article").style.display="block"
            document.querySelector(".aside").style.width="15%"
        }
        if(a > 426){
            document.querySelector(".article").style.display="inline-flex"
        }
    </script>
</html>