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

    
    $idProyeccion = $_POST['idProyeccion'];
    $nombrePelicula = $_POST['nombrePelicula'];
    $horaProyeccion = $_POST['horaProyeccion'];
    $tipoSala = $_POST['tipoSala'];

    
    if( empty($idProyeccion) || empty($horaProyeccion) || empty($nombrePelicula) || empty($tipoSala) ){
        
		mysqli_close($conexion);
        
		echo '<script>alert("Error, hay información faltante.");</script>';
		
    }
    
    
    $query_update = "UPDATE salaproyectapeliculas SET idPelicula='$nombrePelicula', idSala='$tipoSala', idHorario='$horaProyeccion'
                     WHERE idProyeccion='$idProyeccion';";
    echo $query_update;
    
    $query_res = mysqli_query($conexion, $query_update);

    
    mysqli_close($conexion);

    
    echo '<script> window.location = "../../../pages/proyeccion.php";</script>';
    


    
