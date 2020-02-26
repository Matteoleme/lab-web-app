<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Admin area</title>
</head>
<body>
    <?php
    //check connection

    $insert_b = $_POST['barcode'];
    $insert_n = $_POST['product'];

    //check connection
        $db_connection = new mysqli('lab-web-app_db_1', "user", "password", 'db');

        if($db_connection->connect_error){
            die("connection failed: " . $db_connection->connect_error);
        }
    //sql command
        $sql = $db_connection->query("INSERT INTO `item`(`name`, `barcode`) VALUES ('$insert_n', '$insert_b')");
        if ($sql){
            echo "<h2>L'inserimento dei valori è stato eseguito correttamente</h2>";
        }
        else {
            echo "<h2>ERRORE</h2>" . $db_connection->error;
        }
    ?>
    
    <a href="index.html">
        Torna alla home
    </a>
    
</body>
</html>