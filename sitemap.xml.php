 <?php
include "connexion.php";
$MESSAGE_SQL_LISTE_EXERCICE = "SELECT id, nom, muscle, resume, image FROM exercice;";

$requeteListeExercice = $connexion->prepare($MESSAGE_SQL_LISTE_EXERCICE);
$requeteListeExercice->execute();
$listeExercice = $requeteListeExercice->fetchAll();

?>


<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"> 
  <url>
    <loc>http://localhost/projet-serveur-web-2020-KennyMarechal/list-exercice.php</loc>
    <lastmod>2019-03-23</lastmod>
  </url>
  <url>
    <loc>http://localhost/projet-serveur-web-2020-KennyMarechal/list-exercice.php</loc>
    <lastmod>2019-03-23</lastmod>
  </url>

  <?php 
  foreach($listeExercice as $exercice)
  {
  ?>
  <url>
    <loc>http://localhost/projet-serveur-web-2020-KennyMarechal/exercice.php?id=<?=$exercice['id']?></loc>
    <lastmod>2019-03-23</lastmod>
  </url>  
  <?php 
  }
  ?>
  
  
  
</urlset>
