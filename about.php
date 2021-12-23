<?php

include_once "database/connect.php";

include_once "header.php";

if(isset($_GET['id'])) {

 $sql = $db->prepare("SELECT * FROM movie WHERE id = '".$_GET['id']."' ");
 $sql->execute();
 $info = $sql->fetch(PDO::FETCH_ASSOC);

  echo "<div class='title'>".$info['title']."</div><br>";
  echo "<div class='flexcont'><iframe width='420' height='345' src='".$info['url']."'>
    </iframe>";
  echo "<div><h5>Publicatiedatum</h5>".$info['year']."</div>";
  echo "<div><h2>Beschrijving</h2>".$info['description']."</div>";
  echo "</div>";


}

?>
