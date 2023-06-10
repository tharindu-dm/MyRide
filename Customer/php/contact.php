<?php
require './config.php';
// php code to Insert data into mysql database from input text

global $conn;
if(isset($_POST['submit']))
{
    
    // get values form input text and number

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $problem = $_POST['problem'];
    $description = $_POST['description'];
    $currentDateTime = date("Y-m-d H:i:s"); //current DT
    
    // mysql query to insert data

    $query = "INSERT INTO CustomerCare (name, phone, problem, description, created_at)
            VALUES ('$name','$phone', '$problem', '$description', '$currentDateTime')";
    
    $result = mysqli_query($conn,$query);
    
    // check if mysql query successful

    if($result)
    {
        echo "<script>console.log('Data Inserted')</script>";
    }
    
    else{
        echo "<script>console.log('Data NOT Inserted')</script>";
    }
    
    header("Location: ../html/contact.html?name=$name&phNo=$phone&prob=$problem&des=$description&curDaTi=$currentDateTime");
    //mysqli_free_result($result);
    mysqli_close($conn);
}
else if(isset($_POST['save'])) //update inquiry
{
    
    // get values form input text and number
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $problem = $_POST['problem'];
    $description = $_POST['description'];
    $currentDateTime = $_POST['currDT'];
    
    //find record
    $sql = "SELECT id FROM customercare WHERE created_at = '$currentDateTime'";
    $result = mysqli_query($conn, $sql);
    
    $currentDateTime = date("Y-m-d H:i:s"); //current DT (new) after getting ID
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $id = $row['id'];
        // mysql query to insert data
        $query = "UPDATE CustomerCare 
        SET name = '$name',
            phone = '$phone',
            problem = '$problem',
            description = '$description',
            created_at = '$currentDateTime'
        WHERE id = $id";
        
        $result = mysqli_query($conn,$query);
        
        // check if mysql query successful

        if($result)
        {
            echo "<script>console.log('Data Inserted')</script>";
        }
        
        else{
            echo "<script>console.log('Data NOT Inserted')</script>";
        }
        
        header("Location: ../html/contact.html?name=$name&phNo=$phone&prob=$problem&des=$description&curDaTi=$currentDateTime");
        //mysqli_free_result($result);
        mysqli_close($conn);
    } else {
        echo "<script>alert('no results from table')</script>";
    }

    
}
else if(isset($_POST['unsend'])) //delete inquirey
{
    
    // get values form input text and number
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $problem = $_POST['problem'];
    $description = $_POST['description'];
    $currentDateTime = $_POST['currDT'];
    
    //find record
    $sql = "SELECT id FROM customercare WHERE created_at = '$currentDateTime'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $id = $row['id'];
        
        // mysql query to insert data
    $query = "DELETE FROM CustomerCare WHERE id='$id'";
    $result = mysqli_query($conn,$query);
    
    // check if mysql query successful
    if($result)
    {
        echo "<script>console.log('Data removed')</script>";
    }
    
    else{
        echo "<script>console.log('Data NOT removed')</script>";
    }
    echo "<script>alert('action cannot be undo! inquiry has been removed')</script>";
    header("Location: ../html/contact.html");
    //mysqli_free_result($result);
    mysqli_close($conn);
    exit();
    } else {
        echo "<script>alert('no results from table')</script>";
    }

}    
?>