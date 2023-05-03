<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sigma | Photostock</title>
    <link rel="stylesheet" href="css/style.css">
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
                <li><a href="">Home</a></li>
                <li><a href="photos.php">Photos</a></li>
                <li><a href="account.php">Account</a></li>
                <li><a href="cart.php"><ion-icon name="cart-outline"></ion-icon></a></li>
            </ul>
        </nav>
        <ion-icon name="menu-outline" class="menu-icon" onclick="menutoggle()"></ion-icon>
    </div>
    <div class="row index-header" >
        <div class="double-column">
            <h1>Sigma Photostock</h1>
            <p>Success is not final, failure is not fatal:<br>
                It’s the courage to continue that counts</p>
            <a href="photos.php" class="btn">Explore Now &#8594;</a>
        </div>
        <div class="double-column">
            <img class="banner" src="img/1 (1).png" alt="banner">
        </div>
    </div>
</div>
</header>

<div class="container-nav">
    <div class="navigator">
        <nav id="navigator">
            <ul>
                <li><a href="#Featured-Photos">Featured Photos</a></li>
                <li><a href="#Latest-Photos">Latest Photos</a></li>
                <li><a href="#Photo-Of-The-Month">Photo of the Month</a></li>        
            </ul>
        </nav>
        <hr>
        <ion-icon name="caret-down-outline" class="nav-icon"></ion-icon>
        <ion-icon name="caret-up-outline" class="nav-icon-close"></ion-icon> 
    </div>
</div>



<div class="categories">
    <div class="small-container">
        <div class="row">
            <div class="triple-column">
                <img src="img/image_part_001.jpg" alt="">
            </div>
            <div class="triple-column">
                <img src="img/image_part_002.jpg" alt="">
            </div>
            <div class="triple-column">
                <img src="img/image_part_003.jpg" alt="">
            </div>
        </div>
    </div>
</div>



<div class="small-container">
    <h2 class="title" id="Featured-Photos">Featured Photos</h2>
    <div class="row _print">
        <div class="quad-column">
            <img src="archive/IMG_1363.jpg" alt="Red Berries">
            <h4>Red Berries</h4>

        </div>
        <div class="quad-column">
            <img src="archive/IMG_2467.jpg" alt="Ice Shard">
            <h4>Ice Shard</h4>

        </div>
        <div class="quad-column">
            <img src="archive/IMG_2222.jpg" alt="Raindrops On Window">
            <h4>Raindrops On Window</h4>

        </div>
        <div class="quad-column">
            <img src="archive/IMG_1111.jpg" alt="Sunrise">
            <h4>Sunrise</h4>

        </div>
    </div>

    <div class="_print">
    <h2 class="title" id="Latest-Photos">Latest Photos</h2>
        <div class="slider">
            <div class="swiper">
                <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="archive/IMG_5956.jpg" alt=""><h4>Moss on the Rock</h4></div>
                <div class="swiper-slide"><img src="archive/IMG_5858.jpg" alt=""><h4>Log on the Beach</h4></div>
                <div class="swiper-slide"><img src="archive/IMG_6175.jpg" alt=""><h4>Moss After Rain</h4></div>
                <div class="swiper-slide"><img src="archive/IMG_5809.jpg" alt=""><h4>Waves And Wavebreaker</h4></div>
                <div class="swiper-slide"><img src="archive/IMG_6067.jpg" alt=""><h4>Raindrops On Spruce</h4></div>
                <div class="swiper-slide"><img src="archive/IMG_5897.jpg" alt=""><h4>Bee On The flower</h4></div>
                <div class="swiper-slide"><img src="archive/IMG_1363.jpg" alt=""><h4>Red Berries</h4></div>
                </div>  
                <div class="swiper-pagination"></div> 
            </div>
        </div>
    </div>
</div>  



<div class="offer">
    <div class="small-container _print">
        <div class="row">
            <div class="double-column">
                <img src="archive/IMG_1001.jpg" class="month-photo" alt="Ice Shard In Spruce">
            </div>
            <div class="double-column">
                <h2 id="Photo-Of-The-Month">
                    Photo Of The Month
                </h2>
                <h3>
                    Ice Shard In Spruce
                </h3>
                <small> 
                    Vote for your favorite picture now!
                </small>
                <br>
                <a href="account.php" class="btn"> Vote Now &#8594;</a>
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