<?php

class Ingredient extends PDO { 
    public array $listeingredient;
    private int $ingredientId;
    private string $nom;
    private string $tableName;
    private string $urlPrefix;

    public function __construct(){
        parent::__construct('mysql:host=localhost;dbname=recettes;port=3306;charset=utf8', 'root', 'root');
        $this->tableName = 'recettes.ingredient';
        $this->urlPrefix = 'ingredient';
        $this->listeingredient = $this->select();
    }

    public function getListeingredient(){
        return $this->listeingredient;
    }

    public function select(){
        $sql = "SELECT * FROM $this->tableName ORDER BY 'id' 'asc'";
        $stmt = $this->query($sql);
        return $stmt->fetchAll();
    }
}