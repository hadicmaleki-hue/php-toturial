<?php 
$jUser =file_get_contents('data.json');
$users = json_decode($jUser,true);
?>

<table border="1">
    <tr>
        <td>First Name</td>
        <td>Last Name</td>
        <td>Action</td>
    </tr>
    <?php
        foreach ($users as $k => $v) {
    ?>

    <tr>
        <td><?php echo $v['fname']; ?></td>
        <td><?php echo $v['lname']; ?></td>
        <td>
            <a href="view.php?index=<?php echo $k ?>">View</a>
            <a href="delete.php?index=<?php echo $k ?>">Delete</a>
            <a href="edit.php?index=<?php echo $k; ?>">Edit</a>
        </td>
    </tr>

    <?php 
        }
    ?>

</table>