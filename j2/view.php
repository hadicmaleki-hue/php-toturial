<a href="app.php"><b>HOME</b></a>
<?php
if(!isset($_GET['index'])){
   echo "index not set.<br>"; 
}
$index = $_GET['index'];
$index = filter_var(
    $index,
    FILTER_VALIDATE_INT,
    [
        'potions' => [
            'min_range' => 0
        ]
    ]
);
if($index === false && $index !== 0){
    echo "index is empty.<br>";
    exit;
}
echo "<h1>show user #" . $index . "</h1>";

$jusers = file_get_contents('data.json');

$users = json_decode($jusers,true);

$user = $users[$index];

echo 'First Name: ' . $user["fname"] . "<br>";
echo 'Last Name: '  . $user["lname"] . "<br>";
echo 'Email: '      . $user["email"] . "<br>";
echo 'phone: '      . $user["phone"] . "<br>";
echo 'Address: '    . $user["address"] . "<br>";