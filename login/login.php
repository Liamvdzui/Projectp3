<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login | Voetbalnieuws</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('connect_db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['wachtwoord']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        $record = mysqli_fetch_assoc($result);
        
        if ($rows == 1) {
            // var_dump($record);exit();
            $_SESSION['username'] = $username;
            $_SESSION['userrole'] = $record['userrole'];
            // Redirect to user dashboard page
            switch($record['userrole']) {
                case 'editor':
                    header("Location: ../index_editor.php");
                break;
                case 'gebruiker':
                    header("Location: ../index_bezoeker.php");
                break;
                default:
                    header("Location: ../index_bezoeker.php");
                break;                    
            }
            // header("Location: dashboard.php");
        } else {
            echo "<div class='form'>
                  <h3>Verkeerde Username/password.</h3><br/>
                  <p class='link'>Klik  <a href='login.php'>hier</a> om nog een keer in te loggen.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="username" placeholder="Gebruikersnaam" autofocus="true"/>
        <input type="password" class="login-input" name="wachtwoord" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link"><a href="registration.php">Heb je nog geen account?</a></p>
        <p class="link"><a href="../index.php">Terug naar de homepage</a></p>
  </form>
<?php
    }
?>
</body>
</html>