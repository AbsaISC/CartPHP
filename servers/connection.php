<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname="cart";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//$connect = mysql_connect("localhost", "root", "") or die("No hay conexion ");
//mysql_select_db("cart") or die("No hay conexion ");
