<?php
if(isset($_GET['recette_id']) && $_GET['recette_id']!=null){
    print_r($_GET);
/*     require('classes/Recette.php');
    $recette = new Recette;
    $selectId = $recette->selectId($_GET['id'], 'index', 'recette');
    extract($selectId); */
}else{
    echo 'NON';
    print_r($_GET);
    //header('location:index.php');
}

$recetteId = $_GET['recette_id'];

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


    <?php require_once('./classes/Recette-has-ingredient.php'); 
    $ing = new RecetteHasIngredient;
    $ing = $ing->selectWhere('recette_has_ingredient', 'recette_id', $recetteId);   
    foreach ($ing as $row) { 
            $ingredientId = $row['ingredient_id'];
            $ingredients = $ingredient->selectAll($ingredientId);
            ?>

        <select name="ingredient">
            
        <option value="<?php echo $row['recette_id']; ?>"><?php echo $row['ingredient_id']; ?></option>

    </select>
    <?php } ?>


<ul><?php 
    /**
     * Quantité
     */
    require_once('classes/Recette-has-ingredient.php');
    $ingredient = new RecetteHasIngredient;
    $ingredients = $ingredient->selectAll($recetteId);
    $count = count($ingredients);
    for ($i=0; $i < $count; $i++) {

        /**
         * Unité de mesure
         */
        $quantite = $ingredients[$i]['quantite'];
        echo '<li>' . ' ' . $quantite;

        require_once('classes/UMesure.php');
        $uniteMesure = new UMesure;
        $selectIdUMesure = $uniteMesure->selectId($ingredients[$i]['unite_mesure_id'], 'index', 'unite_mesure');
        extract($selectIdUMesure);
        echo ' ' . $nom;

        /**
         * Nom de l'ingrédient
         */
        require_once('classes/Ingredient.php');
        $recette = new Ingredient;
        $selectIdIng = $recette->selectId($ingredients[$i]['ingredient_id'], 'index','ingredient');
        extract($selectIdIng);
        echo ' ' . $nom . '</li>';
    }?>
</ul>
<body>
<?php include('./menu.php');?>
    <div class="container">
        <h2>Ajuster les ingrédients</h2>
        <ul><?php 
            /**
             * Quantité
             */
            require_once('classes/Recette-has-ingredient.php');
            $ingredient = new RecetteHasIngredient;
            $ingredients = $ingredient->selectAll($recetteId);
            $count = count($ingredients);
            for ($i=0; $i < $count; $i++) {

                /**
                 * Unité de mesure
                 */
                $quantite = $ingredients[$i]['quantite'];
                echo '<li>' . ' ' . $quantite;

                require_once('classes/UMesure.php');
                $uniteMesure = new UMesure;
                $selectIdUMesure = $uniteMesure->selectId($ingredients[$i]['unite_mesure_id'], 'index', 'unite_mesure');
                extract($selectIdUMesure);
                echo ' ' . $nom;

                /**
                 * Nom de l'ingrédient
                 */
                require_once('classes/Ingredient.php');
                $recette = new Ingredient;
                $selectIdIng = $recette->selectId($ingredients[$i]['ingredient_id'], 'index', 'ingredient');
                extract($selectIdIng);
                echo ' ' . $nom . '</li>';
            }?>
        </ul>





<form action="<?php $action ?>" method="post">
    <table>
        <thead>
            <tr>

                <td>la</td>
                <td>Qté</td>
                <td>U. Mesure</td>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>
                <select name="ingredient_id">
                    <?php require_once('./classes/Ingredient.php'); 
                    $ing = new ingredient;
                    $ing = $ing->select('ingredient');   
                    foreach ($ing as $row) { ?>
                    
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['nom']; ?></option>
                    
                    <?php } ?></select>
                </td>


                <td>
                    <input max="10" min="0" name="quantite" step=".25" type="number" value="0" />
                </td>
                
                <td>
                    <select name="unite_mesure_id">
                        <?php require_once('./classes/UMesure.php'); 
                        $Umesure = new UMesure;
                        $Umesure = $Umesure->select('unite_mesure');
                        foreach ($Umesure as $row) { ?>
                        
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['nom']; ?></option>
                        
                        <?php } ?>
                    </select>
                </td>

        </tbody>
    </table>
    
    <input type="submit" class="btn" value="Save">
</form>




    </div>
</body>
</html>