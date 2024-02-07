<?php

require_once('./classes/UMesure.php');
$name = $_POST['nom'];
$uMesure = new UMesure($_POST);


/* require_once('classes/CRUD.php');
$crud = new CRUD;
$insert = $crud->insert('recettes.unite_mesure', $_POST);

require_once('./classes/Utility.php');
Utility::redirect('unite-mesure-show.php', $insert ) */
?>
