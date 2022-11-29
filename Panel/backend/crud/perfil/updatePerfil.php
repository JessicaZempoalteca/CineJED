<?php
//Incluir el archivo de conexión
include '../../admin/conexion.php';

//Instanciamos las variables de sesion
session_start();

//Verificamos si realmente ha iniciado sesión
if (!isset($_SESSION['idUsuario'])) {
    echo '
                <script>
                    alert("No tienes permiso para acceder a esta vista. Inicia sesión, por favor...");
                    window.location="../../../usuario/login.php";
                </script>
            ';
} //end if existe una sesión iniciada

//Para almacenar la información del form registrar
$idUsuario = $_POST['idUsuario'];
$nombre = $_POST['nombre'];
$ApellidoPaterno = $_POST['ApellidoPaterno'];
$apellidoMaterno = $_POST['apellidoMaterno'];
$correo = $_POST['correo'];
$password = $_POST['password'];
$idRol = $_POST['rol'];
$foto_perfil_actual = $_POST['foto_perfil_actual'];

//Validar si las variables no estan vacias
if (
    empty($nombre) || empty($ApellidoPaterno) || empty($apellidoMaterno) ||
    empty($correo) || empty($idRol)
) {
    //Se cierra la conexión
    mysqli_close($conexion);
    //Se redirecciona al formulario de insertar
    echo '<script>alert("Error, hay información faltante.");</script>';
    //echo '<script> window.location="../../../pages/usuario_detalles.php"; </script>';
} //end if 

//=====================================
// Proceso para validar la imagen perfil
//=====================================
//Se declara una variable para referenciar al input que contiene la imagen
$imagen = $_FILES['foto_perfil'];

//Determinamos la variable que almacenara la información de la imagen
$nombre_archivo = 'NULL';

//Verificamos que no este vacia la foto del perfil 
if (!empty($imagen["name"])) {
    //se obtiene la extensión del archivo
    $temp = explode(".", $imagen["name"]);
    $extension = end($temp);

    //se verifica la extensión del archivo
    if ($extension != "jpg" && $extension != "png" && $extension != "jpeg") {
        //Se cierra la conexión
        mysqli_close($conexion);
        echo '<script>alert("Solo se permiten archivos con extension jpeg o png")</script>';
        echo '<script> window.location="../../../pages/usuario_detalles.php"; </script>';
    } //end if extensión no permitida
    //echo $imagen['name'];
    //se sube el archivo al servidor
    if (move_uploaded_file($imagen["tmp_name"], "../../../img/" . $imagen["name"])) {
        //Genera el campo para que se incorpore al update
        $nombre_archivo = ",imagenUsuario='" . $imagen['name'] . "'";
    } //end if el archivo no pudo guardarse en la ruta indicada del servidor
} //!empty $image["name"]

//=====================================
// Proceso para actualizar el dato
//=====================================
//Verifica si el password es nueva
$passwordEncripted = hash('sha256', $password);
$nueva_password = ($password == '' ? '' : ',password="' . $passwordEncripted . '"');

//Se genera el sql para insertar
$query_update = "UPDATE usuarios SET nombre='$nombre', ApellidoPaterno='$ApellidoPaterno', apellidoMaterno='$apellidoMaterno', 
                    correo='$correo'" . $nueva_password . $nombre_archivo . ", idRol='$idRol' WHERE idUsuario='$idUsuario';";
//echo $query_update;
//Se realiza la petición con la BD
$query_res = mysqli_query($conexion, $query_update);


echo $nombre_archivo;
//Se valida el resultado booleano del query result
if (!$query_res) {
    if (!$imagen['name']) {
        //Elimina la imagen temporal que se va aactualizar
        unlink("../../../img/" . $imagen['name']);
    }
    echo '<script>alert("Error al actualizar el usuario. Falló nuestro servidor, intente nuevamente, por favor.");</script>';
} //end if falló la actualización
else {
    if (!empty($imagen['name']) && !empty($foto_perfil_actual)) {
        //Verificamos si es un directorio, es decir, si existe
        if (file_exists("../../../img/" . $foto_perfil_actual)) {
            unlink("../../../img/" . $foto_perfil_actual);
        } //end if file_exist
    } //end if empty
    //Elimina la imagen anterior para actualizar la nueva
    $_SESSION['nombreCompleto'] = $nombre . ' ' . $ApellidoPaterno . ' ' . $apellidoMaterno;
    $_SESSION['correo'] = $correo;
    $_SESSION['imagenPerfil'] = $foto_perfil_actual;
    echo $_SESSION['imagenPerfil'];
    echo '<script>alert("¡Usuario actualizado exitosamente!");</script>';
} //end else falló la actualización

//Se cierra la conexion
mysqli_close($conexion);

//Se redireciona a usuarios todos
echo '<script> window.location = "../../../pages/perfil.php";</script>';
