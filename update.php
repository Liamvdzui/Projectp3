<?php
$id = $_GET["id"];

include("./connect_db.php");

$sql = "SELECT * from `nieuws` WHERE `id` = $id";

 $result = mysqli_query($conn, $sql);
 $record = mysqli_fetch_assoc($result);
?>