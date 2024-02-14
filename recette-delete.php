<?php
if(isset($_GET['id']) && $_GET['id']!=null){
    $id = $_GET['id'];
    require('classes/Recette-has-ingredient.php');
    $ingredient = new RecetteHasIngredient;
    $delete = $ingredient->delete('recette-has-ingredient', $id, 'recette-show', 'recette_id');
    require('classes/Recette.php');
    $recette = new Recette;
    /* $recette->delete('recette', $id, 'recette-show' ); */
    
}else{
    header('location:index.php');
}
