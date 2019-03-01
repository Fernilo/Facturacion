<?php 
session_start(); 
if($_SESSION['rol'] !=1){
	header("location:sistema.php");
}
include("includes/conexion.php");
if(!empty($_POST)){
	if(empty($_POST['idproveedor'])){
		header("location:lista-proveedores.php");
		mysqli_close($db);
	}
	$idprov=$_POST['idproveedor'];
	
		//$sqlDelete="DELETE FROM usuario WHERE idusuario=$idusu";

	$sqlUpdate="UPDATE proveedor SET estatus =0 WHERE codproveedor=$idprov";
	$rUpdate=mysqli_query($db,$sqlUpdate);
	mysqli_close($db);
	if($rUpdate){
		header("location:lista-proveedores.php");
	}else{
		echo "Error al eliminar";
	}

}



if(empty($_REQUEST['id']) || $_REQUEST['id']==1){
	header("location:lista-proveedores.php");
	mysqli_close($db);
}else{
	$idproveedor=$_REQUEST['id'];
	$sqlLista="SELECT * FROM proveedor  WHERE codproveedor =$idproveedor";
	$rLista=mysqli_query($db,$sqlLista);
	
	$numRowsLista=mysqli_num_rows($rLista);
	if($numRowsLista>0){
		while($rsLista=mysqli_fetch_array($rLista)){
			$nombre=$rsLista['proveedor'];
			$contacto=$rsLista['contacto'];
			$telefono=$rsLista['telefono'];
			$direccion=$rsLista['direccion'];


		}
	}else{
		header("location:lista-proveedores.php");
	}

}








?>
<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="styles/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<title>Eliminar Proveedor</title>
</head>
<body>
	<div class="container-fluid">
		<div class="">

			<?php include("includes/header.php"); ?>
			<div class="row">
				<div class="col-12">
					<h2 class="text-secondary d-inline-block"><i class="fas fa-trash-alt"></i>Eliminar Proveedor</h2>
					<hr>
				</div>
			</div>
			<div id="eliminar" class="">
				<div class="row">
					<div class="col-12 text-center text-dark">
						<h2><i class="fas fa-user-times fa-3x"></i></h2>
						<h2>¿Seguro desea eliminar este proveedor?</h2>
						<p class="font-weight-bold">Nombre: <span class="text-info"><?php echo $nombre ?></span></p>
						<p class="font-weight-bold">Contacto: <span class="text-info"><?php echo  $contacto ?></span></p>
						<p class="font-weight-bold">direccion: <span class="text-info"><?php echo  $direccion ?></span></p>
						<p class="font-weight-bold">Teléfono: <span class="text-info"><?php echo $telefono ?></span></p>
						
					</div>
				</div>
				<div class="row">
					<div class="col-12 text-center mt-4">
						<form action="" method="post">
							<input type="hidden" name="idproveedor" value="<?php echo $idproveedor ?>">
							<a href="lista-proveedores.php" class="btn btn-danger"><i class="fas fa-minus-circle"></i> Cancelar</a>
							<button type="submit" class="btn btn-warning"><i class="fas fa-trash-alt"></i> Aceptar</button>
						</form>
					</div>	
				</div>
			</div>
			<?php include("includes/footer.php"); ?>

		</div>

	</div>





	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script src="javascript/funciones.js"></script>
</body>
</html>