<?php

require('./classes/Recette.php');

class RecetteHasIngredient extends PDO {
    private int $recetteId;
    private string $nom;
    private string $tableName;
    private string $urlPrefix;

    public function __construct(){
        parent::__construct('mysql:host=localhost;dbname=recettes;port=3306;charset=utf8', 'root', 'root');
        $this->tableName = 'recettes.recette_has_ingredient';
    }

    public function select(){
        $sql = "SELECT * FROM $this->tableName ORDER BY 'id' 'asc'";
        $stmt = $this->query($sql);
        return $stmt->fetchAll();
    }

    public function insert($table, $data){


        print_r($data);
        echo '<br><br><br>';

        /* $fieldName = implode(', ', array_keys($data));
        $fieldValue = ':'.implode(', :', array_keys($data));

        $sql = "INSERT INTO $table ($fieldName) VALUES ($fieldValue);";
        
        //return $sql;

        $stmt = $this->prepare($sql);
        foreach($data as $key=>$value){
            $stmt->bindValue(":$key", $value);
        }
        if($stmt->execute()){

            require_once('./classes/Utility.php');
            Utility::redirect($this->urlPrefix . '-add-ingredient', $this->lastInsertId());
        }else{
            print_r($stmt->errorInfo());
        }   */
    }
}