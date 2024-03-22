<?php
// Chemin vers le fichier CSV contenant les informations utilisateur
$fichierCSV = '../inscription et conexion/utilisateurs.csv';

// Récupérer les valeurs du formulaire
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$identifiant = $_POST['identifiant'];
$motdepasse = $_POST['motdepasse'];
$role = $_POST['role'];


$password_hash = password_hash($_POST['motdepasse'], PASSWORD_DEFAULT);

// Charger les informations utilisateur existantes
$informationsUtilisateur = lireInformationsUtilisateur($fichierCSV);

// Mettre à jour les informations utilisateur dans le tableau
$nouvellesInformations = [];
foreach ($informationsUtilisateur as $utilisateur) {
    if ($utilisateur[2] == $identifiant) {
        // Mettre à jour les informations pour cet utilisateur
        $utilisateur = [$nom, $prenom, $identifiant, $password_hash, $role];
    }
    $nouvellesInformations[] = $utilisateur;
}

// Écrire les nouvelles informations dans le fichier CSV
if (ecrireInformationsUtilisateur($fichierCSV, $nouvellesInformations)) {
    echo "Les informations utilisateur ont été mises à jour avec succès.";
} else {
    echo "Une erreur s'est produite lors de la mise à jour des informations utilisateur.";
}

// Fonction pour lire les informations utilisateur depuis un fichier CSV
function lireInformationsUtilisateur($fichier) {
    $informations = [];
    if (($handle = fopen($fichier, "r")) !== FALSE) {
        while (($data = fgetcsv($handle)) !== FALSE) {
            $informations[] = $data;
        }
        fclose($handle);
    }
    return $informations;
}

// Fonction pour écrire les informations utilisateur dans un fichier CSV
function ecrireInformationsUtilisateur($fichier, $nouvellesInformations) {
    if (($handle = fopen($fichier, "w")) !== FALSE) {
        foreach ($nouvellesInformations as $ligne) {
            fputcsv($handle, $ligne);
        }
        fclose($handle);
        return true;
    } else {
        return false;
    }
}

// Rediriger l'utilisateur vers la page utilisateur après la mise à jour
header("Location: ./utilisateur.php");
exit();
?>


