# phpAvance-tp1

## Étapes de réalisation et notes

- À ajouter au dossier VSC
    - SQL
    - Table PDF
    - README.me des instructions


## Git

- Annuler un git init
```
rm -rf .git
```

## Ordre des étapes

1. [...]-create => action="client-store.php" ---> action="unite-mesure-store.php"
2. [...]-store*
3. [...]-show => client ---> unite-mesure
4. [...]-index [C'est une liste de toutes les entrées]
5. [...]-edit [envoie vers update]  ______ Ici il y a le isset() en haut de page ::::: puis la redirection dans le action=""
6. [...]-delete
7. [...]-update* => update('client' ---> update('recettes.unite_mesure' [reste sur la même page (header("location:".$_SERVER['HTTP_REFERER']);)]


* insert('client' ---> insert('recettes.unite_mesure'
- client-show - unite-mesure-showt