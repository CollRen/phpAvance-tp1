<?php
require_once('./classes/CRUD.php');
class UMesure extends CRUD {

    public int $UMesureId;
    public string $nom;
    private $tableName;
    private $urlPrefix;
    private $listeUMesure;

}