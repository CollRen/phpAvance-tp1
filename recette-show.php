<?php

if(isset($_GET['id']) && $_GET['id']!=null){

    require('classes/Recette.php');
    $recette = new Recette;
    $selectId = $recette->selectId($_GET['id'], 'index');
    extract($selectId);
    
    $idOfPage = $id;
    

/*     require_once('classes/Recette-has-ingredient.php');
    $recetteHI = new RecetteHasIngredient;
    $selectIdHI = $recette->selectId($_GET['id'], 'index');
    extract($selectIdHI); */

}else{
    
    /* header('location:index.php'); */
}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recette (show)</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include('./menu.php');?>
    <div class="affiche-recette">
        <h2><?= $titre;?></h2>
        <hr>
        <p class="temps"><strong>Préparation</strong> <?= $temps_preparation;?></p>
        <p class="temps"><strong>Cuisson</strong> <?= $temps_cuisson;?></p>
        <hr>
        <p><?= $description;?></p>

        <h3>Ingrédients</h3>

        <ul><?php 
            /**
             * Quantité
             */
            require('classes/Recette-has-ingredient.php');
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
            
         <a href="recette-edit.php?id=<?= $idOfPage;?>" class="btn">Changer la recette</a>
         
         <a href="recette-ingredient-edit.php?id=<?= $idOfPage;?>" class="btn">Changer les ingrédients</a>
        <form action=" <!-- Si je mets le code, ça delete directement à l'arrivée. Solution: envoyer vers une autre page à la pace -->" method="post">
            <input type="hidden" name="id" value="<?= $idOfPage ;?>">
            <button class="btn red">Delete</button>
        </form>
    </div>
</body>
</html>