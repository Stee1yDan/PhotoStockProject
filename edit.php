<?php

    session_start();
    if(!isset($_SESSION['username']))
    {
        header("Location: account.php");
    }
    else 
    {
        $con = mysqli_connect('localhost', 'administrator', 'SpiralStaircase','catch_the_rainbow');

        $key =  mysqli_real_escape_string($con,$_POST['new_product_key']);
        $name =  mysqli_real_escape_string($con,$_POST['new_product_name']);
        $price = mysqli_real_escape_string($con,$_POST['new_product_price']);

        if (!$con){
            die("Connection failed : " . mysqli_connect_error());
        }

        $query = "SELECT * FROM photos WHERE product_key = '$key' LIMIT 1";
        $sql = "UPDATE photos SET product_name ='$name', product_price='$price' WHERE product_key = '$key'";

        $result = mysqli_query($con,$query);

        if($result)
        {   
            mysqli_query($con,$sql);
        }
       
        header("Location: account.php");
    }