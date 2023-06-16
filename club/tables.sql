create table personne (
    prs_id integer not null AUTO_INCREMENT,
    identifiant varchar(50) not null,
    nom varchar(50) not null,
    prenom varchar(50) not null,
    mdp varchar(60) not null,
    date_naissance date not null,
    email varchar(50) not null,
    telephone varchar(20) not null,
    fonction varchar(50) not null,
    PRIMARY KEY (prs_id, identifiant)
);

create table mdp (
    id integer not null,
    mot_de_passe varchar(50) not null,
    FOREIGN KEY (id) REFERENCES personne(prs_id)
);

create table tarif (
    prs_id integer not null,
    prix numeric(5,2) not null,
    FOREIGN KEY (prs_id) REFERENCES personne(prs_id)
);

create table classement (
    id integer not null,
    niveau varchar(10) not null,
    FOREIGN KEY (id) REFERENCES personne(prs_id)
);


create table description (
    id integer not null,
    contenu varchar(1000) not null,
    FOREIGN KEY (id) REFERENCES personne(prs_id)
);


create table disponibilites (
    id integer not null,
    jour varchar(20) not null,
    h_debut time not null,
    h_fin time not null,
    FOREIGN KEY (id) REFERENCES personne(prs_id)
);


create table matche (
    m_id integer not null,
    a1_id integer not null,
    a2_id integer not null,
    date_j date not null,
    h_debut time not null,
    h_fin time not null,
    PRIMARY KEY (m_id),
    FOREIGN KEY (a1_id) REFERENCES personne(prs_id),
    FOREIGN KEY (a2_id) REFERENCES personne(prs_id)
);

create table feedback ( 
    f_id integer not null,
    m_id integer not null,
    prs_id integer not null,
    avis varchar(50) not null, 
    PRIMARY KEY (f_id),
    FOREIGN KEY (m_id) REFERENCES matche(m_id),
    FOREIGN KEY (prs_id) REFERENCES personne(prs_id)
);
