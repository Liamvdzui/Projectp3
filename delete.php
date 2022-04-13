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
    if (isset($_GET['choose'])) {
        if (!empty($_GET["choose"]) ){
            if ($_GET['choose'] == 'nee'){
                header("Location:http://projectp3.be/Projectp3/archief_editor.php");
            } elseif ($_GET['choose'] == 'ja'){
                if (!empty($_GET["id"]) ){
$GETid = $_GET['id'];
                    $query    = "DELETE FROM `nieuws` WHERE `id` = $GETid";
        $result   = mysqli_query($conn, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>Het artikel is verwijderd</h3><br/>
                  <p class='link'>klik <a href='archief_editor.php'>hier</a> om naar het archief te gaan </p>
                  <p class='link'>klik <a href='index_editor.php'>hier</a> om naar de homepage te gaan</p>
                  </div>";
        }
    }
            }

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
<div class="middle-2">
    <?php
   include("cards/connect_db.php");
   $id = $_GET["id"];
   $sql = "SELECT * FROM `nieuws`  WHERE `id` = $id";
   $result = $conn->query($sql);

   
   if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '
        
            <div class="card">
                <div class="card-header">
                    <img src="'. $row["img"] .'" alt="img" width="200px" />
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
            <div class="form" >
            <form action="delete.php" method="GET">
                  <h3>Weet u zeker dat u het linksstaande artikel wilt verwijderen</h3><br/>
                  <input id="submit" type="submit" name="choose" value="ja" class="delete-button">
                  <input type="submit" name="choose" value="nee" class="delete-button">
                  <input type="hidden" value="'. $row["id"] .'" name ="id">
                  <p class="link">klik <a href="archief_editor.php">hier</a> om naar het archief te gaan </p>
                  <p class="link">klik <a href="index_editor.php">hier</a> om naar de homepage te gaan</p>
                  
                  </form></div>
                  
                  ';
        }
  } else {
    echo "Bericht is al verwijderd of bestaat niet";
  }
   ?>
</div>


    <?php
    }
    ?>



</body>

</html>