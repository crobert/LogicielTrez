



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
  `nom` VARCHAR(255) NULL DEFAULT NULL,
  `id_exercice` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
KEY (`id_exercice`)
);

-- ---
-- Table 'categorie'
-- 
-- ---

DROP TABLE IF EXISTS `categorie`;
		
CREATE TABLE `categorie` (
  `id` INTEGER NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(255) NULL DEFAULT NULL,
  `description` MEDIUMTEXT NULL DEFAULT NULL,
  `id_budget` INTEGER NOT NULL,
  PRIMARY KEY (`id`),
KEY (`id_budget`)
);

-- ---
-- Table 'souscategorie'
-- 
-- ---

DROP TABLE IF EXISTS `souscategorie`;
		
CREATE TABLE `souscategorie` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `nom` VARCHAR(255) NULL DEFAULT NULL,
  `description` MEDIUMTEXT NULL DEFAULT NULL,
  `id_categorie` INTEGER NOT NULL,
  PRIMARY KEY (`id`),
KEY (`id_categorie`)
);

-- ---
-- Table 'ligne'
-- 
-- ---

DROP TABLE IF EXISTS `ligne`;
		
CREATE TABLE `ligne` (
  `id` INTEGER NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(255) NULL DEFAULT NULL,
  `description` MEDIUMTEXT NULL DEFAULT NULL,
  `debit` INTEGER NULL DEFAULT NULL,
  `credit` INTEGER NULL DEFAULT NULL,
  `id_souscategorie` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
KEY (`id_souscategorie`)
);

-- ---
-- Table 'facture'
-- 
-- ---

DROP TABLE IF EXISTS `facture`;
		
CREATE TABLE `facture` (
  `id` INTEGER NOT NULL AUTO_INCREMENT,
  `type` INTEGER NULL DEFAULT NULL,
  `numero` INTEGER NULL DEFAULT NULL,
  `objet` VARCHAR(255) NULL DEFAULT NULL,
  `montant` INTEGER NULL DEFAULT NULL,
  `methode_paiement` VARCHAR(255) NULL DEFAULT NULL,
  `date` DATE NULL DEFAULT NULL,
  `date_paiement` DATE NULL DEFAULT NULL,
  `commentaire` MEDIUMTEXT NULL DEFAULT NULL,
  `id_ligne` INTEGER NOT NULL,
  `id_tiers` INTEGER NOT NULL,
  PRIMARY KEY (`id`),
KEY (`id_ligne`),
KEY (`id_tiers`)
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
-- Table 'user'
-- 
-- ---

DROP TABLE IF EXISTS `user`;
		
CREATE TABLE `user` (
  `id` INTEGER NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(255) NULL DEFAULT NULL,
  `password` VARCHAR(255) NULL DEFAULT NULL,
  `type` VARCHAR(25) NULL DEFAULT NULL,
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
  `id_facture` INTEGER NOT NULL,
  PRIMARY KEY (`id`),
KEY (`id_facture`)
);

-- ---
-- Table 'categories_users'
-- 
-- ---

DROP TABLE IF EXISTS `categories_users`;
		
CREATE TABLE `categories_users` (
  `id` INTEGER NOT NULL AUTO_INCREMENT,
  `id_user` INTEGER NOT NULL,
  `id_categorie` INTEGER NOT NULL,
KEY (`id_user`),
KEY (`id_categorie`),
  PRIMARY KEY (`id`)
);

-- ---
-- Foreign Keys 
-- ---

ALTER TABLE `budget` ADD FOREIGN KEY (id_exercice) REFERENCES `exercice` (`id`);
ALTER TABLE `categorie` ADD FOREIGN KEY (id_budget) REFERENCES `budget` (`id`);
ALTER TABLE `souscategorie` ADD FOREIGN KEY (id_categorie) REFERENCES `categorie` (`id`);
ALTER TABLE `ligne` ADD FOREIGN KEY (id_souscategorie) REFERENCES `souscategorie` (`id`);
ALTER TABLE `facture` ADD FOREIGN KEY (id_ligne) REFERENCES `ligne` (`id`);
ALTER TABLE `facture` ADD FOREIGN KEY (id_tiers) REFERENCES `tiers` (`id`);
ALTER TABLE `tva` ADD FOREIGN KEY (id_facture) REFERENCES `facture` (`id`);
ALTER TABLE `categories_users` ADD FOREIGN KEY (id_user) REFERENCES `user` (`id`);
ALTER TABLE `categories_users` ADD FOREIGN KEY (id_categorie) REFERENCES `categorie` (`id`);

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
-- ALTER TABLE `user` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `tva` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `categories_users` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ---
-- Test Data
-- ---

-- INSERT INTO `exercice` (`id`,`edition`,`annee_1`,`annee_2`) VALUES
-- ('','','','');
-- INSERT INTO `budget` (`id`,`nom`,`id_exercice`) VALUES
-- ('','','');
-- INSERT INTO `categorie` (`id`,`nom`,`description`,`id_budget`) VALUES
-- ('','','','');
-- INSERT INTO `souscategorie` (`id`,`nom`,`description`,`id_categorie`) VALUES
-- ('','','','');
-- INSERT INTO `ligne` (`id`,`nom`,`description`,`debit`,`credit`,`id_souscategorie`) VALUES
-- ('','','','','','');
-- INSERT INTO `facture` (`id`,`type`,`numero`,`objet`,`montant`,`methode_paiement`,`date`,`date_paiement`,`commentaire`,`id_ligne`,`id_tiers`) VALUES
-- ('','','','','','','','','','','');
-- INSERT INTO `tiers` (`id`,`nom`,`telephone`,`mail`,`fax`,`adresse`,`responsable`,`rib`,`ordre_cheque`,`commentaire`) VALUES
-- ('','','','','','','','','','');
-- INSERT INTO `user` (`id`,`login`,`password`,`type`) VALUES
-- ('','','','');
-- INSERT INTO `tva` (`id`,`type`,`montant_ht`,`montant_tva`,`id_facture`) VALUES
-- ('','','','','');
-- INSERT INTO `categories_users` (`id`,`id_user`,`id_categorie`) VALUES
-- ('','','');

