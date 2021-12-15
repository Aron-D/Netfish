<?php

include_once "database/connect.php";
include_once "header.php";

if(empty($_SESSION['user'])) {

    header("location:login.php");
    
    }else {

$checkAcc = $db->prepare("SELECT * FROM user WHERE id = '".$_SESSION['user']."'");
$checkAcc->execute();
$data = $checkAcc->fetchAll();

foreach($data as $key=> $row): ?>

<div class="content"><b>E-mail:</b> <?=$row['email'];?><br>
<b>Gebruikersnaam:</b> <?=$row['username'];?><br>

<?php
endforeach;

}

 