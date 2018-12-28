
<?php 

session_start();

if(empty($_SESSION['active'])){
  header('location:login.php');
}
?>
<nav>
  <div class="bg-info">
    <div class="row">
      <div class="col-xs-12 col-md-10">
        <h4 class="text-white mt-1 ml-1 font-weight-bold">Sistema de facturacion</h4>
      </div>

      <div class="col-xs-12 col-md-2 mt-md-2">

        <img src="img/cara.jpg" width="30" height="30" class="d-inline-block align-top rounded" alt="">
        <span class="text-white text-md-left">Nombre y Apellido</span>

      </div> 
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Usuarios
          </a>
          <div class="dropdown-menu bg-primary" aria-labelledby="navbarDropdown">
            <div class="nav-item">
              <a class="nav-link" href="usuario.php">Agregar Usuario</a>
            </div>
            <div class="nav-item">
              <a class="nav-link" href="listausuarios">Lista de Usuarios</a>
            </div>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Clientes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Proveedores</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Productos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="facturas.php">Facturas</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Opciones
          </a>
          <div class="dropdown-menu bg-primary" aria-labelledby="navbarDropdown">
            <div class="nav-item">
              <a class="nav-link" href="#">Action</a>
            </div>
            <div class="nav-item">
              <a class="nav-link" href="#">Another action</a>
            </div>
            <div class="dropdown-divider"></div>
            <div class="nav-item">
              <a class="nav-link" href="salir.php">Cerrar Sesión</a>
            </div>
          </div>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
      </form>

    </div>
  </div>
</nav>