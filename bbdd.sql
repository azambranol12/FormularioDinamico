
--Y las opciones son la información de los selects y checkboxs
CREATE TABLE opcionesContacto(
    id smallint unsigned AUTO_INCREMENT PRIMARY KEY,
    valor varchar(100) NOT NULL,
    etiqueta varchar(100) NOT NULL
);

CREATE TABLE opcionesEleccion(
    id smallint unsigned AUTO_INCREMENT PRIMARY KEY,
    texto varchar(100) NOT NULL
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
