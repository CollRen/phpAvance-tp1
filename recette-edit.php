<?php
if(isset($_GET['id']) && $_GET['id']!=null){
    require('classes/Recette.php');
    $recette = new Recette;
    $selectId = $recette->selectId($_GET['id'], 'index');
    extract($selectId);
}else{
    header('location:index.php');
}
isset($_POST['titre'])

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>recette Edit</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include('./menu.php');?>
    <div class="container">
        <h2>recette (edit (= Update))</h2>
        <form action="<?php if(isset($_POST['titre'])) {$update = $recette->update('recette', $_POST);}  ?>" method="post">
            <input type="hidden" name="id" value="<?= $id;?>">
            <label>Titre
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