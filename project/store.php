<?php
session_start();
require_once 'functions.php';
require_once 'person.php';

$p = new Person;

$p->fname = $_POST['fname'];
$p->lname = $_POST['lname'];
$p->email = $_POST['email'];
$p->phone = $_POST['phone'];
$p->address = $_POST["address"];

$result = false;

if(validPersonObject($p)) {

    if(isset($_GET['action']) && $_GET['action'] === 'edit') {
        $index = $_POST['index'];
        $result = editPersonObject($index,$p);
    }else {
        $result = addPersonObject($p);
    }

}
        
$_SESSION['message'] = $result ? 'success' : "failed"; 
header('Location: app.php');
