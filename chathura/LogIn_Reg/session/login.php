<?php
    SESSION_START();

    if( $_SERVER["REQUEST_METHOD"] == "POST"){

        $username = $_POST["uname"]; //must give the id of the element
        $password = $_POST["pwd"];

        if($username == "test" && $password == "1234"){
            $_SESSION['logged_user']=$username;
            header("Location: welcome.php");
            exit();
        }else{
            echo"<script>alert('You have entered the incorrect Username or the Password')</script>";
        }
    }
?>



<!DOCTYPE html>
<html>
	<head>
		<title> My shopping cart </title>
		<link rel="stylesheet" href="./styles/styles.css">
		
	</head>
	
	<body>
		
		<img  src ="images/shopping_cart.png"  alt = "logo pic" class = "logo"   >
		<br>
	
		<h2 align = "center"   >Shopping Cart</h2>
		<h4 align = "center" class = "sub">The online shopping store</h4>
		
		<!-- horizontal line -->
		<hr / >
		
		<ul class = "ul_t">
		<li class = "li_t"> <a href = "Menu.asp" >  Menu </a> </li>
		<li class = "li_t"> <a href = "news.html"  >  News </a> </li>
		<li class = "li_t"> <a href = "register.html" > Contact </a> </li>
		<li class = "li_t"> <a href = "about.asp"   > About </a> </li>
		</ul>
		<br><br>
                <div class="form-style-6">
                    <h1>Login<h1>
                        <form method= "POST" action = "">
                            <input type= "text" id = "uname" name = "uname" placeholder = "Your Username"/>
                            <input type = "password" id = "pwd" name = "pwd" placeholder = "Your password"/>
                            <br/><br/>
                            <input type = "submit" value = "Login"/><br/>
                        </form>

                </div>
		
		<footer align = "center">
		
		    <p> DINUJAYA THAMARA </p> 
			
			<p> <a href = " https://courseweb.sliit.lk/" > Visit to our course  </a></p>
		</footer>
	<script src = "Js/myScript.js"> </script>
	</body>
</html>	