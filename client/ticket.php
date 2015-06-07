<?php
session_start();
if (!$_SESSION['bought']) {
    echo "<script languaje='Javascript'> "
    . "window.location.href='../client/lista.php';"
    . "</script>";
}
include_once '../servers/connection.php';
?>
<html>
    <head><title>Ticket</title></head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../css/calc.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../js/jquery-1.11.3.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <body>
        <?php include 'nav.php'; ?>
        <table class="table table-striped">
            <tr>

                <th>Imagen</th>
                <th>Producto</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Comprado</th>
                <th>Costo</th>
            </tr>

            <?php
            $Total = 0;
            if ($_SESSION['bought']) {
                foreach ($_SESSION['bought'] as $item) {
//                    echo "prod: '$item[0]' cant: '$item[1]' <br>";
                    $query = "SELECT * FROM Producto WHERE idProducto='$item[0]'";
                    $result = $conn->query($query);
                    $row = $result->fetch_assoc();
                    echo "<tr>"
                    . "<form><input type='text' hidden name='id' value=" . $row['idProducto'] . ">"
                    . "<td> <img width='50' height='50' src='../servers/showImage.php?id=" . $row['idProducto'] . "' > </td>"
                    . "<td>" . $row['producto'] . "</td>"
                    . "<td>" . $row['descripcion'] . "</td>"
                    . "<td>" . $row['precio'] . "</td>"
                    . "<td>" . $item[1] . "</td>"
                    . "<td>" . $item[1] * $row['precio'] . "</td>"
                    . "</form>"
                    . "</tr>";
                    $Total+=$item[1] * $row['precio'];
                }
            }
            $conn->close();
            ?>
        </table>
        <?php
        echo "<h2> El totatl es de : '$Total' </h2>";
        ?>
    </body>
</html>