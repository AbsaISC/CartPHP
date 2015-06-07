<?php

session_start();
$id = $_POST['id'];
$cant = $_POST['cant'];

if (!$_SESSION['cart']) {
    
    echo "<script languaje='Javascript'> alert('No hay productos'); "
    . "window.location.href='../client/carrito.php';"
    . "</script>";
    die();
}
$cont = 0;
foreach ($_SESSION['cart'] as $item) {
    if ($item[0] == $id) {
        $_SESSION['cart'][$cont][1]-=$cant;
        if($_SESSION['cart'][$cont][1] <= 0){
            unset($_SESSION['cart'][$cont]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);
        }
        echo "<script languaje='Javascript'> alert('productos retirados de carrito'); "
        . "window.location.href='../client/carrito.php';"
        . "</script>";
        die();
    }
    $cont++;
}

//$_SESSION['cart'][] = [$id, $cant];
//    echo "<script languaje='Javascript'> alert('productos agregados con éxito'); "
//    . "window.location.href='../client/lista.php';"
//    . "</script>";
//    die();