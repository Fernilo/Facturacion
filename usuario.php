    <?php
    session_start(); 
    if($_SESSION['rol'] !=1){
      header("location:sistema.php");
    }
    include("includes/conexion.php");
    if(!empty($_POST))
    {
        /*$alert='';
        if(empty($_POST['nombre']) || empty($_POST['email']) || empty($_POST['usuario']) ||empty($_POST['clave']) || empty($_POST['rol']) ){
          
        }else{*/


          $nombre=$_POST['nombre'];
          $email=$_POST['email'];
          $usuario=$_POST['usuario'];
          $clave=md5($_POST['clave']);
          $rol=$_POST['rol'];

          $sqlConsulta="SELECT * FROM usuario WHERE usuario ='$usuario' OR correo ='$email'";
          $rConsulta=mysqli_query($db,$sqlConsulta);
          
          $rsConsulta=mysqli_fetch_array($rConsulta);
          
          if($rsConsulta>0){
            echo'userExist';exit();
          }
          else{

            $sqlInsertar="INSERT INTO usuario(nombre,correo,usuario,clave,rol) VALUES('$nombre','$email','$usuario','$clave','$rol')";
            $rInsertar=mysqli_query($db,$sqlInsertar);
            
            if($rInsertar){
              echo "save";exit();
            }else{
              echo "errorDatos";exit();
            }
          }
          /*}*/
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
          <title>Registro de Usuario</title>
        </head>
        <body>
          <div class="container-fluid">
            <?php include("includes/header.php"); ?>
          <div class="row">
             <div class="col-12">
              <h2 class="text-secondary"><i class="fas fa-user-plus"></i> Registro de Usuario</h2>
              <hr>
              </div>
          </div>
          <div id="loader"></div>
          <div class="row">
            <div class="col-12 col-md-4 offset-md-4">
              <div id="alerta" class=""></div>
            </div>
          </div>
          <div class="row">
            <div class="form_register bg-dark col-xs-12 col-md-4">

              <form  action="" method="post" id="form_agregar_usuario" >
               <h5 class="text-center text-info">Formulario</h5>
               <div class="col-xs-4 form-group">
                 <label for="nombre" class="text-white">Nombre</label>
                 <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
               </div>
               <div class="form-group">
                 <label for="email" class="text-white">Email</label>
                 <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="" >
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
               <input type="password" class="form-control" id="clave" name="clave" placeholder="****">
             </div>
             <?php 

             $sqlRoles="SELECT * FROM rol";  
             $rRoles=mysqli_query($db,$sqlRoles);
             mysqli_close($db);
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

            <button class="btn btn-primary btn-lg btn-block p-1" id="submit_agregar_usuario" type="submit"><i class="fas fa-save"></i> Enviar formulario</button>

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