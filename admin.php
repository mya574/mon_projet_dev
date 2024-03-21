<?php
session_start();

// Vérification du rôle de l'utilisateur
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    // Redirection vers la page de connexion si l'utilisateur n'est pas un administrateur
    header('Location: login.php');
    exit;
}

// Traitement des actions de l'administrateur ici
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
    </header>
    <nav>
        <!-- Menu de navigation pour les fonctionnalités administratives -->
    </nav>
    <main>
        <!-- Contenu principal de l'interface d'administration -->
    </main>
    <footer>
        <!-- Pied de page -->
    </footer>
</body>
</html>
