<?php

/* print_r($_POST);

require_once('classes/Recette.php');
$recette = new Recette;
$update = $recette->update('recettes.unite_mesure', $_POST); */


$redirectPost = 
require('./classes/UMesure.php');
if(isset($_POST['nom'])){
    $name = $_POST['nom'];
    $uMesure = new UMesure();
    $uMesure->update('recettes.unite_mesure', $_POST);
}

