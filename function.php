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

            $b  = "<h1 class='txthome'>Mijn lijst</h1>";
            $b .= "<div class='box'>";
            $b .= "<div class='location'>
            <a href='about.php?id=".$row['movie_id']."''>
            <img src='".$row['image']."'>
            </a>";
            $b .= "</div><form method='post' action=''><input class='bn3637 bn38' type='submit' name='submit' value='verwijder uit lijst'></form>";
            $b .= "</div>";
            echo $b;
        

        if(isset($_POST['submit'])) {

            $sql = $db->prepare("DELETE FROM favorites WHERE movie_id = ".$row['movie_id']."");
            $sql->execute();
            return;
        }
    }
    }

    function dell($id) {

    global $db;

    $sql = $db->prepare("DELETE FROM movie WHERE id = ".$id."");
        $sql->execute();
        
        return;

        header("location:beheer.php");
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



        function add() {

            global $db;

            $c  = "<div class='middle'>";
            $c .= "<div class='title'>Film/Serie toevoegen</div><br><br>";
            $c .= "<form method='post' action=''>";
            $c .= "<label>Titel movie/serie:</label> <input type='text' name='title'><br><br>";
            $c .= "<label>Selecteer categorie: </label><select name='cat'>
                    <option value='' selected>--- Kies een genre ---</option>
                    <option value='new'>New on Netfish</option>
                    <option value='original'>Netfish Originals</option>
                    <option value='action'>Action & Adventure</option>
                    <option value='scifi'>Science Fiction</option>
                    <option value='comedy'>Comedy</option>
                    <option value='horror'>Horror</option>
                    </select><br><br>";
            $c .= "<label>URL voorbladfoto van uw movie/serie: </label><input type='text' name='img'><br><br>";
            $c .= "<label>URL trailerfilm/serie: </label><input type='txt' name='url' placeholder='https://www.youtube.com/watch?v=voK-qANQGhE'><br><br>";
            $c .= "<label>Jaar publicatie film/serie: </label><input type='text' name='yr'><br><br>";
            $c .= "<label>Korte omschrijving van film/serie: </label><textarea name='desc' rows='4' cols='50'></textarea><br><br>";
            $c .= "<input class='bn3638 bn39' type='submit' name='submit' value='Publiceren'>";

            echo $c;

            if(isset($_POST['submit'])) {

            $sql = $db->prepare("INSERT INTO movie (title, category,  image, url, year, description) 
                                 VALUES (:ti, :cy, :ig, :ul, :yr, :dn)");
            $sql->execute([
                ':ti' => $_POST['title'],
                ':cy' => $_POST['cat'],
                ':ig' => $_POST['img'],
                ':ul' => $_POST['url'],
                ':yr' => $_POST['yr'],
                ':dn' => $_POST['desc']]);
        
                header("location:index.php");
            }
    }

    function delete($movid) {

        global $db;

        $sql = $db->prepare("DELETE FROM movie WHERE id = ".$movid."");
        $sql->execute();

    }

    function edit($movid) {

        global $db;
        global $key;

        $sql = $db->prepare("SELECT * FROM movie WHERE id = ".$movid."");
        $sql->execute();
        $data = $sql->fetchAll();

        foreach($data as $key => $row) {

        $d  = "<div class='middle'>";
        $d .= "<div class='title'>Film/Serie Wijzigen</div><br><br>";
        $d .= "<form method='post' action=''>";
        $d .= "<label>Titel movie/serie: </label> <input type='text' name='title' value='".$row['title']."'><br><br>";
        $d .= "<label>Selecteer categorie: |<b>".$row['category']."</b>| </label><select name='cat'>
               <option value='' selected>--- Kies een genre ---</option>
               <option value='new'>New on Netfish</option>
               <option value='original'>Netfish Originals</option>
               <option value='action'>Action & Adventure</option>
               <option value='scifi'>Science Fiction</option>
               <option value='comedy'>Comedy</option>
               <option value='horror'>Horror</option>
               </select><br><br>";
        $d .= "<label>URL voorbladfoto van uw movie/serie: </label><input type='text' name='img' value='".$row['image']."'><br><br>";
        $d .= "<label>URL trailerfilm/serie: </label><input type='txt' name='url' value='".$row['url']."'><br><br>";
        $d .= "<label>Jaar publicatie film/serie: </label><input type='text' name='yr' value='".$row['year']."'><br><br>";
        $d .= "<label>Korte omschrijving van film/serie: </label><textarea name='desc' rows='4' cols='50'>".$row['description']."</textarea><br><br>";
        $d .= "<input class='bn3638 bn39' type='submit' name='submit' value='Wijzig'>";

        echo $d;

    }

            if(isset($_POST['submit'])) {

                // $sql = $db->prepare("UPDATE movie 
                // SET title = ".$row['title'].", category = ".$row['category'].", image = ".$row['image'].", 
                // url = ".$row['url'].", year = ".$row['year'].", description = ".$row['description']."
                // WHERE id = ".$movid."");

                $sql = $db->prepare("UPDATE movie 
                SET title = :ti, category = :ca, image = :im, 
                url = :ul, year = :yr, description = :ds
                WHERE id = ".$movid."");

                // $sql->bindParam('ti', );
                // $sql->bindParam('', );
                // $sql->bindParam('', );
                // $sql->bindParam('', );
                // $sql->bindParam('', );
                // $sql->bindParam('', );

                 $sql->execute([
                    ':ti' => $row['title'],
                    ':ca' => $row['category'],
                    ':im' => $row['image'],
                    ':ul' => $row['url'],
                    ':yr' => $row['year'],
                    ':ds' => $row['description']
                ]);

                // $sql->execute();

                // header("location:beheer.php");

                // $sql = $db->prepare("UPDATE movie 
                // SET title = :ti, category = :ca, image = :im, 
                // url = :ul, year = :yr, description = :ds
                // WHERE id = ".$movid."");



            }

    }



?>