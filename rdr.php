<?php
    error_reporting(0);
    if (isset($_GET['id'])){
        include 'MySQL.php';
        $conn = new mysqli("$sqlHost", "$sqlUsername", "$sqlPassword", "$sqlDatabase");
        $sql = "SELECT * FROM $sqlLinkTable WHERE id = '$_GET[id]'";
        $result = $conn->query($sql);

        if($result->num_rows != 0) {
            while($row = $result->fetch_assoc()) {
            header("Location: $row[url]");
            echo "<h1 style=\"font-family: montserrat;color:#0066ff;\">redirecting to: $row[url]</h1>";     
            die();
          }
        }  
    }
?>