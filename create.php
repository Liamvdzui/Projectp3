<?php
    include("./connect_db.php");
    include("./functions.php");


    //var_dump($_POST);
    $image = sanitize($_POST["img"]);
?>`

<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "voetbalnieuws";

    //met deze functie connect je met de database
   $conn = mysqli_connect($servername, $username, $password, $dbname);

$sql = "INSERT INTO `users` (`id`, `img`) VALUES (NULL, '$id', '$image');";
mysqli_query($conn, $sql);

header("Location: ./read.php")

?>