CREATE DATABASE IF NOT EXISTS RTP_db;
USE RTP_db;

CREATE TABLE users (
    id INT(7) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(75) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE uploadedimage (
	Id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
	users_fk int(7),
	imagename varchar(100) NOT NULL,
	CONSTRAINT terapeutin_kuva_fk FOREIGN KEY (users_fk)
	REFERENCES users(id)
);

CREATE TABLE terapeutit (
	tp_id int(7) PRIMARY KEY AUTO_INCREMENT,
	users_fk int(7),
	tp_etunimi varchar(25),
	tp_sukunimi varchar(50),
	tp_paikkakunta varchar(50),
	tp_email varchar(50),
	tp_esittelyteksti varchar(666),
	CONSTRAINT users_fk FOREIGN KEY (users_fk) 
	REFERENCES users(id)
);

CREATE TABLE terapeutin_osaamiset (
	tposaamiset_id int(7) PRIMARY KEY AUTO_INCREMENT,
	tp_fk int(7),
	elintapa int(1),
	kasvis int(1),
	keliakia int(1),	
	laillistettu int(1),
	painonhallinta int(1),
	suolisto_vatsa int(1),
	sydan_verisuoni int(1),
	diabetes_tyyppi2 int(1),
	CONSTRAINT terapeutit_osaaminen_fk FOREIGN KEY (tp_fk) 
	REFERENCES terapeutit(tp_id)
);

CREATE TABLE terapeutin_hyvinvointi (
	tphyvinvointi_id int(7) PRIMARY KEY AUTO_INCREMENT,
	tp_fk int(7),
	vanhus int(1),
	urheilu int(1),
	vegaani int(1),
	kirurgiset int(1),
	lapset int(1),
	ryhmat int(1),
	nutrigen int(1),
	tyoterveys int(1),
	ruokapalvelut int(1),
	elintarvikkeet int(1),
	CONSTRAINT terapeutit_hyvinvointi_fk FOREIGN KEY (tp_fk) 
	REFERENCES terapeutit(tp_id)
);

CREATE TABLE terapeutin_sairaudet (
	tpsairaudet_id int(7) PRIMARY KEY AUTO_INCREMENT,
	tp_fk int(7),
	bulimia int(1),
	diabetes_tyyppi1 int(1),
	allergia int(1),
	fodmap int(1),
	keuhko int(1),
	lihavuus int(1),
	munuais int(1),
	neuro int(1),
	psykiatriset int(1),
	reuma int(1),
	ruoansulatus int(1),
	syopa int(1),
	artynyt_suoli int(1),
	CONSTRAINT terapeutit_sairaus_fk FOREIGN KEY (tp_fk) 
	REFERENCES terapeutit(tp_id)
);

CREATE TABLE kalenteri (
	kalenteri_id int(5) PRIMARY KEY AUTO_INCREMENT,
	kalenteri_pvm DATE,
	kalenteri_kellonaika varchar(15)
);

CREATE TABLE terapeutin_kalenteri (
	tpkalenteri_id int(7) PRIMARY KEY AUTO_INCREMENT,
	kalenteri_fk int(5),
	tp_fk int(7),
	varaustilanne int(1) DEFAULT 1,
	CONSTRAINT terapeutit_kalenteri_fk FOREIGN KEY (tp_fk) 
	REFERENCES terapeutit(tp_id),
	CONSTRAINT kalenteri_fk FOREIGN KEY (kalenteri_fk) 
	REFERENCES kalenteri(kalenteri_id)
);

CREATE TABLE asiakasvaraukset (
	asiakasvaraus_id int(7) PRIMARY KEY AUTO_INCREMENT,
	tpkalenteri_fk int(7),
	as_etunimi varchar(25),
	as_sukunimi varchar(50),
	as_osoite varchar(75),
	as_email varchar(75),
	as_puhnro varchar(25),
	CONSTRAINT asiakkaat_kalenteri_fk FOREIGN KEY (tpkalenteri_fk) 
	REFERENCES terapeutin_kalenteri(tpkalenteri_id)
);


