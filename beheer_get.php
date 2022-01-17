<?php

include_once "database/connect.php";
include_once "header.php";
include_once "function.php";


if (isset($_GET['action']) && isset($_GET['id'])) {

    $_GET['action'] = $action;
    $_GET['id'] = $id;

switch ($action) {
    case 'add':
        
        add();

        break;

    case 'delete':
        
        dell($_GET['id']);

            break;

    case 'edit':
        


                break;
    
    default:
        exit("<div class='txthome'> it broke?!.</div> <a href='index.php'>Go back...</a>");
        break;
}
}

?>