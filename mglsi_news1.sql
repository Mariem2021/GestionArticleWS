CREATE DATABASE IF NOT EXISTS mglsi_news1;
USE mglsi_news1;

DROP TABLE IF EXISTS Article, Categorie, Utilisateurs, RoleUtilisateur;

CREATE TABLE Article(
	id int primary key auto_increment,
	titre varchar(255),
	contenu text,
	dateCreation datetime DEFAULT NOW(),
	dateModification datetime DEFAULT NOW(),
	categorie int,
	editeur int
);


CREATE TABLE Categorie(
	id int primary key auto_increment,
	libelle varchar(20)
);

CREATE TABLE Utilisateurs(
	id int primary key auto_increment,
	nom varchar(255),
	prenom varchar(255),
	login varchar(100),
	password varchar(100),
	roleUtilisateur int
);

CREATE TABLE RoleUtilisateur(
	id int primary key auto_increment,
	nomRole varchar(100)
);


INSERT INTO Categorie(libelle) VALUES ('Sport'), ('Santé'), ('Education'), ('Politique');

INSERT INTO RoleUtilisateur(nomRole) VALUES ('éditeurs'), ('administrateurs');

INSERT INTO Article (titre, contenu, categorie, dateCreation, dateModification, editeur) VALUES ('Première victoire du Sénégal', 'Lorem ipsum dolor sit amet,.', 1,'2021-10-10','2021-10-12',1),
	('Election en Mauritanie', 'Lorem ipsum dolor sit amet, ',4,'2021-10-10','2021-10-12',1),
	('Pétrole au Sénégal', 'Lorem ipsum dolor sit amet, .', 4,'2021-09-10','2021-09-12',2),
	("Inauguration d'un ENO à l'UVS", 'Lorem ipsum dolor sit amet, .', 3,'2021-08-10','2021-08-12',2),
	("Communiqué cas coronavirus", 'Lorem ipsum dolor sit amet, .', 2,'2021-11-06','2021-11-06',3),
	("Ligues des champions: favoris", 'Lorem ipsum dolor sit amet, .', 1,'2021-11-05','2021-11-05',3),
	("Environnement et maladies cardiovasculaires", 'Lorem ipsum dolor sit amet, .', 2,'2021-11-04','2021-11-04',2),
	("Basket Sénégalais au devant", 'Lorem ipsum dolor sit amet, .', 1,'2021-11-03','2021-11-03',2);

INSERT INTO Utilisateurs (nom, prenom, login, password, RoleUtilisateur) VALUES ('NDIAYE', 'Victorine', 'victorine@esp.sn', 'passer', 2),
	('AIDARA', 'Marieme', 'marieme@esp.sn', 'passer', 1),
	('Mouhamed Mahmoud', 'Zeynebou', 'zeynebou@esp.sn', 'passer', 1);

ALTER TABLE Article ADD CONSTRAINT fk_categorie_article FOREIGN KEY(categorie) REFERENCES Categorie(id);
ALTER TABLE Utilisateurs ADD CONSTRAINT fk_utilisateurs_roleUtilisateur FOREIGN KEY(roleUtilisateur) REFERENCES RoleUtilisateur(id);
ALTER TABLE Article ADD CONSTRAINT fk_utilisateurs_article FOREIGN KEY(editeur) REFERENCES Utilisateurs(id);
