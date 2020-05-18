<?php
require "../configuration.php";
 

$repertoireIllustration =
  $_SERVER['DOCUMENT_ROOT'] . "/projet-serveur-web-2020-KennyMarechal/illustration/";

$fichierDestination =
  $repertoireIllustration . $_FILES['image']['name'];

$fichierSource = $_FILES['image']['tmp_name'];

$illustration = $_FILES['image']['name'];



if(move_uploaded_file($fichierSource,$fichierDestination)){?>


	Votre envoi de fichier a bien fonctionné
	<img src="../illustration/<?=$_FILES['illustration']['name']?>" alt=""/>

<?php
}

$filtresExercice = [];

$filtresExercice['nom'] = FILTER_SANITIZE_ENCODED;
$filtresExercice['resume'] = FILTER_SANITIZE_ENCODED;
$filtresExercice['description'] = FILTER_SANITIZE_ENCODED;
$filtresExercice['muscle'] = FILTER_SANITIZE_ENCODED;


$exercice = filter_input_array(INPUT_POST, $filtresExercice);
$exercice['image'] = $illustration;

require CHEMIN_ACCESSEUR . "ExerciceDAO.php";
$reussiteAjout = ExerciceDAO::ajouterExercice($exercice);

require "../lib/simpleimage/SimpleImage.php";
$image = new SimpleImage();
$image->load('../illustration/' . $illustration);
$image->resizeToWidth(100);
$image->save('../mini/' . $illustration);

if($reussiteAjout){?>
Votre film a été ajouté à la base de données!
<?php
}
?>

