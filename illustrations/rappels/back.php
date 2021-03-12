<?php

$name = $_POST['nom'];
$price = $_POST['prix'];


$tunnel = new PDO('mysql:host=localhost;dbname=wf3_787_rappels', 'root', '');
$tunnel->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$tunnel->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

$resultat = $tunnel->prepare("INSERT INTO products(titre, cout) VALUES(?, ?)");
$resultat->execute([$name, $price]);

?>