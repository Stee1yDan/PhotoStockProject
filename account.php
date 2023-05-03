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
session_start();
if (!isset($_SESSION['username'])) {
echo "<div class='account-page'>
    <div class='container _print'>
        <div class='header-row'>
            <div class='double-column'>
                <img src='img/1 (1).png' alt='banner' class='banner'>
            </div>

            <div class='double-column'>
                <div class='form-container'>
                    <div class='form-btn'>
                        <span onclick='login()'> Log in </span>
                        <span onclick='signup()'> Sign Up </span>
                        <hr id='Indicator'>
                    </div>

                    <form action='authorization.php' id='LogInForm' method='POST'>
                        <input type='text' placeholder='Username' name='username'>
                        <input type='password' placeholder='Password' name='password'>
                        <button type='submit' class='btn-1'>Log In</button>
                    </form>

                    <form action='register.php' id='SignUpForm' method='POST'>
                        <input type='text' placeholder='Username' name = 'username'>
                        <input type='password' placeholder='Password' name = 'password'>
                        <input type='text' placeholder='Email' name = 'email'>
                        <button type='submit' class='btn-1'>Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>";
} 
else {
    header("Location: userpage.php");
}
?>


<footer class='footer'>
    <div class='container'>
        <div class='row'>
            <div class='footer-column-1'>
                <h3>Support Our Creators</h3>
                <a href='https://stock.adobe.com/ru/contributor/209754877/daniel?load_type=author&prev_url=detail'>Support Our Creators On Other Platforms</a>
        
            </div>
            <div class='footer-column-2'>
            </div>
            <div class='footer-column-3'>
                    <h3>Useful links</h3>
                <ul>
                    <li><a href='account.html'>Join us</a></li>
                    <li><a href='https://www.reddit.com/user/_jabodav'>Blog Post</a></li>
                </ul>
                <div class='footer-column-4'>
                    <h3>Follow Us</h3>
                <ul>
                    <li><a href='https://vk.com/21st_century_schizoidman'>VK</a></li>
                    <li><a href='https://www.instagram.com/tycoon90/'>Instagram</a></li>
                </ul>
                </div>
            </div>
        </div>
    </div>
    <hr>
<p class='copyright'>Copyright 2021 - &copy; Daniil Vitiuk</p>
</footer>

<script src='index.js'></script>
<script src='account.js'></script>
<script type='module' src='https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js'></script>
<script nomodule src='https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js'></script>
</body>
</html>