<?php session_start();
include('dbConfig.php');
if (!isset($_SESSION) || !isset($_SESSION['login']))
{
    header('Location: /Admin.php', true, 302);
    die();
}
//compter le nombre de messages recu
$sql='select * from contacter';
$sth=$dbh->query($sql);
$result= $sth->fetchAll(PDO::FETCH_BOTH);




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/icons8-camera-50.ico"/>
    <link rel="stylesheet" type="text/css" href="css/stylemessage.css">
    <style>
        i{
            position :relative;
            top:-28px;
            left: 100.8%;
            color:red;

        }
    </style>
    <title>Message</title>
</head>
<body >

<nav>
	<a href="accueil.php">Home</a>
	<a href="editPic.php"> Picture</a>
    <a href="editMessage.php"> Message</a>
    <a href="addPicture.php"> Add Pic</a>
	<a href="php/logout.php">logout</a>
	<div class="animation start-home"></div>
</nav>

<div class="container">
<?php foreach($result as $mes): ?>
<div class="row">

    <div class="col-md-8">
        <div class="media g-mb-30 media-comment">
            <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
              <div class="g-mb-15">
              <a href="suppMess.php/?id=<?php echo $mes['id'];?>"> <i class="bi bi-x-lg danger" title="supprimer" name="suppM"></i></a>
                <h3 class="h5 g-color-gray-dark-v1 mb-0">Name : <?php echo ($mes['name']); ?> </h3>
                <span class="g-color-gray-dark-v4 g-font-size-12">Date : <?php echo ($mes['date']); ?></span>
              </div>
              <p>Subject :  <b> <?php echo ($mes['subject']); ?></b></p>
              
              <p>Message : <?php echo ($mes['message']); ?></p>
            </div>
        </div>
    </div>

  
</div>
<?php endforeach; ?>
</div>
</body>
</html>