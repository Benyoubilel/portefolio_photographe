<?php
// DEMARRE LA SESSION
// SAUVGARDE LA VARIABLE hits DANS LE FICHIER DE SESSION
$hits =0;

// TRAITEMENT SUR LE FICHIER TEXTE
if(empty($hits)){
$fp=fopen("compteur.txt","a+"); //OUVRE LE FICHIER compteur.txt
$num=fgets($fp,4096); // RECUPERE LE CONTENUE DU COMPTEUR
fclose($fp); // FERME LE FICHIER
$hits=$num - -1; // TRAITEMENT
$fp=fopen("compteur.txt","w"); // OUVRE DE NOUVEAU LE FICHIER
fputs($fp,$hits); // MET LA NOUVELLE VALEUR
fclose($fp); // FERME LE FICHIER
}
?>