<?php

session_start();
$user = $_POST['usuario'];
$contrasenia = $_POST['pass'];

if ($user && $contrasenia) {
    include_once('connection.php');

    $query = "Select * from cliente where usuario='$user' and pass='$contrasenia'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $dbnombre=$row["nombre"]; 
            $dbid=$row['correo'];
        }
        $_SESSION['nombre']=$dbnombre;
        $_SESSION['correo']=$dbid;
	echo "<script languaje='Javascript'> alert ('Has iniciado sesion exitosamente');
            window.location.href='../client/tienda.php';</script>";
    } else {
       echo "<script languaje='Javascript'> alert ('No se encontro el usuario porfavor introduce usuario y contraseña correctamente');
            window.location.href='../';</script>";
    }
    $conn->close();
} else {
   echo "<script languaje='Javascript'> alert ('Porfavor llene todos los campos');
           window.location.href='../';</script>";
}

