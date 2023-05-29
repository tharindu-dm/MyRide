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
                $model = $row['Model'];
                $freeMilage = $row['Free_milage'];
                $mileCost = $row['Cost_per_mile'];
                $passengerCount = $row['Passenger_count'];
                $luggage = $row['Storage'];
                $gearSystem = $row['Gear_system'];
                $fuelType = $row['Fuel_type'];

                // Redirect to home.php with query parameters
                header("Location: home.php?vcode=$vehicleCode&model=$model&freemil=$freeMilage&milecost=$mileCost&passenger=$passengerCount&luggage=$luggage&gear=$gearSystem&fuel=$fuelType");
                exit();
            } else {
                echo "<script>alert('Error in search')</script>";
            }
        } else {
            echo "<script>alert('Something is wrong')</script>";
        }
        $conn->close();
    } else if(isset($_POST['bookNow'])){
        //get all neccessary values from fields
        $vCode = $_POST['v-code'];
        $price = $_POST['v-FreeMil'];

        //getting pickup/return details
        $pickupPlace = $_POST['pickPlace'];
        $pickupDate = $_POST['pickupDate'];
        $pickupTimer = $_POST['pickupTime'];

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
            echo "<script>console.log('no results from table')</script>";
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
        //Enter run sql codes
        echo "<script>console.log('Running insertion [Payment]')</script>";
        runSQL($conn,$sql);



        if($driverNeed == 'yes'){
            //find available driverID ----> set driver as not available
            $sql = "SELECT DriverID FROM Customer WHERE Availability = 'Available'";
            $result = mysqli_query($conn, $sql);

            if ($result->num_rows > 0) {
                $row = mysqli_fetch_assoc($result);
                $DrivID = $row['DriverID'];

                $sql="UPDATE Driver SET Availability = 'On Hire' WHERE DriverID='$DrivID'";
                echo "<script>console.log('Running update [Driver]')</script>";
                runSQL($conn,$sql);
            } else {
                echo "<script>console.log('no results from driver table')</script>";
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
                '$pickupDate', '$pickupPlace', '$pickupTime', 
                '$returnDate','$returnTime','$returnPlace')";
        echo "<script>console.log('Running insertion [reserve]')</script>";
        runSQL($conn,$sql);

        echo "<script>alert('ALL done!!')</script>";
    }
}

function runSQL($conn,$sql){
    if(mysqli_query($conn,$sql)){
        echo "<script>console.log('Record Inserted succesfully!!')</script>";
        //header("Location:index.php");
    }else{
        echo "<script>console.log('Error in insertion')</script>";
    }
}

readData();

?>
