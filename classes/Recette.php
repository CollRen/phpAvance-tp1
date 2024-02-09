<?php
require_once('./classes/CRUD.php');
class Recette extends CRUD {

    private int $recetteId;
    private string $titre;
    private string $tempsPreparation;
    private string $tempsCuisson;
    private string $urlPrefix;
    private string $tableName;


    public function __construct(){
        parent::__construct('mysql:host=localhost;dbname=ecommerce;port=3306;charset=utf8', 'root', 'root');
        $this->urlPrefix = 'recette';
        $this->tableName = 'recettes.recette';
    }

    public function getUMesureTempsTotal(){
        return $this->tempsPreparation + $this->tempsCuisson ;
    }

    public function redirect(){
        require_once('./classes/Utility.php');
        Utility::redirect($this->urlPrefix . '-show.php', $this->recetteId );
    }

    public function setProp($post) {

        $this->recetteId = $this->insert($this->tableName, $post);
        return header("location:recette-add-ingredient.php?id=$this->recetteId");

    }

    public function selectId($value, $url, $field = 'id'){
        $sql = "SELECT * FROM $this->tableName WHERE $field = :$field";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$field", $value);
        $stmt->execute();

        $count = $stmt->rowCount();
        if($count == 1) {
            return $stmt->fetch();
        }else{
            header("location:$url.php");
            exit;
        }

    }
}

?>