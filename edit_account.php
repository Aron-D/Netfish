<?php

include_once "database/connect.php";

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
    <h2>Wachtwoord vergeten</h2>
<form action="" method="post">

    <label>Uw email</label>
    <input type="text" name="email" required>

    <input type="submit" value="volgende" name="submit">

    <a class="custom-btn btn" href="login.php">Terug</a>

</form>
</div>


<?php

if(isset($_POST['submit'])) {

    $account = $db->prepare("SELECT * FROM user WHERE email = '".$_POST['email']."'");
    $account->execute();
    $data = $account->fetch(PDO::FETCH_ASSOC);

    $_SESSION['email'] = $data['email'];
    
    if($data >= 1){
        echo "<div class='txt'><form action='' method='post'><input type='text' name='pass' placeholder='Please type new passw' required>
        <input type='submit' name='change' value='Aanpassen'></div>";
    }else {
        echo "<div class='txt'>uw email is niet geldig in ons systeem. Registreer<a href='register.php'>hier</a></div>";
    }
    }

if(isset($_POST['change'])) {

    $edit = $db->prepare("UPDATE user SET password = :pw WHERE email = :em");
    $edit->execute([
        ':pw' => hash('md5', $_POST['pass']),
        ':em' => $_SESSION['email']
]);

    echo "<div class='txt'>Uw wachtwoord is met succes aangepast! log <a href='login.php'>hier</a> opnieuw in.</div>";
    session_destroy();
}

include_once "footer.html"; ?>