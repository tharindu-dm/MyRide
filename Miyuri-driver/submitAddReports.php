<?php
    include_once'config.php';
?>

<?php  //item id not  used as an input here because if two users input same id then cant used as a primary key therefore i used it as an auto increment value %%%
    $Inquiry  =  $_POST["Inquiry"];
    $Category  =  $_POST["Category"];
    $ReportDT    =  $_POST["Report_DateTime"];
    $RefID   =  $_POST["Ref_ID"];

    //$sql is named as a  query string  
    //must give the colomn names exactly the same sequence  and exact names like in the table we created using php myAdmin
    $sql = "INSERT INTO Report (ReportID ,Inquiry , Category , Report_DateTime , Ref_ID )  
            VALUES ('','$Inquiry' , '$Category' , '$ReportDT' , '$RefID')"; 
    if(mysqli_query($conn,$sql)){
        echo "<script>alert('Record inserted succesfully !!')</script>";

        header("Location:reports.php"); //this code once we finish entering detail we can redirect the to a certain location
    }else{
        echo "<script>alert('Error in insertion !!')</script>";
    }
//close the connection 
    mysqli_close($conn);
?>