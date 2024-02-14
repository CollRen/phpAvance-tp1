<?php
require_once('./classes/CRUD.php');
class RecetteHasEtape extends CRUD {
    private int $recettehasEtapeId;
    private string $recette_id_name;
    private string $etape_id_name;
    private string $unite_mesure_id_name;
    private string $quantiteName;
    
    private string $nom;
    private string $tableName;
    private string $urlPrefix;
    private array $post;
    private array $arrayToInsert;

    public function __construct(){
        parent::__construct('mysql:host=localhost;dbname=recettes;port=3306;charset=utf8', 'root', 'root');
        $this->tableName = 'recette_has_etape';
        $this->arrayToInsert = array();
        $this->recette_id_name = 'recette_id';
        $this->etape_id_name = 'etape_id';
        
    }
    /** S'il y a plusieurs ingrédients à ajouter en même temps */
    public function setProp($post, $recetteId) {
        for ($i = 0; $i < count($post[$this->etape_id_name]); $i++) {    
            
        }
        header("location:".$_SERVER['HTTP_REFERER']);
    }

    public function selectAll($id, $order = 'asc'){
        $sql = "SELECT * FROM $this->tableName WHERE $this->recette_id_name = $id ORDER BY $this->etape_id_name $order";
        $stmt = $this->query($sql);
        return $stmt->fetchAll();
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