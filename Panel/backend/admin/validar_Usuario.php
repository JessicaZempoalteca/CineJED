<?php
    include './conexion.php';

    session_start();

    $usuario = $_POST['email'];
    $password = $_POST['password'];

    if(empty($usuario) || empty($password)){
        echo 'Tu información de usuario está vacia.';
    }
    else{

        $query_text = 'SELECT * FROM usuarios INNER JOIN roles ON usuarios.idRol = roles.idUsuarioRol  WHERE correo="'.$usuario.'" AND password = "'.hash('sha256', $_POST['password']).'";';

        $query_res = mysqli_query($conexion, $query_text);

        if(mysqli_num_rows($query_res) == 0){

            echo '<script>alert("Usuario y/o contraseña incorrectos")</script>';
           
            session_destroy();

            echo '<script>window.location="../../../User/pages/login.php"</script>';
        }
        else{

            $datos = mysqli_fetch_array($query_res, MYSQLI_ASSOC);
            
            $_SESSION['idUsuario'] = $datos['idUsuario'];
            $_SESSION['nombreCompleto'] = $datos['nombre']. ' '.$datos['ApellidoPaterno'].' '.$datos['apellidoMaterno'];
            $_SESSION['correo'] = $datos['correo'];
            $_SESSION['imagenPerfil'] = ($datos['imagenUsuario'] == NULL) ? 'icono-usuario.png' : $datos['imagenUsuario'];
            $_SESSION['idRol'] = $datos['idRol'];
            $_SESSION['rol'] = $datos['rol'];

            mysqli_free_result($query_res);

            mysqli_close($conexion);

            if ($_SESSION['idRol'] == 1) {
                echo '<script>window.location="../../../User/pages/index.php"</script>';
            }else{
                echo '<script>window.location="../../../Panel/pages/dashboard.php"</script>';
            }
        }
    }