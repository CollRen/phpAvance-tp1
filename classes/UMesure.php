<?php
require_once('./classes/CRUD.php');
class UMesure extends CRUD {

    public int $UMesureId;
    public string $nom;
    private string $tableName;
    private string $urlPrefix;
    private array $listeUMesure;

    public function __construct(){
        parent::__construct('mysql:host=localhost;dbname=recettes;port=3306;charset=utf8', 'root', 'root');
        $this->tableName = 'recettes.unite_mesure';
        $this->urlPrefix = 'unite-mesure';
        $this->listeUMesure = $this->select($this->tableName);
    }

    public function getListeUMesure(){
        return $this->select($this->tableName);
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