<?php

    include '../../admin/conexion.php';

    
    session_start();
    
    if(!isset($_SESSION['idUsuario'])){
        echo '<script>
                alert("Error, no ha iniciado sesión y no se puede redirigir a la página deseada.");
                window.location = "../../../usuario/login.php";
                </script>';
    }

    
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
            
        }

        
    
?>