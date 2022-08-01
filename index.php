<?php include 'template/header.php' ?>

<?php 
include_once "model/conexion.php";
$sentencia = $bd -> query("select * from persona");
$persona = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      
      <!-- inicio Alerta -->
        <?php 
        include_once "template/alert.php";
        ?>
      <!-- Fin Alerta -->

      <!-- Lista con Update y Delete -->
        <!-- <div class="card">
          <div class="card-header">
            lista de personas
          </div>
          <div class="p-4">
            <table class="table aling-middle">
              <thead>

                

                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Edad</th>
                  <th scope="col">Signo</th>
                  <th scope="col" colspan="2">Opciones</th>
                </tr>

                

              </thead>
              <tbody>
                
                <?php
                  foreach($persona as $dato){                
                ?>

                  <tr>
                    <td scope="row"><?php echo $dato->codigo ?></td>
                    <td> <?php echo $dato->nombre ?></td>
                    <td> <?php echo $dato->edad ?></td>
                    <td><?php echo $dato->signo ?></td>
                    <td ><a class="text-success" href="editar.php?codigo=<?php echo $dato->codigo ?>"><i class="bi bi-pencil-square"></i></a></td>
                    <td ><a onclick="return confirm('¿Estás seguro de eliminar?')" class="text-danger" href="eliminar.php?codigo=<?php echo $dato->codigo ?>"><i class="bi bi-trash3-fill"></i></a></td>
                    
                  </tr>

                <?php
                  }
                ?>

              </tbody>
            </table>
            
          </div>
        </div> -->
      <!--Fin Lista con Update y Delete -->

      <!-- Inicio Buscar -->
        <div class="card">
          <div class="card-header">
            Buscar:
          </div>
          <form class="p-4" action="index.php" method="POST">
            <div class="mb-1">            
              <input type="text" class="form-control" name="buscar" autofocus require>
              <input type="submit" class="btn btn-primary mt-3" value="Buscar">
            </div>          
          </form>
        </div>       
      <!-- Fin Buscar -->
      <!-- mostar resultados -->  
        
          <div class="card mt-3">
              <div class="card-header">
                Resultados
              </div>
              <div class="p-4">
                <table class="table aling-middle">
                  <thead>             

                    <tr>                
                      <th scope="col">Empresa</th>                      
                        
                      
                      <th scope="col">Producto</th>
                      <th scope="col">Cantidad</th>
                      <th scope="col">Fecha</th>
                      <th scope="col">Cortador</th>                
                    </tr>              

                  </thead>
                  <tbody>
                    
                    <?php
                      include 'buscar.php';

                      while($row = mysqli_fetch_array($sql_query)){                
                    ?>

                      <tr>                 
                        <td> <?= $row['empresa'] ?></td>
                        <td> <?= $row['producto'] ?></td>
                        <td> <?= $row['cantidad'] ?></td>
                        <td> <?= $row['fecha'] ?></td>
                        <td> <?= $row['cortador'] ?></td> 
                      </tr>
                    <?php
                      }
                    ?>

                  </tbody>
                </table>
                
              </div>
            </div>
        
      <!-- fin mostrar resultados -->
    </div>
    <div class="col-md-4">
      <!-- Ingresar Datos -->
        <div class="card">
          <div class="card-header">
            ingresar datos:
          </div>
          <form class="p-4" action="registrar.php" method="POST">
            <div class="mb-3">
              <label class="form-label"> Empresa: </label>
              <input type="text" class="form-control" name="txtEmpresa" autofocus require>
            </div>
            <div class="mb-3">
              <label class="form-label">Producto: </label>
              <select class="form-select" name="txtProducto" aria-label="Disabled select example" >
                <option selected>Productos</option>
                <option value="Remeras">Remeras</option>
                <option value="Chombas">Chombas</option>
                <option value="Cargos">Cargos</option>
                <option value="Clásicos">Clásicos</option>
                <option value="Náuticos">Náuticos</option>
                <option value="Buzos">Buzos</option>
                <option value="Campera">Campera </option>
                <option value="CamperaDoble">Campera Doble </option>
                <option value="Campera">Campera </option>
                <option value="Campera Doble">Campera Doble </option>
              </select>
              
            </div>
            <div class="mb-3">
              <label class="form-label"> Cantidad: </label>
              <input type="number" class="form-control" name="Cantidad" autofocus require>
            </div>

            <div class="mb-3">
              <label class="form-label"> Fecha del corte: </label>
              <input type="date" class="form-control" name="FechaCorte" autofocus require>
            </div>
            <div class="mb-3">
              <label class="form-label"> Cortador: </label>
              <input type="text" class="form-control" name="txtCortador" autofocus require>
            </div>
            <div class="d-grid">
              <input type="hidden" name="oculto" value="1">
              <input type="submit" class="btn btn-primary" value="Registrar">
            </div>
          </form>
        </div>
      <!-- Fin Ingresar Datos -->
    </div>
  </div>
</div>

<div class="container mt-5">
  <div class="row justify-content-center">
  <div class="col-md-4">
    <!-- buscador -->
     <!--  <div class="card">
        <div class="card-header">
          Buscar:
        </div>
        <form class="p-4" action="index.php" method="POST">
          <div class="mb-3">            
            <input type="text" class="form-control" name="buscar" autofocus require>
            <input type="submit" class="btn btn-primary mt-3" value="Buscar">
          </div>          
        </form>
      </div> -->
    <!--Fin buscador -->
    </div> 

    <!-- mostar resultados -->  
      <!-- <div class="col-md-7 mb-5">
        <div class="card">
            <div class="card-header">
              Resultados
            </div>
            <div class="p-4">
              <table class="table aling-middle">
                <thead>             

                  <tr>                
                    <th scope="col">Empresa</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Cortador</th>                
                  </tr>              

                </thead>
                <tbody>
                  
                  <?php
                    include 'buscar.php';

                    while($row = mysqli_fetch_array($sql_query)){                
                  ?>

                    <tr>                 
                      <td> <?= $row['empresa'] ?></td>
                      <td> <?= $row['producto'] ?></td>
                      <td> <?= $row['cantidad'] ?></td>
                      <td> <?= $row['fecha'] ?></td> 
                      <td> <?= $row['cortador'] ?></td>  
                    </tr>
                  <?php
                    }
                  ?>

                </tbody>
              </table>
              
            </div>
          </div>
      </div> -->
    <!-- fin mostrar resultados --> 
  </div>
</div>



<!-- fin buscador -->
<?php include 'template/footer.php' ?>

