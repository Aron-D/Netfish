<?php

$klantId = $conn->lastInsertId(); 
$conn->commit();

date("M j, Y", strtotime($v->reservation_date));
//dat is datum

date("g:i", strtotime($v->reservation_time));
//dit is voor tijd

$originalDate = $_POST['datepicker'];$newDate = date("Y-m-d", strtotime($originalDate)); // SQL query $sql = "SELECT * FROM checkdate WHERE DATE(createdat) = '$newDate'";

?>