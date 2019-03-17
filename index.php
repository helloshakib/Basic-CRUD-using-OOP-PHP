<?php

require_once './vendor/autoload.php';
use App\classes\User;

if (isset($_POST['submit'])){
    $userobj = new User();
    echo $userobj->userInfo();
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
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><input type="email" name="email"></td>
        </tr>
        <tr>
            <th>Phone</th>
            <td><input type="text" name="phone""></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" name="submit"></td>
        </tr>
    </table>
</form>
