<?php
    require_once('show.php');
    session_start();

    if (isset($_POST['add']))
    {
        if(isset($_SESSION['cart']))
        {
            $item_array_id = array_column($_SESSION['cart'], "product_key");

            if(in_array($_POST['product_key'], $item_array_id))
            {
                echo "<script>alert('Product is already added in the cart..!')</script>";
                echo "<script>window.location = 'photos.php'</script>";
            }
            else
            {
                $con = mysqli_connect('localhost', 'administrator', 'SpiralStaircase','catch_the_rainbow');

                if (!$con){
                    die("Connection failed : " . mysqli_connect_error());
                }
        
                $id = $_POST['product_key'];

                $query = mysqli_real_escape_string($con,"SELECT popularity FROM photos WHERE id = $id");

                $result = mysqli_query($con, $query); 

                $row = mysqli_fetch_assoc($result);

                $popularity = $row['popularity'];

                $sql = mysqli_real_escape_string($con,"UPDATE photos SET popularity = $popularity + 1 WHERE id = $id");

                mysqli_query($con, $sql); 

                $count = count($_SESSION['cart']);
                $item_array = array(
                    'product_key' => $_POST['product_key']
                );
    
                $_SESSION['cart'][$count] = $item_array;
            }
        }
        else 
        {
            $item_array = array
            (
                'product_key' => $_POST['product_key']
            );

            $_SESSION['cart'][0] = $item_array;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sigma | Photostock</title>
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
</head>
<body>

<header>
<div class="container">
        <div class="navbar">
            <div class="logo">
                <a href="index.php"><img src="img/sigma.png" alt="sigma"></a>
            </div>
            <nav class="menuitems">
                <ul id="menuitems">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="photos.php">Photos</a></li>
                    <li><a href="account.php">Account</a></li>
                    <li><a href="cart.php"><ion-icon name="cart-outline"></ion-icon></a></li>
                </ul>
            </nav>
        <ion-icon name="menu-outline" class="menu-icon" onclick="menutoggle()"></ion-icon>
        </div>
        <div class="header-row _print">
            <div class="double-column">
                <div class="slider month-event">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="archive/IMG_1002.jpg" alt=""></div>
                        <div class="swiper-slide"><img src="archive/IMG_2467.jpg" alt=""></div>
                        <div class="swiper-slide"><img src="archive/IMG_5789.jpg" alt=""></div>
                        </div>    
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        <div class="double-column">
            <h2>Winter Collection</h2>
            <h3>Chose the Winner!</h3>
            <p>Vote for your favorite pictures now!</p>
            <a href="account.php" class="btn"> Vote Now &#8594;</a>
        </div>
    </div>
</div>
</header>

<div class="container-nav">
    <div class="navigator">
        <hr class="divider">
    </div>
</div>


<div class="small-container">
    <div class="row _print">
    <?php
        showAll();     
    ?>

    </div>
</div>  

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="footer-column-1">
                <h3>Support Our Creators</h3>
                <a href="https://stock.adobe.com/ru/contributor/209754877/daniel?load_type=author&prev_url=detail">Support Our Creators On Other Platforms</a>
            </div>
            <div class="footer-column-2">
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

<script src="photos.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<script src="swiper.js"></script>
</body>
</html>