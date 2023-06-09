<?php
include_once'config.php';
?>

<?php
    $ReportID = $_GET['ReportID'];
    $Inquiry = $_GET['Inquiry'];
    $Category = $_GET['Category'];
    $ReportDT = $_GET['Report_DateTime'];
    $RefID =$_GET['Ref_ID']


  $sql = "UPDATE Report SET 
            
            Inquiry = '$Inquiry',
            Category = '$Category',
            Report_DateTime = '$ReportDT',
            Ref_ID = '$RefID'

            WHERE
            ReportID = '$ReportID' ;
            

        "
$data = mysqli_query($conn , $query);


?>