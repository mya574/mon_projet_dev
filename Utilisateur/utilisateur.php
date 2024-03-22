<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Utilisateur</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Page Utilisateur</h1>
        <button id="modifierInfosBtn">Profil</button>
        <button id="accéderQuizBtn">Accéder au Quiz</button>
        <button id="deconnexionBtn">Déconnexion</button>
        <div id="dashboard">
    
<script>
    document.getElementById("modifierInfosBtn").onclick = function () {
        location.href = "./modifier_infos.php";
    };

    document.getElementById("accéderQuizBtn").onclick = function () {
        location.href = "../quize/jouer/afficher_quiz.php";
    };

    document.getElementById("deconnexionBtn").onclick = function () {
        location.href = "../inscription et conexion/connexion.php";
    };
</script>

</body>
</html>

