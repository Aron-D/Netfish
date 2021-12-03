<?php

include_once "database/connect.php";

if(isset($_POST['submit'])){

    $sql = $db->prepare("INSERT INTO user (username, email, password, is_admin) VAlUES (:uname, :em, :pword, :ia)");
    $sql->execute([
        ":uname" => $_POST['username'],
        ":em"    => $_POST['email'],
        ":pword" => hash('md5', $_POST['password']),
        ":ia"    => "0"
    ]);

    $_SESSION['loggedin'] = true;

    $id = $db->lastInsertId();

    $_SESSION['user'] = $id;

    $_SESSION['admin'] = "0";

    header("location:index.php");

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="css/style-login.css" rel="stylesheet">
</head>

<body>
<div class="header">
    <a href="index.php" class="logo"><img src="logo/NETFISH_LogoWebsite.jpg" class="logo-img"></a>
  </div>
<div class="form">
    <h2>REGISTER</h2>
<form action="" method="post">

    <label>Username</label>
    <input type="text" name="username" required>
    </br></br>
    <label>password</label>
    <input type="text" name="password" required>
    </br></br>
    <label>Email</label>
    <input type="text" name="email" required>
    </br></br>
    <input type="submit" value="registeren" name="submit">

    <a class="custom-btn btn" href="login.php">Terug</a>

</form>
</div>
<?php include_once "footer.html"; ?>