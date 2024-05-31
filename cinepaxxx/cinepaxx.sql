CREATE TABLE if NOT exists  login(
    id serial PRIMARY KEY,
    nom varchar(25),
    pass varchar(25)
);
CREATE TABLE if NOT exists  admin(
    id serial PRIMARY KEY,
    nom varchar(25),
    pass varchar(25)
);
INSERT INTO admin(nom,pass) VALUES('admin','admin');

CREATE Table film(
    id serial PRIMARY KEY,
    titre varchar(25),
    annee int,
    image varchar(25),
    duree TIME NOT NULL
);
-- INSERT INTO film (titre, annee, image, duree) VALUES ('Gardiens De La galaxie', 2022, 'gardien.jpg', '02:15:00');
-- INSERT INTO film (titre, annee, image, duree) VALUES ('Traileur', 2022, 'trailleur.jpg', '02:15:00');
CREATE Table range(
    id  serial PRIMARY key,
    rang VARCHAR(25) NOT NULL
);
CREATE TABLE SallePlace(
    idSalle int,
    idRange int,
    numRang int,
    Foreign Key (idRange) REFERENCES range(id),
    Foreign Key (idSalle) REFERENCES salle(id)
);
CREATE VIEW SallePlaceView AS SELECT
    sp.idSalle,
    sp.idRange,
    sp.numRang,
    r.rang AS rangeName,
    sp.reserver
FROM
    SallePlace sp
JOIN
    range r ON sp.idRange = r.id;


-- ALTER TABLE SallePlace
-- ADD reserver int default 0;
-- s1,A
-- INSERT INTO SallePlace(idSalle,idRange,numRang)VALUES(1,1,1);
-- INSERT INTO SallePlace(idSalle,idRange,numRang)VALUES(1,1,2);
-- INSERT INTO SallePlace(idSalle,idRange,numRang)VALUES(1,1,3);
-- INSERT INTO SallePlace(idSalle,idRange,numRang)VALUES(1,2,1);
-- INSERT INTO SallePlace(idSalle,idRange,numRang)VALUES(1,2,2);
-- INSERT INTO SallePlace(idSalle,idRange,numRang)VALUES(1,2,3);
-- -- s2,A
-- INSERT INTO SallePlace(idSalle,idRange,numRang)VALUES(2,1,1);
-- INSERT INTO SallePlace(idSalle,idRange,numRang)VALUES(2,1,2);
-- INSERT INTO SallePlace(idSalle,idRange,numRang)VALUES(2,1,3);
-- INSERT INTO SallePlace(idSalle,idRange,numRang)VALUES(2,2,1);
-- INSERT INTO SallePlace(idSalle,idRange,numRang)VALUES(2,2,2);
-- INSERT INTO SallePlace(idSalle,idRange,numRang)VALUES(2,2,3);
-- INSERT INTO range(rang) VALUES('A');
-- INSERT INTO range(rang) VALUES('B');
 CREATE TABLE salle(
    id serial PRIMARY KEY,
    nom varchar(25) NOT NULL
 );
-- INSERT INTO salle(nom) VALUES('S1');
-- INSERT INTO salle(nom) VALUES('S2');
CREATE Table sceance(
    id serial PRIMARY KEY,
    idFilm int,
    idSalle int,
    heurre TIME NOT NULL,
    Foreign Key (idFilm) REFERENCES film(id),
    Foreign Key (idSalle) REFERENCES salle(id)
);
-- INSERT INTO sceance(idFilm,idSalle,heurre)VALUES(1,1,'10:00:00');
-- INSERT INTO sceance(idFilm,idSalle,heurre)VALUES(1,2,'12:00:00');
-- INSERT INTO sceance(idFilm,idSalle,heurre)VALUES(2,1,'08:00:00');
-- INSERT INTO sceance(idFilm,idSalle,heurre)VALUES(2,2,'10:00:00');
CREATE TABLE billet(
    id serial PRIMARY KEY,
    nom VARCHAR(25),
    montant DOUBLE precision NOT NULL
);
-- INSERT INTO billet(nom,montant) VALUES('Billet 1',10000);
-- INSERT INTO billet(nom,montant) VALUES('Billet 2',20000);
-- INSERT INTO billet(nom,montant) VALUES('Billet 3',30000);
CREATE SEQUENCE prod
increment by 1
start with 1;
 CREATE TABLE produit(
    id VARCHAR(25) PRIMARY KEY DEFAULT 'PROD'||LPAD(nextval('prod')::TEXT,3,'0'),
    nomProd VARCHAR(25)
 );
--  INSERT INTO produit(nomProd) VALUES('popcorn');
--  INSERT INTO produit(nomProd) VALUES('lunettes 3d');
--  INSERT INTO produit(nomProd) VALUES('boisson');
CREATE table venteProduit(
    id serial PRIMARY key,
    idProduit VARCHAR(25),
    qte int,
    dateVente DATE,
    Foreign Key (idProduit) REFERENCES produit(id)
);
-- INSERT INTO venteProduit(idProduit,qte,dateVente) VALUES('PROD001',2,'2024-04-16');
-- INSERT INTO venteProduit(idProduit,qte,dateVente) VALUES('PROD002',1,'2024-04-16');
-- INSERT INTO venteProduit(idProduit,qte,dateVente) VALUES('PROD003',3,'2024-04-15');

