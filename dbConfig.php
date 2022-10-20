<?php


$user = 'root';
$password = '';
// $dsn = 'mysql://localhost:3306;dbname=jrxajqch_photographe';
$dsn = 'mysql:host=localhost:3306;dbname=epiz_32830045_photographe';
global $dbh;
try {
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (PDOException $e) {
    print "Erreur! : " . $e->getMessage() . "<br/>";
}

?>