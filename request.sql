CREATE TABLE ADMIN(
	IDA NUMBER(3.0) not null unique,
	NAMEA VARCHAR2(20) not null unique,
	PASSWORDA VARCHAR2(30) not null, 
	primary key (IDA)
);

CREATE TABLE TOKEN(
	IDT NUMBER(4.0) not null unique,
	VALUET VARCHAR2(50) not null unique,
	IDA NUMBER(3.0) not null,
	ENDT TIMESTAMP not null,
	primary key (IDT),
	foreign key (IDA) references ADMIN(IDA)
);

CREATE TABLE NEWS(
	IDN NUMBER(4.0) not null unique,
	IDS NUMBER(5.0) not null,
	LIBELN VARCHAR2(500),
	primary key (IDN),
	foreign key (IDS) references SERVICE(IDS)
);

CREATE TABLE SERVICE(
	IDS NUMBER(5.0) not null unique,
	IDCAT NUMBER(3.0) not null,
	NAMES VARCHAR2(30) not null,
	LIBELS VARCHAR2(500),
	primary key (IDS),
	foreign key (IDCAT) references CATEGORY(IDCAT)
);

CREATE TABLE CATEGORY(
	IDCAT NUMBER(3.0) not null unique,
	NAMECAT VARCHAR2(50) not null unique,
	LIBELCAT VARCHAR2(500),
	primary key (IDCAT)
);

CREATE TABLE ORDER(
	IDO NUMBER(4.0) not null unique,
	IDCAT NUMBER(3.0),
	NUMBERO VARCHAR2(20) unique,
	STATUSO VARCHAR2(20),
	primary key (IDO),
	foreign key IDCAT references CATEGORY(IDCAT)
	constraint CHKORDER CHECK (UPPER(STATUSO)='EN COURS' OR UPPER(STATUSO)='PRET')
); 

