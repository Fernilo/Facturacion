
<?php 
	session_start();
	$alert='';
	if(!empty($_SESSION['active'])){
		header('location:sistema.php');
	}
	else{

	if(!empty($_POST)){
		if(empty($_POST['usuario']) || empty($_POST['password'])){
			$alert='<p class="text-danger">Ingrese usuario y contraseña</p> ';
		}else{
			include("includes/conexion.php");
			$user=mysqli_real_escape_string($db,$_POST['usuario']);
			$pass=md5(mysqli_real_escape_string($db,$_POST['password']));//con md5 encripto la clave(debo recordar poner funcion :md5 en base de datos.real_escape elimina los caracteres especiales)


			$sqlIngreso="SELECT * FROM usuario WHERE usuario='$user' AND clave='$pass'";
			$rIngreso=mysqli_query($db,$sqlIngreso);
			$rowIngreso=mysqli_num_rows($rIngreso);
			if($rowIngreso>0){
				$rsIngreso=mysqli_fetch_array($rIngreso);
				
				$_SESSION['active']=true;
				$_SESSION['idUser']=$rsIngreso['idUsuario'];
				$_SESSION['nombre']=$rsIngreso['nombre'];
				$_SESSION['email']=$rsIngreso['email'];
				$_SESSION['user']=$rsIngreso['usuario'];
				$_SESSION['rol']=$rsIngreso['rol'];

				header('location:sistema.php');

			}
				else{
					$alert='<p class="text-danger">Usuario y/o contraseña incorrectos</p>';
					session_destroy();
				}
			}
		}
	
	}

 

 ?>
<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="styles/style.css">

	<title>Login</title>
</head>
<body>
	<div class="container-fluid" id="container">
		<div class="row">
			<div class="col-xs-12 bg-dark">
				<form action="" method="post">
					<h3 class="bg-info">Iniciar Sesión</h3>
					<img src="img/ingresar.png" alt="Login">
					<input type="text" placeholder="Usuario" name="usuario" class="form-control mb-3 rounded">
					<input type="password" name="password" placeholder="Contraseña" class="form-control  rounded">
					<div class="alerta mt-3"><?php echo isset($alert) ? $alert:'';/* ?-> if resumido los dos puntos serian else*/ ?></div>
					<button class="btn btn-primary btn-lg btn-block mt-3" type="submit">Ingresar</button>
				</form>
			</div>
			
		</div>
		
		

	</div>










	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>