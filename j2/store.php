<a href="new.html"><b>HOME</b></a><br>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $fileput = 1;
    $user = [
        "fname"  => $_POST['fname'],
        "lname" => $_POST['lname'],
        "email" => $_POST['email'],
        "phone" => $_POST['phone'],
        "address" => $_POST['address']
    ];

    if(empty($user['fname'])){
        echo "first name is required.<br>";
        $fileput = 0;
    }
    if(empty($user['lname'])) {
        echo "last name is required.<br>";
        $fileput = 0;
    }
    if(empty($user['email'])) {
        echo "email is required.<br>";
        $fileput = 0;
    }
    $user['email'] = filter_var($user['email'],FILTER_SANITIZE_EMAIL);
    if(!filter_var($user['email'],FILTER_VALIDATE_EMAIL)) {
        echo "email is not valid.<br>";
        $fileput = 0;
    }
    if(empty($user['phone'])) {
        echo "phone is required.<br>";
        $fileput = 0;
    }
    if(empty($user['address'])) {
        echo "address is required.<br>";
        $fileput = 0;
    }

    if($fileput === 1) {
        $jusers = file_get_contents('data.json');

        $users = json_decode($jusers,true);
        $users[] = $user;
        $jusers = json_encode($users);
        file_put_contents('data.json',$jusers);
        echo 'User saved';
    }
}else{
    exit();
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
