<?php

$jsonUser = file_get_contents("data.json");

$users = json_decode($jsonUser,true);

foreach ($users as $user) {
    echo "<h2>". $user['Name'] ."</h2>";
}