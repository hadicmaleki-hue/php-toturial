<?php 
$users = readDataObject();
?>

<table border="1">
    <tr>
        <td>First Name</td>
        <td>Last Name</td>
        <td>Action</td>
    </tr>
    <?php
        foreach ($users as $person) {
    ?>

    <tr>
        <td><?php echo $person->fname; ?></td>
        <td><?php echo $person->lname; ?></td>
        <td>
            <?php 
                echo $person->generateLinks();
            ?>
        </td>
    </tr> 

    <?php 
        }
    ?>

</table>