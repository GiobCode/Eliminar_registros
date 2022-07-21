?php    
    include("conexion_bs.php");
    include("eliminar_habitacion.php");
    $miConsulta = $miPDO->prepare('SELECT * FROM habitaciones;');
    $miConsulta->execute()
?>

<!DOCTYPE html>
<html lang="en">
 <head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Registro de habitaciones Hotel samaros</title>
 <link rel="stylesheet" href="bootstrap.min.css">
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

 <style>

    body
    {
    background:#E3DAC9;
    color:black;
    }
    tr:hover
    {
      background-color:white;
      color:black;
    }
    #boton1{background-image: url("https://www.flaticon.es/svg/vstatic/svg/3917/3917034.svg?token=exp=1656644382~hmac=882913a546a3350cb5f55605ccefc207");
    }

 </style>
  </head>

    <body>
  
  <?php include('barra.php'); ?>


  <!--
  <form
  style =
  "
  width: 60%;
  padding: 30px;
  margin: auto;
  margin-top: 100px;
  border-radius: 4px;
  font-family: 'calibri';
  color: black;
  background:white;
  box-shadow: 7px 13px 37px #A06D9E;
  "
  method = "POST"
  action="habitaciones_nv.php">
  
 
 <div class="form-group" style = "font-size:40px;">  
       <img src="icon.jpg" alt="" width="100" height="100" class="d-inline-block align-text-top"><h2 style ="text-align: center;">Registro habitacion</h2>
  </div>

  <div class="form-group">
     <div class="form-group">
        <label for="id">id de la habitacion:</label>
        <input type="text" class="form-control" name ="id">
    </div>
    <br>

    <label for="tipo_h">Tipo habitacion:</label>
    <select style="background: white;" id="tipo_h" class="form-control" name ="tipo">
        <option selected >Siut</option>
        <option>Doble</option>
        <option>Triple</option>
    </select>
  </div>
  <br>
 
 </div>


 <div class="form-group">
    <textarea class ="form-control " style="background: white; color:black;" name="descripcion" rows="5" cols="35" name ="descripcion_h">Descripcion</textarea>
 </div>

  <br>
 <div class="form-group">
    <label for="precio">precio :</label>
    <input type="text" class="form-control" name="precio">
  </div>
  <br>
  <div class="form-group">
    <label for="cant">cantidad de habitaciones :</label>
    <input type="text" class="form-control" name="cantidad">
  </div>
 <hr>


  <button style =
  "
  width: 100%;
  background:black;
  border: none;
  padding: 12px;
  color: white;
  margin: 16px 0;
  font-size: 16px;
  " 
  type="submit" class="btn btn-default">Registrar</button>
</form>

-->

<hr>
<section  class ="container" style ="padding: 20px;">
 <div class="table-responsive">
  <table class="table table-bordered" style="background:black; color:white;  border-color:white; border-radius: 30px;">
    <thead style ="background:#000000; color:white;">
      <th scope ="col" style ="color:green;">ID</th>
      <th scope ="col" style ="color:blue;">Tipo</th>
      <th scope ="col" style ="color:blue;">Descripcion</th>
      <th scope ="col" style ="color:blue;">Precio</th>
      <th scope ="col" style ="color:blue;">Cantidad disponible</th>
      <th scope ="col" style ="color:blue;">Servicios</th>
      <th scope ="col" style ="color:blue;"></th>
    </thead>

    <tbody>
    <?php foreach ($miConsulta as $clave => $valor): ?> 
    <tr>
       <th scope ="row" style ="color:#11B2E6;"><?= $valor['id_habitacion']; ?></th>
       <td><?= $valor['tipo']; ?></td>
       <td><?= $valor['descripcion']; ?></td>
       <td>$<?= $valor['precio']; ?></td>
       <td><?= $valor['cantidad']; ?></td>

       <td> <?php
             $id = $valor['id_habitacion'];
             $servicios = $miPDO->prepare("SELECT *FROM servicios where id_habitacion = '$id';");
             $servicios ->execute();
             ?>
             <?php foreach ($servicios as $clave => $valor1): ?>
                <li><?=$valor1['nombre']?></li>
             <?php endforeach; ?>
      </td>

      <td> 
       <?php  
       $a = $valor['id_habitacion']; 
       echo "<a href='eliminar_habitacion.php?search=$a' class=btn btn-default style = background:red;color:white; >Eliminar</a>";
       ?>
      </td> 

    </tr>
    <?php endforeach; ?>
    </tbody> 

 </table>
</div>
</section>

   </body>

</html>
