<?php

$id = $_POST['id'];
require_once('classes/Recette.php');
$recette = new Recette;
$insert = $recette->delete('recettes.unite_mesure', $id, 'unite-mesure-index');

