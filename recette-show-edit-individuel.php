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
    <title>Recette (show)</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include('./menu.php');?>
    <div class="container">
        <h2>Voici votre recette (show)</h2>
        <hr>
        <p><strong>Titre:</strong> <?= $titre;?></p>
        <p><strong>Description:</strong> <?= $description;?></p>
        <p><strong>Temps de préparation:</strong> <?= $temps_preparation;?></p>
        <p><strong>Temps de cuisson:</strong> <?= $temps_cuisson;?></p>
        <a href="recette-edit.php?id=<?= $selectId;?>" class="btn">Edit</a>
        
        <form action=" <!-- Si je mets le code, ça delete directement à l'arrivée. Solution: envoyer vers une autre page à la pace -->" method="post">
            <input type="hidden" name="id" value="<?= $selectId;?>">
            <button class="btn red">Delete</button>
        </form>
    </div>
</body>
</html>