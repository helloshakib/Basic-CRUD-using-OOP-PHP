<?php

    require_once  './vendor/autoload.php';
    use App\classes\User;
    $userobj = new User();
    $queryResult = $userobj->getUserById($_GET['id']);
    $user = mysqli_fetch_assoc($queryResult);

    if(isset($_POST['submit'])){
        $userobj->updateUserInfo($_GET['id']);
    }

?>


<hr>
<a href="index.php">Add User</a> ||
<a href="view-user.php">View User</a>
<hr/>

<form action="#" method="post">
    <table>
        <tr>
            <th>Name</th>
            <td><input type="text" name="name" value="<?php echo $user['name']; ?>"></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><input type="email" name="email" value="<?php echo $user['email']; ?>"></td>
        </tr>
        <tr>
            <th>Phone</th>
            <td><input type="text" name="phone"" value="<?php echo $user['phone']; ?>"></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" value="Update" name="submit"></td>
        </tr>
    </table>
</form>
