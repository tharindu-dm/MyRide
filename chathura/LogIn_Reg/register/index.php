<?php
    include_once '../../../Customer/php/config.php'

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--https://www.sololearn.com/Discuss/2901243/meta-charset-utf-8-meta-name-viewport-content-width-device-width-initial-scale-1-0-why-this-is-same-->
    <link rel="stylesheet" href="style.css">
    <title>Start Your Journey</title>
</head>
<body>
    <div class="container">
        
        <h1>Sign Up and Start Your Journey</h1>
        <div class="box">
            <form id="res-form" onsubmit="return validateForm()" method="POST" action="SubmitRegistrationDetail.php">
                    <h3>Personal Infomation</h3>
                    <div class="inp-box">
                        <label>Your Account Type:</label>
                        <select name="acc-type">
                            <option value="">Customer</option>
                            <option value="driver">Driver</option>
                            <option value="admin">Admin</option>
                            <option value="fleet-off">Fleet Officer</option>
                        </select>
                    </div>
                    <div class="inp-box">
                        <label for="prefix">Prefix* : </label>
                        <input name="feild1" id="prefix" type="text" placeholder="prefix eg:mr,mrs." required>
                    </div>
                    <div class="inp-box">
                        <label for="first-name">First Name* : </label>
                        <input name="feild2" id="first-name" type="text" placeholder="first name." required>
                    </div>
                    <div class="inp-box">
                        <label for="last-name">Last Name* : </label>
                        <input name="feild3" id="last-name" type="text" placeholder="last name." required>
                    </div>
                    <div class="inp-box">
                        <label for="age">Age* : </label>
                        <input name="feild4" id="age" type="text" placeholder="18<=." required>
                    </div>
                    <div class="inp-box">
                        <label for="email">E-mail* : </label>
                        <input name="feild5" id="email" type="text" placeholder="Your E-mail." required>
                    </div>
                    <div class="inp-box">
                        <label for="nic-passport">NIC / PASSPORT* : </label>
                        <input name="feild6" id="nic-passport" type="text" placeholder="Your NIC / PASSPORT Number" required>
                    </div>
                    <div class="inp-box">
                        <label for="dlnum">Driving License Number : </label>
                        <input name="feild7" id="dlnum" type="text" placeholder="Your License Number" required>
                    </div>
                    <div class="inp-box">
                        <label for="dlexpdate">Driving License EXP Date* : </label>
                        <input name="feild8" id="dlexpdate" type="date" placeholder="Your License Number" required>
                    </div>
                    <div class="inp-box">
                        <label for="password">Your Password* : </label>
                        <input name="feild9" id="password" type="password" placeholder="Password" required>
                    </div>
               
                <input type = "submit" value = "submit">
            </form>
        </div>
    </div>
</body>
</html>