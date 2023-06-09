<?php
    session_start();
    $conn = mysqli_connect('localhost','root','','register');

    $accountType = $_POST['acctype'];
    $email = $_POST['email'];
    $nicNum = $_POST['nic'];

    $select = mysqli_query($conn,"SELECT * FROM user_info_1 WHERE account_type = '$accountType' AND email = '$email' AND nic_number = '$nicNum'");
    if(!$select){
        echo '<script>alert("Welcome to Geeks for Geeks")</script>';
        echo('No rows Fetch' . mysql_error());
    
    }

    $row = mysqli_fetch_array($select);

    if(is_array($row)){
        $_SESSION['user_id'] = $row ['user_id'];
        $_SESSION['first_name'] = $row ['first_name'];
        $_SESSION['last_name'] = $row ['last_name'];
        $_SESSION['email'] = $row ['email'];
        $_SESSION['phone'] = $row ['phone'];
        $_SESSION['nic_number'] = $row ['nic_number'];
        $_SESSION['address'] = $row ['address'];
        $_SESSION['license_number'] = $row ['license_number'];
        $_SESSION['license_exp'] = $row ['license_exp'];
        $_SESSION['account_type'] = $row ['account_type'];
    }
    else{
        header("Location:error.html");
    }
    if(isset($_SESSION["email"])){
        header("Location:welcome.php");
    }


?>