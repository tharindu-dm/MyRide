<?php
require '../../../Customer/php/config.php';

function readData(){
    global $conn;
    if(isset($_POST['enter'])){
        $email = $_POST["email"];
        $NIC = $_POST["nic"];

        $sql = "SELECT * FROM customer where email='$email' AND Nic_passport='$NIC'";
        $result = $conn->query($sql);

        if($result->num_rows == 1){
            echo "<script>alert('Account found successfully!!')</script>";
                
            // Redirect to prev page with query parameter
            $chg='yes';
            header("Location: ./forgot_pwd.html?change=$chg&email=$email");
            exit();
        }
    } else if(isset($_POST['resetPW'])){  
        $email = $_POST["emPara"];      
        $newpw = $_POST["new_password"];
        $confpw = $_POST["confirm_password"];

        if($newpw == $confpw){
            $sql = "UPDATE user_account SET Password = '$newpw' WHERE Username='$email'";
            runSQL($conn, $sql);            
            header("Location: ./login.php");
        }
        else{
            echo "<script>alert('Password mismatch')</script>";
            header("Location: ./forgot_pwd.html?change=$chg&email=$email");
        }
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
