<?php
if(isset($_GET['id']) && $_GET['id']!=null){
    $id = $_GET['id'];
    require('classes/Recette-has-ingredient.php');
    $ingredient = new RecetteHasIngredient;
    $delete = $ingredient->delete('recette_has_ingredient', $id, 'recette_id');
    $delete = $ingredient->delete('recette', $id);
    require('classes/Recette.php');
    $recette = new Recette;
    
}else{
    header('location:index.php');
}
