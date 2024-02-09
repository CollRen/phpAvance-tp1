<?php 

$arrayToInsert = [['recette_id'],['ingredient_id'],['quantite'],['unite_mesure_id']];

echo '<br><br> arrayToInsert:';
print_r($arrayToInsert);
for ($i=0; $i < $nbrDeDonnees ; $i++) { 
    echo '<br><br>';
    if($_POST['quantite'][$i] > 0){
        $arrayToInsert['recette_id'] = $_GET['id'];
        $arrayToInsert['ingredient_id'] = $_POST['ingredient_id'][$i];
        $arrayToInsert['quantite'] = $_POST['quantite'][$i];
        $arrayToInsert['unite_mesure_id'] = $_POST['unite_mesure_id'][$i];
        /*         echo $_GET['id'];
        echo '<br><br>';
        print_r($_POST['ingredient_id'][$i]);
        echo '<br><br>';
        print_r($_POST['quantite'][$i]);
        echo '<br><br>';
        print_r($_POST['unite_mesure_id'][$i]); */
    }
    foreach ($arrayToInsert as $key => $value) {
        echo 'ICI::::_____________________<br>';
        echo $key;
        echo '<br><br>';
        echo $value;
    }
/* $data = $arrayToInsert[0];
$fieldName = implode(', ', array_keys($data));
    echo '<br><br>fieldName:<br>';
    print_r($fieldName);
    $fieldValue = ':'.implode(', :', array_keys($data));
    echo '<br><br>fielValue:<br>';
    print_r($fieldValue); */
}
echo 'CECI:<br>';
print_r($data);

/* 
Ce que l'on recherche
fieldName:
titre, description, temps_preparation, temps_cuisson

fielValue:
:titre, :description, :temps_preparation, :temps_cuisson



Array ( [titre] => Titre 9 [description] => des [temps_preparation] => temp [temps_cuisson] => tempc u ) */

/* array(2) 
{ 
    ["quantite"]=> array(8) 
    { 
        [0]=> string(4) "0.75" 
        [1]=> string(1) "0" 
        [2]=> string(1) "0" 
        [3]=> string(1) "0" 
        [4]=> string(1) "0" 
        [5]=> string(1) "0" 
        [6]=> string(1) "0" 
        [7]=> string(1) "0" 
    } 
    ["unite_mesure_id"]=> array(8) 
    { 
        [0]=> string(1) "1" 
        [1]=> string(1) "1" 
        [2]=> string(1) "1" 
        [3]=> string(1) "1" 
        [4]=> string(1) "1" 
        [5]=> string(1) "1" 
        [6]=> string(1) "1" 
        [7]=> string(1) "1" 
    } 
} */
    if(isset($_GET['id']) && $_GET['id']!=null){
        require_once('classes/Recette-has-ingredient.php');
        $hasIngredient = new RecetteHasIngredient;
        $insert = $hasIngredient->insert('recette_has_ingredient', $_POST);
        header("location:recette-show.php?id=$insert");
    }
?>
    
    


