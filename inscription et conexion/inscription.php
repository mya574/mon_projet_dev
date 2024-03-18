<?php
if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['identifiant']) && isset($_POST['mot_de_passe']) && isset($_POST['role'])) {
    $file_name = 'utilisateurs.csv';

    $file = fopen($file_name, 'a');

    if (filesize($file_name) == 0) {
        fputcsv($file, ['Nom', 'Prenom', 'Identifiant', 'Mot_de_passe', 'Role']);
    }

    $password_hash = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);

    fputcsv($file, [$_POST['nom'], $_POST['prenom'], $_POST['identifiant'], $password_hash, $_POST['role']]);

    fclose($file);

    header('Location: connexion.php');
}

if (isset($_POST['submit'])) {
    // Check if first name field is empty
    if (empty($_POST['fname'])) {
        echo "<h4>Veuillez entrer votre prénom</h4>";
    }

    // Check if last name field is empty
    if (empty($_POST['lname'])) {
        echo "<h4>Veuillez entrer votre nom</h4>";
    }

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
        } else 
        {
            echo "<h4>Please try again to solve the captcha</h4>";
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
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
<div class="container">
    <h2>Inscription</h2>
    <form action="traitement_inscription.php" method="post">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required>
        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required>
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
        <input type="submit" value="S'inscrire">
    </form>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        Prénom <input type="text" name="fname"><br>
        Nom <input type="text" name="lname"><br>
        <!-- reCAPTCHA challenge -->
        <div class="g-recaptcha" data-sitekey="6Ldx6ZkpAAAAAIF7eL6SKblN7Ft_FJtA7E8Oqyw_"></div>
        <input type="submit" name="submit" value="Send Data">
    </form>
</div>
</body>
</html>