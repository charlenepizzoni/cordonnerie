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
	ENDT DATE not null,
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
	NAMECAT VARCHAR(50) not null unique,
	LIBELCAT VARCHAR(500),
	primary key (IDCAT)
);

CREATE TABLE COMMANDE(
	IDO INT not null unique auto_increment,
	IDCAT INT,
	NUMBERO VARCHAR(20) unique,
	STATUSO VARCHAR(20) CHECK (STATUSO IN('EN COURS', 'PRET')),
	primary key (IDO),
	foreign key (IDCAT) references CATEGORY(IDCAT)
); 



INSERT INTO `ADMIN`(`IDA`, `NAMEA`, `PASSWORDA`) VALUES (NULL,'admin','admin');