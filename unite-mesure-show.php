<?php
if(isset($_GET['id']) && $_GET['id']!=null){
    require_once('classes/CRUD.php');
    $crud = new CRUD;
    $selectId = $crud->selectId('recettes.unite_mesure', $_GET['id'], 'unite-mesure-index');
    extract($selectId);
}else{
    header('location:unite-mesure-index.php');
}?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unité de mesure (show)</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include('./menu.php');?>
    <div class="container">
        <h2>Afficher (show) les unités de mesure</h2>
        <hr>
        <p><strong>Nom:</strong> <?= $nom;?></p>
        <a href="unite-mesure-edit.php?id=<?= $id;?>" class="btn">Edit</a>
        <form action="unite-mesure-delete.php" method="post">
            <input type="hidden" name="id" value="<?= $id;?>">
            <button class="btn red">Delete</button>
        </form>
    </div>
</body>
</html>