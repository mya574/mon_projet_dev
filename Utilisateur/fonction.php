<?php
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
