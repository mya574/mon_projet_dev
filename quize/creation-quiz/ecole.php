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
            <img src="logo.png" alt="Logo">
        </div>
        <div class="menu">
            <a href="ecole2.php">mes quiz</a>
            <a href="ecole.php">créer</a>
            <a href="../inscription et conexion/connexion.php">Déconnexion</a>
        </div>
    </div>
  <div class="tout">
    <h1>Créer votre quiz</h1>
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
                <button   type="button" onclick="removeQuestion(this)">Supprimer la question</button>
            </div>
        </div>
        <button class="btn1" type="button" onclick="addQuestion()">Ajouter une question</button>
        <br><br>
        <button class="btn3" type="submit">Créer le quiz</button>
    </form>
    </div>
    <script>
        function addQuestion() { //j'appelle ma fenction
            var container = document.getElementById("questions_container");//id present sur la div cont le form
            var newQuestion = document.createElement("div");
            newQuestion.classList.add("question");//ajoute le css de class countainer
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
            var questionDiv = button.parentElement;//l'element parent du bouton cliquer
            questionDiv.remove();
        }
    </script>
</body>
</html>
