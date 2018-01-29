<html>
  <head>
    <title>Rein.ga</title>
    <link rel="icon" href="./favicon.ico" type=image/x-icon>
    <link href=style.css rel=stylesheet type=text/css>
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Roboto|Anton|Roboto+Mono" rel="stylesheet">
  </head>

  <body>
    <h1>Rein.ga url shortener</h1>

    <form action="submit.php" method="get">
      <input id="input" type="text" name="url" placeholder="Link here">
      <input id="submit" type="submit" value="Shorten">
    </form>
    <div style="margin-top:400px;">
        <?php
        error_reporting(0);
        if (isset($_GET['id'])){
            include 'MySQL.php';
            $conn = new mysqli("$sqlHost", "$sqlUsername", "$sqlPassword", "$sqlDatabase");
            $sql = "SELECT * FROM $sqlLinkTable WHERE id = '$_GET[id]'";
            $result = $conn->query($sql);
    
            if($result->num_rows != 0) {
                while($row = $result->fetch_assoc()) {
				echo "<script>window.location.replace(\"$row[url]\");</script>";
				echo "<h1 style=\"font-family: montserrat;color:#0066ff;\">redirecting to: $row[url]</h1>";     
              }
            }  
        }
    ?>
    </div>
  </body>
</html>