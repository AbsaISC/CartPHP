<?php

include_once('connection.php');
$query = "Select * from producto";
$result = $conn->query($query);
$conn->close();


