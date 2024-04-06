<?php
session_start();
	
session_destroy();	

if(!isset($usuario)){
	
	header("location:../../index.php");
}
?>