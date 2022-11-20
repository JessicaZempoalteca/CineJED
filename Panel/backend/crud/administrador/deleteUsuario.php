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

    //Obtenemos el id desde el URL por el método GET
    $idUsuario = $_GET["idUsuario"];

    //Verificamos si la variable no esta vacia
    if(empty($idUsuario)){
        echo '<script>
                alert("Error, el usuario no se encontro");
                window.location = "./usuarios.php";
                </script>';
    }//end empty
    else{
        //Otenemos la información del formulario a buscar
        $query_select = "SELECT * FROM usuarios WHERE idUsuario=$idUsuario;";
        //echo $query_select;

        //Procesamos la petición a la BD
        $query_res_select = mysqli_query($conexion, $query_select);

        //Procesamos la información a un arreglo asociativo
        $usuario = mysqli_fetch_array($query_res_select, MYSQLI_ASSOC);

        ///Mostramos el arrelo de la peticion
        // print("<pre>".print_r($usuario,true)."</pre>");
        //echo sizeof($usuario);
        //Validamos si ese usuario realmente exite
        if(sizeof($usuario) > 0){
            //Se hace el proceso de eliminar
            $query_delete = "DELETE FROM usuarios WHERE idUsuario=$idUsuario;";

            //Hace el proceso de petición a la BD
            $query_res_delete = mysqli_query($conexion, $query_delete);

            if(!$query_res_delete){
                echo '<script>alert("Error al eliminar el usuario. Falló nuestro servidor, intente nuevamente, por favor.");</script>';
            }//end if falló la actualización
            else{
                //Verifica si la imagen del usuario no esta vacia
                if($usuario["imagenUsuario"] != NULL){
                    unlink("../../../img/".$usuario["imagenUsuario"]); 
                }//end if 
                echo '<script>alert("¡Usuario eliminado exitosamente!");</script>';
            }//end else falló la actualización
        }//end sizeof true
        else{
            //Se manda el error en caso contrario
            echo '<script>alert("Error al eliminar el usuario. El usuario no existe, intentelo de nuevo, por favor.");</script>';
        }//end else zizeof

        //Se cierra la conexión
        mysqli_close($conexion);
        
        //Se redirecciona a la pagina de todo los usuarios
        echo '<script> window.location = "../../../pages/usuarios.php";</script>';
    }//end else empty
?>
