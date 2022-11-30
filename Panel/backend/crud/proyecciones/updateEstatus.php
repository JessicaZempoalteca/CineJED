<?php

include '../../admin/conexion.php';


session_start();


if (!isset($_SESSION['idUsuario'])) {
    echo '
                <script>
                    alert("Inicia sesion nuevamente para tener acceso a estas funciones");
                    window.location="../../../usuario/login.php";
                </script>
            ';
} 


$idProyeccion = $_GET["idProyeccion"]; 
$estatus = $_GET["estatus"];


if (empty($idProyeccion) || empty($estatus)) {
    echo '<script>
                alert("Error al obtener los datos");
                window.location = "../../../pages/proyeccion.php";
                </script>';
} 
else {
    
    $query_select = "SELECT * FROM salaproyectapeliculas WHERE idProyeccion=$idProyeccion;";
    

    
    $query_res_select = mysqli_query($conexion, $query_select);

    
    $usuario = mysqli_fetch_array($query_res_select, MYSQLI_ASSOC);

    
    

    
    if (sizeof($usuario) > 0) {
        
        
        
        
        
        
        $set_estatus = ($estatus == 2) ? 1 : 2;
        

        $query_update = "UPDATE salaproyectapeliculas SET estatus_proyeccion = $set_estatus WHERE idProyeccion=$idProyeccion;";
        

        
        $query_res_update = mysqli_query($conexion, $query_update);
        

        if (!$query_res_update) {
            echo '<script>alert("Error al cambiar el estatus de este usuario. Falló nuestro servidor, intente nuevamente, por favor.");</script>';
        } 
        else {
            echo '<script>alert("¡El estatus ha sido actualizado para este usuario de manera correcta!");</script>';
        } 
    } 
    else {
        
        echo '<script>alert("Error al cambiar el estatus de este usuario. El usuario no existe, intentelo de nuevo, por favor.");</script>';
    } 

    
    mysqli_close($conexion);

    
    echo '<script> window.location = "../../../pages/proyeccion.php";</script>';
}
