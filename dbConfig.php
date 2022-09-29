<?php
session_start();

$user = 'jrxajqch_admin';
$password = 'root';
// $dsn = 'mysql:host=102.219.176.39;dbname=jrxajqch_photographe';
$dsn = 'mysql:host=127.0.0.1;dbname=jrxajqch_photographe';
global $dbh;
try {
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (PDOException $e) {
    print "Erreur! : " . $e->getMessage() . "<br/>";
}

?>