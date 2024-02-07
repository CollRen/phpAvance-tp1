
<?php
    if(isset($_POST['titre'])){
        require('./classes/Recette.php');
        $recette = new Recette();
        $action = $recette->insert('recettes.recette', $_POST);
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
        <h2>Recette Create</h2>
        <form action="<?php $action  ?>" method="post">
            <label>Titre
                <input type="text" name="titre">
            </label>
            <label>Description
                <input type="text" name="description">
            </label>
            <label>Temps de préparation
                <input type="text" name="temps_preparation">
            </label>
            <label>Temps de cuisson
                <input type="text" name="temps_cuisson">
            </label>
            <table>
                <thead>
                    <tr>
                        <td>Ingrédients</td>
                        <td>Qté</td>
                        <td>U. Mesure</td>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php require_once('./classes/Ingredient.php'); 
                    $ing = new ingredient;
                    $ing = $ing->getListeIngredients();
                    foreach ($ing as $key =>$value) { $i = 0; ?>
                    <tr>
                        <td>
                            <label class="checkbox" for="<?php echo $value['nom'] ?>"><?php echo $value['nom'] ?>
                                <input type="checkbox" name="checkboxArr[]" value="<?php echo $value['nom'] ?>" />
                            </label>
                        </td>
                        <td><input max="10" min="" name="quantite" step=".25" type="number" value="0" /></td>
                        <td>
                            <select>
                                <option value=""></option>
                                <?php require_once('./classes/UMesure.php'); 
                                $Umes = new UMesure;
                                $Umes = $Umes->getListeUMesure();
                                foreach ($Umes as $key =>$value) { 
                                    $i = 0;?>

                                    name="<?php echo $value['nom'] ?>">
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