
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
            <input type="submit" class="btn" value="Save">
        </form>
    </div>
</body>
</html>