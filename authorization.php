<?php 

session_start();

    $con = mysqli_connect('localhost', 'administrator', 'SpiralStaircase','catch_the_rainbow');

    if (!$con){
        die("Connection failed : " . mysqli_connect_error());
    }

    $query = $con->prepare("SELECT * FROM users WHERE login = ? LIMIT 1");

    $query->bind_param("s",$_POST['username']);
    $query->execute();
    $query->bind_result($login, $password, $email, $first_name, $second_name, $birth_date, $phone);
    
    $query->fetch();
    
    if($query)
    {
    
        if ($password == md5($_POST['password']))
        {
            $_SESSION['username'] = $login;         
        } 
    }

    header("Location: userpage.php");
    












