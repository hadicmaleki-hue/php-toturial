<?php
$isEdit = false;
if (isset($_GET['action']) && $_GET['action'] === 'edit') {
    $isEdit = true;
    $index = $_GET['index'];
    $person = getPerson($index);
    $fname = $person['fname'];
    $lname = $person['lname'];
    $phone = $person['phone'];
    $address = $person['address'];
    $email = $person['email'];
}
?>
<form method="POST" action="store.php?action=<?php echo $_GET['action'] ?? 'new'; ?>">
    First Name:<br>
    <input type="text" name="fname" id="fname" value="<?php echo $fname ?? ''; ?>"><br>

    Last Name:<br>
    <input type="text" name="lname" id="lname" value="<?php echo $lname ?? ''; ?>"><br>
    
    Phone:<br>
    <input type="text" name="phone" id="phone" value="<?php echo $phone ?? ''; ?>"><br>
    
    Address:<br>
    <input type="text" name="address" id="address" value="<?php echo $address ?? ''; ?>"><br>
    
    Email:<br>
    <input type="text" name="email" id="email" value="<?php echo $email ?? ''; ?>"><br>
    <?php
    if ($isEdit) {
        echo '<input type="hidden" name="index" value="' . $index . '">';
    }
    ?>
    <br>
    <input type="submit" value="submit">
</form>
