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
    $descripcion = $_POST['descripcion'];
    $anioEstreno = $_POST['anioEstreno'];
    $director = $_POST['director'];
    $duracion = $_POST['duracion'];
    $genero = $_POST['genero'];
    $estatus = $_POST['estatus'];

    
    if(empty($nombre) || empty($descripcion) || empty($duracion) || empty($estatus) || empty($genero)
    || empty($director) || empty($anioEstreno)){
        
        mysqli_close($conexion);
        
        echo '<script>alert("Hay campos vacios")</script>';
        echo '<script>window.location="../../../pages/pelicula_Familiar_nueva.php"</script>';
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

    
    $query_text = 'SELECT * FROM peliculas WHERE nombrePelicula="'.$nombre.'";';
    $resultado = mysqli_query($conexion, $query_text);

    
    if(mysqli_num_rows($resultado)>0){
        
        echo '<script>alert("La pelicula ya existe. Intentalo nuevamente")</script>';
        echo '<script>window.location="../../../pages/pelicula_Familiar_nueva.php"</script>"</script>';
    }
    else{

        
        $query_insert = 'INSERT INTO peliculas 
                        VALUES (NULL, "'.$nombre.'", "'.$descripcion.'", "'.$duracion.'", "'.$anioEstreno.'", "'.$genero.'", "'.$director.'", "'.$estatus.'", "'.$nombreArchivo.'");';
        
        
        
        $resultado = mysqli_query($conexion, $query_insert);
        
        
        if(!$resultado){
            
            mysqli_close($conexion);

            
            unlink("../../../img/".$nombreArchivo);

            echo '<script>alert("Error al guardar la pelicula")</script>';
            echo '<script>window.location="../../../pages/pelicula_Familiar_nueva.php"</script>';
        }
        else{
            
            mysqli_close($conexion);
            echo '<script>alert("Pelicula guardada correctamente")</script>';
            echo '<script>window.location="../../../pages/dashboard.php"</script>';
        }
    }
?>