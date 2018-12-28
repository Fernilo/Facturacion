<?php 
include("includes/conexion.php");

?>
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="styles/style.css">
  <title>Lista de Usuarios</title>
</head>
<body>
  <div class="container-fluid">
   <div class="">

     <?php include("includes/header.php"); ?>
     <div class="row">
       <div class="col-12">
        <h2 class="text-secondary d-inline-block">Lista de Usuarios</h2>
        <a href="usuario.php" class="d-inline-block ml-1 btn btn-primary">Agregar Usuario</a>
        <hr>
      </div>
    </div>
    <div class="row" id="table">
      <div class="col-12">
        <table class="table table-striped table-dark table-hover">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nombre</th>
              <th scope="col">Correo</th>
              <th scope="col">Usuario</th>
              <th scope="col" class="">Rol</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>
          <?php 
          $sqlLista="SELECT * FROM usuario u INNER JOIN rol r ON u.rol= r.idrol WHERE estatus=1";
          $rLista=mysqli_query($db,$sqlLista);
          $rowsLista=mysqli_num_rows($rLista);
          if($rowsLista >0){
            while ($rsLista=mysqli_fetch_array($rLista)){
        
          ?>
              <tbody>
                <tr>
                  <th scope="row"><?php echo $rsLista['idusuario'] ?></th>
                  <td><?php echo $rsLista['nombre'] ?></td>
                  <td><?php echo $rsLista['correo'] ?></td>
                  <td><?php echo $rsLista['usuario'] ?></td>
                  <td><?php echo $rsLista['rol'] ?></td>
                  <td>
                    <a href="editar-usuarios.php?id=<?php echo $rsLista['idusuario'] ?>" class="text-info">Editar</a>
                    <?php 
                    //debe haber un super admin
                    if($rsLista['idusuario']!=1){
                    ?>

                    |
                    <a href="eliminar-usuarios.php?id=<?php echo $rsLista['idusuario'] ?>" class="text-danger">Eliminar</a>
                    <?php } ?> 

                  </td>
                </tr>
              </tbody>
          <?php 
            }
          }
        
          ?>
        </table>
      </div>
    </div>
    <?php include("includes/footer.php"); ?>

  </div>

</div>





<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="javascript/funciones.js"></script>
</body>
</html>