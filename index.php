
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <title>Formulario simple</title>
    <link rel="stylesheet" href="estilo.css">
    </head>
<body>
    <div class="formu" >
        <form method="POST" action="RecogerDatos.php">
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
                    foreach($contacto as $fcontacto => $valor) 
                        {
                        echo '<label><input type="checkbox" name="contacto[]" value="'.$fcontacto.'">'.$valor.'</label>';
                    }

                ?>
            </fieldset>
            <fieldset>
                <legend>Disponibilidad horaria</legend>
                <select name="eleccion" value="eleccion">
                    <?php
                    foreach($eleccion as $feleccion)
                         {
                            echo'<option>'.$feleccion.'</option>';
                         }
                    ?>
                </select>
            </fieldset>
            <fieldset>
                <legend> Comentario del formulario</legend>
               <label><textarea id="comentario" name="comentario" rows="5" cols="40"></textarea></label> 
            </fieldset>
            <fieldset>
                <legend>Aceptas los terminos</legend>
                <label><input type="checkbox" name="condiciones" value="condiciones"></input></label>
            </fieldset>

            <button type="submit">Enviar</button>

        </form>
    </div>
</body>
</html>