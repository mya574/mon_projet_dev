<?php
session_start(); 
//on recupere les information entrer dans notr formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $qcm_name = $_POST['qcm_name'];
    $questions = $_POST['question'];
    $options1 = $_POST['option1'];
    $options2 = $_POST['option2'];
    $options3 = $_POST['option3'];
    $correct_answers = $_POST['correct_answer'];

    // Vérifiez si l'utilisateur est connecté grace a session  et on récupérez son rôle
    if (isset($_SESSION['role'])) {
        $role = $_SESSION['role'];
    } else {
        // Redirigez l'utilisateur vers la page de connexion s'il n'est pas connecté
        header('Location: ../../inscription et conexion/connexion.php');
        exit(); // stoper l'execution du script
    }

    // Ouvrir le fichier CSV pour ajouter les questions en mode append
    $qcm_questions_file = fopen("qcm_questions.csv", "a");
    if ($qcm_questions_file) {
        //parcour mon tableau de questions  
        for ($i = 0; $i < count($questions); $i++) {
            $line = "$qcm_name," . ($i + 1) . ",{$questions[$i]},{$options1[$i]},{$options2[$i]},{$options3[$i]},{$correct_answers[$i]},$role\n";
            fwrite($qcm_questions_file, $line);
        }
        fclose($qcm_questions_file);
    } else {
        echo "Erreur lors de l'écriture des questions.";
        exit(); 
    }

    
    $qcm_names_file = fopen("qcm_names.csv", "a");
    if ($qcm_names_file) {
        fwrite($qcm_names_file, "$qcm_name\n");
        fclose($qcm_names_file);
        echo "QCM créé avec succès !";
    } else {
        echo "Erreur lors de l'écriture du nom du QCM.";
    }
}
?>
