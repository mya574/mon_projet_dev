<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Utilisateur</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Page Utilisateur</h1>
        <button id="modifierInfosBtn">Modifier Informations</button>
        <button id="accéderQuizBtn">Accéder au Quiz</button>
        <div id="dashboard">
    
<script>
    document.getElementById("modifierInfosBtn").onclick = function () {
        location.href = "../Utilisateur/modifier_infos.php";
    };

    document.getElementById("accéderQuizBtn").onclick = function () {
        location.href = "../quize/jouer/afficher_quiz.php";
    };
</script>

</body>
</html>

          <!-- Historique des quiz -->
          </div>
    </div>
<?php
// Fonction pour lire les données du fichier CSV
function lireCSV($fichier) {
    $data = [];
    if (($handle = fopen($fichier, "r")) !== FALSE) {
        while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $data[] = $row;
        }
        fclose($handle);
    }
    return $data;
}

// Chemin vers le fichier CSV contenant l'historique des quiz
$fichierCSV = '../Utilisateur/historique_quiz.csv';

// Lire les données du fichier CSV
$historiqueQuiz = lireCSV($fichierCSV);

// Afficher l'historique des quiz dans la dashboard
foreach ($historiqueQuiz as $quiz) {
    echo "<p>$quiz[0] - $quiz[1]</p>"; // Assurez-vous que le fichier CSV contient les informations correctes (nom du quiz et date)
}
?>
