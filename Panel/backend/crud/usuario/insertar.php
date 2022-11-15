<?php
    include '../../admin/conexion.php';

    $nombre = $_POST['nombre'];
    $apellidoPaterno = $_POST['apellidoPaterno'];
    $apellidoMaterno = $_POST['apellidoMaterno'];
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    if(empty($nombre)){
        echo '<script>alert("El campo nombre está vacio")</script>';
        echo '<script>window.location=""</script>';
    }

    $query_text = 'SELECT * FROM usuarios WHERE correo="'.$correo.'";';
    $resultado = mysqli_query($conexion, $query_text);

    if(mysqli_num_rows($resultado)>0){
        echo '<script>alert("El correo ya existe")</script>';
        echo '<script>window.location=""</script>';
    }
    else{
        $passwordEncripted = hash('sha256', $_POST['password']);
        $query_insert = 'INSERT INTO usuarios (idUsuario, estatus_usuario, nombre, apellidoPaterno, apellidoMaterno, correo, password, imagenUsuario, idRol) 
        VALUES (NULL, 1, "'.$nombre.'", "'.$apellidoPaterno.'", "'.$apellidoMaterno.'", "'.$correo.'", "'.$passwordEncripted.'", NULL, 1);';
        $resultado = mysqli_query($conexion, $query_insert);
        
        if($resultado){
            echo '<script>alert("Usuario registrado")</script>';
            echo '<script>window.location=""</script>';
        }
        else{
            echo '<script>alert("Error al registrar")</script>';
            echo '<script>window.location=""</script>';
        }
    }
?>