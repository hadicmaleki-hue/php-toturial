<a href="app.php"><b>HOME</b></a><br>
<?php

if(!isset($_GET['index'])){
   echo "index not set.<br>"; 
}
$index = $_GET['index'];
if(empty($index) && $index != 0){
    echo "index is empty.<br>";
    exit;
}

$jUsers = file_get_contents('data.json');

$users = json_decode($jUsers,true);

unset($users[$index]);

$users = array_values($users);

$jUsers = json_encode($users);
file_put_contents('data.json',$jUsers);

echo "User #" . $index . ' Deleted!';