<?php
    // $servername = "localhost";
    // $username = "root";
    // $password = "";
    // // Create connection
    // $conn = new mysqli($servername, $username, $password);
    // // Check connection
    

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $nicnum = $_POST['nicnum'];
    $address = $_POST['address'];
    $licnum = $_POST['licnum'];
    $licexpdate = $_POST['licexpdate'];
    $accountType = $_POST['acctype'];

    $conn = new mysqli('localhost','root','','register');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
    else{

        $stmt = $conn->prepare("insert into user_info_1(first_name,last_name,email,phone,nic_number,address,license_number,license_exp,account_type)
        values(?,?,?,?,?,?,?,?,?)");

        $stmt->bind_param("sssississ", $fname, $lname, $email, $phone, $nicnum, $address, $licnum, $licexpdate, $accountType);
        $stmt->execute();
        echo "Connected successfully";
        // mysqli_close($conn);
        $stmt->close();
        $conn->close();
    }
 

?>