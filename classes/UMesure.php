<?php

require_once('./classes/CRUD.php');
class UMesure extends CRUD {
    private int $UMesureId;
    private string $nom;
    private string $tableName;
    private string $urlPrefix;

    public function __construct(){
        parent::__construct();
        $this->tableName = 'recettes.unite_mesure';
        $this->urlPrefix = 'unite-mesure';
        $this->UMesureId = $this->insert($this->tableName, $_POST);
        $this->nom = $this->getNom();
        $this->redirect();
    }

    public function getUMesureTempsTotal(){
        return $this->nom; // À mettre en place éventuellement.
    }

    public function getNom(){
        return $this->selectFromDB($this->tableName, $this->UMesureId);
    }

    public function redirect(){
        require_once('./classes/Utility.php');
        Utility::redirect($this->urlPrefix . '-show.php', $this->UMesureId );
    }


}