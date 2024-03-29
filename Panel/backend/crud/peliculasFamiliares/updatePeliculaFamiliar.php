<?php
    //Incluir el archivo de conexión
    include '../../admin/conexion.php';

    //Instanciamos las variables de sesion
    session_start();

    //Verificamos si realmente ha iniciado sesión
    if(!isset($_SESSION['idUsuario'])){
        echo '
                <script>
                    alert("No tienes permiso para acceder a esta vista. Inicia sesión, por favor...");
                    window.location="../../../usuario/login.php";
                </script>
            ';
    }//end if existe una sesión iniciada

    //Para almacenar la información del form registrar
    $idPelicula  = $_POST['idPelicula'];
    $nombre = $_POST['nombre'];
    $anioEstreno = $_POST['anioEstreno'];
    $descripcion = $_POST['descripcion'];
    $duracion = $_POST['duracion'];
    $genero = $_POST['genero'];
    $director = $_POST['director'];
    $estatus_pelicula = $_POST['estatus'];
    $foto_perfil_actual = $_POST['foto_perfil_actual'];

    //Validar si las variables no estan vacias
    if( empty($nombre) || empty($descripcion) || empty($anioEstreno) || empty($duracion) || empty($director) ){
        //Se cierra la conexión
		//mysqli_close($conexion);
        //Se redirecciona al formulario de insertar
		echo '<script>alert("Error, hay información faltante.");</script>';
		echo '<script> window.location="../../../pages/peliculas_Familiares_detalles.php"; </script>';
    }//end if 

    //=====================================
    // Proceso para validar la imagen perfil
    //=====================================
    //Se declara una variable para referenciar al input que contiene la imagen
	$imagen = $_FILES['foto_perfil'];

    //Determinamos la variable que almacenara la información de la imagen
    $nombre_archivo = '';

    //Verificamos que no este vacia la foto del perfil 
    if(!empty($imagen["name"])){
        //se obtiene la extensión del archivo
        $temp = explode(".", $imagen["name"]);
        $extension = end($temp);

        //se verifica la extensión del archivo
        if ($extension != "jpg" && $extension != "png" && $extension != "jpeg") {
        	//Se cierra la conexión
        	mysqli_close($conexion);
            echo '<script>alert("Solo se permiten archivos con extension jpeg o png")</script>';
        	echo '<script> window.location="../../../pages/peliculas_Familiares_detalles.php"; </script>';
        }//end if extensión no permitida

        //se sube el archivo al servidor
        if(move_uploaded_file($imagen["tmp_name"], "../../../img/".$imagen["name"])){
            //Genera el campo para que se incorpore al update
            $nombre_archivo = ",imagenPelicula='".$imagen['name']."'";
        }//end if el archivo no pudo guardarse en la ruta indicada del servidor
    }//!empty $image["name"]

    //=====================================
    // Proceso para actualizar el dato
    //=====================================
    
    //Se genera el sql para insertar
    $query_update = "UPDATE peliculas SET nombrePelicula='$nombre', anioEstreno='$anioEstreno', director='$director',descripcion='$descripcion', estatus_pelicula='$estatus_pelicula',
                    duracion='$duracion'".$nombre_archivo." WHERE idPelicula ='$idPelicula';";
    //echo $query_update;
    //Se realiza la petición con la BD
    $query_res = mysqli_query($conexion, $query_update);

    echo $nombre_archivo;
    //Se valida el resultado booleano del query result
    if(!$query_res){
        if(!$imagen['name']){
            //Elimina la imagen temporal que se va aactualizar
            unlink("../../../img/".$imagen['name']);
        }
        echo '<script>alert("Error al actualizar la pelicula. Falló nuestro servidor, intente nuevamente, por favor.");</script>';
    }//end if falló la actualización
    else{
        if(!empty($imagen['name']) && !empty($foto_perfil_actual)){
            //Verificamos si es un directorio, es decir, si existe
            if(file_exists("../../../img/".$foto_perfil_actual)){
                unlink("../../../img/".$foto_perfil_actual);
            }//end if file_exist
        }//end if empty
        //Elimina la imagen anterior para actualizar la nueva
        echo '<script>alert("¡Pelicula actualizada exitosamente!");</script>';
    }//end else falló la actualización

    //Se cierra la conexion
    mysqli_close($conexion);

    //Se redireciona a usuarios todos
    echo '<script> window.location = "../../../pages/dashboard.php";</script>';
    


    
