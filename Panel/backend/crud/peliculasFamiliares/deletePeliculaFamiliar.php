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

    
    $idPelicula = $_GET["idPelicula"];

    
    if(empty($idPelicula)){
        echo '<script>
                alert("Error, el usuario no se encontro");
                window.location = "./dashboard.php";
                </script>';
    }
    else{
        
        $query_select = "SELECT * FROM peliculas WHERE idPelicula=$idPelicula;";
        

        
        $query_res_select = mysqli_query($conexion, $query_select);

        
        $usuario = mysqli_fetch_array($query_res_select, MYSQLI_ASSOC);

        
        
        
        
        if(sizeof($usuario) > 0){
            
            $query_delete = "DELETE FROM peliculas WHERE idPelicula=$idPelicula;";

            
            $query_res_delete = mysqli_query($conexion, $query_delete);

            if(!$query_res_delete){
                echo '<script>alert("Error al eliminar el usuario. Falló nuestro servidor, intente nuevamente, por favor.");</script>';
            }
            else{
                
                if($usuario["imagenPelicula"] != NULL){
                    unlink("../../../img/".$usuario["imagenPelicula"]); 
                }
                echo '<script>alert("Pelicula eliminado exitosamente!");</script>';
            }
        }
        else{
            
            echo '<script>alert("Error al eliminar la pelicula ya que no existe, intentelo de nuevo, por favor.");</script>';
        }

        
        mysqli_close($conexion);
        
        
        echo '<script> window.location = "../../../pages/dashboard.php";</script>';
    }
?>
