<?php
require './config.php';

function readData(){
    global $conn;
    if(isset($_POST['vehicle_selector'])) {
        $type = $_POST["vehicle_selector"];
        $sql = "SELECT * FROM vehicle where Type='$type'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            echo "<script>alert('Record found succesfully!!')</script>";
            while($row = $result->fetch_assoc()){
                echo "found row";
            }
        }else{
            echo "<script>alert('Error in search')</script>";
        }
    }
    else{
        echo "<script>alert('somethingw is wrong')</script>";
    }
    $conn->close();
}
readData();
?>