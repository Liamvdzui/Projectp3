<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style.css">
    <!-- wordt alleen gebruikt voor incons in footer -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Voetbal | Nieuws</title>
</head>

<body>


    <div class="header">
        <nav class="navbar">
            <div class="navbar-container container">
                <input type="checkbox" name="" id="">
                <div class="hamburger-lines">
                    <span class="line line1"></span>
                    <span class="line line2"></span>
                    <span class="line line3"></span>
                </div>
                <ul class="menu-items">
                    <li><a href="./index_bezoeker.php">Home</a></li>
                    <li><a href="./archief_editor.php">Archief</a></li>
                    <li><a href="./newsadd.php">Toevoegen</a></li>
                    <li><a class="right" href="./login/logout.php">Loguit</a></li>
                </ul>
            </div>
        </nav>
        <div class="info">
            <h1>Voetbal | Nieuws | Archief</h1>
            <div class="meta">
                <img class="author" src="./original.jpg" alt=""><br>
                door Korné & Liam</a>
            </div>
        </div>
    </div>
    
    <div class="cards">
    <?php
   include("cards/connect_db.php");
   $sql = "SELECT * FROM `nieuws`  ORDER BY `id` DESC LIMIT 100";
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
                <div class="ding">
                    <span class="tag tag-pink">Recent news</span>
                  <div> <a href="update.php?id=' . $row["id"] . '"><img src="./icons/b_edit.png"></a> <img src="./icons/b_drop.png"></div>
                  </div>
                    <h4>
                        '. $row["titel"] .'
                    </h4>
                    <p>
                        '. $row["text"] .'
                    </p>
                </div>
            </div>';
        }
  } else {
    echo "0 results";
  }


   ?>
    </div>

    <footer>
        <div class="footer-content">
            <h3>Voetbal Nieuws</h3>
            <p>Voetbal Nieuws is een website met het aller nieuwste voetbal nieuws.<br> Login om het archief en meer
                nieuws te zien.</p>
            <ul class="socials">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
            </ul>
        </div>
        <div class="footer-bottom">
            <p>copyright &copy; <a href="#">Korné & Liam</a> </p>
            <div class="footer-menu">
                <ul class="f-menu">
                    <li><a href="">Home</a></li>
                    <li><a href="">Login</a></li>
                </ul>
            </div>
        </div>

    </footer>
</body>

</html>