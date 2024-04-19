
<?php 
if(!isset($_POST['search'])) exit('No se recibió el valor a buscar');

require_once 'conexion.php';

function search() {

  $mysqli = getConnexion();
  $search = $mysqli->real_escape_string($_POST['search']);
  
  $sql = "SELECT id_syscom FROM plataforma_ventas_temp WHERE id_syscom LIKE '%$search%' ";
  $res = $mysqli->query($sql);

  
  
      while ($row = $res->fetch_array(MYSQLI_ASSOC)) {

        if ( $row["id_syscom"]  ==  $search  ){

          echo "<p>$row[id_syscom] </p>";

        }

      }
    
}

search();