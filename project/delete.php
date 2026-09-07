<?php
session_start();
require_once 'functions.php';

if(valIndex()){
    $index = $_GET['index'];
    $result = deletePerson($index);
    $message = $result ? 'success' : 'failed';
}else {
    $message = 'index is not valid';   
}


$_SESSION['message'] = $message; 
header('Location:app.php');      