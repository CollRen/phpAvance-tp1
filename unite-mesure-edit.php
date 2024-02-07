<?php
if(isset($_GET['id']) && $_GET['id']!=null){
    require_once('classes/CRUD.php');
    $crud = new CRUD;
    $selectId = $crud->selectId('recettes.unite_mesure', $_GET['id'], 'unite-mesure-index');
    extract($selectId);
}else{
    header('location:unite-mesure-index.php');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>unite-mesure Edit</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include('./menu.php');?>
    <div class="container">
        <h2>unite-mesure (edit (= Update))</h2>
        <form action="unite-mesure-update.php" method="post">
            <input type="hidden" name="id" value="<?= $id;?>">
            <label>Nom
                <input type="text" name="nom" value="<?= $nom;?>">
            </label>
            <input type="submit" class="btn" value="Update">
        </form>
    </div>
</body>
</html>