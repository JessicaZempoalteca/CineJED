<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>Registro</title>
    <link rel="icon" href="../img/res.png" type="img">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container" id="registration-form">
        <div class="image"></div>
        <div class="frm">
            <center><h1>Registro</h1></center>
            <form>
                <div class="form-group">
                    <label for="username">Usuario:</label>
                    <input type="text" class="form-control" id="username" placeholder="Escribe Usuario" value="" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Escribe Email" value="" required>
                </div>
                <div class="form-group">
                    <label for="pwd">contraseña:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Escribe Contraseña" value="" required>
                </div>
                <div class="form-group">
               <button type="submit" class="form-control btn btn-primary rounded submit px-3">
                         Validar
                        </button>
            <center>
                <div class="form-group">
                <a href="../login.php"  href="#signup" class="btn btn-success btn-lg">Registrarse</a>
            </center>    
            </div>
            </form>
        </div>
    </div>
</body>

</html>
