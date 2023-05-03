<?php
session_start();
    if (isset($_POST['submit']))
    {
        $file = $_FILES['file'];

        $file_name =  $_FILES['file']['name'];
        $file_tmp_name =  $_FILES['file']['tmp_name'];
        $file_size =  $_FILES['file']['size'];
        $file_error =  $_FILES['file']['error'];
        $file_type =  $_FILES['file']['type'];
        
        $file_ext =  explode('.',$file_name);
        $file_act_ext = strtolower(end($file_ext));

        $allow = array('jpeg','jpg', 'png');

        //
        $con = mysqli_connect('localhost', 'administrator', 'SpiralStaircase','catch_the_rainbow');

        $user_name = mysqli_real_escape_string($con, $_POST['new_product_name']);
        $user_price = mysqli_real_escape_string($con, $_POST['new_product_price']);
        $user = mysqli_real_escape_string($con, $_SESSION['username']);

        if (!$con){
            die("Connection failed : " . mysqli_connect_error());
        }

        if(in_array($file_act_ext,$allow))
        {
            if($file_error === 0 AND strlen($user_name) < 64 AND strlen($user_price) < 4)
            {
                $file_name_new = $user_name.".jpeg";
                $file_new_id =  rand(0,999999);
                $file_destination = "archive/".$file_new_id.".jpeg";
                move_uploaded_file($file_tmp_name,$file_destination);

                $sql = "INSERT INTO `photos`(`id`, `product_name`, `product_price`, `popularity`, `user`, `product_path`, `insertion_time`) 
                VALUES ('$file_new_id','$user_name', '$user_price', '0' , '$user','$file_destination', NOW())";

                mysqli_query($con,$sql);
            }
            else
            {
                echo "Error";
            }
        }
        else
        {
            echo "You can not upload this file";
        }

    }
    header('Location: userpage.php');