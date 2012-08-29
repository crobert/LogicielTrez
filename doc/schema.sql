



-- ---
-- Globals
-- ---

-- SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
-- SET FOREIGN_KEY_CHECKS=0;

-- ---
-- Table 'exercice'
--
-- ---

DROP TABLE IF EXISTS `exercice`;

CREATE TABLE `exercice` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `edition` INTEGER NULL DEFAULT NULL,
  `annee_1` YEAR NULL DEFAULT NULL,
  `annee_2` YEAR NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'budget'
--
-- ---

DROP TABLE IF EXISTS `budget`;

CREATE TABLE `budget` (
  `id` INTEGER NOT NULL AUTO_INCREMENT,
  `exercice_id` INTEGER NOT NULL,
  `nom` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
KEY (`exercice_id`)
);

-- ---
-- Table 'categorie'
--
-- ---

DROP TABLE IF EXISTS `categorie`;

CREATE TABLE `categorie` (
  `id` INTEGER NOT NULL AUTO_INCREMENT,
  `budget_id` INTEGER NOT NULL,
  `nom` VARCHAR(255) NULL DEFAULT NULL,
  `description` MEDIUMTEXT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
KEY (`budget_id`)
);

-- ---
-- Table 'souscategorie'
--
-- ---

DROP TABLE IF EXISTS `souscategorie`;

CREATE TABLE `souscategorie` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `categorie_id` INTEGER NOT NULL,
  `nom` VARCHAR(255) NULL DEFAULT NULL,
  `description` MEDIUMTEXT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
KEY (`categorie_id`)
);

-- ---
-- Table 'ligne'
--
-- ---

DROP TABLE IF EXISTS `ligne`;

CREATE TABLE `ligne` (
  `id` INTEGER NOT NULL AUTO_INCREMENT,
  `souscategorie_id` INTEGER NOT NULL,
  `nom` VARCHAR(255) NULL DEFAULT NULL,
  `description` MEDIUMTEXT NULL DEFAULT NULL,
  `debit` INTEGER NULL DEFAULT NULL,
  `credit` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
KEY (`souscategorie_id`)
);

-- ---
-- Table 'facture'
--
-- ---

DROP TABLE IF EXISTS `facture`;

CREATE TABLE `facture` (
  `id` INTEGER NOT NULL AUTO_INCREMENT,
  `ligne_id` INTEGER NULL DEFAULT NULL,
  `tiers_id` INTEGER NULL DEFAULT NULL,
  `type` INTEGER NULL DEFAULT NULL,
  `numero` INTEGER NULL DEFAULT NULL,
  `objet` VARCHAR(255) NULL DEFAULT NULL,
  `montant` INTEGER NULL DEFAULT NULL,
  `methode_paiement` VARCHAR(255) NULL DEFAULT NULL,
  `date` DATE NULL DEFAULT NULL,
  `date_paiement` DATE NULL DEFAULT NULL,
  `commentaire` MEDIUMTEXT NULL DEFAULT NULL,
  `tva_id` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
KEY (`ligne_id`),
KEY (`tiers_id`),
KEY (`tva_id`)
);

-- ---
-- Table 'tiers'
--
-- ---

DROP TABLE IF EXISTS `tiers`;

