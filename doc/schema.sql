



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
  `exe_id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `exe_edition` INTEGER NULL DEFAULT NULL,
  `exe_annee_1` YEAR NULL DEFAULT NULL,
  `exe_annee_2` YEAR NULL DEFAULT NULL,
  PRIMARY KEY (`exe_id`)
);

-- ---
-- Table 'budget'
-- 
-- ---

DROP TABLE IF EXISTS `budget`;
		
CREATE TABLE `budget` (
  `bud_id` INTEGER NOT NULL AUTO_INCREMENT,
  `bud_nom` VARCHAR(255) NULL DEFAULT NULL,
  `bud_id_exercice` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (`bud_id`),
KEY (`bud_id_exercice`)
);

-- ---
-- Table 'categorie'
-- 
-- ---

DROP TABLE IF EXISTS `categorie`;
		
CREATE TABLE `categorie` (
  `cat_id` INTEGER NOT NULL AUTO_INCREMENT,
  `cat_nom` VARCHAR(255) NULL DEFAULT NULL,
  `cat_description` MEDIUMTEXT NULL DEFAULT NULL,
  `cat_id_budget` INTEGER NOT NULL,
  PRIMARY KEY (`cat_id`),
KEY (`cat_id_budget`)
);

-- ---
-- Table 'souscategorie'
-- 
-- ---

DROP TABLE IF EXISTS `souscategorie`;
		
CREATE TABLE `souscategorie` (
  `sct_id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `sct_nom` VARCHAR(255) NULL DEFAULT NULL,
  `sct_description` MEDIUMTEXT NULL DEFAULT NULL,
  `sct_id_categorie` INTEGER NOT NULL,
  PRIMARY KEY (`sct_id`),
KEY (`sct_id_categorie`)
);

-- ---
-- Table 'ligne'
-- 
-- ---

DROP TABLE IF EXISTS `ligne`;
		
CREATE TABLE `ligne` (
  `lig_id` INTEGER NOT NULL AUTO_INCREMENT,
  `lig_nom` VARCHAR(255) NULL DEFAULT NULL,
  `lig_description` MEDIUMTEXT NULL DEFAULT NULL,
  `lig_debit` INTEGER NULL DEFAULT NULL,
  `lig_credit` INTEGER NULL DEFAULT NULL,
  `lig_id_souscategorie` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (`lig_id`),
KEY (`lig_id_souscategorie`)
);

-- ---
-- Table 'facture'
-- 
-- ---

DROP TABLE IF EXISTS `facture`;
		
CREATE TABLE `facture` (
  `fac_id` INTEGER NOT NULL AUTO_INCREMENT,
  `fac_type` INTEGER NULL DEFAULT NULL,
  `fac_numero` INTEGER NULL DEFAULT NULL,
  `fac_objet` VARCHAR(255) NULL DEFAULT NULL,
  `fac_montant` INTEGER NULL DEFAULT NULL,
  `fac_methode_paiement` VARCHAR(255) NULL DEFAULT NULL,
  `fac_date` DATE NULL DEFAULT NULL,
  `fac_date_paiement` DATE NULL DEFAULT NULL,
  `fac_commentaire` MEDIUMTEXT NULL DEFAULT NULL,
  `fac_id_ligne` INTEGER NOT NULL,
  `fac_id_tiers` INTEGER NOT NULL,
  `fac_ref_paiement` VARCHAR(150) NULL DEFAULT NULL,
  PRIMARY KEY (`fac_id`),
KEY (`fac_id_ligne`),
KEY (`fac_id_tiers`)
);

-- ---
-- Table 'tiers'
-- 
-- ---

DROP TABLE IF EXISTS `tiers`;
		
