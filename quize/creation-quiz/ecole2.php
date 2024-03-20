<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des QCM de l'école</title>
    <link rel="stylesheet" href="designe.css">
    <link rel="stylesheet" href="style.css">
</head>
<body> 
<div class="navbar">
        <div class="logo">
            <img src="quizzeo-removebg-preview.png" alt="Logo">
        </div>
        <div class="menu">
            <a href="ecole2.php">mes quizes</a>
            <a href="ecole.php">cree</a>
            <a href="../../inscription et conexion/connexion.php">Deconnexion</a>
        </div>
</div>   
    <div class="container">
        <h1>Liste des QCM de l'école</h1>
        <table>
            <thead>
                <tr>
                    <th>Nom du QCM</th>
                    <th>Numéro de la question</th>
                    <th>Intitulé de la question</th>
                    <th>Réponse 1</th>
                    <th>Réponse 2</th>
                    <th>Réponse 3</th>
                    <th>Bonne réponse</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $csv_file = 'qcm_questions.csv';
                if (file_exists($csv_file)) {
                    $file = fopen($csv_file, 'r');
                    if ($file) {
                        while (($line = fgetcsv($file)) !== false) {
                            // Affiche uniquement les lignes avec le rôle "ecole"
                            if ($line[7] == 'ecole') {
                                echo '<tr>';
                                echo '<td>' . $line[0] . '</td>';
                                echo '<td>' . $line[1] . '</td>';
                                echo '<td>' . $line[2] . '</td>';
                                echo '<td>' . $line[3] . '</td>';
                                echo '<td>' . $line[4] . '</td>';
                                echo '<td>' . $line[5] . '</td>';
                                echo '<td>' . $line[6] . '</td>';
                                echo '<td>' . $line[7] . '</td>';
                                echo '</tr>';
                            }
                        }
                        fclose($file);
                    } else {
                        echo '<tr><td colspan="8">Erreur lors de l\'ouverture du fichier.</td></tr>';
                    }
                } else {
                    echo '<tr><td colspan="8">Le fichier CSV n\'existe pas.</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
    <a  class="btn5" href="ecole.php">ajouter un quize</a>
</body>
</html>

