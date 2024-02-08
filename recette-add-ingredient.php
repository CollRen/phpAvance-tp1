
<?php
/* if(isset($_GET['id']) && $_GET['id']!=null){
    require_once('classes/Recette.php');
    $recette = new Recette;
    $selectId = $recette->selectId('recettes.recette', $_GET['id'], 'index');
    extract($selectId);
}else{
    header('location:index.php');
}
$tableName = 'recettes.recette';
$value = $id;
$url = 'index'; */


    if(isset($_POST['nom'])){
        require('./classes/Recette-has-ingredient.php');
        $recetteHasIng = new RecetteHasIngredient();
        $action = $recetteHasIng->insert('recettes.recette_has_ingredient', $_POST);
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
<?php include('./menu.php');?>

    <div class="container">
        <h2>Recette add ingredient Create</h2>

        <form action="<?php $action  ?>" method="post">
            <table>
                <thead>
                    <tr>
                        <td>Ingrédients</td>
                        <td>Qté</td>
                        <td>U. Mesure</td>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <?php require_once('./classes/Ingredient.php'); 
                        $ing = new ingredient;
                        $ing = $ing->getListeingredient(); 
                        foreach ($ing as $row) { ?>

                        <td>
                            <?php echo $row['nom']; ?>
                        </td>

                        <td>
                            <input max="10" min="0" name="qte[]" step=".25" type="number" value="0" />
                        </td>
                        
                        <td>
                            <select name="UMesure[]">
                                <?php require_once('./classes/UMesure.php'); 
                                $Umesure = new UMesure;
                                $Umesure = $Umesure->getListeUMesure();
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