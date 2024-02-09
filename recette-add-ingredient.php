<?php

if(isset($_GET['id']) && $_GET['id']!=null){
    require_once('classes/Recette.php');
    $recette = new Recette;
    $id = $_GET['id'];
    $selectId = $recette->selectId('recettes.recette', $_GET['id'], 'index');
    extract($selectId);
}else{
    header('location:index.php');
}
print_r($_POST);
echo '<br>';
echo '<br>';
echo '<br>';
$arrayToInsert = array();

if(isset($_POST['ingredient_id'])){

    for ($i = 0; $i < 7; $i++) { 
        if($_POST['quantite'][$i] > 0 ) {
            $arrayToInsert['recette_id'] = $id;
            $arrayToInsert['ingredient_id'] = $_POST['ingredient_id'][$i];
            $arrayToInsert['quantite'] = $_POST['quantite'][$i];
            $arrayToInsert['unite_mesure_id'] = $_POST['unite_mesure_id'][$i];
            require_once('./classes/Recette-has-ingredient.php');
            $recetteHasIngredient = new RecetteHasIngredient;
            $recetteHasIngredient->setProp($arrayToInsert);
        }
    }
    


/*     require_once('./classes/Recette-has-ingredient.php');
    $hasIngredient = new RecetteHasIngredient();
    $action = $hasIngredient->setProp($_POST); */
    } else {
        echo 'marche pas';
    }

/*         require('./classes/Recette-has-ingredient.php');
        $recetteHasIng = new RecetteHasIngredient();
        $insert = $action = $recetteHasIng->insert('recettes.recette_has_ingredient', $_POST);
        header("location:recette-has-ingredient-insert.php" . $insert); 
    }*/
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
<?php include('./menu.php');?>
    <div class="container">
        <h2>Recette add ingredient Create</h2>

        <form action="<?php $action ?>" method="post">
            <table>
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Ingrédients</td>
                        <td>Qté</td>
                        <td>U. Mesure</td>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <?php require_once('./classes/Ingredient.php'); 
                        $ing = new ingredient;
                        $ing = $ing->select('recettes.ingredient'); 
                        foreach ($ing as $row) { ?>
                        <td>
                        <input type="text" name="ingredient_id[]" value="<?php echo $row['id']; ?>"/>
                        </td>
                        <td>
                       
                            <?php echo $row['nom']; ?>
                        </td>

                        <td>
                            <input max="10" min="0" name="quantite[]" step=".25" type="number" value="0" />
                        </td>
                        
                        <td>
                            <select name="unite_mesure_id[]">
                                <?php require_once('./classes/UMesure.php'); 
                                $Umesure = new UMesure;
                                $Umesure = $Umesure->select('recettes.unite_mesure');
                                foreach ($Umesure as $row) { ?>
                                
                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['nom']; ?></option>
                                
                                <?php } ?>
                            </select>
                        </td>
                    </tr><?php } ?>
                </tbody>
            </table>
            <input type="submit" class="btn" value="Save">
        </form>
    </div>
</body>
</html>