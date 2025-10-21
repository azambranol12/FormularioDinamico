<?php

//Conecta con la base de datos
	include 'configdb.php'; 
	$conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);
	$conexion->set_charset("utf8"); 

    //Desactiva errores
	$controlador = new mysqli_driver();
	$controlador->report_mode = MYSQLI_REPORT_OFF;

    //Recibir las variables
    $nombre = isset($_POST["nombre"]) ? trim(string: $_POST["nombre"]) : '';
    $apellido = isset($_POST["apellido"]) ? trim(string: $_POST["apellido"]) : '';
    $contrasenia = isset($_POST["contrasenia"]) ? trim(string: $_POST["contrasenia"]) : '';
    $accion = isset($_POST["accion"]) ? trim(string: $_POST["accion"]) : '';
    $eleccion = isset($_POST["eleccion"]) ? trim(string: $_POST["eleccion"]) : '';

    echo $eleccion;

    if($nombre == '' || $apellido == "" || $contrasenia == '' || $accion == ''|| $eleccion == '')
    {
        echo '<h2><a href="index.php"> Algo en blanco, vuelve a introducir todos los datos. </a></h2>';
        exit();
    }

    $sql_Insertar = "INSERT INTO usuarios (nombre, apellido, contrasenia, accion, horarioId) VALUES ('$nombre', '$apellido', '$contrasenia', '$accion','$eleccion');";
    $resultadoContacto = $conexion->query($sql_Insertar);

    echo $sql_Insertar;

    $conexion->close();
?>