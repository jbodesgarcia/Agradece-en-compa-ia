<?php
//asi se coge el nick(nombre jesuita) y la info(frase o motivo del por qué se ha cogido ese jesuita)
//del $idEmisor, que es quien envía el mensaje
$sql="SELECT nick, info FROM Alumno WHERE nPuesto='".$idEmisor."';
?>
