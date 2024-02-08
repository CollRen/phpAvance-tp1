<?php

class Recette extends PDO {

    private int $recetteId;
    private string $titre;
    private string $tempsPreparation;
    private string $tempsCuisson;
    private string $urlPrefix;
    private string $tableName;


    public function __construct(){
        parent::__construct('mysql:host=localhost;dbname=recettes;port=3306;charset=utf8', 'root', 'root');
        $this->urlPrefix = 'recette';
        $this->tableName = 'recettes.recette';
        /* $this->insert($this->tableName, $_POST); */
    }

    public function getUMesureTempsTotal(){
        return $this->tempsPreparation + $this->tempsCuisson ;
    }

    public function getNom(){
        return $this->selectFromDB('recettes.recette', $this->recetteId);
    }

    public function redirect(){
        require_once('./classes/Utility.php');
        Utility::redirect($this->urlPrefix . '-show.php', $this->recetteId );
    }


    public function select($table, $field = 'id', $order = 'asc'){
        $sql = "SELECT * FROM $table ORDER BY $field $order";
        $stmt = $this->query($sql);
        return $stmt->fetchAll();
    }
    
    public function getName($table, $field, $filter){
        $sql = "SELECT * FROM $table WHERE $field = $filter";
        $stmt = $this->query($sql);
        return $stmt->fetchAll();
    }

    public function selectId($table, $value, $url, $field = 'id'){
        $sql = "SELECT * FROM $table WHERE $field = :$field";
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
    public function selectFromDB($table, $value){
        return 'Ceci est mon nom';
        $sql = "SELECT * FROM $table WHERE id = $value";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":id", $value);
        $stmt->execute();

        $count = $stmt->rowCount();
        if($count == 1) {
            return $stmt->fetch();
        }else{
            print_r($stmt->errorInfo());
            exit;
        }

    }

    public function insert($table, $data){

        // array ingrédients: $data["checkboxArr"]
        print_r($data);
        echo '<br><br><br>';
 // Résultat:
      /*   
   Array ( [titre] => [description] => [temps_preparation] => [temps_cuisson] => [ingredient_id:5] => 0.5 [ingredient_id:8] => 1.5 [ingredient_id:6] => 0 [ingredient_id:9] => 0 [ingredient_id:10] => 0 [ingredient_id:3] => 0.75 [ingredient_id:4] => 0 [ingredient_id:7] => 0 )
        */
        $fieldName = implode(', ', array_keys($data));
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
        }  
    }

    public function update($table, $data, $field = 'id'){
        $fieldName = null;
        foreach($data as $key=>$value){
            $fieldName .= "$key = :$key, ";
        }
        
        $fieldName = rtrim($fieldName, ', ');
        print_r($fieldName);

        $sql = "UPDATE $table SET $fieldName WHERE $field = :$field;";
        
        $stmt = $this->prepare($sql);
        foreach($data as $key=>$value){
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();

        $count = $stmt->rowCount();
        if($count == 1){
            header("location:".$_SERVER['HTTP_REFERER']);
        }else{
            print_r($stmt->errorInfo());
        }

        return $sql;
    }

    public function delete($table, $value, $url, $field = 'id'){
        $sql = "DELETE FROM $table WHERE $field = :$field";

        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$field", $value);
        $stmt->execute();

        $count = $stmt->rowCount();
        if($count == 1){
            header("location:$url.php");
        }else{
            print_r($stmt->errorInfo());
        }
    }
}

?>