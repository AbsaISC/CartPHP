<?php
    session_start();
    if( !$_SESSION ){
        echo "<script> window.location.href='../' ; </script>";
        die();
    }
    if($_SESSION['tipo']!="admin"){
        echo "<script> window.location.href='../client/tienda.php'; </script>";
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>admin</title>
</head>
<body>
    <div class="container">
        <div class="jumbotron">
            <h1>Administración</h1>
        </div>
    </div>
    
    <div class="image">
        
    </div>
</body>
</html>