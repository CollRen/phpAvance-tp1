
<?php
/* if(isset($_GET['id']) && $_GET['id']!=null){
    require('classes/Recette.php');
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
        <h2>Recette add ingredients Create</h2>
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
                    
                    <?php require('./classes/Ingredient.php'); 
                    $ing = new ingredient;
                    $ing = $ing->getListeIngredients();
                    $i = 0;
                    foreach ($ing as $key =>$value) { ?>
                    <tr>
                        <td>
                            <?php echo $value['nom'] ?>
                        </td>

                        <td>
                            <input max="10" min="" name="<?php echo 'ingredient_id:' . $value['id'] ?>" step=".25" type="number" value="0" />
                        </td>
                        
                        <td>
                            <select
                                
                                <?php require('./classes/UMesure.php'); 
                                $Umes = new UMesure;
                                $Umes = $Umes->getListeUMesure();
                                foreach ($Umes as $key =>$value) { ?>

                                    name="<?php echo $value['nom'] . $i ?>">
                                        <option value="<?php echo $value['nom'] ?>"><?php echo $value['nom'] ?></option>
                                    <?php } ?>
                            </select>
                        </td>
                    </tr><?php $i++; } ?>
                </tbody>
            </table>
            <input type="submit" class="btn" value="Save">
        </form>
    </div>
</body>
</html>