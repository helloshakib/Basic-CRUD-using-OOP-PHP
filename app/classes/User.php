<?php
/**
 * Created by PhpStorm.
 * User: DIU
 * Date: 3/16/2019
 * Time: 4:45 PM
 */

namespace App\classes;


class User
{
    private $con;
    public function __construct()
    {
        $this->con = mysqli_connect('localhost','root','','oop_crud');

    }

    public function userInfo(){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        //extract($_POST);
        $sql = "INSERT INTO user_info (name,email,phone) values ('$name','$email','$phone')";
        $result = mysqli_query($this->con,$sql);

        if ($result){
            $message = "Data Inserted Successful";
            return $message;
        }else{
            $message = 'Database Problem'.mysqli_error($this->con);
            return $message;
        }
    }

    public function getAllUserInfo(){
        $sql = "SELECT * FROM user_info";
        $queryResult = mysqli_query($this->con,$sql);
        if ($queryResult){
            return $queryResult;
        }else{
            $message = 'Database Problem'.mysqli_error($this->con);
            return $message;
        }
    }


    public function getUserById($id){
        $sql = "SELECT * FROM user_info WHERE id = '$id'";
        $queryResult = mysqli_query($this->con,$sql);
        if($queryResult){
            return $queryResult;
        }else{
            $message = 'Database Problem'.mysqli_error($this->con);;
            return $message;
        }
    }


    public function updateUserInfo($id){
        extract($_POST);
        $sql = "UPDATE user_info SET name = '$name', email = '$email', phone = '$phone' WHERE id = '$id'";
        $queryResult = mysqli_query($this->con,$sql);
        if($queryResult){
            echo 'success';
            //header('Location: view-user.php');
        }else{
            $message = 'Database Problem'.mysqli_error($this->con);;
            return $message;
        }
    }


    public function deleteUserInfo($id){
        $sql = "DELETE FROM user_info WHERE id = '$id'";
        $queryResult = mysqli_query($this->con,$sql);
        if($queryResult){
            //echo 'success';
            header('Location: view-user.php');
        }else{
            die ("Database Problem".mysqli_error($this->con));

        }
    }

}