<?php
require_once('classes/CRUD.php');
$crud = new CRUD;
$select = $crud->select('client', 'name', 'desc');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index UM</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include('./menu.php');?>
    <h1>Index des unités de mesure</h1>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($select as $row){
            ?>
            <tr>
                <td><a href="unite-mesure-show.php?id=<?= $row['id'];?>"><?= $row['nom']?></a></td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
    <a href="unite-mesure-create.php" class="btn" >Créer une unité de mesure</a>
</body>
</html>