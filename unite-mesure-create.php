
<?php
    $redirectPost = 
    require('./classes/UMesure.php');
    if(isset($_POST['nom'])){
        $name = $_POST['nom'];
        new UMesure();
    }
?> 


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer unité de mesure</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include('./menu.php');?>
    <div class="container">
        <h2>Unité de mesure Create</h2>
        <form action="<?php $redirectPost ?>" method="post">
            <label>Nom
                <input type="text" name="nom">
            </label>
            <input type="submit" class="btn" value="Save">
        </form>
    </div>
</body>
</html>