CREATE TABLE ADMIN(
	IDA INT not null unique auto_increment,
	NAMEA VARCHAR(20) not null unique,
	PASSWORDA VARCHAR(500) not null, 
	primary key (IDA)
);

CREATE TABLE TOKEN(
	IDT INT not null unique auto_increment,
	VALUET VARCHAR(500) not null unique,
	IDA INT not null,
	ENDT INT not null,
	primary key (IDT),
	foreign key (IDA) references ADMIN(IDA)
);

CREATE TABLE NEWS(
	IDN INT not null unique auto_increment,
	IDS INT not null,
	LIBELN VARCHAR(500),
	primary key (IDN),
	foreign key (IDS) references SERVICE(IDS)
);

CREATE TABLE SERVICE(
	IDS INT not null unique auto_increment,
	IDCAT INT not null,
	NAMES VARCHAR(30) not null,
	LIBELS VARCHAR(500),
	primary key (IDS),
	foreign key (IDCAT) references CATEGORY(IDCAT)
);

CREATE TABLE CATEGORY(
	IDCAT INT not null unique auto_increment,
	NAMECAT VARCHAR(50) unique,
	LIBELCAT VARCHAR(500),
	primary key (IDCAT)
);

CREATE TABLE COMMANDE(
	IDCOM INT not null unique auto_increment,
	IDCAT INT,
	NUMC VARCHAR(20) unique,
	ETATC VARCHAR(20) CHECK (ETATC IN('EN COURS', 'PRET')),
	primary key (IDCOM),
	foreign key (IDCAT) references CATEGORY(IDCAT)
); 



INSERT INTO `ADMIN`(`IDA`, `NAMEA`, `PASSWORDA`) VALUES (NULL,'admin','admin');

DELIMITER //

CREATE TRIGGER ADMIN_BEFORE_DELETE 
BEFORE DELETE ON ADMIN
FOR EACH ROW 
BEGIN
	DECLARE nb INT;
	set nb = (select count(*) from ADMIN); 
    if nb < 2
    then
		select 1, 2 INTO @a;
    end if;

END;//
delimiter ;
