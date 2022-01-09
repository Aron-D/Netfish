<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>

<body>
<div class="header">
    <a href="index.php" class="logo"><img src="logo/NETFISH_LogoWebsite.jpg" class="logo-img"></a>
    <div class="header-right">
      <?php
      if($_SESSION['admin'] == "0")
      {
      echo  "<a href='account.php'>Account</a>";
      echo  "<a href='logout.php'>Logout</a>";
      }elseif($_SESSION['admin'] == "1") {
        echo  "<a href='beheer.php'>Beheer</a>";
        echo  "<a href='account.php'>Account</a>";
        echo  "<a href='logout.php'>Logout</a>";

      }
      ?>
    </div>
  </div>
