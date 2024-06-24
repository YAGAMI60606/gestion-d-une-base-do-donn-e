<html>
<?php
    // Définition du tableau associatif
    $notes_apprenants = array(
        "Mohamed" => "16",
        "Ahmed" => "14",
        "Rafika" => "13",
        "Aicha" => "15",
        "Samir" => "13",
        "Samar" => "13",
        "Rafik" => "10",
        "Samiha" => "09",
        "Fourat" => "07",
        "Sami" => "07",
        "Noura" => "14"
    );

    // a. Afficher le tableau en deux colonnes Nom et Note
    echo "<h3>Tableau des notes :</h3>";
    echo "<table border='1'>";
    echo "<tr><th>Nom</th><th>Note</th></tr>";
    foreach($notes_apprenants as $nom => $note) {
        echo "<tr><td>$nom</td><td>$note</td></tr>";
    }
    echo "</table>";

    // b. Trier le tableau par clés croissantes
    ksort($notes_apprenants);
    echo "<h3>Tableau trié par clés croissantes :</h3>";
    echo "<table border='1'>";
    echo "<tr><th>Nom</th><th>Note</th></tr>";
    foreach($notes_apprenants as $nom => $note) {
        echo "<tr><td>$nom</td><td>$note</td></tr>";
    }
    echo "</table>";

    // c. Trier le tableau par ordre de mérite
    $names = array_keys($notes_apprenants);
    $notes = array_values($notes_apprenants);
    array_multisort($notes, SORT_DESC, $names, SORT_ASC, $notes_apprenants);
    echo "<h3>Tableau trié par ordre de mérite :</h3>";
    echo "<table border='1'>";
    echo "<tr><th>Nom</th><th>Note</th></tr>";
    foreach($notes_apprenants as $nom => $note) {
        echo "<tr><td>$nom</td><td>$note</td></tr>";
    }
    echo "</table>";

    // d. Afficher le nom de celui qui a eu la meilleure note
    $meilleure_note = max($notes_apprenants);
    $meilleur_eleve = array_search($meilleure_note, $notes_apprenants);
    echo "<h3>Meilleure note :</h3>";
    echo "L'élève avec la meilleure note est $meilleur_eleve avec une note de $meilleure_note.";

    // e. Déterminer la moyenne de la classe
    $moyenne = array_sum($notes_apprenants) / count($notes_apprenants);
    echo "<h3>Moyenne de la classe :</h3>";
    echo "La moyenne de la classe est $moyenne.";

    // f. Effectuer un tirage au sort et afficher l'apprenant gagnant
    $gagnant = array_rand($notes_apprenants);
    echo "<h3>Tirage au sort :</h3>";
    echo "L'apprenant gagnant est $gagnant.";
    ?>

</html>