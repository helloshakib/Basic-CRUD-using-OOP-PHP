<?php

require_once './vendor/autoload.php';
use App\classes\User;

$userobj = new User();
$queryResult = $userobj->getAllUserInfo();

if (isset($_GET['status'])){
    $userobj->deleteUserInfo($_GET['id']);
}

?>

<hr>
<a href="index.php">Add User</a> ||
<a href="view-user.php">View User</a>
<hr/>

<table border="1" width="600">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Action</th>
    </tr>

    <?php
        while ($user = mysqli_fetch_assoc($queryResult)){
    ?>
    <tr>
        <td><?php echo $user['name']; ?></td>
        <td><?php echo $user['email']; ?></td>
        <td><?php echo $user['phone']; ?></td>
        <td>
            <a href="edit-user.php?id=<?php echo $user['id']; ?>">Edit</a>
            <a href="?status=delete&id=<?php echo $user['id']; ?>">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>