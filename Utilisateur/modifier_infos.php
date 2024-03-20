<?php
// Fonction pour lire les informations utilisateur depuis un fichier CSV
function lireInformationsUtilisateur($fichier) {
    $informations = [];
    if (($handle = fopen($fichierCSV, "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $informations[] = $data;
        }
        fclose($handle);
    }
    return $informations;
}

// Fonction pour écrire les informations utilisateur dans un fichier CSV
function ecrireInformationsUtilisateur($fichier, $nouvellesInformations) {
    if (($handle = fopen($fichier, "w")) !== FALSE) {
        foreach ($nouvellesInformations as $ligne) {
            fputcsv($handle, $ligne);
        }
        fclose($handle);
        return true;
    } else {
        return false;
    }
}

// Chemin vers le fichier CSV contenant les informations utilisateur
$fichierCSV = '../inscription et conexion/utilisateurs.csv';

// Charger les informations utilisateur existantes
$informationsUtilisateur = lireInformationsUtilisateur($fichierCSV);

// Définir des variables par défaut pour les champs du formulaire
$nom = $informationsUtilisateur[0];
$prenom = $informationsUtilisateur[1];
$identifiant = $informationsUtilisateur[2];
$motdepasse = $informationsUtilisateur[3];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les nouvelles données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $identifiant = $_POST['identifiant'];
    $motdepasse = $_POST['motdepasse'];

    // Mettre à jour les informations utilisateur dans le tableau
    $informationsUtilisateur = [$nom, $prenom, $identifiant, $motdepasse];

    // Écrire les nouvelles informations dans le fichier CSV
    if (ecrireInformationsUtilisateur($fichierCSV, $informationsUtilisateur)) {
        echo "Les informations utilisateur ont été mises à jour avec succès.";
    } else {
        echo "Une erreur s'est produite lors de la mise à jour des informations utilisateur.";
    }
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier vos informations</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Modifier vos informations </h1>
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