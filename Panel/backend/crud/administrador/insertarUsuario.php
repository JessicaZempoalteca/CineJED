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
    $rol = $_POST['rol'];

    //se validan si los datos no estan vacios
    if(empty($nombre) || empty($apellidoPaterno) || empty($apellidoMaterno) || empty($correo) || empty($password) || empty($rol)){
        //se cierra la conexion
        mysqli_close($conexion);
        //se redirecciona a la pagina de registro
        echo '<script>alert("El campo nombre está vacio")</script>';
        echo '<script>window.location="../../../pages/usuario_nuevo.php"</script>';
    }
    
    //se declara una variable para referenciar al input del formulario q tiene la imagen
    $imagenPerfil = $_FILES['foto_perfil'];

    //variable para almacenar el nombre de la imagen
    $nombreArchivo = 'NULL';

    if (!empty($imagenPerfil['name'])) {
        //obtiene la extension del archivo
        $temp = explode(".", $imagenPerfil["name"]); //separa la cadena por el punto ya que es su delimitador - jpg, png, etc
        $extension = end($temp); //obtiene el ultimo valor del arreglo, es decir, la extension del archivo

        //se valida que la extension sea la correcta
        if ($extension != "jpg" && $extension != "png" && $extension != "jpeg") {
            //se cierra la conexion
            mysqli_close($conexion);
            //se redirecciona a la pagina de registro
            //se redirecciona a la pagina de registro
            echo '<script>alert("Solo se permiten archivos con extension jpeg o png")</script>';
            echo '<script>window.location="../../../pages/usuario_nuevo.php"</script>';
        }

        //se sube el archivo al servidor desde la interfaz al servidor
        //accede a la posicion del nombre temporal del archivo que se sube
        if (move_uploaded_file($imagenPerfil["tmp_name"], "../../../img/".$imagenPerfil["name"])) {
            $nombreArchivo = $imagenPerfil["name"];
        }
    }

    //query text para buscar el correo que se ingresa en la base de datos
    $query_text = 'SELECT * FROM usuarios WHERE correo="'.$correo.'";';
    $resultado = mysqli_query($conexion, $query_text);

    //verifica si el correo existe por medio del query text anterior
    if(mysqli_num_rows($resultado)>0){
        //si existe, manda de nuevo al fomrulario de registro
        echo '<script>alert("El correo ya existe. Intentalo nuevamente")</script>';
        echo '<script>window.location="../../../pages/usuario_nuevo.php"</script>"</script>';
    }
    else{
        //si no existe, se procede a insertar el usuario en la base de datos
        
        //encriptacion de la password por medio de sha256
        $passwordEncripted = hash('sha256', $_POST['password']);

        //query text para insertar el usuario en la base de datos
        $query_insert = 'INSERT INTO usuarios (idUsuario, estatus_usuario, nombre, apellidoPaterno, apellidoMaterno, correo, password, imagenUsuario, idRol) 
        VALUES (NULL, 1, "'.$nombre.'", "'.$apellidoPaterno.'", "'.$apellidoMaterno.'", "'.$correo.'", "'.$passwordEncripted.'", "'.$nombreArchivo.'", "'.$rol.'");';
        
        //se ejecuta el query text
        //ESTE PROCESO DA COMO RESULTADO TRUE O FALSE
        $resultado = mysqli_query($conexion, $query_insert);
        
        //se valida si el resultado es false
        if(!$resultado){
            //se cierra la conexion
            mysqli_close($conexion);

            //se borra el archivo de imagen guardado en el servidor
            unlink("../../../img/".$nombreArchivo);

            echo '<script>alert("Error al guardar el usuario")</script>';
            echo '<script>window.location="../../../pages/usuario_nuevo.php"</script>';
        }
        else{
            //se cierra la conexion
            mysqli_close($conexion);
            echo '<script>alert("Usuario guardado correctamente")</script>';
            echo '<script>window.location="../../../pages/usuarios.php"</script>';
        }
    }
?>