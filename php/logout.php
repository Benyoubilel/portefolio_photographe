<?php
session_start();
    if (isset($_SESSION) && isset($_SESSION['username'])){
        //utilisateur connecté
        session_unset();
    } 
    header('Location: ../Admin.php', true, 302);
?>