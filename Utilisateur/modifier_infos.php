<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Informations Utilisateur</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Modifier Informations Utilisateur</h1>
        <form action="traitement_infos.php" method="post">
            <label for="nom">Nom:</label><br>
            <input type="text" id="nom" name="nom" required><br>
            <label for="prenom">Prénom:</label><br>
            <input type="text" id="prenom" name="prenom" required><br>
            <label for="identifiant">Identifiant:</label><br>
            <input type="identifiant" id="identifiant" name="identifiant" required><br>
            <label for="motdepasse">Mot de Passe:</label><br>
            <input type="password" id="motdepasse" name="motdepasse" required><br>
            <input type="submit" value="Enregistrer">
        </form>
    </div>
</body>
</html>

<?php
include_once 'fonction.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $identifiant = $_POST['identifiant'];
    $motdepasse = $_POST['motdepasse'];

    // Créer un tableau avec les nouvelles informations
    $nouvellesInformations = [$nom, $prenom, $identifiant, $motdepasse];

    // Chemin vers le fichier CSV contenant les informations utilisateur
    $fichierCSV = '../inscription et conexion/utilisateur.csv';

    // Lire les anciennes informations utilisateur
    $anciennesInformations = lireInformationsUtilisateur($fichierCSV);

    // Trouver l'index de l'utilisateur dans le tableau des anciennes informations
    $indexUtilisateur = array_search($nom, array_column($anciennesInformations, 2));

    // Vérifier si l'utilisateur existe dans le fichier CSV
    if ($indexUtilisateur !== false) {
        // Mettre à jour les informations de l'utilisateur
        $anciennesInformations[$indexUtilisateur] = $nouvellesInformations;

        // Écrire les nouvelles informations dans le fichier CSV
        $handle = fopen($fichierCSV, "w");
        foreach ($anciennesInformations as $ligne) {
            fputcsv($handle, $ligne);
        }
        fclose($handle);

        echo "Les informations utilisateur ont été mises à jour avec succès.";
    } else {
        echo "Utilisateur introuvable.";
    }

}

    // Rediriger l'utilisateur vers la page utilisateur après la mise à jour
    header("Location:../Utilisateur/utilisateur.php");
    exit();
?>
