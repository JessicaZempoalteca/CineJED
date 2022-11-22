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
    $nombreSucursal = $_POST['nombre'];

    //se validan si los datos no estan vacios
    if(empty($nombreSucursal)){
        //se cierra la conexion
        mysqli_close($conexion);
        //se redirecciona a la pagina de registro
        echo '<script>alert("El campo nombre está vacio")</script>';
        echo '<script>window.location="../../../pages/usuario_nuevo.php"</script>';
    }

    //query text para buscar el correo que se ingresa en la base de datos
    $query_text = 'SELECT * FROM sucursal WHERE nombreSucursal="'.$nombreSucursal.'";';
    $resultado = mysqli_query($conexion, $query_text);

    //verifica si el correo existe por medio del query text anterior
    if(mysqli_num_rows($resultado)>0){
        //si existe, manda de nuevo al fomrulario de registro
        echo '<script>alert("La sucursal con ese nombre ya existe. Intentalo nuevamente")</script>';
        echo '<script>window.location="../../../pages/sucursal_nueva.php"</script>"</script>';
    }
    else{
        //query text para insertar la sucursal en la base de datos
        $query_insert = 'INSERT INTO usuarios VALUES (NULL, "'.$nombreSucursal.'");';
        
        //se ejecuta el query text
        //ESTE PROCESO DA COMO RESULTADO TRUE O FALSE
        $resultado = mysqli_query($conexion, $query_insert);
        
        //se valida si el resultado es false
        if(!$resultado){
            //se cierra la conexion
            mysqli_close($conexion);

            //se borra el archivo de imagen guardado en el servidor
            unlink("../../../img/".$nombreArchivo);

            echo '<script>alert("Error al guardar la sucursal")</script>';
            echo '<script>window.location="../../../pages/sucursal_nueva.php"</script>';
        }
        else{
            //se cierra la conexion
            mysqli_close($conexion);
            echo '<script>alert("La sucursal se ha guardado correctamente")</script>';
            echo '<script>window.location="../../../pages/sucursales.php"</script>';
        }
    }
