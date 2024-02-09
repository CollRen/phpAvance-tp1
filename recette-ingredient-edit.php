<?php
if(isset($_GET['id']) && $_GET['id']!=null){
    require('classes/Recette.php');
    $recette = new Recette;
    $selectId = $recette->selectId($_GET['id'], 'index');
    extract($selectId);
}else{
    header('location:index.php');
}


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>recette Edit</title>
    <link rel="stylesheet" href="css/style.css">
</head>



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
<body>
<?php include('./menu.php');?>
    <div class="container">
        <h2>Ajuster les ingrédients</h2>

        <form action="<?php if(isset($_POST['titre'])) {$update = $recette->update('recette', $_POST);}  ?>" method="post">
            <input type="hidden" name="id" value="<?= $id;?>">
            <label>Ingrédients
                <input type="text" name="titre" value="<?= $titre;?>">
            </label>
            <label>Description
                <input type="text" name="description" value="<?= $description;?>">
            </label>
            <label>Temps de préparation
                <input type="text" name="temps_preparation" value="<?= $temps_preparation;?>">
            </label>
            <label>Temps de cuisson
                <input type="text" name="temps_cuisson" value="<?= $temps_cuisson;?>">
            </label>
            <input type="submit" class="btn" value="Update">
        </form>
    </div>
</body>
</html>