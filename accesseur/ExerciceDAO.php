<?php
//require "../configuration.php";
//require "accesseur/BaseDeDonnees.php";
require CHEMIN_ACCESSEUR . "BaseDeDonnees.php";

class ExerciceDAO{
  public static function lireExercice($id){
    $MESSAGE_SQL_EXERCICE = "SELECT id, nom, muscle, resume, description, image FROM exercice WHERE id=".$id.";";
    $requeteExercice = BaseDeDonnees::getConnexion()->prepare($MESSAGE_SQL_EXERCICE);
    $requeteExercice->bindParam(':id', $id, PDO::PARAM_INT);
    $requeteExercice->execute();

    $exercice = $requeteExercice->fetch();
    return $exercice;
  }

  public static function listerExercice(){
    $MESSAGE_SQL_LISTE_EXERCICE = "SELECT id, nom, resume, description, muscle, image FROM exercice;";

    $requeteListeExercice = BaseDeDonnees::getConnexion()->prepare($MESSAGE_SQL_LISTE_EXERCICE);
    $requeteListeExercice->execute();
    $listeExercice= $requeteListeExercice->fetchAll();
    return $listeExercice;
  }

  public static function ajouterExercice($exercice){
    $MESSAGE_SQL_AJOUTER_EXERCICE =
    "INSERT INTO exercice (nom, resume, description, muscle, image) VALUES(" .
    ":nom," .
    ":resume," .
    ":description," .
    ":muscle," .
    ":image" .
    ");";

    $requeteAjouterExercice = BaseDeDonnees::getConnexion()->prepare($MESSAGE_SQL_AJOUTER_EXERCICE);

    $requeteAjouterExercice->bindParam(':nom', $exercice['nom'], PDO::PARAM_STR);
    $requeteAjouterExercice->bindParam(':resume', $exercice['resume'], PDO::PARAM_STR);
    $requeteAjouterExercice->bindParam(':description', $exercice['description'], PDO::PARAM_STR);
    $requeteAjouterExercice->bindParam(':muscle', $exercice['muscle'], PDO::PARAM_STR);
    $requeteAjouterExercice->bindParam(':image', $exercice['image'], PDO::PARAM_STR);

    $reussiteAjout = $requeteAjouterExercice->execute();
    
    return $reussiteAjout;
  }

  public static function rechercherExerciceFacile($texte){
    $MESSAGE_SQL_RECHERCHER_EXERCICE = 
    "SELECT id, nom, resume, description, muscle, image FROM exercice WHERE 
    nom LIKE '%$texte%' 
    OR resume LIKE '%$texte%'
    OR muscle LIKE '%$texte%';";

    //print_r($MESSAGE_SQL_RECHERCHER_EXERCICE);

    $requeteRechercherExercice = BaseDeDonnees::getConnexion()->prepare($MESSAGE_SQL_RECHERCHER_EXERCICE);
    $requeteRechercherExercice->execute();
    $exerciceRecherche= $requeteRechercherExercice->fetchAll();

    return $exerciceRecherche;
  }

  public static function rechercherExerciceAvance($exerciceRecherche){
    
    $nom = $exerciceRecherche['nom-exercice'];

    $MESSAGE_SQL_RECHERCHER_EXERCICE_AVANCER = "SELECT id, nom, resume, description, muscle, image FROM exercice WHERE ";
    if(!empty($nom))
    {
        $MESSAGE_SQL_RECHERCHER_EXERCICE_AVANCER  .= " nom LIKE '%$nom%' ";
        //$MESSAGE_SQL_RECHERCHER_EXERCICE_AVANCER  .= " OR ";
    }
    elseif(!empty($exerciceRecherche))
    {    
      foreach($exerciceRecherche['muscle'] as $nomMuscle => $valeur)
      {
        if("on" == $valeur)
		      {
			      $muscle_liste[] = "muscle = '$nomMuscle'";
		      }
      }

      $condition = "(" . implode (" OR ", $muscle_liste) . ")";

      $MESSAGE_SQL_RECHERCHER_EXERCICE_AVANCER .= $condition;

    }

    $requeteRechercherExerciceAvancer = BaseDeDonnees::getConnexion()->prepare($MESSAGE_SQL_RECHERCHER_EXERCICE_AVANCER);
    $requeteRechercherExerciceAvancer->execute();
    $exerciceRechercheAvancer= $requeteRechercherExerciceAvancer->fetchAll();

    return $exerciceRechercheAvancer;
  }

}
?>

