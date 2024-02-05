<?php

$id = $_POST['id'];
require_once('classes/CRUD.php');
$crud = new CRUD;
$insert = $crud->delete('client', $id, 'client-index');