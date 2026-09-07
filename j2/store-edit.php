<a href="app.php"><b>HOME</b></a><br>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $fileput = 1;
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

        $user = [
            "fname"  => test_input($_POST['fname']),
            "lname" => test_input($_POST['lname']),
            "email" => test_input($_POST['email']),
            "phone" => test_input($_POST['phone']),
            "address" => test_input($_POST['address'])
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
            $users[$index] = $user;
            $jusers = json_encode($users);
            file_put_contents('data.json',$jusers);
            echo 'User#'. $index .' saved';
        }
    }else{
        exit();
    }

    function test_input($data) {
        $data = trim($data);#delete spaces
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>