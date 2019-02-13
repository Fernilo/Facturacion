<?php 
if(empty($_SESSION['active'])){
  header('location:index.php');
}
?>
  <div class="bg-info">
      <div class="row">
        <div class="col-xs-12 col-md-8">
          <h4 class="text-white mt-1 ml-1 font-weight-bold">Sistema de facturacion</h4>
        </div>

        <div class="col-xs-12 col-md-4 mt-md-2">

          <img src="img/cara.jpg" width="30" height="30" class="d-inline-block align-top rounded" alt="">
          <?php $sqlDatos="SELECT * FROM usuario WHERE idusuario='".$_SESSION['idUser']."'";
         
            $rDatos=mysqli_query($db,$sqlDatos);
            
            $rsDatos=mysqli_fetch_array($rDatos);


           ?>
          <span class="text-white text-md-left"><?php echo $rsDatos['nombre'].' -'.$_SESSION['rol']; ?></span>

        </div> 
      </div>
  </div>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="sistema.php"><i class="fas fa-home"></i> Home<span class="sr-only">(current)</span></a>
              </li>
              
              <?php 
                if($_SESSION['rol'] == 1){


               ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-users"></i>
                  Usuarios
                </a>
                <div class="dropdown-menu bg-primary" aria-labelledby="navbarDropdown">
                  <div class="nav-item">
                    <a class="nav-link" href="usuario.php"><i class="fas fa-user-plus"></i> Agregar Usuario</a>
                  </div>
                  <div class="nav-item">
                    <a class="nav-link" href="listausuarios.php"><i class="fas fa-users"></i> Lista Usuarios</a>
                  </div>
                </div>
              </li>
              <?php 
                
                }

               ?>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-user-tie"></i> Clientes
                </a>
                <div class="dropdown-menu bg-primary" aria-labelledby="navbarDropdown">
                  <div class="nav-item">
                    <a class="nav-link" href="agregar-cliente.php"><i class="fas fa-user-plus"></i> Agregar Cliente</a>
                  </div>
                  <div class="nav-item">
                    <a class="nav-link" href="lista-clientes.php"><i class="fas fa-users"></i> Lista Clientes</a>
                  </div>
                </div>
              </li>
              <?php 
                if($_SESSION['rol'] == 1 || $_SESSION['rol']== 2 ){


               ?>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="far fa-building"></i> Proveedores
                </a>
                <div class="dropdown-menu bg-primary" aria-labelledby="navbarDropdown">
                  <div class="nav-item">
                    <a class="nav-link" href="agregar-proveedor.php"><i class="far fa-building"></i> Agregar Prove.</a>
                  </div>
                  <div class="nav-item">
                    <a class="nav-link" href="lista-proveedores.php"><i class="fas fa-users"></i> Lista Prove.</a>
                  </div>
                </div>
              </li>
              <?php 
                
                }

               ?>
              
              <li class="nav-item">
                <a class="nav-link" href="#">Productos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="facturas.php">Facturas</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-tools"></i> 
                  Opciones
                </a>
                <div class="dropdown-menu bg-primary" aria-labelledby="navbarDropdown">
                  <div class="nav-item">
                    <a class="nav-link" href="#">Action</a>
                  </div>
                  <div class="nav-item">
                    <a class="nav-link" href="editar-misdatos.php?id=<?php echo $_SESSION['idUser']; ?>"><i class="fas fa-edit"></i> Editar mis datos</a>
                  </div>
                  <div class="dropdown-divider"></div>
                  <div class="nav-item">
                    <a class="nav-link" href="salir.php"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
                  </div>
                </div>
              </li>
            </ul>
           
        </div>
  </nav>