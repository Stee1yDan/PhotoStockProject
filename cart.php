<?php
    require_once('show.php');
    session_start();

    if (isset($_POST['remove'])){
        if ($_GET['action'] == 'remove'){
            foreach ($_SESSION['cart'] as $key => $value){
                if($value["product_key"] == $_GET['id']){
                    unset($_SESSION['cart'][$key]);
                }
            }
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
        $total = 0;
        if (isset($_SESSION['cart']))
        {
            $product_id = array_column($_SESSION['cart'], 'product_key');

            $result = getProductData();
            while ($row = mysqli_fetch_assoc($result))
            {
                foreach ($product_id as $id)
                {
                    if ($row['id'] == $id)
                    {
                        cartComponent($row['product_path'], $row['product_name'], $row['product_price'], $row['id']);
                        $total = $total + (int)$row['product_price'];
                    }
                }
            }
        }
        if ($total == 0)
        {
            echo "  <img src='img/cuteDog.png' class='doggo' alt='iii'>"; 
        }

    ?>
    </div>
        <?php
            echo "<hr>";
            echo "<br>";
            echo "<div class='cart-row'>Total: $total ¢</div>";
            echo "<br>"
        ?>
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