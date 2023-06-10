<?php
require './config.php';

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $problem = $_POST['problem'];
    $description = $_POST['description'];
    
    //validation or processing codes
    
    //sending an email notification
    $to = "myridesl@gmail.com";
    $subject = "Customer Care Form Submission";
    $message = "Name: ".$name."\n".
               "Contact: ".$contact."\n".
               "Problem: ".$problem."\n".
               "Description: ".$description;
    $headers = "From: your-email@example.com";
    
    if(mail($to, $subject, $message, $headers)){
        echo "Thank you for your submission. We will get back to you soon.";
    } else{
        echo "Oops! Something went wrong. Please try again later.";
    }
}
?>
