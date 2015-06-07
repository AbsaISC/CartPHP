<?php

include_once 'connection.php';
$id = $_GET['id'];

$sql = "SELECT imagen FROM Producto WHERE idProducto='$id'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    header("Content-type: image/jpeg");
    echo $row['imagen'];
}
$conn->close();
die();
