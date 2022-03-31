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
        $query    = "INSERT into `nieuws` (`img`, `titel`, `text`)
                     VALUES ('$img', '$titel', '$text')";
        $result   = mysqli_query($conn, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>Het artikel zal op de homepage verschijnen</h3><br/>
                  <p class='link'>klik <a href='newsadd.php'>hier</a> om er nog een toe te voegen </p>
                  <p class='link'>klik <a href='index_editor.php'>hier</a> om naar de homepage te gaan</p>
                  </div>";
        } else {
            echo "<div class='form addnewsform'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
<div class="addnewsform">
    <form class="form artikel-add" action="" method="post">
        <h1 class="login-title">artikel toevoegen</h1>
        <input type="text" class="login-input" name="img" placeholder="Img" required />
        <input type="text" class="login-input" name="titel" placeholder="Titel">
        <input type="text" class="login-input" name="text" placeholder="Text">
        <input type="submit" name="submit" value="Toevoegen" class="login-button">
    </form>
<?php
    }
?>
</div>
 
</body>

</html>