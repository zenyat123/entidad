-- Created by Vertabelo (http://vertabelo.com)
-- Last modification date: 2018-09-02 03:19:53.12


CREATE DATABASE Entidad;

USE Entidad;


-- Tables


-- Table: empleado

CREATE TABLE empleado (
    id_empleado int(10) NOT NULL,
    nombres text NOT NULL,
    apellidos text NOT NULL,
    dependencia text NOT NULL,
    email text NOT NULL,
    password text NOT NULL,
    fecha_ingreso date NOT NULL,
    CONSTRAINT empleado_pk PRIMARY KEY (id_empleado)
);

-- Table: persona

CREATE TABLE persona (
    id_persona int(10) NOT NULL,
    tipo_identificacion text NOT NULL,
    nombres text NOT NULL,
    apellidos text NOT NULL,
    direccion text NOT NULL,
    telefono text NOT NULL,
    email text NOT NULL,
    password text NOT NULL,
    CONSTRAINT persona_pk PRIMARY KEY (id_persona)
);

-- Table: tema

CREATE TABLE tema (
    id_tema int(10) NOT NULL,
    tema text NOT NULL,
    CONSTRAINT tema_pk PRIMARY KEY (id_tema)
);

-- Table: tramite

CREATE TABLE tramite (
    radicado int(10) NOT NULL,
    titulo text NOT NULL,
    estado text NOT NULL,
    fecha date NOT NULL,
    id_persona int(10) NOT NULL,
    id_empleado int(10) NOT NULL,
    id_tema int NOT NULL,
    CONSTRAINT tramite_pk PRIMARY KEY (radicado)
);

-- Foreign keys

-- Reference: tramite_empleado (table: tramite)

ALTER TABLE tramite ADD CONSTRAINT tramite_empleado FOREIGN KEY tramite_empleado (id_empleado)
    REFERENCES empleado (id_empleado);

-- Reference: tramite_persona (table: tramite)

ALTER TABLE tramite ADD CONSTRAINT tramite_persona FOREIGN KEY tramite_persona (id_persona)
    REFERENCES persona (id_persona);

-- Reference: tramite_tema (table: tramite)

ALTER TABLE tramite ADD CONSTRAINT tramite_tema FOREIGN KEY tramite_tema (id_tema)
    REFERENCES tema (id_tema);

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_empleado`, `nombres`, `apellidos`, `dependencia`, `email`, `password`, `fecha_ingreso`) VALUES
(1024515308, 'Fabio Andrés', 'Zamora Romero', 'Tecnología', 'empleado@empleado.com', '$1$rasmusle$Ci5J5DCNJRVQPQkSPsIpp/', '2019-02-14'),
(1035412620, 'Juana Milena', 'Ortiz Puerto', 'Tecnología', 'empleado_dos@empleado.com', '$1$rasmusle$Ci5J5DCNJRVQPQkSPsIpp/', '2019-02-14');

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id_persona`, `tipo_identificacion`, `nombres`, `apellidos`, `direccion`, `telefono`, `email`, `password`) VALUES
(1364874526, 'Cédula de Ciudadanía', 'Diana Andrea', 'Perez Sosa', 'Diag. 23 # 42 - 13 Sur', '7584265', 'persona_dos@persona.com', '$1$rasmusle$4rmJ4ydTlY/OSqcNgnJwY1'),
(1514751489, 'Cédula de Ciudadanía', 'Lina Tatiana', 'Suarez Pineda', 'Cra 70 D # 45 - 12 Sur', '2145874', 'persona@persona.com', '$1$rasmusle$4rmJ4ydTlY/OSqcNgnJwY1');

--
-- Volcado de datos para la tabla `tema`
--

INSERT INTO `tema` (`id_tema`, `tema`) VALUES
(1, 'Consulta'),
(2, 'Facturación'),
(3, 'Pago'),
(4, 'Exportación');

--
-- Volcado de datos para la tabla `tramite`
--

INSERT INTO `tramite` (`radicado`, `titulo`, `estado`, `fecha`, `id_persona`, `id_empleado`, `id_tema`) VALUES
(200701, 'Licencia', 'Tramitado', '2007-01-01', 1514751489, 1024515308, 3);

-- End of file.