<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Intermedio</title>
  </head>
  <body>
    <!-- Image Map Generated by http://www.image-map.net/ -->
    <div class="" align="center">


<img src="consultasymarcar.jpg" usemap="#image-map">

<map name="image-map">
    <area target="" alt="" title="" href="" coords="216,19,228,22,242,24,255,27,266,27,279,30,288,34,299,39,309,42,317,47,328,51,337,58,344,65,354,73,362,85,368,101,367,117,361,132,350,147,339,156,327,163,306,172,281,183,268,186,248,190,227,193,212,194,196,194,180,194,170,194,159,192,159,181,158,169,158,158,159,144,166,129,168,119,174,109,184,97,192,88,198,80,206,66,210,56,212,43,211,30" shape="poly">
    <area target="" alt="" title="" href="marcar.php?destino=<?php echo $_GET['destino']?>" coords="211,20,198,20,175,18,160,20,135,27,120,28,102,32,84,38,69,44,52,56,37,68,22,84,16,99,16,122,25,139,39,155,52,162,71,174,88,177,103,183,116,186,130,190,151,194,160,192,158,175,157,159,159,141,165,125,170,115,180,104,190,88,199,77,209,58,213,41" shape="poly">
</map>
  </div>
    <?php
    session_start();
    $servername = "localhost";
    $user = "root";
    $password = "";
    $dbname = "distritos";
    $conn = new mysqli($servername, $user,$password, $dbname);
    // Check connection

    $sql = "SELECT mapa.id, mapa.nombre, quejas.tipo, quejas.sexo, quejas.descripcion, quejas.x, quejas.y FROM mapa
JOIN quejas ON mapa.Id = quejas.idDistrito
WHERE mapa.nombre='".$_GET['destino']."'";
    $result = $conn->query($sql);
      if ($result->num_rows > 0) {
          echo "Quejas:";
          while($row = $result->fetch_assoc()) {
            echo "Distrito: ".$row['nombre']."</br>";
            echo "Tipo: ".$row['tipo']."</br>";
            echo "Sexo: ".$row['sexo']."</br>";
            echo "Cordenada X: ".$row['x']."</br>";
            echo "Cordenada Y: ".$row['y']."</br>";
            echo "Descripcion: ".$row['descripcion']."</br>";
            echo "</br>";
          }
        } else {
          echo "0 results";
  }
  
    $_SESSION['distrito'] = $_GET['destino'];




$conn->close();

     ?>
  </body>
</html>