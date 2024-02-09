<?php
require_once('./classes/CRUD.php');
class RecetteHasIngredient extends CRUD {
    private int $recettehasIngredientId;
    private string $nom;
    private string $tableName;
    private string $urlPrefix;
    private array $post;
    private array $arrayToInsert;

    public function __construct(){
        parent::__construct('mysql:host=localhost;dbname=recettes;port=3306;charset=utf8', 'root', 'root');
        $this->tableName = 'recettes.recette_has_ingredient';
        $this->arrayToInsert = array();
        
    }

    public function setProp($post, $recetteId) {
        for ($i = 0; $i < count($post['ingredient_id']); $i++) {    
            if($post['quantite'][$i] > 0 ) {
                $this->arrayToInsert['recette_id'] = $recetteId;
                $this->arrayToInsert['ingredient_id'] = $post['ingredient_id'][$i];
                $this->arrayToInsert['quantite'] = $post['quantite'][$i];
                $this->arrayToInsert['unite_mesure_id'] = $post['unite_mesure_id'][$i];
                $this->insert($this->tableName, $this->arrayToInsert);
                $this->arrayToInsert = array_diff($this->arrayToInsert, $this->arrayToInsert);
            }
        }
        header("location:".$_SERVER['HTTP_REFERER']);
    }

}