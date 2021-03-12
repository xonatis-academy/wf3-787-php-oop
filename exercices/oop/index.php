<?php

include __DIR__.'/classes.php';

$rex = new Chien();
$rex->groupeSanguin = 'O+';
$rex->aboie();
$rex->mange();

$felix = new Chat();
$felix->nettoie();

$garfield = new Chat();
$garfield->nettoie();

$didier = new Veto();
$didier->soigne($rex);
$didier->soigne($felix);

?>

