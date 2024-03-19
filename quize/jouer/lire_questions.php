<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questions du QCM</title>
    <link rel="stylesheet" href="styles.css"> <!-- Assurez-vous d'ajuster le lien vers votre fichier CSS -->
</head>
<body>
    <h1>Questions du QCM</h1>
    <form action="resultat.php" method="post">
        <div class="questions-container">
            <?php
                // Vérification si le paramètre qcm_name est présent dans l'URL
                if(isset($_GET['qcm_name'])) {
                    $selected_qcm = $_GET['qcm_name'];
                    
                    // Charger le fichier CSV contenant les questions
                    $qcm_questions = file("../creation-quiz/qcm_questions.csv", FILE_IGNORE_NEW_LINES);
                    if ($qcm_questions === false) {
                        die("Erreur lors de la lecture du fichier CSV des questions");
                    }
                    
                    // Parcourir les questions et afficher celles du QCM sélectionné
                    foreach ($qcm_questions as $qcm_question) {
                        $question_data = explode(",", $qcm_question);
                        $qcm_name = $question_data[0];
                        
                        // Vérifier si la question appartient au QCM sélectionné
                        if ($qcm_name === $selected_qcm) {
                            $question_number = $question_data[1];
                            $question_text = $question_data[2];
                            $option1 = $question_data[3];
                            $option2 = $question_data[4];
                            $option3 = $question_data[5];
                            $correct_answer_index = $question_data[6];
                            
                            // Afficher la question et les options avec des cases à cocher
                            echo "<div class='question'>";
                            echo "<p>$question_text</p>";
                            echo "<ul>";
                            echo "<li><input type='radio' name='question_$question_number' value='1'>$option1</li>";
                            echo "<li><input type='radio' name='question_$question_number' value='2'>$option2</li>";
                            echo "<li><input type='radio' name='question_$question_number' value='3'>$option3</li>";
                            echo "</ul>";
                            echo "</div>";
                        }
                    }
                } else {
                    echo "<p>Aucun QCM sélectionné.</p>";
                }
            ?>
        </div>
        <input type="submit" value="Valider">
    </form>
</body>
</html>
