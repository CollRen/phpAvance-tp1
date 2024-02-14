<?php
require_once('./classes/CRUD.php');
class Recette extends CRUD {

    private int $recetteId;
    private string $titre;
    private string $description;
    private string $tempsPreparation;
    private string $tempsCuisson;



    public function __construct(){
        parent::__construct('mysql:host=localhost;dbname=ecommerce;port=3306;charset=utf8', 'root', 'root');
    }

    public function getUMesureTempsTotal(){
        return $this->tempsPreparation + $this->tempsCuisson ;
    }

    public function redirect(){
        require_once('./classes/Utility.php');
        Utility::redirect('-show.php', $this->recetteId );
    }

    public function setProp($post) {

        $this->recetteId = $this->insert('recette', $post);
        return header("location:recette-add-ingredient.php?id=$this->recetteId");

    }
}

?>