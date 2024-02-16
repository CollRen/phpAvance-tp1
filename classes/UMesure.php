<?php
require_once('./classes/CRUD.php');
class UMesure extends CRUD {

    public int $UMesureId;
    public string $nom;
    private $tableName;
    private $urlPrefix;
    private $listeUMesure;

    public function __construct(){
        parent::__construct('mysql:host=localhost;dbname=recettes;port=3306;charset=utf8', 'root', 'root');
        $this->tableName = 'unite_mesure';
        $this->listeUMesure = $this->select($this->tableName);
    }

    public function getListeUMesure(){
        return $this->select($this->tableName);
    }
}