CREATE TABLE `tiers` (
  `trs_id` INTEGER NOT NULL AUTO_INCREMENT,
  `trs_nom` VARCHAR(255) NULL DEFAULT NULL,
  `trs_telephone` VARCHAR(255) NULL DEFAULT NULL,
  `trs_mail` VARCHAR(255) NULL DEFAULT NULL,
  `trs_fax` VARCHAR(255) NULL DEFAULT NULL,
  `trs_adresse` MEDIUMTEXT NULL DEFAULT NULL,
  `trs_responsable` VARCHAR(255) NULL DEFAULT NULL,
  `trs_rib` VARCHAR(255) NULL DEFAULT NULL,
  `trs_ordre_cheque` VARCHAR(255) NULL DEFAULT NULL,
  `trs_commentaire` MEDIUMTEXT NULL DEFAULT NULL,
  PRIMARY KEY (`trs_id`)
);

-- ---
-- Table 'user'
-- 
-- ---

DROP TABLE IF EXISTS `user`;
		
CREATE TABLE `user` (
  `usr_id` INTEGER NOT NULL AUTO_INCREMENT,
  `usr_username` VARCHAR(255) NULL DEFAULT NULL,
  `usr_password` VARCHAR(255) NULL DEFAULT NULL,
  `usr_type` VARCHAR(25) NULL DEFAULT NULL,
  PRIMARY KEY (`usr_id`)
);

-- ---
-- Table 'tva'
-- 
-- ---

DROP TABLE IF EXISTS `tva`;
		
CREATE TABLE `tva` (
  `tva_id` INTEGER NOT NULL AUTO_INCREMENT,
  `tva_type` INTEGER NULL DEFAULT NULL,
  `tva_montant_ht` INTEGER NULL DEFAULT NULL,
  `tva_montant_tva` INTEGER NULL DEFAULT NULL,
  `tva_id_facture` INTEGER NOT NULL,
  PRIMARY KEY (`tva_id`),
KEY (`tva_id_facture`)
);

-- ---
-- Table 'categories_users'
-- 
-- ---

DROP TABLE IF EXISTS `categories_users`;
		
CREATE TABLE `categories_users` (
  `cat_usr_id` INTEGER NOT NULL AUTO_INCREMENT,
  `cat_usr_id_user` INTEGER NOT NULL,
  `cat_usr_id_categorie` INTEGER NOT NULL,
KEY (`cat_usr_id_user`),
KEY (`cat_usr_id_categorie`),
  PRIMARY KEY (`cat_usr_id`)
);

-- ---
-- Table 'config_methode_paiement'
-- 
-- ---

DROP TABLE IF EXISTS `config_methode_paiement`;
		
CREATE TABLE `config_methode_paiement` (
  `cfg_id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `cfg_value` VARCHAR(100) NOT NULL DEFAULT 'NULL',
  PRIMARY KEY (`cfg_id`)
);

-- ---
-- Table 'config_classe_tva'
-- 
-- ---

DROP TABLE IF EXISTS `config_classe_tva`;
		
CREATE TABLE `config_classe_tva` (
  `cfg_id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `cfg_taux` DECIMAL NOT NULL DEFAULT 0,
  `cfg_nom` VARCHAR(100) NOT NULL DEFAULT 'NULL',
  `cfg_actif` INTEGER NOT NULL DEFAULT 1,
  PRIMARY KEY (`cfg_id`)
);

-- ---
-- Table 'config_type_facture'
-- 
-- ---

DROP TABLE IF EXISTS `config_type_facture`;
		
CREATE TABLE `config_type_facture` (
  `cfg_id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `cfg_abbr` VARCHAR(5) NULL DEFAULT NULL,
  `cfg_nom` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`cfg_id`)
);

-- ---
-- Table 'config'
-- 
-- ---

DROP TABLE IF EXISTS `config`;
		
CREATE TABLE `config` (
  `cfg_id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `cfg_key` VARCHAR(100) NOT NULL DEFAULT 'NULL',
  `cfg_value` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`cfg_id`),
KEY (`cfg_key`)
);

-- ---
-- Foreign Keys 
-- ---

