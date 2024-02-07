<?php

require('./classes/Recette.php');
class UMesure extends PDO {

    public int $UMesureId;
    public string $nom;
    private string $tableName;
    private string $urlPrefix;
    private array $listeUMesure;

    public function __construct(){
        parent::__construct('mysql:host=localhost;dbname=recettes;port=3306;charset=utf8', 'root', 'root');
        $this->tableName = 'recettes.unite_mesure';
        $this->urlPrefix = 'unite-mesure';
        $this->listeUMesure = $this->select();
    }

    public function getListeUMesure(){
        return $this->listeUMesure;
    }

    public function redirect(){
        require_once('./classes/Utility.php');
        Utility::redirect($this->urlPrefix . '-show.php', $this->UMesureId );
    }

    public function select(){
        $sql = "SELECT * FROM $this->tableName ORDER BY 'id' 'asc'";
        $stmt = $this->query($sql);
        return $stmt->fetchAll();
    }

}