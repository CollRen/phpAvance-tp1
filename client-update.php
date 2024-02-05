<?php

print_r($_POST);

require_once('classes/CRUD.php');
$crud = new CRUD;
$update = $crud->update('client', $_POST);

//echo $update;

