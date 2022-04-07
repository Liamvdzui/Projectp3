<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./login/style.css">
    <link rel="stylesheet" href="style.css">
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
                  <h3>Het artikel is verwijderd</h3><br/>
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


    <?php
    }
    ?>

<div class="middle-2">
    <?php
   include("cards/connect_db.php");
   $sql = "SELECT * FROM `nieuws`  WHERE `id` = 1";
   $result = $conn->query($sql);

   
   if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '
        
            <div class="card">
                <div class="card-header">
                    <img src="'. $row["img"] .'" alt="city" width="200px" />
                </div>
                <div class="card-body">
                    <span class="tag tag-pink">Recent news</span>
                    <h4>
                        '. $row["titel"] .'
                    </h4>
                    <p>
                        '. $row["text"] .'
                    </p>
                </div>
            </div>
            <div class="form">
                  <h3>Weet u zeker dat u het linksstaande artikel wilt verwijderen</h3><br/>
                  <input type="submit" name="submit" value="Ja" class="delete-button">
                  <input type="submit" name="submit" value="Nee" class="delete-button">
                  <p class="link">klik <a href="archief_editor.php">hier</a> om naar het archief te gaan </p>
                  <p class="link">klik <a href="index_editor.php">hier</a> om naar de homepage te gaan</p>
                  </div>
                  ';
        }
  } else {
    echo "0 results";
  }
   ?>
</div>


</body>

</html>