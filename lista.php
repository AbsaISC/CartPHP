<?php
    session_start();
    if( !$_SESSION ){
        echo "<script> window.location.href='./' ; </script>";
        die();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>lista</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/calc.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <script src="js/jquery-1.11.3.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>

    </head>
    <body>
    <?php include 'nav.php';?>
    </body>
</html>