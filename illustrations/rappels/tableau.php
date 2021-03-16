<?php

$tableau = [2, 3, 'bonjour'];
echo $tableau[1];

$tableau_assoc = [
    0 => 2,
    10 => 3,
    1 => 'bonjour'
];
echo $tableau_assoc[10];

$vendeur = [
    'nom' => 'Dupont',
    'prenom' => 'Maxime'
];
echo $vendeur['prenom'];

$vendeur = ['Dupont', 'Maxime'];
echo $vendeur[1];

$maison = [
    'salle_de_bain' => [
        'ampoule' => 'Phillips'
    ]
];
echo $maison['salle_de_bain']['ampoule'];
?>