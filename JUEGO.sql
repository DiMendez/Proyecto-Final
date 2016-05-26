CREATE TABLE USUARIO
(
	USUARIO_NO varchar(9),
	USUARIO_HSP char(10),
	USUARIO_TIPO varchar(13),
	PRIMARY KEY (USUARIO_NO)
);

CREATE TABLE PROFESOR
(
	USUARIO_NO varchar(9),
	PROFESOR_NOMBRE varchar(120),
	PROFESOR_FECHA varchar(8),
	PRIMARY KEY (USUARIO_NO)
);

CREATE TABLE ASIGNACION
(
	USUARIO_NO varchar(9),
	MATERIA_NO char(4),
	PRIMARY KEY (USUARIO_NO,MATERIA_NO)
);

CREATE TABLE MATERIAS
(
	MATERIA_NO char(4),
	GRADO varchar(3),
	COLEGIO_NOMBRE varchar(50),
	MATERIA_NOMBRE varchar(25),
	PRIMARY KEY (MATERIA_NO)
);

CREATE TABLE UNIDAD
(
	MATERIA_NO char(4),
	UNIDAD_NO int,
	UNIDAD_NOMBRE varchar(100),
	PRIMARY KEY (MATERIA_NO,UNIDAD_NO)
);

CREATE TABLE PREGUNTAS
(
	MATERIA_NO char(4),
	UNIDAD_NO int,
	PREGUNTA_NOMBRE varchar(200),
	PREGUNTA_MEDIA varchar(200),
	PREGUNTA_OPCION1 varchar(200),
	PREGUNTA_OPCION2 varchar(200),
	PREGUNTA_OPCION3 varchar(200),
	PREGUNTA_OPCION4 varchar(200),
	PREGUNTA_RESPUESTA tinyint,
	PREGUNTA_XCONFIRMAR char(2)
);

CREATE TABLE ALUMNO
(
	USUARIO_NO varchar(9),
	GRADO varchar(3),
	ALUMNO_NOMBRE varchar(120),
	ALUMNO_BUENAS int,
	ALUMNO_PUNT int,
	ALUMNO_STYLE char(7),
	ALUMNO_FECHA varchar(8),
	PRIMARY KEY (USUARIO_NO)
);

CREATE TABLE COLEGIO
(
	COLEGIO_NO int,
	USUARIO_NO varchar(9),
	COLEGIO_NOMBRE varchar(25),
	PRIMARY KEY (COLEGIO_NO)
);

CREATE TABLE VISITAS
(
	VISITAS int
);


INSERT INTO MATERIAS VALUES('1400','4','Matemáticas','Matemáticas IV');
INSERT INTO MATERIAS VALUES('1500','5','Matemáticas','Matemáticas V');
INSERT INTO UNIDAD VALUES('1400',1,'Conjuntos');
INSERT INTO UNIDAD VALUES('1400',2,'Sistemas de numeración');
INSERT INTO UNIDAD VALUES('1400',3,'El campo de los números reales');
INSERT INTO UNIDAD VALUES('1400',4,'Operaciones con monomios y polnomios');
INSERT INTO UNIDAD VALUES('1400',5,'Productos notables y factorización');
INSERT INTO UNIDAD VALUES('1400',6,'Operaciones con fracciones y redicales');
INSERT INTO UNIDAD VALUES('1400',7,'Ecuaciones y desigualdades');
INSERT INTO UNIDAD VALUES('1400',8,'Sistemas de ecuaciones y desigualdades');
INSERT INTO UNIDAD VALUES('1500',1,'Relaciones y funciones');
INSERT INTO UNIDAD VALUES('1500',2,'Funciones trigonométricas');
INSERT INTO UNIDAD VALUES('1500',3,'Funciones exponenciales y logarítmicas');
INSERT INTO UNIDAD VALUES('1500',4,'Sistemas de coordenadas y algunos conceptos básicos');
INSERT INTO UNIDAD VALUES('1500',5,'Discusión de ecuaciones algebráicas');
INSERT INTO UNIDAD VALUES('1500',6,'Ecuación de primer grado');
INSERT INTO UNIDAD VALUES('1500',7,'Ecuación general de segundo grado');
INSERT INTO UNIDAD VALUES('1500',8,'Circunferencia');
INSERT INTO UNIDAD VALUES('1500',9,'Parábola');
INSERT INTO UNIDAD VALUES('1500',10,'Elipse');
INSERT INTO UNIDAD VALUES('1500',11,'Hipérbola');
INSERT INTO PREGUNTAS VALUES('1500',2,'sen^2+cos^2',,'0','1','pi','-1',2,'SI');
INSERT INTO PREGUNTAS VALUES('1500',2,'e^(i*pi)',,'0','1','pi','-1',4,'SI');
INSERT INTO PREGUNTAS VALUES('1500',2,'si f(x)=sen(x); f(pi)',,'0','1','pi','-1',1,'SI');