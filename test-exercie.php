<?php

    require_once 'lib/onesheet/autoload.php'; 
    require "configuration.php";
    require CHEMIN_ACCESSEUR . "ExerciceDAO.php";

    $accesseurExercice = new ExerciceDAO();
    $listeExercice = \ExerciceDAO::listerExercice();

    $tableur = $tableur = new OneSheet\Writer('');

    $tableur->addRow(array("id", "nom", "muscle", "resume"));

    foreach($listeExercice as $exercice){
        $tableur->addRow(array($exercice["id"], $exercice["nom"], $exercice["muscle"], $exercice["resume"]));
    }
  
    $tableur->writeToFile('Exercice.xlsx');

?> 
