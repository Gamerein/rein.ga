<?php    
        $link = $_GET["url"];
      
        if (filter_var($link, FILTER_VALIDATE_URL)) {
        $conn = new mysqli('127.0.0.1', "root", "", "DB");          

        $id = createID();

        $sql = "INSERT INTO links (id, url)
        VALUES ('$id', '$link')";

        if ($conn->query($sql) === TRUE) {
            echo "Link succesfully created! rein.ga/index.php?id=" . $id;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        }else{
            echo "That's not a valid url! Example: https://www.google.com";
        }
        
        function createID() {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < 7; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
            }
?>