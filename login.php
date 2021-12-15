<?php

include_once "database/connect.php";

if (isset($_POST['submit'])) {

    $checkUsers =
        "SELECT
        *
    FROM
        user
    WHERE
        username = :username
    AND
        password = :password";
    $userStmt = $db->prepare($checkUsers);
    $userStmt->execute(array(
        ':username' => $_POST['username'],
        ':password' => hash('md5', $_POST['password'])
    ));
    $user = $userStmt->fetch(PDO::FETCH_ASSOC);

    if ($user >= 1) {
        $_SESSION['user'] = $user['id'];
        $_SESSION['admin'] = $user['is_admin'];

        //pagina waar naartoe nadat er succesvol is ingelogd
        header('Location: index.php');
        // die;
    } else {
        echo "uw wachtwoord of gebruikersnaam is incorrect!";
    }
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
        <h2>LOGIN</h2>
        <form action="" method="post">

            <label>Username</label>
            <input type="text" name="username" required>
            <br><br>
            <label>Password</label>
            <input type="text" name="password" required>

            <input type="submit" value="inloggen" name="submit">

            <a class="custom-btn btn" href="edit_account.php">Wachtwoord vergeten?</a>
            <a class="custom-btn btn" href="register.php">Registreren</a>

        </form>
    </div>


    <?php include_once "footer.html"; ?>