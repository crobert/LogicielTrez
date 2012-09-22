INSERT INTO `config_methode_paiement` (`cmp_id`,`cmp_nom`) VALUES
('1','Chèque'),
('2','Espèce'),
('3','Foutre'),
('4','Liquide');
INSERT INTO `config_classe_tva` (`cct_id`,`cct_taux`,`cct_nom`,`cct_actif`) VALUES
('1','19,6','Taux normal','1'),
('2','7','Taux réduit','1');
INSERT INTO `config_type_facture` (`ctf_id`,`ctf_abr`,`ctf_nom`) VALUES
('1','FR','Facture reçue'),
('2','OD','Opération diverse'),
('3','NF','Note de frais');
INSERT INTO `exercice` (`exe_id`,`exe_edition`,`exe_annee_1`,`exe_annee_2`) VALUES
('1','36','2009','2010'),
('2','37','2010','2011'),
('3','38','2011','2012'),
('4','39','2012','2013');
INSERT INTO `budget` (`bud_id`,`bud_nom`,`bud_id_exercice`) VALUES
('1','Xavier','1'),
('2','Romaric','2'),
('3','Cédric','3'),
('4','Jérémie','4');
INSERT INTO `categorie` (`cat_id`,`cat_nom`,`cat_description`,`cat_id_budget`) VALUES
('1','Animations','Les 3 pôles d''animation','3'),
('2','Concerts','Trop de bruit','3'),
('3','Kebab Volant','Yummy','3'),
('4','DD','Poubelle','3');
INSERT INTO `souscategorie` (`sct_id`,`sct_nom`,`sct_description`,`sct_id_categorie`) VALUES
('1','Sport','Ballon','1'),
('2','Culture','Danse','1'),
('3','Plaisir','Clown','1');
INSERT INTO `tiers` (`trs_id`,`trs_nom`,`trs_telephone`,`trs_mail`,`trs_fax`,`trs_adresse`,`trs_responsable`,`trs_rib`,`trs_ordre_cheque`,`trs_commentaire`) VALUES
('1','INSA','0600000000','','insa@insa.fr','20 av Albert Einstein','M. le directeur de l''agence comptable','12','ma bite','ça me trou le cul');
INSERT INTO `ligne` (`lig_id`,`lig_nom`,`lig_description`,`lig_debit`,`lig_credit`,`lig_id_souscategorie`) VALUES
('1','Jump around','Saut à l''élastique','9000','0','1'),
('2','Couscous','Le plus important c''est la cuisson','2,5','0','1');
INSERT INTO `facture` (`fac_id`,`fac_type`,`fac_numero`,`fac_objet`,`fac_montant`,`fac_methode_paiement`,`fac_date`,`fac_date_paiement`,`fac_commentaire`,`fac_id_ligne`,`fac_id_tiers`,`fac_ref_paiement`) VALUES
('1','1','001','Jump','9000','1','2012-09-20','2012-09-20','','1','1',''),
('2','3','001','Semoule','2,5','3','2012-09-20','2012-09-20','','2','1','');
INSERT INTO `user` (`usr_id`,`usr_username`,`usr_password`,`usr_type`) VALUES
('1','admin','1778eb47309ef1f4dbdd5483cb56d8fdc6d5d8a7','1'),
('2','root','2e86e826bc8bd5458fb741a09a35f8ffb1e1900a','2'),
('3','coco','90eb38b94be6c457d235268e64fd240f7e4a94f2','3'),
('4','jean','4404c577033cf0dfc372ccb0ad598dba08f5e47e','4');
INSERT INTO `tva` (`tva_id`,`tva_type`,`tva_montant_ht`,`tva_montant_tva`,`tva_id_facture`) VALUES
('1','1','9000','1000','1');
INSERT INTO `categories_users` (`cat_usr_id`,`cat_usr_id_user`,`cat_usr_id_categorie`) VALUES
('1','1','1'),
('2','2','2'),
('3','3','2'),
('4','4','3');
