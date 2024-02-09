<?php
/* if(isset($_GET['id']) && $_GET['id']!=null){
    require_once('classes/Recette.php');
    $recette = new Recette;
    $selectId = $recette->selectId('recettes.recette', $_GET['id'], 'index');
    extract($selectId);
}else{
    exit;
    header('location:index.php'); 
}*/

    if(isset($_POST)){

        var_dump($_POST);

/*         require('./classes/Recette-has-ingredient.php');
        $recetteHasIng = new RecetteHasIngredient();
        $insert = $action = $recetteHasIng->insert('recettes.recette_has_ingredient', $_POST);
        header("location:recette-has-ingredient-insert.php" . $insert); */
    }
?> 

<!-- 
array(2) 
{ 
    ["qte"]=> array(8) 
    { 
        [0]=> string(1) "0" 
        [1]=> string(1) "0" 
        [2]=> string(1) "0" 
        [3]=> string(1) "0" 
        [4]=> string(1) "0" 
        [5]=> string(1) "0" 
        [6]=> string(1) "0" 
        [7]=> string(4) "0.75" 
    } 
    ["UMesure"]=> array(8) 
    { 
        [0]=> string(1) "1" 
        [1]=> string(1) "1" 
        [2]=> string(1) "1" 
        [3]=> string(1) "1" 
        [4]=> string(1) "1" 
        [5]=> string(1) "1" 
        [6]=> string(1) "1" 
        [7]=> string(1) "3" 
    } 
} 
-->

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

        <form action="<?php new Recette  ?>" method="post">
            <table>
                <thead>
                    <tr>
                        <td>Qté</td>
                        <td>U. Mesure</td>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <?php require_once('./classes/Ingredient.php'); 
                        $ingredient = new ingredient;
                        $ingredient = $ingredient->select('recettes.ingredient'); 
                        foreach ($ingredient as $rangees) { ?>

                        <td>
                            <label for="quantite[]"><input max="10" min="0" name="quantite[]" step=".25" type="number" value="0" /><?php echo $rangees['nom']; ?></label>
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