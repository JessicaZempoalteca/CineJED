<?php

    $server = 'localhost';
    $bd =  'cinejed';
    $user = 'root';
    $password = ''; 

    $conexion = mysqli_connect($server, $user, $password, $bd);

    if(!$conexion){
        die('Error al conectarse con la Base de Datos,'. mysqli_connect_error());
        exit;
    } 
    
    mysqli_query($conexion, 'SET NAMES "utf8"');
    