<?php session_start();?>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Tienda</a>
        </div>
        <div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="tienda.php">Home</a></li>
                <li><a href="lista.php">Lista Productos</a></li>
                <li><a href="carrito.php">Carrito</a></li>
                
            </ul>
        </div>
        <div >
            <ul class="nav navbar-right">
                <li ><?php echo $_SESSION['nombre']; ?></li>
                <li><a href="servers/logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
