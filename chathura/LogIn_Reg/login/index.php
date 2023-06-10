<?php
session_start();
include_once '../../../Customer/php/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--https://www.sololearn.com/Discuss/2901243/meta-charset-utf-8-meta-name-viewport-content-width-device-width-initial-scale-1-0-why-this-is-same-->
    <link rel="stylesheet" href="style.css">    
    <link rel="stylesheet" href="../../../Customer/css/headerFooter.css"/>
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8c/Cars_Logo_Black.svg/1280px-Cars_Logo_Black.svg.png">
    <title>Log In Page</title>
</head>

<body>    
    <header class="header">
        <div>
            <img src="../../../Customer/images/headerLogo2.png" alt="logo">
            <h1>My</h1>
            <h1 style="color: red;">R</h1>
            <h1>ide</h1>
        </div>
        <div class="navigation">
            <ul>
                <li class="list">
                    <a href="../../../Customer/php/home.php">
                        <span class="icon"><!--https://www.w3schools.com/tags/tag_span.asp-->
                            <ion-icon name="home-outline"></ion-icon> <!--https://ionic.io/ionicons-->
                        </span>
                        <span class="text">Home</span>
                    </a>
                </li>
                <li class="list">
                    <a href="../../../Customer/html/fleet.html">
                        <span class="icon">
                            <ion-icon name="car-sport-outline"></ion-icon>
                        </span>
                        <span class="text">Fleet</span>
                    </a>
                </li>
                <li class="list">
                    <a href="../../../Customer/html/services.html">
                        <span class="icon">
                            <ion-icon name="layers-outline"></ion-icon>
                        </span>
                        <span class="text">Services</span>
                    </a>
                </li>
                <li class="list">
                    <a href="../../../Customer/html/contact.html">
                        <span class="icon">
                            <ion-icon name="call-outline"></ion-icon>
                        </span>
                        <span class="text">Contact Us</span>
                    </a>
                </li>
                <li class="list">
                    <a href="../../../Customer/html/about.html">
                        <span class="icon">
                            <ion-icon name="information-circle-outline"></ion-icon>
                        </span>
                        <span class="text">About</span>
                    </a>
                </li>
                <li class="list active">
                    <a href="../../LogIn_Reg/login/index.php">
                        <span class="icon">
                            <ion-icon name="person-circle-outline"></ion-icon>
                        </span>
                        <span class="text">Profile</span>
                    </a>
                </li>
            </ul>
        </div>
    </header>

    <section id="login">
        <div class="box">
            <div class="form-con customer-login">
                <form method="post" action="../login/login.php">
                    <h1 class="heading">Log In</h1>
                    <div class="inp-box">
                        <label for="acc-types">Your Account Type:</label>
                        <select name="acc-type" id="acc-types">
                            <option value="customer">Customer</option>
                            <option value="driver">Driver</option>
                            <option value="admin">Admin</option>
                            <option value="fleet-off">Fleet Officer</option>
                        </select>
                    </div>
                    
                    <label for="email">Email:</label>
                    <input type="text" name="email" id="email" placeholder="Enter email" required>
                    <br>

                    <label for="paword">Password:</label>
                    <input type="password" id="paword" name="paword" placeholder="Enter password" required>
                    <br>

                    <button type="submit" name="login">Log In</button>
                    <br>
                    <button name="google_login">Log In with <span>Google</span></button>
                    <br>

                    <a href="./forgot_pwd.html">forgot password</a>
                    <br>
                    <a href="./request_del_acc.html">Request Delete Account</a>
                    <p></p>
                    <a href="../register/index.php">Don't have an account? Sign up here!</a>
                </form>
            </div>
            <div class="image">
                <img src="https://c4.wallpaperflare.com/wallpaper/404/106/480/vehicles-pogea-racing-fplus-corsa-car-red-car-wallpaper-preview.jpg" alt="">
            </div>
        </div>
    </section>

    <!-- done by it22003478-->
    <p></p>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h4>My Ride</h4>
                    <ul>
                        <li><a href="about.html">about us</a></li>
                        <li><a href="services.html">our services</a></li>
                        <li><a href="Privacy-policy.html">privacy policy</a></li>
                        <li><a href="Terms & conditions.html">Terms and conditions</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>get help</h4>
                    <ul>
                        <li><a href="contact.html">FAQ</a></li>
                        <li><a href="contact.html">Email</a></li>
                        <li><a href="contact.html">telephone</a></li>
                        <li><a href="contact.html">contact us</a></li>

                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Services</h4>
                    <ul>
                        <li><a href="#">Reservation</a></li>
                        <li><a href="#">Cancellation</a></li>
                        <li><a href="#">Customizing bookings</a></li>
                        <li><a href="#">Payment gateway</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>follow us</h4>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
            <!--use for icons related for navigation-->
</body>
</html>