CREATE TABLE `tiers` (
  `id` INTEGER NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(255) NULL DEFAULT NULL,
  `telephone` VARCHAR(255) NULL DEFAULT NULL,
  `mail` VARCHAR(255) NULL DEFAULT NULL,
  `fax` VARCHAR(255) NULL DEFAULT NULL,
  `adresse` MEDIUMTEXT NULL DEFAULT NULL,
  `responsable` VARCHAR(255) NULL DEFAULT NULL,
  `rib` VARCHAR(255) NULL DEFAULT NULL,
  `ordre_cheque` VARCHAR(255) NULL DEFAULT NULL,
  `commentaire` MEDIUMTEXT NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'users'
--
-- ---

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` INTEGER NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(255) NULL DEFAULT NULL,
  `password` VARCHAR(255) NULL DEFAULT NULL,
  `type` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'tva'
--
-- ---

DROP TABLE IF EXISTS `tva`;

CREATE TABLE `tva` (
  `id` INTEGER NOT NULL AUTO_INCREMENT,
  `type` INTEGER NULL DEFAULT NULL,
  `montant_ht` INTEGER NULL DEFAULT NULL,
  `montant_tva` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'categories_users'
--
-- ---

DROP TABLE IF EXISTS `categories_users`;

CREATE TABLE `categories_users` (
  `categorie_id` INTEGER NOT NULL,
  `user_id` INTEGER NOT NULL,
  `id` INTEGER NOT NULL AUTO_INCREMENT,
KEY (`categorie_id`),
KEY (`user_id`),
  PRIMARY KEY (`id`)
);

-- ---
-- Foreign Keys
-- ---

ALTER TABLE `budget` ADD FOREIGN KEY (exercice_id) REFERENCES `exercice` (`id`);
ALTER TABLE `categorie` ADD FOREIGN KEY (id) REFERENCES `categories_users` (`categorie_id`);
ALTER TABLE `categorie` ADD FOREIGN KEY (budget_id) REFERENCES `budget` (`id`);
ALTER TABLE `souscategorie` ADD FOREIGN KEY (categorie_id) REFERENCES `categorie` (`id`);
ALTER TABLE `ligne` ADD FOREIGN KEY (souscategorie_id) REFERENCES `souscategorie` (`id`);
ALTER TABLE `facture` ADD FOREIGN KEY (ligne_id) REFERENCES `ligne` (`id`);
ALTER TABLE `facture` ADD FOREIGN KEY (tiers_id) REFERENCES `tiers` (`id`);
ALTER TABLE `facture` ADD FOREIGN KEY (tva_id) REFERENCES `tva` (`id`);
ALTER TABLE `users` ADD FOREIGN KEY (id) REFERENCES `categories_users` (`user_id`);

-- ---
-- Table Properties
-- ---

-- ALTER TABLE `exercice` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `budget` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `categorie` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `souscategorie` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `ligne` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `facture` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `tiers` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `users` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `tva` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `categories_users` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ---
-- Test Data
-- ---

-- INSERT INTO `exercice` (`id`,`edition`,`annee_1`,`annee_2`) VALUES
-- ('','','','');
-- INSERT INTO `budget` (`id`,`exercice_id`,`nom`) VALUES
-- ('','','');
-- INSERT INTO `categorie` (`id`,`budget_id`,`nom`,`description`) VALUES
-- ('','','','');
-- INSERT INTO `souscategorie` (`id`,`categorie_id`,`nom`,`description`) VALUES
-- ('','','','');
-- INSERT INTO `ligne` (`id`,`souscategorie_id`,`nom`,`description`,`debit`,`credit`) VALUES
-- ('','','','','','');
-- INSERT INTO `facture` (`id`,`ligne_id`,`tiers_id`,`type`,`numero`,`objet`,`montant`,`methode_paiement`,`date`,`date_paiement`,`commentaire`,`tva_id`) VALUES
-- ('','','','','','','','','','','','');
-- INSERT INTO `tiers` (`id`,`nom`,`telephone`,`mail`,`fax`,`adresse`,`responsable`,`rib`,`ordre_cheque`,`commentaire`) VALUES
-- ('','','','','','','','','','');
-- INSERT INTO `users` (`id`,`login`,`password`,`type`) VALUES
-- ('','','','');
-- INSERT INTO `tva` (`id`,`type`,`montant_ht`,`montant_tva`) VALUES
-- ('','','','');
-- INSERT INTO `categories_users` (`categorie_id`,`user_id`,`id`) VALUES
-- ('','','');

