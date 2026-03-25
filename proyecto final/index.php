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
    $nPuesto=$_POST["nPuesto"];
    $pw=$_POST["pw"];

    //aqui le decimos que sql sea el nPuesto donde coincidad el correo y la contraseña
    $sql="SELECT nPuesto FROM Alumno WHERE nPuesto='".$nPuesto."' AND pw='".$pw."'";

    //visualizamos la consulta
    
    $resultado=$conexion->query($sql);

    
    //si el resultado está en una fila, es que existe, si no, no existe

    if($resultado->num_rows>0){
        header("Location: mandaragradecimiento.php");
    }else{
        header("Location: index.html");
    }
   

    $_SESSION['nPuesto'] = $_POST['nPuesto'];

?>