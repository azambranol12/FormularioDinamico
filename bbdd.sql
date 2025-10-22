
-- Tabla de contactos (checkbox)
CREATE TABLE opcionesContacto(
    id smallint unsigned AUTO_INCREMENT PRIMARY KEY,
    valor VARCHAR(100) NOT NULL UNIQUE,
    etiqueta VARCHAR(100) NOT NULL
);

-- Tabla de opciones de selección (select)
CREATE TABLE opcionesEleccion(
    id smallint unsigned AUTO_INCREMENT PRIMARY KEY,
    texto varchar(100) NOT NULL
);

--Tabla de usuarios
CREATE TABLE usuarios (
    id smallint unsigned AUTO_INCREMENT PRIMARY KEY,
    nombre varchar(100) NOT NULL,
    apellido varchar(100) NOT NULL,
    contrasenia varchar(255) NOT NULL,
    accion varchar(50) NOT NULL,
    comentario varchar(300) NOT NULL,
    horarioId smallint unsigned NOT NULL,
    fechaRegistro timestamp default CURRENT_TIMESTAMP,
    FOREIGN KEY (horarioId) REFERENCES opcionesEleccion(id)
);

--Relación usuario y contacto
CREATE TABLE usuarioContacto (
    usuarioId smallint unsigned NOT NULL,
    contactoValor varchar(100) NOT NULL,
    PRIMARY KEY (usuarioId, contactoValor),
    FOREIGN KEY (usuarioId) REFERENCES usuarios(id) ON DELETE CASCADE,
    FOREIGN KEY (contactoValor) REFERENCES opcionesContacto(valor) ON DELETE CASCADE
);


--Esta es la información que le he añadido a las tablas
-- Opciones de contacto
INSERT INTO opcionesContacto(valor, etiqueta) VALUES
('email', 'Correo electrónico'),
('telefono', 'Teléfono'),
('whatsApp', 'WhatsApp');

-- Opciones de disponibilidad (select)
INSERT INTO opcionesEleccion(texto) VALUES
('Mañanas'),
('Tardes'),
('Mediodía');
