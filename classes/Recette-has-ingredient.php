<?php
require_once('./classes/CRUD.php');
class RecetteHasIngredient extends CRUD {
    private int $recettehasIngredientId;
    private string $recette_id_name;
    private string $ingredient_id_name;
    private string $unite_mesure_id_name;
    private string $quantiteName;
    
    private string $nom;
    private string $tableName;
    private string $urlPrefix;
    private array $post;
    private array $arrayToInsert;

    public function __construct(){
        parent::__construct('mysql:host=localhost;dbname=recettes;port=3306;charset=utf8', 'root', 'root');
        $this->tableName = 'recettes.recette_has_ingredient';
        $this->arrayToInsert = array();
        $this->recette_id_name = 'recette_id';
        $this->ingredient_id_name = 'ingredient_id';
        $this->unite_mesure_id_name = 'unite_mesure_id';
        $this->quantiteName = 'quantite';
        
    }
    /** S'il y a plusieurs ingrédients à ajouter en même temps */
    public function setProp($post, $recetteId) {
        for ($i = 0; $i < count($post[$this->ingredient_id_name]); $i++) {    
            if($post[$this->quantiteName][$i] > 0 ) {
                $this->arrayToInsert[$this->recette_id_name] = $recetteId;
                $this->arrayToInsert[$this->ingredient_id_name] = $post[$this->ingredient_id_name][$i];
                $this->arrayToInsert[$this->quantiteName] = $post[$this->quantiteName][$i];
                $this->arrayToInsert[$this->unite_mesure_id_name] = $post[$this->unite_mesure_id_name][$i];
                $this->insert($this->tableName, $this->arrayToInsert);
                $this->arrayToInsert = array_diff($this->arrayToInsert, $this->arrayToInsert);
            }
        }
        header("location:".$_SERVER['HTTP_REFERER']);
    }

    public function selectAll($id, $order = 'asc'){
        $sql = "SELECT * FROM $this->tableName WHERE $this->recette_id_name = $id ORDER BY $this->ingredient_id_name $order";
        $stmt = $this->query($sql);
        return $stmt->fetchAll();
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

    public function insert($data, $id){
        $table = $this->tableName;
        $data[$this->recette_id_name] = $id;

        $fieldName = implode(', ', array_keys($data));
        $fieldValue = ':'.implode(', :', array_keys($data));

        $sql = "INSERT INTO $table ($fieldName) VALUES ($fieldValue);";
        
        //return $sql;

        $stmt = $this->prepare($sql);
        foreach($data as $key=>$value){
            $stmt->bindValue(":$key", $value);
        }
        if($stmt->execute()){
            return $this->lastInsertId();
        }else{
            print_r($stmt->errorInfo());
        }      
    }


}