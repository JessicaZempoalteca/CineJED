<?php

    //Declaración de variables par la conexion con la BD
    $server = 'localhost'; //Servidor
    $bd =  'cinejed'; //Base de datos
    $user = 'root'; //Usuario de acceso a la BD
    $password = ''; // Contraseña de acceso a la BD

    //Proceso de conexión a la BD
    $conexion = mysqli_connect($server, $user, $password, $bd);

    //Validamos la conexión con la BD
    if(!$conexion){
        die('Error al conectarse con la Base de Datos,'. mysqli_connect_error());
        exit;
    }//end 
    
    //Procesa o relizamos una petición a la BD
    //echo '<script>alert("Conexión éxitosa a la BD")</script>';
    //variable de conexion y el proceso que se quiere realizar
    mysqli_query($conexion, 'SET NAMES "utf8"');
    