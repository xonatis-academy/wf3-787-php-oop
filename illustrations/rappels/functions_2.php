<?php

$maison = [
    'salle_de_bain' => [
        'ampoule' => [
            'kW' => 1000,
            'h' => 5
        ],
        'seche_cheveux' => [
            'kW' => 1500,
            'h' => 1
        ],
        'chauffage' => [
            'kWh' => 300
        ]
    ],
    'cuisine' => [
        'kWh' => 10000
    ],
    'salon' => [
        'coin_bibliotheque' => [
            'ampoule' => [
                'kW' => 500,
                'h' => 10
            ]
            ],
        'tv' => [
            'kWh' => 1500
        ]
    ]
];

function calculerConsoSalon($batiment) {
    $consoAmpoule = calculerConsoParMultiplication($batiment['salon']['coin_bibliotheque']['ampoule']);
    $consoTv = calculerConsoDirect($batiment['salon']['tv']);
    return $consoAmpoule + $consoTv;
}

function calculerConsoParMultiplication($eletro) {
    return $eletro['kW'] * $eletro['h'];
}

function calculerConsoDirect($eletro) {
    return $eletro['kWh'];
}

function calculerConsoSdb($batiment) {
    $consoAmpoule = calculerConsoParMultiplication($batiment['salle_de_bain']['ampoule']);
    $consoSecheCheveux = calculerConsoParMultiplication($batiment['salle_de_bain']['seche_cheveux']);
    $consoChauffage = calculerConsoDirect($batiment['salle_de_bain']['chauffage']);
    return $consoAmpoule + $consoSecheCheveux + $consoChauffage;
}

function calculerConsoCuisine($batiment) {
    $consoCsuine = calculerConsoDirect($batiment['cuisine']);
    return $consoCsuine;
}

function calculerConsoMaison($batiment) {
    $consoSdb = calculerConsoSdb($batiment);
    $consoCusine = calculerConsoCuisine($batiment);
    $consoSalon = calculerConsoSalon($batiment);
    return $consoSdb + $consoCusine + $consoSalon;
}

$consomationTotal = calculerConsoMaison($maison);

?>