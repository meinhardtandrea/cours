CREATE TABLE ds_users (
   user_id int(11) NOT NULL auto_increment,
   user_name varchar(32) NOT NULL,
   user_pwd varchar(32) NOT NULL,
   user_mail varchar(250) NOT NULL,
   user_site varchar(250) NOT NULL,
   user_entreprise varchar(250) NOT NULL,
   user_nom varchar(32) NOT NULL,
   user_prenom varchar(32) NOT NULL,
   user_activation tinyint (4) DEFAULT 0,
	 user_inscription date DEFAULT '0000-00-00' NOT NULL,
   user_heure varchar(20) NOT NULL,
	 user_last_visit int(11) NOT NULL,
   user_access tinyint (4) DEFAULT 5,
   user_nl varchar(32) NOT NULL,
   user_send varchar(32) NOT NULL,
   user_type tinyint (4) DEFAULT 1,
   user_type_pers tinyint (4) DEFAULT 1,
	 user_cot_date date DEFAULT '0000-00-00' NOT NULL,
   user_ville varchar(250) NOT NULL,
   user_depcom varchar(250) NOT NULL,
   user_tel varchar(20) NOT NULL,
   PRIMARY KEY (user_id)
);

INSERT INTO ds_users 
(user_id, user_name, user_pwd, user_mail, user_site, user_entreprise, user_nom, user_prenom, user_activation, user_inscription, user_last_visit, user_access, user_nl, user_send, user_ville, user_depcom, user_tel) VALUES 
('1', 'admin', 'admin', 'nicolas@digiforge.fr', 'http://www.digiforge.fr', '', '', '', '1', '', '', '1', '', '','','','');


CREATE TABLE ds_log (
   log_id int(11) NOT NULL auto_increment,
   log_user_id mediumint(8) NOT NULL,
   log_date date DEFAULT '0000-00-00' NOT NULL,
   log_heure varchar(20) NOT NULL,
   PRIMARY KEY (log_id)
);


CREATE TABLE ds_rubriques (
   rub_id int(11) NOT NULL auto_increment,
   rub_titre varchar(80) NOT NULL,
   rub_position mediumint(8) NOT NULL,
   rub_priv varchar(32) NOT NULL,
   rub_activation varchar(32) NOT NULL,
   rub_aff varchar(32) NOT NULL,
   PRIMARY KEY (rub_id)
);


CREATE TABLE ds_modules (
   mod_id int(11) NOT NULL auto_increment,
   mod_rub_id int(11) NOT NULL,
   mod_type varchar(60) NOT NULL,
   mod_titre varchar(80) NOT NULL,
   mod_texte text NOT NULL,
   mod_mail varchar(255) NOT NULL,
   mod_img varchar(255) NOT NULL,
   mod_img_position mediumint(8) NOT NULL,
   mod_position mediumint(8) NOT NULL,
   mod_activation varchar(32) NOT NULL,
   mod_option1 mediumint(8) NOT NULL,
   mod_option2 mediumint(8) NOT NULL,
   mod_rub_aff varchar(32) NOT NULL,
   PRIMARY KEY (mod_id)
);


CREATE TABLE ds_img (
   img_id int(11) NOT NULL auto_increment,
   img_rub_id int(11) NOT NULL,
   img_mod_id int(11) NOT NULL,
   img_file_id int(11) NOT NULL,
   img_titre varchar(255) NOT NULL,
   img_name varchar(255) NOT NULL,
   img_position mediumint(8) NOT NULL,
   PRIMARY KEY (img_id)
);


CREATE TABLE ds_mail (
   mail_id int(11) NOT NULL auto_increment,
   mail_rub_id int(11) NOT NULL,
   mail_mod_id int(11) NOT NULL,
   mail_mail varchar(250) NOT NULL,
   mail_titre varchar(255) NOT NULL,
   mail_texte text NOT NULL,
	 mail_date date DEFAULT '0000-00-00' NOT NULL,
   mail_heure varchar(20) NOT NULL,
   PRIMARY KEY (mail_id)
);


CREATE TABLE ds_news (
   news_id int(11) NOT NULL auto_increment,
   news_rub_id int(11) NOT NULL,
   news_mod_id int(11) NOT NULL,
   news_author mediumint(8) NOT NULL,
   news_titre varchar(100) NOT NULL,
   news_texte text NOT NULL,
   news_img varchar(255) NOT NULL,
   news_date date DEFAULT '0000-00-00' NOT NULL,
   news_heure varchar(20) NOT NULL,
   news_activation varchar(32) NOT NULL,
   news_option1 mediumint(8) NOT NULL,
   news_option2 mediumint(8) NOT NULL,
   PRIMARY KEY (news_id)
);


CREATE TABLE ds_fiches (
   fch_id int(11) NOT NULL auto_increment,
   fch_titre varchar(255) NOT NULL,
   fch_texte text NOT NULL,
   fch_lien varchar(255) NOT NULL,
   fch_img varchar(255) NOT NULL,
	 fch_date date DEFAULT '0000-00-00' NOT NULL,
   fch_heure varchar(20) NOT NULL,
   fch_une varchar(32) NOT NULL,
   fch_statut varchar(32) NOT NULL,
   fch_activation varchar(32) NOT NULL,
   fch_position mediumint(8) NOT NULL,
   PRIMARY KEY (fch_id)
);



CREATE TABLE ds_site_options (
   so_id int(11) NOT NULL auto_increment,
	 so_active int(11) NOT NULL,
   so_name varchar(255) NOT NULL,
   PRIMARY KEY (so_id)
);


CREATE TABLE ds_pdf (
   pdf_id int(11) NOT NULL auto_increment,
   pdf_rub_id int(11) NOT NULL,
   pdf_mod_id int(11) NOT NULL,
   pdf_file_id int(11) NOT NULL,
   pdf_titre varchar(255) NOT NULL,
   pdf_name varchar(255) NOT NULL,
   pdf_position mediumint(8) NOT NULL,
   PRIMARY KEY (pdf_id)
);


CREATE TABLE ds_partenaires (
   part_id int(11) NOT NULL auto_increment,
   part_titre varchar(80) NOT NULL,
   part_texte text NOT NULL,
   part_lien text NOT NULL,
   part_img varchar(255) NOT NULL,
   part_activation varchar(32) NOT NULL,
   part_position mediumint(8) NOT NULL,
   PRIMARY KEY (part_id)
);


CREATE TABLE ds_networks (
   sn_id int(11) NOT NULL auto_increment,
   sn_titre varchar(80) NOT NULL,
   sn_texte text NOT NULL,
   sn_lien text NOT NULL,
   sn_img varchar(255) NOT NULL,
   sn_activation varchar(32) NOT NULL,
   sn_position mediumint(8) NOT NULL,
   PRIMARY KEY (sn_id)
);