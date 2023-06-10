<?php
require '../../../Customer/php/config.php';

function readData(){
    global $conn;
    if(isset($_POST['delAcc'])){
        $email = $_POST["username"];
        $NIC = $_POST["nic-number"];
        $password = $_POST["password"];

        $sql = "SELECT CID FROM Customer WHERE Nic_passport = '$NIC'";
        $result = mysqli_query($conn, $sql);

        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $cid = $row['CID']; 

            echo "<script>alert('ACTION CANNOT BE UNDONE - Account will be deleted')</script>";
            $sql1 = "DELETE FROM customer_dl WHERE CID='$cid'";
            runSQL($conn,$sql1);

            $sql1 = "DELETE FROM customer WHERE email='$email' AND Nic_passport='$NIC'";
            runSQL($conn,$sql1);

            $sql1 = "DELETE FROM user_account WHERE Username='$email' AND Password='$password'";
            runSQL($conn,$sql1);

            header("Location: ../../../Customer/php/home.php");
            exit();
        } else {
            echo "<script>alert('no results from table')</script>";
        }

        
    }
}

function runSQL($conn,$sql){
    if(mysqli_query($conn,$sql)){
        echo "<script>console.log('Record deleted succesfully!!')</script>";
    }else{
        echo "<script>console.log('Error in deleted')</script>";
    }
}

readData();

?>
