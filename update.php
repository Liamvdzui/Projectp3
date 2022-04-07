<?php

    $id = $_GET["id"];

    include("./cards/connect_db.php");

    $sql = "SELECT * FROM `nieuws` WHERE `id` = $id";

    $result = mysqli_query($conn, $sql);

    $record = mysqli_fetch_assoc($result);

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./login/style.css">
    <!-- wordt alleen gebruikt voor incons in footer -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Voetbal | Nieuws</title>
</head>

<body class="addnews">


      
    
    
    <?php
    require('./cards/connect_db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['img'])) {
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // removes backslashes
        $img = stripslashes($_REQUEST['img']);
        //escapes special characters in a string
        $img = mysqli_real_escape_string($conn, $img);
        $titel    = stripslashes($_REQUEST['titel']);
        $titel    = mysqli_real_escape_string($conn, $titel);
        $text = stripslashes($_REQUEST['text']);
        $text = mysqli_real_escape_string($conn, $text);
        $query    = "UPDATE `nieuws` 
        SET `img` = '$img',
            `titel` = '$titel',
            `text` =  '$text'
        WHERE `id` = $id;";
        $result   = mysqli_query($conn, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>U heeft het artikel bewerkt</h3><br/>
                  <p class='link'>klik <a href='archief_editor.php'>hier</a> om naar het archief te gaan </p>
                  <p class='link'>klik <a href='index_editor.php'>hier</a> om naar de homepage te gaan</p>
                  </div>";
        }
    } else {
?>

<nav class="navbar">
            <div class="navbar-container container">
                <input type="checkbox" name="" id="">
                <div class="hamburger-lines">
                    <span class="line line1"></span>
                    <span class="line line2"></span>
                    <span class="line line3"></span>
                </div>
                <ul class="menu-items">
                    <li><a href="./index_editor.php">Home</a></li>
                    <li><a href="./archief_editor.php">Archief</a></li>
                    <li><a href="./newsadd.php">Toevoegen</a></li>
                    <li><a class="right" href="./login/logout.php">Loguit</a></li>
                </ul>
            </div>
        </nav>
        
<div class="addnewsform">
    <form class="form artikel-add" action="" method="post">
        <h1 class="login-title">artikel bewerken</h1>
        <input type="text" class="login-input" name="img" placeholder="Img" value="<?php echo $record["img"]; ?>" required />
        <input type="text" class="login-input" name="titel" placeholder="Titel" value="<?php echo $record["titel"]; ?>" required /> 
        <textarea type="text" class="login-input" name="text" placeholder="Text" required><?php echo $record["text"]; ?></textarea>
        <input type="hidden" value="<?php echo $id; ?>" name ="id">
        <input type="submit" name="submit" value="Bewerk" class="login-button">
    </form>

    <?php
    }
    ?>

</div>

 
</body>

</html>