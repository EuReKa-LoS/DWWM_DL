DROP DATABASE IF EXISTS `Projet`;
CREATE DATABASE IF NOT EXISTS `Projet` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `Projet`;

#------------------------------------------------------------
# Table: Users
#------------------------------------------------------------

CREATE TABLE Users(
        id Int  Auto_increment  NOT NULL ,
        nom  Text NOT NULL,
		prenom  Text NOT NULL,
		mdp  Text NOT NULL
	,CONSTRAINT Labels_PK PRIMARY KEY (id)
)ENGINE=InnoDB;

#------------------------------------------------------------
# Table: Labels
#------------------------------------------------------------

CREATE TABLE Labels(
        code_label Int  Auto_increment  NOT NULL ,
        nom_label  Text NOT NULL
	,CONSTRAINT Labels_PK PRIMARY KEY (code_label)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Disques
#------------------------------------------------------------

CREATE TABLE Disques(
        code_disque Int  Auto_increment  NOT NULL ,
        titre       Text NOT NULL ,
        annee       Text NOT NULL ,
        code_label  Int NOT NULL
	,CONSTRAINT Disques_PK PRIMARY KEY (code_disque)

	,CONSTRAINT Disques_Labels_FK FOREIGN KEY (code_label) REFERENCES Labels(code_label)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Artistes
#------------------------------------------------------------

CREATE TABLE Artistes(
        code_artiste Int  Auto_increment  NOT NULL ,
        nom_artiste  Text NOT NULL ,
		prenom_artiste  Text NOT NULL 
	,CONSTRAINT Artistes_PK PRIMARY KEY (code_artiste)
	)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: y participe
#------------------------------------------------------------

CREATE TABLE y_participe(
        code_artiste Int NOT NULL ,
        code_disque  Int NOT NULL
	,CONSTRAINT y_participe_PK PRIMARY KEY (code_artiste,code_disque)

	,CONSTRAINT y_participe_Artistes_FK FOREIGN KEY (code_artiste) REFERENCES Artistes(code_artiste)
	,CONSTRAINT y_participe_Disques0_FK FOREIGN KEY (code_disque) REFERENCES Disques(code_disque)
)ENGINE=InnoDB;