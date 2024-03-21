<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lire les questions</title>
    <link rel="stylesheet" href="lire_question.css">
</head>
<body>
    <h1>Questionnaire</h1>
    <form action="resultat.php" method="post">
        <?php
            if(isset($_GET['qcm_name'])) {
                $qcm_name = $_GET['qcm_name'];
                $qcm_questions = file("../creation-quiz/qcm_questions.csv", FILE_IGNORE_NEW_LINES);
                if ($qcm_questions === false) {
                    die("Erreur lors de la lecture du fichier CSV des questions");
                }

                echo "<h2>$qcm_name</h2>";
                echo "<input type='hidden' name='qcm_name' value='$qcm_name'>";
                echo "<ol>";
                foreach ($qcm_questions as $question) {
                    $data = explode(",", $question);
                    if ($data[0] === $qcm_name) {
                        echo "<li>$data[2]</li>";
                        echo "<input type='hidden' name='question[]' value='{$data[2]}'>";
                        echo "<input type='radio' name='answer{$data[1]}' value='1'> {$data[3]}<br>";
                        echo "<input type='radio' name='answer{$data[1]}' value='2'> {$data[4]}<br>";
                        echo "<input type='radio' name='answer{$data[1]}' value='3'> {$data[5]}<br><br>";

                    }
                }
                echo "</ol>";
                echo "<button type='submit'>Voir le résultat</button>";
            } else {
                echo "Aucun QCM sélectionné.";
            }
        ?>
    </form>
</body>
</html>
