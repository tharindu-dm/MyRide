<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8c/Cars_Logo_Black.svg/1280px-Cars_Logo_Black.svg.png">
    <title>LogIn Page</title>
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8c/Cars_Logo_Black.svg/1280px-Cars_Logo_Black.svg.png" alt="Brand logo">
            </div>
            <ul class="links">
                <li class="active"><a href="#home">Home</a></li>
                <li><a href="#fleet">Fleet</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#profile">Profile</a></li>
            </ul>
        </nav>
    </header>
    <hr>
    <section id="login">

        <div class="box">
            <div class="form-con customer-login">
                <form action="./login.php" method="post">
                    <h1 class="heading">Log In</h1>
                    <label for="">Your Account Type</label>
                    <br>
                    <div class="radio-con">
                        <label for="customer">Customer</label>
                        <input type="radio" id="customer" name="acctype" value="customer">
                        <br>
                        <label for="driver">driver</label>
                        <input type="radio" id="driver" name="acctype" value="driver">
                        <br>
                        <label for="employee">employee</label>
                        <input type="radio" id="employee" name="acctype" value="employee">
                    </div>                    <label for="uid">Email:</label>
                    <input type="text" name="email" id="uid" placeholder="eg: #$yourName" required>
                    <br>
                    <label for="password">Password(NIC):</label>
                    <input type="text" id="password" name="nic" placeholder="Type here.." required>
                    <br>
                    <button type="submit">Log In</button>
                    <br>
                    <button>Log In with <span>Google</span></button>
                    <br>
                    <a href="#forgot-password">forgot password</a>
                </form>
            </div>
            <div class="image">
                <img src="https://c4.wallpaperflare.com/wallpaper/404/106/480/vehicles-pogea-racing-fplus-corsa-car-red-car-wallpaper-preview.jpg" alt="">
            </div>
        </div>
    </section>
    <footer>

    </footer>
</body>
</html>