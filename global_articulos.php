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
    <?php 
    	include"administracion/conexiones/conexion.php";
        include"administracion/verimagenes/verimagenes_globales.php";
    ?>    
</body>
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
            document.getElementById(cant_img_file[nom_index][0]).style.display="block"
        }

        let position=0
        function slider() {
            let element= window.event
            let element_direccion= element.target.id
            let elem_id= element.target.parentElement.id
            let search_elem= elem_id.slice(4)
            let array_select= cant_img_file[search_elem]
            let cat_elemt= array_select.length

            var divs = document.querySelectorAll("."+search_elem)
            for (i = 0; i < divs.length; ++i) {
                divs[i].style.display = "none";
            }
            if (element_direccion == "adelante") {
                position += 1
                if(position == cat_elemt){
                    position= 0
                }
                try {
                    document.getElementById(cant_img_file[search_elem][position]).style.display="block"
                } 
                catch (error) {
                    position= 0
                }
            }
            if (element_direccion == "atras") {
                position -= 1
                if(position < 0){
                    position= cat_elemt-1
                }
                try {
                    document.getElementById(cant_img_file[search_elem][position]).style.display="block"
                } 
                catch (error) {
                    position= cat_elemt-1
                    document.getElementById(cant_img_file[search_elem][position]).style.display="block"
                }
            }
        }
    </script>
    <script>
        function add_cart(nom_art,pt_2) {

            //string_a = string_a.replace("_", ' ')
            let pt_1=""

            for (let index = 0; index < nom_art.length; index++) {
                //console.log(nom_art[index])
                if(nom_art[index] == "_"){
                    pt_1+= nom_art[index].replace("_", ' ')
                }
                else{
                pt_1+= nom_art[index]
                }
            }
            //console.log(pt_1)
            
            let cant_global_art=0
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
                    //console.log(element[0],pt_1)
                    if(element[0] == pt_1){
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
                    //console.log("hola")
                    let total_article=[]
                    for (let index = 0; index < separar_art.length; index++) {
                        const element = separar_art[index];
                        //console.log(element[0],pt_1)
                        if(element[0] == pt_1){
                            element[2]= parseInt(element[2], 10) + 1
                        }
                        //console.log(element)
                        total_article.push(element)
                    }
                    //console.log(total_article)
                    window.localStorage.setItem("articles", total_article);
                    cant_global_art= total_article[0][2]

                }
                else{
                    let total_article=[save_article,pt_1,pt_2,1]
                    window.localStorage.setItem("articles", total_article);
                    cant_global_art= total_article[2]
                }
            }
            else{
                let total_article=[pt_1,pt_2,1]
                window.localStorage.setItem("articles", total_article);
                cant_global_art= total_article[2]
            }

            //console.log(cant_global_art)
            document.getElementById("ver_productos").innerText="CANTIDAD ARTICULOS= "+cant_global_art;

            //console.log(window.localStorage.getItem('articles'))

            //window.localStorage.removeItem('articles');
            //window.localStorage.clear();
        }
    </script>
</html>