<?php
//se incluye la variable de conexion para la base de datos
include '../../admin/conexion.php';

//Se utiliza las variables de sesion
session_start();
//Validamos si la posicion existe y ya tiene un valor determinado por la consulta
if (!isset($_SESSION['idUsuario'])) {
    echo '<script>
                alert("Error, no ha iniciado sesión y no se puede redirigir a la página deseada.");
                window.location = "../../../usuario/login.php";
                </script>';
} //

//VARIABLES PARA ALMACENAR LA INFORMACION DEL FORMULARIO
$pelicula = $_POST['pelicula'];
$horario = $_POST['horario'];
$sala = $_POST['tipoSala'];

//se validan si los datos no estan vacios
if (empty($pelicula) || empty($horario) || empty($sala)) {
    //se cierra la conexion
    mysqli_close($conexion);
    //se redirecciona a la pagina de registro
    echo '<script>alert("Hay campos vacíos, ingresa la información")</script>';
    echo '<script>window.location="../../../pages/proyeccion_nueva.php"</script>';
}

//query text para buscar el correo que se ingresa en la base de datos
$query_text = 'SELECT * FROM salaproyectapeliculas 
               WHERE (idPelicula = "' . $pelicula . '" AND idSala = "' . $sala . '" AND idHorario = "' . $horario . '");';
//echo $query_text;
$resultado = mysqli_query($conexion, $query_text);

//verifica si el correo existe por medio del query text anterior
if (mysqli_num_rows($resultado) > 0) {
    //si existe, manda de nuevo al fomrulario de registro
    echo '<script>alert("La proyección ya existe, intentalo nuevamente")</script>';
    echo '<script>window.location="../../../pages/proyeccion_nueva.php"</script>"</script>';
} else {

    //query text para insertar el usuario en la base de datos
    $query_insert = 'INSERT INTO salaproyectapeliculas VALUES (NULL, "' . $pelicula . '", "' . $sala . '", "' . $horario . '", 1);';
    //echo $query_insert;
    //se ejecuta el query text
    //ESTE PROCESO DA COMO RESULTADO TRUE O FALSE
    $resultado = mysqli_query($conexion, $query_insert);

    //se valida si el resultado es false
    if (!$resultado) {
        //se cierra la conexion
        mysqli_close($conexion);

        echo '<script>alert("Error al guardar la proyección")</script>';
        echo '<script>window.location="../../../pages/proyección_nueva.php"</script>';
    } else {
        //se cierra la conexion
        mysqli_close($conexion);
        echo '<script>alert("Proyección guardada correctamente")</script>';
        echo '<script>window.location="../../../pages/proyeccion.php"</script>';
    }
}
