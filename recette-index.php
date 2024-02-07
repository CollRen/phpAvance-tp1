<?php
require_once('classes/Recette.php');
$recette = new Recette;
$select = $recette->select('recette', 'temps_preparation', 'desc');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index Recettes</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include('./menu.php');?>
    <h1>Vos recettes sont ici!</h1>
    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Temps de préparation</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($select as $row){
            ?>
            <tr>
                <td><a href="recette-show.php?id=<?= $row['id'];?>"><?= $row['titre']?></a></td>
                <td><a href="recette-show.php?id=<?= $row['id'];?>"><?= $row['temps_preparation']?></a></td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
    <a href="recette-create.php" class="btn" >Créer une recette</a>
</body>
</html>