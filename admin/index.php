<?php
session_start();
if (!$_SESSION) {
    echo "<script> window.location.href='../' ; </script>";
    die();
}
if ($_SESSION['tipo'] != "admin") {
    echo "<script> window.location.href='../client/tienda.php'; </script>";
}
include_once('../servers/fetchProducts.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>admin</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="../css/calc.css">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <script src="../js/jquery-1.11.3.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php include 'navAdmin.php'; ?>
        <!--<div class="container">-->
        <div class="jumbotron">
            <h1>Administración</h1>
        </div>
        <!--</div>-->

        <!--<div class="container">-->
        <form enctype="multipart/form-data" action="../servers/addProducto.php" method="post" name="changer" class="form-inline">
            <div class="form-group"> 
                <input type="hidden" name="MAX_FILE_SIZE" value="999999999" >
                <input name="userfile" type="file" class="form-control" >
            </div>
            <div class="form-group">
                <label class="sr-only">Imagen</label>
                <input type="text" class="form-control" name="prod" placeholder="nombre">
            </div>
            <div class="form-group">
                <label class="sr-only">Desc</label>
                <input type="text" class="form-control" name="desc" placeholder="descripción">
            </div>
            <div class="form-group">
                <label class="sr-only">Precio</label>
                <input type="number" class="form-control" name="precio" placeholder="precio">
            </div>
            <div class="form-group">
                <label class="sr-only">Existencia</label>
                <input type="number" class="form-control" name="exist" placeholder="cantidad">
            </div>
            <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
        <!--</div>-->


        <!--<div class="container">-->

        <table class="table table-striped">
            <tr>
                <th>Id</th>
                <th>Imagen</th>
                <th>Producto</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Existencia</th>
                <th colspan="2">Acción</th>
            </tr>

            <?php
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $output_hex_string = $row['imagen'];
                    $output_bin_string = base64_decode($output_hex_string);

                    echo "<form><tr><input type='text' name='id' hidden value='".$row['idProducto']."'>"
                    . "<td>" . $row['idProducto'] . "</td>";
                    echo "<td> <img width='50' height='50' src='../servers/showImage.php?id=" . $row['idProducto'] . "' > </td>";
                    echo "<td>" . $row['producto'] . "</td>"
                    . "<td>" . $row['descripcion'] . "</td>"
                    . "<td>" . $row['precio'] . "</td>"
                    . "<td>" . $row['existencia'] . "</td>"
                    . "<td><input type='submit' class='btn btn-block' value='eliminar' formaction='../servers/deleteProd.php' formmethod='post'></td>"
                    . "<td><input type='submit' class='btn btn-block' value='editar' formaction='../servers/editProd.php' formmethod='post'></td>"
                    . "</tr></form>";
                }
            } else {
                echo "<tr><td colspan='8'>no se encontraron datos</td></tr>";
            }
            ?>
        </table>
        <img >
        <!--</div>-->
    </body>
</html>