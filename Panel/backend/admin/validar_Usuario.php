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
        $query_text = 'SELECT * FROM usuarios INNER JOIN roles ON usuarios.idRol = roles.idUsuarioRol  WHERE correo="'.$usuario.'" AND password = "'.$password.'";';
         echo $query_text;

        //Creamos la consulta con el query
        //procesamiento de conexion
                                            //consulta de informacion
        $query_res = mysqli_query($conexion, $query_text);

        //Mostramos en pantalla la información de la peticion como prueba
        //print("<pre>".print_r($query_res, true)."</pre>");

        //proceso de comparacion
        //cuenta el numero de filas que ya se obtuvieron
        if(mysqli_num_rows($query_res) == 0){
            //Muestra una alerta
            echo '<script>alert("Usuario y/o contraseña incorrectos")</script>';
            //Destruimos la sesion
            session_destroy();
            //Redireccionamos al login de nuevo
            echo '<script>window.location="../../../User/login.php"</script>';
        }//end if mysqli_num_rows
        else{
            // ec
            //Se obtienen los datos y se meten en un arreglo asociativo
            //arreglo temporal
            //se para el resultado de la conexion
                                                    //todo el resultado se pasa a un arreglo asociativo
            $datos = mysqli_fetch_array($query_res, MYSQLI_ASSOC);
            
            //Muestra los datos del arreglo asociativo
            print("<pre>".print_r($datos, true)."</pre>");

            //Se crea el archivo de sesiones
            //vairable de sesion que se pueden manipular en cualquier parte del proyecto
            $_SESSION['idUsuario'] = $datos['idUsuario'];
            $_SESSION['nombreCompleto'] = $datos['nombre']. ' '.$datos['ApellidoPaterno'].' '.$datos['ApellidoMaterno'];
            $_SESSION['correo'] = $datos['correo'];
            $_SESSION['imagenPerfil'] = ($datos['imagenUsuario'] == NULL) ? '../img/icono-usuario.png' : '../img/'.$datos['imagenUsuario'];
            $_SESSION['idRol'] = $datos['idRol'];
            $_SESSION['rol'] = $datos['rol'];

            print("<pre>".print_r($_SESSION, true)."</pre>");

            //Se libera el objeto de datos asociativo
            mysqli_free_result($query_res);

            //Se cierra la conexion
            mysqli_close($conexion);

            //Se redirecciona a un lugar
            echo '<script>window.location="../../../Panel/pages/dashboard.php"</script>';
        }//end else
    }//end else empty