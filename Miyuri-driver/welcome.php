<?php
     SESSION_START();
?>
<?php
	include_once'config.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="stylesheet" href="style.css">

      <!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <!-- Google Font Link for Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">

	<!-- for calender-->
  <script src="script.js" defer></script>
  <!-- activity chart -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 

	<title>MyRide - Dashboard</title>
    </head>

    <body>
      <!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">MyRide</span>
		</a>
		<ul class="side-menu top">
		<li class="active">
			<a href="index.html">
				
				<span class="text">Dashboard</span>
			</a>
		<li>
			<a href="#">
				<i class="fas fa-calendar-alt"></i>
				<span class="text">Reservations</span>
			</a>
		</li>
		<li>
			<a href="returns.html">
				<i class="fas fa-undo"></i>
				<span class="text">Returns</span>
			</a>
		</li>
		<li>
			<a href="reports.php">
				<i class="fas fa-file-alt"></i>
				<span class="text">Reports</span>
			</a>
		</li>
		
		<li>
			<a href="#">
				<i class="fas fa-chart-bar"></i>
				<span class="text">Activity</span>
			</a>
		</li>
		<li>
			<a href="#">
				<i class="fas fa-bell"></i>
				<span class="text">Reminders</span>
			</a>
		</li>
		
		<li>
			<a href="#">
				<i class="fas fa-map-marked-alt"></i>
				<span class="text">Maps</span>
			</a>
		</li>
		
		<li>
			<a href="#">
				<i class="fas fa-money-bill"></i>
				<span class="text">Payments</span>
			</a>
		</li>
	</ul>


		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="#" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
			<div class="dropdown">
  <button class="dropdown-button" id="user-dropdown">
    Sign in <i class="arrow-down"></i>
  </button>
  <div class="dropdown-content">
    <a href="#">Switch User</a>
    <a href="#">Edit Profile</a>
    <a href="#">Logout</a>
    <a href="#">Settings</a>
  </div>
</div>
<a href="#" class="profile" id="user-icon">
  <i class='bx bxs-user'></i>
</a>

			  
		</nav>
		
		<!-- NAVBAR -->
               
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <script src="index.js"></script>
	
	
	  <h1><?php echo isset($_SESSION['logged_user']) ? $_SESSION['logged_user'] : ''; ?></h1>
        
	
	</body>
</html>	