# Questions pour Marcos




0. Suis-je sur la bonne voie avec la page recette-create.php et avec les classes Recette et Recette-has-ingredient?

1. Est-ce correct d'utiliser PDO dans les autres classes que mon CRUD (Mon fichier CRUD => Recette.php)

2. Je pense faire une Classe parent pour Ingredient et UMesure étant donné qu'elles partageraient certaine méthodes. Mais ce serait un parent, lui-même enfant de PDO, alors:
    - On peut faire ça (Je sais que ce serait fonctionnelle, mais est-ce une bonne pratique?)

3. J'ai un insert dans la classe Recette où je pense séparer $data pour enregistrer les données dans les tables respectivent

ex. recette_has_ingredient
id_recette
id_ingredient
Quantité
id_unite_mesure
