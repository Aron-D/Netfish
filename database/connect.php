<?php

include_once "db.php";

session_start();

try {
    $db = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
    throw new PDOException($e->getMessage(), (int) $e->getCode());
  }
  ?>