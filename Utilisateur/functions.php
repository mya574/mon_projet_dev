<?php
// Fonction pour lire les informations utilisateur depuis un fichier CSV
function lireInformationsUtilisateur($fichier) {
    $informations = [];
    if (($handle = fopen($fichier, "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $informations[] = $data;
        }
        fclose($handle);
    }
    return $informations;
}

// Fonction pour écrire les informations utilisateur dans un fichier CSV
function ecrireInformationsUtilisateur($fichier, $nouvellesInformations) {
    if (($handle = fopen($fichier, "a")) !== FALSE) {
        fputcsv($handle, $nouvellesInformations);
        fclose($handle);
        return true;
    } else {
        return false;
    }
}
?>
