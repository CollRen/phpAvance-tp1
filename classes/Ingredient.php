<?php
require_once('./classes/CRUD.php');
class Ingredient extends CRUD {  
    public $listeingredient;
    private $ingredientId;
    private $nom;
    private $tableName;
    private $urlPrefix;

    public function __construct(){
        parent::__construct('mysql:host=localhost;dbname=e2395944;port=3306;charset=utf8', 'e2395944', 'oE99Yi8EHOIhG94Bil11');
        $this->tableName = 'ingredient';
        $this->urlPrefix = 'ingredient';
        $this->listeingredient = $this->select($this->tableName);
    }

    public function getListeingredient(){
        return $this->select($this->tableName);
    }
}