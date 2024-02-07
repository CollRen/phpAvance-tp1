<?php

require('./classes/Recette.php');
class UMesure extends PDO {

    public int $UMesureId;
    public string $nom;
    private string $tableName;
    private string $urlPrefix;

    public function __construct(){
        parent::__construct('mysql:host=localhost;dbname=recettes;port=3306;charset=utf8', 'root', 'root');
        $this->tableName = 'recettes.unite_mesure';
        $this->urlPrefix = 'unite-mesure';
    }

    private function getUMesureNames($table, $field = 'id', $order = 'asc'){

    }

    public function redirect(){
        require_once('./classes/Utility.php');
        Utility::redirect($this->urlPrefix . '-show.php', $this->UMesureId );
    }

    public function insert($table, $data){

        $fieldName = implode(', ', array_keys($data));
        $fieldValue = ':'.implode(', :', array_keys($data));

        $sql = "INSERT INTO $table ($fieldName) VALUES ($fieldValue);";
        
        //return $sql;

        $stmt = $this->prepare($sql);
        foreach($data as $key=>$value){
            $stmt->bindValue(":$key", $value);
        }
        if($stmt->execute()){
            /* return $this->lastInsertId(); */
            require_once('./classes/Utility.php');
            Utility::redirect($this->urlPrefix . '-show.php', $this->lastInsertId());
        }else{
            print_r($stmt->errorInfo());
        }      
    }

    public function select(){
        $sql = "SELECT * FROM $this->tableName ORDER BY 'id' 'asc'";
        $stmt = $this->query($sql);
        return $stmt->fetchAll();
    }

}