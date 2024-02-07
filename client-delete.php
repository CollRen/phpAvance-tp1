<?php

$id = $_POST['id'];
require_once('classes/Recette.php');
$recette = new Recette;
$insert = $recette->delete('client', $id, 'client-index');