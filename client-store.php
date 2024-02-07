<?php

require_once('classes/Recette.php');
$recette = new Recette;
$insert = $recette->insert('client', $_POST);

header("location:client-show.php?id=$insert");

?>

