<?php

$id = $_POST['id'];
session_start();
include_once 'connection.php';
$query = "DELETE FROM Producto WHERE idProducto='$id'";
if ($conn->query($query) === TRUE) {
    echo "<script languaje='Javascript'> alert('Producto Eliminado');"
    . "window.location.href='../admin/';"
    . "  </script>";
} else {
    echo "<script languaje='Javascript'> alert('Error');"
    . "window.location.href='../admin/';"
    . "  </script>";
}