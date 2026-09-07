<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="app.php"><h1>HOME</h1></a>
    <table border="1">
        <tr>
            <td>Name</td><td>User Name</td><td>Action</td>
        </tr>
        <?php
            $jsonUser = file_get_contents("data.json");
            $users = json_decode($jsonUser,true);

            foreach ($users as $user) {
                echo "<tr>";
                echo "<td>". $user['Name'] ."</td>";
                echo "<td>". $user['Username'] ."</td>";
                echo "<td><a href='app.php?action=delete&username=" . $user['Username'] . "'>";
                echo "Delete";
                echo "</td></a>";
                echo "</tr>";
            }

            if (isset($_GET['action']) && $_GET['action'] === 'delete') {
                foreach($users as $key => $user) {
                    if ($user['Username'] == $_GET['username']) {
                        unset($users[$key]);
                    }
                }
                $jsonUser = json_encode($users);
                file_put_contents('data.json',$jsonUser);
            }
        ?>
    </table>
</body>
</html>

