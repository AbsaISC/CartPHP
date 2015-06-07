<?php

session_start();
include_once 'connection.php';
if ($_SESSION['cart']) {
    if ($_SESSION['cart'] == null) {
        echo "<script languaje='Javascript'> alert('No hay productos seleccionados'); "
        . "window.location.href='../client/carrito.php';"
        . "</script>";
        die();
    }
    $bought=$_SESSION['cart'];
    $cont = 0;
    foreach ($_SESSION['cart'] as $item) {
        $query = "SELECT * FROM Producto WHERE idProducto='$item[0]'";
        $result = $conn->query($query);
        $row = $result->fetch_assoc();

        if ($row['existencia'] < $item[1]) {
            unset($bought[$cont]);
        } else {
            $act = $row['existencia'] - $item[1];
            unset($_SESSION['cart'][$cont]);
            if ($act == 0) {
                $query = "DELETE FROM Producto WHERE idProducto='$item[0]'";
            } else {

                $query = "UPDATE Producto SET existencia='$act' WHERE idProducto='$item[0]'";
            }
            if ($conn->query($query) === TRUE) {
                
            } else {
                
            }
        }

        $cont++;
    }
    $_SESSION['cart'] = array_values($_SESSION['cart']);
    $bought = array_values($bought);
    $_SESSION['bought']=$bought;
    if($_SESSION['cart']==NULL){
    echo "<script languaje='Javascript'> alert('Productos comprados');"
    . "window.location.href='../client/ticket.php';"
    . "  </script>";
    }else{
        echo "<script languaje='Javascript'> alert('Hubo problemas para realizar la compra de unos productos, gracias por su comprención');"
    . "window.location.href='../client/ticket.php';"
    . "  </script>";
    }
} else {
    echo "<script languaje='Javascript'> alert('No selleccionaste productos');"
    . "window.location.href='../client/lista.php';"
    . "  </script>";
}
$conn->close();
die();
