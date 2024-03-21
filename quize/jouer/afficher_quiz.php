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
            <img src="../creation-quiz/quizzeo-removebg-preview.png" alt="Logo">
        </div>
        <div class="menu">
            <a href="ecole2.php">mes quizes</a>
            <a href="ecole.php">cree</a>
            <a href="../../inscription et conexion/connexion.php">Deconnexion</a>
        </div>
</div>   
    <h1>A vous de jouer</h1>
    <ul>
        <?php
            $qcm_names = file("../creation-quiz/qcm_names.csv", FILE_IGNORE_NEW_LINES);
            if ($qcm_names === false) {
                die("Erreur lors de la lecture du fichier CSV");
            }            
            
            // Parcourir les noms de QCM et afficher un lien pour chaque QCM
            foreach ($qcm_names as $qcm_name) {
                echo "<li>";
                echo "<span>$qcm_name</span>";
                echo "<a href='lire_questions.php?qcm_name=$qcm_name'>Jouer</a>";
                echo "</li>";
            }
        ?>
    </ul>
</body>
</html>
