<?php
    session_start();

    require "configdb.php";

     //funcion conectar
    function conectar(){
        $conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);
        $conexion->set_charset("utf8");
        return $conexion;
    }
    $emisor=$_SESSION["nPuesto"];
    $receptor=$_POST["receptor"];
    $texto=$_POST["texto"];

    //ejecutamos la consulta
    $conexion=conectar();
    $sql="INSERT INTO Agradecimiento(texto,idEmisor,idReceptor)
          VALUES ('".$texto."','".$emisor."','".$receptor."')";

    
     $conexion->query($sql);

    header("Location: mandaragradecimiento.php");
    

?>