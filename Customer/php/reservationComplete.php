<?php
include_once './config.php';
session_start();
/*
//add query code to get all the details and set to the fields
//UPDATE CODE style
$sql="UPDATE Vehicle SET Availability = 'Not Available' WHERE Vehicle_Code='$vCode'";
echo "<script>console.log('Running update [Vehicle]')</script>";
runSQL($conn,$sql);

//INSERT CODE style
$sql = "INSERT INTO reserve (ReservationID, CID, DriverID, Vehicle_Code, Reservation_datetime, 
Pickup_date, Pickup_time, Pickup_location, Return_date, Return_time, Return_location)
VALUES('', '$cid', '$DrivID', '$vCode', '$currentDateTime', 
        '$pickupDate', '$pickupTime', '$pickupPlace', 
        '$returnDate','$returnTime','$returnPlace')";
echo "<script>console.log('Running insertion [reserve]')</script>";
runSQL($conn,$sql);

//SELECT CODE Style
$sql = "SELECT PaymentID FROM payment where Payment_datetime='$currentDateTime'";
$result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $PayID = $row['Payment_datetime'];
    } else {
        echo "<script>alert('no results from [payment] table')</script>";
    }

    //getting reservaeID
$sql = "SELECT ReservationID FROM reserve where Reservation_datetime='$currentDateTime'";
$result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $ReserveID = $row['ReservationID'];
    } else {
        echo "<script>alert('no results from [reserve] table')</script>";
    }


    //function to run sql queris
*/
global $conn;
if(isset($_POST['saveChanges'])){
    
    
    $conn->close();
} else if(isset($_POST['deleteRes'])){
    echo "<script>alert('Your reservation will be deleted')</script>";
    $resID = $_POST['resID'];
    $cid = $_POST['cid'];
    $custEmail = $_POST['email'];
    $sql = "DELETE FROM reserve WHERE ReservationID='$resID'";
    runSQL($conn,$sql);
    //if email not in userAccount, DELETE everything customer related to!!!
    $sql = "SELECT Username FROM user_account where Username='$cusEmail'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        echo "<script>console.log('record found')</script>";
        exit();
    } else {
        echo "<script>console.log('no results table')</script>";
        //delete from customerDL, payment, customer
    }
}

