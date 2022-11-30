<?php
    
    include '../../admin/conexion.php';

    
    session_start();

    
    if(!isset($_SESSION['idUsuario'])){
        echo '
                <script>
                    alert("No tienes permiso para acceder a esta vista. Inicia sesión, por favor...");
                    window.location="../../../usuario/login.php";
                </script>
            ';
    }

    
    $idPelicula  = $_POST['idPelicula'];
    $nombre = $_POST['nombre'];
    $anioEstreno = $_POST['anioEstreno'];
    $descripcion = $_POST['descripcion'];
    $duracion = $_POST['duracion'];
    $genero = $_POST['genero'];
    $director = $_POST['director'];
    $estatus_pelicula = $_POST['estatus'];
    $foto_perfil_actual = $_POST['foto_perfil_actual'];

    
    if( empty($nombre) || empty($descripcion) || empty($anioEstreno) || empty($duracion) || empty($director) ){
        
		
        
		echo '<script>alert("Error, hay información faltante.");</script>';
		echo '<script> window.location="../../../pages/peliculas_Familiares_detalles.php"; </script>';
    }

    
    
    
    
	$imagen = $_FILES['foto_perfil'];

    
    $nombre_archivo = '';

    
    if(!empty($imagen["name"])){
        
        $temp = explode(".", $imagen["name"]);
        $extension = end($temp);

        
        if ($extension != "jpg" && $extension != "png" && $extension != "jpeg") {
        	
        	mysqli_close($conexion);
            echo '<script>alert("Solo se permiten archivos con extension jpeg o png")</script>';
        	echo '<script> window.location="../../../pages/peliculas_Familiares_detalles.php"; </script>';
        }

        
        if(move_uploaded_file($imagen["tmp_name"], "../../../img/".$imagen["name"])){
            
            $nombre_archivo = ",imagenPelicula='".$imagen['name']."'";
        }
    }

    
    
    
    
    
    $query_update = "UPDATE peliculas SET nombrePelicula='$nombre', anioEstreno='$anioEstreno', director='$director',descripcion='$descripcion', estatus_pelicula='$estatus_pelicula',
                    duracion='$duracion'".$nombre_archivo." WHERE idPelicula ='$idPelicula';";
    
    
    $query_res = mysqli_query($conexion, $query_update);

    echo $nombre_archivo;
    
    if(!$query_res){
        if(!$imagen['name']){
            
            unlink("../../../img/".$imagen['name']);
        }
        echo '<script>alert("Error al actualizar la pelicula. Falló nuestro servidor, intente nuevamente, por favor.");</script>';
    }
    else{
        if(!empty($imagen['name']) && !empty($foto_perfil_actual)){
            
            if(file_exists("../../../img/".$foto_perfil_actual)){
                unlink("../../../img/".$foto_perfil_actual);
            }
        }
        
        echo '<script>alert("¡Pelicula actualizada exitosamente!");</script>';
    }

    
    mysqli_close($conexion);

    
    echo '<script> window.location = "../../../pages/dashboard.php";</script>';
    


    
