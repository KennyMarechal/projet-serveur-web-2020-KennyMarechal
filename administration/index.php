<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylee.css">
    <title>DASHBOARD</title>
</head>
<body>

<h1>DASHBOARD-Sommaire</h1>

<section id="partie-haute">

    <article id="box">
        <a href="visites.php">
            <?php include "visites.php"?>
        </a>
    </article> 
    
    <article id="box"> 
    </article>
</section>

<section id="partie-basse">
    <article id="box-1">
        <a href="contenu.php">
            <?php include "contenu.php"?>
        </a>
    </article>
    <article id="box-2"> 
        <a href="list-exercice.php">List-exercice</a>
        <a href="ajouter-exercice.html">ajouter-exercice</a>
    </article>
</section>
    
</body>
</html>
