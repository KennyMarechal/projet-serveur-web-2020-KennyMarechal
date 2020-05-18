<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$usager = 'root';
$motdepasse = 'root';
$hote = 'localhost';
$base = 'musculation';

$dsn = 'mysql:dbname='.$base.';host=' . $hote;
$connexion = new PDO($dsn, $usager, $motdepasse);
