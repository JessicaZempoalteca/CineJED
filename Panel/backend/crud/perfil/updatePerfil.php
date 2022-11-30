<?php

include '../../admin/conexion.php';


session_start();


if (!isset($_SESSION['idUsuario'])) {
    echo '
                <script>
                    alert("No tienes permiso para acceder a esta vista. Inicia sesión, por favor...");
                    window.location="../../../usuario/login.php";
                </script>
            ';
} 


$idUsuario = $_POST['idUsuario'];
$nombre = $_POST['nombre'];
$ApellidoPaterno = $_POST['ApellidoPaterno'];
$apellidoMaterno = $_POST['apellidoMaterno'];
$correo = $_POST['correo'];
$password = $_POST['password'];
$idRol = $_POST['rol'];
$foto_perfil_actual = $_POST['foto_perfil_actual'];


if (
    empty($nombre) || empty($ApellidoPaterno) || empty($apellidoMaterno) ||
    empty($correo) || empty($idRol)
) {
    
    mysqli_close($conexion);
    
    echo '<script>alert("Error, hay información faltante.");</script>';
    
} 





$imagen = $_FILES['foto_perfil'];


$nombre_archivo = 'NULL';


if (!empty($imagen["name"])) {
    
    $temp = explode(".", $imagen["name"]);
    $extension = end($temp);

    
    if ($extension != "jpg" && $extension != "png" && $extension != "jpeg") {
        
        mysqli_close($conexion);
        echo '<script>alert("Solo se permiten archivos con extension jpeg o png")</script>';
        echo '<script> window.location="../../../pages/usuario_detalles.php"; </script>';
    } 
    
    
    if (move_uploaded_file($imagen["tmp_name"], "../../../img/" . $imagen["name"])) {
        
        $nombre_archivo = ",imagenUsuario='" . $imagen['name'] . "'";
    } 
} 





$passwordEncripted = hash('sha256', $password);
$nueva_password = ($password == '' ? '' : ',password="' . $passwordEncripted . '"');


$query_update = "UPDATE usuarios SET nombre='$nombre', ApellidoPaterno='$ApellidoPaterno', apellidoMaterno='$apellidoMaterno', 
                    correo='$correo'" . $nueva_password . $nombre_archivo . ", idRol='$idRol' WHERE idUsuario='$idUsuario';";


$query_res = mysqli_query($conexion, $query_update);


echo $nombre_archivo;

if (!$query_res) {
    if (!$imagen['name']) {
        
        unlink("../../../img/" . $imagen['name']);
    }
    echo '<script>alert("Error al actualizar el usuario. Falló nuestro servidor, intente nuevamente, por favor.");</script>';
} 
else {
    if (!empty($imagen['name']) && !empty($foto_perfil_actual)) {
        
        if (file_exists("../../../img/" . $foto_perfil_actual)) {
            unlink("../../../img/" . $foto_perfil_actual);
        } 
    } 
    
    $_SESSION['nombreCompleto'] = $nombre . ' ' . $ApellidoPaterno . ' ' . $apellidoMaterno;
    $_SESSION['correo'] = $correo;
    $_SESSION['imagenPerfil'] = $foto_perfil_actual;
    echo $_SESSION['imagenPerfil'];
    echo '<script>alert("¡Usuario actualizado exitosamente!");</script>';
} 


mysqli_close($conexion);


echo '<script> window.location = "../../../pages/perfil.php";</script>';
