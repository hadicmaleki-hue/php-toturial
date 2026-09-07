<?php 
    require 'Person.php';
    $jUsers = file_get_contents('data.json');
    $users = json_decode($jUsers,true);

    $objectedUsers = [];
    foreach ($users as $index => $user) {
        $p = new Person();
        $p->fname = $user['fname'];
        $p->lname = $user['lname'];
        $p->email = $user['email'];
        $p->phone = $user['phone'];
        $p->address = $user['address'];
        $p->index = $index;
        $objectedUsers [] = $p;
    }

    var_dump($objectedUsers[0]);
   
?>