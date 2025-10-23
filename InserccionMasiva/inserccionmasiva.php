<?php
//Conecta con la base de datos
	include 'configdb.php'; 
	$conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);
	$conexion->set_charset("utf8"); 

//Desactivar errores
	$controlador = new mysqli_driver();
	$controlador->report_mode = MYSQLI_REPORT_OFF;
        
// Eliminar la base de datos anterior si existe y crear una nueva
    $sql = "

    
    DROP DATABASE IF EXISTS formulariodinamico;
    CREATE DATABASE formulariodinamico;
    USE formulariodinamico;

    -- Tabla de contactos (checkbox)
    CREATE TABLE opcionesContacto(
        idContacto smallint unsigned AUTO_INCREMENT PRIMARY KEY,
        valor VARCHAR(100) NOT NULL UNIQUE,
        etiqueta VARCHAR(100) NOT NULL
    );

    -- Tabla de opciones de selección (select)
    CREATE TABLE opcionesEleccion(
        idEleccion smallint unsigned AUTO_INCREMENT PRIMARY KEY,
        texto varchar(100) NOT NULL
    );

    CREATE TABLE usuarios(
        idUsuario smallint unsigned AUTO_INCREMENT PRIMARY KEY,
        nombre varchar(100) NOT NULL,
        apellido varchar(100) NOT NULL,
        contrasenia varchar(255) NOT NULL,
        accion varchar(50) NOT NULL,
        comentario varchar(300) NULL,
        horarioId smallint unsigned NOT NULL,
        fechaRegistro timestamp default CURRENT_TIMESTAMP,
        FOREIGN KEY (horarioId) REFERENCES opcionesEleccion(idEleccion)
    );

    CREATE TABLE usuarioContacto(
        idUsuario smallint unsigned NOT NULL,
        valor varchar(100) NOT NULL,
        PRIMARY KEY (idUsuario, valor),
        FOREIGN KEY (idUsuario) REFERENCES usuarios(idUsuario) ON DELETE CASCADE,
        FOREIGN KEY (valor) REFERENCES opcionesContacto(valor) ON DELETE CASCADE
    );

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


    ";

   
    $conexion->multi_query($sql);

    $conexion->close();
?>
