<?php  session_start();
include('dbConfig.php');
if (!isset($_SESSION) || !isset($_SESSION['login']))
{
    header('Location: /Admin.php', true, 302);
    die();
}


//supression des image
$codemat =$_GET['id'];
$req="select * from images where id='$codemat'";
$sth=$dbh->query($req);
$res=$sth->fetch();
$path=$res['file_name'];
unlink("uploads/".$path);

$sql="DELETE from images where id = '$codemat' ";
$dbh->exec($sql);

header('location: /editPic.php');
?>