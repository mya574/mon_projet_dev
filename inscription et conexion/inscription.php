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
                            header('Location: ../quize/jouer/afficher_quiz.php');
                            break;
                        case 'entreprise':
                            header('Location: ../quize/creation-quiz/entreprise.php');
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


// Check if the form for sending additional data is submitted
if (isset($_POST['submit'])) {

    // Check if reCAPTCHA response is empty
    if (empty($_POST['g-recaptcha-response'])) {
        echo "<h4>Résoudre le captcha</h4>";
    }

    // Validate reCAPTCHA
    if (!empty($_POST["g-recaptcha-response"])) {
        $secret = "6Ldx6ZkpAAAAABKP1aR4TKPd3S3-ZknB9qYdvH8s";

        $response = file_get_contents('https://google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);

        $data = json_decode($response);

        if ($data->success) {
            // This message will only be displayed when reCAPTCHA validation succeeds
            echo "<h2>Recaptcha successfully resolved, Data Sent</h2>";
            // Here you can proceed with redirection if necessary
        } else {
            echo "<h4>Please try again to solve the captcha</h4>";
            // Here you can handle the case where reCAPTCHA is not validated
        }
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
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
<div class="container">
    <h2>Inscription</h2>
    <?php if (isset($error)) : ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>
    <form action="traitement_inscription.php" method="post">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required>
        <label for="prenom"><br><br>Prénom :</label>
        <input type="text" id="prenom" name="prenom" required>
        <label for="identifiant"><br><br>Identifiant :</label>
        <input type="text" id="identifiant" name="identifiant" required>
        <label for="mot_de_passe"><br><br>Mot de passe :</label>
        <input type="password" id="mot_de_passe" name="mot_de_passe" required>
        <label for="role"><br><br>Rôle :</label>
        <input type="radio" id="admin" name="role" value="admin" required>
        <label for="admin">Admin</label>
        <input type="radio" id="ecole" name="role" value="ecole" required>
        <label for="ecole">Ecole</label>
        <input type="radio" id="utilisateur" name="role" value="utilisateur" required>
        <label for="utilisateur">Utilisateur</label>
        <input type="radio" id="entreprise" name="role" value="entreprise" required>
        <label for="entreprise">entreprise</label>
        <br><br>
    </form>
    <form method="post" action="">
        <!-- reCAPTCHA challenge -->
        <div class = "rca">
            <div class="g-recaptcha" data-sitekey="6Ldx6ZkpAAAAAIF7eL6SKblN7Ft_FJtA7E8Oqyw_"></div>
        </div>
        <br>
        <input type="submit" name="submit" value="S'inscrire" id="button">
    </form>
</div>
</body>
</html>