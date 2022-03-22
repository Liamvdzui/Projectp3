<?php
    include("./connect_db.php");
    include("./functions.php");


    //var_dump($_POST);
    $img = sanitize($_POST["img"])
    $titel = sanitize($_POST["titel"])
    $text = sanitize($_POST["text"]);
?>`

<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "voetbal";

    //met deze functie connect je met de database
   $conn = mysqli_connect($servername, $username, $password, $dbname);

$sql = "INSERT INTO `nieuws` (`id`, `img`, `titel`, `text`) VALUES (NULL, '$id', '$img', '$titel', '$text');";
mysqli_query($conn, $sql);

header("Location: ./read.php")

?>