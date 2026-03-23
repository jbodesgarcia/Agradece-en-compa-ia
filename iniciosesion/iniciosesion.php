<?php 
    session_start();


    require "configdb.php";
   
    //abrimos conexion
    function conectar(){
        $conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);
        $conexion->set_charset("utf8");
        return $conexion;
    }


    $conexion=conectar();

    //decimos que la variable $correo coja el valor del apartado correo y $contraseña el apartado de contraseña de la pagina html de inicio de sesion
    $correo=$_POST["correo"];
    $pw=$_POST["pw"];

    //aqui le decimos que sql sea el nPuesto donde coincidad el correo y la contraseña
    $sql="SELECT nPuesto FROM Alumno WHERE correo='".$correo."' AND pw='".$pw."'";

    //visualizamos la consulta
    echo $sql;
    echo"<br/>";

    $resultado=$conexion->query($sql);

    
    //si el resultado está en una fila, es que existe, si no, no existe
    if($resultado->num_rows>0){
        echo "inicio de sesion exitoso";
    }else{
        echo "El correo o la contraseña no existen";
    }
   
    $_SESSION['nPuesto'] = $resultado['nPuesto'];

?>
