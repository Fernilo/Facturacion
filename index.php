<?php 
session_start();
include("includes/conexion.php");
$alert='';
if(!empty($_SESSION['active'])){
	header('location:sistema.php');
}
else{

	if(!empty($_POST)){
		if(empty($_POST['usuario']) || empty($_POST['password'])){
			$alert='<p class="alerta-incorrecto" id="">Ingrese usuario y contraseña</p> ';
		}
		else{
			$user=mysqli_real_escape_string($db,$_POST['usuario']);
			$pass=md5(mysqli_real_escape_string($db,$_POST['password']));//con md5 encripto la clave(debo recordar poner funcion :md5 en base de datos.real_escape elimina los caracteres especiales)


			$sqlIngreso="SELECT * FROM usuario WHERE usuario='$user' AND clave='$pass'";
			$rIngreso=mysqli_query($db,$sqlIngreso);
			mysqli_close($db);
			$rowIngreso=mysqli_num_rows($rIngreso);
			
			if($rowIngreso>0){
				$rsIngreso=mysqli_fetch_array($rIngreso);
				
				$_SESSION['active']=true;
				$_SESSION['idUser']=$rsIngreso['idusuario'];
				$_SESSION['nombre']=$rsIngreso['nombre'];
				$_SESSION['email']=$rsIngreso['correo'];
				$_SESSION['user']=$rsIngreso['usuario'];
				$_SESSION['rol']=$rsIngreso['rol'];

				header('location:sistema.php');

			}
			else{
				$alert='<p class="alerta-incorrecto">Datos incorrectos</p>';
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
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="styles/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

	<title>Login</title>
</head>
<body>
	<div class="container-fluid" >
		<div id="contenedor">
			<div class="row">
					<div class="form_register_ingreso bg-dark col-xs-12 col-md-4">
						<form action="" method="post" id="form-in">
							<h3 class="bg-info">Sistema de facturación</h3>
							<img src="img/ingresar2.png" alt="Login">
							<input type="text" placeholder="Usuario" name="usuario" class="form-control mb-3 rounded">
							<input type="password" name="password" placeholder="Contraseña" class="form-control  rounded">
							<div class="alerta mt-3"><?php echo isset($alert) ? $alert:'';/* ?-> if resumido los dos puntos serian else*/ ?></div>
							<button class="btn btn-primary btn-lg btn-block mt-3" type="submit">Ingresar</button>
							<div class="mt-3 text-center">
								<a href="registro.php" class="text-success sinlinea">¡Crear mi Usuario!</a>
							</div>
						</form>
					</div>
			</div>
		</div>

		<?php include("includes/footer.php"); ?>
	</div>
	








	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>