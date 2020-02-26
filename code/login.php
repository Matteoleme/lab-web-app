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
    $username = $_POST["username"];
    $password = $_POST["password"];

    //check connection
        $db_connection = new mysqli('lab-web-app_db_1', $username, $password, 'db');

        if($db_connection->connect_error){
            die("connection failed: " . $db_connection->connect_error);
        }
        else{
            echo "Connnessione riuscita! Benvenuto <b>" . $username . "</b><br><br>";
        }
        $result = $db_connection->query("SELECT * FROM `item`");
        if ($result){
            echo "Prodotti già presenti: ";
                foreach ($result as $row) {
                    echo $row["barcode"] . ", ";
                }
        }
        else {
            echo "0 Prodotti presenti";
        }
    ?>
    <h4>
        Inserire nuovi prodotti + barcode
    </h4>
        <form action="insert.php" method="POST">
        <input type="text" name="product">
        <input type="text" name="barcode">
        <input type="submit" value="Inserisci">
        </form>
    
</body>
</html>