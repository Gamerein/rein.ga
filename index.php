<!DOCTYPE HTML>
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

    <?php
      if (isset($_GET['id'])){
        $conn = new mysqli('127.0.0.1', "root", "", "DB");
        $sql = "SELECT * FROM links WHERE id = '$_GET[id]'";
        $result = $conn->query($sql);

        if($result->num_rows != 0) {
          while($row = $result->fetch_assoc()) {
            echo "<h1 #id=\"redirecting\">redirecting...</h1>";
            header("Location: $row[url]");
            die();
        }  
        }
      }
    ?>

  </body>

</html>