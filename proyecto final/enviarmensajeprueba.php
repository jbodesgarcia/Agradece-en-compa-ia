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

    //$sql coge las lineas donde el idEmidos sea $emisor y en la que idReceptor sea $receptor

    $sql="SELECT * FROM Agradecimiento where idEmisor='".$emisor."' AND idReceptor='".$receptor."'";
    $resultado=$conexion->query($sql);
  
    //si ya existe es que ya ha enviado mensaje, entonces no deja porque solo puede enviar un mensaje por persona
    //y si el emisor es igual al receptor, tampoco deja porque no puede enviarse mensaje a si mismo
    //en los dos casos los devuelve a la pagina otra vez
    //y si no se da el caso, envía el mensaje a la base de datos

    if($resultado->num_rows>0 || $emisor==$receptor){
        header("Location: mandaragradecimiento.php");
    }else{
        $sql="INSERT INTO Agradecimiento(texto,idEmisor,idReceptor)
        VALUES ('".$texto."','".$emisor."','".$receptor."')";
        $conexion->query($sql);
    }

    header("Location: mandaragradecimiento.php");
    



?>