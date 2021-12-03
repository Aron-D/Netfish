<?php

include_once "database/connect.php";

session_destroy();

header("location:login.php");

exit;
?>