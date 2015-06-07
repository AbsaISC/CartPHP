<?php
session_start();
if (!$_SESSION) {
    echo "<script> window.location.href='../' ; </script>";
    die();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>carrito</title>
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
        include_once '../servers/connection.php';
        ?>

        <table class="table table-striped">
            <tr>

                <th>Imagen</th>
                <th>Producto</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Tú carrito</th>
                <th colspan="2">Acción</th>
            </tr>

            <?php
            $Total = 0;
            if ($_SESSION['cart']) {
                foreach ($_SESSION['cart'] as $item) {
//                    echo "prod: '$item[0]' cant: '$item[1]' <br>";
                    $query = "SELECT * FROM Producto WHERE idProducto='$item[0]'";
                    $result = $conn->query($query);
                    $row = $result->fetch_assoc();
                    echo "<tr>"
                    . "<form><input type='text' hidden name='id' value=" . $row['idProducto'] . ">"
                    . "<td> <img width='50' height='50' src='../servers/showImage.php?id=".$row['idProducto']."' > </td>"
                    . "<td>" . $row['producto'] . "</td>"
                    . "<td>" . $row['descripcion'] . "</td>"
                    . "<td>" . $row['precio'] . "</td>"
                    . "<td>" . $item[1] . "</td>"
                    . "<td><input type='number'  name='cant' value='1' size='10 ' maxlength='3' ></td>"
                    . "<td><input type='submit' class='btn' value='Quitar' formaction='../servers/quitItem.php' formmethod='POST' ></td>"
                    . "</form>"
                    . "</tr>";
                }
            }
            $conn->close();
            ?>
        </table>
        <form>
            <input type="submit" class="btn btn-block btn-primary" formaction="../servers/compra.php" formmethod="post" value="Realizar Compra">
        </form>

    </body>
</html>