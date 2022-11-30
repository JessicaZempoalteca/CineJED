<?php

include '../../admin/conexion.php';


session_start();

if (!isset($_SESSION['idUsuario'])) {
    echo '<script>
                alert("Error, no ha iniciado sesión y no se puede redirigir a la página deseada.");
                window.location = "../../../usuario/login.php";
                </script>';
} 


$pelicula = $_POST['pelicula'];
$horario = $_POST['horario'];
$sala = $_POST['tipoSala'];


if (empty($pelicula) || empty($horario) || empty($sala)) {
    
    mysqli_close($conexion);
    
    echo '<script>alert("Hay campos vacíos, ingresa la información")</script>';
    echo '<script>window.location="../../../pages/proyeccion_nueva.php"</script>';
}


$query_text = 'SELECT * FROM salaproyectapeliculas 
               WHERE (idPelicula = "' . $pelicula . '" AND idSala = "' . $sala . '" AND idHorario = "' . $horario . '");';

$resultado = mysqli_query($conexion, $query_text);


if (mysqli_num_rows($resultado) > 0) {
    
    echo '<script>alert("La proyección ya existe, intentalo nuevamente")</script>';
    echo '<script>window.location="../../../pages/proyeccion_nueva.php"</script>"</script>';
} else {

    
    $query_insert = 'INSERT INTO salaproyectapeliculas VALUES (NULL, "' . $pelicula . '", "' . $sala . '", "' . $horario . '", 1);';
    
    
    
    $resultado = mysqli_query($conexion, $query_insert);

    
    if (!$resultado) {
        
        mysqli_close($conexion);

        echo '<script>alert("Error al guardar la proyección")</script>';
        echo '<script>window.location="../../../pages/proyección_nueva.php"</script>';
    } else {
        
        mysqli_close($conexion);
        echo '<script>alert("Proyección guardada correctamente")</script>';
        echo '<script>window.location="../../../pages/proyeccion.php"</script>';
    }
}