function runSQL($conn,$sql){
    if(mysqli_query($conn,$sql)){
        echo "<script>console.log('Record Inserted succesfully!!')</script>";
    }else{
        echo "<script>console.log('Error in insertion')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>MyRide|Home</title>

        <link rel="stylesheet" href="../css/reserveDetails.css"/>
        <link rel="stylesheet" href="../css/headerFooter.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

        <script src="../js/reserveComp.js"></script>
    </head>

    <body>
        <div class="Details-Wrapper">
            <fieldset class="FS">
                <legend><h2>Reservation Details</h2></legend>
                <!--<script>
                    // http://localhost/IWT/Customer/html/reservationComplete.html?PayID=&vCode=4&price=18000&pickupPlace=Head%20Office&pickupDate=2099-01-01&pickupTime=09:00&returnPlace=Head%20Office&returnDate=2099-01-02&returnTime=10:00&prefix=Mr.&fname=fnagdsge&lname=lnfgdsgdfs&nic=200187624329&age=22&email=faontal@rand.ra&driverNeed=yes&dlNo=F973hy&dlExp=2099-01-01&currentDateTime=2023-06-08%2019:22:19&ReserveID=12&DrivID=&cid=13&type=&model=&freeMilage=&mileCost=&passengerCount=&luggage=&gearSystem=&fuelType=
                    /*http://localhost/IWT/Customer/html/reservationComplete.html
                    ?PayID=
                    &vCode=4
                    &price=18000
                    &pickupPlace=Head%20Office
                    &pickupDate=2099-01-01
                    &pickupTime=09:00
                    &returnPlace=Head%20Office
                    &returnDate=2099-01-02
                    &returnTime=10:00
                    &prefix=Mr.
                    &fname=fnagdsge
                    &lname=lnfgdsgdfs
                    &nic=200187624329
                    &age=22
                    &email=faontal@rand.ra
                    &driverNeed=yes
                    &dlNo=F973hy
                    &dlExp=2099-01-01
                    &currentDateTime=2023-06-08%2019:22:19
                    &ReserveID=12
                    &DrivID=
                    &cid=13
                    &type=
                    &model=
                    &freeMilage=
                    &mileCost=
                    &passengerCount=
                    &luggage=
                    &gearSystem=
                    &fuelType=
                    */

                    const urlParams = new URLSearchParams(window.location.search);
                    const ReserveID = urlParams.get('ReserveID');
                    const DrivID = urlParams.get('DrivID');
                    const cid = urlParams.get('cid');
                    const PayID = urlParams.get('PayID');

                    const pickupPlace = urlParams.get('pickupPlace');
                    const pickupDate = urlParams.get('pickupDate');
                    const pickupTime = urlParams.get('pickupTime');
                    const returnPlace = urlParams.get('returnPlace');
                    const returnDate = urlParams.get('returnDate');
                    const returnTime = urlParams.get('returnTime');

                    const prefix = urlParams.get('prefix');
                    const fname = urlParams.get('fname');
                    const lname = urlParams.get('lname');
                    const nic = urlParams.get('nic');
                    const age = urlParams.get('age');
                    const email = urlParams.get('email');
                    
                    const vCode = urlParams.get('vCode');
                    const freeMil = urlParams.get('price');

                    const type = urlParams.get('type');
                    const model = urlParams.get('model');
                    const freeMilage = urlParams.get('freeMilage');
                    const mileCost = urlParams.get('mileCost');
                    const passengerCount = urlParams.get('passengerCount');
                    const luggage = urlParams.get('luggage');
                    const gearSystem = urlParams.get('gearSystem');
                    const fuelType = urlParams.get('fuelType');

                    const driverNeed = urlParams.get('driverNeed');
                    const dlNo = urlParams.get('dlNo');
                    const dlExp = urlParams.get('dlExp');
                    const currentDateTime = urlParams.get('currentDateTime');

                    // Fill the form fields with taken values
                    document.getElementById('resID').value = ReserveID; 
                    document.getElementById('resDT').value = currentDateTime;                     
                    document.getElementById('payID').value = PayID; 
                    
                    document.getElementById('pkLoc').value = pickupPlace; 
                    document.getElementById('pkDate').value = pickupDate; 
                    document.getElementById('pkTime').value = pickupTime; 
                    document.getElementById('retLoc').value = returnPlace; 
                    document.getElementById('retDate').value = returnDate; 
                    document.getElementById('retTime').value = returnTime; 

                    document.getElementById('vCode').value = vCode;                     
                    document.getElementById('vType').value = type; 
                    document.getElementById('vModel').value = model; 

                    document.getElementById('freeMil').value = freeMil; 
                    document.getElementById('mileCost').value = mileCost; 

                    document.getElementById('headCount').value = passengerCount; 
                    document.getElementById('vStore').value = luggage; 
                    document.getElementById('vGear').value = gearSystem; 
                    document.getElementById('vFuel').value = fuelType; 
                    
                    document.getElementById('cusID').value = cid; 
                    document.getElementById('cusPrefix').value = prefix; 
                    document.getElementById('cusFName').value = fname; 
                    document.getElementById('cusLName').value = lname; 
                    document.getElementById('cusNIC').value = nic; 
                    document.getElementById('cusAge').value = age; 
                    document.getElementById('cusEmail').value = email; 

                    document.getElementById('driverNeed').value = driverNeed;//not done
                    document.getElementById('dlNo').value = dlNo;//not done
                    document.getElementById('dlExp').value = dlExp;//not done
                    document.getElementById('DrivID').value = DrivID;//not done

                </script>-->

                <script>
                    // Function to retrieve URL parameter values by name
                    function getParameterByName(name, url) {
                        if (!url) url = window.location.href;
                        name = name.replace(/[\[\]]/g, '\\$&');
                        var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
                            results = regex.exec(url);
                        if (!results) return null;
                        if (!results[2]) return '';
                        return decodeURIComponent(results[2].replace(/\+/g, ' '));
                    }

                        // Populate form fields with URL parameter values
                        document.addEventListener('DOMContentLoaded', function() {
                        document.getElementById('resID').value = getParameterByName('ReserveID');
                        document.getElementById('payID').value = getParameterByName('PayID');

                        document.getElementById('pkLoc').value = getParameterByName('pickupPlace');
                        document.getElementById('pkDate').value = getParameterByName('pickupDate');
                        document.getElementById('pkTime').value = getParameterByName('pickupTime');

                        document.getElementById('retLoc').value = getParameterByName('returnPlace');
                        document.getElementById('retDate').value = getParameterByName('returnDate');
                        document.getElementById('retTime').value = getParameterByName('returnTime');

                        document.getElementById('cusPrefix').value = getParameterByName('prefix');
                        document.getElementById('cusFName').value = getParameterByName('fname');
                        document.getElementById('cusLName').value = getParameterByName('lname');
                        document.getElementById('cusNIC').value = getParameterByName('nic');
                        document.getElementById('cusAge').value = getParameterByName('age');
                        document.getElementById('cusEmail').value = getParameterByName('email');

                        document.getElementById('driNeed').value = getParameterByName('driverNeed');
                        document.getElementById('dlNo').value = getParameterByName('dlNo');
                        document.getElementById('dlExp').value = getParameterByName('dlExp');
                        
                        document.getElementById('vCode').value = getParameterByName('vCode');
                        document.getElementById('vType').value = getParameterByName('type');
                        document.getElementById('vModel').value = getParameterByName('model');
                        document.getElementById('freeMil').value = getParameterByName('freeMilage');
                        document.getElementById('mileCost').value = getParameterByName('mileCost');
                        document.getElementById('headCount').value = getParameterByName('passengerCount');
                        document.getElementById('vStore').value = getParameterByName('luggage');
                        document.getElementById('vGear').value = getParameterByName('gearSystem');
                        document.getElementById('vFuel').value = getParameterByName('fuelType');
                    });
                </script>

                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="resDT-resID-payID">
                        <div class="res-pay-child">
                            <label for="resID">Reservation ID</label>
                            <input type="text" id="resID" name="resID" readonly>
                        </div>
                        <div class="res-pay-child">
                            <label for="resDT">Reservation DateTime</label>
                            <input type="text" id="resDT" name="resDT" readonly>
                        </div>
                        <div class="res-pay-child">
                            <label for="payID">Payment ID</label>
                            <input type="text" id="payID" name="payID" readonly>
                        </div>
                    </div>
                    <div class="triple-col-set">
                        <div class="col">
                                <!--Reserve details-->
                            <fieldset class="FS">
                                <legend><h3>Reservation Details</h3></legend>
                                <div class="dets">
                                    <div class="det-child">
                                        <label for="pkLoc">Pickup Location</label>
                                        <input type="text" id="pkLoc" name="pkLoc" readonly>
                                    </div>
                                    <div class="det-child">
                                        <label for="pkDate">Pickup Date</label>
                                        <input type="text" id="pkDate" name="pkDate" readonly>
                                    </div>
                                    <div class="det-child">
                                        <label for="pkTime">Pickup Time</label>
                                        <input type="text" id="pkTime" name="pkTime" readonly>
                                    </div>
                                    <br>
                                    <div class="det-child">
                                        <label for="retLoc">Return Location</label>
                                        <input type="text" id="retLoc" name="retLoc" readonly>
                                    </div>
                                    <div class="det-child">
                                        <label for="retDate">Return Date</label>
                                        <input type="text" id="retDate" name="retDate" readonly>
                                    </div>
                                    <div class="det-child">
                                        <label for="retTime">Return Time</label>
                                        <input type="text" id="retTime" name="retTime" readonly>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col">
                                <!--Customer details-->
                            <fieldset class="FS">
                                <legend><h3>Customer Details</h3></legend>
                                <div class="dets">
                                    <div class="det-child">
                                        <label for="cusID">ID</label>
                                        <input type="text" id="cusID" name="cusID" readonly>
                                    </div>
                                    <div class="det-child">
                                        <label for="cusPrefix">Prefix</label>
                                        <input type="text" id="cusPrefix" name="cusPrefix" readonly>                                   
                                    </div>
                                    <div class="det-child">
                                        <label for="cusFName">First Name</label>
                                        <input type="text" id="cusFName" name="cusFName" readonly>                                   
                                    </div>
                                    <div class="det-child">
                                        <label for="cusLName">Last Name</label>
                                        <input type="text" id="cusLName" name="cusLName" readonly>                                   
                                    </div>
                                    <div class="det-child">
                                        <label for="cusNIC">NIC</label>
                                        <input type="text" id="cusNIC" name="cusNIC" readonly>
                                    </div>
                                    <div class="det-child">
                                        <label for="cusAge">Age</label>
                                        <input type="text" id="cusAge" name="cusAge" readonly
                                        onblur="nicCheck()">
                                    </div>
                                    <div class="det-child">
                                        <label for="cusEmail">Email</label>
                                        <input type="text" id="cusEmail" name="cusEmail" readonly
                                        onblur="emailCheck()">
                                    </div>
                                    <br>
                                    <!--Driver details-->
                                    <fieldset class="FS">
                                        <legend><h5>Driver details</h5></legend>
                                        <div class="det-child">
                                            <label for="driNeed">Driver</label> <!--required or customer-->
                                            <input type="text" id="driNeed" name="driNeed" readonly>
                                        </div>
                                        <div class="det-child">
                                            <label for="dlNo">DL no.</label>
                                            <input type="text" id="dlNo" name="dlNo" readonly>
                                        </div>
                                        <div class="det-child">
                                            <label for="dlExp">DL Expiration date</label>
                                            <input type="date" id="dlExp" name="dlExp" readonly>
                                        </div>
                                    </fieldset>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col">
                                <!--Vehi details-->
                            <fieldset class="FS">
                                <legend><h3>Vehicle Details</h3></legend>
                                <div class="dets">
                                    <div class="det-child">
                                        <label for="vCode">code</label>
                                        <input type="text" id="vCode" name="vCode" readonly>
                                    </div>
                                    <div class="det-child">
                                        <label for="vType">Type</label>
                                        <input type="text" id="vType" name="vType" readonly>
                                    </div>
                                    <div class="det-child">
                                        <label for="vModel">Model</label>
                                        <input type="text" id="vModel" name="vModel" readonly>
                                    </div>
                                    <br>
                                    <div class="det-child">
                                        <label for="freeMil">Free Milage(LKR)</label>
                                        <input type="text" id="freeMil" name="freeMil" readonly>
                                    </div>
                                    <div class="det-child">
                                        <label for="mileCost">Cost per mile(LKR)</label>
                                        <input type="text" id="mileCost" name="mileCost" readonly>
                                    </div>
                                    <br>
                                    <div class="det-child">
                                        <label for="headCount">Passenger count</label>
                                        <input type="text" id="headCount" name="headCount" readonly>
                                    </div>
                                    <div class="det-child">
                                        <label for="vStore">Storage</label>
                                        <input type="text" id="vStore" name="vStore" readonly>
                                    </div>
                                    <div class="det-child">
                                        <label for="vGear">Gear System</label>
                                        <input type="text" id="vGear" name="vGear" readonly>
                                    </div>
                                    <div class="det-child">
                                        <label for="vFuel">Fuel Type</label>
                                        <input type="text" id="vFuel" name="vFuel" readonly>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="sav-edt-del-btns">
                        <div>
                            <button id="okay-btn"><a href="../php/home.php">Okay</a></button>
                            <button id="save-changes-btn" name="saveChanges" disabled>Save Changes</button>
                            <button id="edit-btn" type="button" name="edit-det-btn" onclick="edit(this.name)">Edit</button>
                        </div>
                        <div>
                            <button id="delete-account-btn" name="deleteRes">Delete Reservation</button>
                        </div>
                    </div>
                </form>
                <div>
                    <p id="msgP">
                    We recommend taking a screenshot or noting down 
                    your reservation details for your convenience.
                    </p>
                    <p id="msgP">
                    To request any modifications or updates to your reservation or 
                    vehicle details, we kindly ask you to contact us directly. Our team 
                    is ready to assist you and ensure that any necessary adjustments are 
                    made to meet your specific requirements. Please note that this 
                    communication is not limited to a written letter or email; we encourage 
                    you to reach out to us through the available contact channels, such as 
                    phone or in-person, to promptly address your concerns. We value your 
                    satisfaction and are committed to providing exceptional service, so 
                    please don't hesitate to get in touch with us.
                    </p>
                </div>
            </fieldset>
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

