<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Administration - Utilisateurs</title>
<link rel="stylesheet" href="admin.css">
</head>
<body>
<header>
<h1>Bienvenue administrateur</h1>
<nav>
<ul>
<li><a href="premierepage.php">Accueil</a></li>
<li><a href="quize/jouer/afficher_quiz.php">Quiz</a></li>
<li><a href="deconnexion.php">Déconnexion</a></li>
</ul>
</nav>
</header>
<main>
<section class="dashboard">
<h2>Liste des utilisateurs</h2>
<table>
<tr>
<th>ID</th>
<th>Nom d'utilisateur</th>
<th>Email</th>
<th>Rôle</th>
</tr>
<?php
        // Lecture du fichier CSV et affichage des données
        if (($handle = fopen("utilisateurs.csv", "r")) !== FALSE) {
          while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            echo "<tr>";
            for ($i = 0; $i < count($data); $i++) {
              echo "<td>" . htmlspecialchars($data[$i]) . "</td>"; // Échappement pour éviter les attaques XSS
            }
            echo "</tr>";
          }
          fclose($handle);
        }
        ?>
</table>
</section>
</main>
<footer>
<p>© 2024 Quizzeo. Tous droits réservés.</p>
</footer>
</body>
</html>