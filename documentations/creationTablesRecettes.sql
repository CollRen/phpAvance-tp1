create database recettes;

create table recette(
id int not null auto_increment primary key,
titre VARCHAR(60),
description text(256),
temps_preparation VARCHAR(12),
temps_cuisson VARCHAR(12)
);

create table unite_mesure(
id INT not null auto_increment primary key,
nom VARCHAR(20)
);

create table ingredient(
id int not null auto_increment primary key,
nom varchar(45) not null unique
);

create table recette_has_ingredient(
recette_id INT,
ingredient_id INT,
quantite VARCHAR(45),
unite_mesure_id INT,
constraint fk_recette_id foreign key (recette_id) REFERENCES recette (id),
constraint fk_ingredient_id foreign key (ingredient_id) REFERENCES ingredient (id)
);

INSERT INTO ingredient (`id`, `nom`) VALUES 
(NULL, 'Oignon'),
(NULL, 'Poivron'),
(NULL, 'Épices'),
(NULL, 'Fromage'),
(NULL, 'Viande'),
(NULL, 'Fines herbes'),
(NULL, 'Fruit'),
(NULL, 'Légume');

INSERT INTO unite_mesure (`id`, `nom`) VALUES 
(NULL, 'Tbs'),
(NULL, 'tsp'),
(NULL, 'Cup'),
(NULL, 'lb'),
(NULL, 'oz'),
(NULL, 'ml');
