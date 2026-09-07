<?php
    if(!isset($_GET['index'])){
        echo "<h2>index not set.</h2><br>"; 
        exit();
    }
    $index = $_GET['index'];
    if(!filter_var(
        $index,FILTER_VALIDATE_INT,
        array("options" => array("min_range" => 0) )) && $index != 0){
        echo "index is empty.<br>";
        exit;
    }

    $jusers = file_get_contents('data.json');
    $users = json_decode($jusers,true);

    $user = $users[$index];
   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="app.php"><h2>HOME</h2></a>
    <form method="post" action="store-edit.php?index=<?php echo $index; ?>">
        first name:
        <input type="text" name="fname" value="<?php echo $user['fname']; ?>"><br>
        last name:
        <input type="text" name="lname" value="<?php echo $user['lname']; ?>"><br>
        Email:
        <input type="text" name="email" value="<?php echo $user['email']; ?>"><br>
        phone:
        <input type="text" name="phone" value="<?php echo $user['phone']; ?>"><br>
        address:
        <textarea  name="address" id="address"><?php echo $user['address']; ?></textarea><hr>
        <input type="submit" value="submit">

    </form>
</body>
</html>