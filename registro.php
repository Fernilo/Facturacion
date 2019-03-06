<?php 
session_start();
include("includes/conexion.php");
if(!empty($_SESSION['active'])){
  header('location:sistema.php');
}
else{
  if(!empty($_POST)){
   /* if(empty($_POST['nombre']) || empty($_POST['email']) || empty($_POST['clave']) || empty($_POST['usuario'])){
      $alert='<p class="">Complete todos los campos</p> ';
    }else{*/

      
      $_SESSION['nombre']=$_POST['nombre'];
      $_SESSION['email']=$_POST['email'];
      $_SESSION['user']=$_POST['usuario'];
      $_SESSION['rol']=1;
      $clave=md5($_POST['clave']);

      $sqlConsulta="SELECT * FROM usuario WHERE usuario ='".$_SESSION['user']."' OR correo ='".$_SESSION['email']."'";
      $rConsulta=mysqli_query($db,$sqlConsulta);

      $rsConsulta=mysqli_fetch_array($rConsulta);

      if($rsConsulta>0){
        echo "userExist";exit();
      }
      else{
        $sqlInsertar="INSERT INTO usuario(nombre,correo,usuario,clave,rol) VALUES('".$_SESSION['nombre']."','".$_SESSION['email']."','".$_SESSION['user']."','$clave','".$_SESSION['rol']."')";
        $rInsertar=mysqli_query($db,$sqlInsertar);
        $idusuario=mysqli_insert_id($db);

        if($rInsertar){
          $_SESSION['active']=true;
          $_SESSION['idUser']=$idusuario;
          echo "save";exit();
          //header('location:sistema.php');
        }else{
          echo "errorDatos";exit();
        }
      }
    /*}*/

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
  <title>Facturación</title>
</head>
<body>
  <div class="container-fluid" >
    
      <div id="loader"></div>
      <div class="row">
        <div class="form_register_ingreso bg-dark col-12 col-md-4">
          <form action="" method="post" id="form-ingreso">
           <h3 class="bg-info">Registro de usuario</h3>
           <div class="form-group">
             <label for="correo" class="text-white">Nombre*</label>
             <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre">
           </div>
           <div class="form-group">
             <label for="email" class="text-white">Email*</label>
             <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
           </div>
           <div class="form-group">
             <label for="usuario" class="text-white">Usuario*</label>
             <div class="input-group">
               <div class="input-group-prepend">
                 <span class="input-group-text" id="">@</span>
               </div>
               <input type="text" class="form-control" id="usuario" placeholder="Usuario" name="usuario" aria-describedby="usuario">
             </div>
           </div>
           <div class="form-group">
             <label for="clave" class="text-white">Clave*</label>
             <input type="password" name="clave" class="form-control" id="clave" placeholder="******">
           </div>
           <div id="alerta" class=""></div>    
           <button type="submit" id="submit_registrar" class="btn btn-primary btn-block btn-lg">Registrarme</button>
           
         </form>
       </div>
      </div>
    


   <?php include("includes/footer.php"); ?>



 </div>




 <!-- Optional JavaScript -->
 <!-- jQuery first, then Popper.js, then Bootstrap JS -->
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
 <script src="javascript/funciones.js"></script>
</body>
</html>