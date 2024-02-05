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
    <title>Client</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Client</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>phone</th>
                <th>Zip Code</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($select as $row){
            ?>
            <tr>
                <td><a href="client-show.php?id=<?= $row['id'];?>"><?= $row['name']?></a></td>
                <td><?= $row['address']?></td>
                <td><?= $row['phone']?></td>
                <td><?= $row['zip_code']?></td>
                <td><?= $row['email']?></td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
    <a href="client-create.php" class="btn" >Client Create</a>
</body>
</html>