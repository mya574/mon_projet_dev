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
        <button id="modifierInfosBtn">Profil</button>
        <button id="accéderQuizBtn">Accéder au Quiz</button>
        <button id="deconnexionBtn">Déconnexion</button>
        <div id="dashboard">
    
<script>
    document.getElementById("modifierInfosBtn").onclick = function () {
        location.href = "./modifier_infos.php";
    };

    document.getElementById("accéderQuizBtn").onclick = function () {
        location.href = "../quize/jouer/afficher_quiz.php";
    };

    document.getElementById("deconnexionBtn").onclick = function () {
        location.href = "../inscription et conexion/connexion.php";
    };
</script>

</body>
</html>
<?php
// Chemin vers le fichier CSV contenant les données des quiz
$fichierCSV = '../quize/qcm_questions.csv';

// Récupérer l'identifiant de l'utilisateur (à partir de la session par exemple)
$utilisateur_id = 1; // Remplacez 1 par l'identifiant de l'utilisateur actuel

// Lire les résultats des quiz depuis le fichier CSV pour l'utilisateur spécifié
$resultatsUtilisateur = lireResultatsQuizUtilisateur($fichierCSV, $utilisateur_id);

// Afficher les résultats sur la dashboard
if (!empty($resultatsUtilisateur)) {
    echo "<h2>Résultats des Quiz</h2>";
    echo "<table>";
    echo "<tr><th>Titre du Quiz</th><th>Score</th><th>Date</th></tr>";
    foreach ($resultatsUtilisateur as $resultat) {
        echo "<tr>";
        echo "<td>{$resultat['titre']}</td>";
        echo "<td>{$resultat['score']}</td>";
        echo "<td>{$resultat['date']}</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Aucun résultat de quiz trouvé pour cet utilisateur.";
}

// Fonction pour lire les résultats des quiz depuis un fichier CSV pour un utilisateur spécifié
function lireResultatsQuizUtilisateur($fichier, $utilisateur_id) {
    $resultatsUtilisateur = [];
    if (($handle = fopen($fichier, "r")) !== FALSE) {
        // Ignorer la première ligne (en-tête)
        fgetcsv($handle);
        while (($data = fgetcsv($handle)) !== FALSE) {
            // Vérifier si l'utilisateur correspond
            if ($data[0] == $utilisateur_id) {
                // Stocker les résultats du quiz dans un tableau associatif
                $resultat = [
                    'titre' => $data[1], // Colonne où se trouve le titre du quiz
                    'score' => $data[7], // Colonne où se trouve le score du quiz
                    'date' => $data[8] // Colonne où se trouve la date du quiz
                ];
                $resultatsUtilisateur[] = $resultat;
            }
        }
        fclose($handle);
    }
    return $resultatsUtilisateur;
}
?>

