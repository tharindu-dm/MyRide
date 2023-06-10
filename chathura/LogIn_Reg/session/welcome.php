<?php
     SESSION_START();
?>
<?php
	include_once'config.php';
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
		<li class = "li_t"> <a href = "about.php"   > About </a> </li>
		</ul>
		<!-- the button to add items -->

		
        <h1><?php echo $_SESSION['logged_user']?></h1>
        
		
		
		<footer align = "center">
		
		    <p> DINUJAYA THAMARA </p> 
			
			<p> <a href = " https://courseweb.sliit.lk/" > Visit to our course  </a></p>
		</footer>
	
	</body>
</html>	