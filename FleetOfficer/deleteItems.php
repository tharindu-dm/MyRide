<?php
    
    include_once'config.php';
?>

<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM vehicle WHERE Vehicle_Code = '$id'";

    $data = mysqli_query($conn, $query);

    if ($data) {
        echo "<script>alert('Record Deleted!!')</script>";
        header("Location:VehicleReport.php");
        exit(); 
    } else {
        echo "<script>alert('Error in Delete')</script>";
    }
} else {
    echo "<script>alert('Invalid request')</script>";
}


        // $id  = $_GET['id'];
        // $query = " DELETE 
        //            FROM item
        //            WHERE Item_id =   '$id'  ";

        // $data = mysqli_query($conn,$query);
        // // error_reporting(E_ALL);
        // // ini_set('display_errors', true);
        
        // if($data ){
        //     echo "<script>alert('Record Deleted!!')</script>";

        // }else{
        //     echo"<script>alert('Error in Delete')</script>";
        // }

        mysqli_close($conn);
?>