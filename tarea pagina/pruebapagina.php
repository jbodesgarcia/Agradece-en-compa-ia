 <?php

                    require "configdb.php";

                    //funcion conectar
                   function conectar(){
                    $conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);
                    $conexion->set_charset("utf8");
                    return $conexion;
                   }


                    //ejecutamos la consulta
                    $conexion=conectar();
                    $sql="SELECT nPuesto,nombre FROM alumno";
                    $resultado=$conexion->query($sql);
					
					function mostrar($resultado){
						while($fila=$resultado->fetch_array()){
							echo'<option value="'.$fila["nPuesto"].'">'.$fila["nombre"].'</option>';
						}
					}
					
                    //enseñamos en el option todos los valores de la tabla Alumnos
					
 ?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta charset="author" name="Jose Antonio Bodes García"/> 
        <title>Agradece en compañia</title>
    </head>
    <body>
        <header>
            <h1>Agradece en compañia</h1>
        </header>

        <main>
            <form>
                <p>Para</p>
                <select id="lista" name="lista">
				
				<?php
					mostrar($resultado);
				?>

                </select>
                <p>Quiero agradecerte</p>
                <textarea placeholder="Escribe aqui tu mensaje de agradecimiento"></textarea>
                <br>
                <input type="submit">
            </form>
        </main>

        <footer>
            <p>Agradece en compañia</p>

        </footer>

    </body>
</html>
