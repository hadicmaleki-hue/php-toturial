<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $jsonUser = file_get_contents("data.json");
        $users = json_decode($jsonUser,true);

        foreach ($users as $user){
            echo "<b>Name: </b>" . $user['Name'] ;
            echo "<br>";
            echo "<b>User Name: </b>" . $user['Username'];
            echo "<hr>";
        }
    ?>
</body>
</html>
