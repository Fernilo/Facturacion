  <?php 
  session_start(); 
  include("includes/conexion.php");
  
  //obtengo los datos enviados en el form
  if(!empty($_POST)){
    $alert='';
    if(empty($_POST['nombre']) || empty($_POST['email']) || empty($_POST['usuario']) || empty($_POST['rol']) ){

    }else{

      $idusuario=$_POST['id'];
      $nombre=$_POST['nombre'];
      $email=$_POST['email'];
      $usuario=$_POST['usuario'];
      $clave=md5($_POST['clave']);
      $rol=$_POST['rol'];


      $sqlConsulta="SELECT * FROM usuario WHERE (usuario ='$usuario' AND idusuario!=$idusuario) OR (correo ='$email' AND idusuario!=$idusuario)";
      $rConsulta=mysqli_query($db,$sqlConsulta);
      
      $rsConsulta=mysqli_fetch_array($rConsulta);
      $rsConsulta=count($rsConsulta);
      if($rsConsulta>0){
        $alert='<p class="alerta-incorrecto">El usuario o correo ya existe</p> ';
      }
      else{
        //Si ingreso algo en el campo clave se actualiza sino sigue la misma
        if(empty($_POST['clave'])){
          $sqlUpdate="UPDATE usuario SET nombre='$nombre',correo='$email',usuario='$usuario',rol='$rol' WHERE idusuario=$idusuario";
          $rUpdate=mysqli_query($db,$sqlUpdate);
        }
        else{
          $sqlUpdate="UPDATE usuario SET nombre='$nombre',correo='$email',usuario='$usuario',rol='$rol',clave='$clave' WHERE idusuario=$idusuario";
          $rUpdate=mysqli_query($db,$sqlUpdate);
        }
        
        if($rUpdate){
          $alert='<p class="alerta-correcto">Usuario actualizado correctamente</p>';
        }else{
          $alert='<p class="alerta-incorrecto">Error al actualizar</p> ';
        }
      }
    }
    
  }
  //obtengo id y verifico si existe

  if(empty($_REQUEST['id'])){
    header('location:listausuarios.php');
  }

  $idusuario=$_REQUEST['id'];
  $sqlExiste="SELECT u.idusuario,u.nombre,u.correo,u.usuario,u.rol as idrol,r.rol as rol FROM usuario u INNER JOIN rol r on u.rol=r.idrol WHERE idusuario=$idusuario AND estatus =1";

  $rExiste=mysqli_query($db,$sqlExiste);
  
  $nrowExiste=mysqli_num_rows($rExiste);
  if($nrowExiste == 0){
   header('location:listausuarios.php');
 }
 else{
  while($rsExiste=mysqli_fetch_array($rExiste)){
    
    $nombre=$rsExiste['nombre'];
    $correo=$rsExiste['correo'];
    $usuario=$rsExiste['usuario'];
    $idrol=$rsExiste['idrol'];
    $rol=$rsExiste['rol'];


    if($idrol==1){
      $opcion='<option value="'.$idrol.'" select>'.$rol.'</option>';
    }else if($idrol==2){
      $opcion='<option value="'.$idrol.'" select>'.$rol.'</option>';
    }else if($idrol==3){
      $opcion='<option value="'.$idrol.'" select>'.$rol.'</option>';
    }

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
  <link rel="stylesheet" href="alertify/css/alertify.min.css">
  <link rel="stylesheet" href="styles/style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <title>Editar Usuario</title>
</head>
<body>
  <div class="container-fluid">
   <?php include("includes/header.php"); ?>
   <div class="row">
    <div class="col-12">
      <h2 class="text-secondary"><i class="fas fa-edit"></i> Edición de Usuario</h2>
      <hr>
    </div>
  </div>
  <div class="row">
    <div class="col-12 col-md-4 offset-md-4">
      <div class=""><?php echo isset($alert) ? $alert: ''; ?></div>
    </div>
  </div>
  <div class="form_register bg-dark col-xs-12 col-md-4">
    <form onsubmit="" action="" method="post" >
     <h5 class="text-center text-info">Formulario</h5>
     <input type="hidden" name="id" value="  <?php echo $idusuario ?> ">
     <div class="col-xs-4 form-group">
       <label for="nombre" class="text-white">Nombre</label>
       <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value=" <?php echo $nombre; ?> ">
     </div>
     <div class="form-group">
       <label for="email" class="text-white">Email</label>
       <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $correo; ?> " >
     </div>
     <div class="form-group">
      <label for="usuario" class="text-white">Usuario</label>
      <div class="input-group">
       <div class="input-group-prepend">
         <span class="input-group-text" id="">@</span>
       </div>
       <input type="text" class="form-control" id="usuario" placeholder="Usuario" name="usuario" aria-describedby="usuario"  value="<?php echo $usuario; ?>" >
     </div>
   </div>

   <div class="form-group">
     <label for="clave" class="text-white">Clave</label>
     <input type="password" class="form-control" id="clave" name="clave" placeholder="Clave">
   </div>
   <?php 
   if($_SESSION['rol'] !=1){
    
  }else{

  $sqlRoles="SELECT * FROM rol";  
  $rRoles=mysqli_query($db,$sqlRoles);
  $rsRoles=mysqli_num_rows($rRoles);

  ?>    
  <div class="form-group">
    <label for="rol" class="text-white">Tipo usuario</label>
    <select class="form-control notItem" id="rol" name="rol">
      <?php 
      echo $opcion;
      if($rsRoles >0){
        while($rol=mysqli_fetch_array($rRoles)){

          ?>
          <option value="<?php echo $rol['idrol'];?>"><?php echo $rol['rol'];?></option>

          <?php    
        }
      }
      ?>
    </select>
  </div>
  <?php } ?>

  <button class="btn btn-primary btn-lg btn-block p-1" type="submit"><i class="fas fa-save"></i> Enviar formulario</button>
  <div class="errores d-none d-sm-block">
    <div class="ocultar text-danger mb-3  text-center" id="ocultarNombre">
      <p>Debe ingresar un nombre!</p>
    </div> 
    <div class="ocultar text-danger mb-3 text-center" id="ocultarEmail">
      <p>Debe ingresar un Email!</p>
    </div> 
    <div class="ocultar text-danger mb-3 text-center" id="ocultarUsuario">
      <p>Debe ingresar un usuario!</p>
    </div> 
    <div class="ocultar text-danger  text-center" id="ocultarClave">
      <p>Debe ingresar una Clave!</p>
    </div> 
  </div>
</form>
</div>

<?php include("includes/footer.php"); ?>

</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="alertify/alertify.min.js"></script>
<script src="javascript/funciones.js"></script>
</body>
</html>