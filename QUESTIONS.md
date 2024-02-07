# Questions pour Marcos

Mon fichier CRUD => Recette.php

1. Est-ce que c'est correcte d'utiliser PDO dans les autres classes que mon CRUD
2. Je pense faire une Classe parent pour Ingredient et UMesure étant donné qu'elles partageraient certaine méthode. Mais ce serait un parent, lui-même enfant de PDO
    - On peut faire ça (Je sais que ce serait fonctionnelle, mais est-ce une bonne pratique?)
    -  Sinon une autre solution pour éviter de se répéter: mettre ces méthodes dans Utility de façon static. Là il faudrait que ce soit un enfant de PDO?


