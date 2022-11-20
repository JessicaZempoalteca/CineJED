<?php
//se incluye la variable de conexion para la base de datos
    include '../../admin/conexion.php';

    //Se utiliza las variables de sesion
    session_start();
    //Validamos si la posicion existe y ya tiene un valor determinado por la consulta
    if(!isset($_SESSION['idUsuario'])){
        echo '<script>
                alert("Error, no ha iniciado sesión y no se puede redirigir a la página deseada.");
                window.location = "../../../usuario/login.php";
                </script>';
    }//

    //VARIABLES PARA ALMACENAR LA INFORMACION DEL FORMULARIO
    $nombre = $_POST['nombre'];
    $apellidoPaterno = $_POST['apellidoPaterno'];
    $apellidoMaterno = $_POST['apellidoMaterno'];
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    if(empty($nombre) || empty($apellidoPaterno) || empty($apellidoMaterno) || empty($correo) || empty($password)){
        echo '<script>alert("El campo nombre está vacio")</script>';
        echo '<script>window.location="../../../User/pages/login.php"</script>';
    }

    $query_text = 'SELECT * FROM usuarios WHERE correo="'.$correo.'";';
    $resultado = mysqli_query($conexion, $query_text);

    if(mysqli_num_rows($resultado)>0){
        echo '<script>alert("El correo ya existe")</script>';
        echo '<script>window.location="../../../../User/pages/registro.php"</script>"</script>';
    }
    else{
        $passwordEncripted = hash('sha256', $_POST['password']);
        $query_insert = 'INSERT INTO usuarios (idUsuario, estatus_usuario, nombre, apellidoPaterno, apellidoMaterno, correo, password, imagenUsuario, idRol) 
        VALUES (NULL, 1, "'.$nombre.'", "'.$apellidoPaterno.'", "'.$apellidoMaterno.'", "'.$correo.'", "'.$passwordEncripted.'", NULL, 1);';
        $resultado = mysqli_query($conexion, $query_insert);
        
        if($resultado){
            echo '<script>alert("Usuario registrado")</script>';
            echo '<script>window.location="../../../../User/pages/index.php"</script>';
        }
        else{
            echo '<script>alert("Error al registrar")</script>';
            echo '<script>window.location="../../../../User/pages/registro.php"</script>';
        }
    }
?>