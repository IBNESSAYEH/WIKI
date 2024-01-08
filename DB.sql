

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    isAdmin BOOLEAN NOT NULL
) ENGINE=InnoDB;


CREATE TABLE categorie (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL
) ENGINE=InnoDB;


CREATE TABLE wiki (
    id INT PRIMARY KEY AUTO_INCREMENT,
    titre VARCHAR(255) NOT NULL,
    contenu TEXT NOT NULL,
    id_categorie INT,
    id_user INT,
    FOREIGN KEY (id_categorie) REFERENCES categorie(id),
    FOREIGN KEY (id_user) REFERENCES users(id)
) ENGINE=InnoDB;


CREATE TABLE tag (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL
) ENGINE=InnoDB;


CREATE TABLE wikiTag (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_wiki INT,
    id_tag INT,
    FOREIGN KEY (id_wiki) REFERENCES wiki(id),
    FOREIGN KEY (id_tag) REFERENCES tag(id)
) ENGINE=InnoDB;



alter table wiki add column isAccepted int ;
alter table wiki add column date_creation date ;
