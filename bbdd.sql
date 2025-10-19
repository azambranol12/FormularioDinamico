--Esta es la base de datos que he creado con lo que encvía el usuario del formulario que es la tabla usuario
CREATE TABLE usuarios(
    id smallint unsigned AUTO_INCREMENT PRIMARY KEY,
    nombre varchar(100) NOT NULL,
    apellidos varchar(150) NOT NULL,
    contrasenia varchar(255) NOT NULL,
    accion varchar(100) NOT NULL,
    eleccion varchar(100) NOT NULL,
    comentario varchar(300) null,
    condiciones boolean DEFAULT 0,
    fechaRegistro timestamp DEFAULT CURRENT_TIMESTAMP
);
--Por aquí el contacto que también lo envía el usuario
CREATE TABLE contactos (
    idContacto smallint unsigned AUTO_INCREMENT PRIMARY KEY,
    idUsuario smallint unsigned NOT NULL,
    metodoContacto VARCHAR(100) NOT NULL,
    FOREIGN KEY (idUsuario) REFERENCES usuarios(id) ON DELETE CASCADE
);
--Y las opciones son la información de los selects y checkboxs
CREATE TABLE opcionesContacto (
    id smallint unsigned AUTO_INCREMENT PRIMARY KEY,
    valor varchar(100) NOT NULL,
    etiqueta varchar(100) NOT NULL
);

CREATE TABLE opcionesEleccion (
    id smallint unsigned AUTO_INCREMENT PRIMARY KEY,
    texto varchar(100) NOT NULL
);

--Esta es la información que le he añadido a las tablas
-- Opciones de contacto
INSERT INTO opcionesContacto (valor, etiqueta) VALUES
('email', 'Correo electrónico'),
('telefono', 'Teléfono'),
('whatsApp', 'WhatsApp');

-- Opciones de disponibilidad (select)
INSERT INTO opcionesEleccion (texto) VALUES
('Mañanas'),
('Tardes'),
('Mediodía');
