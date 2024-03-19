// Fonction pour afficher le formulaire de modification des informations
document.getElementById('modifierInfosBtn').addEventListener('click', function() {
    // Afficher le formulaire ou implémenter une logique de modification
    alert("Implémentez la logique pour modifier les informations utilisateur ici.");
});

// Fonction pour accéder au quiz
document.getElementById('accéderQuizBtn').addEventListener('click', function() {
    // Rediriger vers la page du quiz ou implémenter la logique du quiz
    alert("Implémentez la logique pour accéder au quiz ici.");
});

// Exemple d'historique des quiz (à remplacer par des données réelles)
var historiqueQuiz = ["Quiz 1 - 10/03/2024", "Quiz 2 - 12/03/2024", "Quiz 3 - 14/03/2024"];

// Afficher l'historique des quiz dans la dashboard
var dashboard = document.getElementById('dashboard');
historiqueQuiz.forEach(function(quiz) {
    var quizElement = document.createElement('p');
    quizElement.textContent = quiz;
    dashboard.appendChild(quizElement);
});
