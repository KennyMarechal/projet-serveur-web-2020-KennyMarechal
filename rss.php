<?php
require "configuration.php";
require CHEMIN_ACCESSEUR . "ExerciceDAO.php";

$listeExercice = ExerciceDAO::listerExercice();
?> 

<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0"
	xmlns:content="http://purl.org/rss/1.0/modules/content/"
	xmlns:wfw="http://wellformedweb.org/CommentAPI/"
	xmlns:dc="http://purl.org/dc/elements/1.1/"
	xmlns:atom="http://www.w3.org/2005/Atom"
	xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
	xmlns:slash="http://purl.org/rss/1.0/modules/slash/"
	>

<channel>
    <title>Exercice de musculation</title>
    <atom:link href="http://localhost/projet-serveur-web-2020-KennyMarechal/list-exercice.php" rel="self" type="application/rss+xml" />
    <link>http://localhost/projet-serveur-web-2020-KennyMarechal/list-exercice.php/</link>
    <description>Devenir énorme et sec..</description>
	<lastBuildDate>Mon, 18 Mar 2019 14:27:41 +0000	</lastBuildDate>
	<language>fr-CA</language>
	<sy:updatePeriod> hourly	</sy:updatePeriod>
	<sy:updateFrequency>1</sy:updateFrequency>
	<generator>Programmation manuelle</generator>
    
 <?php 
 
    foreach($listeExercice as $exercice)
	{
	?>
	<item>
		<title><?=$exercice['nom']?></title>
		<link>http://localhost/projet-serveur-web-2020-KennyMarechal/exercice.php?id=<?=$exercice['id']?></link>
		<id><?=$exercice['id']?></id>
		<muscle><?=$exercice['muscle'];?></muscle>
		<description><?=$exercice['resume']; ?></description>
		<image><?=$exercice['image']; ?></image>
		<guid isPermaLink="false">http://localhost/projet-serveur-web-2020-KennyMarechal/exercice.php?id=<?=$exercice['id']?></guid>
	</item>
	<?php
	}
    
  ?>   

    </channel>
</rss>
