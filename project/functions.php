<?php
require 'person.php';
function readData ($filename = 'data.json'): array 
{
    $jUsers = file_get_contents($filename);
    $users = json_decode($jUsers,true);

    return $users;
}

function readDataObject(string $filename = 'data.json'): array 
{
    $jUsers = file_get_contents($filename);
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

    return $objectedUsers;
}

function writeData(array $data=[],string $filename='data.json'): bool
{
    $jUsers = json_encode($data);
    $result = file_put_contents($filename,$jUsers);

    return $result;
}

function addPerson(array $person,string $filename = 'data.json'): bool 
{
    $data = readData($filename);
    $data[] = $person;
    $result = writeData($data,$filename);

    return $result;
}

function addPersonObject(Person $p,string $filename = 'data.json'): bool
{
    $data = readData($filename);
    $data[] = $p;
    $result = writeData($data,$filename);

    return $result;
}

function deletePerson(int $index,string $filename = 'data.json'): bool
{
    $users = readData($filename);
    unset($users[$index]);
    array_values($users);
    $result = writeData($users,$filename);

    return $result;
}

function editPerson(int $index,array $person,$filename = "data.json"): bool
{
    $data = readData($filename);
    $data[$index] = $person;
    $result = writeData($data,$filename,);

    return $result;
}

function editPersonObject(int $index,Person $p,$filename = "data.json"): bool
{
    $data = readData($filename);
    $data[$index] = $p;
    $result = writeData($data,$filename);

    return $result;
}

function getPerson(int $index): array 
{
    #فعلا خطا ها رو هندل نمیکنیم که اگر ایندکس بیشتر از تعداد افراد باشد خطا دهد 
    $data = readData();
    $person = $data[$index];

    return $person;
}

function getPersonObject(int $index) : Person 
{
    $data = readDataObject();
    $person = $data[$index];

    return $person;
}

function getPage(): string
{
    $page = 'list';
    if(isset($_GET['page'])) {
        $page = $_GET['page'];
    }
    $pageMap = [
        'new' => 'form',
        'edit' => 'form',
        'form' => 'form',
        'view' => 'view',
        'list' => 'list',
    ];

    return $pageMap[$page];
}

function test_input($data) {
    $data = trim($data);#delete spaces
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function valIndex() 
{
    $valid = 1;
    if(!isset($_GET['index'])){
        $valid = 0;
    }else {
        $index = $_GET['index'];
        if(!filter_var(
            $index,FILTER_VALIDATE_INT,
            array("options" => array("min_range" => 0) )) && $index != 0){
            $valid = 0;
        }
    }
    return $valid;
}

function valemail (string $email): string 
{ 
    $filterdEmail = filter_var($email,FILTER_SANITIZE_EMAIL);
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $filterdEmail = '';
    }

    return $filterdEmail;
}

function validPerson(array $person): bool
{
    $valid = 1;
    if (empty($person['fname'])) {
        $valid = 0;
    }
    if(empty($person['lname'])) {
        $valid = 0;
    }
    if(empty($person['email'])) {
        $valid = 0;
    }
    if(empty($person['phone'])) {
        $valid = 0;
    }
    if(empty($person['address'])) {
        $valid = 0;
    }
    if(!valemail($person['email'])) {
        $valid = 0;
    }

    return $valid;
}

function validPersonObject(Person $p): bool 
{
     $valid = 1;
    if (empty($p->fname)) {
        $valid = 0;
    }
    if(empty($p->lname)) {
        $valid = 0;
    }
    if(empty($p->email)) {
        $valid = 0;
    }
    if(empty($p->phone)) {
        $valid = 0;
    }
    if(empty($p->address)) {
        $valid = 0;
    }
    if(!valemail($p->email)) {
        $valid = 0;
    }

    return $valid;
}

