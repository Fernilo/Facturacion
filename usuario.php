  <?php 
    include("includes/conexion.php");
    if(!empty($_POST))
    {
      $alert='';
      if(empty($_POST['nombre']) || empty($_POST['email']) || empty($_POST['usuario']) ||empty($_POST['clave']) || empty($_POST['rol']) ){
        $alert='<p>campos obligatorios</p> ';
      }else{


        $nombre=$_POST['nombre'];
        $email=$_POST['email'];
        $usuario=$_POST['usuario'];
        $clave=md5($_POST['clave']);
        $rol=$_POST['rol'];

        $sqlConsulta="SELECT * FROM usuario WHERE usuario ='$usuario' OR correo ='$email'";
        $rConsulta=mysqli_query($db,$sqlConsulta);
        $rsConsulta=mysqli_fetch_array($rConsulta);
        if($rsConsulta>0){
          $alert='<p class="alerta-incorrecto">El usuario o correo ya existe</p> ';
        }
        else{
          $sqlInsertar="INSERT INTO usuario(nombre,correo,usuario,clave,rol) VALUES('$nombre','$email','$usuario','$clave','$rol')";
          $rInsertar=mysqli_query($db,$sqlInsertar);
          if($rInsertar){
            $alert='<p class="alerta-correcto">Usuario registrado correctamente</p> ';
          }else{
            $alert='<p class="alerta-incorrecto">Error al registrar</p> ';
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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="alertify/css/alertify.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <title>Registro de Usuario</title>
  </head>
  <body>
    <div class="container-fluid">
      <?php include("includes/header.php"); ?>
      <div class="row">
         <div class="col-12">
          <h2 class="text-secondary">Registro de Usuario</h2>
          <hr>
          </div>
      </div>
      <div class="row">
        <div class="col-12 col-md-4 offset-md-4">
          <div class=""><?php echo isset($alert) ? $alert: ''; ?></div>
        </div>
      </div>
    <div class="form_register bg-dark col-xs-12 col-md-4">
      
      <form onsubmit="return validarCampos()" action="" method="post" >
       <h5 class="text-center text-info">Formulario</h5>
       <div class="col-xs-4 form-group">
         <label for="nombre" class="text-white">Nombre</label>
         <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
       </div>
       <div class="form-group">
         <label for="email" class="text-white">Email</label>
         <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="" >
       </div>
       <div class="form-group">
          <label for="usuario" class="text-white">Usuario</label>
          <div class="input-group">
           <div class="input-group-prepend">
             <span class="input-group-text" id="">@</span>
           </div>
           <input type="text" class="form-control" id="usuario" placeholder="Usuario" name="usuario" aria-describedby="usuario">
         </div>
        </div>
         <div class="form-group">
           <label for="clave" class="text-white">Clave</label>
           <input type="password" class="form-control" id="clave" name="clave" placeholder="Clave">
         </div>
         <?php 

         $sqlRoles="SELECT * FROM rol";  
         $rRoles=mysqli_query($db,$sqlRoles);
         $rsRoles=mysqli_num_rows($rRoles);
         if($rsRoles >0){
           ?>    
           <div class="form-group">
              <label for="rol" class="text-white">Tipo usuario</label>
              <select class="form-control" id="rol" name="rol">
                <?php 

                while($rol=mysqli_fetch_array($rRoles)){

                  ?>
                  <option value="<?php echo $rol['idrol'];?>"><?php echo $rol['rol'];?></option>

                  <?php    
                }
              }
              ?>
            </select>
        </div>

        <button class="btn btn-primary btn-lg btn-block p-1" type="submit">Enviar formulario</button>
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
          <div class="ocultar text-danger mb-2 text-center" id="ocultarClave">
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