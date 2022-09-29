<?php session_start();
include('dbConfig.php');
if (!isset($_SESSION) || !isset($_SESSION['login'])) {
    header('Location: /Admin.php', true, 302);
    die();
}
//sortir les photo de la base
$sql = 'select * from images';
$sth = $dbh->query($sql);
$result = $sth->fetchAll(PDO::FETCH_BOTH);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/editpic.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="img/icons8-camera-50.ico" />
    <title>Edit Pictures</title>
    <style>
        i {
            position: relative;
            top:3%;
            left: 93%;
            color: red;

        }
    </style>
</head>

<body>
    <nav>
        <a href="accueil.php">Home</a>
        <a href="editPic.php"> Picture</a>
        <a href="editMessage.php"> Message</a>
        <a href="addPicture.php"> Add Pic</a>
        <a href="php/logout.php">logout</a>
        <div class="animation start-home"></div>
    </nav>
    <div class="box">
    <?php foreach($result as $mes): ?>
        <div class="card">

            <div class="imgBx">
                <img src="uploads/<?php echo $mes['file_name']; ?>" alt="images">
                <a href="suppPic.php/?id=<?php echo $mes['id']; ?>"><i class="bi bi-x-lg danger" title="supprimer" name="suppP"></i></a>
            </div>
            <div class="details">
                <h2><?php echo ($mes['title']); ?><br><span>date:<?php echo ($mes['uploaded_on']); ?></span></h2>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</body>

</html>