<?php
session_start(); // Démarrez la session pour accéder aux informations de l'utilisateur connecté

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $qcm_name = $_POST['qcm_name'];
    $questions = $_POST['question'];
    $options1 = $_POST['option1'];
    $options2 = $_POST['option2'];
    $options3 = $_POST['option3'];
    $correct_answers = $_POST['correct_answer'];

    // Vérifiez si l'utilisateur est connecté et récupérez son rôle
    if (isset($_SESSION['role'])) {
        $role = $_SESSION['role'];
    } else {
        // Redirigez l'utilisateur vers la page de connexion s'il n'est pas connecté
        header('Location: index.php');
        exit(); // Arrêtez le script après la redirection
    }

    // Ouvrir le fichier CSV pour ajouter les questions
    $qcm_questions_file = fopen("qcm_questions.csv", "a");
    if ($qcm_questions_file) {
        // Écrire les questions pour le nouveau QCM avec le nom du créateur
        for ($i = 0; $i < count($questions); $i++) {
            // Assurez-vous d'échapper les caractères spéciaux pour éviter les problèmes de format CSV
            $line = "$qcm_name," . ($i + 1) . ",{$questions[$i]},{$options1[$i]},{$options2[$i]},{$options3[$i]},{$correct_answers[$i]},$role\n";
            fwrite($qcm_questions_file, $line);
        }
        fclose($qcm_questions_file);
    } else {
        echo "Erreur lors de l'écriture des questions.";
        exit(); // Arrêter le script en cas d'erreur
    }

    // Ajouter le nom du QCM au fichier CSV des noms de QCM
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
