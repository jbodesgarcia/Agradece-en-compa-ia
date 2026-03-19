<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba</title>
</head>
<body>
  <?php
    //Necesitar hacer include o require del archivo que tiene la conexión

    require "configdb.php";

    function conectar(){
    
      $conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);
      $conexion->set_charset("utf8"); 
      return $conexion;
    }
    
    //Función para mostrar filas de una tabla
    function mostrar_alumnos(){ 

      //Conecta con la base de datos y crea el objeto $conexión.
      $conexion=conectar();  
      
      //Ejecuta la consulta sql
      $sql="SELECT nPuesto,nombre from alumno";
      $resultado=$conexion->query($sql);	
      
      //Muestra el campo 1
      $fila=$resultado->fetch_array();
      visualizar($fila);

      //Muestra el campo 2
      $fila=$resultado->fetch_array();
      visualizar($fila);

      //Muestra el campo 3
      $fila=$resultado->fetch_array();
      visualizar($fila);
    }

    //funcion para mostrar en pantalla el numero del puesto y el nombre
    function visualizar($fila){
      echo '<p>';
      echo 'Numero puesto: '.$fila["nPuesto"];
      echo '<br>';
      echo 'Nombre Alumno '.$fila["nombre"];
      echo '</p>';

    }

    //ejecutamos el function para que se pueda visualizar
    mostrar_alumnos();
  
  ?>
</body>
</html>
