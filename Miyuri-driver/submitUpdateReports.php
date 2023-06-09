<?php
    include_once'config.php';  
?>

<?php
    if($_GET['submit']){ // update button is clicked only value must be catch 
        //values inside [] is name in the label because we are accessing the values in those labels using the names
            $ReportID = $_GET['feild0'];
            $Inquiry = $_GET['feild1'];
            $Category = $_GET['feild2'];
            $ReportDT= $_GET['feild3'];
            $RefID = $_GET['feild4'];
           


            $query = "UPDATE Report SET 
                      
                        Inquiry = '$Inquiry',
                        Category = '$Category',
                        Report_DateTime = '$ReportDT',
                        Ref_ID = '$RefID'
                        
                        WHERE  ReportID = '$ReportID';
                        ";  

       $data =  mysqli_query($conn ,  $query);

        if($data ){
            echo "<script>alert('Record Updated!!')</script>";
            header("Location:reports.php");

        }else{
            echo"<script>alert('Error in update')</script>";
        }




    }   
    
    mysqli_close($conn);
?>