<?php
include_once './config.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MyRide|Home</title>

    <link rel="stylesheet" href="../css/home.css"/>
    <link rel="stylesheet" href="../css/headerFooter.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <script src="../js/home.js"></script>
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
                    <li class="list active">
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
                        <a href="../html/contact.html">
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
                    <li class="list">
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

        <section class="forms-And-VehiGrid">
            <div class="side-forms">
                <div class="wrapper">
                    <header>Book My Ride</header>
                    <input type="radio" name="slider" id="vehicle" checked>
                    <input type="radio" name="slider" id="essentials">
                    <input type="radio" name="slider" id="customer">
                    <input type="radio" name="slider" id="payment">
                    <nav>
                        <label for="vehicle" class="vehicle">Vehicle</label>
                        <label for="essentials" class="essentials">Essentials</label>
                        <label for="customer" class="customer">Customer</label>
                        <label for="payment" class="payment">Payment</label>
                        <div class="slider"></div>
                    </nav>
                    <section>                        
                        <form method="post" action="searchResVehicle.php">
                            <div class="content content-3">
                                <div class="title">Vehicle details</div>
                                    <div class="v-3col-container">
                                        <div class="v-3col">
                                            <label for="">Code</label>
                                            <input type="text" id="v-code" name="v-code">                                        
                                        </div>
                                        <div class="v-3col">
                                                <label for="vehicleSelector">Type</label>
                                                <select id="vehicleSelector" name="vehicle_selector">
                                                    <option value="car">Car</option>
                                                    <option value="van">Van</option>
                                                    <option value="miniBus">Minibus</option>
                                                    <option value="bike">Bike</option>
                                                    <option value="suv">SUV</option>
                                                </select> 
                                                <button type="submit" name="searchVehicle">Search</button>
                                        </div>
                                        <div class="v-3col">
                                            <label for="">Model</label>
                                            <input type="text" id="v-model" name="v-model" readonly>
                                        </div>
                                    </div>
                                    <div class="v-3col-container">
                                        <div class="v-3col">
                                            <label for="">Free Milage (LKR)</label>
                                            <input type="text" id="v-FreeMil" name="v-FreeMil" readonly>
                                        </div>
                                        <div class="v-3col">
                                            <label for="">Cost per mile (LKR)</label>
                                            <input type="text" id="v-mileCost" name="v-mileCost" readonly>
                                        </div>
                                    </div>
                                    <div class="v-rows-container">
                                        <div class="v-rows rt1">
                                            <label for="">Passenger Count</label>
                                            <input type="text" id="v-passenger-count" name="v-passenger-count" readonly>
                                        </div>
                                        <div class="v-rows rt2">
                                            <label for="">Luggage/Storage</label>
                                            <input type="text" id="v-luggage" name="v-luggage" readonly>
                                        </div>
                                        <!--<div class="v-rows rt3">
                                            <label for="">Air Conditioning</label>
                                            <input type="text" id="v-ac" name="v-ac" readonly>
                                        </div>-->
                                        <div class="v-rows rt4">
                                            <label for="">Gear System</label>
                                            <input type="text" id="v-gear" name="v-gear" readonly>
                                        </div>
                                        <div class="v-rows rt5">
                                            <label for="">Fuel type</label>
                                            <input type="text" id="v-fuel" name="v-fuel" readonly>
                                        </div>
                                    </div>
                                    <script>
                                        // Bring query parameters from PHP URL
                                        const urlParams = new URLSearchParams(window.location.search);
                                        const vcode = urlParams.get('vcode');
                                        const model = urlParams.get('model');
                                        const freemil = urlParams.get('freemil');
                                        const milecost = urlParams.get('milecost');
                                        const passenger = urlParams.get('passenger');
                                        const luggage = urlParams.get('luggage');
                                        const gear = urlParams.get('gear');
                                        const fuel = urlParams.get('fuel');

                                        // Fill the form fields with taken values
                                        document.getElementById('v-code').value = vcode;
                                        document.getElementById('v-model').value = model;
                                        document.getElementById('v-FreeMil').value = freemil;
                                        document.getElementById('v-mileCost').value = milecost;
                                        document.getElementById('v-passenger-count').value = passenger;
                                        document.getElementById('v-luggage').value = luggage;
                                        document.getElementById('v-gear').value = gear;
                                        document.getElementById('v-fuel').value = fuel;
                                    </script>
                                    <div class="v-warning-msg">
                                        <p>
                                            Do not make any modifications to the vehicle in any way
                                            without prior authorization from our fleet officer.
                                            This includes adding or removing any equipment,
                                            changing the paint, or making any alterations to the
                                            vehicle's structure. Any modifications made without
                                            permission will result in penalties and charges.</p>
                                        <p>
                                            Please ensure that you refuel the vehicle only with the
                                            exact type of fuel recommended. Using the wrong type of
                                            fuel may cause severe damage to the vehicle and result in
                                            additional charges.
                                        </p>
                                    </div>
                                    <div class="v-contact">
                                        For any queries, please contact our fleet officer ::
                                        <b>011 - 234 5678</b>
                                    </div>
                                    <button type="button" onclick="form_buttonJump('vehicle')"> Next </button>
                                </form>
                            </div>
                            <div class="content content-1">
                                <div class="title">Enter reservation details</div>
                                <div class="outer-box">
                                    <div class="message">
                                        <p>
                                            If the vehicle has to be delivered to a location i.e the pick up
                                            and return locations are not the <b>Head Office</b>
                                            extra cost will be charge considering the distance between the
                                            relavant location/s and Head Office.
                                        </p>
                                        <br>
                                        <p>
                                            Charges will be applied to delays in return for every <b>30 minutes</b>.
                                            <br> Therefore, it is adviced to extend the retrun time in at least
                                            by 30 minutes.
                                            <br>These charges will depend on the vehicle that is been rented.
                                            You will be notified regarding these matters again, on pick up.
                                        </p>
                                    </div>
                                    <div class="essentialForm">
                                        <div class="place">
                                            <label for="">Pickup Place</label>
                                            <div class="choosePlace">
                                                <input type="text" id="pickPlace" name="pickPlace"
                                                placeholder="Enter address" value="Head Office" required>
                                            </div>
                                            <label for="">Return Place</label>
                                            <div class="choosePlace">
                                                <input type="text" id="returnPlace" name="returnPlace"
                                                placeholder="Enter address" value="Head Office" required>
                                            </div>
                                        </div>
                                        <div class="dtHolder">
                                            <div class="dnt-wrapper">
                                                <div class="entDate">
                                                    <label>Pickup Date</label><br>
                                                    <input type="date" id="pickupDate" name="pickupDate" required>
                                                    <script>
                                                        var currentDate = new Date().toISOString().slice(0, 10);
                                                        document.getElementById("pickupDate").setAttribute("min", currentDate);
                                                    </script>
                                                </div>
                                                <div class="entTime">
                                                    <label>Pickup Time</label><br>
                                                    <select title="pickupTime" id="pickupTime" name="pickupTime">
                                                        <option value="00:00">00:00</option>
                                                        <option value="00:30">00:30</option>
                                                        <option value="01:00">01:00</option>
                                                        <option value="01:30">01:30</option>
                                                        <option value="02:00">02:00</option>
                                                        <option value="02:30">02:30</option>
                                                        <option value="03:00">03:00</option>
                                                        <option value="03:30">03:30</option>
                                                        <option value="04:00">04:00</option>
                                                        <option value="04:30">04:30</option>
                                                        <option value="05:00">05:00</option>
                                                        <option value="05:30">05:30</option>
                                                        <option value="06:00">06:00</option>
                                                        <option value="06:30">06:30</option>
                                                        <option value="07:00">07:00</option>
                                                        <option value="07:30">07:30</option>
                                                        <option value="08:00">08:00</option>
                                                        <option value="08:30">08:30</option>
                                                        <option value="09:00">09:00</option>
                                                        <option value="09:30">09:30</option>
                                                        <option value="10:00">10:00</option>
                                                        <option value="10:30">10:30</option>
                                                        <option value="11:00">11:00</option>
                                                        <option value="11:30">11:30</option>
                                                        <option value="12:00">12:00</option>
                                                        <option value="12:30">12:30</option>
                                                        <option value="13:00">13:00</option>
                                                        <option value="13:30">13:30</option>
                                                        <option value="14:00">14:00</option>
                                                        <option value="14:30">14:30</option>
                                                        <option value="15:00">15:00</option>
                                                        <option value="15:30">15:30</option>
                                                        <option value="16:00">16:00</option>
                                                        <option value="16:30">16:30</option>
                                                        <option value="17:30">17:00</option>
                                                        <option value="17:30">17:30</option>
                                                        <option value="18:30">18:00</option>
                                                        <option value="18:30">18:30</option>
                                                        <option value="19:30">19:00</option>
                                                        <option value="19:30">19:30</option>
                                                        <option value="20:30">20:00</option>
                                                        <option value="20:30">20:30</option>
                                                        <option value="21:30">21:00</option>
                                                        <option value="21:30">21:30</option>
                                                        <option value="22:30">22:00</option>
                                                        <option value="22:30">22:30</option>
                                                        <option value="23:00">23:00</option>
                                                        <option value="23:30">23:30</option>
                                                    </select>
                                                    <script>
                                                        var select = document.getElementById('pickupTime');
                                                        select.selectedIndex = 18;
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dtHolder">
                                            <div class="dnt-wrapper">
                                                <div class="entDate">
                                                    <label>Return Date</label><br>
                                                    <input type="date" id="returnDate" name="returnDate" required>
                                                    <script>
                                                        document.getElementById("pickupDate").addEventListener("input", function() {
                                                            var pickupDateValue = document.getElementById("pickupDate").value;
                                                            
                                                            var nextDayTimestamp = new Date(pickupDateValue).getTime() + 24 * 60 * 60 * 1000;
                                                            var nextDay = new Date(nextDayTimestamp);
                                                            var nextDayFormatted = nextDay.toISOString().split('T')[0];
                                                            
                                                            document.getElementById("returnDate").setAttribute("min", nextDayFormatted);
                                                        });
                                                    </script>
                                                </div>
                                                <div class="entTime">
                                                    <label>Return Time</label><br>
                                                    <select title="returnTime" id="returnTime" name="returnTime">
                                                        <option value="00:00">00:00</option>
                                                        <option value="00:30">00:30</option>
                                                        <option value="01:00">01:00</option>
                                                        <option value="01:30">01:30</option>
                                                        <option value="02:00">02:00</option>
                                                        <option value="02:30">02:30</option>
                                                        <option value="03:00">03:00</option>
                                                        <option value="03:30">03:30</option>
                                                        <option value="04:00">04:00</option>
                                                        <option value="04:30">04:30</option>
                                                        <option value="05:00">05:00</option>
                                                        <option value="05:30">05:30</option>
                                                        <option value="06:00">06:00</option>
                                                        <option value="06:30">06:30</option>
                                                        <option value="07:00">07:00</option>
                                                        <option value="07:30">07:30</option>
                                                        <option value="08:00">08:00</option>
                                                        <option value="08:30">08:30</option>
                                                        <option value="09:00">09:00</option>
                                                        <option value="09:30">09:30</option>
                                                        <option value="10:00">10:00</option>
                                                        <option value="10:30">10:30</option>
                                                        <option value="11:00">11:00</option>
                                                        <option value="11:30">11:30</option>
                                                        <option value="12:00">12:00</option>
                                                        <option value="12:30">12:30</option>
                                                        <option value="13:00">13:00</option>
                                                        <option value="13:30">13:30</option>
                                                        <option value="14:00">14:00</option>
                                                        <option value="14:30">14:30</option>
                                                        <option value="15:00">15:00</option>
                                                        <option value="15:30">15:30</option>
                                                        <option value="16:00">16:00</option>
                                                        <option value="16:30">16:30</option>
                                                        <option value="17:30">17:00</option>
                                                        <option value="17:30">17:30</option>
                                                        <option value="18:30">18:00</option>
                                                        <option value="18:30">18:30</option>
                                                        <option value="19:30">19:00</option>
                                                        <option value="19:30">19:30</option>
                                                        <option value="20:30">20:00</option>
                                                        <option value="20:30">20:30</option>
                                                        <option value="21:30">21:00</option>
                                                        <option value="21:30">21:30</option>
                                                        <option value="22:30">22:00</option>
                                                        <option value="22:30">22:30</option>
                                                        <option value="23:00">23:00</option>
                                                        <option value="23:30">23:30</option>
                                                    </select>
                                                    <script>
                                                        var select = document.getElementById('returnTime');
                                                        select.selectedIndex = 20;
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" onclick="form_buttonJump('essentials')"> Next </button>
                                    </div>
                                </div>
                            </div>
                            <div class="content content-2">
                                <div class="title">Enter customer details</div>
                                <!--<form>-->
                                    <div class="cus-details">
                                        <div class="cus-personal">
                                            <div class="cus-naming">
                                                <div class="titles">
                                                    <select title="honourific" name="prefix">
                                                        <option value="Mr.">Mr.</option>
                                                        <option value="Ms.">Ms.</option>
                                                        <option value="Mrs.">Mrs.</option>
                                                        <option value="Miss">Miss</option>
                                                        <option value="Dr.">Dr.</option>
                                                        <option value="Prof.">Prof.</option>
                                                        <option value="Rev.">Rev.</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div>
                                                <div class="fname">
                                                    <label for="fname">First Name</label>
                                                    <input type="text" id="fname" name="fname" placeholder="Eg: John" required>
                                                </div>
                                                <div class="lname">
                                                    <label for="lname">Last Name</label>
                                                    <input type="text" id="lname" name="lname" placeholder="Eg: Wick" required>
                                                </div>
                                            </div>
                                            <div class="cus-oth-details">
                                                <div class="cus-nic">
                                                    <label for="nic">NIC</label>
                                                    <input type="text" id="nic" name="nicOpass" required
                                                        maxlength="12" onblur="nicCheck(this.value)">
                                                        
                                                </div>
                                                <div class="cus-age">
                                                    <label for="age">Age</label>
                                                    <input type="number" step="1" min="18" id="age" name="age" required minlength="3"
                                                        value="18">
                                                </div>
                                            </div>
                                            <div class="cus-email">
                                                <label for="email">Email</label>
                                                <input type="email" id="email" name="CUSemail" placeholder="Eg: johnwick40@hotmail.com"
                                                    required onblur="emailCheck(this.value)">
                                                    <!--pattern="[a-z0-9._+%-]+@[a-z0-9.-]+\.[a-z]{2,3}$" -->
                                            </div>
                                        </div>
                                        <div class="cus-drive">
                                            <div class="pilot">
                                                <input type="checkbox" name="driverNeed" id="driver-need" value="yes" onclick="LicenseReq()">
                                                <label for="driver-need">Driver needed</label>
                                            </div>
                                            <div class="lisence">
                                                <div class="cus-driv-lis">
                                                    <label for="dlNo">License No.</label>
                                                    <input type="text" maxlength="9" name="CUSdl" id="dlNo" required>
                                                </div>
                                                <div class="cus-driv-lis">
                                                    <label for="dlExpDate">Expiration Date</label>
                                                    <input type="date" id="dlExpDate" name="CUSdlExp" required>
                                                    <script>
                                                        var currentDate = new Date().toISOString().slice(0, 10);
                                                        document.getElementById("dlExpDate").setAttribute("min", currentDate);
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" onclick="form_buttonJump('customer')"> Next </button>
                                <!--</form>-->
                            </div>
                            <div class="content content-4">
                                <div class="title">Enter payment details</div>
                                <!--<form>-->
                                    <div class="payDetail">
                                        <div class="p-card">
                                            <div class="p-cardNum">
                                                <label for="cardNumber">Card Number</label>
                                                <input type="text" name="cardNumber" id="cardNumber"
                                                    placeholder="xxxx-xxxx-xxxx-xxxx" minlength="15" maxlength="20"
                                                    oninput="cardTypeChecker(this.value)" required>
                                            </div>
                                            <div class="cTypeImage">
                                                <img src="../images/unkowncard.png" id="cardType" alt="Unkown Card Type">
                                            </div>
                                            <div class="p-holder">
                                                <label for="">Card Holder (Optional)</label>
                                                <input type="text" maxlength="12" id="crdHldr">
                                            </div>
                                        </div>
                                        <div class="p-needs">
                                            <div class="p-expDate">
                                                <label for="">Expiration Date</label>
                                                <input type="month" id="exMonth" name="exMonth" required>
                                                <script>
                                                    var today = new Date();
                                                    // Set the minimum month to the first day of next month
                                                    var minMonth = new Date(today.getFullYear(), today.getMonth() + 1, 1);
                                                    var formattedMinMonth = minMonth.toISOString().slice(0, 7); // Format as yyyy-mm
                                                    document.getElementById("exMonth").setAttribute("min", formattedMinMonth);
                                                </script>
                                            </div>
                                            <div class="p-cvv">
                                                <label for="">Enter CVV</label>
                                                <input type="password" maxlength="4" id="cvv" required>
                                            </div>
                                        </div>
                                        <div class="p-warn">
                                            <p>
                                                Note that the cardholder name should match the name on the card exactly, and
                                                should not include any titles, such as "Mr." or "Mrs.", or any additional
                                                information,
                                                such as a middle name or initial, unless it is included on the card.
                                            </p>
                                        </div>
                                    </div>
                                    <button type="submit" name="bookNow"> Book Now </button>
                            </div>
                        </form>
                    </section>
                </div>
                <!--one button, submit all, using JS-->
            </div>

            <div class="vehicleGrid">
                <div class="scrollable-column" id="grid-scroll">
                    <div class="image-grid">
                        <img src="../images/assets/car.jpg" alt="car" data-cat="car" class="v-img">
                        <img src="../images/assets/car.jpg" alt="car" data-cat="car" class="v-img">

                        <img src="../images/assets/SUV.jpg" alt="suv" data-cat="suv" class="v-img">
                        <img src="../images/assets/SUV.jpg" alt="suv" data-cat="suv" class="v-img">

                        <img src="../images/assets/bike.jpg" alt="bike" data-cat="bike" class="v-img">
                        <img src="../images/assets/bike.jpg" alt="bike" data-cat="bike" class="v-img">

                        <img src="../images/assets/van.png" alt="van" data-cat="Vans" class="v-img">
                        <img src="../images/assets/van.png" alt="van" data-cat="Vans" class="v-img">

                        <img src="../images/assets/miniBuses.jpg" alt="miniBuses" data-cat="Mini-Buses" class="v-img">
                        <img src="../images/assets/miniBuses.jpg" alt="miniBuses" data-cat="Mini-Buses" class="v-img">

                        <!--<img src="../images/assets/threewheel.png" alt="threewheel" data-cat="threewheel" class="v-img">
                        <img src="../images/assets/threewheel.png" alt="threewheel" data-cat="threewheel" class="v-img">-->
                    </div>
                </div>
            </div>
        </section>
        
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