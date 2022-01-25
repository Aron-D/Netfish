<?php

include_once "database/connect.php";
include_once "header.php";
include_once "function.php";


if (isset($_GET['action'])) {


switch ($_GET['action']) {
    case 'add':
        
        add();

        break;

    case 'delete':
        
        dell($_GET['id']);

        header("location:beheer.php");

            break;

    case 'edit':
        
        edit($_GET['id']);

        // header("location:beheer.php");
        
        return;
            break;
    
    default:
        exit("<div class='txthome'> it broke?!.</div> <a href='index.php'>Go back...</a>");
        break;
}
}

?>