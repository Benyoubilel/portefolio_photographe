<?php session_start();
include('dbConfig.php');
$errors   = array();
if (isset($_POST['submit'])) {
    $email =valid_donnees( $_POST['username']);
    $pass = valid_donnees($_POST['password']);
    if (empty($email)) {
        array_push($errors, "Email required");
    }
    //verification du mot de passe 
    if (empty($pass)) {
        array_push($errors, "Password required");
    }
    $pass=md5($pass);
    $sql = "SELECT * FROM user where  `login` = '$email' and `password` = '$pass' ";
    $sth = $dbh->query($sql);
    $user=$sth->fetch();
   

    if ($sth->rowCount() == 1) // nom d'utilisateur et mot de passe correctes
    {
        $_SESSION['login'] = $user['login'];
        header('Location: accueil.php');
    } else // mot de passe ou nom utilisateur incorrect 
    {
        header('Location: Admin.php');
        array_push($errors, "Email ou Mot de passe incorrect");
    }

}
function valid_donnees($donnees){
    $donnees = trim($donnees);
    $donnees = stripslashes($donnees);
    $donnees = htmlspecialchars($donnees);
    return $donnees;
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/icons8-camera-50.ico"/>
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="login-dark">
        <form method="post" action="Admin.php"><h2 align="center" >Login</h2>
            <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
            <div class="form-group"><input class="form-control" type="text" name="username" placeholder="username"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="submit">Log In</button></div>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>