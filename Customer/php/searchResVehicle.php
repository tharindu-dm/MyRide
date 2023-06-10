<?php
require './config.php';

function readData(){
    global $conn;
    if(isset($_POST['searchVehicle'])){
        if(isset($_POST['vehicle_selector'])) {
            $type = $_POST["vehicle_selector"];
            $sql = "SELECT * FROM vehicle where Type='$type' AND Availability='Available'";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                echo "<script>alert('Record found successfully!!')</script>";
                $row = $result->fetch_assoc();
        
                // Assign column values to variables
                $vehicleCode = $row['Vehicle_Code'];
                $type = $row['Type'];
                $model = $row['Model'];
                $freeMilage = $row['Free_milage'];
                $mileCost = $row['Cost_per_mile'];
                $passengerCount = $row['Passenger_count'];
                $luggage = $row['Storage'];
                $gearSystem = $row['Gear_system'];
                $fuelType = $row['Fuel_type'];

                // Redirect to home.php with query parameters
                header("Location: home.php?vcode=$vehicleCode&Type=$type&model=$model&freemil=$freeMilage&milecost=$mileCost&passenger=$passengerCount&luggage=$luggage&gear=$gearSystem&fuel=$fuelType");
                exit();
            } else {
                echo "<script>alert('We are sorry. Vehicle you searched is Not Avaialble.')</script>";
                header("Location: home.php");
                exit();
            }
        } else {
            echo "<script>alert('Something is wrong')</script>";
        }
        $conn->close();
    } else if(isset($_POST['bookNow'])){
        //get all neccessary values from fields
        $vCode = $_POST['v-code'];
        $price = $_POST['v-FreeMil'];
        
        $type = $row['Type'];
        $model = $row['Model'];
        $freeMilage = $row['Free_milage'];
        $mileCost = $row['Cost_per_mile'];
        $passengerCount = $row['Passenger_count'];
        $luggage = $row['Storage'];
        $gearSystem = $row['Gear_system'];
        $fuelType = $row['Fuel_type'];

        //getting pickup/return details
        $pickupPlace = $_POST['pickPlace'];
        $pickupDate = $_POST['pickupDate'];
        $pickupTime = $_POST['pickupTime'];

        $returnPlace = $_POST['returnPlace'];
        $returnDate = $_POST['returnDate'];
        $returnTime = $_POST['returnTime'];

        $prefix = $_POST['prefix'];
        $fname = $_POST['fname']; 
        $lname = $_POST['lname'];
        $nic = $_POST['nicOpass']; 
        $age = $_POST['age']; 
        $email = $_POST['CUSemail'];

        $driverNeed = $_POST['driverNeed'];
        $dlNo = $_POST['CUSdl']; 
        $dlExp = $_POST['CUSdlExp'];

        $currentDateTime = date("Y-m-d H:i:s"); //current DT

        //create customer
        $sql = "INSERT INTO Customer(CID,Prefix,Fname,Lname,Age,email,Nic_passport)
                VALUES ('','$prefix','$fname','$lname','$age','$email', '$nic')";
        //Enter run sql codes
        echo "<script>console.log('Running insertion [Customer]')</script>";
        runSQL($conn,$sql);

        //get CID
        $sql = "SELECT CID FROM Customer WHERE Nic_passport = '$nic'";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $cid = $row['CID']; 
        } else {
            echo "<script>alert('no results from table')</script>";
        }

        //free the result set (for memory purposes)
        mysqli_free_result($result);

        //insert customer_dl by adding DL details (regardless of driver is needed or not)
        //## improve to check if the CID is already exits in the table, if so: use UPDATE code
        $sql = "INSERT INTO customer_dl (CID,dlNo,dlExpDate)VALUES('$cid','$dlNo', '$dlExp')";
        echo "<script>console.log('Running insertion [Customer_DL]')</script>";
        runSQL($conn,$sql);

        //create payment
        $sql = "INSERT INTO Payment(PaymentID, Payment_datetime, Payment_type, Total_bill)
                VALUES ('','$currentDateTime', 'Card', '$price')";

        echo "<script>console.log('Running insertion [Payment]')</script>";
        runSQL($conn,$sql);



        if($driverNeed == "yes"){
            //find available driverID ----> set driver as not available
            $sql = "SELECT DriverID FROM Driver WHERE Availability = 'Available'";
            $result = mysqli_query($conn, $sql);

            if ($result->num_rows > 0) {
                $row = mysqli_fetch_assoc($result);
                $DrivID = $row['DriverID'];

                $sql="UPDATE Driver SET Availability = 'On Hire' WHERE DriverID='$DrivID'";
                echo "<script>console.log('Running update [Driver]')</script>";
                runSQL($conn,$sql);
            } else {
                echo "<script>alert('no results from driver table')</script>";
            }
        }

        //get car ID -----> set its availability to NOT AVAILABLE
        $sql="UPDATE Vehicle SET Availability = 'Not Available' WHERE Vehicle_Code='$vCode'";
        echo "<script>console.log('Running update [Vehicle]')</script>";
        runSQL($conn,$sql);

        //create reservation (resID,Vcode,DriID,CusID,Pk detail,ret detail)
        $sql = "INSERT INTO reserve (ReservationID, CID, DriverID, Vehicle_Code, Reservation_datetime, 
        Pickup_date, Pickup_time, Pickup_location, Return_date, Return_time, Return_location)
        VALUES('', '$cid', '$DrivID', '$vCode', '$currentDateTime', 
                '$pickupDate', '$pickupTime', '$pickupPlace', 
                '$returnDate','$returnTime','$returnPlace')";
        echo "<script>console.log('Running insertion [reserve]')</script>";
        runSQL($conn,$sql);
        
        //joining payment and reserve
            //getting PaymentID
        $sql = "SELECT PaymentID FROM payment where Payment_datetime='$currentDateTime'";
        $result = mysqli_query($conn, $sql);

            if ($result->num_rows > 0) {
                $row = mysqli_fetch_assoc($result);
                $PayID = $row['PaymentID'];
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
        //wait
        $sql = "INSERT INTO reserve_payment (ReservationID, PaymentID) VALUES ('$ReserveID','$PayID')";
        echo "<script>console.log('Running insertion [Reserve_Payment]')</script>";
        runSQL($conn,$sql);

        echo "<script>alert('ALL done!!')</script>";
        header("Location: ../php/reservationComplete.php?PayID=$PayID&vCode=$vCode&price=$price&pickupPlace=$pickupPlace&pickupDate=$pickupDate&pickupTime=$pickupTime&returnPlace=$returnPlace&returnDate=$returnDate&returnTime=$returnTime&prefix=$prefix&fname=$fname&lname=$lname&nic=$nic&age=$age&email=$email&driverNeed=$driverNeed&dlNo=$dlNo&dlExp=$dlExp&currentDateTime=$currentDateTime&ReserveID=$ReserveID&DrivID=$DrivID&cid=$cid&type=$type&model=$model&freeMilage=$freeMilage&mileCost=$mileCost&passengerCount=$passengerCount&luggage=$luggage&gearSystem=$gearSystem&fuelType=$fuelType");
        exit();
    }
}

function runSQL($conn,$sql){
    if(mysqli_query($conn,$sql)){
        echo "<script>console.log('Record Inserted succesfully!!')</script>";
    }else{
        echo "<script>console.log('Error in insertion')</script>";
    }
}

readData();

?>
