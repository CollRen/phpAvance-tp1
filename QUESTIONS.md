# Questions pour Marcos

## action
- update: 
```php
action="<?php if(isset($_POST['titre'])) {$update = $recette->update('recette', $_POST);}  ?>"
```

### Dans Recette.php

1. comment voir un var_dump() du update

____________________

0. Suis-je sur la bonne voie avec la page recette-create.php et avec les classes Recette et Recette-has-ingredient?

1. Est-ce correct d'utiliser PDO dans les autres classes que mon CRUD (Mon fichier CRUD => Recette.php)

2. Je pense faire une Classe parent pour Ingredient et UMesure étant donné qu'elles partageraient certaine méthodes. Mais ce serait un parent, lui-même enfant de PDO, alors:
    - On peut faire ça (Je sais que ce serait fonctionnelle, mais est-ce une bonne pratique?)

3. J'ai pensé utiliser le insert de la classe Recette et séparer $data pour enregistrer les données de deux tables différents (Mais finalement, j'envoie vers le page recette-add-ingredient pour que l'usager ajouter les ingrédients et la qté qu'il veut ). Je suis d'ailleurs bloqué sur le foreach de cette page...

ex. recette_has_ingredient
id_recette
id_ingredient
Quantité
id_unite_mesure

class Ingredient extends PDO : Est-ce vraiment la bonne façon de faire?

4. Fichier d'instructions d'installation dans la racine du projet?



