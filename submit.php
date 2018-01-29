<?php    
        error_reporting(0);
        $link = $_GET["url"];
      
        if (filter_var($link, FILTER_VALIDATE_URL)) {
        include 'MySQL.php';
        $conn = new mysqli("$sqlHost", "$sqlUsername", "$sqlPassword", "$sqlDatabase");
        
        $id = createID();

        $sql = "INSERT INTO $sqlLinkTable (id, url)
        VALUES ('$id', '$link')";

        if ($conn->query($sql) === TRUE) {
            echo "Link succesfully created! <a style=\"text-decoration:underline;color:blue;cursor:pointer; href=\"rein.ga?id=$id\">rein.ga?id=$id</a>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        }else{
            echo "That's not a valid url! Example: https://www.google.com  ";
            echo "<a style=\"text-decoration:underline;color:blue;cursor:pointer;\"onclick=\"window.location = '/';\">back</a>";
        }

        function createID() {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < 5; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
            }
?>
