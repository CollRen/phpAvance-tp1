

<form action="<?php $action ?>" method="post">
    <table>
        <thead>
            <tr>

                <td>la</td>
                <td>Qté</td>
                <td>U. Mesure</td>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>
                <select name="ingredient_id">
                    <?php require_once('./classes/Ingredient.php'); 
                    $ing = new ingredient;
                    $ing = $ing->select('ingredient');   
                    foreach ($ing as $row) { ?>
                    
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['nom']; ?></option>
                    
                    <?php } ?></select>
                </td>


                <td>
                    <input max="10" min="0" name="quantite" step=".25" type="number" value="0" />
                </td>
                
                <td>
                    <select name="unite_mesure_id">
                        <?php require_once('./classes/UMesure.php'); 
                        $Umesure = new UMesure;
                        $Umesure = $Umesure->select('unite_mesure');
                        foreach ($Umesure as $row) { ?>
                        
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['nom']; ?></option>
                        
                        <?php } ?>
                    </select>
                </td>

        </tbody>
    </table>
    
    <input type="submit" class="btn" value="Save">
</form>



