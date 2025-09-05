<?php
if (!defined('NOMBRE_SITIO')) {
    include_once(__DIR__ . '/../config/config.php');
}

session_start();

if ($_POST) {
    $usuario = $_POST['txtUsuario'];
    $contra = $_POST['txtContra'];

    try {
        
        $conexion = new PDO("mysql:host=localhost;dbname=pruebas_web;port=3307", "root", "admin");
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sentenciaSQL = $conexion->prepare("SELECT * FROM usuario WHERE username = :usuario LIMIT 1");
        $sentenciaSQL->bindParam(":usuario", $usuario);
        $sentenciaSQL->execute();

        $usuarioBD = $sentenciaSQL->fetch(PDO::FETCH_ASSOC);

        if ($usuarioBD && $contra == $usuarioBD['contra']) {
            $_SESSION['usuario'] = "ok";
            $_SESSION['nombreUsuario'] = $usuarioBD['username'];
            $_SESSION['tipoUsuario'] = $usuarioBD['tipo_user']; // admin o normal

            if ($usuarioBD['tipo_user'] == "admin") {
                header('Location: index.php'); 
                exit;
            } else {
                header('Location: ../index.php'); 
                exit;
            }
        } else {
            $mensaje = "Usuario o contraseña incorrectos";
        }
    } catch (Exception $e) {
        $mensaje = "Error en la conexión: " . $e->getMessage();
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel="stylesheet" href="<?php echo URL_BASE ?>/assets/css/bootstrap.min.css" />
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <br><br><br>
                <div class="card">
                    <div class="card-header">
                        Inicio de sesion Administrador
                    </div>
                    <div class="card-body">
                        <?php if (isset($mensaje)) { ?>
                            <div class="alert alert-danger" role="alert">
                                <strong><?php echo $mensaje ?></strong>
                            </div>
                        <?php } ?>
                        <form method="POST">
                            <div class="form-group">
                                <label for="txtUsuario">Usuario</label>
                                <input required type="text" class="form-control" name="txtUsuario" id="txtUsuario"  placeholder="Ingrese Usuario">

                            </div>
                            <div class="form-group">
                                <label for="txtContra">Contraseña</label>
                                <input type="password" class="form-control" name="txtContra" id="txtContra" placeholder="Contraseña">
                            </div>
                            <button type="submit" class="btn btn-primary">Iniciar Sesion</button>
                        </form>


                    </div>

                </div>
            </div>
            <div class="col-md-3">

            </div>
        </div>
    </div>

</body>

</html>