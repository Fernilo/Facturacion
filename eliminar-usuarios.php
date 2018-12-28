
<?php 
	include("includes/conexion.php");
	if(!empty($_POST)){
		$idusu=$_POST['idusuario'];
		//$sqlDelete="DELETE FROM usuario WHERE idusuario=$idusu";
		$sqlUpdate="UPDATE usuario SET estatus =0 WHERE idusuario=$idusu";
		$rUpdate=mysqli_query($db,$sqlUpdate);
		if($rUpdate){
			header("location:listausuarios.php");
		}else{
			echo "Error al eliminar";
		}

	}



	if(empty($_REQUEST['id']) || $_REQUEST['id']==1){
		header("location:listausuarios.php");
	}else{
		$idusuario=$_REQUEST['id'];
		$sqlLista="SELECT u.nombre,u.usuario,u.correo,r.rol FROM usuario u INNER JOIN rol r ON u.rol=r.idrol WHERE idusuario =$idusuario";
		$rLista=mysqli_query($db,$sqlLista);
		$numRowsLista=mysqli_num_rows($rLista);
		if($numRowsLista>0){
			while($rsLista=mysqli_fetch_array($rLista)){
				$nombre=$rsLista['nombre'];
				$usuario=$rsLista['usuario'];
				$rol=$rsLista['rol'];
				$correo=$rsLista['correo'];


			}
		}else{
			header("location:listausuarios.php");
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
	<title>Eliminar Usuario</title>
</head>
<body>
	<div class="container-fluid">
		<div class="">

			<?php include("includes/header.php"); ?>
			<div class="row">
				<div class="col-12">
					<h2 class="text-secondary d-inline-block">Eliminar Usuario</h2>
					<hr>
				</div>
			</div>
			<div id="eliminar" class="">
				<div class="row">
					<div class="col-12 text-center text-dark">
						<h2>¿Seguro desea eliminar este usuario?</h2>
						<p class="font-weight-bold">Nombre: <span class="text-info"><?php echo $nombre ?></span></p>
						<p class="font-weight-bold">Usuario: <span class="text-info"><?php echo  $usuario ?></span></p>
						<p class="font-weight-bold">Correo: <span class="text-info"><?php echo  $correo ?></span></p>
						<p class="font-weight-bold">Rol: <span class="text-info"><?php echo $rol ?></span></p>
						
					</div>
				</div>
				<div class="row">
					<div class="col-12 text-center mt-4">
						<form action="" method="post">
							<input type="hidden" name="idusuario" value="<?php echo $idusuario ?> ">
							<a href="listausuarios.php" class="btn btn-danger">Cancelar</a>
							<button type="submit" class="btn btn-warning">Aceptar</button>
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