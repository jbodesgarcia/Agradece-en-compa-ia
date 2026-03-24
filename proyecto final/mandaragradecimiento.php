 <?php
    session_start();

                    require "configdb.php";

                    //funcion conectar
                   function conectar(){
                    $conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);
                    $conexion->set_charset("utf8");
                    return $conexion;
                   }


                    //ejecutamos la consulta
                    $conexion=conectar();
                    $sql="SELECT nPuesto,nombre FROM Alumno";
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
        <link rel="stylesheet" href="estilo.css">
    </head>
    <body>
        <header>
            <h1>Agradece en compañia</h1>
        </header>

        <main>
            <form action="enviarmensaje.php" method="POST">
                <p>Para</p>
                <select id="lista" name="receptor">
				
				<?php
					mostrar($resultado);
				?>

                </select>
                <p>Quiero agradecerte</p>
                <textarea placeholder="Escribe aqui tu mensaje de agradecimiento" name="texto"></textarea>
                <br>
                <input type="submit" value="Mandar">
                
            </form>
                
            <form action="cerrarsesion.php" method="POST">
                <br>
                <input type="submit" value="cerrar sesion">
            </form>
        
        </main>

        <footer>
            <img src="logoJesuitas.png" class="imagen">

        </footer>

    </body>
</html>