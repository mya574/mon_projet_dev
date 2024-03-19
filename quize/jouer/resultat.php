<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultat du QCM</title>
    <link rel="stylesheet" href="styles.css"> <!-- Assurez-vous d'ajuster le lien vers votre fichier CSS -->
</head>
<body>
    <h1>Résultat du QCM</h1>
    <div class="score-container">
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $score = 0;
                // Charger le fichier CSV contenant les questions et réponses
                $qcm_questions = file("../creation-quiz/qcm_questions.csv", FILE_IGNORE_NEW_LINES);
                if ($qcm_questions === false) {
                    die("Erreur lors de la lecture du fichier CSV des questions");
                }
                
                // Parcourir les questions et comparer les réponses de l'utilisateur
                foreach ($qcm_questions as $qcm_question) {
                    $question_data = explode(",", $qcm_question);
                    $correct_answer_index = intval($question_data[6]);
                    $question_number = $question_data[1];
                    
                    // Vérifier si l'utilisateur a répondu à cette question
                    if (isset($_POST["question_$question_number"])) {
                        $user_answer = intval($_POST["question_$question_number"]);
                        
                        // Comparer la réponse de l'utilisateur avec la réponse correcte
                        if ($user_answer === $correct_answer_index) {
                            $score++;
                        }
                    }
                }
                
                // Afficher le score
                echo "<p>Nombre de questions correctes : $score</p>";
            } else {
                echo "<p>Accès invalide.</p>";
            }
        ?>
    </div>
</body>
</html>
