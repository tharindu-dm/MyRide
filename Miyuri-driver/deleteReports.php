<?php
    
    include_once'config.php';
?>

<?php

if (isset($_GET['ReportID'])) {
    $ReportID = $_GET['ReportID'];

    $query = "DELETE FROM Report WHERE ReportID = '$ReportID'";

    $data = mysqli_query($conn, $query);

    if ($data) {
        echo "<script>alert('Record Deleted!!')</script>";
        header("Location:reports.php");
    } else {
        echo "<script>alert('Error in Delete')</script>";
        header("Location:reports.php");
    }
} else {
    echo "<script>alert('Invalid request')</script>";
    header("Location:reports.php");
}


        

        mysqli_close($conn);
?>