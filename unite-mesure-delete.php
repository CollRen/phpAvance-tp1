<?php

$id = $_POST['id'];
require_once('classes/CRUD.php');
$crud = new CRUD;
$insert = $crud->delete('recettes.unite_mesure', $id, 'unite-mesure-index');

