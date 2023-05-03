<?php 
session_start();

$con = mysqli_connect('localhost', 'administrator', 'SpiralStaircase','catch_the_rainbow');

if (!$con){
    die("Connection failed : " . mysqli_connect_error());
}

$new_username = mysqli_real_escape_string($con,$_POST['username']);
$new_password = mysqli_real_escape_string($con,$_POST['password']);
$new_email = mysqli_real_escape_string($con,$_POST['email']);

$query = "SELECT * FROM `users` WHERE login = '$new_username'";
$sql = "INSERT INTO `users`(`login`, `password`,`email`) VALUES ('$new_username', md5($new_password), '$new_email')";

$result = mysqli_query($con,$query);

if(preg_match('/^\\S+@\\S+\\.\\S+$/',$new_email))
{
    echo "cool";
    mysqli_query($con,$sql);
    $_SESSION['username'] = $new_username;
}

header("Location: account.php");
