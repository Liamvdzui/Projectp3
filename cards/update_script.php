<?php
    include("./connect_db.php");

    $id = $_POST["id"];
    $image = $_POST["img"];
    
    $sql = "UPDATE users 
            SET img = '$image', 
            WHERE id = $id;";

mysqli_query($conn, $sql);

header("Location: ./read.php");
?>
