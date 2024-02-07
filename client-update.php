<?php

print_r($_POST);

require_once('classes/Recette.php');
$recette = new Recette;
$update = $recette->update('client', $_POST);

echo $update;

