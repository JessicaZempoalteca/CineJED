<?php

    include '../../admin/conexion.php';

    
    session_start();
    
    if(!isset($_SESSION['idUsuario'])){
        echo '<script>
                alert("Error, no ha iniciado sesión y no se puede redirigir a la página deseada.");
                window.location = "../../../usuario/login.php";
                </script>';
    }

    
    $nombreSucursal = $_POST['nombre'];

    
    if(empty($nombreSucursal)){
        
        mysqli_close($conexion);
        
        echo '<script>alert("El campo nombre está vacio")</script>';
        echo '<script>window.location="../../../pages/usuario_nuevo.php"</script>';
    }

    
    $query_text = 'SELECT * FROM sucursal WHERE nombreSucursal="'.$nombreSucursal.'";';
    $resultado = mysqli_query($conexion, $query_text);

    
    if(mysqli_num_rows($resultado)>0){
        
        echo '<script>alert("La sucursal con ese nombre ya existe. Intentalo nuevamente")</script>';
        echo '<script>window.location="../../../pages/sucursal_nueva.php"</script>"</script>';
    }
    else{
        
        $query_insert = 'INSERT INTO usuarios VALUES (NULL, "'.$nombreSucursal.'");';
        
        
        
        $resultado = mysqli_query($conexion, $query_insert);
        
        
        if(!$resultado){
            
            mysqli_close($conexion);

            
            unlink("../../../img/".$nombreArchivo);

            echo '<script>alert("Error al guardar la sucursal")</script>';
            echo '<script>window.location="../../../pages/sucursal_nueva.php"</script>';
        }
        else{
            
            mysqli_close($conexion);
            echo '<script>alert("La sucursal se ha guardado correctamente")</script>';
            echo '<script>window.location="../../../pages/sucursales.php"</script>';
        }
    }
