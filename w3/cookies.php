<?php
    $cookiename = "username";
    $cookievalue = "Ali mohammadi";

    setcookie($cookiename,$cookievalue,time() + 3600,"/");
    setcookie("test_cookie","test", time() + 3600,"/");
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
        echo count($_COOKIE) . "<br>";
        if(isset($_COOKIE[$cookiename])){
            echo "Cookie '" . $cookiename . "' is set" . "<br>";
            echo "Value is: " . $_COOKIE[$cookiename] ;
        }else {
            echo "cookie " . $cookiename . " is not set." . "<br>";
        }
    ?>
</body>
</html>