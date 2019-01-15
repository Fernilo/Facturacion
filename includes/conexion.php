<?php 
	define('DB_HOST','localhost');
	define('DB_PASS','');
	define('DB_USER','root');
	define('DB_NAME','id8479856_facturacion');

	$db=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
	if(!$db){
		echo "Error:No se pudo conectar a MySQL.";
		echo "errno de depuracion:".mysqli_connet_errno().PHP_EOL;
		echo "error de depuracion:".mysqli_connect_error().PHP_EOL;
	}
	else{
		//echo "conexion ok a".DB_NAME;
	}


 ?>