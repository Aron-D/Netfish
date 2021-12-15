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

        $stmt = $db->prepare("SELECT f.user_id, f.movie_id, m.id, m.image FROM favorites as f, movie as m, user as u WHERE ... = '$id'");
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



// }
?>