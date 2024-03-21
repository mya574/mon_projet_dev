<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultat du QCM</title>
    <link rel="stylesheet" href="resulta.css">
</head>
<body>
 <div class="contenu">
    <h1>Résultat du QCM</h1>
    <?php
        if(isset($_POST['qcm_name'])) {
            $qcm_name = $_POST['qcm_name'];

            $qcm_questions = file("../creation-quiz/qcm_questions.csv", FILE_IGNORE_NEW_LINES);
            if ($qcm_questions === false) {
                die("Erreur lors de la lecture du fichier CSV des questions");
            }

            $score = 0;
            $total_questions = 0;
            foreach ($qcm_questions as $question) {
                $data = explode(",", $question);
                if ($data[0] === $qcm_name) {
                    $total_questions++;
                    $user_answer = isset($_POST['answer' . $data[1]]) ? intval($_POST['answer' . $data[1]]) : null;
                    $correct_answer = intval($data[6]);
                    if ($user_answer !== null && $user_answer === $correct_answer) {
                        $score++;
                    }
                }
            }
            
            echo "<p>Votre score pour le QCM \"$qcm_name\" est de $score sur $total_questions.</p>";
        } else {
            echo "Aucune donnée de QCM reçue.";
        }
    ?>
 </div>
</body>
</html>
