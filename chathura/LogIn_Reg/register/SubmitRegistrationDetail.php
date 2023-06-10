<?php
    include_once '../../../Customer/php/config.php'
?>
<?php  

$prefix         = $_POST["feild1"];
$fname          = $_POST["feild2"];
$lname          = $_POST["feild3"];
$age            = $_POST["feild4"];
$email          = $_POST["feild5"];
$nic_passport   = $_POST["feild6"];
$dlnum          = $_POST["feild7"];
$dlexpdate      = $_POST["feild8"];
$password       = $_POST["feild9"];
$category       = $_POST["acc-type"];



//$sql is named as a  query string  
//must give the colomn names exactly the same sequence  and exact names like in the table we created using php myAdmin
$sql1 = "INSERT INTO customer(CID,Prefix,Fname,Lname,Age,email,Nic_passport)  
        VALUES ('','$prefix' , '$fname' , '$lname ' , ' $age ' ,'$email ' , '$nic_passport')";

$sql2 = "INSERT INTO customer_dl(CID,dlno,dlExpDate)  
        VALUES (LAST_INSERT_ID(),'$dlnum' , '$dlexpdate ')";
        
$sql3 = "INSERT INTO user_account(Username,Password,Category)  
        VALUES ('$email ' , '$password' , '$category ')";
        
         // '' space for Item_id  because havent given any variable name for item id 

if(mysqli_query($conn,$sql1) && mysqli_query($conn, $sql2) && mysqli_query($conn, $sql3) ){
    echo "<script>alert('Record inserted succesfully !!')</script>";

    header("Location:../login/index.php"); //this code once we finish entering detail we can redirect the to a certain location
    exit();
}else{
    echo "<script>alert('Error in insertion !!')</script>";
}
//close the connection 
mysqli_close($conn);
?>