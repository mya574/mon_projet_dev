<?php
if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['identifiant']) && isset($_POST['mot_de_passe']) && isset($_POST['role'])) {
    $file_name = 'utilisateurs.csv';

    // Vérifier si l'utilisateur est en train de s'inscrire en tant qu'administrateur
    if ($_POST['role'] === 'admin') {
        // Ouvrir le fichier CSV et rechercher s'il existe déjà un compte administrateur
        $file = fopen($file_name, 'r');//recherche admin
        $admin_exists = false;//declare

        while (($line = fgetcsv($file)) !== false) {
            if ($line[4] === 'admin') {
                $admin_exists = true;
                break;
            }
        }

        fclose($file);

        // Si un compte administrateur existe déjà, afficher un message d'erreur
        if ($admin_exists) {
            $error = "Il ne peut y avoir qu'un seul administrateur. Veuillez choisir un autre rôle.";
        }
    }

    // Si aucun compte administrateur n'existe et que le rôle n'est pas admin, procéder à l'inscription
    if (!isset($error)) {
        $file = fopen($file_name, 'a');

        if (filesize($file_name) == 0) {//en-téte
            fputcsv($file, ['Nom', 'Prenom', 'Identifiant', 'Mot_de_passe', 'Role']);
        }

        $password_hash = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);
        //ajoute les donne
        fputcsv($file, [$_POST['nom'], $_POST['prenom'], $_POST['identifiant'], $password_hash, $_POST['role']]);
        fclose($file);

        header('Location: connexion.php');
        exit(); // Terminer le script après la redirection
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="inscription.css">
</head>
<body>
<div class="container">
    <h2>Inscription</h2>
    <?php if (isset($error)) : ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>
    <form action="traitement_inscription.php" method="post">
        <div class="input-group">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required>
        </div>
        <div class="input-group">
            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" required>
        </div>
        <div class="input-group">
            <label for="identifiant">Identifiant :</label>
            <input type="text" id="identifiant" name="identifiant" required>
        </div>
        <div class="input-group">
            <label for="mot_de_passe">Mot de passe :</label>
            <input type="password" id="mot_de_passe" name="mot_de_passe" required>
        </div>
        <div class="radio-group">
            <label for="role">Rôle :</label>
            <input type="radio" id="admin" name="role" value="admin" required>
            <label for="admin">Admin</label>
            <input type="radio" id="ecole" name="role" value="ecole" required>
            <label for="ecole">Ecole</label>
            <input type="radio" id="utilisateur" name="role" value="utilisateur" required>
            <label for="utilisateur">Utilisateur</label>
            <input type="radio" id="entreprise" name="role" value="entreprise" required>
            <label for="entreprise">Entreprise</label>
        </div>
        <input type="submit" value="S'inscrire">
    </form>
</div>

</body>
</html>