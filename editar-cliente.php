  <?php 
  session_start(); 
  include("includes/conexion.php");
  //obtengo los datos enviados en el form
  if(!empty($_POST)){
    $alert='';
    if(empty($_POST['nombre']) || empty($_POST['dni']) || empty($_POST['telefono']) || empty($_POST['direccion']) ){

    }else{

      $idcliente=$_POST['id'];
      $dni=$_POST['dni'];
      $nombre=$_POST['nombre'];
      $telefono=$_POST['telefono'];
      $direccion=$_POST['direccion'];

      if(is_numeric($dni)){
       $sqlConsulta="SELECT * FROM cliente WHERE(dni=$dni AND idcliente != $idcliente)";
       $rConsulta=mysqli_query($db,$sqlConsulta);
       $rsConsulta=mysqli_fetch_array($rConsulta);
       $rsConsulta=count($rsConsulta);
     }
     
     if($rsConsulta > 0){
      $alert='<p class="alerta-incorrecto">El dni ya existe,Ingrese otro</p> ';
    }
    else{
     
        $sqlUpdate="UPDATE cliente SET nombre='$nombre',dni='$dni',telefono='$telefono',direccion='$direccion' WHERE idcliente=$idcliente";
        $rUpdate=mysqli_query($db,$sqlUpdate);
        if($rUpdate){
        $alert='<p class="alerta-correcto">Cliente actualizado correctamente</p>';
        }else{
          $alert='<p class="alerta-incorrecto">Error al actualizar</p> ';
        }
      
      }

    }
  }


  //obtengo id y verifico si existe

if(empty($_REQUEST['id'])){
  header('location:lista-clientes.php');
}

$idcliente=$_REQUEST['id'];
$sqlExiste="SELECT * FROM cliente WHERE idcliente=$idcliente AND estatus =1";

$rExiste=mysqli_query($db,$sqlExiste);

$nrowExiste=mysqli_num_rows($rExiste);
if($nrowExiste == 0){
 header('location:lista-clientes.php');
}
else{
  while($rsExiste=mysqli_fetch_array($rExiste)){
    $idcliente=$rsExiste['idcliente'];
    $nombre=$rsExiste['nombre'];
    $telefono=$rsExiste['telefono'];
    $direccion=$rsExiste['direccion'];
    $dni=$rsExiste['dni'];

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
  <title>Editar Cliente</title>
</head>
<body>
  <div class="container-fluid">
   <?php include("includes/header.php"); ?>
   <div class="row">
    <div class="col-12">
      <h2 class="text-secondary"><i class="fas fa-edit"></i> Edición de Cliente</h2>
      <hr>
    </div>
  </div>
  <div class="row">
    <div class="col-12 col-md-4 offset-md-4">
      <div class=""><?php echo isset($alert) ? $alert: ''; ?></div>
    </div>
  </div>
 <div class="row">
    <div class="col-12 form_register col-md-4  bg-dark">
     <form onsubmit="return validarCamposClientes()" action="" method="post" >
      <h5 class="text-center text-info">Formulario</h5>
      <input type="hidden" name="id" value="<?php echo $idcliente ?> " >
      <div class="col-xs-4 form-group">
        <label for="nombre" class="text-white">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre ?>">
      </div>
      <div class="form-group">
        <label for="dni" class="text-white">DNI</label>
        <input type="number" class="form-control" id="dni" name="dni" value="<?php echo $dni ?>" >
      </div>
      <div class="form-group">
       <label for="telefono" class="text-white">Teléfono</label>
       <div class="input-group">
        <input type="number" class="form-control" id="telefono" value="<?php echo $telefono ?>" name="telefono">
      </div>
    </div>
    <div class="form-group">
      <label for="direccion" class="text-white">Dirección</label>
      <input type="text" class="form-control" id="direccion" value="<?php echo $direccion ?> " name="direccion">
    </div>
   
    <button class="btn btn-primary btn-lg btn-block mt-5 mb-3" type="submit"><i class="fas fa-save"></i> Enviar formulario</button>
   
      <div class="errores d-none d-sm-block">
         <div class="ocultar text-danger mb-3  text-center" id="ocultarNombre">
           <p>Debe ingresar un nombre!</p>
         </div> 
         <div class="ocultar text-danger mb-3 text-center" id="ocultarDNI">
           <p>Debe ingresar un DNI!</p>
         </div>  
         <div class="ocultar text-danger mb-3 text-center" id="ocultarTelefono">
           <p>Debe ingresar una Telefóno!</p>
         </div>
         <div class="ocultar text-danger  text-center" id="ocultarDireccion">
           <p>Debe ingresar una Dirección!</p>
          </div> 
       </div>
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
<script src="alertify/alertify.min.js"></script>
<script src="javascript/funciones.js"></script>
</body>
</html>