
<?php 
session_start(); 

if($_SESSION['rol'] !=1 and $_SESSION['rol'] !=2){
	header("location:sistema.php");
}

include("includes/conexion.php");
if(!empty($_POST)){
	if(empty($_POST['idcliente'])){
		header("location:lista-clientes.php");
		mysqli_close($db);
	}
	$idcli=$_POST['idcliente'];
	//$sqlDelete="DELETE FROM usuario WHERE idcliente=$idusu";
	$sqlUpdate="UPDATE cliente SET estatus =0 WHERE idcliente=$idcli";
	$rUpdate=mysqli_query($db,$sqlUpdate);
	mysqli_close($db);
	if($rUpdate){
		header("location:lista-clientes.php");
	}else{
		echo "Error al eliminar";
	}

}



if(empty($_REQUEST['id'])){
	header("location:lista-clientes.php");
	mysqli_close($db);
}else{
	$idcli=$_REQUEST['id'];
	$sqlLista="SELECT * FROM cliente WHERE idcliente =$idcli";
	$rLista=mysqli_query($db,$sqlLista);
	mysqli_close($db);
	$numRowsLista=mysqli_num_rows($rLista);
	if($numRowsLista>0){
		while($rsLista=mysqli_fetch_array($rLista)){
			$nombre=$rsLista['nombre'];
			$dni=$rsLista['dni'];
			$telefono=$rsLista['telefono'];
			$direccion=$rsLista['direccion'];


		}
	}else{
		header("location:lista-clientes.php");
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
	<title>Eliminar Usuario</title>
</head>
<body>
	<div class="container-fluid">
		<div class="">

			<?php include("includes/header.php"); ?>
			<div class="row">
				<div class="col-12">
					<h2 class="text-secondary d-inline-block">Eliminar Cliente</h2>
					<hr>
				</div>
			</div>
			<div id="eliminar" class="">
				<div class="row">
					<div class="col-12 text-center text-dark">
						<h2><i class="fas fa-user-times fa-3x"></i></h2>
						<h2>¿Seguro desea eliminar este cliente?</h2>
						<p class="font-weight-bold">Nombre: <span class="text-info"><?php echo $nombre ?></span></p>
						<p class="font-weight-bold">DNI: <span class="text-info"><?php echo  $dni ?></span></p>
						<p class="font-weight-bold">Teléfono: <span class="text-info"><?php echo  $telefono ?></span></p>
						<p class="font-weight-bold">Dirección: <span class="text-info"><?php echo $direccion ?></span></p>
						
					</div>
				</div>
				<div class="row">
					<div class="col-12 text-center mt-4">
						<form action="" method="post">
							<input type="hidden" name="idcliente" value="<?php echo $idcli ?>">
							<a href="lista-clientes.php" class="btn btn-danger"><i class="fas fa-minus-circle"></i> Cancelar</a>
							<button type="submit" class="btn btn-warning"><i class="fas fa-trash-alt"></i> Aceptar</button>
						</form>
					</div>	
				</div>
			</div>
			<?php include("includes/footer.php"); ?>

		</div>

	</div>





	<script src="javascript/funciones.js"></script>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>