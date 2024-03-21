<?php
session_start();
$error = "";

if (isset($_POST['identifiant']) && isset($_POST['mot_de_passe']) && isset($_POST['role'])) {
    $file_name = 'utilisateurs.csv';
    $file = fopen($file_name, 'r');

    if ($file) {
        while (($line = fgetcsv($file)) !== false) {
            if (isset($line[2]) && isset($line[3]) && isset($line[4]) && $line[2] === $_POST['identifiant'] && $line[4] === $_POST['role']) {
                if (password_verify($_POST['mot_de_passe'], $line[3])) {
                    $_SESSION['identifiant'] = $_POST['identifiant'];
                    $_SESSION['role'] = $_POST['role'];
                    fclose($file);
                    // Redirection en fonction du rôle
                    switch ($_POST['role']) {
                        case 'admin':
                            header('Location: admin.php');
                            break;
                        case 'ecole':
                            header('Location: ../quize/creation-quiz/ecole.php');
                            break;
                        case 'utilisateur':
                            header('Location: ../Utilisateur/utilisateur.php');
                            break;
                        default:
                            // Redirection par défaut
                            header('Location: index.php');
                            break;
                    }
                    exit(); // Terminer le script après la redirection
                } else {
                    $error = "Le mot de passe est incorrect.";
                }
            } else {
                $error = "L'identifiant ou le rôle n'existe pas.";
            }
        }
        fclose($file);
    } else {
        $error = "Erreur lors de l'ouverture du fichier.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
<div class="container">
    <h2>Connexion</h2>
    <?php if ($error !== "") : ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>
    <form action="" method="post">
        <label for="identifiant">Identifiant :</label>
        <input type="text" id="identifiant" name="identifiant" required>
        <label for="mot_de_passe">Mot de passe :</label>
        <input type="password" id="mot_de_passe" name="mot_de_passe" required>
        <label for="role">Rôle :</label>
        <input type="radio" id="admin" name="role" value="admin" required>
        <label for="admin">Admin</label>
        <input type="radio" id="ecole" name="role" value="ecole" required>
        <label for="ecole">Ecole</label>
        <input type="radio" id="utilisateur" name="role" value="utilisateur" required>
        <label for="utilisateur">Utilisateur</label>
        <input type="radio" id="entreprise" name="role" value="entreprise" required>
        <label for="entreprise">Entreprise</label>
        <input type="submit" value="Se connecter">
    </form>
</div>
</body>
</html>