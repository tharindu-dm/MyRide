<?php
/*session_start();
require '../../../Customer/php/config.php';

echo "<script>alert('connection done')<script>";

function readData(){
    global $conn;
    if(isset($_POST['login'])){
        $type = $_POST['acc-type'];
        $email = $_POST['email'];
        $pw = $_POST['paword'];
        echo "<script>console.log('input taken')<script>";

        if(empty($email)){
            echo "<script>alert('Enter email');</script>";
            header("Location: ./index.php");
            exit();
        }
        else if(empty($pw))
        {
            echo "<script>alert('Enter password');</script>";
            header("Location: ./index.php");
            exit();
        }

        echo "<script>console.log('Running ELSE')<script>";
        if($type == 'customer'){
            $type = "";
            echo "<script>console.log('Running  IF for customer inside ELSE')<script>";
            $sql = "SELECT * FROM user_account where Username='$email' AND Password='$pw' AND Category='$type'";
            $result = mysqli_query($conn, $sql);

                if ($result->num_rows == 1) {
                    //$cus_data = mysqli_fetch_assoc($result);
                    //https://www.w3schools.com/php/func_mysqli_fetch_assoc.asp               
                    $sql = "SELECT * FROM customer where email='$email'";
                    $result = mysqli_query($conn, $sql);                
                    $customerData = mysqli_fetch_assoc($result);
                    $_SESSION["customer"] = $customerData;

                    echo "successfully created the session";

                    header("Location: ../../Customer/php/profile.php");
                    exit();
                } else {
                    echo "<script>alert('Account not found');</script>";
                    header("Location: ./index.php");
                    exit();
                }
        }else if($type == 'Driver'){
            $sql = "SELECT * FROM user_account where Username='$email' AND Password='$pw' AND Category='driver'";
            $result = mysqli_query($conn, $sql);

                if ($result->num_rows == 1) {
                    //$cus_data = mysqli_fetch_assoc($result);
                    //edit for driver login
                    
                } else {
                    echo "<script>alert('Account not found')</script>";
                    header("Location: ./index.php");
                    exit();
                }
        }else if($type == 'Admin'){
            $sql = "SELECT * FROM user_account where Username='$email' AND Password='$pw' AND Category='admin'";
            $result = mysqli_query($conn, $sql);

                if ($result->num_rows == 1) {
                    //$cus_data = mysqli_fetch_assoc($result);
                    //edit for ADMIN login
                    
                } else {
                    echo "<script>alert('Account not found')</script>";
                    header("Location: ./index.php");
                    exit();
                }
        }else if($type == 'Fleet Officer'){
            $sql = "SELECT * FROM user_account where Username='$email' AND Password='$pw' AND Category='fleetOfficer'";
            $result = mysqli_query($conn, $sql);

                if ($result->num_rows == 1) {
                    //$cus_data = mysqli_fetch_assoc($result);
                    //edit for FO login
                } else {
                    echo "<script>alert('Account not found');</script>";
                    header("Location: ./index.php");
                    exit();
                }
        }else {
            //edit code for employees
            echo "<script>console.log('Running  IF for employees inside ELSE')<script>";
        }

        echo "<script>console.log('Came to wrong place')<script>";
    }else{
        echo "<script>alert('readData ERROR')<script>";
    }
}

function runSQL($conn,$sql){
    if(mysqli_query($conn,$sql)){
        echo "<script>console.log('Record Inserted succesfully!!')</script>";
    }else{
        echo "<script>console.log('Error in insertion')</script>";
    }
}

readData();*/

//NOT WORKING
?>

<?php
   SESSION_START();

    if( $_SERVER["REQUEST_METHOD"] == "POST"){

        $username = $_POST["email"]; 
        $password = $_POST["paword"];

        if($username == "user1@example.com" && $password == "sarah12345"){
            $_SESSION['customer']=$username;
            header("Location: ../../../Customer/php/profile.php");
            exit();
        }
        else if($username == "driver@myride.com" && $password == "driverMEself"){
            $_SESSION['driver']=$username;
            header("Location: ../../../Miyuri-driver/index.html");
            exit();
        }
        else if($username == "fleetofficer@example.com" && $password == "SecurePassword2023"){
            $_SESSION['fleetOfficer']=$username;
            header("Location: ../../../FleetOfficer/fleetdashboard.php");
            exit();
        }
        else{
            echo"<script>alert('You have entered the incorrect Username or the Password')</script>";
        }
    }
?>