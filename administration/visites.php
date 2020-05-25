<?php
include "connexion.php";

$MESSAGE_SQL_CATEGORIE_JOURNEE = "SELECT timestamp as date, COUNT(*), DAYOFWEEK(timestamp) as Journee FROM clic GROUP BY timestamp;";

$requeteCategorieJournee = $connexion->prepare($MESSAGE_SQL_CATEGORIE_JOURNEE);
$requeteCategorieJournee->execute();
$listeCategorieJournee = $requeteCategorieJournee->fetchAll();

$MESSAGE_SQL_CATEGORIE_IP = "SELECT ip_visiteur as ip_visiteur, COUNT(*) as nombre_clic FROM clic GROUP BY ip_visiteur;";

$requeteCategorieIp = $connexion->prepare($MESSAGE_SQL_CATEGORIE_IP);
$requeteCategorieIp->execute();
$listeCategorieIp = $requeteCategorieIp->fetchAll();

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
    <h1>Visites</h1> 
    </header>
    
<section id="partie-haute">

    <article id="box">
    <table border="1" cellpadding="5" cellspacing="1">
        <tr>
            <th>ip_visiteur</th>
            <th>nombre_clic</th>
        </tr>

        <?php
        foreach ($listeCategorieIp as $ip) {
        ?>

        <tr>
            <td><?= $ip["ip_visiteur"]; ?></td>
            <td><?= $ip["nombre_clic"]; ?></td>
        </tr>
        <?php
        }
        ?>
    </table>

    <table border="1" cellpadding="10%" cellspacing="5%">
        <tr>
            <th>date</th>
            <th>nombre clic</th>
        </tr>

        <?php
        foreach ($listeCategorieJournee as $jour) {
        ?>

        <tr>
            <td><?= $jour["date"]; ?></td>
            <td><?= $jour["COUNT(*)"]; ?></td>
        </tr>
        <?php
        }
        ?>
    </table>
    </article>
    <aritcle id="box">
        <canvas id="graphique-1"></canvas>
    
    <script>
    var donnees = [ <?php foreach($listeCategorieJournee as $jour) echo $jour["COUNT(*)"].
        ","; ?>
    ]; // Tableau des données
    var etiquettes = [ <?php foreach($listeCategorieJournee as $jour) echo "'".$jour["date"].
        "'".
        ","; ?>
    ] // Tableau des étiquettes

    var cible = document.getElementById('graphique-1').getContext('2d');
    var graphiqueLigne = new Chart(cible, {
        type: 'line',

        data: {
            labels: etiquettes,
            datasets: [{
                label: 'Visite par jour',
                //backgroundColor: 'rgb(1, 3, 254)',
                borderColor: 'rgb(1, 3, 254)',
                data: donnees
            }]
        },

        options: {}
    });
    </script>
    </aritcle>
</section>
</body>

</html>