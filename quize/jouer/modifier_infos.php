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
            <label for="role">Rôle:</label>
            <input type="radio" id="admin" name="role" value="admin" required>
            <label for="admin">Admin</label>
            <input type="radio" id="ecole" name="role" value="ecole" required>
            <label for="ecole">Ecole</label>
            <input type="radio" id="utilisateur" name="role" value="utilisateur" required>
            <label for="utilisateur">Utilisateur</label><br>
            <input type="submit" value="Enregistrer">
        </form>
    </div>
 
</body>
</html>