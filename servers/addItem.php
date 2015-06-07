<?php
session_start();
$id = $_POST['id'];
$cant = $_POST['cant'];

if (!$_SESSION['cart']) {
    $_SESSION['cart'][] = [$id, $cant];
    echo "<script languaje='Javascript'> alert('productos agregados con éxito'); "
    . "window.location.href='../client/lista.php';"
    . "</script>";
    die();
}
$cont = 0;
foreach ($_SESSION['cart'] as $item) {
    if ($item[0] == $id) {
        $_SESSION['cart'][$cont][1]+=$cant;
        echo "<script languaje='Javascript'> alert('productos agregados con éxito'); "
        . "window.location.href='../client/lista.php';"
        . "</script>";
        die();
    }
    $cont++;
}

$_SESSION['cart'][] = [$id, $cant];
    echo "<script languaje='Javascript'> alert('productos agregados con éxito'); "
    . "window.location.href='../client/lista.php';"
    . "</script>";
    die();