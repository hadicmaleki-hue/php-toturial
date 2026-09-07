<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_SESSION['favcolor'])){
            echo "favorite color is " . $_SESSION['favcolor'] . ".<br>";
            echo "favorite food is " . $_SESSION['favfood'] . ".";
        }else{
            echo "No session data found.";
        }
        $_SESSION["favcolor"] = "yellow";
        // print_r($_SESSION);
        // echo "<br>" . $_COOKIE["PHPSESSID"];
    ?>
    <br>
    <a href="logout.php">NEXT PAGE</a>
</body>
</html>