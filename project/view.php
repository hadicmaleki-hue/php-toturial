<?php
$index = $_GET['index'];
$person = getPersonObject($index);
?>
<h1>Show person #<?php $index; ?></h1>
<hr>
<b>Name: </b><?php echo $person->fname . " " . $person->lname; ?>
<br>
<b>Email: </b><?php echo $person->email; ?>
<br>
<b>Phone: </b><?php echo $person->phone; ?>
<br>
<b>Address: </b><?php echo $person->address; ?>
<br>
