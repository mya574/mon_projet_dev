<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créateur de QCM</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="navbar">
        <div class="logo">
            <img src="quizzeo-removebg-preview.png" alt="Logo">
        </div>
        <div class="menu">
            <a href="entreprise2.php">mes quizes</a>
            <a href="entreprise.php">cree</a>
            <a href="../inscription et conexion/connexion.php">Deconnexion</a>
        </div>
    </div>
 <div class="tout">
    <h1>Créateur de QCM</h1>
    <form action="create_qcm.php" method="post">
        <label for="qcm_name">Nom du QCM :</label>
        <input type="text" id="qcm_name" name="qcm_name" required>
        <br><br>
        <div id="questions_container">
            <div class="question">
                <label for="question">Question :</label>
                <input type="text" name="question[]" required>
                <label for="option1">Option 1 :</label>
                <input type="text" name="option1[]" required>
                <label for="option2">Option 2 :</label>
                <input type="text" name="option2[]" required>
                <label for="option3">Option 3 :</label>
                <input type="text" name="option3[]" required>
                <label for="correct_answer">Réponse Correcte :</label>
                <select name="correct_answer[]" required>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                </select>
                <button type="button" onclick="removeQuestion(this)">Supprimer la question</button>
            </div>
        </div>
        <button  class="btn1" type="button" onclick="addQuestion()">Ajouter une question</button>
        <br><br>
        <button  class="btn3"type="submit">Créer QCM</button>
    </form>
    </div>
    <script>
        function addQuestion() {
            var container = document.getElementById("questions_container");
            var newQuestion = document.createElement("div");
            newQuestion.classList.add("question");
            newQuestion.innerHTML = `
                <label for="question">Question :</label>
                <input type="text" name="question[]" required>
                <label for="option1">Option 1 :</label>
                <input type="text" name="option1[]" required>
                <label for="option2">Option 2 :</label>
                <input type="text" name="option2[]" required>
                <label for="option3">Option 3 :</label>
                <input type="text" name="option3[]" required>
                <label for="correct_answer">Réponse Correcte :</label>
                <select name="correct_answer[]" required>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                </select>
                <button type="button" onclick="removeQuestion(this)">Supprimer la question</button>
            `;
            container.appendChild(newQuestion);
        }

        function removeQuestion(button) {
            var questionDiv = button.parentElement;
            questionDiv.remove();
        }
    </script>
</body>
</html>
