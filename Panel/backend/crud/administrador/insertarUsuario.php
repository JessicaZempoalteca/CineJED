<?php

    include '../../admin/conexion.php';

    
    session_start();
    
    if(!isset($_SESSION['idUsuario'])){
        echo '<script>
                alert("Error, no ha iniciado sesión y no se puede redirigir a la página deseada.");
                window.location = "../../../usuario/login.php";
                </script>';
    }

    
    $nombre = $_POST['nombre'];
    $apellidoPaterno = $_POST['apellidoPaterno'];
    $apellidoMaterno = $_POST['apellidoMaterno'];
    $correo = $_POST['correo'];
    $password = $_POST['password'];
    $rol = $_POST['rol'];

    
    if(empty($nombre) || empty($apellidoPaterno) || empty($apellidoMaterno) || empty($correo) || empty($password) || empty($rol)){
        
        mysqli_close($conexion);
        
        echo '<script>alert("El campo nombre está vacio")</script>';
        echo '<script>window.location="../../../pages/usuario_nuevo.php"</script>';
    }
    
    
    $imagenPerfil = $_FILES['foto_perfil'];

    
    $nombreArchivo = 'NULL';

    if (!empty($imagenPerfil['name'])) {
        
        $temp = explode(".", $imagenPerfil["name"]); 
        $extension = end($temp); 

        
        if ($extension != "jpg" && $extension != "png" && $extension != "jpeg") {
            
            mysqli_close($conexion);
            
            
            echo '<script>alert("Solo se permiten archivos con extension jpeg o png")</script>';
            echo '<script>window.location="../../../pages/usuario_nuevo.php"</script>';
        }

        
        
        if (move_uploaded_file($imagenPerfil["tmp_name"], "../../../img/".$imagenPerfil["name"])) {
            $nombreArchivo = $imagenPerfil["name"];
        }
    }

    
    $query_text = 'SELECT * FROM usuarios WHERE correo="'.$correo.'";';
    $resultado = mysqli_query($conexion, $query_text);

    
    if(mysqli_num_rows($resultado)>0){
        
        echo '<script>alert("El correo ya existe. Intentalo nuevamente")</script>';
        echo '<script>window.location="../../../pages/usuario_nuevo.php"</script>"</script>';
    }
    else{
        
        
        
        $passwordEncripted = hash('sha256', $_POST['password']);

        
        $query_insert = 'INSERT INTO usuarios VALUES (NULL, 1, "'.$nombre.'", "'.$apellidoPaterno.'", "'.$apellidoMaterno.'", "'.$correo.'", "'.$passwordEncripted.'", "'.$nombreArchivo.'", "'.$rol.'");';
        
        
        
        $resultado = mysqli_query($conexion, $query_insert);
        
        
        if(!$resultado){
            
            mysqli_close($conexion);

            
            unlink("../../../img/".$nombreArchivo);

            echo '<script>alert("Error al guardar el usuario")</script>';
            echo '<script>window.location="../../../pages/usuario_nuevo.php"</script>';
        }
        else{
            
            mysqli_close($conexion);
            echo '<script>alert("Usuario guardado correctamente")</script>';
            echo '<script>window.location="../../../pages/usuarios.php"</script>';
        }
    }
?>