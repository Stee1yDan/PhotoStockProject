<?php
    require_once('show.php');
    session_start();
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Sigma photos | Account</title>
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
</head>
<body>

<header class='acc'>
<div class='container'>
    <div class='navbar'>
        <div class='logo'>
            <a href='index.php'><img src='img/sigma.png' alt='sigma'></a>
        </div>
        <nav class='menuitems'>
            <ul id='menuitems'>
                <li><a href='index.php'>Home</a></li>
                <li><a href='photos.php'>Photos</a></li>
                <li><a href='account.php'>Account</a></li>
                <li><a href='cart.php'><ion-icon name='cart-outline'></ion-icon></a></li>
            </ul>
        </nav>
        <ion-icon name='menu-outline' class='menu-icon' onclick='menutoggle()'></ion-icon>
    </div>
</div>
</header>

<?php

$currentName = $_SESSION["username"];
if (!isset($_SESSION["username"]))  {
    header("Location: account.php");
}
?>

<div class='account-page'>
    <div class='container _print'>
        <div class='header-row'>         
            <div class='user-form-container'>
            <div class='categories'>
                    <div class='small-container'>
                        <div class='row'>
                            <div class='triple-column'>
                            <img src='img/save.png' class='profile-picture'>
                            <h1>
                                <?php echo $_SESSION['username']?>
                            </h1>
                            <form action='logout.php' method='POST'>
                                <input type='submit' value='Log out' name='logout' class='logout-btn'> 
                            </form>
                            <hr>
                            </div>
                                 <?php
                                    $max_width = 500;
                                    $max_height = 200;
                                    
                                    $result = getUsersProductData();

                                    $number_of_rows =  mysqli_fetch_assoc(getNumberOfUsersProducts());
               
                                    $x_gap =  $max_width / ($number_of_rows['COUNT(*)'] + 1) + 1;
                                    $y_gap =  $max_height  / ($number_of_rows['COUNT(*)'] + 1) + 1;

                                    $max_value = mysqli_fetch_assoc(getMaxPopularity());
                                    $one_unit = $max_height /  ($max_value['MAX(popularity)'] + 1);
                                ?> 

                                    <svg viewbox = '0 0  <?php echo"$max_width $max_height"?>' style = 'font-size:10px;'>
                                        <?php
                                            $num = $x_gap;
                                            $num2 = $y_gap;

                                            $points = "";

                                            while ($row = mysqli_fetch_assoc($result))
                                            {
                                                $name =  $row['product_name'];
                                                $popularity = $row['popularity'];

                                                $y =  $max_height - $one_unit *  $popularity ;
                                                //echo "<polyline points = '$num,0 $num, $max_height' style = 'stroke:gray;'/>";
                                                echo "<polyline points = '0, $num2  $max_width,$num2 ' style = 'stroke:gray;'/>";
                                                echo "<circle r = '2' cx = '$num' cy = '$y'/>";

                                                $points .= " $num,$y ";                   
                                                echo "<polyline points = '$points' style = 'stroke:black;'/>";
                                                $points = " $num,$y ";       
                                                
                                                echo "<text x = '$num' y = '$max_height' text style = 'fill:black'>$name</text>";
                                                echo "<text x = '$num' y = '".($y - 5)."' text style = 'fill:black'> $popularity</text>";

                                                $num += $x_gap;
                                                $num2 += $y_gap;
                                            }
                                        ?>
                                    </svg>            
                            <div class="small-container">
                                <div class="row _print">
                                    <?php
                                        showUsersProducts();
                                    ?>  
                                </div>
                            </div>
                        </div>
                            <div class="row _print">
                                <form class='uni-form-frame' action='upload.php' method='post' enctype="multipart/form-data">
                                    <input type='file' name='file'>
                                    <input type='text' name='new_product_name' placeholder='Name'>
                                    <input type='text' name='new_product_price' placeholder='Price'>
                                    <input type='submit' name='submit' class='btn' value='Upload'>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
            </div>
        </div>
    </div>
</div>




<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="footer-column-1">
                <h3>Support Our Creators</h3>
                <a href="https://stock.adobe.com/ru/contributor/209754877/daniel?load_type=author&prev_url=detail">Support Our Creators On Other Platforms</a>
        
            </div>
            <div class="footer-column-3">
                    <h3>Useful links</h3>
                <ul>
                    <li><a href="account.html">Join us</a></li>
                    <li><a href="https://www.reddit.com/user/_jabodav">Blog Post</a></li>
                </ul>
                <div class="footer-column-4">
                    <h3>Follow Us</h3>
                <ul>
                    <li><a href="https://vk.com/21st_century_schizoidman">VK</a></li>
                    <li><a href="https://www.instagram.com/tycoon90/">Instagram</a></li>
                </ul>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <p class="copyright">Copyright 2021 - &copy; Daniil Vitiuk</p>
</footer>

<script src="index.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<script src="swiper.js"></script>

</body>
</html>