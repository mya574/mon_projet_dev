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
            <label for="identifiant">Adresse Email:</label><br>
            <input type="identifiant" id="email" name="email" required><br>
            <label for="motdepasse">Mot de Passe:</label><br>
            <input type="password" id="motdepasse" name="motdepasse" required><br>
            <input type="submit" value="Enregistrer">
        </form>
    </div>
</body>
</html>

<?php
// Récupérer les valeurs du formulaire
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['identifiant'];
$motdepasse = $_POST['motdepasse'];

// Mettre à jour les informations dans le fichier CSV (vous devez implémenter cette partie)

// Vous pouvez utiliser des fonctions PHP comme fopen(), fputcsv(), fclose() pour manipuler le fichier CSV

// Rediriger l'utilisateur vers la page utilisateur après la mise à jour
header("Location: ../Utilisateur/utilisateur.php");
exit();
if (ecrireInformationsUtilisateur($fichierCSV, $nouvellesInformations)) {
    echo "Les informations utilisateur ont été mises à jour avec succès.";
} else {
    echo "Une erreur s'est produite lors de la mise à jour des informations utilisateur.";
}
?>
