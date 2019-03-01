<?php 
session_start();
include("includes/conexion.php");
if(empty($_SESSION['active'])){
  header('location:index.php');
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
  <div class="container-fluid">

   <?php include("includes/header.php"); ?>
   <div class="row">
    <div class="col-12">
      <h2 class="text-secondary"><i class="fas fa-home"></i> Home</h2>
      <hr>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <?php $sqlDatos="SELECT * FROM usuario WHERE idusuario='".$_SESSION['idUser']."'";
      $rDatos=mysqli_query($db,$sqlDatos);
      $rsDatos=mysqli_fetch_array($rDatos);


      ?>
      <h5 class="text-secondary text-center"><?php echo $rsDatos['nombre']  ?> </h5>
      <h5 class="text-secondary text-center"><?php echo $rsDatos['correo']  ?> </h5>
      <h5 class="text-secondary text-center"><?php echo $rsDatos['usuario']  ?> </h5>
      <?php 
      $sqlRol="SELECT * FROM rol WHERE idrol ='".$_SESSION['rol']."'";
      $rRol=mysqli_query($db,$sqlRol);
      $rsRol=mysqli_fetch_array($rRol);

      ?>
      <h5 class="text-secondary text-center"><?php echo $rsRol['rol'];  ?> </h5>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <p class="text-secondary font-italic font-weight-bold">Sistema de facturación creado en PHP, SQL,CSS,HTML,Ajax,Jquery y javascript con modulos ABML para clientes,usuarios,proveedores y productos.
      Contiene diferentes funcionalidades según el rol de usuario que esta interactuando (Admin,Supervisor,Vendedor).
      El sistema permite generar una factura segun la venta realizada por los diferentes vendedores.Actualmente se encuentran en desarrollo los modulos de proveedores,productos y facturación.El sistema se adapta a dispositivos como smartphones hasta monitores de tamaño medio(Diseño Responsivo)</p>
    </div>
  </div>
  <?php include("includes/footer.php"); ?>

</div>






<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="javascript/funciones.js"></script>
</body>
</html>