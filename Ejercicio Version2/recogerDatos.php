<?php

//Conecta con la base de datos
	include 'configdb.php'; 
	$conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);
	$conexion->set_charset("utf8"); 

//Desactiva errores
	$controlador = new mysqli_driver();
	$controlador->report_mode = MYSQLI_REPORT_OFF;

//Recibir las variables
    $nombre = isset($_POST["nombre"]) ? trim($_POST["nombre"]) : ''; 
    $apellido = isset($_POST["apellido"]) ? trim($_POST["apellido"]) : '';
    $contrasenia = isset($_POST["contrasenia"]) ? trim( $_POST["contrasenia"]) : '';
    $accion = isset($_POST["accion"]) ? trim( $_POST["accion"]) : '';
    $eleccion = isset($_POST["eleccion"]) ? trim( $_POST["eleccion"]) : '';
    $comentario = isset($_POST["comentario"]) ? trim( $_POST["comentario"]) : '';
    $contacto = isset($_POST['contacto']) ? $_POST['contacto'] : [];

//Validaciones para ver si esta vacío la variable eso añadi a esta version, cosa que en la otra no
    if($nombre == '' || $apellido == '' || $contrasenia == '' || $accion == ''|| $eleccion == '')
    {
        echo '<h2><a href="index.php"> Algo en blanco, vuelve a introducir todos los datos. </a></h2>';
        exit();
    }

    if(empty($contacto))
    {
        echo '<h2><a href="index.php"> Selecciona contactos. </a></h2>';
        exit();
    }

    if ($eleccion == 'blanco') {
        echo '<h2><a href="index.php"> Selecciona Horario. </a></h2>';
        exit();
    }

    /*if($comentario == '') Insertar el somentario en null estoy probando
    {
        $sql_Insertar = "INSERT INTO usuarios (nombre, apellido, contrasenia, accion, horarioId) VALUES ('$nombre', '$apellido', '$contrasenia', '$accion','$eleccion');";
        echo $sql_Insertar.'</br>';
        $resultadoContacto = $conexion->query($sql_Insertar);
    }else{
        $sql_Insertar = "INSERT INTO usuarios (nombre, apellido, contrasenia, accion, horarioId, comentario) VALUES ('$nombre', '$apellido', '$contrasenia', '$accion','$eleccion','$comentario');";
        echo $sql_Insertar.'</br>';
        $resultadoContacto = $conexion->query($sql_Insertar);
    }*/


    $usuarioId = $conexion->insert_id;
    foreach ($contacto as $valor) {
        $sql_contacto = "INSERT INTO usuarioContacto (idUsuario, valor)VALUES ('$usuarioId', '$valor')";
        $resultadoUsuContacto = $conexion->query($sql_contacto);
        echo $sql_contacto.'</br>';
    }

    echo '<h2>Insertado corectamente</h2>';


    $conexion->close(); 
?>