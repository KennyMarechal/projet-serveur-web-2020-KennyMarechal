<?php
include "connexion.php";

$MESSAGE_SQL_CATEGORIE = "SELECT muscle as muscle, count(*) as nombre_exercices, SUM(prix) as prix, AVG(prix) as moyen_prix, MAX(prix) as max_prix, MIN(prix) as min_prix FROM exercice GROUP BY muscle;";

$requeteCategorie = $connexion->prepare($MESSAGE_SQL_CATEGORIE);
$requeteCategorie->execute();
$listeCategorie = $requeteCategorie->fetchAll();
//print_r($listeCategorie);
?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="stylee.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
</head>

<body>
<header>
<h1>Contenu</h1>
</header>

<section id="partie-haute">

    <article id="box">
    <table border="1%" cellpadding="10%" cellspacing="5%">
        <tr>
            <th>Muscles</th>
            <th>Nombres Exercices</th>
            <th>Prix Totals</th>
            <th>Moyennes de prix</th>
            <th>Prix Max</th>
            <th>Prix Min</th>
        </tr>

        <?php
        foreach ($listeCategorie as $categorie) {

        ?>

            <tr>
                <td><?= $categorie["muscle"]; ?></td>
                <td><?= $categorie["nombre_exercices"]; ?></td>
                <td><?= $categorie["prix"]; ?></td>
                <td><?= $categorie["moyen_prix"]; ?></td>
                <td><?= $categorie["max_prix"]; ?></td>
                <td><?= $categorie["min_prix"]; ?></td>
            </tr>

        <?php
        }
        ?>
    </table>
    </article>
<article id="box">
    
        <h4>Prix par Muscle</h4>
        <canvas id="graphique-2"></canvas>
    
    <script>
        var donnees = [<?php foreach ($listeCategorie as $categorie) echo $categorie["prix"] . ","; ?>]
        var etiquettes = [<?php foreach ($listeCategorie as $categorie) echo "'" . $categorie["muscle"] . "'" . ","; ?>];
        var couleurs = ['rgba(255, 99, 132, 0.9)', 'rgba(54, 162, 235, 0.9)', 'rgba(255, 206, 86, 0.9)', 'rgba(75, 192, 192, 0.9)']

        var cible = document.getElementById('graphique-2');
        var graphiqueTarte = new Chart(cible, {
            type: 'pie',
            data: {
                labels: etiquettes,
                datasets: [{
                    label: 'Contenu par prix',
                    data: donnees,
                    backgroundColor: couleurs
                }]
            },
            options: {
                responsive: true
            }
        });
    </script>
</article>
</section>
</body>

</html>