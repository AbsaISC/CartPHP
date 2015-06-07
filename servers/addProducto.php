<?php

$prod = $_POST['prod'];
$desc = $_POST['desc'];
$precio = $_POST['precio'];
$exist = $_POST['exist'];

/* * * check if a file was submitted ** */
if (!isset($_FILES['userfile'])) {
    echo '<p>Please select a file</p>';
} else {
    /*     * * give praise and thanks to the php gods ** */
    echo '<p>Thank you for submitting</p>';
}


if ($prod && $desc && $precio && $exist) {
    if (is_uploaded_file($_FILES['userfile']['tmp_name']) && getimagesize($_FILES['userfile']['tmp_name']) != false) {
        $size = getimagesize($_FILES['userfile']['tmp_name']);
        /*         * * assign our variables ** */
        $type = $size['mime'];
        $imgfp = fopen($_FILES['userfile']['tmp_name'], 'r');
        $data = fread($imgfp,filesize($_FILES['userfile']['tmp_name']));
        $data = addslashes($data);
        fclose($imgfp);
        $size = $size[3];
        $name = $_FILES['userfile']['name'];
        $maxsize = 99999999;
    } else {
        $data = null;
        // if the file is not less than the maximum allowed, print an error
//        throw new Exception("Unsupported Image Format!");
    }


    include_once 'connection.php';

    $sql = "INSERT INTO Producto (imagen, producto, precio,descripcion,existencia)
VALUES ('$data', '$prod','$precio', '$desc','$exist')";

    if ($conn->query($sql) === TRUE) {
        echo "<script languaje='Javascript'> alert ('Registro del producto exitoso');
            window.location.href='../admin';</script>";
    } else {
        echo "<script languaje='Javascript'> alert ('Hubo un error '+'$conn->error' );
            window.location.href='../admin';</script>";
    }

    $conn->close();
} else {
    echo "<script languaje='Javascript'> "
    . "alert('porfavor introduce los campos obligatorios');"
    . "window.location.href='../admin';</script>";
}
//
//function upload() {
//    /*     * * check if a file was uploaded ** */
//    /*     * *  get the image info. ** */
//
//
//
//    /*     * *  check the file is less than the maximum file size ** */
//    if ($_FILES['userfile']['size'] < $maxsize) {
//        /*         * * connect to db ** */
//        $dbh = new PDO("mysql:host=localhost;dbname=testblob", 'username', 'password');
//
//        /*         * * set the error mode ** */
//        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//
//        /*         * * our sql query ** */
//        $stmt = $dbh->prepare("INSERT INTO testblob (image_type ,image, image_size, image_name) VALUES (? ,?, ?, ?)");
//
//        /*         * * bind the params ** */
//        $stmt->bindParam(1, $type);
//        $stmt->bindParam(2, $imgfp, PDO::PARAM_LOB);
//        $stmt->bindParam(3, $size);
//        $stmt->bindParam(4, $name);
//
//        /*         * * execute the query ** */
//        $stmt->execute();
//    } else {
//        /*         * * throw an exception is image is not of type ** */
//        throw new Exception("File Size Error");
//    }
//}
