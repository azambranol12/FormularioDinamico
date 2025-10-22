<?php
    //Conecta con la base de datos
	include 'configdb.php'; 
	$conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);
	$conexion->set_charset("utf8"); 

    //Desactiva errores
	$controlador = new mysqli_driver();
	$controlador->report_mode = MYSQLI_REPORT_OFF;

    // Primera consulta
    $sql_opcionesT = "SELECT id, texto FROM opcioneseleccion;";
    $resultadoTurnos = $conexion->query($sql_opcionesT);

    // Segunda consulta
    $sql_opcionesC = "SELECT valor, etiqueta FROM opcionescontacto;";
    $resultadoContacto = $conexion->query($sql_opcionesC);

    echo $sql_opcionesT;
    echo $sql_opcionesC;

?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <title>Formulario simple</title>
    <link rel="stylesheet" href="estilo.css">
    </head>
<body>
    <div class="formu" >
        <form method="POST" action="recogerDatos.php">
            <fieldset>
                <legend>Datos personales</legend>
                <label>Nombre: <input type="text" name="nombre"></label>
                <label>Apellidos: <input type="text" name="apellido"></label>
                <label>Contraseña: <input type="password" name="contrasenia"></label>
            </fieldset>
                <fieldset>
                <legend>¿En que estas interesado ayudar?</legend>                    
                <label><input type="radio" name="accion" value="Basureros"> Basureros</label>
                <label><input type="radio" name="accion" value="Limpiar_en_playas"> Limpiar en playas</label>
                <label><input type="radio" name="accion" value="Reciclar"> Reciclar</label>
            </fieldset>
            <fieldset>
                <?php
                    echo'<legend>Forma de contactar contigo</legend>';
                    while ($fila = $resultadoContacto->fetch_assoc())
                        {
                        echo '<label><input type="checkbox" name="contacto[]" value="'.$fila["valor"].'">'.$fila["etiqueta"].'</label>';
                    }
                ?>
            </fieldset>
            <fieldset>
                <legend>Disponibilidad horaria</legend>
                <select name="eleccion" value="eleccion">
                    <?php
                        while ($fila1 = $resultadoTurnos->fetch_assoc())
                            {
                            echo'<option value='.$fila1["id"].'>'.$fila1["texto"].'</option>';
                        }
                        $conexion->close();
                    ?>
                </select>
            </fieldset>
            <fieldset>
                <legend> Comentario del formulario</legend>
               <label><textarea id="comentario" name="comentario" rows="5" cols="40"></textarea></label> 
            </fieldset>
            <fieldset>
                <legend>Aceptas los terminos</legend>
                <label><input type="checkbox" name="condiciones" value="condiciones" required></input></label>
            </fieldset>

            <button type="submit">Enviar</button>

        </form>
    </div>
</body>
</html>