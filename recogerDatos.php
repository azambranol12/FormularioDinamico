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
    $comentario = isset($_POST["comentario"]) ? trim(string: $_POST["comentario"]) : '';
    $contacto = isset($_POST['contacto']) ? $_POST['contacto'] : [];




    echo $eleccion;

    if($nombre == '' || $apellido == "" || $contrasenia == '' || $accion == ''|| $eleccion == '')
    {
        echo '<h2><a href="index.php"> Algo en blanco, vuelve a introducir todos los datos. </a></h2>';
        exit();
    }

    $sql_Insertar = "INSERT INTO usuarios (nombre, apellido, contrasenia, accion, horarioId, comentario) VALUES ('$nombre', '$apellido', '$contrasenia', '$accion','$eleccion','$comentario');";
    echo $sql_Insertar;
    $resultadoContacto = $conexion->query($sql_Insertar);


    $usuarioId = $conexion->insert_id;
    foreach ($contacto as $valor) {
        $sql_contacto = "INSERT INTO usuarioContacto (usuarioId, contactoValor)VALUES ('$usuarioId', '$valor')";
        $resultadoUsuContacto = $conexion->query($sql_contacto);
        echo $sql_contacto;
    }


    $conexion->close(); 
?>