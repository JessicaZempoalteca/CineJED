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


$idUsuario = $_GET["idUsuario"]; 
$estatus = $_GET["estatus"];


if (empty($idUsuario) || empty($estatus)) {
    echo '<script>
                alert("Error al obtener los datos");
                window.location = "../../../pages/usuarios.php";
                </script>';
} 
else {
    
    /*$query_text = 'SELECT usuarios.idUsuario, usuarios.nombre, usuarios.ApellidoPaterno, usuarios.apellidoMaterno, 
        usuarios.correo, contacto.servicio, contacto.tipomensaje, contacto.estatus_contacto, contacto.mensaje 
        FROM usuarios INNER JOIN contacto ON usuarios.idUsuario = "'.$idUsuario.'" AND contacto.idUsuario = "'.$idUsuario.'"';

        $query_res_select = mysqli_query($conexion, $query_text);

        $usuario = mysqli_fetch_array($query_res_select, MYSQLI_ASSOC);

        if(sizeof($usuario) > 0){
            
            $header = "From: noreply@cinejed.com" . "\r\n";
            $header .= "Reply-To: noreply@cinejed.com" . "\r\n";
            $header .= "X-Mailer: PHP/" . phpversion();
            $asunto = "Respuesta a su " . $usuario['tipomensaje'];
            $mensaje = "Estimad@ " . $usuario['nombre'] . "\nAgradecemos su mensaje. Nuestros clientes son lo más importante
            para nosotros, por lo que nos esforzamos con el fin de asegurarnos de que tienes la mejor en las sucursales de CINEJED.\n
            \nGracias por tu comprensión.\n\nAtentamente,\n\nCINEJED";
            
            $mail = mail($usuario['correo'], $asunto, $mensaje, $header);

            if ($mail) {
                $query_update = "UPDATE contacto SET estatus_contacto = 2 WHERE idUsuario=$idUsuario;";
                $query_res_update = mysqli_query($conexion, $query_update);
            }else{
                echo '<script>alert("Error al enviar el correo electronico. Intentalo nuevamente");</script>';
            }

        }
        else{
            echo '<script>alert("Error al cambiar el estatus del mensaje. El usuario no existe, intentelo de nuevo, por favor.");</script>';
        }*/
    $query_update = "UPDATE contacto SET estatus_contacto = 2 WHERE idUsuario=$idUsuario;";
    $query_res_update = mysqli_query($conexion, $query_update);
    
    mysqli_close($conexion);

    
    echo '<script> window.location = "../../../pages/contacto.php";</script>';
}
