<html>
<head>
  <title>Fragolan</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>

<div class="row">   	
  <div class="col-md-4"></div>
  <div class="col-md-4">

    <center><h1>MENU DE PRUEBAS</h1></center>

    <form method="POST" action="index.php" >
    
    <center>
      <input type="submit" value="consulta_productos" class="btn btn-success" name="btn1">
      <input type="submit" value="Consultar" class="btn btn-info" name="btn2">
    </center>

  </form>



  <?php

    require 'menu.php';

    if(isset($_POST['btn1']))
    {
      include("consulta_productos.php");

      $doc = $_POST['doc'];
      $nombre = $_POST['nombre'];
      $dir = $_POST['dir'];
      $tel = $_POST['tel'];

      include("cerrar_conexion.php");
      echo "Se insertaron Correctamente";
    }

    if(isset($_POST['btn2']))
    {
      include("abrir_conexion.php");

        $doc = $_POST['doc'];
        if($doc=="") //VERIFICO QUE AGREGEN UN DOCUMENTO OBLIGATORIAMENTE.
          {echo "Digita un documento por favor. (Ej: 123)";}
        else
        {  
          $resultados = mysqli_query($conexion,"SELECT * FROM $tabla_db1 WHERE doc = $doc");
          while($consulta = mysqli_fetch_array($resultados))
          {
            echo 
            "
              <table width=\"100%\" border=\"1\">
                <tr>
                  <td><b><center>Documento</center></b></td>
                  <td><b><center>Nombre</center></b></td>
                  <td><b><center>Direccion</center></b></td>
                  <td><b><center>Telefono</center></b></td>
                </tr>
                <tr>
                  <td>".$consulta['doc']."</td>
                  <td>".$consulta['nombre']."</td>
                  <td>".$consulta['direccion']."</td>
                  <td>".$consulta['telefono']."</td>
                </tr>
              </table>
            ";
          }
        }

      include("cerrar_conexion.php");
    }
  ?>

  </div>
  <div class="col-md-4"></div>
</div>
</body>
</html>