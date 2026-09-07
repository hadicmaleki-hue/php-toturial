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
        session_unset();

        session_destroy();
        echo "<h2>SESSION IS DESTROIED</h2>" . "<br>" ;
    ?>
    <a href="session2.php">LAST PAGE</a><br>
    <a href="sessions.php">FIRST PAGE</a>

</body>
</html>