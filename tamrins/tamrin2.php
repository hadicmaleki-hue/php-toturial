<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>person</title>
    <style>
        body {
            font-family: Tahoma ,sans-serif;
            background-color : #f4f4f4;
            padding: 20px;
        }
        .card {
            background-color: white;
            padding:20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            max-width:400px;
            margin:auto;
        }
        p{
            font-size: 17px;
            color: #555;
        }
        .lable{
            font-weight:bold;
            color: #000;
        }
        h2{
            color: #333;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
        }
        ul{
            padding-right:20px;
        }
    </style>
</head>
<body>
    <?php
        $person = [
            'Name' => 'fateme',
            'LName' => 'mohammadi',
            'Numbers' => [
                '+981297492',
                '+98912345678', 
                '+98219999999'
            ],
            'Email' => 'fati.m@test.com',
            'address' => 'person1'
        ];



        $jsonPerson = json_encode($person);
        file_put_contents ('data2.json',$jsonPerson);
    ?>
    <div class="card">
        <h2>user profile</h2>
        
        <p><span class="label">First Name:</span> <?php echo $person['Name'] ?></p>
        <p><span class="label">Last Name:</span> <?php echo $person['LName'] ?></p>
        <p><span class="label">Emali:</span> <?php echo $person['Email'] ?></p>
        <ul>
            <?php 
                foreach ($person['Numbers'] as $number){
                    echo '<li>' . $number . '</li>';
                }
            ?>
        </ul>
    </div>
</body>
</html>