<!--UNCOMPLETED FILE. Created by IT22337344-->
<?php
session_start();
include_once './config.php';

if(isset($_SESSION["customer"])) {
    // Access the session data
    $customerData = $_SESSION["customer"];
}else{
    echo "<script>alert('UNKOWN ERROR')</script>";
    
    header("Location: ./home.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>MyRide|Profile</title>
        <link rel="stylesheet" href="../css/profile.css"/>
        <link rel="stylesheet" href="../css/headerFooter.css"/>
        <link rel="stylesheet" type="text/css"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
            <script src="../js/profile.js"></script>
    </head>
    
    <body>
        <header class="header">
            <div>
                <img src="../images/headerLogo2.png" alt="logo">
                <h1>My</h1>
                <h1 style="color: red;">R</h1>
                <h1>ide</h1>
            </div>
            <div class="navigation">
                <ul>
                    <li class="list">
                        <a href="./home.php">
                            <span class="icon">
                                <ion-icon name="home-outline"></ion-icon>
                            </span>
                            <span class="text">Home</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="../html/fleet.html">
                            <span class="icon">
                                <ion-icon name="car-sport-outline"></ion-icon>
                            </span>
                            <span class="text">Fleet</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="../html/services.html">
                            <span class="icon">
                                <ion-icon name="layers-outline"></ion-icon>
                            </span>
                            <span class="text">Services</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="./contact.php">
                            <span class="icon">
                                <ion-icon name="call-outline"></ion-icon>
                            </span>
                            <span class="text">Contact Us</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="../html/about.html">
                            <span class="icon">
                                <ion-icon name="information-circle-outline"></ion-icon>
                            </span>
                            <span class="text">About</span>
                        </a>
                    </li>
                    <li class="list active">
                        <a href="./profile.php">
                            <span class="icon">
                                <ion-icon name="person-circle-outline"></ion-icon>
                            </span>
                            <span class="text">Profile</span>
                        </a>
                    </li>
                </ul>
            </div>
        </header>

        <div class="side-forms">
            <div class="wrapper">
                <input type="radio" name="slider" id="User" checked>
                <input type="radio" name="slider" id="Reservation">
                <input type="radio" name="slider" id="Payments">
                <nav>
                    <label for="User" class="User">User</label>
                    <label for="Reservation" class="Reservation">Reservations</label>
                    <label for="Payments" class="Payments">Payments</label>
                    <div class="slider"></div>
                </nav>
                <section>
                    <div class="content content-1">
                      <div class="title">User</div>
                        <div class="user-profile">
                            <img src="../images/userimg.jpg" alt="Profile Image" class="profile-image">
                            <button class="edit-image-btn">Edit Image</button>
                            <button class="logout-btn">Log Out</button>
                        </div>

                      <form method="post" action="../php/UpdateUser.php">
                        <div class="FL-Section">
                            <div class="field-n-label">
                                <label for="prefix">Prefix:</label>
                                <input type="text" id="prefix" name="prefix" readonly>
                            </div>
                            <div class="field-n-label">
                                <label for="firstName">First Name:</label>
                                <input type="text" id="firstName" name="firstName" readonly>
                            </div>
                            <div class="field-n-label">
                                <label for="lastName">Last Name:</label>
                                <input type="text" id="lastName" name="lastName" readonly>
                            </div>
                        </div>
                        
                        <div class="FL-Section">
                            <div class="field-n-label">
                                <label for="nic">NIC:</label>
                                <input type="text" id="nic" name="nic" readonly>
                            </div>
                            <div class="field-n-label">
                                <label for="age">Age:</label>
                                <input type="number" id="age" name="age" readonly>
                            </div>
                            <div class="field-n-label">
                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email" readonly>
                            </div>
                            <div class="field-n-label">
                                <button type="button" class="req-edit-nic-btn">Request Edit NIC</button>
                            </div>
                        </div>
                        <div class="FL-Section">
                            <div class="field-n-label">
                                <label for="drivingLicense">Driving License:</label>
                                <input type="text" id="drivingLicense" name="drivingLicense" readonly>
                            </div>
                            <div class="field-n-label">
                                <label for="expDate">Expiration Date:</label>
                                <input type="date" id="expDate" name="expDate" readonly>
                            </div>
                            <div class="field-n-label">
                                <button type="button" id="req-edit-dl-btn">Request Change DL Info</button>
                            </div>
                        </div>
                        <div class="sav-edt-del-btns">
                            <div>
                                <button id="save-changes-btn" disabled>Save Changes</button>
                                <button id="edit-btn" type="button" name="edit-det-btn"" onclick="edit(this.name)">Edit</button>
                            </div>
                            <div>
                                <button id="delete-account-btn">Delete Account</button>
                            </div>
                        </div>
                      </form>
                    </div>
                    <div class="content content-2">
                      <div class="title">Reservation details</div>
                      <!-- Add content for the Reservation details section -->
                    </div>
                    <div class="content content-3">
                      <div class="title">Payment details</div>
                      <!-- Add content for the Payment details section -->
                    </div>
                  </section>
                  
            </div>
        </div>

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
    
    </body>
</html>