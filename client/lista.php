<?php
session_start();
if (!$_SESSION) {
    echo "<script> window.location.href='../' ; </script>";
    die();
}
include_once('../servers/fetchProducts.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>lista</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="../css/calc.css">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <script src="../js/jquery-1.11.3.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>

    </head>
    <body>
        <?php
        include 'nav.php';
        ?>
        <form >
            <table class="table table-stripede">
                <tr>
                    <th>
                        Id
                    </th>
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
                        $idIm= $row['idProducto'];
                        echo "<tr>"
                        . "<form><input type='text' hidden name='id' value='" .$row['idProducto'] . "' >"
                        . "<td>" . $row['idProducto'] . "</td>";
                        echo "<td> <img width='50' height='50' src='../servers/showImage.php?id=".$idIm."' > </td>";
                        echo "<td>" . $row['producto'] . "</td>"
                        . "<td>" . $row['descripcion'] . "</td>"
                        . "<td>" . $row['precio'] . "</td>"
                        . "<td>" . $row['existencia'] . "</td>"
                        . "<td><input type='number'  name='cant' value='1' size='10 ' maxlength='3' ></td>"
                        . "<td><input type='submit' class='btn' value='Agregar' formaction='../servers/addItem.php' formmethod='POST' ></td>"
                        . "</form>"
                        . "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>no se encontraron datos</td></tr>";
                }
                ?>
            </table>
        </form>
    </body>
</html>