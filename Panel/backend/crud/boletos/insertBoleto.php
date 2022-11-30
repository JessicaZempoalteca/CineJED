<?php
//se incluye la variable de conexion para la base de datos
    include '../../admin/conexion.php';

    //Se utiliza las variables de sesion
    session_start();
    //Validamos si la posicion existe y ya tiene un valor determinado por la consulta
    if(!isset($_SESSION['idUsuario'])){
        echo '<script>
                alert("Error, no ha iniciado sesión y no se puede redirigir a la página deseada.");
                window.location = "../../../usuario/login.php";
                </script>';
    }//

    //VARIABLES PARA ALMACENAR LA INFORMACION DEL FORMULARIO
    $pelicula = $_POST['pelicula'];
    $numAsientos = $_POST['numAsientos'];
    $fecha = $_POST['fechaBoleto'];
    $horario = $_POST['horario'];

        $query_insert = 'INSERT INTO boleto VALUES (NULL, "'.$fecha.'", "'.$pelicula.'", 50  ,"'.$numAsientos.'", "'.$_SESSION['idUsuario'].'");';
        echo $query_insert;
        $resultado = mysqli_query($conexion, $query_insert);
        
        if($resultado){
            echo '<script>alert("Boleto comprado")</script>';
            echo '<script>window.location="../../../../User/pages/index.php"</script>';
        }
        else{
            echo '<script>alert("Error al comprar")</script>';
            //echo '<script>window.location="../../../../User/pages/registro.php"</script>';
        }

        
    
?>