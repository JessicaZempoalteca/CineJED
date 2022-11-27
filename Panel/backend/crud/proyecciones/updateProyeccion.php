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
    $idProyeccion = $_POST['idProyeccion'];
    //$nombrePelicula = $_POST['nombrePelicula'];
    $horaProyeccion = $_POST['horaProyeccion'];
    $sucursal = $_POST['sucursal'];
    $tipoSala = $_POST['tipoSala'];

    //Validar si las variables no estan vacias
    if( empty($horaProyeccion) || empty($sucursal) || empty($tipoSala)){
        //Se cierra la conexión
		mysqli_close($conexion);
        //Se redirecciona al formulario de insertar
		echo '<script>alert("Error, hay información faltante.");</script>';
		//echo '<script> window.location="../../../pages/proyeccion_Detalles.php"; </script>';
    }//end if 
    
    //Se genera el sql para insertar
    $query_update = "UPDATE salaproyectapelicula SET idSala='$tipoSala', idHorario='$horaProyeccion', idSucursal='$sucursal'
                     WHERE idProyeccion='$idProyeccion';";
    echo $query_update;
    //Se realiza la petición con la BD
    $query_res = mysqli_query($conexion, $query_update);

    //Se cierra la conexion
    mysqli_close($conexion);

    //Se redireciona a usuarios todos
    echo '<script> window.location = "../../../pages/usuarios.php";</script>';
    


    
