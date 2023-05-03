<?php

    session_start();
    if(!isset($_SESSION['username']))
    {
        header("Location: account.php");
    }
    else 
    {
        $con = mysqli_connect('localhost', 'administrator', 'SpiralStaircase','catch_the_rainbow');

        $id =  mysqli_real_escape_string($con,$_POST['new_product_key']);

        if (!$con){
            die("Connection failed : " . mysqli_connect_error());
        }

        $query = "SELECT * FROM photos WHERE id = '$id' LIMIT 1";
        $sql = "DELETE FROM photos WHERE id = '$id'";

        $result = mysqli_query($con,$query);

        if($result)
        {   
            mysqli_query($con,$sql);
        }
       
        header("Location: account.php");
    }