<?php

include_once "database/connect.php";
include_once "header.php";

if(empty($_SESSION['user'])) {

header("location:login.php");

}else {

    echo "<div class='text'>";
    echo "Gebruikers ID:&nbsp" .$_SESSION['user'];
    echo "<br><br>";
    echo "ADMIN:&nbsp" .$_SESSION['admin'];

    echo "</div>";
}
?>