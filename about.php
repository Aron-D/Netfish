<?php

include_once "database/connect.php";

include_once "header.php";

if(isset($_GET['id'])) {

 $sql = $db->prepare("SELECT * FROM movie WHERE id = ".$_GET['id']." ");
 $sql->execute();
 $info = $sql->fetch(PDO::FETCH_ASSOC);

  $A = "<div class='title'>".$info['title']."</div><br>";
  $A .= "<div class='flexcont'><iframe width='420' height='345' src='".$info['url']."'>
    </iframe>";
  $A .= "<div><h5>Publicatiedatum</h5>".$info['year']."<br><br><form method='post' action=''><input class='bn3637 bn38' type='submit' name='submit' value='Toevoegen in lijst'></form></div>";
  $A .= "<div><h2>Beschrijving</h2>".$info['description']."</div>";
  $A .= "</div>";

  echo $A;
 
if(isset($_POST['submit'])){

    $sql = $db->prepare("INSERT INTO favorites (user_id, movie_id) VALUES (:id, :movie)");
    $sql->bindParam(':id', $_SESSION['user']);
    $sql->bindParam(':movie', $_GET['id']);

    $sql->execute();
    header("location:index.php");
  }
}

// if(isset($_GET['id'])) {

//   $sql = $db->prepare("SELECT * FROM movie WHERE id = ".$_GET['id']." ");
//   $sql->execute();
//   $info = $sql->fetch(PDO::FETCH_ASSOC);
 
//    $A = "<div class='title'>".$info['title']."</div><br>";
//    $A .= "<div class='flexcont'><iframe width='420' height='345' src='".$info['url']."'>
//      </iframe>";
//    $A .= "<div><h5>Publicatiedatum</h5>".$info['year']."<br><br><form method='post' action=''><input class='bn3637 bn38' type='submit' name='submit2' value='Verwijderen uit lijst'></form></div>";
//    $A .= "<div><h2>Beschrijving</h2>".$info['description']."</div>";
//    $A .= "</div>";
 
//    echo $A;

//    if(isset($_POST['submit'])){


//  }
// }
?>
