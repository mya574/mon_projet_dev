<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des QCM</title>
    <link rel="stylesheet" href="afficher_quiz.css">
    <link rel="stylesheet" href="afficher_quiz_nav.css">
</head>
<body>
<div class="navbar">
        <div class="logo">
            <img src="../creation-quiz/logo.png" alt="Logo">
        </div>
        <div class="menu">
            <a href="afficher_quiz.php">mes quizes</a>
            <a href="modifier_infos.php">mon profil</a>
            <a href="../../inscription et conexion/connexion.php">Deconnexion</a>
        </div>
</div>   
    <h1>A vous de jouer</h1>
    <ul>
        <?php
            $qcm_names = file("../creation-quiz/qcm_names.csv", FILE_IGNORE_NEW_LINES);//ne pas inclure le (_N)saut ligne
            if ($qcm_names === false) {
                die("Erreur lors de la lecture du fichier CSV");
            }            
            
            // Parcourir les noms de QCM et afficher un lien pour chaque QCM
            foreach ($qcm_names as $qcm_name) {
                echo "<li>";
                echo "<span>$qcm_name</span>";//genére une liste avec le nom de chaque qcm
                echo "<a href='lire_questions.php?qcm_name=$qcm_name'>Jouer</a>";
                //bouton avec href ointe ver page lire recupere les qcm-name avec get et permet..
                echo "</li>";
            }
        ?>
    </ul>
</body>
</html>
