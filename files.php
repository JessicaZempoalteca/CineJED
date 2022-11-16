<?php
    $resultado = null;

    if(isset($_POST['formulario'])){
        $name = $_FILES['imagen']['name'];
        $tmp_name = $_FILES['imagen']['tmp_name'];
        $error = $_FILES['imagen']['error'];
        $size = $_FILES['imagen']['size'];
        $max_size = 1024 * 1024 * 2; // 2MB
        $type = $_FILES['imagen']['type'];

        if($error){
            $resultado = "Error al cargar el archivo";
        }
        else if($size > $max_size){
            $resultado = 'El tamaño del archivo es demasiado grande';
        }
        else if($type != 'image/jpeg' && $type != 'image/png' && $type != 'image/gif'){
            $resultado = 'El formato del archivo no es válido';
        }
        else{
            $ruta = 'imageUsers/'.$name;
            move_uploaded_file($tmp_name, $ruta);
            $resultado = 'El archivo se ha subido correctamente';
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <strong> <?php echo $resultado; ?> </strong>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
        <input type="file" name="imagen" id="imagen">
        <input type="hidden" name="formulario">
        <input type="submit" value="Subir">
    </form>
</body>
</html>