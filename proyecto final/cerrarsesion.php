<?php
    //inicia la sesion
    session_start();

    //borra la sesion
    session_destroy();

    //redirige al inicio de sesion
    header("Location: iniciosesion.html");
?>