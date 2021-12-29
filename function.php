<?php

include_once "header.php";
include_once "database/connect.php";

// class CRUD {

//     public $db;
//     public $stmt;


    function read($cat) { //to read out all the movies that are contained in the movie table.
                          // the $cat can be used to sort the movies based on categories.

        global $db;
        global $key;

        $stmt = $db->prepare("SELECT * FROM movie WHERE category = '$cat'");
        $stmt->execute();
        $data = $stmt->fetchAll();

        foreach($data as $key => $row) {

            $a = "<div class='location'>
            <a href='about.php?id=".$row['id']."''>
            <img src='".$row['image']."'>
            </a>";
            $a .= "</div>";
            echo $a;
        }
    }

    function readfav($id) { //to read out all the movies that are contained in the movie table.
        // the $cat can be used to sort the movies based on categories.

        global $db;
        global $key;

        // $stmt = $db->prepare("SELECT f.user_id, f.movie_id, m.id, m.image FROM favorites 
        // as f, movie as m, user as u 
        // WHERE f.user_id = '$id'
        // INNER JOIN user ON f.user_id = u.id
        // INNER JOIN movie ON f.movie_id = m.id");

        $stmt = $db->prepare("SELECT movie_id, user_id, image 
        FROM favorites f
        INNER JOIN user u ON u.id = f.user_id
        INNER JOIN movie m ON m.id = f.movie_id
        WHERE user_id = $id");
        $stmt->execute();
        $data = $stmt->fetchAll();

        foreach($data as $key => $row) {

            $a = "<div class='location'>
            <a href='about.php?id=".$row['movie_id']."''>
            <img src='".$row['image']."'>
            </a>";
            $a .= "</div>";
            echo $a;
        }
    }

    // function addwish($idWish) {

    //     global $db;

    //     $b = "<form type='post' action='function.php'><input class='bn3637 bn38' type='submit' name='submit' value='Toevoegen in lijst'></form>";

    //     echo $b;

    //     if(isset($_POST['submit'])){

    //         $sql = $db->prepare("INSERT INTO favorites (user_id, movie_id) VALUES (".$idWish.",".$_SESSION['user'].") ");
    //         $sql->execute();
    //         header("location:index.php");
    //       }
    // }
// }
?>