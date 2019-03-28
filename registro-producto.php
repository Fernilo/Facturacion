  <?php
  session_start(); 
  if($_SESSION['rol'] !=1 and $_SESSION['rol'] !=2 ){
    header("location:sistema.php");
  }

  include("includes/conexion.php");
  if(!empty($_POST))
  {
      /*$alert='';
      if(empty($_POST['nombre']) || empty($_POST['email']) || empty($_POST['usuario']) ||empty($_POST['clave']) || empty($_POST['rol']) ){
        
      }else{*/

       /* print_r($_FILES); Verifico los archivos enviados y salgo con exit
        exit;*/
        $proveedor=$_POST['proveedor'];
        $producto=$_POST['producto'];
        $precio=$_POST['precio'];
        $cantidad=$_POST['cantidad'];
        $idusuario=$_SESSION['idUser'];
        $foto=$_FILES['imagen'];
        $nombre_foto=$foto['name'];

        $destino="img/uploads/defecto.jpg";

        if($nombre_foto != ''){
          $carpeta = "img/uploads/";
          $destino = $carpeta . $_FILES['imagen']['name'];  
          move_uploaded_file($_FILES['imagen']['tmp_name'],$destino) ;
        }
        
       
        


        

          $sqlInsertar="INSERT INTO producto(proveedor,descripcion,precio,existencia,usuario_id,foto) VALUES('$proveedor','$producto',$precio,$cantidad,$idusuario,'$destino')";
         
          $rInsertar=mysqli_query($db,$sqlInsertar);

          
          
          if($rInsertar){
            echo "save";exit();
          }else{
            echo "errorDatos";exit();
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
        <title>Registro Producto</title>
      </head>
      <body>
        <div class="container-fluid">
          <?php include("includes/header.php"); ?>
          <div class="row">
           <div class="col-12">
            <h2 class="text-secondary"><i class="fas fa-tv"></i> Registro de Productos</h2>
            <hr>
            </div>
          </div>
          <div id="loader"></div>
          <div class="row">
            <div class="col-12 col-md-4 offset-md-4">
              <div id="alerta"></div>
            </div>
          </div>
        
          <div class="row">
            <div class="col-12 form_register col-md-4  bg-dark">
              <form  action="" method="post" id="form_agregar_producto" enctype="multipart/form-data" >
                   <h5 class="text-center text-info">Formulario</h5>
                   <div class="col-xs-4 form-group">
                     <label for="nombre" class="text-white">Proveedor</label>
                     <?php 
                        $SqlSelect="SELECT codproveedor,proveedor  FROM proveedor WHERE estatus=1 ORDER BY proveedor";
                        $rselect=mysqli_query($db,$SqlSelect);
                        $r_proveedor=mysqli_num_rows($rselect);

                        mysqli_close($db);
                        

                       

                      ?>
                     <select name="proveedor" id="proveedor" class="form-control">
                      <?php 
                        if($r_proveedor>0){
                        
                          while($rsSelect=mysqli_fetch_array($rselect)){
                       ?>
                       <option value=" <?php echo $rsSelect['codproveedor']  ?>"><?php echo $rsSelect['proveedor']  ?></option>
                     
                     <?php 
                        }
                      }
                      ?>
                      </select>
                   </div>
                   <div class="form-group">
                     <label for="producto" class="text-white">Producto</label>
                     <input type="text" class="form-control" id="producto" name="producto" placeholder="Nombre del producto" value="" >
                   </div>
                   <div class="form-group">
                      <label for="precio" class="text-white">Precio</label>
                      <input type="number" class="form-control" id="precio" placeholder="Precio del producto" name="precio">
                   </div>
                   <div class="form-group">
                     <label for="cantidad" class="text-white">Cantidad</label>
                     <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="Cantidad del producto">
                   </div>
                   <div class="photo">
                      <label for="imagen" class="text-white">Imagen</label>
                      <div class="prevPhoto">
                        <span class="delPhoto notBlock">X</span>
                        <label for="imagen"></label>
                      </div>
                      <div class="upimg">
                        <input type="file" name="imagen" id="imagen">
                      </div>
                      <div id="form_alert"></div>
                    </div>
            
                   <button class="btn btn-primary btn-lg btn-block mt-2 mb-3" id="submit_agregar_producto" type="submit"><i class="fas fa-save"></i> Enviar formulario</button>
            
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