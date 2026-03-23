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
      
      //esto lo que hace es, resultado tiene todas las filas que ha devuelto la consulta.
      //Y como hay que recorrerlo, se usa el fetch array, para que coja la primera, y cuando se vuelve a llamar, pone el puntero a la siguiente
      //Y el while pone en $fila la fila que haya en el resultado con el fetch array, y va recorriendo hasta que fetch array no lea mas.
      //Entonces el while termina cuando no quedan mas filas por recorrer 

      while($fila=$resultado->fetch_array()){
        visualizar($fila);
      }

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