CREATE VIEW vue_sceance AS
SELECT
    s.id AS sceance_id,
    f.id AS film_id,
     f.titre AS film_titre,
     f.annee AS film_annee,
     f.image AS film_image,
     f.duree AS film_duree,
    sa.id AS salle_id,
    sa.nom AS salle_nom,
    s.heurre AS sceance_heure
FROM
    sceance s
JOIN
    film f ON s.idFilm = f.id
JOIN
    salle sa ON s.idSalle = sa.id;
CREATE VIEW vue_salle_place AS
SELECT sp.idSalle, s.nom, sp.idRange,r.rang, sp.numRang, sp.reserver
FROM SallePlace sp
JOIN range r ON sp.idRange = r.id
JOIN salle s ON sp.idSalle = s.id;
-- sceance_id | film_id |       film_titre       | film_annee |  film_image   | film_duree | salle_id | salle_nom | sceance_heure
-- idsalle | idrange | numrang | reserver
CREATE  view vue_reservation AS
SELECT
vs.sceance_id,vs.film_id,vs. film_titre,vs.film_annee,vs.film_image,vs.film_duree,vs.salle_id,vs.salle_nom,sp.idrange,r.rang,sp.numrang,sp.reserver,vs.sceance_heure
FROM vue_sceance vs
JOIN salleplace sp on vs.salle_id = sp.idsalle
JOIN range r on sp.idrange = r.id;

CREATE Table reservation(
    id  serial PRIMARY KEY NOT NULL,
    idBillet int,
    idSceance int,
    idSalle int,
    idRang int,
    num int,
    dateReservation TIMESTAMP NOT null,
    Foreign Key (idBillet) REFERENCES billet(id),
    Foreign Key (idSceance) REFERENCES sceance(id),
    Foreign Key (idSalle) REFERENCES salle(id),
    Foreign Key (idRang) REFERENCES range(id)
);
ALTER Table reservation add  COLUMN dateReservation TIMESTAMP;
-- UPDATE salleplace
-- SET reserver = 1
-- WHERE idsalle = 1
-- AND idrange = 1
-- AND numrang = 1
-- AND EXISTS (
--     SELECT *
--     FROM vue_reservation
--     WHERE sceance_heure = '10:00:00'
-- )
--  select * from salleplaceview where numrang not in (select num from reservation) and idsalle = 1 and idrange = 1 ;
   SELECT spv.*
        FROM vue_reservation spv
        LEFT JOIN reservation r ON sceance_id  = r.idsceance
                                AND spv.idrange = r.idrang
                                AND spv.numrang = r.num
        WHERE r.id IS NULL and spv.sceance_id = 1;

SELECT spv.*
FROM vue_reservation spv
 JOIN reservation r ON sceance_id  = r.idsceance
                        AND spv.idrange = r.idrang
                        AND spv.numrang = r.num
where sceance_id = 1;

CREATE VIEW vue_stat_film AS
SELECT
    r.*,
    s.idfilm,
    s.heurre
FROM
    reservation r
JOIN
    sceance s ON r.idsceance = s.id;
 CREATE or REPLACE view stat_vrai as
  select  idfilm ,count(*) from vue_stat_film group by idfilm ;
ALTER TABLE billet ADD COLUMN tarif_applicable VARCHAR(10);
ALTER TABLE produit ADD COLUMN pu double precision ;
--
create or REPLACE view vue_vente_prodaka AS
SELECT vp.id , vp.idproduit , p.nomprod ,p.pu, vp.qte, vp.datevente, p.pu*vp.qte as ca
FROM venteproduit vp JOIN produit p ON vp.idproduit = p.id;

SELECT p.id, p.nomprod, p.pu, COALESCE(v.qte, 0) AS qte_vendue,
       CASE WHEN v.datevente IS NULL THEN NULL ELSE v.datevente END AS datevente,
       COALESCE(v.ca, 0) AS ca
FROM produit p
LEFT JOIN vue_vente_prodaka v ON p.id = v.idproduit AND v.datevente = '2024-04-16';

CREATE or REPLACE view vue_reserve_sceance_rang as
SELECT r.id,r.idbillet,b.nom,b.montant,r.idsceance, vs.*,r. idrang ,ra.rang,r.num ,r.datereservation
 FROM  reservation r
JOIN vue_sceance vs on r.idsceance = vs.sceance_id
JOIN  range ra ON r.idrang = ra.id
JOIN billet b ON r.idbillet = b.id;

-- SELECT *
-- FROM reservation
-- WHERE datereservation >= '2024-04-15'::DATE AND datereservation < '2024-04-16'::DATE;
-- CREATE or REPLACE view  caFilm as
--  select idbillet,montant from vue_reserve_sceance_rang WHERE datereservation >= '2024-04-15'::DATE AND datereservation <'2024-04-16'::DATE group by idBillet,montant;

-- SUM(montant) AS montant_total
-- SELECT film_id, film_titre, SUM(montant) AS montant_total
-- FROM vue_reserve_sceance_rang
-- WHERE datereservation >= '2024-04-15'::DATE
--   AND datereservation < '2024-04-16'::DATE
-- GROUP BY film_id, film_titre;
 id | idbillet |   nom    | montant | idsceance | sceance_id | film_id |       film_titre       | film_annee |  film_image   | film_duree | salle_id | salle_nom | sceance_heure | idrang | rang | num |   datereservation
 select film_titre,vr.sceance_heure,rang,num,salle_nom,nom from vue_reserve_sceance_rang vr group by sceance_heure,film_titre,rang,num,salle_nom,nom;
