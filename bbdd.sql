
--Creamos las tablas donde se extrae la informacion del select y del checkbox se hace para los dos de la misma manera
CREATE TABLE opcionesContacto(
    id smallint unsigned AUTO_INCREMENT PRIMARY KEY,
    valor varchar(100) NOT NULL,
    etiqueta varchar(100) NOT NULL
);

CREATE TABLE opcionesEleccion(
    id smallint unsigned AUTO_INCREMENT PRIMARY KEY,
    texto varchar(100) NOT NULL
);

--Creamos las dos tablas para guardas los datos del formulario por un lado usuario y por otro el contacto
CREATE TABLE usuarios(
    id smallint unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre varchar(100) NOT NULL,
    apellido varchar(100) NOT NULL,
    contrasenia varchar(255) NOT NULL,
    accion varchar(50) NOT NULL,
    comentario varchar(300) NOT NULL,
    horarioId smallint unsigned NOT NULL,
    fechaRegistro timestamp DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (horario_id) REFERENCES opcioneseleccion(id)
);

CREATE TABLE usuarioContacto(
    id smallint unsigned NOT NULL AUTO_INCREMENT,
    usuarioId smallint unsigned NOT NULL,
    PRIMARY KEY (id, usuarioId),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE,
    FOREIGN KEY (contacto_valor) REFERENCES opcionescontacto(valor) ON DELETE CASCADE,
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
