<?php

//$conn1 = mysql_connect("localhost","pocketph_usrzoom","0Lx2ykCKe77^");
$conn1 = mysql_connect("localhost","vd000675_financi","KA74felime");

if (! $conn1){
	echo "Error al intentar conectarse con el servidor MySQL";
	exit();
	};

//if (! mysql_select_db("pocketph_zoom",$conn1)){
if (! mysql_select_db("vd000675_financi",$conn1)){
	echo "No se pudo conectar correctamente con la Base de datos";
	exit();
	};
?>