<?php
    //Incluir el archivo de conexión
    include './conexion.php';

    //Importar la libreria de variables de sesion
    session_start();

    //Declaración de variables para alamacenar los datos
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    //Valida si mis variables no esán vacias
    if(empty($usuario) || empty($password)){
        echo 'Tu información de usuario está vacia.';
    }//end if empty
    else{
        //Query para verificar si existe el usuario
        $query_text = 'SELECT * FROM usuarios INNER JOIN roles ON usuarios.idRol = roles.idUsuarioRol  WHERE email_usuario="'.$usuario.'" AND password_usuario = "'.$password.'";';
        // echo $query_text;

    }//end else empty