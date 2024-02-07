<?php


class Ingredient extends PDO {
    public array $listeIngredients;
    private int $ingredientId;
    private string $nom;
    private string $tableName;
    private string $urlPrefix;

    public function __construct(){
        parent::__construct('mysql:host=localhost;dbname=recettes;port=3306;charset=utf8', 'root', 'root');
        $this->tableName = 'recettes.ingredient';
        $this->urlPrefix = 'ingredient';
        $this->listeIngredients = $this->select();
    }

    public function setProps($id, $nom){
        $this->ingredientId = $id;
        $this->nom = $nom;
    }

    public function getListeIngredients(){
        return $this->listeIngredients;
    }

    public function select(){
        $sql = "SELECT * FROM $this->tableName ORDER BY 'id' 'asc'";
        $stmt = $this->query($sql);
        return $stmt->fetchAll();
    }
}