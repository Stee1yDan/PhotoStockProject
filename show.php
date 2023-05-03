<?php
    function component($path, $name, $price, $id) 
    {
        $element = "
            <form class='photo-frame' method='post'>
                <img src='$path' class='photo-frame_img' alt='$path.jpg'>
                <h4 class='photo-frame_h4'>$name</h4>
                
                <input type='text' name='product_key' value='$id' hidden>
                <input type='submit' class='btn' value='$price ¢' name='add'>
            </form>
        ";

        echo $element;

    }

    function cartComponent($path, $name, $price, $id) 
    {
        $element = "
            <form class='photo-frame' action='cart.php?action=remove&id=$id' method='post'>
                <img src='$path' class='photo-frame_img' alt='iii'>
                <h4 class='photo-frame_h4'>$name</h4>
                <h4 class='count'>$price ¢</h4>
                <input type='text' name='product_key' value='$id' hidden>
                <input type='submit' class='btn-delete' value='Remove' name='remove'>
            </form>
        ";

        echo $element;

    }

    function userComponent($path, $name, $price, $id) 
    {
        $element = "
        <div class='photo-frame'>
            <form action='edit.php' method='post'>
                <img src='$path' alt='iii'>
                <input type='text' name='new_product_name' placeholder='Name'>
                <input type='text' name='new_product_price' placeholder='Price'>
                <input type='hidden' name='new_product_key' value=$id>
                <input type='submit' class='btn' value='Save Changes'>
            </form>
            <form action='delete.php' method='post'>
                <input type='hidden' name='new_product_key' value=$id>
                <input type='submit' class='btn-delete' value='Delete'>
            </form>
        </div>
        ";

        echo $element;

    }

    function getProductData()
    {
        $con = mysqli_connect('localhost', 'administrator', 'SpiralStaircase','catch_the_rainbow');

        if (!$con){
            die("Connection failed : " . mysqli_connect_error());
        }

        $sql = mysqli_real_escape_string($con,"SELECT id, product_name, product_price, product_path FROM photos");

        $result = mysqli_query($con, $sql);

        return $result;
    }

    function getUsersProductData()
    {
        $con = mysqli_connect('localhost', 'administrator', 'SpiralStaircase','catch_the_rainbow');

        $uname =  mysqli_real_escape_string($con,$_SESSION['username']);

        if (!$con){
            die("Connection failed : " . mysqli_connect_error());
        }

        $sql = "SELECT id, product_name, product_price, product_path, popularity FROM photos WHERE user = '$uname'";

        $result = mysqli_query($con, $sql);

        return $result;
    }

    function getMaxPopularity()
    {
        $con = mysqli_connect('localhost', 'administrator', 'SpiralStaircase','catch_the_rainbow');

        $uname =  mysqli_real_escape_string($con,$_SESSION['username']);

        if (!$con){
            die("Connection failed : " . mysqli_connect_error());
        }

        $sql = "SELECT MAX(popularity) FROM photos WHERE user = '$uname'";

        $result = mysqli_query($con, $sql);

        return $result;
    }

    function getNumberOfUsersProducts()
    {
        $con = mysqli_connect('localhost', 'administrator', 'SpiralStaircase','catch_the_rainbow');

        $uname =  mysqli_real_escape_string($con,$_SESSION['username']);

        if (!$con){
            die("Connection failed : " . mysqli_connect_error());
        }

        $sql = "SELECT COUNT(*) FROM photos WHERE user = '$uname'";

        $result = mysqli_query($con, $sql);

        return $result;
    }

    function showAll()
    {
        $result = getProductData();

        while ($row = mysqli_fetch_assoc($result))
        {
            component($row['product_path'], $row['product_name'], $row['product_price'], $row['id']);
        }
    }

    function showUsersProducts()
    {
        $result = getUsersProductData();

        while ($row = mysqli_fetch_assoc($result))
        {
            userComponent($row['product_path'], $row['product_name'], $row['product_price'], $row['id']);
        }
    }

    function showGraph()
    {
        $max_width = 500;
        $max_height = 200;

        $result = getUsersProductData();
        $row = mysqli_fetch_assoc($result);

        $x_gap =  $max_width / count($row);
        $y_gap =  $max_height  / count($row);

        echo "
        <svg viewbox = '0 0  $max_width $max_height'>
            <rect x='0' y='100' width='100' height='100' fill='black'/>
            <text x='0' y='50' font-family='Verdana' font-size='35' fill='blue'>Hello</text>
        </svg>
        ";
    }

?>