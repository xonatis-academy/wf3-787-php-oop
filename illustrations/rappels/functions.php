<?php

function calculerNombreDeCheveuxPourAge(int $age): int {
    $resultat = 1000 / $age;
    return $resultat;
    // return 1000 / $age;
}

// Je "calcule le nombre de cheveux pour un age" avec $age
// et je mets le résultat dans $nombreDeCheveux
$nombreDeCheveux = calculerNombreDeCheveuxPourAge($age);

?>