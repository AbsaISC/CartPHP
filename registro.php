<?php
    session_start();
    if( $_SESSION['nombre'] != null ){
        echo "<script> window.location.href='tienda.php' ; </script>";
        die();
    }
?>
<html>
    <head><title>Registro</title></head>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/calc.css">

    <script src="js/jquery-1.11.3.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <body>
        <div class="container">
            <div class="jumbotron">
                <h1>Registro</h1>
            </div>

            <div class="row">
                <form action="servers\registra.php" method="post" >
                    <table >
                        <tr><td>Nombre:</td>
                            <td><input type="text" name="nombre" ></td></tr>
                        <tr><td>Paterno:</td>
                            <td><input type="text" name="paterno" ></td></tr>
                        <tr><td>Materno:</td>
                            <td><input type="text" name="materno"   ></td></tr>
                        <tr><td>Correo*:</td>
                            <td><input type="text" name="correo" ></td></tr>
                        <tr><td>Usuario*:</td>
                            <td><input type="text" name="usr"  ></td></tr>
                        <tr><td>Contraseña*:</td>
                            <td><input type="password" name="pass" ></td></tr>
                        <tr><td>Confirma contraseña*:</td>
                            <td><input type="password" name="pass2" ></td></tr>
                        <tr><td colspan="2"><input type="submit" value="registrar" class="btn btn-block btn-default" ></td></tr>
                        
                    </table>
                </form>
            </div>


        </div>
    </body>
</html>