ALTER TABLE `budget` ADD FOREIGN KEY (bud_id_exercice) REFERENCES `exercice` (`exe_id`);
ALTER TABLE `categorie` ADD FOREIGN KEY (cat_id_budget) REFERENCES `budget` (`bud_id`);
ALTER TABLE `souscategorie` ADD FOREIGN KEY (sct_id_categorie) REFERENCES `categorie` (`cat_id`);
ALTER TABLE `ligne` ADD FOREIGN KEY (lig_id_souscategorie) REFERENCES `souscategorie` (`sct_id`);
ALTER TABLE `facture` ADD FOREIGN KEY (fac_id_ligne) REFERENCES `ligne` (`lig_id`);
ALTER TABLE `facture` ADD FOREIGN KEY (fac_id_tiers) REFERENCES `tiers` (`trs_id`);
ALTER TABLE `tva` ADD FOREIGN KEY (tva_id_facture) REFERENCES `facture` (`fac_id`);
ALTER TABLE `categories_users` ADD FOREIGN KEY (cat_usr_id_user) REFERENCES `user` (`usr_id`);
ALTER TABLE `categories_users` ADD FOREIGN KEY (cat_usr_id_categorie) REFERENCES `categorie` (`cat_id`);

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
-- ALTER TABLE `config_methode_paiement` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `config_classe_tva` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `config_type_facture` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `config` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ---
-- Test Data
-- ---

-- INSERT INTO `exercice` (`exe_id`,`exe_edition`,`exe_annee_1`,`exe_annee_2`) VALUES
-- ('','','','');
-- INSERT INTO `budget` (`bud_id`,`bud_nom`,`bud_id_exercice`) VALUES
-- ('','','');
-- INSERT INTO `categorie` (`cat_id`,`cat_nom`,`cat_description`,`cat_id_budget`) VALUES
-- ('','','','');
-- INSERT INTO `souscategorie` (`sct_id`,`sct_nom`,`sct_description`,`sct_id_categorie`) VALUES
-- ('','','','');
-- INSERT INTO `ligne` (`lig_id`,`lig_nom`,`lig_description`,`lig_debit`,`lig_credit`,`lig_id_souscategorie`) VALUES
-- ('','','','','','');
-- INSERT INTO `facture` (`fac_id`,`fac_type`,`fac_numero`,`fac_objet`,`fac_montant`,`fac_methode_paiement`,`fac_date`,`fac_date_paiement`,`fac_commentaire`,`fac_id_ligne`,`fac_id_tiers`,`fac_ref_paiement`) VALUES
-- ('','','','','','','','','','','','');
-- INSERT INTO `tiers` (`trs_id`,`trs_nom`,`trs_telephone`,`trs_mail`,`trs_fax`,`trs_adresse`,`trs_responsable`,`trs_rib`,`trs_ordre_cheque`,`trs_commentaire`) VALUES
-- ('','','','','','','','','','');
-- INSERT INTO `user` (`usr_id`,`usr_username`,`usr_password`,`usr_type`) VALUES
-- ('','','','');
-- INSERT INTO `tva` (`tva_id`,`tva_type`,`tva_montant_ht`,`tva_montant_tva`,`tva_id_facture`) VALUES
-- ('','','','','');
-- INSERT INTO `categories_users` (`cat_usr_id`,`cat_usr_id_user`,`cat_usr_id_categorie`) VALUES
-- ('','','');
-- INSERT INTO `config_methode_paiement` (`cfg_id`,`cfg_value`) VALUES
-- ('','');
-- INSERT INTO `config_classe_tva` (`cfg_id`,`cfg_taux`,`cfg_nom`,`cfg_actif`) VALUES
-- ('','','','');
-- INSERT INTO `config_type_facture` (`cfg_id`,`cfg_abbr`,`cfg_nom`) VALUES
-- ('','','');
-- INSERT INTO `config` (`cfg_id`,`cfg_key`,`cfg_value`) VALUES
-- ('','','');

