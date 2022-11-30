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

    
    $idSucursal = $_GET["idSucursal"];

    
    if(empty($idSucursal)){
        echo '<script>
                alert("Error, el usuario no se encontro");
                window.location = "./sucursales.php";
                </script>';
    }
    else{
        
        $query_select = "SELECT * FROM sucursal WHERE idSucursal=$idSucursal;";
        

        
        $query_res_select = mysqli_query($conexion, $query_select);

        
        $usuario = mysqli_fetch_array($query_res_select, MYSQLI_ASSOC);

        
        
        
        
        if(sizeof($usuario) > 0){
            
            $query_delete = "DELETE FROM sucursal WHERE idSucursal=$idSucursal;";

            
            $query_res_delete = mysqli_query($conexion, $query_delete);

            if(!$query_res_delete){
                echo '<script>alert("Error al eliminar la sucursal. Falló nuestro servidor, intente nuevamente, por favor.");</script>';
            }
            else{
                echo '<script>alert("¡Sucursal eliminada exitosamente!");</script>';
            }
        }
        else{
            
            echo '<script>alert("Error al eliminar la sucursal. No existe, intentelo de nuevo, por favor.");</script>';
        }

        
        mysqli_close($conexion);
        
        
        echo '<script> window.location = "../../../pages/sucursales.php";</script>';
    }
?>
