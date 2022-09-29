<?php  session_start();
include('dbConfig.php');
if (!isset($_SESSION) || !isset($_SESSION['login']))
{
    header('Location: /Admin.php', true, 302);
    die();
}

//supression des message
$codemat =$_GET['id'];
$sql="DELETE from contacter where id = '$codemat' ";
$dbh->exec($sql);
header('location: /editMessage.php');

?>
