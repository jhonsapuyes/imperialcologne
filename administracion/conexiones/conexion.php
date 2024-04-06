
<?php

// conexion sqli


// conexion sqli
 $servername = "";
 $username = "";
 $password = "";
 $dbname = "";  
// Create connection
$conexion = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conexion) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
    //echo "conc";
}
?>