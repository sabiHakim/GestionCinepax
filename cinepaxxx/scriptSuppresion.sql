-- Désactiver toutes les contraintes de clé étrangère dans la base de données
SET CONSTRAINTS ALL DEFERRED;
-- Réactiver toutes les contraintes de clé étrangère dans la base de données
SET CONSTRAINTS ALL IMMEDIATE;

-- Désactiver une contrainte de clé étrangère spécifique par son nom
SET CONSTRAINTS nom_contrainte DEFERRED;
-- Réactiver une contrainte de clé étrangère spécifique par son nom
SET CONSTRAINTS nom_contrainte IMMEDIATE;
-- suppression donnees table
TRUNCATE TABLE ma_table;
