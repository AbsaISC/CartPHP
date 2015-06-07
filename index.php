<?php
session_start();
if ($_SESSION) {
    if ($_SESSION['tipo']) {
        echo "<script> window.location.href='admin/' ; </script>";
        die();
    }
    echo "<script> window.location.href='client/tienda.php' ; </script>";
    die();
}
?>
<!Doctype html>
<html>
    <head>
        <title>index</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/calc.css">

        <script src="js/jquery-1.11.3.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>

    </head>
    <body>
        <div class="container">
            <div class="jumbotron">
                <div class="row">
                    <h1>Bienvenido a tú carrito de compras</h1>
                    <div class="col-xs-6">
                        <p>Por favor Inicie session con su usuario</p>
                    </div>
                    <div class="col-xs-6">
                        <form action="servers\login.php" method="post">
                            <table>
                                <tr><td colspan="2"><p>Login</p></td></tr>
                                <tr>
                                    <td><p>Usuario:</p></td>
                                    <td><input type="text" name="usuario" ></td>
                                </tr>
                                <tr>
                                    <td><p>contraseña:</p></td>
                                    <td><input type="password" name="pass"></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><input type="submit" value="login" class="btn btn-block"></td>
                                </tr>
                            </table>
                            <br><br>
                            <a href="client/registro.php">No tengo cuenta</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
