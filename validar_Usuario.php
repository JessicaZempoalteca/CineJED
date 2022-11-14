<?php
    //Incluir el archivo de conexión
    include './conexion.php';

    //Importar la libreria de variables de sesion
    session_start();

    //Declaración de variables para alamacenar los datos
    $usuario = $_POST['email'];
    $password = $_POST['password'];

    //Valida si mis variables no esán vacias
    if(empty($usuario) || empty($password)){
        echo 'Tu información de usuario está vacia.';
    }//end if empty
    else{
        //Query para verificar si existe el usuario
        $query_text = 'SELECT * FROM usuarios INNER JOIN roles ON usuarios.id_rol = roles.id_rol  WHERE email_usuario="'.$usuario.'" AND password_usuario = "'.$password.'";';
        // echo $query_text;

        //Creamos la consulta con el query
        $query_res = mysqli_query($conexion, $query_text);

        //Mostramos en pantalla la información de la peticion como prueba
        //print("<pre>".print_r($query_res, true)."</pre>");

        if(mysqli_num_rows($query_res) == 0){
            //Muestra una alerta
            echo '<script>alert("Usuario y/o contraseña incorrectos")</script>';
            //Destruimos la sesion
            session_destroy();
            //Redireccionamos al login de nuevo
            echo '<script>window.location="../../../usuario/login.php"</script>';
        }//end if mysqli_num_rows
        else{
            // ec
            //Se obtienen los datos y se meten en un arreglo asociativo
            $datos = mysqli_fetch_array($query_res, MYSQLI_ASSOC);
            
            //Muestra los datos 
            print("<pre>".print_r($datos, true)."</pre>");

            //Se crea el archivo de sesiones
            $_SESSION['id_usuario'] = $datos['id_usuario'];
            $_SESSION['nombre_usuario'] = $datos['nombre_usuario'];
            $_SESSION['id_rol'] = $datos['id_rol'];
            $_SESSION['rol'] = $datos['rol'];

            print("<pre>".print_r($_SESSION, true)."</pre>");

            //Se libera el objeto de datos asociativo
            mysqli_free_result($query_res);

            //Se cierra la conexion
            mysqli_close($conexion);

            //Se redirecciona a un lugar
            echo '<script>window.location="../../pages/dashboard_prueba.php"</script>';
        }//end else
    }//end else empty