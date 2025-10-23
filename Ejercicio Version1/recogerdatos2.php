<?php

//En esta parte queremos ver que hace si envíamos sin seleccionar contactos

//Conecta con la base de datos
	include 'configdb.php'; 
	$conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);
	$conexion->set_charset("utf8"); 

//Desactiva errores
	$controlador = new mysqli_driver();
	$controlador->report_mode = MYSQLI_REPORT_OFF;

/*Recibir las variables y las valido con una ternaria.
Primero con el isset veo que no esten vacias ? y veo que tampoco tenga solo espacios
en el caso de que lo tenga guarda en la variable nada y asi después puedo validar*/
    $nombre = isset($_POST["nombre"]) ? trim(string: $_POST["nombre"]) : ''; 
    $apellido = isset($_POST["apellido"]) ? trim(string: $_POST["apellido"]) : '';
    $contrasenia = isset($_POST["contrasenia"]) ? trim(string: $_POST["contrasenia"]) : '';
    $accion = isset($_POST["accion"]) ? trim(string: $_POST["accion"]) : '';
    $eleccion = isset($_POST["eleccion"]) ? trim(string: $_POST["eleccion"]) : '';
    $comentario = isset($_POST["comentario"]) ? trim(string: $_POST["comentario"]) : '';
    $contacto = isset($_POST['contacto']) ? $_POST['contacto'] : []; //Así se recibe el array y lo mismo si no selecciona nada deja el array vacío


//Aquí valido que si hay alguna de las variables en blanco te de true y te haga volver atrás rederigiendote a la página anterior
    if($nombre == '' || $apellido == "" || $contrasenia == '' || $accion == ''|| $eleccion == '')
    {
        echo '<h2><a href="index.php"> Algo en blanco, vuelve a introducir todos los datos. </a></h2>';
        exit();
    }

    $sql_Insertar = "INSERT INTO usuarios (nombre, apellido, contrasenia, accion, horarioId, comentario) VALUES ('$nombre', '$apellido', '$contrasenia', '$accion','$eleccion','$comentario');";
    echo $sql_Insertar.'</br>';
    $resultadoContacto = $conexion->query($sql_Insertar);

    $usuarioId = $conexion->insert_id; //El insert nos sirve para añadir el id recien usado en la anterior consulta
    foreach ($contacto as $valor) { //Ni si quiera entra en el foreach por no poner nada 
        $sql_contacto = "INSERT INTO usuarioContacto (idUsuario, valor) VALUES ('$usuarioId', '$valor')";
        $resultadoUsuContacto = $conexion->query($sql_contacto);
        echo $sql_contacto.'</br>';
    }
    
    $conexion->close(); 
?>