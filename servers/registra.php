<?php

$nombre = $_POST['nombre'];
$paterno = $_POST['paterno'];
$materno = $_POST['materno'];
$correo = $_POST['correo'];
$user = $_POST['usr'];
$pass = $_POST['pass'];
$passT = $_POST['pass2'];


if ($correo && $user && $pass && $passT) {
    if ($pass != $passT) {
        echo "<script languaje='Javascript'> alert('La contraseña no coincide');
         window.location.href='../registro.php';</script>";
        
        exit();
    }
    include_once('connection.php');

    $sql = "INSERT INTO Cliente (nombre, paterno, materno, correo, usuario,pass)
VALUES ('$nombre', '$paterno', '$materno','$correo','$user','$pass')";

    if ($conn->query($sql) === TRUE) {
       echo "<script languaje='Javascript'> alert ('Registro exitoso');
            window.location.href='../';</script>";
    } else {
        echo "<script languaje='Javascript'> alert ('Hubo un error');
            window.location.href='../registro.php';</script>";
    }

    $conn->close();
} else {
    echo "<script languaje='Javascript'> "
    . "alert('porfavor introduce los campos obligatorios');"
    . "window.location.href='../registro.php';</script>";
}
