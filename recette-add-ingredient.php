<?php

if(isset($_GET['id']) && $_GET['id']!=null){
    require_once('classes/Recette.php');
    $recette = new Recette;
    $id = $_GET['id'];
    $selectId = $recette->selectId($_GET['id'], 'index');
    extract($selectId);
}else{
    header('location:index.php');
}

/**
 * Lancer l'enregistrement seulement si la quantité > 0;
 */
if(isset($_POST['ingredient_id']) && $_POST['quantite'] > 0){
    require_once('./classes/Recette-has-ingredient.php');
    $recetteHasIngredient = new RecetteHasIngredient;
    $lastInsertId[] = $recetteHasIngredient->insert($_POST, $id);
    $count = count($lastInsertId);
    }
?> 

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création Recette</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <?php include('./menu.php');?>
    </header>
    <div class="container">
        <h2>Ajouter maintenant les ingrédients</h2>

        <?php include('./recette-add-ingredient-form.php') ?>
            
        <h3>Ingrédients</h3>

        <ul><?php 
            /**
             * Quantité
             */
            require_once('classes/Recette-has-ingredient.php');
            $ingredient = new RecetteHasIngredient;
            $ingredients = $ingredient->selectAll($id);
            $count = count($ingredients);
            for ($i=0; $i < $count; $i++) {

                /**
                 * Unité de mesure
                 */
                $quantite = $ingredients[$i]['quantite'];
                echo '<li>' . ' ' . $quantite;

                require_once('classes/UMesure.php');
                $uniteMesure = new UMesure;
                $selectIdUMesure = $uniteMesure->selectId($ingredients[$i]['unite_mesure_id'], 'index');
                extract($selectIdUMesure);
                echo ' ' . $nom;

                /**
                 * Nom de l'ingrédient
                 */
                require_once('classes/Ingredient.php');
                $recette = new Ingredient;
                $selectIdIng = $recette->selectId($ingredients[$i]['ingredient_id'], 'index');
                extract($selectIdIng);
                echo ' ' . $nom . '</li>';
            }?>
        </ul>
      
        <a href="recette-show.php?id=<?= $id;?>" class="btn">Afficher la recette</a>

    </div>
</body>
</html>