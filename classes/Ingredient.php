<?php
require_once('./classes/CRUD.php');
class Ingredient extends CRUD {  
    public array $listeingredient;
    private int $ingredientId;
    private string $nom;
    private string $tableName;
    private string $urlPrefix;
    public int $test;

    public function __construct(){
        parent::__construct('mysql:host=localhost;dbname=recettes;port=3306;charset=utf8', 'root', 'root');
        $this->tableName = 'recettes.ingredient';
        $this->urlPrefix = 'ingredient';
        $this->listeingredient = $this->select($this->tableName);
    }

    public function getListeingredient(){
        return $this->select($this->tableName);
    }
}