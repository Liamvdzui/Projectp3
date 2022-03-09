<?php
// Database
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "voetbalnieuws";

//contact met database
   $conn = mysqli_connect($servername, $username, $password, $dbname);  
   $sql = "SELECT * FROM `nieuws`";

   //verbinding
  $records = "";
   $result = mysqli_query($conn, $sql);
   while ($record = mysqli_fetch_assoc($result)) {
      $records .= "<tr>
                    <th scope='row'>" . $record["id"] . "</th>
                    <td>" . $record["img"] . "</td>
                    <td>
                      <a href='./update.php?id=" . $record["id"] . "'>
                        <img src='./img/icons/b_edit.png' alt='pencil'>                     
                      </a>
                    </td>
                    <td>
                    <a href='./delete.php?id=" . $record["id"] . "'>
                      <img src='./img/icons/b_drop.png' alt='cross'>                     
                    </a>
                  </td>
                    </tr>";
   }


?>